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

namespace pocketmine;

use function define;
use function defined;
use function dirname;

// composer autoload doesn't use require_once and also pthreads can inherit things
if(defined('pocketmine\_CORE_CONSTANTS_INCLUDED')){
	return;
}
define('pocketmine\_CORE_CONSTANTS_INCLUDED', true);

define('pocketmine\PATH', dirname(__DIR__) . '/');
define('pocketmine\RESOURCE_PATH', dirname(__DIR__) . '/resources/');
define('pocketmine\BEDROCK_DATA_PATH', dirname(__DIR__) . '/vendor/pocketmine/bedrock-data/');
define('pocketmine\LOCALE_DATA_PATH', dirname(__DIR__) . '/vendor/pocketmine/locale-data/');
define('pocketmine\BEDROCK_BLOCK_UPGRADE_SCHEMA_PATH', dirname(__DIR__) . '/vendor/pocketmine/bedrock-block-upgrade-schema/');
define('pocketmine\BEDROCK_ITEM_UPGRADE_SCHEMA_PATH', dirname(__DIR__) . '/vendor/pocketmine/bedrock-item-upgrade-schema/');
define('pocketmine\COMPOSER_AUTOLOADER_PATH', dirname(__DIR__) . '/vendor/autoload.php');
