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

namespace pocketmine\event\block;

use pocketmine\block\Block;
use pocketmine\entity\Entity;
use pocketmine\event\Cancellable;
use pocketmine\event\CancellableTrait;
use pocketmine\inventory\Inventory;
use pocketmine\item\Item;

/**
 * Called when a block picks up an item, arrow, etc.
 */
class BlockItemPickupEvent extends BlockEvent implements Cancellable{
	use CancellableTrait;

	public function __construct(
		Block $collector,
		private Entity $origin,
		private Item $item,
		private ?Inventory $inventory
	){
		parent::__construct($collector);
	}

	public function getOrigin() : Entity{
		return $this->origin;
	}

	/**
	 * Items to be received
	 */
	public function getItem() : Item{
		return clone $this->item;
	}

	/**
	 * Change the items to receive.
	 */
	public function setItem(Item $item) : void{
		$this->item = clone $item;
	}

	/**
	 * Inventory to which received items will be added.
	 */
	public function getInventory() : ?Inventory{
		return $this->inventory;
	}

	/**
	 * Change the inventory to which received items are added.
	 */
	public function setInventory(?Inventory $inventory) : void{
		$this->inventory = $inventory;
	}
}
