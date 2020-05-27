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


$hidden = Better_Framework::html()->add( 'input' )->type( 'hidden' )->name( $options['input_name'] )->val( '0' );

$checkbox = Better_Framework::html()->add( 'input' )->type( 'checkbox' )->name( $options['input_name'] )->val( '1' );
if ( ! empty( $options['value'] ) ) {
	if ( $options['value'] == 'on' || $options['value'] == 'checked' || $options['value'] == '1' ) {
		$checkbox->attr( 'checked', 'checked' );
	}
}

echo $hidden->display(), $checkbox->display();  // escaped before
