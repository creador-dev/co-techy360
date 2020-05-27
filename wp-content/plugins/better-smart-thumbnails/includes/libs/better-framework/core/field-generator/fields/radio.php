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


if ( empty( $options['options'] ) ) {
	return;
}

foreach ( $options['options'] as $id => $val ) {
	$container = Better_Framework::html()->add( 'div' )->class( 'bf-radio-button-option' );
	$label     = Better_Framework::html()->add( 'label' );

	$input = Better_Framework::html()->add( 'input' )->type( 'radio' )->name( $options['input_name'] )->val( $id );
	if ( ! empty( $options['value'] ) && $options['value'] == $id ) {
		$input->attr( 'checked', 'checked' );
	}

	$label->text( $input );
	$label->text( $val );

	$container->text( $label );

	echo $container->display(); // escaped before
}