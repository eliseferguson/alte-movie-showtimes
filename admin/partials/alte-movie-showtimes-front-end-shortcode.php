<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit();
}

// Display the movie showtimes (one movie at a time as specified by which_movie shortcode att)
$movieIDVar = 'imdb_code_' . $which_movie;
$movieTitleVar = 'movie_title_' . $which_movie;

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

            $longFormDate = date( 'l, M. jS, Y', $convertedDate);
            $twentyFourHourDate = date('Y-m-d', $convertedDate);

            //convert the entered time to 24 hour time
            $enteredTime1 = get_option( $movieVarTime1 );
            $enteredTime2 = get_option( $movieVarTime2 );

            //TODO: add an option in the admin to select AM or PM and use that here instead of assuming
            $convertedTime1 = strtotime($enteredTime1 . ' PM');
            $twentyFourHourTime1 = date( "G:i", $convertedTime1 );

            if ( $enteredTime2 != null ) {
                $convertedTime2 = strtotime($enteredTime2 . ' PM');
                $twentyFourHourTime2 = date( "G:i", $convertedTime2 );
            }

            if ( $span_week == 1 && $i == 4 ) {

                $longFormMonth = date( 'M.', $convertedDate );
                $longFormYear = date( 'Y', $convertedDate );
                $longFormDayFirst = date( 'jS', $convertedDate );
                $enteredDateLast = get_option('movie' . $which_movie . '_date_7');
                $convertedLastDate = strtotime( $enteredDateLast );
                $longFormDayLast = date( 'jS', $convertedLastDate );

                // Display the dates as a span instead
                echo '<time itemprop="startDate" datetime="';
                echo esc_attr( $enteredDate );
                echo 'T' . $twentyFourHourTime1 . '">Monday - Thursday, ';
                echo $longFormMonth;
                echo $longFormDayFirst . '-' . $longFormDayLast . ', ' . $longFormYear;
                echo ' - <span>';
                echo esc_attr( $enteredTime1 );
                echo '</span> p.m.</time>';
                break;
            } else {
                // Display the dates one at a time
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
        }

        ?>


        <link itemprop="sameAs" href="www.imdb.com/title/<?php echo get_option($movieIDVar); ?>/"/>
    </div>

</div>
