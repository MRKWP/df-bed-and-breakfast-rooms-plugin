<?php
/**
 * PHPUnit bootstrap file
 *
 * @package 
 */

$_tests_dir = 'wordpress-tests-lib';

// Give access to tests_add_filter() function.
require_once $_tests_dir . '/includes/functions.php';

/**
 * Manually load the plugin being tested.
 */
function _manually_load_plugin()
{
    require dirname(dirname(__FILE__)) . '/df-bed-and-breakfast-rooms-plugin.php';
}
tests_add_filter('muplugins_loaded', '_manually_load_plugin');

// Start up the WP testing environment.
require $_tests_dir . '/includes/bootstrap.php';
