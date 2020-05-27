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
 *  Our portfolio is here: https://betterstudio.com/
 *
 *  \--> BetterStudio, 2018 <--/
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

$list_style = 'grid-2-column';
if ( isset( $options['list_style'] ) && ! empty( $options['list_style'] ) ) {
	$list_style = $options['list_style'];
}

// default selected
$current = array(
	'key'   => '',
	'label' => isset( $options['default_text'] ) && ! empty( $options['default_text'] ) ? wp_kses( $options['default_text'], bf_trans_allowed_html() ) : esc_html__( 'chose one...', 'better-studio' ),
	'img'   => ''
);

if ( isset( $options['value'] ) && ! empty( $options['value'] ) ) {
	if ( isset( $options['options'][ $options['value'] ] ) ) {
		$current        = $options['options'][ $options['value'] ];
		$current['key'] = $options['value'];
	}
}

$select_options = '';
foreach ( (array) $options['options'] as $key => $option ) {
	$select_options .= '<li data-value="' . esc_attr( $key ) . '" data-label="' . esc_attr( $option['label'] ) . '" class="image-select-option ' . ( $key == $current['key'] ? 'selected' : '' ) . '">
        <img src="' . esc_attr( $option['img'] ) . '" alt="' . esc_attr( $option['label'] ) . '"/><p>' . wp_kses( $option['label'], bf_trans_allowed_html() ) . '</p>
    </li>';

	if ( ! empty( $option['info'] ) ) {
		$option['info']['img']   = $option['img'];
		$option['info']['label'] = $option['label'];
	}
}

$input_name = esc_attr( $options['input_name'] );

echo '<div class="better-select-image ', sanitize_html_class( $input_name ), '">
<div class="select-options">
	<span class="selected-option">' . $current['label'] . '</span>
    <div class="better-select-image-options"><ul class="options-list ' . esc_attr( $list_style ) . ' bf-clearfix">' . $select_options /* escaped before */ . '</ul>
    </div>
</div>
<input type="hidden" name="' . $input_name . '" id="' . $input_name . '" value="' . esc_attr( $current['key'] ) . '"/>
</div>';
