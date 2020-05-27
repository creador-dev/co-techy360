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


$value = ! empty( $options['value'] ) ? $options['value'] : '';


$wrapper = Better_Framework::html()->add( 'div' )->class( 'bf-clearfix' );
$input   = Better_Framework::html()->add( 'input' )->type( 'hidden' )->name( $options['input_name'] );

if ( isset( $options['input_class'] ) ) {
	$input->class( $options['input_class'] );
}

if ( ! empty( $options['value'] ) ) {
	$input->value( $options['value'] )->css( 'border-color', $options['value'] );
}

$wrapper->add( $input );

echo $wrapper->display(); // escaped before

foreach ( $options['options'] as $key => $item ) {

	$is_checked = ! empty( $value ) && ( $key == $value );

	$image = Better_Framework::html()->add( 'img' )->src( $item['img'] )->alt( $item['label'] )->title( $item['label'] );
	$label = Better_Framework::html()->add( 'label' );


	$label->text( $image );
	if ( isset( $item['label'] ) ) {
		$p = Better_Framework::html()->add( 'p' )->text( $item['label'] )->class( 'item-label' );
		$label->text( $p );
	}

	$object = Better_Framework::html()->add( 'div' )->class( 'vc-bf-image-radio-option' )->data( 'id', $key );

	if ( $is_checked ) {
		$object->class( 'checked' );
	}

	$object->text( $label->display() );

	echo $object->display(); // escaped before
}