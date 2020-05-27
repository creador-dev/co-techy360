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


/**
 * Class BF_Widgets_Field_Generator
 */
class BF_Widgets_Field_Generator extends BF_Admin_Fields {


	/**
	 * Constructor Function
	 *
	 * @param array $items  Panel All Options
	 * @param array $values Panel ID
	 *
	 * @since  1.0
	 * @access public
	 * @return \BF_Widgets_Field_Generator
	 */
	public function __construct( array $items, $values = array() ) {

		$default_options = array(
			'templates_dir' => BF_PATH . 'widget/templates/',
		);
		$items           = array_merge( $default_options, $items );

		foreach ( $items['fields'] as $idx => $field ) {

			if ( isset( $field['id'] ) ) {
				$items['fields'][ $idx ]['id'] = $field['id'];
			}
		}

		// Parent Constructor
		parent::__construct( $items );

		$this->items  = $items;
		$this->values = $values;
	}


	/**
	 * Display HTML output of one field
	 *
	 * @param $field
	 *
	 * @return string
	 */
	public function get_field( $field ) {

		$field['value'] = isset( $this->values[ $field['id'] ] ) ? $this->values[ $field['id'] ] : null;
		if ( is_null( $field['value'] ) && isset( $field['std'] ) && $field['type'] != 'repeater' ) {
			$field['value'] = $field['std'];
		}

		if ( ! in_array( $field['type'], $this->supported_fields ) ) {
			return '';
		}

		if ( $field['type'] == 'repeater' ) {
			$field['widget_field'] = true;
		}

		// filter field
		if ( isset( $field['filter-field'] ) && $field['filter-field-value'] ) {

			// filter field value
			$filter_field_value = isset( $this->values[ $field['filter-field'] ] ) ? $this->values[ $field['filter-field'] ] : null;
			if ( is_null( $filter_field_value ) ) {

				foreach ( $this->items['fields'] as $_field ) {

					if ( $_field == $field['filter-field'] ) {

						if ( isset( $_field['std'] ) && $_field['type'] != 'repeater' ) {

							$filter_field_value = $_field['std'];

						}

					}

				}

			}

			if ( $field['filter-field-value'] !== $filter_field_value ) {

				$field['section-css']['display'] = "none";

			}

		}

		return $this->section(
			call_user_func(
				array( $this, $field['type'] ),
				$field
			),
			$field
		);

	}


	/**
	 * Display HTML output of widget fields array
	 *
	 * @since  1.0
	 * @access public
	 * @return string
	 */
	public function get_fields() {

		$output = '';

		// Flag for detecting Groups
		$group_counter = 0;

		foreach ( $this->items['fields'] as $field ) {

			if ( $field['type'] == 'group_close' ) {

				// close tag for latest group in tab
				if ( $group_counter != 0 ) {
					$group_counter = 0;
					$output        .= $this->get_fields_group_close( $field );
				}
				continue;
			}

			if ( $field['type'] == 'group' ) {

				// close tag for latest group in tab
				if ( $group_counter != 0 ) {
					$group_counter = 0;
					$output        .= $this->get_fields_group_close( $field );
				}

				if ( isset( $field['container-class'] ) ) {
					$field['container-class'] .= ' bf-widgets';
				} else {
					$field['container-class'] = 'bf-widgets';
				}

				$output .= $this->get_fields_group_start( $field );

				$group_counter ++;

			} else {

				$output .= $this->get_field( $field );

			}

		}

		// close tag for latest group
		if ( $group_counter != 0 ) {
			$output .= $this->get_fields_group_close();
		}

		return $output;
	}

}
