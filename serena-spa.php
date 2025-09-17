<?php
/**
* Serena Spa
*
* @package           PluginPackage
* @author            iExist
* @copyright         2025 iExist
* @license           GPL-2.0-or-later
*
* @wordpress-plugin
* Plugin Name:       Serena Spa
* Plugin URI:        https://www.serenaspa.nl/
* Description:       Description of the plugin.
* Version:           1.0.0
* Requires at least: 5.2
* Requires PHP:      8.3
* Author:            Your Name
* Author URI:        https://example.com
* Text Domain:       plugin-slug
* License:           GPL v2 or later
* License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
* Update URI:        https://example.com/my-plugin/
*/

if ( ! defined( 'ABSPATH' ) ) {exit;}

function serena_spa_init() {
    require_once plugin_dir_path(__FILE__) . 'includes/GalleryShortcode.php';
    require_once plugin_dir_path(__FILE__) . 'includes/GetProjectGallery.php';
}
add_action('init', 'serena_spa_init');

function serena_spa_enqueue_styles() {
    if (is_singular('project')){
        wp_enqueue_style('serena-spa-style', plugins_url('assets/css/main.css', __FILE__), array(), '1.0.0', 'all');
    }
}
add_action('wp_enqueue_scripts', 'serena_spa_enqueue_styles');

function serena_spa_activate() {
    flush_rewrite_rules();
}

register_activation_hook(__FILE__, 'serena_spa_activate');
