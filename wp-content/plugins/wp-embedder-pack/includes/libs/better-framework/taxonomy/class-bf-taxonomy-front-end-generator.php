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
 * Taxonomies Field Generator For Admin
 */
class BF_Taxonomy_Front_End_Generator extends BF_Admin_Fields {


	/**
	 * @see BF_Metabox_Core::init_metabox apply_filters
	 *
	 * @var string
	 */
	public $metabox_id;


	/**
	 * Constructor Function
	 *
	 * @param array  $items
	 * @param        $id         term ID
	 * @param array  $values
	 * @param string $metabox_id metabox ID {@see  self::$metabox_id}  doc
	 *
	 * @since  1.0
	 * @access public
	 * @return \BF_Taxonomy_Front_End_Generator
	 */
	public function __construct( array &$items, &$id, &$values = array(), $metabox_id = false ) {

		// Parent Constructor
		$generator_options = array(
			'templates_dir' => BF_PATH . 'taxonomy/templates/'
		);
		parent::__construct( $generator_options );

		$this->items  = $items;
		$this->id     = $id;
		$this->values = $values;

		$this->metabox_id = $metabox_id;
	}


	/**
	 * Make input name from options variable
	 *
	 * @param  (array) $options Options array
	 *
	 * @since  1.0
	 * @access public
	 * @return string
	 */
	public function input_name( &$options ) {

		$id   = isset( $options['id'] ) ? $options['id'] : '';
		$type = isset( $options['type'] ) ? $options['type'] : '';

		switch ( $type ) {

			case( 'repeater' ):
				return "bf-term-meta[%s][%d][%s]";
				break;

			default:
				return "bf-term-meta[{$id}]";
				break;
		}

	}


	/**
	 * Used for generating fields
	 */
	public function callback( $is_ajax = false ) {

		$items_has_tab    = ! $is_ajax;
		$skip_ajax_fields = ! $is_ajax;
		$has_tab          = false;
		$tab_counter      = 0;
		$group_counter    = array();

		$metabox_name = isset( $this->items['config']['name'] ) ? $this->items['config']['name'] : __( 'Better Options', 'better-studio' );

		// Base wrapper
		if ( ! $is_ajax ) {
			$wrapper = Better_Framework::html()->add( 'div' );
			$wrapper = $wrapper->class( 'bf-tax-meta-wrap bf-metabox-wrap bf-clearfix' )->data( 'id', $this->id );
			if ( $this->metabox_id ) {
				$wrapper->data( 'metabox-id', $this->metabox_id );
			}
			// Better Option Title
			$wrapper->text(
				Better_Framework::html()->add( 'div' )->class( 'bf-tax-metabox-title' )->text(
					Better_Framework::html()->add( 'h3' )->text( $metabox_name )
				)
			);
		}


		$container = Better_Framework::html()->add( 'div' );

		if ( ! $is_ajax ) {
			$container = $container->class( 'bf-metabox-container' );
		}

		// Add Tab
		if ( $items_has_tab && ! $is_ajax ) {
			$container->class( 'bf-with-tabs' );
			$tabs_container = Better_Framework::html()->add( 'div' )->class( 'bf-metabox-tabs' );
			$tabs_container->text( $this->get_tabs() );
			$wrapper->text( $tabs_container->display() );
		}

		foreach ( $this->items['fields'] as $field ) {

			$field['input_name'] = $this->input_name( $field );

			$field['value'] = isset( $field['id'] ) && isset( $this->values[ $field['id'] ] ) ? $this->values[ $field['id'] ] : false;

			if ( isset( $field['type'] ) && $field['type'] == 'info' && $field['std'] ) {
				$field['value'] = $field['std'];
			}

			if ( $skip_ajax_fields && ! empty( $field['ajax-tab-field'] ) ) { // Backward compatibility
				continue;
			}

			if ( $skip_ajax_fields && ! empty( $field['ajax-section-field'] ) ) {
				continue;
			}

			if ( $field['type'] == 'repeater' ) {
				$field['clone-name-format'] = 'bf-term-meta[%s][%d][%s]';
				$field['metabox-id']        = $this->id;
				$field['metabox-field']     = true;
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
				$has_tab = true;
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

			$container->text(
				$this->section(
					call_user_func(
						array( $this, $field['type'] ),
						$field
					),
					$field
				)
			);

		}

		// last sub tab closing
		if ( $has_tab ) {
			$container->text( "</div><!-- /Section -->" );
		}


		if ( $is_ajax ) {
			echo $container->display();
		} else {
			$wrapper->text(
				$container->display()
			);
			echo $wrapper;  // escaped before
		}


	} // callback
}
