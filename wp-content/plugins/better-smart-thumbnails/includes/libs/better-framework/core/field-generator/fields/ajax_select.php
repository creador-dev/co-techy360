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

echo '<div class="bf-ajax_select-field-container">';

$search_input = Better_Framework::html()->add( 'input' )->type( 'text' )->class( 'bf-ajax-suggest-input' );

if ( isset( $options['placeholder'] ) && ! empty( $options['placeholder'] ) ) {
	$search_input->attr( "placeholder", $options['placeholder'] );
}

echo $search_input->display(); // escaped before

echo Better_Framework::html()->add( 'span' )->class( 'bf-search-loader' )->text( '<i class="fa fa-search"></i>' )->display();

$input = Better_Framework::html()->add( 'input' )->type( 'hidden' )->name( $options['input_name'] );

if ( ! empty( $options['value'] ) ) {
	$input->val( $options['value'] );
}

if ( isset( $options['input_class'] ) ) {
	$input->class( $options['input_class'] );
}


$input->data( 'callback', $options['callback'] );
$input->data( 'token', Better_Framework::callback_token( $options['callback'] ) );

echo $input->display(); // escaped before

echo Better_Framework::html()->add( 'ul' )->class( 'bf-ajax-suggest-search-results' )->display();

$controls = Better_Framework::html()->add( 'ul' )->class( 'bf-ajax-suggest-controls' );

if ( ! empty( $options['value'] ) ) {
	foreach ( explode( ',', $options['value'] ) as $val ) {
		$name = isset( $options['get_name'] ) && is_callable( $options['get_name'] ) ? call_user_func( $options['get_name'], $val ) : $val;
		$sub  = Better_Framework::html()->add( 'li' )->data( 'id', $val )->text( $name )->text( '<i class="del fa fa-remove"></i>' );
		$controls->text( $sub );
	}
}

echo $controls->display(); // escaped before

echo '</div>';