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


// TODO: change style for showing demo of uploaded image
$is_img = ! empty( $options['value'] ) && preg_match( '/(gif)|(jpg)|(png)(jpeg)/i', pathinfo( $options['value'], PATHINFO_EXTENSION ) );

// Text Input
$input_text = Better_Framework::html()->add( 'input' )->type( 'text' );
$input_text->name( $options['input_name'] );
if ( $options['value'] !== FALSE ) {
	$input_text->value( $options['value'] );
}
echo $input_text->display(); // escaped before

// Upload Button
$btn = Better_Framework::html()->add( 'label' )->class( 'bf-button' );
$btn->add( __( 'Upload', 'better-studio' ) );
$btn->add( Better_Framework::html()->add( 'input' )->name( 'bf_image_upload_' . $options['id'] )->class( 'bf-image-upload-choose-file hidden bf-button bf-main-button' )->type( 'file' ) );
echo $btn->display(); // escaped before


// Progress Bar
$bar = Better_Framework::html()->add( 'div' )->class( 'bf-image-upload-progress-bar' )->add( '<div class="bar"></div>' );
echo $bar->display(); // escaped before

// Image Preview
if ( $is_img ) {
	echo Honar::html()->add( 'div' )->class( 'bf-image-upload-preview' )->add( Better_Framework::html()->add( 'img' )->src( $options['value'] ) ); // escaped before
}