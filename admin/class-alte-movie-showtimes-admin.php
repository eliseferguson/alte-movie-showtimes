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
	            echo 'Set times for movie #1 here';
	            break;
	        case 'movie_2_section':
	            echo 'Set times for movie #2 here';
	            break;
	        // case 'movie_3_section':
	        //     echo 'Third time is the charm!';
	        //     break;
	    }
	}
	public static function setup_fields() {
	 	// Add all fields we need to array
		// TODO: this is annoyingly huge, isn't there a better way?

		// TODO: add supplmental note about date format, and format how that displays in the admin page with CSS
		$fields = array(
				array(
					'uid' => 'movie_title_1', 'class' => 'movie_title', 'row-id' => '', 'label' => 'Title', 'section' => 'movie_1_section', 'type' => 'text', 'options' => false, 'placeholder' => 'Title', 'helper' => '', 'supplemental' => '', 'default' => ''
				),
		        array(
		            'uid' => 'imdb_code_1', 'class' => 'movie_id', 'row-id' => '', 'label' => 'Imdb Code', 'section' => 'movie_1_section', 'type' => 'text', 'options' => false, 'placeholder' => 'Imdb Code', 'helper' => '', 'supplemental' => 'Use the code (like ttXXXXXXX) from the IMDB url - http://www.imdb.com/title/ttXXXXXXX/?ref_=nv_sr_1', 'default' => ''
		        ),
				//Movie date/time 1
				array(
					'uid' => 'movie1_date_1', 'class' => 'movie_date', 'row-id' => 'row_1', 'label' => 'Date', 'section' => 'movie_1_section', 'type' => 'text', 'options' => false, 'placeholder' => 'Date', 'helper' => '', 'supplemental' => '', 'default' => ''
				),
				array(
					'uid' => 'movie1_time_1-1', 'class' => 'movie_time_1', 'row-id' => 'row_1', 'label' => 'Time 1', 'section' => 'movie_1_section', 'type' => 'text', 'options' => false, 'placeholder' => 'Time 1', 'helper' => '', 'supplemental' => '', 'default' => ''
				),
				array(
					'uid' => 'movie1_time_1-2', 'class' => 'movie_time_2', 'row-id' => 'row_1', 'label' => 'Time 2', 'section' => 'movie_1_section', 'type' => 'text', 'options' => false, 'placeholder' => 'Time 2', 'helper' => '', 'supplemental' => '', 'default' => ''
				),
				//Movie date/time 2
				array(
					'uid' => 'movie1_date_2', 'class' => 'movie_date', 'row-id' => 'row_2', 'label' => 'Date', 'section' => 'movie_1_section', 'type' => 'text', 'options' => false, 'placeholder' => 'Date', 'helper' => '', 'supplemental' => '', 'default' => ''
				),
				array(
					'uid' => 'movie1_time_2-1', 'class' => 'movie_time_1', 'row-id' => 'row_2', 'label' => 'Time 1', 'section' => 'movie_1_section', 'type' => 'text', 'options' => false, 'placeholder' => 'Time 1', 'helper' => '', 'supplemental' => '', 'default' => ''
				),
				array(
					'uid' => 'movie1_time_2-2', 'class' => 'movie_time_2', 'row-id' => 'row_2', 'label' => 'Time 2', 'section' => 'movie_1_section', 'type' => 'text', 'options' => false, 'placeholder' => 'Time 2', 'helper' => '', 'supplemental' => '', 'default' => ''
				),
				//Movie date/time 3
				array(
					'uid' => 'movie1_date_3', 'class' => 'movie_date', 'row-id' => 'row_3', 'label' => 'Date', 'section' => 'movie_1_section', 'type' => 'text', 'options' => false, 'placeholder' => 'Date', 'helper' => '', 'supplemental' => '', 'default' => ''
				),
				array(
					'uid' => 'movie1_time_3-1', 'class' => 'movie_time_1', 'row-id' => 'row_3', 'label' => 'Time 1', 'section' => 'movie_1_section', 'type' => 'text', 'options' => false, 'placeholder' => 'Time 1', 'helper' => '', 'supplemental' => '', 'default' => ''
				),
				array(
					'uid' => 'movie1_time_3-2', 'class' => 'movie_time_2', 'row-id' => 'row_3', 'label' => 'Time 2', 'section' => 'movie_1_section', 'type' => 'text', 'options' => false, 'placeholder' => 'Time 2', 'helper' => '', 'supplemental' => '', 'default' => ''
				),
				//Movie date/time 4
				array(
					'uid' => 'movie1_date_4', 'class' => 'movie_date', 'row-id' => 'row_4', 'label' => 'Date', 'section' => 'movie_1_section', 'type' => 'text', 'options' => false, 'placeholder' => 'Date', 'helper' => '', 'supplemental' => '', 'default' => ''
				),
				array(
					'uid' => 'movie1_time_4-1', 'class' => 'movie_time_1', 'row-id' => 'row_4', 'label' => 'Time 1', 'section' => 'movie_1_section', 'type' => 'text', 'options' => false, 'placeholder' => 'Time 1', 'helper' => '', 'supplemental' => '', 'default' => ''
				),
				array(
					'uid' => 'movie1_time_4-2', 'class' => 'movie_time_2', 'row-id' => 'row_4', 'label' => 'Time 2', 'section' => 'movie_1_section', 'type' => 'text', 'options' => false, 'placeholder' => 'Time 2', 'helper' => '', 'supplemental' => '', 'default' => ''
				),
				//Movie date/time 5
				array(
					'uid' => 'movie1_date_5', 'class' => 'movie_date', 'row-id' => 'row_5', 'label' => 'Date', 'section' => 'movie_1_section', 'type' => 'text', 'options' => false, 'placeholder' => 'Date', 'helper' => '', 'supplemental' => '', 'default' => ''
				),
				array(
					'uid' => 'movie1_time_5-1', 'class' => 'alte_movie_showtimes_admin_pagemovie_time_1', 'row-id' => 'row_5', 'label' => 'Time 1', 'section' => 'movie_1_section', 'type' => 'text', 'options' => false, 'placeholder' => 'Time 1', 'helper' => '', 'supplemental' => '', 'default' => ''
				),
				array(
					'uid' => 'movie1_time_5-2', 'class' => 'movie_time_2', 'row-id' => 'row_5', 'label' => 'Time 2', 'section' => 'movie_1_section', 'type' => 'text', 'options' => false, 'placeholder' => 'Time 2', 'helper' => '', 'supplemental' => '', 'default' => ''
				),
				//Movie date/time 6
				array(
					'uid' => 'movie1_date_6', 'class' => 'movie_date', 'row-id' => 'row_6', 'label' => 'Date', 'section' => 'movie_1_section', 'type' => 'text', 'options' => false, 'placeholder' => 'Date', 'helper' => '', 'supplemental' => '', 'default' => ''
				),
				array(
					'uid' => 'movie1_time_6-1', 'class' => 'movie_time_1', 'row-id' => 'row_6', 'label' => 'Time 1', 'section' => 'movie_1_section', 'type' => 'text', 'options' => false, 'placeholder' => 'Time 1', 'helper' => '', 'supplemental' => '', 'default' => ''
				),
				array(
					'uid' => 'movie1_time_6-2', 'class' => 'movie_time_2', 'row-id' => 'row_6', 'label' => 'Time 2', 'section' => 'movie_1_section', 'type' => 'text', 'options' => false, 'placeholder' => 'Time 2', 'helper' => '', 'supplemental' => '', 'default' => ''
				),
				//Movie date/time 7
				array(
					'uid' => 'movie1_date_7', 'class' => 'movie_date', 'row-id' => 'row_7', 'label' => 'Date', 'section' => 'movie_1_section', 'type' => 'text', 'options' => false, 'placeholder' => 'Date', 'helper' => '', 'supplemental' => '', 'default' => ''
				),
				array(
					'uid' => 'movie1_time_7-1', 'class' => 'movie_time_1', 'row-id' => 'row_7', 'label' => 'Time 1', 'section' => 'movie_1_section', 'type' => 'text', 'options' => false, 'placeholder' => 'Time 1', 'helper' => '', 'supplemental' => '', 'default' => ''
				),
				array(
					'uid' => 'movie1_time_7-2', 'class' => 'movie_time_2', 'row-id' => 'row_7', 'label' => 'Time 2', 'section' => 'movie_1_section', 'type' => 'text', 'options' => false, 'placeholder' => 'Time 2', 'helper' => '', 'supplemental' => '', 'default' => ''
				),
				// Movie 2
				array(
					'uid' => 'movie_title_2', 'class' => 'movie_title', 'row-id' => '', 'label' => 'Title', 'section' => 'movie_2_section', 'type' => 'text', 'options' => false, 'placeholder' => 'Title', 'helper' => '', 'supplemental' => '', 'default' => ''
				),
		        array(
		            'uid' => 'imdb_code_2', 'class' => 'movie_id', 'row-id' => '', 'label' => 'Imdb Code', 'section' => 'movie_2_section', 'type' => 'text', 'options' => false, 'placeholder' => 'Imdb Code', 'helper' => '', 'supplemental' => 'Use the code (like ttXXXXXXX) from the IMDB url - http://www.imdb.com/title/ttXXXXXXX/?ref_=nv_sr_1', 'default' => ''
		        ),
				//Movie date/time 1
				array(
					'uid' => 'movie2_date_1', 'class' => 'movie_date', 'row-id' => 'row_1', 'label' => 'Date', 'section' => 'movie_2_section', 'type' => 'text', 'options' => false, 'placeholder' => 'Date', 'helper' => '', 'supplemental' => '', 'default' => ''
				),
				array(
					'uid' => 'movie2_time_1-1', 'class' => 'movie_time_1', 'row-id' => 'row_1', 'label' => 'Time 1', 'section' => 'movie_2_section', 'type' => 'text', 'options' => false, 'placeholder' => 'Time 1', 'helper' => '', 'supplemental' => '', 'default' => ''
				),
				array(
					'uid' => 'movie2_time_1-2', 'class' => 'movie_time_2', 'row-id' => 'row_1', 'label' => 'Time 2', 'section' => 'movie_2_section', 'type' => 'text', 'options' => false, 'placeholder' => 'Time 2', 'helper' => '', 'supplemental' => '', 'default' => ''
				),
				//Movie date/time 2
				array(
					'uid' => 'movie2_date_2', 'class' => 'movie_date', 'row-id' => 'row_2', 'label' => 'Date', 'section' => 'movie_2_section', 'type' => 'text', 'options' => false, 'placeholder' => 'Date', 'helper' => '', 'supplemental' => '', 'default' => ''
				),
				array(
					'uid' => 'movie2_time_2-1', 'class' => 'movie_time_1', 'row-id' => 'row_2', 'label' => 'Time 1', 'section' => 'movie_2_section', 'type' => 'text', 'options' => false, 'placeholder' => 'Time 1', 'helper' => '', 'supplemental' => '', 'default' => ''
				),
				array(
					'uid' => 'movie2_time_2-2', 'class' => 'movie_time_2', 'row-id' => 'row_2', 'label' => 'Time 2', 'section' => 'movie_2_section', 'type' => 'text', 'options' => false, 'placeholder' => 'Time 2', 'helper' => '', 'supplemental' => '', 'default' => ''
				),
				//Movie date/time 3
				array(
					'uid' => 'movie2_date_3', 'class' => 'movie_date', 'row-id' => 'row_3', 'label' => 'Date', 'section' => 'movie_2_section', 'type' => 'text', 'options' => false, 'placeholder' => 'Date', 'helper' => '', 'supplemental' => '', 'default' => ''
				),
				array(
					'uid' => 'movie2_time_3-1', 'class' => 'movie_time_1', 'row-id' => 'row_3', 'label' => 'Time 1', 'section' => 'movie_2_section', 'type' => 'text', 'options' => false, 'placeholder' => 'Time 1', 'helper' => '', 'supplemental' => '', 'default' => ''
				),
				array(
					'uid' => 'movie2_time_3-2', 'class' => 'movie_time_2', 'row-id' => 'row_3', 'label' => 'Time 2', 'section' => 'movie_2_section', 'type' => 'text', 'options' => false, 'placeholder' => 'Time 2', 'helper' => '', 'supplemental' => '', 'default' => ''
				),
				//Movie date/time 4
				array(
					'uid' => 'movie2_date_4', 'class' => 'movie_date', 'row-id' => 'row_4', 'label' => 'Date', 'section' => 'movie_2_section', 'type' => 'text', 'options' => false, 'placeholder' => 'Date', 'helper' => '', 'supplemental' => '', 'default' => ''
				),
				array(
					'uid' => 'movie2_time_4-1', 'class' => 'movie_time_1', 'row-id' => 'row_4', 'label' => 'Time 1', 'section' => 'movie_2_section', 'type' => 'text', 'options' => false, 'placeholder' => 'Time 1', 'helper' => '', 'supplemental' => '', 'default' => ''
				),
				array(
					'uid' => 'movie2_time_4-2', 'class' => 'movie_time_2', 'row-id' => 'row_4', 'label' => 'Time 2', 'section' => 'movie_2_section', 'type' => 'text', 'options' => false, 'placeholder' => 'Time 2', 'helper' => '', 'supplemental' => '', 'default' => ''
				),
				//Movie date/time 5
				array(
					'uid' => 'movie2_date_5', 'class' => 'movie_date', 'row-id' => 'row_5', 'label' => 'Date', 'section' => 'movie_2_section', 'type' => 'text', 'options' => false, 'placeholder' => 'Date', 'helper' => '', 'supplemental' => '', 'default' => ''
				),
				array(
					'uid' => 'movie2_time_5-1', 'class' => 'alte_movie_showtimes_admin_pagemovie_time_1', 'row-id' => 'row_5', 'label' => 'Time 1', 'section' => 'movie_2_section', 'type' => 'text', 'options' => false, 'placeholder' => 'Time 1', 'helper' => '', 'supplemental' => '', 'default' => ''
				),
				array(
					'uid' => 'movie2_time_5-2', 'class' => 'movie_time_2', 'row-id' => 'row_5', 'label' => 'Time 2', 'section' => 'movie_2_section', 'type' => 'text', 'options' => false, 'placeholder' => 'Time 2', 'helper' => '', 'supplemental' => '', 'default' => ''
				),
				//Movie date/time 6
				array(
					'uid' => 'movie2_date_6', 'class' => 'movie_date', 'row-id' => 'row_6', 'label' => 'Date', 'section' => 'movie_2_section', 'type' => 'text', 'options' => false, 'placeholder' => 'Date', 'helper' => '', 'supplemental' => '', 'default' => ''
				),
				array(
					'uid' => 'movie2_time_6-1', 'class' => 'movie_time_1', 'row-id' => 'row_6', 'label' => 'Time 1', 'section' => 'movie_2_section', 'type' => 'text', 'options' => false, 'placeholder' => 'Time 1', 'helper' => '', 'supplemental' => '', 'default' => ''
				),
				array(
					'uid' => 'movie2_time_6-2', 'class' => 'movie_time_2', 'row-id' => 'row_6', 'label' => 'Time 2', 'section' => 'movie_2_section', 'type' => 'text', 'options' => false, 'placeholder' => 'Time 2', 'helper' => '', 'supplemental' => '', 'default' => ''
				),
				//Movie date/time 7
				array(
					'uid' => 'movie2_date_7', 'class' => 'movie_date', 'row-id' => 'row_7', 'label' => 'Date', 'section' => 'movie_2_section', 'type' => 'text', 'options' => false, 'placeholder' => 'Date', 'helper' => '', 'supplemental' => '', 'default' => ''
				),
				array(
					'uid' => 'movie2_time_7-1', 'class' => 'movie_time_1', 'row-id' => 'row_7', 'label' => 'Time 1', 'section' => 'movie_2_section', 'type' => 'text', 'options' => false, 'placeholder' => 'Time 1', 'helper' => '', 'supplemental' => '', 'default' => ''
				),
				array(
					'uid' => 'movie2_time_7-2', 'class' => 'movie_time_2', 'row-id' => 'row_7', 'label' => 'Time 2', 'section' => 'movie_2_section', 'type' => 'text', 'options' => false, 'placeholder' => 'Time 2', 'helper' => '', 'supplemental' => '', 'default' => ''
				),

		);
		foreach( $fields as $field ){
	        add_settings_field( $field['uid'], $field['label'], array( 'Alte_Movie_Showtimes_Admin', 'field_callback' ), 'alte_movie_showtimes_admin_page', $field['section'], $field );
	        register_setting( 'alte_movie_showtimes_admin_page', $field['uid'] );
	    }

	}

	public static function field_callback( $arguments ) {

		$value = get_option( $arguments['uid'] ); // Get the current value, if there is one
	    if( ! $value ) { // If no value exists
	        $value = $arguments['default']; // Set to our default
	    }

	    // Check which type of field we want
	    switch( $arguments['type'] ){
	        case 'text': // If it is a text field
	            printf( '<input name="%1$s" id="%1$s" type="%2$s" placeholder="%3$s" class="%4$s" value="%5$s" />', $arguments['uid'], $arguments['type'], $arguments['placeholder'], $arguments['class'], $value );
	            break;
			case 'textarea': // If it is a textarea
		        printf( '<textarea name="%1$s" id="%1$s" placeholder="%2$s" rows="5" cols="50">%3$s</textarea>', $arguments['uid'], $arguments['placeholder'], $value );
		        break;
		    case 'select': // If it is a select dropdown
		        if( ! empty ( $arguments['options'] ) && is_array( $arguments['options'] ) ){
		            $options_markup = '';
		            foreach( $arguments['options'] as $key => $label ){
		                $options_markup .= sprintf( '<option value="%s" %s>%s</option>', $key, selected( $value, $key, false ), $label );
		            }
		            printf( '<select name="%1$s" id="%1$s">%2$s</select>', $arguments['uid'], $options_markup );
		        }
	    }

	    // If there is help text
	    if( $helper = $arguments['helper'] ){
	        printf( '<span class="helper"> %s</span>', $helper ); // Show it
	    }

	    // If there is supplemental text
	    if( $supplimental = $arguments['supplemental'] ){
	        printf( '<p class="description">%s</p>', $supplimental ); // Show it
	    }

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
