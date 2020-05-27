<?php

/**
 * TinyMCE Views field generator
 */
class BF_Tinymce_View_Field_Generator extends BF_Admin_Fields {

	/**
	 * @var array
	 */
	public $shortcode_content_fields = array();


	/**
	 * Constructor Method
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
			'templates_dir' => BF_PATH . 'tinymce/templates/'
		) );

		$this->items  = $items;
		$this->id     = $id;
		$this->values = $values;
	}

	public function output() {
		$this->callback( TRUE );
	}

	/**
	 * Field Generator
	 */
	public function callback() {

		$has_tab = FALSE;

		// Add Class For Post Format Filter
		$container = Better_Framework::html()->add( 'div' )->class( 'tinymce-addon-fields' );

		$tab_counter   = 0;
		$group_counter = 0;

		$fields_std = $this->get_stds();

		$container->text( '<div class="tabs-wrapper">' . $this->get_tabs() . '</div>' );

		foreach ( $this->get_fields() as $field ) {

			if ( ! empty( $field['type'] ) && $field['type'] === 'id-holder' ) {
				continue;
			}

			if ( ! isset( $field['input_class'] ) ) {
				$field['input_class'] = '';
			}

			$field['input_class'] .= ' mce-field';
			$field['input_name'] = $this->input_name( $field );

			$field_id = isset( $field['id'] ) ? $field['id'] : FALSE;

			if ( $field['type'] === 'info' ) {
				if ( isset( $field['std'] ) ) {
					$field['value'] = $field['std'];
				} else {
					$field['value'] = '';
				}
			} else {
				$field['value'] = isset( $field['id'] ) && isset( $this->values[ $field['id'] ] ) ? $this->values[ $field['id'] ] : NULL;
			}

			if ( is_null( $field['value'] ) && isset( $fields_std[ $field_id ] ) ) {
				$field['value'] = $fields_std[ $field_id ];
			}

			if ( $field['type'] == 'repeater' ) {
				$field['clone-name-format'] = 'bf-metabox-option[$3][$4][$5][$6]';
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
					$container->text( "\n\n<!-- Section -->\n<div class='group subtab-group' id='bf-tmv-{$field["id"]}'>\n" );
				} else {
					$container->text( "\n\n<!-- Section -->\n<div class='group' id='bf-tmv-{$field["id"]}'>\n" );
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

		echo $container->display();
	} // callback

	/**
	 * Used for creating input name
	 *
	 * @param $options
	 *
	 * @return string
	 */
	public function input_name( &$options ) {

		if ( isset( $options['type'] ) && $options['type'] === 'repeater' ) {
			return '%2$s[%3$d][%4$s]';
		}

		return isset( $options['id'] ) ? $options['id'] : '';
	}


	/**
	 * Get shortcode fields std values
	 *
	 * @return array
	 */
	public function get_stds() {

		if ( $shortcode = BF_Shortcodes_Manager::factory( $this->id ) ) {
			return $shortcode->defaults;
		}

		return array();
	}

	public function generate_repeater_field( $tinymce, $field, $defaults, $name_format, $number ) {

		if ( ! isset( $field['input_class'] ) ) {
			$field['input_class'] = '';
		}
		$field['input_class'] .= ' mce-field';

		if ( ! empty( $field['shortcode_content'] ) ) {
			$this->shortcode_content_fields[ $tinymce['id'] ] = $field['id'];
		}

		return parent::generate_repeater_field( $tinymce, $field, $defaults, $name_format, $number );
	}

	public function generate_repeater_field_script( $tinymce, $field, $defaults ) {

		if ( ! isset( $field['input_class'] ) ) {
			$field['input_class'] = '';
		}
		$field['input_class'] .= ' mce-field';

		return parent::generate_repeater_field_script( $tinymce, $field, $defaults );
	}

	public function __call( $name, $arguments ) {

		$file = BF_PATH . 'tinymce/fields/' . $name . '.php';

		// Check if requested field (method) does exist!
		if ( ! file_exists( $file ) ) {
			return parent::__call( $name, $arguments );
		}


		$options = $arguments[0];

		// Capture output
		ob_start();
		require $file;

		$data = ob_get_clean();

		return $data;
	}
}
