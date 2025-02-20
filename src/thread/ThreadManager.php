<?php

/*
 *
 *  __  ______            _        _   __  __ ____
 *  \ \/ /  _ \ ___   ___| | _____| |_|  \/  |  _ \
 *   \  /| |_) / _ \ / __| |/ / _ \ __| |\/| | |_) |
 *   /  \|  __/ (_) | (__|   <  __/ |_| |  | |  __/
 *  /_/\_\_|   \___/ \___|_|\_\___|\__|_|  |_|_|
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the MIT License as published by
 * the Free Software Foundation
 * The files in XPocketMP are mostly from PocketMine-MP.
 * Developed: ClousClouds, PMMP Team
 * @author ClousClouds Team
 * @link https://xpocketmc.xyz/
 *
 *
 */

declare(strict_types=1);

namespace pocketmine\thread;

use pmmp\thread\ThreadSafe;
use pmmp\thread\ThreadSafeArray;
use function spl_object_id;

class ThreadManager extends ThreadSafe{

	private static ?self $instance = null;

	public static function init() : void{
		self::$instance = new ThreadManager();
	}

	public static function getInstance() : ThreadManager{
		if(self::$instance === null){
			self::$instance = new ThreadManager();
		}
		return self::$instance;
	}

	/** @phpstan-var ThreadSafeArray<int, Thread|Worker> */
	private ThreadSafeArray $threads;

	private function __construct(){
		$this->threads = new ThreadSafeArray();
	}

	public function add(Worker|Thread $thread) : void{
		$this->threads[spl_object_id($thread)] = $thread;
	}

	public function remove(Worker|Thread $thread) : void{
		unset($this->threads[spl_object_id($thread)]);
	}

	/**
	 * @return Worker[]|Thread[]
	 */
	public function getAll() : array{
		$array = [];
		/**
		 * @var Worker|Thread $thread
		 */
		foreach($this->threads as $key => $thread){
			$array[$key] = $thread;
		}

		return $array;
	}

	public function stopAll() : int{
		$logger = \GlobalLogger::get();

		$erroredThreads = 0;

		foreach($this->getAll() as $thread){
			$logger->debug("Stopping " . $thread->getThreadName() . " thread");
			try{
				$thread->quit();
				$logger->debug($thread->getThreadName() . " thread stopped successfully.");
			}catch(ThreadException $e){
				++$erroredThreads;
				$logger->debug("Could not stop " . $thread->getThreadName() . " thread: " . $e->getMessage());
			}
		}

		return $erroredThreads;
	}
}
