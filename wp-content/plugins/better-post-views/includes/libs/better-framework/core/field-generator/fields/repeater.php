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


if ( empty( $options['options'] ) ) {
	return;
}

$is_close = isset( $options['state'] ) && 'close' === $options['state'];

if ( empty( $options['default'] ) ) {
	$default            = BF_Options::get_panel_std( $panel_id );
	$options['default'] = $default[ $options['id'] ]['default'];
}

$name_format = empty( $options['input_name'] ) ? '%s[%d][%s]' : $options['input_name'];

// Add New Item Label
if ( isset( $options['add_label'] ) && ! empty( $options['add_label'] ) ) {
	$add_label = $options['add_label'];
} else {
	$add_label = __( 'Add', 'better-studio' );
}

// Delete Item Label
if ( isset( $options['delete_label'] ) && ! empty( $options['delete_label'] ) ) {
	$delete_label = $options['delete_label'];
} else {
	$delete_label = __( 'Delete', 'better-studio' );
}

// Item title
if ( isset( $options['item_title'] ) && ! empty( $options['item_title'] ) ) {
	$item_title = $options['item_title'];
} else {
	$item_title = __( 'Item', 'better-studio' );
}


echo '<!-- Repeater Container --><div class="bf-repeater-items-container bf-clearfix">';


$repeater_item_start = '<!-- Repeater Item --><div class="bf-repeater-item"><div class="bf-repeater-item-title"><h5><span class="handle-repeater-title-label">' . wp_kses( $item_title, bf_trans_allowed_html() ) . '</span><span class="handle-repeater-item' . ($is_close ?  ' closed' : '') .'"></span><span class="bf-remove-repeater-item-btn"><span class="dashicons dashicons-trash"></span>' . wp_kses( $delete_label, bf_trans_allowed_html() ) . '</span></div><div class="repeater-item-container bf-clearfix"';

if($is_close){
	$repeater_item_start .= ' style="display:none"';
}

$repeater_item_start .= '>';

$repeater_item_end   = '</div></div><!-- /Repeater Item -->';

// Lst saved values
if ( isset( $options['value'] ) ) {

	$counter = 0;

	foreach ( (array) $options['value'] as $saved_key => $saved_val ) {

		echo $repeater_item_start; // escaped before

		foreach ( (array) $options['options'] as $field_id => $field_options ) {

			$this->generate_repeater_field( $options, $field_options, $saved_val, $name_format, $counter );

		}

		echo $repeater_item_end; // escaped before

		$counter ++;
	}

} else { // Default value

	// multiple default value
	if ( count( $options['default'] ) > 1 ) {

		$counter = 0;

		foreach ( (array) $options['default'] as $saved_key => $saved_val ) {

			echo $repeater_item_start; // escaped before

			foreach ( (array) $options['options'] as $field_id => $field_options ) {

				$this->generate_repeater_field( $options, $field_options, $saved_val, $name_format, $counter );

			}

			$counter ++;

			echo $repeater_item_end; // escaped before

		}
	} else { // single default value

		$default = current( $options['default'] );

		echo $repeater_item_start; // escaped before

		foreach ( (array) $options['options'] as $field_id => $field_options ) {

			$this->generate_repeater_field( $options, $field_options, $default, $name_format, 0 );

		}

		echo $repeater_item_end; // escaped before
	}
}

echo '</div><!-- / Repeater Container -->';

// HTML Stuff for when user is adding new item to repeater
$script = Better_Framework::html()->add( 'script' )->type( 'text/html' );
ob_start();
echo '<!-- Repeater Item --><div class="bf-repeater-item"><div class="bf-repeater-item-title"><h5><span class="handle-repeater-title-label">' . wp_kses( $item_title, bf_trans_allowed_html() ) . '</span><span class="handle-repeater-item"></span><span class="bf-remove-repeater-item-btn"><span class="dashicons dashicons-trash"></span>' . wp_kses( $delete_label, bf_trans_allowed_html() ) . '</span></div><div class="repeater-item-container bf-clearfix">';

if ( is_null( $options['default'] ) ) {
	$options['default'] = array();
}

$default = current( $options['default'] );

foreach ( $options['options'] as $script_option ) {

	$this->generate_repeater_field_script( $options, $script_option, $default );

}

echo '</div></div><!-- /Repeater Item -->';

$item_html = ob_get_clean();

// FIX nested script tag
$item_html = preg_replace( '/<\s*script([^>]+)>/', '<!-- SCRIPT TAG START --><div $1 style="display:none;">', $item_html );
$item_html = preg_replace( '#<\s*/\s*script\s*>#', '</div><!-- SCRIPT TAG END -->', $item_html );

$script->text( $item_html );
echo $script->display(); // escaped before


// Add new item to repeater button
$new_btn = Better_Framework::html()->add( 'button' )->class( 'bf-clone-repeater-item bf-button bf-main-button' )->text( $add_label );

// Repeater in widgets
if ( isset( $options['widget_field'] ) ) {
	$new_btn = Better_Framework::html()->add( 'button' )->class( 'bf-widget-clone-repeater-item bf-button bf-main-button' )->text( $add_label );
} // General Repeater
else {
	$new_btn = Better_Framework::html()->add( 'button' )->class( 'bf-clone-repeater-item bf-button bf-main-button' )->text( $add_label );
}

if ( ! empty( $options['clone-name-format'] ) ) {
	$new_btn->data( 'name-format', $options['clone-name-format'] );
}

echo $new_btn->display(); // escaped before