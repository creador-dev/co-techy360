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


// Default selected
$current = array(
	'key'    => '',
	'title'  => __( 'Chose an Icon', 'better-studio' ),
	'width'  => '',
	'height' => '',
	'type'   => '',
);


if ( isset( $options['value'] ) ) {

	if ( is_array( $options['value'] ) ) {

		if ( in_array( $options['value']['type'], array( 'custom-icon', 'custom' ) ) ) {
			$current['key']    = isset( $options['value']['icon'] ) ? $options['value']['icon'] : '';
			$current['title']  = bf_get_icon_tag( isset( $options['value'] ) ? $options['value'] : '' ) . ' ' . __( 'Custom icon', 'better-studio' );
			$current['width']  = isset( $options['value']['width'] ) ? $options['value']['width'] : '';
			$current['height'] = isset( $options['value']['height'] ) ? $options['value']['height'] : '';
			$current['type']   = 'custom-icon';
		} else {
			Better_Framework::factory( 'icon-factory' );

			$fontawesome = BF_Icons_Factory::getInstance( 'fontawesome' );

			if ( isset( $fontawesome->icons[ $options['value']['icon'] ] ) ) {
				$current['key']    = $options['value']['icon'];
				$current['title']  = bf_get_icon_tag( $options['value'] ) . $fontawesome->icons[ $options['value']['icon'] ]['label'];
				$current['width']  = $options['value']['width'];
				$current['height'] = $options['value']['height'];
				$current['type']   = 'fontawesome';
			}
		}

	} elseif ( ! empty( $options['value'] ) ) {

		Better_Framework::factory( 'icon-factory' );

		$fontawesome = BF_Icons_Factory::getInstance( 'fontawesome' );

		$icon_label = '';
		if ( substr( $options['value'], 0, 3 ) == 'fa-' ) {
			$icon_label      = bf_get_icon_tag( $options['value'] ) . ' ' . $fontawesome->icons[ $options['value'] ]['label'];
			$current['type'] = 'fontawesome';
		} else {
			$icon_label      = bf_get_icon_tag( $options['value'] );
			$current['type'] = 'custom-icon';
		}

		$current['key']    = $options['value'];
		$current['title']  = $icon_label;
		$current['width']  = '';
		$current['height'] = '';

	}

}

$icon_handler = 'bf-icon-modal-handler-' . mt_rand();


?>
	<div class="bf-icon-modal-handler" id="<?php echo esc_attr( $icon_handler ); ?>">

		<div class="select-options">
			<span class="selected-option"><?php echo wp_kses( $current['title'], bf_trans_allowed_html() ); ?></span>
		</div>

		<input type="hidden" class="wpb_vc_param_value wpb-textinput title textfield icon-input"
		       data-label=""
		       name="<?php echo esc_attr( $options['input_name'] ); ?>"
		       value="<?php echo esc_attr( $current['key'] ); ?>"/>

	</div><!-- modal handler container -->
<?php

bf_enqueue_modal( 'icon' );
