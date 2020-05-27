<?php
/**
 * single-user.php
 *
 * The template for displaying user profile for bbPress
 *
 *
 * @author    BetterStudio
 * @package   Publisher
 * @version   1.8.4
 */

get_header();

publisher_get_view( 'forum', publisher_get_page_layout_file() );

get_footer();
