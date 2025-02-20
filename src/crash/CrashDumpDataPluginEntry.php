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

namespace pocketmine\crash;

final class CrashDumpDataPluginEntry{
	/**
	 * @param string[] $authors
	 * @param string[] $api
	 * @param string[] $depends
	 * @param string[] $softDepends
	 */
	public function __construct(
		public string $name,
		public string $version,
		public array $authors,
		public array $api,
		public bool $enabled,
		public array $depends,
		public array $softDepends,
		public string $main,
		public string $load,
		public string $website,
	){}
}
