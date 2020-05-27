<?php
/**
 * header.php
 *
 * The template for displaying the header.
 *
 * @author    BetterStudio
 * @package   Publisher
 * @version   5.0.0
 */

// Prints all codes before <body> tag.
// Location: "views/general/header/_common.php"
publisher_get_view( 'header', '_common', 'general' );

publisher_get_view( 'header', 'off-canvas', 'general' );

/**
 * Fires before ".main-wrap" start
 *
 * @since 1.9.0
 */
do_action( 'publisher/main-wrap/before' );

// Activates duplicate posts removal temporarily for not counting posts inside mega menu
publisher_set_global( 'disable-duplicate-posts', true );
publisher_set_blocks_title_tag( 'p', true );


//
// Header locked inside page layout
//
{
	$_check = array(
		'boxed'      => '',
		'full-width' => '',
		'stretched'  => '',
	);

	if ( isset( $_check[ publisher_get_header_layout() ] ) ) {
		?>
		<div class="main-wrap content-main-wrap">
		<?php
	}
}


/**
 * Fires in start of ".main-wrap" start
 *
 * @since 1.9.0
 */
do_action( 'publisher/main-wrap/start' );

if ( publisher_get_header_style() !== 'disable' ) {
	// Prints header code base the style was selected in panel.
	// Location: "views/general/header/header-*.php"
	publisher_get_view( 'header', 'header-' . publisher_get_header_style() );
}


// Deactivates duplicate posts removal temporarily
publisher_unset_global( 'disable-duplicate-posts' );
publisher_unset_blocks_title_tag( true );


//
// Header outside page layout
//
{
	$_check = array(
		'out-full-width' => '',
		'out-stretched'  => '',
	);

	if ( isset( $_check[ publisher_get_header_layout() ] ) ) {
		?>
		<div class="main-wrap content-main-wrap">
		<?php
	}
}
