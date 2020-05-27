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
 *  Our portfolio is here: http://themeforest.net/user/Better-Studio/portfolio
 *
 *  \--> BetterStudio, 2017 <--/
 */


// Language  name for smart admin texts
$lang = bf_get_current_lang_raw();
if ( $lang != 'none' ) {
	$lang = bf_get_language_name( $lang );
} else {
	$lang = '';
}


$panels = array(
	'panel-name' => _x( 'Font Manager', 'Panel title', 'better-studio' ),
	'panel-desc' => '<p>' . __( 'Upload custom fonts and add CSS font stacks.', 'better-studio' ) . '</p>',

	'config' => array(
		'name'                => __( 'Font Manager', 'better-studio' ),
		'parent'              => 'better-studio',
		'slug'                => 'better-studio/fonts-manager',
		'page_title'          => __( 'Font Manager', 'better-studio' ),
		'menu_title'          => __( 'Font Manager', 'better-studio' ),
		'capability'          => 'manage_options',
		'menu_slug'           => __( 'Font Manager', 'better-studio' ),
		'notice-icon'         => BF_URI . 'assets/img/bs-notice-logo.png',
		'icon_url'            => NULL,
		'position'            => 100.01,
		'exclude_from_export' => FALSE,
		'register_menu'       => apply_filters( 'better-framework/fonts-manager/show-menu', TRUE ),
	),

	'texts' => array(
		'panel-desc-lang'     => '<p>' . __( '%s Language Fonts.', 'better-studio' ) . '</p>',
		'panel-desc-lang-all' => '<p>' . __( 'All Languages Fonts.', 'better-studio' ) . '</p>',

		'reset-button'     => ! empty( $lang ) ? sprintf( __( 'Reset %s Fonts', 'better-studio' ), $lang ) : __( 'Reset Fonts', 'better-studio' ),
		'reset-button-all' => __( 'Reset All Fonts', 'better-studio' ),

		'reset-confirm'     => ! empty( $lang ) ? sprintf( __( 'Are you sure to reset %s fonts?', 'better-studio' ), $lang ) : __( 'Are you sure to reset fonts?', 'better-studio' ),
		'reset-confirm-all' => __( 'Are you sure to reset all fonts?', 'better-studio' ),

		'save-button'     => ! empty( $lang ) ? sprintf( __( 'Save %s Fonts', 'better-studio' ), $lang ) : __( 'Save Fonts', 'better-studio' ),
		'save-button-all' => __( 'Save All Fonts', 'better-studio' ),

		'save-confirm-all' => __( 'Are you sure to save all fonts? this will override specified fonts per languages', 'better-studio' )
	),


);