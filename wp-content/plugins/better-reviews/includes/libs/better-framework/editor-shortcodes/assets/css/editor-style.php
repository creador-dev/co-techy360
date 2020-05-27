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


if ( ! empty( $_GET['editor'] ) && $_GET['editor'] == 'gutenberg' ) {
	$editor = 'gutenberg';
} else {
	$editor = 'tinymce';
}

$show_layouts   = BF_Editor_Shortcodes::get_config( 'layouts', true );
$layout_2column = BF_Editor_Shortcodes::get_config( 'layout-2-col' );
$layout_3column = BF_Editor_Shortcodes::get_config( 'layout-3-col' );
$code           = '';

//
// Bootstrap Base style
//
{
	ob_start();
	include 'style-bootstrap.css';
	$code .= ob_get_clean() . "\n\n";
}


//
// Show Sidebar Layouts
//
if ( BF_Editor_Shortcodes::get_config( 'layouts', true ) ) {
	ob_start();
	include 'style-' . $editor . '-layout.css';
	$code .= ob_get_clean() . "\n\n";
}


//
// The editor specific style (TinyMCE or Gutenberg)
//
{
	ob_start();
	include 'style-' . $editor . '.css';
	$code .= ob_get_clean() . "\n\n";
}


//
// Replace Dynamic Constants
//
{
	$replaces = array(
		'inherit /* layout-2column-content */' => $layout_2column['content'] . 'px',
		'1px /* layout-2column-content */'     => $layout_2column['content'] . 'px',
		'inherit /* layout-2column-width */'   => $layout_2column['width'] . 'px',
		//
		'inherit /* layout-3column-content */' => $layout_3column['content'] . 'px',
		'inherit /* layout-3column-width */'   => $layout_3column['width'] . 'px',
		'1px /* layout-3column-content */'     => $layout_3column['content'] . 'px',
	);

	foreach ( $replaces as $k => $v ) {
		$code = str_replace( $k, $v, $code );
	}
}

// Print final CSS
echo $code;
