<?php

/**
 * The plugin bootstrap file
 *
 *
 * @link              http://www.saturdaynightbattleship.com
 * @since             1.0.0
 * @package           Alte_Movie_Showtimes
 *
 * @wordpress-plugin
 * Plugin Name:       ALTE Movie Showtimes
 * Plugin URI:        https://github.com/eliseferguson/alte-movie-showtimes
 * Description:       Enter and display movie showtimes without having to style or create schema by hand.  Connects with ALTE Movie Info plugin (alte-movie-info).
 * Version:           1.0.0
 * Author:            Elise Ferguson
 * Author URI:        http://www.saturdaynightbattleship.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       alte-movie-showtimes
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// define( 'PLUGIN_NAME_VERSION', '1.0.0' );
if (!defined('ALTE_MOVIE_SHOWTIMES_VERSION')) define('ALTE_MOVIE_SHOWTIMES_VERSION', '1.0.0');

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-alte-movie-showtimes-activator.php
 */
function activate_alte_movie_showtimes() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-alte-movie-showtimes-activator.php';
	Alte_Movie_Showtimes_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-alte-movie-showtimes-deactivator.php
 */
function deactivate_alte_movie_showtimes() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-alte-movie-showtimes-deactivator.php';
	Alte_Movie_Showtimes_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_alte_movie_showtimes' );
register_deactivation_hook( __FILE__, 'deactivate_alte_movie_showtimes' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-alte-movie-showtimes.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_alte_movie_showtimes() {

	$plugin = new Alte_Movie_Showtimes();
	$plugin->run();

}
run_alte_movie_showtimes();
