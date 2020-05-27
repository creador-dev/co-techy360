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
                                 ->class( 'bf-button bf-main-button bf-background-image-upload-btn' )
                                 ->data( 'mediatitle', $media_title )
                                 ->data( 'buttontext', $button_text )
                                 ->text( '<i class="fa fa-upload"></i>' );

if ( isset( $options['upload_label'] ) ) {
	$upload_button->text( $options['upload_label'] );
} else {
	$upload_button->text( __( 'Upload', 'better-studio' ) );
}

// Remove Button
$remove_button = Better_Framework::html()
                                 ->add( 'a' )
                                 ->class( 'bf-button bf-background-image-remove-btn' )
                                 ->text( '<i class="fa fa-remove"></i>' );

if ( isset( $options['remove_label'] ) ) {
	$remove_button->text( $options['remove_label'] );
} else {
	$remove_button->text( __( 'Remove', 'better-studio' ) );
}

if ( $value['img'] == "" ) {
	$remove_button->css( 'display', 'none' );
}

// version < 2 compatibility
if ( $value['type'] == 'no-repeat' ) {
	$value['type'] = 'top-left';
}

// Select
$select = Better_Framework::html()
                          ->add( 'select' )
                          ->attr( 'id', $options['id'] . '-select' )
                          ->class( 'bf-background-image-uploader-select' )
                          ->name( $options['input_name'] . '[type]' );


//
// Fully Background Image
//
$cover_group = Better_Framework::html()
                               ->add( 'optgroup' )->attr( 'label', __( 'Full Background Image', 'better-studio' ) );

$cover_group->text( '<option value="cover" ' . ( $value['type'] == 'cover' ? 'selected="selected"' : '' ) . '>' . __( 'Full Cover', 'better-studio' ) . '</option>' );
$cover_group->text( '<option value="fit-cover" ' . ( $value['type'] == 'fit-cover' ? 'selected="selected"' : '' ) . '>' . __( 'Fit Cover', 'better-studio' ) . '</option>' );
$cover_group->text( '<option value="parallax" ' . ( $value['type'] == 'parallax' ? 'selected="selected"' : '' ) . '>' . __( 'Parallax', 'better-studio' ) . '</option>' );

$select->text( $cover_group->display() );


//
// Repeated Background Image
//
$repeat_group = Better_Framework::html()
                                ->add( 'optgroup' )->attr( 'label', __( 'Repeated Background Image', 'better-studio' ) );

$repeat_group->text( '<option value="repeat" ' . ( $value['type'] == 'repeat' ? 'selected="selected"' : '' ) . '>' . __( 'Repeat Horizontal and Vertical - Pattern', 'better-studio' ) . '</option>' );
$repeat_group->text( '<option value="repeat-y" ' . ( $value['type'] == 'repeat-y' ? 'selected="selected"' : '' ) . '>' . __( 'Repeat Horizontal', 'better-studio' ) . '</option>' );
$repeat_group->text( '<option value="repeat-x" ' . ( $value['type'] == 'repeat-x' ? 'selected="selected"' : '' ) . '>' . __( 'Repeat Vertical', 'better-studio' ) . '</option>' );
$repeat_group->text( '<option value="no-repeat" ' . ( $value['type'] == 'no-repeat' ? 'selected="selected"' : '' ) . '>' . __( 'No Repeat', 'better-studio' ) . '</option>' );

$select->text( $repeat_group->display() );


//
// Static Background Image Position
//
$position_group = Better_Framework()->html()->add( 'optgroup' )->attr( 'label', __( 'Static Background Image Position', 'better-studio' ) );

$position_group->text( '<option value="top-left" ' . ( $value['type'] == 'top-left' ? 'selected="selected"' : '' ) . '>' . __( 'Top Left', 'better-studio' ) . '</option>' );
$position_group->text( '<option value="top-center" ' . ( $value['type'] == 'top-center' ? 'selected="selected"' : '' ) . '>' . __( 'Top Center', 'better-studio' ) . '</option>' );
$position_group->text( '<option value="top-right" ' . ( $value['type'] == 'top-right' ? 'selected="selected"' : '' ) . '>' . __( 'Top Right', 'better-studio' ) . '</option>' );
$position_group->text( '<option value="left-center" ' . ( $value['type'] == 'left-center' ? 'selected="selected"' : '' ) . '>' . __( 'Left Center', 'better-studio' ) . '</option>' );
$position_group->text( '<option value="center-center" ' . ( $value['type'] == 'center-center' ? 'selected="selected"' : '' ) . '>' . __( 'Center Center', 'better-studio' ) . '</option>' );
$position_group->text( '<option value="right-center" ' . ( $value['type'] == 'right-center' ? 'selected="selected"' : '' ) . '>' . __( 'Right Center', 'better-studio' ) . '</option>' );
$position_group->text( '<option value="bottom-left" ' . ( $value['type'] == 'bottom-left' ? 'selected="selected"' : '' ) . '>' . __( 'Bottom Left', 'better-studio' ) . '</option>' );
$position_group->text( '<option value="bottom-center" ' . ( $value['type'] == 'bottom-center' ? 'selected="selected"' : '' ) . '>' . __( 'Bottom Center', 'better-studio' ) . '</option>' );
$position_group->text( '<option value="bottom-right" ' . ( $value['type'] == 'bottom-right' ? 'selected="selected"' : '' ) . '>' . __( 'Bottom Right', 'better-studio' ) . '</option>' );

$select->text( $position_group->display() );


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

if ( $value['img'] == "" ) {
	$class = 'hidden';
} else {
	$class = '';
}
echo '<div class="bf-background-image-uploader-select-container bf-select-option-container ' . $class . '">';
echo $select->display();  // escaped before
echo '</div>';

echo $input->display();  // escaped before

if ( $value['img'] != "" ) {
	echo '<div class="bf-background-image-preview">';
} else {
	echo '<div class="bf-background-image-preview" style="display: none">';
}

echo '<img src="' . esc_url( $value['img'] ) . '" />';
echo '</div>';
