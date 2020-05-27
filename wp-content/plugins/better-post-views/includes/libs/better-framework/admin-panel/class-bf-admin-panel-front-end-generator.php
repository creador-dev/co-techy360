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


/**
 * Class BF_Admin_Panel_Front_End_Generator
 */
class BF_Admin_Panel_Front_End_Generator extends BF_Admin_Fields {


	/**
	 * Constructor Function
	 *
	 * @param array $items            Panel All Options
	 * @param       $id               Panel ID
	 * @param array $values           Panel Saved Values
	 *
	 * @since  1.0
	 * @access public
	 * @return \BF_Admin_Panel_Front_End_Generator
	 */
	public function __construct( array &$items, &$id, &$values = array() ) {

		$default = array(
			'templates_dir' => bf_get_dir( 'admin-panel/templates/' )
		);

		// Parent Constructor
		parent::__construct( $default );

		// Ads fields when needed
		$items['fields'] = BF_Options::load_panel_fields( $id );

		$this->items  = $items;
		$this->id     = $id;
		$this->values = $values;

	}


	/**
	 * Display HTML output of panel array
	 *
	 * Display full html of panel array which is defined in object parameter
	 *
	 * @since  1.0
	 * @access public
	 *
	 * @param bool $repeater
	 * @param bool $skip_ajax ignore ajax items
	 *
	 * @return string
	 */
	public function get_fields( $repeater = FALSE, $skip_ajax = TRUE ) {


		/**
		 * Fires before generating panel HTML
		 *
		 * @since 2.0
		 *
		 * @param string $args arguments
		 */
		do_action( 'better-framework/panel/' . $this->id . '/generate/before', $this->items, $this->values );

		$output        = '';
		$counter       = 0;
		$group_counter = array();
		$has_tab       = FALSE;

		$_lang = bf_get_current_language_option_code();

		$current_style = get_option( $this->id . $_lang . '_current_style' );

		$_check = array(
			'tab'         => '',
			'custom'      => '',
			'export'      => '',
			'import'      => '',
			'ajax_action' => '',
			'group'       => '',
			'info'        => '',
		);

		foreach ( $this->items['fields'] as $field ) {

			if ( isset( $field['style'] ) && ! in_array( $current_style, $field['style'] ) ) {
				continue;
			}

			if ( $skip_ajax && ! empty( $field['ajax-tab-field'] ) ) { // Backward compatibility
				continue;
			}

			if ( $skip_ajax && ! empty( $field['ajax-section-field'] ) ) {
				continue;
			}

			if ( ! isset( $field['type'] ) ) {
				continue;
			}

			$field = $this->standardize_field( $field );

			// If value have been saved before
			if ( isset( $field['id'] ) && ! isset( $_check[ $field['type'] ] )
			) {
				$field['value'] = bf_get_option( $field['id'], $this->id );
			}

			if ( $field['type'] === 'info' ) {
				if ( isset( $field['std'] ) ) {
					$field['value'] = $field['std'];
				} else {
					$field['value'] = '';
				}
			}

			if ( $field['type'] != 'repeater' ) {

				$field['input_name'] = $this->input_name( $field );

				if ( ! isset( $field['value'] ) ) {
					$field['value'] = FALSE;
				}
			}


			if ( isset( $field['filter-field'] ) && $field['filter-field-value'] ) {
				if ( $field['filter-field-value'] != bf_get_option( $field['filter-field'], $this->id ) ) {
					$field['section-css']['display'] = "none";
				}
			}

			if ( $field['type'] == 'tab' || $field['type'] == 'subtab' ) {


				if ( $has_tab ) {

					// close all opened groups
					foreach ( array_reverse( $group_counter ) as $level_k => $level_v ) {

						if ( $level_v === 0 ) {
							continue;
						}

						for ( $i = 0; $i < $level_v; $i ++ ) {
							$output .= $this->get_fields_group_close( $field );
						}

						$group_counter[ $level_k ] = 0;
					}
				}


				$is_subtab = $field['type'] == 'subtab';

				if ( $counter != 0 ) {
					$output .= '</div>';
				}

				if ( $is_subtab ) {
					$output .= "\n\n<!-- Section -->\n<div class='group subtab-group' id='bf-group-{$field['id']}'>\n";
				} else {
					$output .= "\n\n<!-- Section -->\n<div class='group' id='bf-group-{$field['id']}'>\n";
				}

				$has_tab = TRUE;

				continue;
			}


			//
			// Close group
			//
			if ( $field['type'] == 'group_close' ) {

				if ( isset( $field['level'] ) && $field['level'] === 'all' ) {

					krsort( $group_counter );

					// close all opened groups
					foreach ( $group_counter as $level_k => $level_v ) {

						if ( $level_v === 0 ) {
							continue;
						}

						for ( $i = 0; $i < $level_v; $i ++ ) {
							$output .= $this->get_fields_group_close( $field );
						}

						$group_counter[ $level_k ] = 0;
					}

				} else {

					krsort( $group_counter );

					// close last opened group
					foreach ( $group_counter as $level_k => $level_v ) {

						if ( ! $level_v ) {
							continue;
						}

						for ( $i = 0; $i < $level_v; $i ++ ) {
							$output .= $this->get_fields_group_close( $field );
							$group_counter[ $level_k ] --;
							break;
						}

					}
				}


				continue;
			}


			//
			// Group
			// All nested groups and same level groups should be closed
			//
			if ( $field['type'] == 'group' ) {

				if ( ! isset( $field['level'] ) ) {
					$field['level'] = 0;
				}

				if ( ! isset( $group_counter[ $field['level'] ] ) ) {
					$group_counter[ $field['level'] ] = 0;
				}

				krsort( $group_counter );

				foreach ( $group_counter as $level_k => $level_v ) {

					if ( $level_k < $field['level'] ) {
						continue;
					}

					for ( $i = 0; $i < $level_v; $i ++ ) {
						$output .= $this->get_fields_group_close( $field );
					}

					$group_counter[ $level_k ] = 0;
				}

				$output .= $this->get_fields_group_start( $field );

				$group_counter[ $field['level'] ] ++;
			}


			if ( ! in_array( $field['type'], $this->supported_fields ) ) {
				continue;
			}

			// for image checkbox sortable option
			if ( isset( $field['is_sortable'] ) && ( $field['is_sortable'] == '1' ) ) {
				$field['section_class'] .= ' is-sortable';
			}

			if ( isset( $field['template'] ) ) {

				$input = call_user_func( array( $this, $field['type'] ), $field );

				$output .= str_replace( '%%input%%', $input, $field['template'] );

			} else {

				$output .= $this->section(
					call_user_func(
						array( $this, $field['type'] ),
						$field
					),
					$field
				);
			}

			$counter ++;

		} // foreach

		if ( $has_tab ) {
			$output .= '</div>';
		}

		/**
		 * Fires after generating panel HTML
		 *
		 * @since 2.0
		 *
		 * @param string $args arguments
		 */
		do_action( 'better-framework/panel/' . $this->id . '/generate/after', $this->items, $this->values, $output );

		return $output;
	}


	/**
	 * PHP __call Magic Function
	 *
	 * @param $name
	 * @param $arguments
	 *
	 * @throws Exception
	 * @internal param $ (string) $name      name of requested method
	 * @internal param $ (array)  $arguments arguments of requested method
	 *
	 * @since    1.0
	 * @access   public
	 * @return mixed
	 */
	public function __call( $name, $arguments ) {

		$file = $this->options['fields_dir'] . $name . '.php';

		// Check if requested field (method) does exist!
		if ( ! file_exists( $file ) ) {
			throw new Exception( $name . ' does not exist!' );
		}

		$options  = $arguments[0];
		$panel_id = $this->id;

		// Capture output
		ob_start();
		require $file;

		$data = ob_get_clean();

		return $data;
	}


}