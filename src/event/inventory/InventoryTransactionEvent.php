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

namespace pocketmine\event\inventory;

use pocketmine\event\Cancellable;
use pocketmine\event\CancellableTrait;
use pocketmine\event\Event;
use pocketmine\inventory\transaction\InventoryTransaction;

/**
 * Called when a player performs actions involving items in inventories.
 *
 * This may involve multiple inventories, and may include actions such as:
 * - moving items from one slot to another
 * - splitting itemstacks
 * - dragging itemstacks across inventory slots (slot painting)
 * - dropping an item on the ground
 * - taking an item from the creative inventory menu
 * - destroying (trashing) an item
 *
 * @see https://doc.pmmp.io/en/rtfd/developer-reference/inventory-transactions.html for more information on inventory transactions
 */
class InventoryTransactionEvent extends Event implements Cancellable{
	use CancellableTrait;

	public function __construct(private InventoryTransaction $transaction){}

	public function getTransaction() : InventoryTransaction{
		return $this->transaction;
	}
}
