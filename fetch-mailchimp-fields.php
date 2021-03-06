<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              wordpress.org
 * @package           Fetch_Mailchimp_Fields
 *
 * @wordpress-plugin
 * Plugin Name:       Fetch Mailchimp Fields
 * Plugin URI:        https://bitbucket.org/pasok/fetch-mailchimp-fields
 * Description:       Lookup a Subscriber in Mailchimp List and get their merge field details.
 * Version:           1.6.1
 * Author:            nosokam
 * Author URI:        https://twitter.com/nosokam
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       fetch-mailchimp-fields
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'FETCH_MAILCHIMP_FIELDS_VERSION', '1.6.1' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-fetch-mailchimp-fields-activator.php
 */
function activate_fetch_mailchimp_fields() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-fetch-mailchimp-fields-activator.php';
	Fetch_Mailchimp_Fields_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-fetch-mailchimp-fields-deactivator.php
 */
function deactivate_fetch_mailchimp_fields() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-fetch-mailchimp-fields-deactivator.php';
	Fetch_Mailchimp_Fields_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_fetch_mailchimp_fields' );
register_deactivation_hook( __FILE__, 'deactivate_fetch_mailchimp_fields' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-fetch-mailchimp-fields.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 */
function run_fetch_mailchimp_fields() {

	$plugin = new Fetch_Mailchimp_Fields();
	$plugin->run();

}
run_fetch_mailchimp_fields();
