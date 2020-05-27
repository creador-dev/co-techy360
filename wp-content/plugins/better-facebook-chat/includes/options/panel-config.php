<?php

// Language  name for smart admin texts
$lang = bf_get_current_lang_raw();
if ( $lang != 'none' ) {
	$lang = bf_get_language_name( $lang );
} else {
	$lang = '';
}

$panel = array(
	'config'     => array(
		'parent'              => 'better-studio',
		'slug'                => 'better-studio/better-facebook-chat',
		'name'                => __( 'Better Facebook Chat', 'better-studio' ),
		'page_title'          => __( 'Better Facebook Chat', 'better-studio' ),
		'menu_title'          => __( 'Facebook Chat', 'better-studio' ),
		'capability'          => 'manage_options',
		'icon_url'            => NULL,
		'position'            => 82.07,
		'exclude_from_export' => FALSE,
	),
	'texts'      => array(

		'panel-desc-lang'     => '<p>' . __( '%s Language Options.', 'better-studio' ) . '</p>',
		'panel-desc-lang-all' => '<p>' . __( 'All Languages Options.', 'better-studio' ) . '</p>',

		'reset-button'     => ! empty( $lang ) ? sprintf( __( 'Reset %s Options', 'better-studio' ), $lang ) : __( 'Reset Options', 'better-studio' ),
		'reset-button-all' => __( 'Reset All Options', 'better-studio' ),

		'reset-confirm'     => ! empty( $lang ) ? sprintf( __( 'Are you sure to reset %s options?', 'better-studio' ), $lang ) : __( 'Are you sure to reset options?', 'better-studio' ),
		'reset-confirm-all' => __( 'Are you sure to reset all options?', 'better-studio' ),

		'save-button'     => ! empty( $lang ) ? sprintf( __( 'Save %s Options', 'better-studio' ), $lang ) : __( 'Save Options', 'better-studio' ),
		'save-button-all' => __( 'Save All Options', 'better-studio' ),

		'save-confirm-all' => __( 'Are you sure to save all options? this will override specified options per languages', 'better-studio' )

	),
	'panel-name' => _x( 'Better Facebook Chat', 'Panel title', 'better-studio' ),
	'panel-desc' => '<p>' . __( 'Integrate Facebook Messenger experience directly into your website', 'better-studio' ) . '</p>',
);
