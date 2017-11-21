<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://www.saturdaynightbattleship.com
 * @since      1.0.0
 *
 * @package    Alte_Movie_Showtimes
 * @subpackage Alte_Movie_Showtimes/admin/partials
 */

// TODO:
// 1. Display form (display values from DB if they exists else placeholders)
// 2. Save values to DB on 'save'

?>
<div class="wrap">
    <h1>Set movie showtimes</h1>
    <form method="post" action="options.php">
        <?php settings_fields( 'alte-movie-showtimes-settings-group' ); ?>
        <?php do_settings_sections( 'alte-movie-showtimes-settings-group' ); ?>
        <div class="set-movie-showtimes">

            <h3>Movie 1</h3>
            <p><strong>Title: <input type="text" name="movie_title_1" value="<?php echo esc_attr( get_option('movie_title_1') ); ?>" /></strong></p> <!-- TODO: Get this from other plugin if available -->
            IMDB Code: <input type="text" name="imdb_code_1" value="<?php echo esc_attr( get_option('imdb_code_1') ); ?>" />

            <h4>Showtimes</h4>
            Date: <input type="text" name="movie1_date_1" value="<?php echo esc_attr( get_option('movie1_date_1') ); ?>" />(eg. Friday's date) | Times: <input type="text" name="movie1_time_1-1" value="<?php echo esc_attr( get_option('movie1_time_1-1') ); ?>" /> <input type="text" name="movie1_time_1-2" value="<?php echo esc_attr( get_option('movie1_time_1-2') ); ?>" /><br/>
            Date: <input type="text" name="movie1_date_2" value="<?php echo esc_attr( get_option('movie1_date_2') ); ?>" />(eg. Saturday's date) | Times: <input type="text" name="movie1_time_2-1" value="<?php echo esc_attr( get_option('movie1_time_2-1') ); ?>" /> <input type="text" name="movie1_time_2-2" value="<?php echo esc_attr( get_option('movie1_time_2-2') ); ?>" /><br/>
            Date: <input type="text" name="movie1_date_3" value="<?php echo esc_attr( get_option('movie1_date_3') ); ?>" />(eg. Sunday's date) | Times: <input type="text" name="movie1_time_3-1" value="<?php echo esc_attr( get_option('movie1_time_3-1') ); ?>" /> <input type="text" name="movie1_time_3-2" value="<?php echo esc_attr( get_option('movie1_time_3-2') ); ?>" /><br/>
            Date: <input type="text" name="movie1_date_4" value="<?php echo esc_attr( get_option('movie1_date_4') ); ?>" />(eg. Monday's date) | Times: <input type="text" name="movie1_time_4-1" value="<?php echo esc_attr( get_option('movie1_time_4-1') ); ?>" /> <input type="text" name="movie1_time_4-2" value="<?php echo esc_attr( get_option('movie1_time_4-2') ); ?>" /><br/>
            Date: <input type="text" name="movie1_date_5" value="<?php echo esc_attr( get_option('movie1_date_5') ); ?>" />(eg. Tuesday's date) | Times: <input type="text" name="movie1_time_5-1" value="<?php echo esc_attr( get_option('movie1_time_5-1') ); ?>" /> <input type="text" name="movie1_time_5-2" value="<?php echo esc_attr( get_option('movie1_time_5-2') ); ?>" /><br/>
            Date: <input type="text" name="movie1_date_6" value="<?php echo esc_attr( get_option('movie1_date_6') ); ?>" />(eg. Wednesday's date) | Times: <input type="text" name="movie1_time_6-1" value="<?php echo esc_attr( get_option('movie1_time_6-1') ); ?>" /> <input type="text" name="movie1_time_6-2" value="<?php echo esc_attr( get_option('movie1_time_6-2') ); ?>" /><br/>
            Date: <input type="text" name="movie1_date_7" value="<?php echo esc_attr( get_option('movie1_date_7') ); ?>" />(eg. Thursday's date) | Times: <input type="text" name="movie1_time_7-1" value="<?php echo esc_attr( get_option('movie1_time_7-1') ); ?>" /> <input type="text" name="movie1_time_7-2" value="<?php echo esc_attr( get_option('movie1_time_7-2') ); ?>" /><br/>

            

        </div>
        <div class="set-movie-showtimes">

            <h3>Movie 2</h3>
            <p><strong>Title: <input type="text" name="movie_title_2" value="<?php echo esc_attr( get_option('movie_title_2') ); ?>" /></strong></p> <!-- TODO: Get this from other plugin if available -->
            IMDB Code: <input type="text" name="imdb_code_2" value="<?php echo esc_attr( get_option('imdb_code_2') ); ?>" />

            <h4>Showtimes</h4>
            Date: <input type="text" name="movie2_date_1" value="<?php echo esc_attr( get_option('movie2_date_1') ); ?>" />(eg. Friday's date) | Times: <input type="text" name="movie2_time_1-1" value="<?php echo esc_attr( get_option('movie2_time_1-1') ); ?>" /> <input type="text" name="movie2_time_1-2" value="<?php echo esc_attr( get_option('movie2_time_1-2') ); ?>" /><br/>
            Date: <input type="text" name="movie2_date_2" value="<?php echo esc_attr( get_option('movie2_date_2') ); ?>" />(eg. Saturday's date) | Times: <input type="text" name="movie2_time_2-1" value="<?php echo esc_attr( get_option('movie2_time_2-1') ); ?>" /> <input type="text" name="movie2_time_2-2" value="<?php echo esc_attr( get_option('movie2_time_2-2') ); ?>" /><br/>
            Date: <input type="text" name="movie2_date_3" value="<?php echo esc_attr( get_option('movie2_date_3') ); ?>" />(eg. Sunday's date) | Times: <input type="text" name="movie2_time_3-1" value="<?php echo esc_attr( get_option('movie2_time_3-1') ); ?>" /> <input type="text" name="movie2_time_3-2" value="<?php echo esc_attr( get_option('movie2_time_3-2') ); ?>" /><br/>
            Date: <input type="text" name="movie2_date_4" value="<?php echo esc_attr( get_option('movie2_date_4') ); ?>" />(eg. Monday's date) | Times: <input type="text" name="movie2_time_4-1" value="<?php echo esc_attr( get_option('movie2_time_4-1') ); ?>" /> <input type="text" name="movie2_time_4-2" value="<?php echo esc_attr( get_option('movie2_time_4-2') ); ?>" /><br/>
            Date: <input type="text" name="movie2_date_5" value="<?php echo esc_attr( get_option('movie2_date_5') ); ?>" />(eg. Tuesday's date) | Times: <input type="text" name="movie2_time_5-1" value="<?php echo esc_attr( get_option('movie2_time_5-1') ); ?>" /> <input type="text" name="movie2_time_5-2" value="<?php echo esc_attr( get_option('movie2_time_5-2') ); ?>" /><br/>
            Date: <input type="text" name="movie2_date_6" value="<?php echo esc_attr( get_option('movie2_date_6') ); ?>" />(eg. Wednesday's date) | Times: <input type="text" name="movie2_time_6-1" value="<?php echo esc_attr( get_option('movie2_time_6-1') ); ?>" /> <input type="text" name="movie2_time_6-2" value="<?php echo esc_attr( get_option('movie2_time_6-2') ); ?>" /><br/>
            Date: <input type="text" name="movie2_date_7" value="<?php echo esc_attr( get_option('movie2_date_7') ); ?>" />(eg. Thursday's date) | Times: <input type="text" name="movie2_time_7-1" value="<?php echo esc_attr( get_option('movie2_time_7-1') ); ?>" /> <input type="text" name="movie2_time_7-2" value="<?php echo esc_attr( get_option('movie2_time_7-2') ); ?>" /><br/>



        </div>
        <?php submit_button(); ?>
    </form>
</div>
