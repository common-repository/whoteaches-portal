<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://whoteaches.com
 * @since             1.0.0
 * @package           Whoteaches_Portal
 *
 * @wordpress-plugin
 * Plugin Name:       WhoTeaches Portal
 * Plugin URI:        https://whoteaches.com/plugins
 * Description:       <strong>The WhoTeaches Portal WordPress Plugin</strong> enables embedding of any WhoTeaches profile and individual Package/s on any page or post in your WordPress site with an easy-to-use shortcode.
 * Version:           1.0.0
 * Author:            WhoTeaches
 * Author URI:        https://whoteaches.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       whoteaches-portal
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-whoteaches-portal-activator.php
 */
function activate_whoteaches_portal() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-whoteaches-portal-activator.php';
	Whoteaches_Portal_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-whoteaches-portal-deactivator.php
 */
function deactivate_whoteaches_portal() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-whoteaches-portal-deactivator.php';
	Whoteaches_Portal_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_whoteaches_portal' );
register_deactivation_hook( __FILE__, 'deactivate_whoteaches_portal' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-whoteaches-portal.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_whoteaches_portal() {

	$plugin = new Whoteaches_Portal();
	$plugin->run();

}
run_whoteaches_portal();