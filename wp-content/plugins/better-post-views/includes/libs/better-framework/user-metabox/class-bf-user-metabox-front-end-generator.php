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
 * User Metabox Fields Generator
 */
class BF_User_Metabox_Front_End_Generator extends BF_Admin_Fields {


	/**
	 * Constructor Function
	 *
	 * @param array  $items  Panel All Options
	 * @param string $id     Panel ID
	 * @param array  $values Panel Saved Values
	 *
	 * @since  1.4
	 * @access public
	 */
	public function __construct( array &$items, &$id, &$values = array() ) {
		// Parent Constructor
		parent::__construct( array(
			'templates_dir' => BF_PATH . 'metabox/templates/'
		) );

		$this->items  = $items;
		$this->id     = $id;
		$this->values = $values;
	}


	/**
	 * Used for creating input name
	 *
	 * @since 1.4
	 *
	 * @param $options
	 *
	 * @return string
	 */
	public function input_name( &$options ) {

		$id   = isset( $options['id'] ) ? $options['id'] : '';
		$type = isset( $options['type'] ) ? $options['type'] : '';

		switch ( $type ) {

			default:
				return "{$id}";
				break;

		}

	}


	/**
	 *  Metabox panel generator
	 *
	 * @since 1.4
	 */
	public function callback( $is_ajax = FALSE ) {

		$skip_ajax_fields      = ! $is_ajax;
		$this->items['fields'] = BF_User_Metabox_Core::get_metabox_fields( $this->id );
		$metabox_config        = BF_User_Metabox_Core::get_metabox_config( $this->id );
		$items_has_tab         = ! $is_ajax && $this->has_tab();
		$has_tab               = FALSE;

		if ( ! $is_ajax ) {
			$wrapper = Better_Framework::html()->add( 'div' )->class( 'bf-user-meta-wrap bf-metabox-wrap bf-clearfix' )->data( 'id', $this->id );

			// Better Option Title
			$wrapper->text(
				Better_Framework::html()->add( 'div' )->class( 'bf-user-metabox-title' )->text(
					Better_Framework::html()->add( 'h3' )->text( $metabox_config['title'] )
				)
			);

			// Add Class For Post Format Filter
			if ( isset( $metabox_config['post_format'] ) ) {
				$wrapper->data( 'bf_pf_filter', implode( ',', $metabox_config['post_format'] ) );
			}
		}

		$container = Better_Framework::html()->add( 'div' );
		if ( ! $is_ajax ) {
			$container = $container->class( 'bf-metabox-container' );
		}

		$tab_counter = 0;

		$group_counter = 0;

		if ( $items_has_tab && ! $is_ajax ) {
			$container->class( 'bf-with-tabs' );
			$tabs_container = Better_Framework::html()->add( 'div' )->class( 'bf-metabox-tabs' );
			$tabs_container->text( $this->get_tabs() );
			$wrapper->text( $tabs_container->display() );
		}

		if ( isset( $this->items['panel-id'] ) ) {
			$std_id = Better_Framework::options()->get_panel_std_id( $this->items['panel-id'] );
		} else {
			$std_id = 'std';
		}

		foreach ( $this->items['fields'] as $field ) {

			$field['input_name'] = $this->input_name( $field );

			$field['value'] = isset( $field['id'] ) && isset( $this->values[ $field['id'] ] ) ? $this->values[ $field['id'] ] : NULL;

			if ( is_null( $field['value'] ) && isset( $field[ $std_id ] ) ) {
				$field['value'] = $field[ $std_id ];
			} elseif ( is_null( $field['value'] ) && isset( $field['std'] ) ) {
				$field['value'] = $field['std'];
			}

			if ( $skip_ajax_fields && ! empty( $field['ajax-tab-field'] ) ) {  // Backward compatibility
				continue;
			}

			if ( $skip_ajax_fields && ! empty( $field['ajax-section-field'] ) ) {
				continue;
			}


			if ( $field['type'] == 'repeater' ) {
				$field['clone-name-format'] = 'bf-metabox-option[$1][$2][$3][$4]';
				$field['metabox-id']        = $this->id;
				$field['metabox-field']     = TRUE;
			}

			if ( $field['type'] == 'tab' || $field['type'] == 'subtab' ) {

				// close tag for latest group in tab
				if ( $group_counter != 0 ) {
					$group_counter = 0;
					$container->text( $this->get_fields_group_close( $field ) );
				}

				$is_subtab = $field['type'] == 'subtab';

				if ( $tab_counter != 0 ) {
					$container->text( '</div><!-- /Section -->' );
				}

				if ( $is_subtab ) {
					$container->text( "\n\n<!-- Section -->\n<div class='group subtab-group' id='bf-metabox-{$this->id}-{$field["id"]}'>\n" );
				} else {
					$container->text( "\n\n<!-- Section -->\n<div class='group' id='bf-metabox-{$this->id}-{$field["id"]}'>\n" );
				}
				$has_tab = TRUE;
				$tab_counter ++;
				continue;
			}

			if ( $field['type'] == 'group_close' ) {

				// close tag for latest group in tab
				if ( $group_counter != 0 ) {
					$group_counter = 0;
					$container->text( $this->get_fields_group_close( $field ) );
				}
				continue;
			}

			if ( $field['type'] == 'group' ) {

				// close tag for latest group in tab
				if ( $group_counter != 0 ) {
					$group_counter = 0;
					$container->text( $this->get_fields_group_close( $field ) );
				}

				$container->text( $this->get_fields_group_start( $field ) );

				$group_counter ++;
			}


			if ( ! in_array( $field['type'], $this->supported_fields ) ) {
				continue;
			}

			// Filter Each Field For Post Formats!
			if ( isset( $field['post_format'] ) ) {

				if ( is_array( $field['post_format'] ) ) {
					$field_post_formats = implode( ',', $field['post_format'] );
				} else {
					$field_post_formats = $field['post_format'];
				}
				$container->text( "<div class='bf-field-post-format-filter' data-bf_pf_filter='{$field_post_formats}'>" );
			}

			$container->text(
				$this->section(
					call_user_func(
						array( $this, $field['type'] ),
						$field
					),
					$field
				)
			);

			// End Post Format Filter Wrapper
			if ( isset( $field['post_format'] ) ) {

				$container->text( "</div>" );
			}
		}

		// close tag for latest group in tab
		if ( $group_counter != 0 ) {
			$container->text( $this->get_fields_group_close( $field ) );
		}

		// last sub tab closing
		if ( $has_tab ) {
			$container->text( "</div><!-- /Section -->" );
		}

		if ( $is_ajax ) {
			echo $container->display();
		} else {
			$wrapper->text( $container->display() );
			echo $wrapper; // escaped before
		}

	} // callback
}