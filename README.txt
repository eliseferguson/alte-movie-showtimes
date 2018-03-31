=== ALTE Movie Showtimes Plugin ===
Contributors: egf
Donate link: http://www.saturdaynightbattleship.com
Tags: movie, imdb, films, showtimes, cinema
Requires at least: 3.0.1
Tested up to: 4.9
Stable tag: 1.0.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Enter and display movie showtimes without having to style or create schema by hand.  Connects with ALTE Movie Info plugin (alte-movie-info).

== Description ==



== Installation ==

= Upload Manually =

1. Download and unzip the plugin
2. Upload the 'alte-movie-info' folder into the '/wp-content/plugins/' directory
3. Go to the Plugins admin page and activate the plugin

= Use GitHub Updater =

1. Install github updater: https://github.com/afragen/github-updater
2. In Settings > Github Updater, click the Install Plugin tab
3. Use plugin URI: https://github.com/eliseferguson/alte-movie-showtimes
4. Click Install Plugin button
5. Github updater will notify you of future plugin updates
6. Activate ALTE Movie Showtimes plugin from the plugin page

= To Setup The Plugin =

1. Navigate to the Movie Showtimes menu item in the main dashboard menu
2. Enter the movie title, imdb code, dates and movie times
3. Enter movie times as 7:00 (right now this is only accounting for PM movies)
4. Enter movie dates as YYYY-MM-DD

= To Use the Shortcode =

1. Use the shortcode "movie_showtimes"
2. Attributes are -
* which_movie="1" (or 2) This will determine which movie times to show
* span_week="no" (or yes) This will determine if the full week will display as indiviual days or if Monday-Thursday will display as a span of time
3. Example: [movie_showtimes which_movie="1" span_week="no"]

== Changelog ==
= 1.0.2 =
* Check for empty date

= 1.0.1 =
* Update readme
* Fix bug - undefined call to this

= 1.0.0 =
* Basic functionality
