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

	public static function actions() {
		add_action( 'admin_menu', array( 'Alte_Movie_Showtimes_Admin', 'showtimes_admin_menu' ) );
		add_action( 'admin_init', array( 'Alte_Movie_Showtimes_Admin', 'register_settings' ) );
	}

	public static function showtimes_admin_menu() {
		// create the admin page
		add_menu_page(
			__( 'Set Movie Showtimes', 'alte-movie-showtimes' ),
			'Movie Showtimes',
			'manage_options',
			'custompage',
			array( 'Alte_Movie_Showtimes_Admin', 'alte_movie_showtimes_admin_page' ),
			'dashicons-tickets',
			6
		);
	}

	public static function alte_movie_showtimes_admin_page() {
	    require('partials/alte-movie-showtimes-admin-display.php');
	}


	public static function register_settings() {
		// Settings for movie 1
		//TODO: there's got to be a better way to do this?
		register_setting( 'alte-movie-showtimes-settings-group', 'movie_title_1' );
		register_setting( 'alte-movie-showtimes-settings-group', 'imdb_code_1' );

		register_setting( 'alte-movie-showtimes-settings-group', 'movie1_date_1' );
		register_setting( 'alte-movie-showtimes-settings-group', 'movie1_time_1-1' );
		register_setting( 'alte-movie-showtimes-settings-group', 'movie1_time_1-2' );

		register_setting( 'alte-movie-showtimes-settings-group', 'movie1_date_2' );
		register_setting( 'alte-movie-showtimes-settings-group', 'movie1_time_2-1' );
		register_setting( 'alte-movie-showtimes-settings-group', 'movie1_time_2-2' );

		register_setting( 'alte-movie-showtimes-settings-group', 'movie1_date_3' );
		register_setting( 'alte-movie-showtimes-settings-group', 'movie1_time_3-1' );
		register_setting( 'alte-movie-showtimes-settings-group', 'movie1_time_3-2' );

		register_setting( 'alte-movie-showtimes-settings-group', 'movie1_date_4' );
		register_setting( 'alte-movie-showtimes-settings-group', 'movie1_time_4-1' );
		register_setting( 'alte-movie-showtimes-settings-group', 'movie1_time_4-2' );

		register_setting( 'alte-movie-showtimes-settings-group', 'movie1_date_5' );
		register_setting( 'alte-movie-showtimes-settings-group', 'movie1_time_5-1' );
		register_setting( 'alte-movie-showtimes-settings-group', 'movie1_time_5-2' );

		register_setting( 'alte-movie-showtimes-settings-group', 'movie1_date_6' );
		register_setting( 'alte-movie-showtimes-settings-group', 'movie1_time_6-1' );
		register_setting( 'alte-movie-showtimes-settings-group', 'movie1_time_6-2' );

		register_setting( 'alte-movie-showtimes-settings-group', 'movie1_date_7' );
		register_setting( 'alte-movie-showtimes-settings-group', 'movie1_time_7-1' );
		register_setting( 'alte-movie-showtimes-settings-group', 'movie1_time_7-2' );


		// Settings for movie 2
		register_setting( 'alte-movie-showtimes-settings-group', 'movie_title_2' );
		register_setting( 'alte-movie-showtimes-settings-group', 'imdb_code_2' );

		register_setting( 'alte-movie-showtimes-settings-group', 'movie2_date_1' );
		register_setting( 'alte-movie-showtimes-settings-group', 'movie2_time_1-1' );
		register_setting( 'alte-movie-showtimes-settings-group', 'movie2_time_1-2' );

		register_setting( 'alte-movie-showtimes-settings-group', 'movie2_date_2' );
		register_setting( 'alte-movie-showtimes-settings-group', 'movie2_time_2-1' );
		register_setting( 'alte-movie-showtimes-settings-group', 'movie2_time_2-2' );

		register_setting( 'alte-movie-showtimes-settings-group', 'movie2_date_3' );
		register_setting( 'alte-movie-showtimes-settings-group', 'movie2_time_3-1' );
		register_setting( 'alte-movie-showtimes-settings-group', 'movie2_time_3-2' );

		register_setting( 'alte-movie-showtimes-settings-group', 'movie2_date_4' );
		register_setting( 'alte-movie-showtimes-settings-group', 'movie2_time_4-1' );
		register_setting( 'alte-movie-showtimes-settings-group', 'movie2_time_4-2' );

		register_setting( 'alte-movie-showtimes-settings-group', 'movie2_date_5' );
		register_setting( 'alte-movie-showtimes-settings-group', 'movie2_time_5-1' );
		register_setting( 'alte-movie-showtimes-settings-group', 'movie2_time_5-2' );

		register_setting( 'alte-movie-showtimes-settings-group', 'movie2_date_6' );
		register_setting( 'alte-movie-showtimes-settings-group', 'movie2_time_6-1' );
		register_setting( 'alte-movie-showtimes-settings-group', 'movie2_time_6-2' );

		register_setting( 'alte-movie-showtimes-settings-group', 'movie2_date_7' );
		register_setting( 'alte-movie-showtimes-settings-group', 'movie2_time_7-1' );
		register_setting( 'alte-movie-showtimes-settings-group', 'movie2_time_7-2' );
	}

	public static function alte_movie_showtimes_shortcode( $atts, $content=null ) {
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
}
