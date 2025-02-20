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

namespace pocketmine\inventory\transaction\action;

use pocketmine\event\player\PlayerDropItemEvent;
use pocketmine\inventory\transaction\TransactionValidationException;
use pocketmine\item\Item;
use pocketmine\item\VanillaItems;
use pocketmine\player\Player;

/**
 * Represents an action involving dropping an item into the world.
 */
class DropItemAction extends InventoryAction{

	public function __construct(Item $targetItem){
		parent::__construct(VanillaItems::AIR(), $targetItem);
	}

	public function validate(Player $source) : void{
		if($this->targetItem->isNull()){
			throw new TransactionValidationException("Cannot drop an empty itemstack");
		}
		if($this->targetItem->getCount() > $this->targetItem->getMaxStackSize()){
			throw new TransactionValidationException("Target item exceeds item type max stack size");
		}
	}

	public function onPreExecute(Player $source) : bool{
		$ev = new PlayerDropItemEvent($source, $this->targetItem);
		if($source->isSpectator()){
			$ev->cancel();
		}
		$ev->call();
		if($ev->isCancelled()){
			return false;
		}

		return true;
	}

	/**
	 * Drops the target item in front of the player.
	 */
	public function execute(Player $source) : void{
		$source->dropItem($this->targetItem);
	}
}
