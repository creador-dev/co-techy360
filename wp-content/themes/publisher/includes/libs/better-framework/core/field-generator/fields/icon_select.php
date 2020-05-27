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


// Default selected
$current = array(
	'key'       => '',
	'title'     => __( 'Chose an Icon', 'publisher' ),
	'width'     => '',
	'height'    => '',
	'type'      => '',
	'font_code' => '',
);

if ( isset( $options['value'] ) ) {

	if ( is_array( $options['value'] ) ) {

		$current['font_code'] = isset( $options['value']['font_code'] ) ? $options['value']['font_code'] : '';

		if ( in_array( $options['value']['type'], array( 'custom-icon', 'custom' ) ) ) {
			$current['key']    = isset( $options['value']['icon'] ) ? $options['value']['icon'] : '';
			$current['title']  = bf_get_icon_tag( isset( $options['value'] ) ? $options['value'] : '' ) . ' ' . __( 'Custom icon', 'publisher' );
			$current['width']  = isset( $options['value']['width'] ) ? $options['value']['width'] : '';
			$current['height'] = isset( $options['value']['height'] ) ? $options['value']['height'] : '';
			$current['type']   = 'custom-icon';
		} else {

			// Fontawesome icon
			if ( substr( $options['value']['icon'], 0, 3 ) == 'fa-' ) {

				Better_Framework::factory( 'icon-factory' );

				$fontawesome = BF_Icons_Factory::getInstance( 'fontawesome' );

				if ( isset( $fontawesome->icons[ $options['value']['icon'] ] ) ) {
					$current['key']    = $options['value']['icon'];
					$current['title']  = bf_get_icon_tag( $options['value'] ) . $fontawesome->icons[ $options['value']['icon'] ]['label'];
					$current['width']  = ! empty( $options['value']['width'] ) ? $options['value']['width'] : '';
					$current['height'] = ! empty( $options['value']['height'] ) ? $options['value']['height'] : '';
					$current['type']   = 'fontawesome';
				}

			} // BetterStudio Font Icon
			elseif ( substr( $options['value']['icon'], 0, 5 ) == 'bsfi-' ) {

				Better_Framework::factory( 'icon-factory' );

				$bs_icons = BF_Icons_Factory::getInstance( 'bs-icons' );


				if ( isset( $bs_icons->icons[ $options['value']['icon'] ] ) ) {
					$current['key']    = $options['value']['icon'];
					$current['title']  = bf_get_icon_tag( $options['value'] ) . $bs_icons->icons[ $options['value']['icon'] ]['label'];
					$current['width']  = ! empty( $options['value']['width'] ) ? $options['value']['width'] : '';
					$current['height'] = ! empty( $options['value']['height'] ) ? $options['value']['height'] : '';
					$current['type']   = 'bs-icons';
				}

			}


		}

	} elseif ( ! empty( $options['value'] ) ) {

		// Fontawesome icon
		if ( substr( $options['value'], 0, 3 ) == 'fa-' ) {

			Better_Framework::factory( 'icon-factory' );

			$fontawesome = BF_Icons_Factory::getInstance( 'fontawesome' );

			if ( isset( $fontawesome->icons[ $options['value'] ] ) ) {
				$current['key']    = $options['value'];
				$current['title']  = bf_get_icon_tag( $options['value'] ) . $fontawesome->icons[ $options['value'] ]['label'];
				$current['width']  = '';
				$current['height'] = '';
				$current['type']   = 'fontawesome';
			}

		} // BetterStudio Font Icon
		elseif ( substr( $options['value'], 0, 5 ) == 'bsfi-' ) {

			Better_Framework::factory( 'icon-factory' );

			$bs_icons = BF_Icons_Factory::getInstance( 'bs-icons' );

			if ( isset( $bs_icons->icons[ $options['value'] ] ) ) {
				$current['key']    = $options['value'];
				$current['title']  = bf_get_icon_tag( $options['value'] ) . $bs_icons->icons[ $options['value'] ]['label'];
				$current['width']  = ! empty( $options['value']['width'] ) ? $options['value']['width'] : '';
				$current['height'] = ! empty( $options['value']['height'] ) ? $options['value']['height'] : '';
				$current['type']   = 'bs-icons';
			}

		}

	}

}

$icon_handler = 'bf-icon-modal-handler-' . mt_rand();

?>
	<div class="bf-icon-modal-handler" id="<?php echo esc_attr( $icon_handler ); ?>">

		<div class="select-options">
			<span
					class="selected-option"><?php echo $current['title']; // escaped before in function that passes value to this ?></span>
		</div>

		<input type="hidden" class="icon-input" data-label=""
		       name="<?php echo esc_attr( $options['input_name'] ); ?>[icon]"
		       value="<?php echo esc_attr( $current['key'] ); ?>"/>
		<input type="hidden" class="icon-input-type" name="<?php echo esc_attr( $options['input_name'] ); ?>[type]"
		       value="<?php echo esc_attr( $current['type'] ); ?>"/>
		<input type="hidden" class="icon-input-height" name="<?php echo esc_attr( $options['input_name'] ); ?>[height]"
		       value="<?php echo esc_attr( $current['height'] ); ?>"/>
		<input type="hidden" class="icon-input-width" name="<?php echo esc_attr( $options['input_name'] ); ?>[width]"
		       value="<?php echo esc_attr( $current['width'] ); ?>"/>
		<input type="hidden" class="icon-input-font-code"
		       name="<?php echo esc_attr( $options['input_name'] ); ?>[font_code]"
		       value="<?php echo esc_attr( $current['font_code'] ); ?>"/>

		<?php echo $this->get_filed_input_desc( $options ); // escaped before ?>
	</div><!-- modal handler container -->
<?php


bf_enqueue_modal( 'icon' );
