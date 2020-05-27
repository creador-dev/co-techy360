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


$wrapper = Better_Framework::html()->add( 'div' )->class( 'bf-clearfix' );
$input   = Better_Framework::html()->add( 'input' )->type( 'text' )->name( $options['input_name'] );

if ( isset( $options['input_class'] ) ) {
	$input->class( $options['input_class'] );
}

if ( ! empty( $options['value'] ) ) {
	$input->value( $options['value'] )->css( 'border-color', $options['value'] );
}

$wrapper->add( $input );

echo $wrapper->display(); // escaped before
