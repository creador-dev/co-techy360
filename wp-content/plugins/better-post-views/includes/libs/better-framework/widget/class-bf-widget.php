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
 * Base class for widgets
 */
class BF_Widget extends WP_Widget {


	/**
	 * Widget Position in wp-admin/widgets.php
	 * @var int
	 */
	var $position = 30;

	/**
	 * $default values for widget fields
	 *
	 * @var array
	 */
	var $defaults = array();


	/**
	 * Flag to load default only one time
	 *
	 * @var bool
	 */
	var $defaults_loaded = FALSE;


	/**
	 * Contains shortcode id of widget
	 * @var string
	 */
	var $base_widget_id;


	/**
	 * Contain all fields of widget
	 *
	 * @var array
	 */
	var $fields = array();


	/**
	 * Show widget title
	 *
	 * @var bool
	 */
	var $with_title = TRUE;


	/**
	 * Register widget with WordPress.
	 *
	 * @param string $shortcode_id
	 * @param string $title
	 * @param array  $desc
	 * @param bool   $widget_id
	 */
	function __construct( $shortcode_id = '', $title = '', $desc = array(), $widget_id = FALSE ) {

		if ( empty( $shortcode_id ) ) {
			return;
		}


		$this->base_widget_id = $shortcode_id;

		if ( $widget_id != FALSE ) {
			parent::__construct(
				$widget_id,
				$title,
				$desc
			);
		} else {
			parent::__construct(
				$shortcode_id,
				$title,
				$desc
			);
		}

	}


	/**
	 * Loads widget -> shortcode default attrs
	 */
	public function load_defaults() {

		if ( $this->defaults_loaded ) {
			return;
		}

		$this->defaults_loaded = TRUE;
		$this->defaults        = BF_Shortcodes_Manager::factory( $this->base_widget_id )->defaults;
	}


	/**
	 * Loads fields
	 */
	public function load_fields() {
	}


	/**
	 * Prepare fields for field generator
	 */
	function prepare_fields() {

		for ( $i = 0; $i < count( $this->fields ); $i ++ ) {

			if ( isset( $this->fields[ $i ]['attr_id'] ) ) { //  Backward compatibility
				$this->fields[ $i ]['id'] = $this->fields[ $i ]['attr_id'];
			}
			// do not do anything on fields that haven't ID, ex: group fields
			if ( ! isset( $this->fields[ $i ]['id'] ) ) {
				continue;
			}

			$this->fields[ $i ]['input_name'] = $this->get_field_name( $this->fields[ $i ]['id'] );

			// TODO: check this
			// $this->fields[ $i ]['id'] = $this->get_field_id( $this->fields[ $i ]['id'] );


			if ( $this->fields[ $i ]['type'] == 'repeater' ) {

				for ( $j = 0; $j < count( $this->fields[ $i ]['options'] ); $j ++ ) {

					$this->fields[ $i ]['options'][ $j ]['input_name'] = $this->fields[ $i ]['input_name'] . '[%d][' . $this->fields[ $i ]['options'][ $j ]['id'] . ']';

				}

			} elseif ( $this->fields[ $i ]['type'] == 'select' && ! empty( $this->fields[ $i ]['multiple'] ) && $this->fields[ $i ]['multiple'] ) {
				$this->fields[ $i ]['input_name'] .= '[]';
			}

		}

	}


	/**
	 * Merge two arrays to one, if $atts key not defined or is empty then $default value will be set.
	 *
	 * @param $default
	 * @param $atts
	 *
	 * @return mixed
	 */
	function parse_args( $default, $atts ) {

		foreach ( (array) $default as $key => $value ) {

			// empty fields in $atts is ok!
			if ( ! isset( $atts[ $key ] ) ) {
				$atts[ $key ] = $value;
			}

		}

		$atts['shortcode-id'] = $this->base_widget_id; // adds shortcode id to atts for using it inside filters

		return $atts;
	}


	/**
	 * Front-end display of widget.
	 *
	 * @see BetterWidget::widget()
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {

		$this->load_defaults();
		$instance = $this->parse_args( $this->defaults, $instance );

		echo $args['before_widget'];  // escaped before inside WP

		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->base_widget_id );
		if ( ! empty( $title ) && $this->with_title ) {
			echo $args['before_title'] . $title . $args['after_title']; // escaped before inside WP
		}

		echo BF_Shortcodes_Manager::factory( $this->base_widget_id )->handle_widget( $instance ); // escaped before inside WP

		echo $args['after_widget']; // escaped before inside WP
	}


	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {

		$this->load_defaults();

		return $this->parse_args( $this->defaults, $new_instance );
	}


	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 *
	 * @return string|void
	 */
	public function form( $instance ) {

		$this->load_defaults();
		$instance = $this->parse_args( $this->defaults, $instance );

		Better_Framework::factory( 'widgets-field-generator', FALSE, TRUE );

		// prepare fields for generator
		$this->load_fields();
		$this->prepare_fields();
		$options = array(
			'fields' => $this->fields
		);

		/**
		 * Keep Widget Group State After Widget Settings Saved
		 */
		if ( ! empty( $_POST['_group_status'] ) ) {
			foreach ( $options['fields'] as $idx => $field ) {
				if ( $field['type'] === 'group' && ! empty( $field['id'] ) ) {
					$id = &$field['id'];

					if ( ! empty( $_POST['_group_status'][ $id ] ) ) {
						$options['fields'][ $idx ]['state'] = $_POST['_group_status'][ $id ];
					}
				}
			}
		}

		$generator = new BF_Widgets_Field_Generator( $options, $instance );

		echo $generator->get_fields(); // escaped before
	}


	public function get_fields() {
		return $this->fields;
	}
}
