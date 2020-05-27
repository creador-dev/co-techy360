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


// stripcslashes for when json is splashed!
if ( ! empty( $options['value'] ) ) {
	$value = $options['value'];
} else {
	$value = array(
		'img'  => '',
		'type' => 'cover'
	);
}

$media_title = empty( $options['media_title'] ) ? __( 'Upload', 'better-studio' ) : $options['media_title'];
$button_text = empty( $options['button_text'] ) ? __( 'Upload', 'better-studio' ) : $options['button_text'];

// Upload Button
$upload_button = Better_Framework::html()
                                 ->add( 'a' )
                                 ->class( 'bf-button bf-background-image-upload-btn button' )
                                 ->data( 'mediatitle', $media_title )
                                 ->data( 'buttontext', $button_text );

if ( isset( $options['upload_label'] ) ) {
	$upload_button->text( $options['upload_label'] );
} else {
	$upload_button->text( __( 'Upload', 'better-studio' ) );
}

// Remove Button
$remove_button = Better_Framework::html()
                                 ->add( 'a' )
                                 ->class( 'bf-button bf-background-image-remove-btn button' );

if ( isset( $options['remove_label'] ) ) {
	$remove_button->text( $options['remove_label'] );
} else {
	$remove_button->text( __( 'Remove', 'better-studio' ) );
}

if ( $value['img'] == "" ) {
	$remove_button->css( 'display', 'none' );
}

// Select
$select = Better_Framework::html()
                          ->add( 'select' )
                          ->attr( 'id', $options['id'] . '-select' )
                          ->class( 'bf-background-image-uploader-select' )
                          ->name( $options['input_name'] . '[type]' );


$select->text( '<option value="repeat" ' . ( $value['type'] == 'repeat' ? 'selected="selected"' : '' ) . '>' . __( 'Repeat Horizontal and Vertical - Pattern', 'better-studio' ) . '</option>' );
$select->text( '<option value="cover" ' . ( $value['type'] == 'cover' ? 'selected="selected"' : '' ) . '>' . __( 'Fully Cover Background - Photo', 'better-studio' ) . '</option>' );
$select->text( '<option value="repeat-y" ' . ( $value['type'] == 'repeat-y' ? 'selected="selected"' : '' ) . '>' . __( 'Repeat Horizontal', 'better-studio' ) . '</option>' );
$select->text( '<option value="repeat-x" ' . ( $value['type'] == 'repeat-x' ? 'selected="selected"' : '' ) . '>' . __( 'Repeat Vertical', 'better-studio' ) . '</option>' );
$select->text( '<option value="no-repeat" ' . ( $value['type'] == 'no-repeat' ? 'selected="selected"' : '' ) . '>' . __( 'No Repeat', 'better-studio' ) . '</option>' );

if ( $value['img'] == "" ) {
	$select->css( 'display', 'none' );
}

// Main Input
$input = Better_Framework::html()
                         ->add( 'input' )
                         ->type( 'hidden' )
                         ->class( 'bf-background-image-input' )
                         ->name( $options['input_name'] . '[img]' )
                         ->val( $value['img'] );

if ( isset( $options['input_class'] ) ) {
	$input->class( $options['input_class'] );
}

echo $upload_button->display(); // escaped before
echo $remove_button->display(); // escaped before
echo '<br>';

echo $select->display(); // escaped before
echo $input->display(); // escaped before

if ( $value['img'] != "" ) {
	echo '<div class="bf-background-image-preview">';
} else {
	echo '<div class="bf-background-image-preview" style="display: none">';
}

echo '<img src="' . esc_url( $value['img'] ) . '" />';
echo '</div>';
