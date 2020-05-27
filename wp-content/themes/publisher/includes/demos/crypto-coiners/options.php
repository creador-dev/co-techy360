<?php
/**
 * Returns settings for default demo
 *
 * ->Options
 *
 * @return array
 */
function publisher_demo_raw_options() {


	$style_id  = 'crypto-coiners';
	$demo_path = PUBLISHER_THEME_PATH . 'includes/demos/' . $style_id . '/';

	return array(

		//
		// -> Options
		//
		'options' => array(
			'multi_steps' => false,

			array(

				//
				// Panel options
				//
				array(
					'type'              => 'option',
					'option_name'       => publisher_get_theme_panel_id(),
					'option_value_file' => $demo_path . 'options.json',
				),

				// Theme Style
				array(
					'type'         => 'option',
					'option_name'  => publisher_get_theme_panel_id() . '_current_style',
					'option_value' => $style_id,
				),

				// Theme Demo
				array(
					'type'         => 'option',
					'option_name'  => publisher_get_theme_panel_id() . '_current_demo',
					'option_value' => $style_id,
				),

			)
		),

	);
} // publisher_demo_raw_setting
