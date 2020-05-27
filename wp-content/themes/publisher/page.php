<?php
/**
 * page.php
 *
 * The template for displaying pages
 *
 *
 * @author    BetterStudio
 * @package   Publisher
 * @version   5.3.0
 */

get_header();

//
// If page was added to "Publisher -> Theme Options -> Advanced -> Customize Post and Page Options -> Add Post Options To Other Post Types"
// then the post files will be used to show the content of pages!
//
if ( publisher_is_valid_cpt( 'post' ) && ! ( is_home() || is_front_page() ) ) {
	// Prints content with layout that is selected in panels.
	// Location: "views/general/post/style-*.php"
	publisher_get_view( 'post', publisher_get_single_template() );
} else {
	// Prints content with layout that is selected in panels.
	// Location: "views/general/layout/*.php"
	publisher_get_view( 'layout', publisher_get_page_layout_file() );
}

get_footer();
