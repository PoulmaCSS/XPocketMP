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

namespace pocketmine\data\runtime;

/**
 * Provides backwards-compatible shims for the old codegen'd enum describer methods.
 * This is kept for plugin backwards compatibility, but these functions should not be used in new code.
 * @deprecated
 */
interface RuntimeEnumDescriber{

	public function bellAttachmentType(\pocketmine\block\utils\BellAttachmentType &$value) : void;

	public function copperOxidation(\pocketmine\block\utils\CopperOxidation &$value) : void;

	public function coralType(\pocketmine\block\utils\CoralType &$value) : void;

	public function dirtType(\pocketmine\block\utils\DirtType &$value) : void;

	public function dripleafState(\pocketmine\block\utils\DripleafState &$value) : void;

	public function dyeColor(\pocketmine\block\utils\DyeColor &$value) : void;

	public function froglightType(\pocketmine\block\utils\FroglightType &$value) : void;

	public function leverFacing(\pocketmine\block\utils\LeverFacing &$value) : void;

	public function medicineType(\pocketmine\item\MedicineType &$value) : void;

	public function mobHeadType(\pocketmine\block\utils\MobHeadType &$value) : void;

	public function mushroomBlockType(\pocketmine\block\utils\MushroomBlockType &$value) : void;

	public function potionType(\pocketmine\item\PotionType &$value) : void;

	public function slabType(\pocketmine\block\utils\SlabType &$value) : void;

	public function suspiciousStewType(\pocketmine\item\SuspiciousStewType &$value) : void;

}
