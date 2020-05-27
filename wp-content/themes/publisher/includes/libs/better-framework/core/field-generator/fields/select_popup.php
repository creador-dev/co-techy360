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
	'label' => isset( $options['default_text'] ) && ! empty( $options['default_text'] ) ? wp_kses( $options['default_text'], bf_trans_allowed_html() ) : esc_html__( 'chose one...', 'publisher' ),
	'img'   => ''
);

if ( isset( $options['value'] ) && ! empty( $options['value'] ) ) {
	if ( isset( $options['options'][ $options['value'] ] ) ) {
		$current        = $options['options'][ $options['value'] ];
		$current['key'] = $options['value'];
	}
}

$data2print = wp_array_slice_assoc( $options, bf_field_extra_options('select_popup') );

foreach ( (array) $options['options'] as $key => $option ) {
	if ( empty( $option['info'] ) ) {
		$option['info'] = array();
	}
	$option['info']['img']   = $option['img'];
	$option['info']['label'] = $option['label'];

	if(isset($option['badges'])) {
		$option['info']['badges'] = $option['badges'];
	}
	if(isset($option['class'])) {
		$option['info']['class'] = $option['class'];
	}
	if(!empty($option['current_img'])){
		$option['info']['current_img']   = $option['current_img'];
	}

	$data2print['options'][ $key ] = bf_map_deep( $option['info'], 'sanitize_text_field' );
}

$input_name = esc_attr( $options['input_name'] );

$select_style = empty( $options['select_style'] ) ? 'creative' : 'regular-select';

if ( $select_style === 'regular-select' ) {
	echo '
<div class="better-select-style better-select-popup ', $input_name, '">
	<span class="active-item-label">' . $current['label'] . '</span>
';
} else {
	?>

	<div class="select-popup-field bf-clearfix <?php echo $input_name ?>">
		<div class="select-popup-selected-image">
			<img src="<?php
			if(empty($current['current_img'])) {
				echo $current['img'];
			} else {
				echo $current['current_img'];
			}
			?>" alt="">
		</div>
		<div class="select-popup-selected-info">
			<div class="active-item-text"><?php
				if(isset($options['texts']['box_pre_title'])) {

					echo $options['texts']['box_pre_title'];
				} else{

					_e('Active item', 'publisher' );
				}
			 ?></div>
			<div class="active-item-label"><?php echo $current['label'] ?></div>

			<a href="#" class="button"><?php
				if(isset($options['texts']['box_button'])) {

					echo $options['texts']['box_button'];
				} else{

					_e('Change', 'publisher' );
				}

			 ?></a>
		</div>
	<?php
}


if ( $data2print ) {
	?>
	<script id="<?php echo str_replace( '-', '_', sanitize_html_class( $input_name ) ) ?>" class="select-popup-data"
	        type="application/json"><?php echo json_encode( $data2print ) ?></script>
	<?php
}

echo '<input type="hidden" name="' . $input_name . '" value="' . esc_attr( $current['key'] ) . '" class="select-value wpb_vc_param_value mce-field kc-param"/>';

echo '</div>';