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

use pocketmine\network\mcpe\protocol\ProtocolInfo;
use pocketmine\VersionInfo;

require dirname(__DIR__) . '/vendor/autoload.php';

if(count($argv) !== 7){
	fwrite(STDERR, "required args: <git hash> <tag name> <github repo (owner/name)> <build number> <github actions run ID> <PHP binary download URL>\n");
	exit(1);
}

echo json_encode([
	"php_version" => sprintf("%d.%d", PHP_MAJOR_VERSION, PHP_MINOR_VERSION), //deprecated
	"base_version" => VersionInfo::BASE_VERSION,
	"build" => (int) $argv[4],
	"is_dev" => VersionInfo::IS_DEVELOPMENT_BUILD,
	"channel" => VersionInfo::BUILD_CHANNEL,
	"git_commit" => $argv[1],
	"mcpe_version" => ProtocolInfo::MINECRAFT_VERSION_NETWORK,
	"date" => time(), //TODO: maybe we should embed this in VersionInfo?
	"details_url" => "https://github.com/$argv[3]/releases/tag/$argv[2]",
	"download_url" => "https://github.com/$argv[3]/releases/download/$argv[2]/XPocketMP.phar",
	"source_url" => "https://github.com/$argv[3]/tree/$argv[2]",
	"build_log_url" => "https://github.com/$argv[3]/actions/runs/$argv[5]",
	"php_download_url" => $argv[6],
], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_THROW_ON_ERROR) . "\n";
