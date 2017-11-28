<?php


// Display the movie showtimes (one movie at a time as specified by which_movie shortcode att)
if( $which_movie == "1" ) {
    // First movie
}
if( $which_movie == "2" ) {
    // Second movie
}
// TODO: convert the date and time to work with the schema
// TODO: convert date to long form for display
$enteredDate = get_option('movie1_date_1');
$convertedDate = strtotime($enteredDate);

$longFormDate = date('l, M jS, Y',$convertedDate);
$twentyFourHourDate = date('Y-m-d', $convertedDate);


//TODO: Movie title with link to imdb
?>

<div itemscope itemtype="http://schema.org/ScreeningEvent">
    <div itemprop="workPresented" class="container-film" itemscope itemtype="http://schema.org/Movie">
        <span class="film-name" itemprop="name"><a href="http://www.imdb.com/title/<?php echo get_option('imdb_code_1'); ?>/"><?php echo get_option('movie_title_1'); ?></a></span><br/>

        <time itemprop="startDate" datetime="<?php echo esc_attr( get_option('movie1_date_1') ); ?>T19:00">Friday, Nov. 17th, 2017 - <span><?php echo esc_attr( get_option('movie1_time_1-1') ); ?></span> p.m.</time><br/>
        <time itemprop="startDate" datetime="<?php echo esc_attr( get_option('movie1_date_2') ); ?>T16:30">Saturday, Nov. 18th, 2017 - <span><?php echo esc_attr( get_option('movie1_time_2-1') ); ?></span></time> and <time itemprop="startDate" datetime="<?php echo get_option('movie1_date_2'); ?>T19:00"><span><?php echo esc_attr( get_option('movie1_time_2-2') ); ?></span> p.m.</time><br/>
        <time itemprop="startDate" datetime="<?php echo esc_attr( get_option('movie1_date_3') ); ?>T16:30">Sunday, Nov. 19th, 2017 - <span><?php echo esc_attr( get_option('movie1_time_3-1') ); ?></span></time> and <time itemprop="startDate" datetime="<?php echo get_option('movie1_date_3'); ?>T19:00"><span><?php echo esc_attr( get_option('movie1_time_3-2') ); ?></span> p.m.</time><br/>
        <time itemprop="startDate" datetime="<?php echo esc_attr( get_option('movie1_date_4') ); ?>T19:00">Monday-Thursday, Nov. 20th-23rd, 2017 - <span><?php echo esc_attr( get_option('movie1_time_4-1') ); ?></span> p.m.</time>

        <link itemprop="sameAs" href="www.imdb.com/title/<?php echo get_option('imdb_code_1'); ?>/"/>
    </div>

</div>

<?php
//TODO: showtimes, check if week span
?>
