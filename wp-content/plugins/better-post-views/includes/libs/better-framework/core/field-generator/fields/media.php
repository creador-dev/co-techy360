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


$input = Better_Framework::html()->add( 'input' )->type( 'text' )->name( $options['input_name'] );

if ( ! $options['value'] == FALSE ) {
	$input->val( $options['value'] );
}

$media_title = empty( $options['media_title'] ) ? __( 'Upload', 'better-studio' ) : $options['media_title'];
$button_text = empty( $options['button_text'] ) ? __( 'Upload', 'better-studio' ) : $options['button_text'];

$a = Better_Framework::html()->add( 'a' )->class( 'bf-button' )->class( 'bf-main-button bf-button bf-media-upload-btn' )->data( 'mediatitle', $media_title )->data( 'buttontext', esc_attr( $button_text ) );

$a->text( '<i class="fa fa-upload"></i> ' . $button_text );

echo $input->display(); // escaped before
echo $a->display(); // escaped before