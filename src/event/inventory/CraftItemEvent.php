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

use pocketmine\crafting\CraftingRecipe;
use pocketmine\event\Cancellable;
use pocketmine\event\CancellableTrait;
use pocketmine\event\Event;
use pocketmine\inventory\transaction\CraftingTransaction;
use pocketmine\item\Item;
use pocketmine\player\Player;
use pocketmine\utils\Utils;

class CraftItemEvent extends Event implements Cancellable{
	use CancellableTrait;

	/**
	 * @param Item[] $inputs
	 * @param Item[] $outputs
	 */
	public function __construct(
		private CraftingTransaction $transaction,
		private CraftingRecipe $recipe,
		private int $repetitions,
		private array $inputs,
		private array $outputs
	){}

	/**
	 * Returns the inventory transaction involved in this crafting event.
	 */
	public function getTransaction() : CraftingTransaction{
		return $this->transaction;
	}

	/**
	 * Returns the recipe crafted.
	 */
	public function getRecipe() : CraftingRecipe{
		return $this->recipe;
	}

	/**
	 * Returns the number of times the recipe was crafted. This is usually 1, but might be more in the case of recipe
	 * book shift-clicks (which craft lots of items in a batch).
	 */
	public function getRepetitions() : int{
		return $this->repetitions;
	}

	/**
	 * Returns a list of items destroyed as ingredients of the recipe.
	 *
	 * @return Item[]
	 */
	public function getInputs() : array{
		return Utils::cloneObjectArray($this->inputs);
	}

	/**
	 * Returns a list of items created by crafting the recipe.
	 *
	 * @return Item[]
	 */
	public function getOutputs() : array{
		return Utils::cloneObjectArray($this->outputs);
	}

	public function getPlayer() : Player{
		return $this->transaction->getSource();
	}
}
