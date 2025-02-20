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

namespace pocketmine\item;

use pocketmine\block\Block;
use pocketmine\block\RuntimeBlockStateRegistry;
use pocketmine\math\Axis;
use pocketmine\math\Facing;

class ItemBlockWallOrFloor extends Item{
	private int $floorVariant;
	private int $wallVariant;

	public function __construct(ItemIdentifier $identifier, Block $floorVariant, Block $wallVariant){
		parent::__construct($identifier, $floorVariant->getName());
		$this->floorVariant = $floorVariant->getStateId();
		$this->wallVariant = $wallVariant->getStateId();
	}

	public function getBlock(?int $clickedFace = null) : Block{
		if($clickedFace !== null && Facing::axis($clickedFace) !== Axis::Y){
			return RuntimeBlockStateRegistry::getInstance()->fromStateId($this->wallVariant);
		}
		return RuntimeBlockStateRegistry::getInstance()->fromStateId($this->floorVariant);
	}

	public function getFuelTime() : int{
		return $this->getBlock()->getFuelTime();
	}

	public function getMaxStackSize() : int{
		return $this->getBlock()->getMaxStackSize();
	}
}
