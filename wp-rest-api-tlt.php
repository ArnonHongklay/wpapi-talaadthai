<?php

/**
 *    Plugin Name:      WP API TALAADTHAI
 *    Plugin URI:       https://www.nonmadden.com
 *    Description:      WP API AUTH enables a UI to toggle endpoints in the REST API.
 *    Version:          1.0.0
 *    Author:           Non Madden
 *    Plugin URI:       https://github.com/nonmadden/wp-api-tlt
 *    Author URI:       https://www.nonmadden.com
 *    License:          GPL-3.0+
 *    License URI:      http://www.gnu.org/licenses/gpl-3.0.txt
 *    Text Domain:      wp-api-tlt
 *    Domain Path:      /languages
**/

if (! defined('WPINC')) {
    die;
}

if (! defined('ABSPATH')) {
    die("You can't do anything by accessing this file directly.");
}

if (!function_exists('is_plugin_active')) {
    require_once(ABSPATH . '/wp-admin/includes/plugin.php');
}

add_action('rest_api_init', 'run_wp_api_tlt');
require plugin_dir_path(__FILE__) . '/includes/endpoints/class-wp-api-tlt-controller.php';

function run_wp_api_tlt()
{
    $plugin = new wp_api_tlt();
    $plugin->register_routes();
}

// run_wp_api_tlt();
