<?php

// Language  name for smart admin texts
$lang = bf_get_current_lang();
if ( $lang != 'none' ) {
	$lang = bf_get_language_name( $lang );
} else {
	$lang = '';
}

$publisher = publisher_white_label_get_option( 'publisher' );

$panel = array(
	'panel-name'      => sprintf( _x( '%s Options', 'Panel title', 'publisher' ), $publisher ),
	'panel-desc'      => '<p>' . __( 'Configure theme settings, change colors, typography, layout and more...', 'publisher' ) . '</p>',
	'panel-desc-lang' => '<p>' . __( 'Theme %s Language Options.', 'publisher' ) . '</p>',
	'theme-panel'     => true,

	'texts' => array(

		'panel-desc-lang'     => '<p>' . __( '%s Language Options.', 'publisher' ) . '</p>',
		'panel-desc-lang-all' => '<p>' . __( 'All Languages Options.', 'publisher' ) . '</p>',

		'reset-button'     => ! empty( $lang ) ? sprintf( __( 'Reset %s Options', 'publisher' ), $lang ) : __( 'Reset Options', 'publisher' ),
		'reset-button-all' => __( 'Reset All Options', 'publisher' ),

		'reset-confirm'     => ! empty( $lang ) ? sprintf( __( 'Are you sure to reset %s options?', 'publisher' ), $lang ) : __( 'Are you sure to reset options?', 'publisher' ),
		'reset-confirm-all' => __( 'Are you sure to reset all options?', 'publisher' ),

		'save-button'     => ! empty( $lang ) ? sprintf( __( 'Save %s Options', 'publisher' ), $lang ) : __( 'Save Options', 'publisher' ),
		'save-button-all' => __( 'Save All Options', 'publisher' ),

		'save-confirm-all' => __( 'Are you sure to save all options? this will override specified options per languages', 'publisher' )

	),

	'config' => array(
		'name'                => __( 'Theme Options', 'publisher' ),
		'parent'              => 'bs-product-pages-welcome',
		'slug'                => 'better-studio/' . publisher_white_label_get_option( 'theme_slug' ),
		'notice-icon'         => PUBLISHER_THEME_URI . 'images/admin/notice-logo.png',
		'page_title'          => __( 'Theme Options', 'publisher' ),
		'menu_title'          => __( 'Theme Options', 'publisher' ),
		'capability'          => 'manage_options',
		'menu_slug'           => sprintf( _x( '%s Theme Options', 'Panel title', 'publisher' ), $publisher ),
		'icon_url'            => NULL,
		'position'            => 50,
		'exclude_from_export' => false,
		'on_admin_bar'        => true
	),
);
