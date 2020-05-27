<?php


class BF_Fields_To_Gutenberg {

	/**
	 * @var array
	 */
	protected $fields = array();

	/**
	 * @var array
	 */
	protected $stds = array();


	/**
	 * BF_Fields_To_Gutenberg constructor.
	 *
	 * @param array $fields
	 * @param array $stds
	 *
	 * @since 3.9.0
	 */
	public function __construct( array $fields = array(), $stds = array() ) {

		$this->load_fields( $fields );
		$this->load_stds( $stds );
	}


	/**
	 * Set standard BF fields array.
	 *
	 * @param array $fields
	 *
	 * @since 3.9.0
	 */
	public function load_fields( array $fields ) {

		$this->fields = $fields;
	}


	/**
	 * Set fields default std value.
	 *
	 * @param array $stds
	 *
	 * @since 3.9.0
	 */
	public function load_stds( array $stds ) {

		$this->stds = $stds;
	}


	/**
	 * Get BF fields array.
	 *
	 * @since 3.9.0
	 * @return array
	 */
	public function fields() {

		return $this->fields;
	}


	/**
	 * Transform fields to gutenberg format.
	 *
	 * @since 3.9.0
	 *
	 * @param BF_Gutenberg_Field_Transformer|null $parent_field parent object if exists
	 *
	 * @return array
	 */
	public function transform( BF_Gutenberg_Field_Transformer $parent_field = null ) {

		$container = array();
		$results   = &$container;

		$tab_started = false;
		$iteration   = 0;

		foreach ( $this->fields as $field ) {

			if ( empty( $field['type'] ) ) {

				continue;
			}

			if ( ! isset( $field['std'] ) && isset( $field['id'] ) ) {

				$id = $field['id'];

				if ( isset( $this->stds[ $id ] ) ) {

					$field['std'] = $this->stds[ $id ];
				}
			}

			$field_type = $field['type'];

			if ( 'group_close' === $field_type ) {

				$container = &$results;
				continue;
			}

			if ( 'tab' === $field_type && $tab_started ) {

				$tab_started = false;
				$container   = &$results;
			}

			if ( ! $factory = $this->factory( $field ) ) {
				continue;
			}

			$this->transform_field( $container, $factory, ++ $iteration, $parent_field );

			if ( 'group' === $field_type || 'tab' === $field_type ) {

				$tab_started = true;

				end( $container );
				$key = key( $container );
				//
				$results   = &$container;
				$container = &$container[ $key ]['children'];
			}
		}

		return $results;
	}


	public function list_attributes() {

		$results = array();

		foreach ( $this->fields as $field ) {

			if ( empty( $field['type'] ) ) {
				continue;
			}

			if ( ! $factory = $this->factory( $field ) ) {
				continue;
			}

			if ( $the_attribute = $factory->the_attribute() ) {
				$results[ $factory->field( 'id' ) ] = $the_attribute;
			}
		}

		return $results;
	}


	/**
	 * @param array                          $container
	 * @param BF_Gutenberg_Field_Transformer $field
	 * @param int                            $iteration
	 * @param BF_Gutenberg_Field_Transformer $parent_transformer
	 *
	 * @return bool true on success or false on failure.
	 * @since 3.9.0
	 */
	protected function transform_field( &$container, BF_Gutenberg_Field_Transformer $field, $iteration, BF_Gutenberg_Field_Transformer $parent_transformer = null ) {

		$transformed = $field->transform_field( $iteration );

		if ( ! is_array( $transformed ) ) {

			return false;
		}

		$id = $field->field( 'id' );

		if ( ! isset( $transformed['id'] ) ) {
			$transformed['id'] = $id;
		}

		$data = array(
			'id'        => $id,
			'key'       => $id,
			'component' => $field->component(),
			'args'      => $transformed,
		);

		if ( $attribute = $field->the_attribute() ) {

			$data['attribute'] = $attribute;
		}

		if ( $shared_keys = array_intersect_key( $field->field(), array(
			'include_blocks' => '',
			'exclude_blocks' => '',
			'fixed_class'    => '',
			'action'         => '',
			'std'            => '',
		) )
		) {

			$data = array_merge( $data, $shared_keys );
		}

		if ( $children = $field->children_items_list() ) {

			$children_handler = new self( $children );

			if ( $children_transformed = $children_handler->transform( $field ) ) {

				$data['children'] = $children_transformed;
			}
		}

		if ( $parent_transformer ) {

			$data = $parent_transformer->children_item( $data );
		}

		if ( $field->wrap_section_container ) {

			$container[] = $this->wrap_section_container( $field, $data );

		} else {

			$container[] = $data;
		}

		return true;
	}


	/**
	 * @param BF_Gutenberg_Field_Transformer $field
	 * @param array                          $data
	 *
	 * @return array
	 */
	public function wrap_section_container( $field, $data ) {

		$title = isset( $data['args']['label'] ) ? $data['args']['label'] : '';
		unset( $data['args']['label'] );

		$id = $field->field( 'id' );

		$args = array(
			'type'  => str_replace( array( '_', 'bf-gutenberg-' ), array(
				'-',
				''
			), strtolower( get_class( $field ) ) ),
			'label' => $title,
			'id'    => "field_$id",
			'name'  => $id,
		);

		if ( $classes = $field->field( 'section_class' ) ) {
			$args['classes'] = $classes;
		}

		if ( ! empty( $data['args']['desc'] ) ) {
			$args['description'] = $data['args']['desc'];

			unset( $data['args']['desc'] );
		}

		if ( $show_on = $field->field( 'show_on' ) ) {

			if ( ! function_exists( 'bf_show_on_attributes' ) ) {
				require BF_PATH . '/core/field-generator/functions.php';
			}

			$args['show_on'] = bf_show_on_settings( $field->field() );
		}

		return array(
			'id'        => "field_$id",
			'component' => 'BF_Section_Container',
			'args'      => $args,
			'key'       => "field_$id",
			'children'  => array( $data ),
		);
	}


	/**
	 * @param array $field
	 *
	 * @since 3.9.0
	 * @return BF_Gutenberg_Field_Transformer on success or null on failure.
	 */
	public function factory( array $field ) {


		if ( empty( $field['type'] ) ) {
			return null;
		}

		if ( ! class_exists( 'BF_Gutenberg_Field_Transformer' ) ) {

			require BF_PATH . 'gutenberg/class-bf-gutenberg-field.php';
		}

		switch ( $field['type'] ) {

			case 'text':

				if ( ! class_exists( 'BF_Gutenberg_Text_Control' ) ) {
					require BF_PATH . 'gutenberg/adapters/class-bf-gutenberg-text-control.php';
				}

				$instance = new BF_Gutenberg_Text_Control();

				break;

			case 'textarea':
			case 'wp_editor':

				if ( ! class_exists( 'BF_Gutenberg_Textarea_Control' ) ) {
					require BF_PATH . 'gutenberg/adapters/class-bf-gutenberg-textarea-control.php';
				}

				$instance = new BF_Gutenberg_Textarea_Control();

				break;

			case 'group':
			case 'tab':

				if ( ! class_exists( 'BF_Gutenberg_Panel_Body' ) ) {
					require BF_PATH . 'gutenberg/adapters/class-bf-gutenberg-panel-body.php';
				}

				$instance = new BF_Gutenberg_Panel_Body();

				break;

			case 'select':

				if ( ! class_exists( 'BF_Gutenberg_Tree_Select' ) ) {
					require BF_PATH . 'gutenberg/adapters/class-bf-gutenberg-tree-select.php';
				}

				$instance = new BF_Gutenberg_Tree_Select();

				break;
			case 'checkbox':

				if ( ! class_exists( 'BF_Gutenberg_Radio_Control' ) ) {
					require BF_PATH . 'gutenberg/adapters/class-bf-gutenberg-radio-control.php';
				}

				$instance = new BF_Gutenberg_Radio_Control();

				break;

			case 'switch':

				if ( ! class_exists( 'BF_Gutenberg_BF_Switch' ) ) {
					require BF_PATH . 'gutenberg/adapters/class-bf-gutenberg-bf-switch.php';
				}

				$instance = new BF_Gutenberg_BF_Switch();

				break;

			case 'slider':

				if ( ! class_exists( 'BF_Gutenberg_Range_Control' ) ) {
					require BF_PATH . 'gutenberg/adapters/class-bf-gutenberg-range-control.php';
				}

				$instance = new BF_Gutenberg_Range_Control();

				break;

			case 'date':

				if ( ! class_exists( 'BF_Gutenberg_Date_Time_Picker' ) ) {
					require BF_PATH . 'gutenberg/adapters/class-bf-gutenberg-date-time-picker.php';
				}

				$instance = new BF_Gutenberg_Date_Time_Picker();

				break;

			case 'color':

				if ( ! class_exists( 'BF_Gutenberg_Color_Palette' ) ) {
					require BF_PATH . 'gutenberg/adapters/class-bf-gutenberg-color-palette.php';
				}

				$instance = new BF_Gutenberg_Color_Palette();

				break;

			case 'repeater':

				if ( ! class_exists( 'BF_Gutenberg_BF_Repeater' ) ) {
					require BF_PATH . 'gutenberg/adapters/class-bf-gutenberg-bf-repeater.php';
				}

				$instance = new BF_Gutenberg_BF_Repeater();


				break;

			case 'hr':

				if ( ! class_exists( 'BF_Gutenberg_BF_Hr' ) ) {
					require BF_PATH . 'gutenberg/adapters/class-bf-gutenberg-bf-hr.php';
				}

				$instance = new BF_Gutenberg_BF_Hr();

				break;

			case 'info':

				if ( ! class_exists( 'BF_Gutenberg_BF_Info' ) ) {
					require BF_PATH . 'gutenberg/adapters/class-bf-gutenberg-bf-info.php';
				}

				$instance = new BF_Gutenberg_BF_Info();

				break;

			case 'heading':

				if ( ! class_exists( 'BF_Gutenberg_BF_Heading' ) ) {
					require BF_PATH . 'gutenberg/adapters/class-bf-gutenberg-bf-heading.php';
				}

				$instance = new BF_Gutenberg_BF_Heading();

				break;

			case 'select_popup':

				if ( ! class_exists( 'BF_Gutenberg_BF_Select_Popup' ) ) {
					require BF_PATH . 'gutenberg/adapters/class-bf-gutenberg-bf-select-popup.php';
				}

				$instance = new BF_Gutenberg_BF_Select_Popup();

				break;

			case 'icon_select':

				if ( ! class_exists( 'BF_Gutenberg_BF_Icon_Select' ) ) {
					require BF_PATH . 'gutenberg/adapters/class-bf-gutenberg-bf-icon-select.php';
				}

				$instance = new BF_Gutenberg_BF_Icon_Select();

				break;

			case 'ajax_action':

				if ( ! class_exists( 'BF_Gutenberg_BF_Ajax_Action' ) ) {
					require BF_PATH . 'gutenberg/adapters/class-bf-gutenberg-bf-ajax-action.php';
				}

				$instance = new BF_Gutenberg_BF_Ajax_Action();

				break;

			case 'ajax_select':

				if ( ! class_exists( 'BF_Gutenberg_BF_Ajax_Select' ) ) {
					require BF_PATH . 'gutenberg/adapters/class-bf-gutenberg-bf-ajax-select.php';
				}

				$instance = new BF_Gutenberg_BF_Ajax_Select();

				break;

			case 'background_image':

				if ( ! class_exists( 'BF_Gutenberg_BF_Background_Image' ) ) {
					require BF_PATH . 'gutenberg/adapters/class-bf-gutenberg-bf-background-image.php';
				}

				$instance = new BF_Gutenberg_BF_Background_Image();

				break;

			case 'code':

				if ( ! class_exists( 'BF_Gutenberg_BF_Code' ) ) {
					require BF_PATH . 'gutenberg/adapters/class-bf-gutenberg-bf-code.php';
				}

				$instance = new BF_Gutenberg_BF_Code();

				break;

			case 'editor':

				if ( ! class_exists( 'BF_Gutenberg_BF_Editor' ) ) {
					require BF_PATH . 'gutenberg/adapters/class-bf-gutenberg-bf-editor.php';
				}

				$instance = new BF_Gutenberg_BF_Editor();

				break;

			case 'image_preview':

				if ( ! class_exists( 'BF_Gutenberg_BF_Image_Preview' ) ) {
					require BF_PATH . 'gutenberg/adapters/class-bf-gutenberg-bf-image-preview.php';
				}

				$instance = new BF_Gutenberg_BF_Image_Preview();

				break;

			case 'image_radio':

				if ( ! class_exists( 'BF_Gutenberg_BF_Image_Radio' ) ) {
					require BF_PATH . 'gutenberg/adapters/class-bf-gutenberg-bf-image-radio.php';
				}

				$instance = new BF_Gutenberg_BF_Image_Radio();

				break;

			case 'image_select':

				if ( ! class_exists( 'BF_Gutenberg_BF_Image_Select' ) ) {
					require BF_PATH . 'gutenberg/adapters/class-bf-gutenberg-bf-image-select.php';
				}

				$instance = new BF_Gutenberg_BF_Image_Select();

				break;

			case 'media_image':

				if ( ! class_exists( 'BF_Gutenberg_BF_Media_Image' ) ) {
					require BF_PATH . 'gutenberg/adapters/class-bf-gutenberg-bf-media-image.php';
				}

				$instance = new BF_Gutenberg_BF_Media_Image();

				break;

			case 'sorter_checkbox':

				if ( ! class_exists( 'BF_Gutenberg_BF_Sorter_Checkbox' ) ) {
					require BF_PATH . 'gutenberg/adapters/class-bf-gutenberg-bf-sorter-checkbox.php';
				}

				$instance = new BF_Gutenberg_BF_Sorter_Checkbox();

				break;

			case 'term_select':

				if ( ! class_exists( 'BF_Gutenberg_BF_Term_Select' ) ) {
					require BF_PATH . 'gutenberg/adapters/class-bf-gutenberg-bf-term-select.php';
				}

				$instance = new BF_Gutenberg_BF_Term_Select();

				break;
		}

		if ( isset( $instance ) ) {
			$instance->init( $field );

			return $instance;
		}

		return null;
	}
}
