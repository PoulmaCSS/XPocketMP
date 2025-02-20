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

namespace pocketmine\data\bedrock;

use pocketmine\block\utils\MushroomBlockType;
use pocketmine\data\bedrock\block\BlockLegacyMetadata as LegacyMeta;
use pocketmine\utils\SingletonTrait;

final class MushroomBlockTypeIdMap{
	use SingletonTrait;
	/** @phpstan-use IntSaveIdMapTrait<MushroomBlockType> */
	use IntSaveIdMapTrait;

	public function __construct(){
		foreach(MushroomBlockType::cases() as $case){
			$this->register(match($case){
				MushroomBlockType::PORES => LegacyMeta::MUSHROOM_BLOCK_ALL_PORES,
				MushroomBlockType::CAP_NORTHWEST => LegacyMeta::MUSHROOM_BLOCK_CAP_NORTHWEST_CORNER,
				MushroomBlockType::CAP_NORTH => LegacyMeta::MUSHROOM_BLOCK_CAP_NORTH_SIDE,
				MushroomBlockType::CAP_NORTHEAST => LegacyMeta::MUSHROOM_BLOCK_CAP_NORTHEAST_CORNER,
				MushroomBlockType::CAP_WEST => LegacyMeta::MUSHROOM_BLOCK_CAP_WEST_SIDE,
				MushroomBlockType::CAP_MIDDLE => LegacyMeta::MUSHROOM_BLOCK_CAP_TOP_ONLY,
				MushroomBlockType::CAP_EAST => LegacyMeta::MUSHROOM_BLOCK_CAP_EAST_SIDE,
				MushroomBlockType::CAP_SOUTHWEST => LegacyMeta::MUSHROOM_BLOCK_CAP_SOUTHWEST_CORNER,
				MushroomBlockType::CAP_SOUTH => LegacyMeta::MUSHROOM_BLOCK_CAP_SOUTH_SIDE,
				MushroomBlockType::CAP_SOUTHEAST => LegacyMeta::MUSHROOM_BLOCK_CAP_SOUTHEAST_CORNER,
				MushroomBlockType::ALL_CAP => LegacyMeta::MUSHROOM_BLOCK_ALL_CAP,
			}, $case);
		}
	}
}
