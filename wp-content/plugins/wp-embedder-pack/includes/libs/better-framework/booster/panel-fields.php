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

$compatible = __( 'It\'s 100% compatible with all cache plugins', 'better' );
$compatible = "<br><br><strong style='color: #07b251;'>$compatible</strong>";

$fields['minify'] = array(
	'name' => __( 'Minify & Combine All CSS & Javascript Files', 'better-studio' ),
	'desc' => __( 'BS Booster will minify and combine all BetterStudio theme & plugins CSS & Javascript files into 1 file. It\'s highly compatible with all cache plugins.', 'better-studio' ) . $compatible,
	'id'   => 'minify',
	'type' => 'switch',
);


if ( apply_filters( 'better-framework/booster/mega-menu/config', array() ) ) {
	$fields['cache-mega-menu'] = array(
		'name' => __( 'Speed up Mega menus by cache', 'better-studio' ),
		'desc' => __( 'Cache all mega menus to speed up site loading time.', 'better-studio' ) . $compatible,
		'id'   => 'cache-mega-menu',
		'type' => 'switch',
	);
}


if ( apply_filters( 'better-framework/booster/widgets/config', array() ) ) {
	$fields['cache-widgets'] = array(
		'name' => __( 'Speed up Widgets by cache', 'better-studio' ),
		'desc' => __( 'Cache widgets to speed up site loading time.', 'better-studio' ) . $compatible,
		'id'   => 'cache-widgets',
		'type' => 'switch',
	);
}

if ( apply_filters( 'better-framework/booster/shortcodes/config', array() ) ) {
	$fields['cache-shortcodes'] = array(
		'name' => __( 'Speed up Shortcodes by cache', 'better-studio' ),
		'desc' => __( 'Cache shortcodes to speed up site loading time.', 'better-studio' ) . $compatible,
		'id'   => 'cache-shortcodes',
		'type' => 'switch',
	);
}

$fields['reset_cache'] = array(
	'name'        => __( 'Reset All Cache', 'better-studio' ),
	'id'          => 'reset_cache',
	'type'        => 'ajax_action',
	'button-name' => '<i class="fa fa-refresh"></i> ' . __( 'Purge BS Booster Cache', 'better-studio' ),
	'callback'    => 'BF_Booster::reset_cache_cb',
	'confirm'     => __( 'Are you sure for resetting BS Booster cache?', 'better-studio' ),
	'desc'        => __( 'This allows you to reset all Booster cache.', 'better-studio' ),
);
