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


$dimension = empty( $options['dimension'] ) ? '' : $options['dimension'];
$min       = isset( $options['min'] ) && is_numeric( $options['min'] ) ? $options['min'] : 0;
$max       = isset( $options['max'] ) && is_numeric( $options['max'] ) ? $options['max'] : 100;
$step      = isset( $options['step'] ) && is_numeric( $options['step'] ) ? $options['step'] : 1;
$animation = isset( $options['animation'] ) && ! $options['animation'] ? 'disable' : 'enable';
$value     = empty( $options['value'] ) ? '0' : $options['value'];

$slider = Better_Framework::html()->add( 'div' )->class( 'bf-slider-slider' )->
data( 'dimension', $dimension )->
data( 'animation', $animation )->
data( 'val', $value )->
data( 'min', $min )->
data( 'max', $max )->
data( 'step', $step );

echo $slider->display(); // escaped before

$input = Better_Framework::html()->add( 'input' )->type( 'hidden' )->class( 'bf-slider-input' )->name( $options['input_name'] )->val( $value );

if ( isset( $options['input_class'] ) ) {
	$input->class( $options['input_class'] );
}

echo $input->display(); // escaped before
