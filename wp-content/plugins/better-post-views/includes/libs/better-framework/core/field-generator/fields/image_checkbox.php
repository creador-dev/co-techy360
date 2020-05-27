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


// set options from deferred callback
if ( isset( $options['deferred-options'] ) ) {
	if ( is_string( $options['deferred-options'] ) && is_callable( $options['deferred-options'] ) ) {
		$options['options'] = call_user_func( $options['deferred-options'] );
	} elseif ( is_array( $options['deferred-options'] ) && ! empty( $options['deferred-options']['callback'] ) && is_callable( $options['deferred-options']['callback'] ) ) {
		if ( isset( $options['deferred-options']['args'] ) ) {
			$options['options'] = call_user_func_array( $options['deferred-options']['callback'], $options['deferred-options']['args'] );
		} else {
			$options['options'] = call_user_func( $options['deferred-options']['callback'] );
		}
	}
}

if ( empty( $options['options'] ) ) {
	$options['options'] = array();
}

$value = isset( $options['value'] ) ? $options['value'] : array();

$field_options = bf_sort_array_by_array( $options['options'], $value );

foreach ( $field_options as $key => $item ) {
	$is_checked = ! empty( $value[ $key ] ) && $value[ $key ] != 0;
	$input      = Better_Framework::html()->add( 'input' )->type( 'checkbox' )->name( sprintf( $options['input_name'], $key ) );

	if ( $is_checked ) {
		$input->attr( 'checked', 'checked' );
	}

	$image = Better_Framework::html()->add( 'img' )->src( $item['img'] )->alt( $item['label'] )->title( $item['label'] );
	$label = Better_Framework::html()->add( 'label' );

	$label->text( $input );
	$label->text( $image );

	$object = Honar::html()->add( 'div' )->class( 'bf-image-checkbox-option' );

	if ( $is_checked ) {
		$object->class( 'checked' );
	}

	$object->text( $label->display() );

	echo $object->display(); // escaped before
}