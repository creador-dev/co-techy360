<?php
/**
 * Handy file to handle printing archive pages title
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    1.8.4
 */

if ( is_category() ) {
	publisher_get_view( 'archive', '_title-category' );
} elseif ( is_tag() ) {
	publisher_get_view( 'archive', '_title-tag' );
} elseif ( is_tax() ) {
	publisher_get_view( 'archive', '_title-tax' );
} elseif ( is_search() ) {
	publisher_get_view( 'archive', '_title-search' );
} elseif ( is_day() ) {
	publisher_get_view( 'archive', '_title-day' );
} elseif ( is_month() ) {
	publisher_get_view( 'archive', '_title-month' );
} elseif ( is_year() ) {
	publisher_get_view( 'archive', '_title-year' );
} elseif ( is_author() ) {
	publisher_get_view( 'archive', '_title-author' );
}
