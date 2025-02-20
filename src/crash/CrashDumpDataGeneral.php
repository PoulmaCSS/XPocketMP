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

final class CrashDumpDataGeneral{

	/**
	 * @param string[] $composer_libraries
	 * @phpstan-param array<string, string> $composer_libraries
	 */
	public function __construct(
		public string $name,
		public string $base_version,
		public int $build,
		public bool $is_dev,
		public int $protocol,
		public string $git,
		public string $uname,
		public string $php,
		public string $zend,
		public string $php_os,
		public string $os,
		public array $composer_libraries,
	){}
}
