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

namespace pocketmine\crafting\json;

use function count;

final class ShapedRecipeData implements \JsonSerializable{
	/**
	 * @required
	 * @var string[]
	 * @phpstan-var list<string>
	 */
	public array $shape;

	/**
	 * @required
	 * @var RecipeIngredientData[]
	 * @phpstan-var array<string, RecipeIngredientData>
	 */
	public array $input;

	/**
	 * @required
	 * @var ItemStackData[]
	 * @phpstan-var list<ItemStackData>
	 */
	public array $output;

	/** @required */
	public string $block;

	/** @required */
	public int $priority;

	/** @var RecipeIngredientData[] */
	public array $unlockingIngredients = [];

	/**
	 * TODO: convert this to use promoted properties - avoiding them for now since it would break JsonMapper
	 *
	 * @param string[]               $shape
	 * @param RecipeIngredientData[] $input
	 * @param ItemStackData[]        $output
	 * @param RecipeIngredientData[] $unlockingIngredients
	 *
	 * @phpstan-param list<string> $shape
	 * @phpstan-param array<string, RecipeIngredientData> $input
	 * @phpstan-param list<ItemStackData> $output
	 * @phpstan-param list<RecipeIngredientData> $unlockingIngredients
	 */
	public function __construct(array $shape, array $input, array $output, string $block, int $priority, array $unlockingIngredients = []){
		$this->block = $block;
		$this->priority = $priority;
		$this->shape = $shape;
		$this->input = $input;
		$this->output = $output;
		$this->unlockingIngredients = $unlockingIngredients;
	}

	/**
	 * @return mixed[]
	 */
	public function jsonSerialize() : array{
		$result = (array) $this;
		if(count($this->unlockingIngredients) === 0){
			unset($result["unlockingIngredients"]);
		}
		return $result;
	}
}
