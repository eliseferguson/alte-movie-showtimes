<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit();
}

// Display the movie showtimes (one movie at a time as specified by which_movie shortcode att)
$movieIDVar = 'imdb_code_' . $which_movie;
$movieTitleVar = 'movie_title_' . $which_movie;


//TODO: showtimes, check if week span
//TODO: Hey look, some pseudocode
// if ($span_week = 1) {
//  show the mon - thu option rather than each day
//      if ( two times listed ) then
//          show the "and" additional times
//      else
//          only show one time
// } else { }
//  display each date on it's own line
//      if ( two times listed ) then
//          show the "and" additional times
//      else
//          only show one time
//          echo '<time itemprop="startDate" datetime="';
//          echo esc_attr( get_option('movie1_date_1') );
//          echo 'T' . $twentyFourHourTime . '">';
//          echo $longFormDate . ' - <span>';
//          echo esc_attr( get_option('movie1_time_1-1') );
//          echo '</span> p.m.</time><br/>';


?>

<div itemscope itemtype="http://schema.org/ScreeningEvent">
    <div itemprop="workPresented" class="container-film" itemscope itemtype="http://schema.org/Movie">
        <span class="film-name" itemprop="name"><a href="http://www.imdb.com/title/<?php echo get_option($movieIDVar); ?>/" target="_blank"><?php echo get_option($movieTitleVar); ?></a></span><br/>

        <?php

        //loop to create display

        for ( $i = 1; $i <= 7; $i++ ) {
            // movie1_date_1 through movie1_date_7
            $movieVarDate = 'movie' . $which_movie . '_date_' . $i;
            // movie1_time_1-1 and -2 through movie1_time_7-1 and -2
            $movieVarTime1 = 'movie' . $which_movie . '_time_' . $i . '-1';
            $movieVarTime2 = 'movie' . $which_movie . '_time_' . $i . '-2';

            //convert the date and time to work with the schema
            //convert date to long form for display
            $enteredDate = get_option($movieVarDate);
            $convertedDate = strtotime($enteredDate);

            $longFormDate = date('l, M. jS, Y',$convertedDate);
            $twentyFourHourDate = date('Y-m-d', $convertedDate);

            // TODO: convert the entered time to 24 hour time
            $enteredTime1 = get_option( $movieVarTime1 );
            // TODO: check if this exists
            $enteredTime2 = get_option( $movieVarTime2 );

            //TODO: add an option in the admin to select AM or PM and use that here
            $convertedTime1 = strtotime($enteredTime1 . ' PM');
            $convertedTime2 = strtotime($enteredTime2 . ' PM');

            $twentyFourHourTime1 = date( "G:i", $convertedTime1 );
            $twentyFourHourTime2 = date( "G:i", $convertedTime2 );


             echo '<time itemprop="startDate" datetime="';
             echo esc_attr( $enteredDate );
             echo 'T' . $twentyFourHourTime1 . '">';
             echo $longFormDate . ' - <span>';
             echo esc_attr( $enteredTime1 );
             echo '</span>';
             if ( $enteredTime2 != null ) {
                 echo '</time> and <time itemprop="startDate" datetime="';
                 echo esc_attr( $enteredDate );
                 echo 'T' . $twentyFourHourTime2 . '"><span>';
                 echo esc_attr( $enteredTime2 );
            }
             echo '</span> p.m.</time><br/>';
        }



        ?>

        <!-- <time itemprop="startDate" datetime="<?php echo esc_attr( get_option('movie1_date_1') ); ?>T19:00">Friday, Nov. 17th, 2017 - <span><?php echo esc_attr( get_option('movie1_time_1-1') ); ?></span> p.m.</time><br/>
        <time itemprop="startDate" datetime="<?php echo esc_attr( get_option('movie1_date_2') ); ?>T16:30">Saturday, Nov. 18th, 2017 - <span><?php echo esc_attr( get_option('movie1_time_2-1') ); ?></span></time> and <time itemprop="startDate" datetime="<?php echo get_option('movie1_date_2'); ?>T19:00"><span><?php echo esc_attr( get_option('movie1_time_2-2') ); ?></span> p.m.</time><br/>
        <time itemprop="startDate" datetime="<?php echo esc_attr( get_option('movie1_date_3') ); ?>T16:30">Sunday, Nov. 19th, 2017 - <span><?php echo esc_attr( get_option('movie1_time_3-1') ); ?></span></time> and <time itemprop="startDate" datetime="<?php echo get_option('movie1_date_3'); ?>T19:00"><span><?php echo esc_attr( get_option('movie1_time_3-2') ); ?></span> p.m.</time><br/>
        <time itemprop="startDate" datetime="<?php echo esc_attr( get_option('movie1_date_4') ); ?>T19:00">Monday-Thursday, Nov. 20th-23rd, 2017 - <span><?php echo esc_attr( get_option('movie1_time_4-1') ); ?></span> p.m.</time> -->

        <link itemprop="sameAs" href="www.imdb.com/title/<?php echo get_option($movieIDVar); ?>/"/>
    </div>

</div>
