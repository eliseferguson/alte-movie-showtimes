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
        <?php settings_fields( 'alte_movie_showtimes_admin_page' ); ?>
        <?php do_settings_sections( 'alte_movie_showtimes_admin_page'); ?>


        <?php submit_button(); ?>
    </form>
</div>
