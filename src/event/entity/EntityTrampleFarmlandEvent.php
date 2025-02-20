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

namespace pocketmine\event\entity;

use pocketmine\block\Block;
use pocketmine\entity\Living;
use pocketmine\event\Cancellable;
use pocketmine\event\CancellableTrait;

/**
 * @phpstan-extends EntityEvent<Living>
 */
class EntityTrampleFarmlandEvent extends EntityEvent implements Cancellable{
	use CancellableTrait;

	public function __construct(
		Living $entity,
		private Block $block
	){
		$this->entity = $entity;
	}

	public function getBlock() : Block{
		return $this->block;
	}
}
