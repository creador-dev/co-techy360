<?php
/***
 *  BetterFramework is BetterStudio framework for themes and plugins.
 *
 *  ______      _   _             ______                                           _
 *  | ___ \    | | | |            |  ___|                                         | |
 *  | |_/ / ___| |_| |_ ___ _ __  | |_ _ __ __ _ _ __ ___   _____      _____  _ __| | __
 *  | ___ \/ _ \ __| __/ _ \ '__| |  _| '__/ _` | '_ ` _ \ / _ \ \ /\ / / _ \| '__| |/ /
 *  | |_/ /  __/ |_| ||  __/ |    | | | | | (_| | | | | | |  __/\ V  V / (_) | |  |   <
 *  \____/ \___|\__|\__\___|_|    \_| |_|  \__,_|_| |_| |_|\___| \_/\_/ \___/|_|  |_|\_\
 *
 *  Copyright © 2017 Better Studio
 *
 *
 *  Our portfolio is here: https://betterstudio.com/
 *
 *  \--> BetterStudio, 2018 <--/
 */


// Language  name for smart admin texts
$lang = bf_get_current_lang_raw();
if ( $lang != 'none' ) {
	$lang = bf_get_language_name( $lang );
} else {
	$lang = '';
}


$panels = array(
	'panel-name' => _x( 'Font Manager', 'Panel title', 'publisher' ),
	'panel-desc' => '<p>' . __( 'Upload custom fonts and add CSS font stacks.', 'publisher' ) . '</p>',

	'config' => array(
		'name'                => __( 'Font Manager', 'publisher' ),
		'parent'              => 'better-studio',
		'slug'                => 'better-studio/fonts-manager',
		'page_title'          => __( 'Font Manager', 'publisher' ),
		'menu_title'          => __( 'Font Manager', 'publisher' ),
		'capability'          => 'manage_options',
		'menu_slug'           => __( 'Font Manager', 'publisher' ),
		'notice-icon'         => BF_URI . 'assets/img/bs-notice-logo.png',
		'icon_url'            => null,
		'position'            => 100.01,
		'exclude_from_export' => false,
		'register_menu'       => apply_filters( 'better-framework/fonts-manager/show-menu', true ),
	),

	'texts' => array(
		'panel-desc-lang'     => '<p>' . __( '%s Language Fonts.', 'publisher' ) . '</p>',
		'panel-desc-lang-all' => '<p>' . __( 'All Languages Fonts.', 'publisher' ) . '</p>',

		'reset-button'     => ! empty( $lang ) ? sprintf( __( 'Reset %s Fonts', 'publisher' ), $lang ) : __( 'Reset Fonts', 'publisher' ),
		'reset-button-all' => __( 'Reset All Fonts', 'publisher' ),

		'reset-confirm'     => ! empty( $lang ) ? sprintf( __( 'Are you sure to reset %s fonts?', 'publisher' ), $lang ) : __( 'Are you sure to reset fonts?', 'publisher' ),
		'reset-confirm-all' => __( 'Are you sure to reset all fonts?', 'publisher' ),

		'save-button'     => ! empty( $lang ) ? sprintf( __( 'Save %s Fonts', 'publisher' ), $lang ) : __( 'Save Fonts', 'publisher' ),
		'save-button-all' => __( 'Save All Fonts', 'publisher' ),

		'save-confirm-all' => __( 'Are you sure to save all fonts? this will override specified fonts per languages', 'publisher' )
	),


);