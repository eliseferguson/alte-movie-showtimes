<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://www.saturdaynightbattleship.com
 * @since      1.0.0
 *
 * @package    Alte_Movie_Showtimes
 * @subpackage Alte_Movie_Showtimes/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Alte_Movie_Showtimes
 * @subpackage Alte_Movie_Showtimes/admin
 * @author     Elise Ferguson <egaetz@gmail.com>
 */
class Alte_Movie_Showtimes_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		$this::actions();

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Alte_Movie_Showtimes_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Alte_Movie_Showtimes_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/alte-movie-showtimes-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Alte_Movie_Showtimes_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Alte_Movie_Showtimes_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/alte-movie-showtimes-admin.js', array( 'jquery' ), $this->version, false );

	}

	public function actions() {
		add_action( 'admin_menu', array( $this, 'create_plugin_settings_page' ) );
		add_action( 'admin_init', array( $this, 'setup_sections' ) );
		add_action( 'admin_init', array( $this, 'setup_fields' ) );
	}
	public function create_plugin_settings_page() {
	    // Add the menu item and page
	    $page_title = 'Movie Showtimes Settings Page';
	    $menu_title = 'Movie Showtimes';
	    $capability = 'manage_options';
	    $slug = 'alte_movie_showtimes_admin_page';
	    $callback = array( 'Alte_Movie_Showtimes_Admin', 'plugin_settings_page_content' );
	    $icon = 'dashicons-tickets';
	    $position = 6;

	    add_menu_page( $page_title, $menu_title, $capability, $slug, $callback, $icon, $position );
	}
	public static function plugin_settings_page_content() {
		require('partials/alte-movie-showtimes-admin-display.php');
	}
	public static function setup_sections() {
	    add_settings_section( 'movie_1_section', 'Movie 1 Showtimes', array( 'Alte_Movie_Showtimes_Admin', 'section_callback' ), 'alte_movie_showtimes_admin_page' );
		add_settings_section( 'movie_2_section', 'Movie 2 Showtimes', array( 'Alte_Movie_Showtimes_Admin', 'section_callback' ), 'alte_movie_showtimes_admin_page' );

	}
	public static function section_callback( $arguments ) {
		switch( $arguments['id'] ){
	        case 'movie_1_section':
	            echo 'This is the first description here!';
	            break;
	        case 'movie_2_section':
	            echo 'This one is number two';
	            break;
	        case 'movie_3_section':
	            echo 'Third time is the charm!';
	            break;
	    }
	}
	public static function setup_fields() {
	    add_settings_field( 'imdb_code_1', 'Imdb Code', array( 'Alte_Movie_Showtimes_Admin', 'field_callback' ), 'alte_movie_showtimes_admin_page', 'movie_1_section' );
		// add_settings_field( 'movie_title_1', 'Movie Title', array( 'Alte_Movie_Showtimes_Admin', 'field_callback' ), 'alte_movie_showtimes_admin_page', 'movie_1_section' );

	}
	public static function field_callback( $arguments ) {
    	echo '<input name="imdb_code_1" id="imdb_code_1" type="text" value="' . get_option( 'imdb_code_1' ) . '" /><br/>';
		register_setting( 'alte_movie_showtimes_admin_page', 'imdb_code_1' );
    	// echo '<input name="movie_title_1" id="movie_title_1" type="text" value="' . get_option( 'movie_title_1' ) . '" /><br/>';
	}


}


function alte_movie_showtimes_shortcode( $atts, $content=null ) {
	extract(shortcode_atts( array(
		'which_movie' => '1',
		'span_week' => "yes"
	), $atts ));

	if( $span_week == "yes" ) $span_week = 1;
	if( $span_week == "no" ) $span_week = 0;

	// get the data from the options table, this should be an array for each movie
	// $options = get_option('');
	// $movie1_options = $options

	ob_start();
	require('partials/alte-movie-showtimes-front-end-shortcode.php');
	$content = ob_get_clean();
	return $content;
}
add_shortcode( 'movie_showtimes', 'alte_movie_showtimes_shortcode' );
