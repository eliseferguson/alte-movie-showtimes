<?php


// Display the movie showtimes (one movie at a time as specified by which_movie shortcode att)
if( $which_movie == "1" ) {
    // First movie
}
if( $which_movie == "2" ) {
    // Second movie
}

?>

Movie title with link to imdb


<div itemscope itemtype="http://schema.org/ScreeningEvent">
    <div itemprop="workPresented" class="container-film" itemscope itemtype="http://schema.org/Movie">
        <span class="film-name" itemprop="name"><a href="http://www.imdb.com/title/tt0974015/">Justice League</a></span>

        <time itemprop="startDate" datetime="2017-11-17T19:00">Friday, Nov. 17th, 2017 - <span>7:00</span> p.m.</time><br/>
        <time itemprop="startDate" datetime="2017-11-18T16:30">Saturday, Nov. 18th, 2017 - <span>4:30</span></time> and <time itemprop="startDate" datetime="2017-11-18T19:00"><span>7:00</span> p.m.</time><br/>
        <time itemprop="startDate" datetime="2017-11-19T16:30">Sunday, Nov. 19th, 2017 - <span>4:30</span></time> and <time itemprop="startDate" datetime="2017-11-19T19:00"><span>7:00</span> p.m.</time><br/>
        <time itemprop="startDate" datetime="2017-11-20T19:00">Monday-Thursday, Nov. 20th-23rd, 2017 - <span>7:00</span> p.m.</time>

        <link itemprop="sameAs" href="www.imdb.com/title/tt0974015/"/>
    </div>

</div>
showtimes, check if week span
