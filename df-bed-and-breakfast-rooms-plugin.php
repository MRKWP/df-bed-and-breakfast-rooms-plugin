<?php
/**
 * Plugin Name:     Bed & Breakfast Rooms Plugin
 * Description:     Bed & Breakfast Rooms Plugin
 * Author:          M R K Development Pty Ltd
 * Author URI:      https://www.mrkwp.com
 * Text Domain:     df-bed-and-breakfast-rooms-plugin
 * Domain Path:     /languages
 * Version:         1.0.0
 *
 * @package
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

define('DF_BNB_ROOM_VERSION', '1.0.0');
define('DF_BNB_ROOM_DIR', __DIR__);
define('DF_BNB_ROOM_URL', plugins_url('/' . basename(__DIR__)));

require_once DF_BNB_ROOM_DIR . '/vendor/autoload.php';

$container = \DF_BNB_ROOM\Container::getInstance();
$container['plugin_name'] = 'Bed & Breakfast Rooms Plugin';
$container['plugin_version'] = DF_BNB_ROOM_VERSION;
$container['plugin_file'] = __FILE__;
$container['plugin_dir'] = DF_BNB_ROOM_DIR;
$container['plugin_url'] = DF_BNB_ROOM_URL;
$container['plugin_slug'] = 'df-bed-and-breakfast-rooms-plugin';

// activation hook.
register_activation_hook(__FILE__, array($container['activation'], 'install'));

$container->run();
