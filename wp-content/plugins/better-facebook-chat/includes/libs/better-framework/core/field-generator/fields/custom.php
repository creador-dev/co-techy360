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

if ( isset( $options['input_callback'] ) ) {

	if ( is_string( $options['input_callback'] ) ) {

		$callback = $options['input_callback'];

		$callback_args = array( array( 'field_options' => $options ) );

	} else {
		$callback = $options['input_callback']['callback'];

		if ( isset( $options['input_callback']['args'][0] ) ) {

			$callback_args                     = $options['input_callback']['args'];
			$callback_args[0]['field_options'] = $options;
		} else {

			$callback_args = array( array( 'field_options' => $options ) );
		}
	}

	$options['options'] = call_user_func_array( $callback, $callback_args );
}

if ( isset( $options['input'] ) ) {
	echo $options['input'];  // escaped before
}


if ( isset( $options['js-code'] ) ) {
	Better_Framework()->assets_manager()->add_admin_js( $options['js-code'] );
}

if ( isset( $options['css-code'] ) ) {
	Better_Framework()->assets_manager()->add_admin_css( $options['css-code'] );
}