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
 * Metabox Fields Generator
 */
class BF_Metabox_Front_End_Generator extends BF_Admin_Fields {


	/**
	 * Constructor Function
	 *
	 * @param array $items  Panel All Options
	 * @param int   $id     Panel ID
	 * @param array $values Panel Saved Values
	 *
	 * @since  1.0
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
	 * @param $options
	 *
	 * @return string
	 */
	public function input_name( &$options ) {

		$id   = isset( $options['id'] ) ? $options['id'] : '';
		$type = isset( $options['type'] ) ? $options['type'] : '';

		switch ( $type ) {

			case( 'repeater' ):
				return "bf-metabox-option[%s][%s][%d][%s]";
				break;

			default:
				return "bf-metabox-option[{$this->id}][{$id}]";
				break;

		}

	}


	/**
	 *  Metabox panel generator
	 *
	 * @param bool $is_ajax ignore ajax items
	 */
	public function callback( $is_ajax = FALSE ) {
		$metabox_config = BF_Metabox_Core::get_metabox_config( $this->id );
		$items_has_tab  = $this->has_tab();
		$has_tab        = FALSE;
		$has_wrapper    = $is_ajax !== TRUE;

		if ( $has_wrapper ) {
			$wrapper = Better_Framework::html()->add( 'div' )->class( 'bf-metabox-wrap bf-clearfix' )->data( 'id', $this->id );
		}

		// Add Class For Post Format Filter
		if ( isset( $metabox_config['post_format'] ) && $has_wrapper ) {
			$wrapper->data( 'bf_pf_filter', implode( ',', $metabox_config['post_format'] ) );
		}
		$container = Better_Framework::html()->add( 'div' );
		if ( $is_ajax !== TRUE ) {
			$container = $container->class( 'bf-metabox-container' );
		}

		$tab_counter = 0;

		$group_counter = array();

		if ( $items_has_tab && $is_ajax !== TRUE ) {
			$container->class( 'bf-with-tabs' );
			$tabs_container = Better_Framework::html()->add( 'div' )->class( 'bf-metabox-tabs' );
			$tabs_container->text( $this->get_tabs() );
			if ( $has_wrapper ) {
				$wrapper->text( $tabs_container->display() );
			}
			Better_Framework()->assets_manager()->add_admin_css( '#bf_' . $this->id . ' .inside{margin: 0 !important; padding: 0 !important;}' );
		}

		if ( isset( $this->items['panel-id'] ) ) {
			$std_id = Better_Framework::options()->get_panel_std_id( $this->items['panel-id'] );
		} else {
			$std_id = 'std';
		}

		$metabox_fields = BF_Metabox_Core::get_metabox_fields( $this->id );

		$metabox_std = BF_Metabox_Core::get_metabox_std( $this->id );

		foreach ( $metabox_fields as $field_id => $field ) {

			if ( ! empty( $field['type'] ) && $field['type'] === 'id-holder' ) {
				continue;
			}

			if ( $is_ajax !== TRUE && ! empty( $field['ajax-tab-field'] ) ) {  // Backward compatibility
				continue;
			}

			if ( $is_ajax !== TRUE && ! empty( $field['ajax-section-field'] ) ) {
				continue;
			}

			$field['input_name'] = $this->input_name( $field );

			if ( $field['type'] === 'info' ) {
				if ( isset( $field['std'] ) ) {
					$field['value'] = $field['std'];
				} else {
					$field['value'] = '';
				}
			} else {
				$field['value'] = isset( $field['id'] ) && isset( $this->values[ $field['id'] ] ) ? $this->values[ $field['id'] ] : NULL;
			}

			if ( is_null( $field['value'] ) && isset( $metabox_std[ $field_id ][ $std_id ] ) ) {
				$field['value'] = $metabox_std[ $field_id ][ $std_id ];
			} elseif ( is_null( $field['value'] ) && isset( $metabox_std[ $field_id ]['std'] ) ) {
				$field['value'] = $metabox_std[ $field_id ]['std'];
			}

			if ( isset( $field['filter-field'] ) && $field['filter-field-value'] ) {

				// Get value if is available
				$filter_field_value = isset( $this->values[ $field['filter-field'] ] ) ? $this->values[ $field['filter-field'] ] : NULL;

				// is null means this is post create screen and filter field default value should be used for
				// default comparison
				if ( is_null( $filter_field_value ) ) {

					if ( isset( $metabox_std[ $field['filter-field'] ][ $std_id ] ) ) {
						$filter_field_value = $metabox_std[ $field['filter-field'] ][ $std_id ];
					} elseif ( isset( $metabox_std[ $field['filter-field'] ]['std'] ) ) {
						$filter_field_value = $metabox_std[ $field['filter-field'] ]['std'];
					} else {
						$filter_field_value = FALSE;
					}

				}

				if ( $field['filter-field-value'] !== $filter_field_value ) {
					$field['section-css']['display'] = "none";
				}

			}

			if ( $field['type'] == 'repeater' ) {
				$field['clone-name-format'] = 'bf-metabox-option[$3][$4][$5][$6]';
				$field['metabox-id']        = $this->id;
				$field['metabox-field']     = TRUE;
			}

			if ( $field['type'] == 'tab' || $field['type'] == 'subtab' ) {

				if ( $has_tab ) {

					// close all opened groups
					foreach ( array_reverse( $group_counter ) as $level_k => $level_v ) {

						if ( $level_v === 0 ) {
							continue;
						}

						for ( $i = 0; $i < $level_v; $i ++ ) {
							$container->text( $this->get_fields_group_close( $field ) );
						}

						$group_counter[ $level_k ] = 0;
					}
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
							$container->text( $this->get_fields_group_close( $field ) );
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
							$container->text( $this->get_fields_group_close( $field ) );
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
						$container->text( $this->get_fields_group_close( $field ) );
					}

					$group_counter[ $level_k ] = 0;
				}

				$container->text( $this->get_fields_group_start( $field ) );

				$group_counter[ $field['level'] ] ++;
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

		// last sub tab closing
		if ( $has_tab ) {
			$container->text( "</div><!-- /Section -->" );
		}

		if ( $has_wrapper ) {
			$wrapper->text(
				$container->display()
			);
			echo $wrapper;  // escaped before
		} else {
			echo $container->display();
		}
	} // callback
}
