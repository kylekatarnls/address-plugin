<?php
/**
 * The plugin bootstrap file.
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/yoanmarchal/address-plugin/
 * @since             1.0.0
 *
 * @wordpress-plugin
 * Plugin Name:       address Plugin
 * Plugin URI:        https://github.com/yoanmarchal/address-plugin/
 * Description:       Simple plugin for save && retrive address
 * Version:           1.0.1
 * Author:            Yoan marchal
 * Author URI:        http://yoanmarchal.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       address-plugin
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-address-plugin-activator.php.
 */
function activate_address_plugin()
{
    require_once plugin_dir_path(__FILE__).'includes/class-address-plugin-activator.php';
    address_plugin_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-address-plugin-deactivator.php.
 */
function deactivate_address_plugin()
{
    require_once plugin_dir_path(__FILE__).'includes/class-address-plugin-deactivator.php';
    address_plugin_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_address_plugin');
register_deactivation_hook(__FILE__, 'deactivate_address_plugin');

/*
 * The class responsible for update plugin
 *
 */
if (!class_exists('Smashing_Updater')) {
    require_once plugin_dir_path(__FILE__).'includes/class-updater.php';
}

/*
 * Load Smashing_Updater class
 *
 */
$updater = new Smashing_Updater(__FILE__);
$updater->set_username('yoanmarchal');
$updater->set_repository('address-plugin');
/*
$updater->authorize( 'abcdefghijk1234567890' ); // Your auth code goes here for private repos
*/
/*
 * init Smashing_Updater class with params
 *
 */
$updater->initialize();

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__).'includes/class-address-plugin.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_address_plugin()
{
    $plugin = new address_plugin();
    $plugin->run();
}
run_address_plugin();
