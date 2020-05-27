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
 * BF Menu Field Generator
 *
 * @since 1.0
 */
class BF_Menu_Field_Generator extends BF_Admin_Fields {

	/**
	 * Menu item that contains values
	 *
	 * @since  1.0
	 * @access public
	 * @var array
	 */
	public $menu_item;


	/**
	 * Constructor Function
	 *
	 * @param array  $items
	 * @param object $menu_item
	 *
	 * @since  1.0
	 * @access public
	 * @return \BF_Menu_Field_Generator
	 */
	public function __construct( array $items, &$menu_item = null ) {

		$items['templates_dir'] = BF_PATH . 'menu/templates/';

		// Parent Constructor
		parent::__construct( $items );

		$this->menu_item = &$menu_item;
	}


	/**
	 * Display HTML output of fields
	 *
	 * @since  1.0
	 * @access public
	 * @return string
	 */
	public function get_fields() {

		$output        = '';
		$group_counter = 0;

		$all_std = BF_Menus::get_std();

		foreach ( BF_Menus::get_fields() as $key => $field ) {

			if ( isset( $field['panel-id'] ) ) {
				$std = Better_Framework::options()->get_panel_std_id( $field['panel-id'] );
			} else {
				$std = 'std';
			}

			if ( empty( $field['id'] ) ) {
				$field['value'] = false;
			} else {
				$field['value'] = isset( $this->menu_item->{$field['id']} ) ? $this->menu_item->{$field['id']} : false;
			}

			if ( $field['value'] == false ) {
				if ( isset( $all_std[ $std ] ) ) {
					$field['value'] = $all_std[ $std ];
				} elseif ( $std != 'std' && isset( $all_std['std'] ) ) {
					$field['value'] = $all_std['std'];
				}
			}

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

				$output .= $this->get_fields_group_start( $field );

				$group_counter ++;
			}

			if ( ! in_array( $field['type'], $this->supported_fields ) ) {
				continue;
			}

			// for image checkbox sortable option
			if ( isset( $field['is_sortable'] ) && ( $field['is_sortable'] == '1' ) ) {
				$field['section_class'] .= ' is-sortable';
			}

			$field['input_name'] = $this->generate_field_ID( $key, $this->menu_item->ID );

			$output .= $this->section(
				call_user_func(
					array( $this, $field['type'] ),
					$field
				),
				$field
			);

		} // foreach


		// close tag for latest group in tab
		if ( $group_counter != 0 ) {
			$output .= $this->get_fields_group_close( $field );
		}

		unset( $std );
		unset( $group_counter );

		return $output;
	}


	/**
	 * Generate valid names for fields
	 *
	 * @param $key
	 * @param $parent_id
	 *
	 * @return string
	 */
	public function generate_field_ID( $key, $parent_id ) {

		return 'bf-m-i[' . esc_attr( $key ) . '][' . $parent_id . ']';
	}

}