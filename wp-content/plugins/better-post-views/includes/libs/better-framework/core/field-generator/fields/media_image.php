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


$input_type = ! empty( $options['show_input'] ) ? 'text' : 'hidden';

$input = Better_Framework::html()->add( 'input' )->type( $input_type )->name( $options['input_name'] )->class( 'bf-media-image-input' )->class( 'ltr' );

if ( ! $options['value'] == FALSE ) {
	$input->val( $options['value'] );
}

if ( isset( $options['input_class'] ) ) {
	$input->class( $options['input_class'] );
}

if ( $input_type === 'text' ) {
	if ( ! empty( $options['input_placeholder'] ) ) {
		$input->placeholder( $options['input_placeholder'] );
	} else {
		$input->placeholder( __( 'Image external link...', 'better-studio' ) );
	}
}

if ( empty( $options['hide_buttons'] ) ) {

	$media_title = empty( $options['media_title'] ) ? __( 'Upload', 'better-studio' ) : $options['media_title'];
	$button_text = empty( $options['media_button'] ) ? __( 'Upload', 'better-studio' ) : $options['media_button'];

	$upload_label = empty( $options['upload_label'] ) ? __( 'Upload', 'better-studio' ) : $options['upload_label'];
	$remove_label = empty( $options['remove_label'] ) ? __( 'Remove', 'better-studio' ) : $options['remove_label'];

	$upload_button = Better_Framework::html()->add( 'a' )->class( 'bf-button bf-main-button bf-media-image-upload-btn' )->data( 'media-title', $media_title )->data( 'button-text', $button_text );
	$upload_button->text( '<i class="fa fa-upload"></i> ' . $upload_label );

	$remove_button = Better_Framework::html()->add( 'a' )->class( 'bf-button bf-media-image-remove-btn' );
	$remove_button->text( '<i class="fa fa-remove"></i> ' . $remove_label );


	if ( isset( $options['data-type'] ) && $options['data-type'] == 'id' ) {

		if ( ! isset( $options['preview-size'] ) ) {
			$options['preview-size'] = 'thumbnail';
		}

		$upload_button->class( 'bf-media-type-id' )->data( 'size', $options['preview-size'] );
	}

	if ( $options['value'] == FALSE ) {
		$remove_button->css( 'display:none' );
	}

	echo $upload_button->display(); // escaped before
	echo $remove_button->display(); // escaped before
}

echo $input->display(); // escaped before


if ( $options['value'] != FALSE ) {
	echo '<div class="bf-media-image-preview">';
} else {
	echo '<div class="bf-media-image-preview" style="display: none">';
}

if ( ! empty( $options['value'] ) ) {

	if ( $attachment_id = filter_var( $options['value'], FILTER_VALIDATE_INT ) ) {
		$options['value'] = wp_get_attachment_image_src( $attachment_id, isset( $options['preview-size'] ) ? $options['preview-size'] : 'thumbnail' );
		$options['value'] = $options['value'][0];
	}
}

echo '<img src="' . esc_url( $options['value'] ) . '" />';

echo '</div>';

echo $this->get_filed_input_desc( $options ); // escaped before
