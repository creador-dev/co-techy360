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
	'panel-name' => _x( 'BS Speed Booster', 'Panel title', 'better-studio' ),
	'panel-desc' => '<p>' . __( 'Speeds up your site with highly compatibility with cache plugins!', 'better-studio' ) . '</p>',
	'config'     => array(
		'name'                => __( 'BS Speed Booster', 'better-studio' ),
		'parent'              => 'better-studio',
		'slug'                => 'better-studio/booster',
		'page_title'          => __( 'BS Speed Booster', 'better-studio' ),
		'menu_title'          => __( 'Booster', 'better-studio' ),
		'capability'          => 'manage_options',
		'menu_slug'           => __( 'BS Speed Booster', 'better-studio' ),
		'notice-icon'         => BF_URI . 'assets/img/bs-notice-logo.png',
		'icon_url'            => NULL,
		'position'            => 100.00,
		'exclude_from_export' => FALSE,
		'register_menu'       => apply_filters( 'better-framework/booster/show-menu', TRUE ),
	),
	'texts'      => array(
		'panel-desc-lang'     => '<p>' . __( '%s Language Booster.', 'better-studio' ) . '</p>',
		'panel-desc-lang-all' => '<p>' . __( 'All Languages Booster.', 'better-studio' ) . '</p>',
		'reset-button'        => ! empty( $lang ) ? sprintf( __( 'Reset %s Booster', 'better-studio' ), $lang ) : __( 'Reset Booster', 'better-studio' ),
		'reset-button-all'    => __( 'Reset All Languages Booster', 'better-studio' ),
		'reset-confirm'       => ! empty( $lang ) ? sprintf( __( 'Are you sure to reset %s Booster?', 'better-studio' ), $lang ) : __( 'Are you sure to reset Booster?', 'better-studio' ),
		'reset-confirm-all'   => __( 'Are you sure to reset all languages Booster?', 'better-studio' ),
		'save-button'         => ! empty( $lang ) ? sprintf( __( 'Save %s Booster', 'better-studio' ), $lang ) : __( 'Save Booster', 'better-studio' ),
		'save-button-all'     => __( 'Save All Booster', 'better-studio' ),
		'save-confirm-all'    => __( 'Are you sure to save all Booster? this will override specified Booster\'s per languages', 'better-studio' )
	),
);
