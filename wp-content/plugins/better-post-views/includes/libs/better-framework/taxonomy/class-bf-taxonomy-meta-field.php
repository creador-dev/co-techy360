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
 * Used for adding custom fields to Taxonomy fields
 */
class BF_Taxonomy_Meta_Field {

	public $metabox_id = '';

	/**
	 * Initialize Taxonomy Meta
	 *
	 * @param $metabox_id
	 */
	public function __construct( $metabox_id ) {

		if ( ! isset( BF_Taxonomy_Core::$metabox[ $metabox_id ] ) ) {
			return;
		}

		$this->metabox_id = $metabox_id;

		$metabox_config = BF_Taxonomy_Core::get_metabox_config( $metabox_id );

		if ( ! is_array( $metabox_config['taxonomies'] ) ) {

			add_action( $metabox_config['taxonomies'] . '_add_form_fields', array(
				$this,
				'add_form_fields'
			), 10, 2 );

			add_action( $metabox_config['taxonomies'] . '_edit_form', array(
				$this,
				'add_form_fields'
			), 10, 2 );

			add_action( 'create_' . $metabox_config['taxonomies'], array( $this, 'save_fields' ) );

			add_action( 'edited_' . $metabox_config['taxonomies'], array(
				$this,
				'save_fields'
			), 10, 2 );

		} else {

			foreach ( $metabox_config['taxonomies'] as $taxonomy ) {

				add_action( $taxonomy . '_add_form_fields', array( $this, 'add_form_fields' ), 10, 2 );
				add_action( $taxonomy . '_edit_form', array( $this, 'add_form_fields' ), 10, 2 );

				add_action( 'create_' . $taxonomy, array( $this, 'save_fields' ) );
				add_action( 'edited_' . $taxonomy, array( $this, 'save_fields' ) );

			}

		}

		add_action( 'delete_term', array( __CLASS__, 'delete_tax_data' ), 10, 2 );

		unset( $metabox_config );
		unset( $metabox_id );

		if ( ! has_action( 'better-framework/taxonomy/metabox/ajax-tab', __CLASS__ . '::ajax_tab' ) ) {
			/**
			 * Action to handle ajax taxonomy metabox tabs
			 */
			add_action( 'better-framework/taxonomy/metabox/ajax-tab', __CLASS__ . '::ajax_tab', 10, 3 );
		}
	}


	/**
	 * Adds fields to add and edit form in Taxonomy admin form
	 *
	 * @param null
	 */
	public function add_form_fields( $term = NULL ) {

		$values = array();

		if ( is_object( $term ) ) {
			$term_id = $term->term_id;
		} else {
			$term_id = '';
		}


		$metabox = array(
			'config' => BF_Taxonomy_Core::get_metabox_config( $this->metabox_id ),
			'fields' => BF_Taxonomy_Core::get_metabox_fields( $this->metabox_id ),
		);

		foreach ( $metabox['fields'] as $key => $field ) {

			if ( $field['type'] == 'tab' || $field['type'] == 'group' ) {
				continue;
			}

			if ( ! empty( $field['id'] ) ) {

				//  this returns default value if term mta is not saved before
				$values[ $field['id'] ] = bf_get_term_meta( $field['id'], $term_id );

			}
		}

		$front_end = new BF_Taxonomy_Front_End_Generator( $metabox, $term_id, $values, $this->metabox_id );

		echo $front_end->callback();  // escaped before

	}


	/**
	 * Save taxonomy custom options as an option
	 *
	 * @param $term_id
	 */
	public function save_fields( $term_id ) {

		if ( ! isset( $_POST['bf-term-meta'] ) ) {
			return;
		}

		if ( isset( BF_Taxonomy_Core::$metabox[ $this->metabox_id ]['panel-id'] ) ) {
			$std_id = Better_Framework::options()->get_panel_std_id( BF_Taxonomy_Core::$metabox[ $this->metabox_id ]['panel-id'] );
		} else {
			$std_id = 'std';
		}


		foreach ( BF_Taxonomy_Core::get_metabox_std( $this->metabox_id ) as $key => $field ) {

			// add / update meta
			if ( isset( $_POST['bf-term-meta'][ $key ] ) ) {

				$save = TRUE;

				// check for saving default or not!?
				if ( isset( $field['save-std'] ) && ! $field['save-std'] ) {

					if ( isset( $field[ $std_id ] ) && $_POST['bf-term-meta'][ $key ] == $field[ $std_id ] ) {
						$save = FALSE;
					} elseif ( isset( $field['std'] ) && $_POST['bf-term-meta'][ $key ] == $field['std'] ) {
						$save = FALSE;
					}
				}

				if ( $save === FALSE ) {
					bf_delete_term_meta( $term_id, $key );
				} else {
					bf_update_term_meta( $term_id, $key, $_POST['bf-term-meta'][ $key ] );
				}

			}// if
		}// for

	} // save_fields


	/**
	 * Delete taxonomy option from option table
	 *
	 * @param $term
	 * @param $term_id
	 */
	public static function delete_tax_data( $term, $term_id ) {
		if ( $all_meta = bf_get_term_meta( '', $term_id ) ) {
			foreach ( $all_meta as $meta_key => $meta_value ) {
				bf_delete_term_meta( $term_id, $meta_key );
			}
		}
	}

	public static function ajax_tab( $section_id, $metabox_id, $term_id ) {

		$metabox       = array(
			'config' => BF_Taxonomy_Core::get_metabox_config( $metabox_id ),
			'fields' => BF_Taxonomy_Core::get_metabox_fields( $metabox_id ),
		);
		$use_generator = TRUE;
		$values        = array();


		if ( empty( $metabox['fields'][ $section_id ]['ajax-section-handler'] ) ) {

			foreach ( $metabox['fields'] as $key => $field ) {

				// Backward compatibility
				if ( isset( $field['ajax-tab-field'] ) ) {
					$field['ajax-section-field'] = $field['ajax-tab-field'];
				}

				if ( empty( $field['ajax-section-field'] ) || $field['ajax-section-field'] !== $section_id ) {
					unset( $metabox['fields'][ $key ] );
				} else if ( $field['type'] !== 'tab' && $field['type'] !== 'group' ) {


					if ( isset( $field['type'] ) && $field['type'] == 'info' && $field['std'] ) {
						$field['value'] = $field['std'];
					} else {
						//  this returns default value if term mta is not saved before
						$values[ $field['id'] ] = bf_get_term_meta( $field['id'], $term_id );
					}

				}
			}

		} else {

			$parent_field = $metabox['fields'][ $section_id ];

			$args = isset( $parent_field['ajax-section-handler-args'] ) ? $parent_field['ajax-section-handler-args'] : array();
			$args = array_merge( $args, compact( 'metabox_id', 'section_id' ) );

			if (
				! isset( $parent_field['ajax-section-handler-type'] ) ||
				$parent_field['ajax-section-handler-type'] === 'field-generator'
			) {

				$metabox['fields'] = call_user_func( $parent_field['ajax-section-handler'], $args );

				foreach ( $metabox['fields'] as $key => $field ) {

					$values[ $field['id'] ] = bf_get_term_meta( $field['id'], $term_id );
				}
			} else {

				$use_generator = FALSE;
				$out           = call_user_func( $parent_field['ajax-section-handler'], $args );

			}
		}


		if ( $use_generator ) {
			$front_end = new BF_Taxonomy_Front_End_Generator( $metabox, $term_id, $values, $metabox_id );
			ob_start();
			echo $front_end->callback( TRUE );  // escaped before
			$out = ob_get_clean();
		}

		wp_send_json( array( 'out' => $out, 'tab_id' => $section_id ) );
	}
}
