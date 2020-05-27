<?php


/**
 * Better Social Counter Widget
 */
class Better_Social_Counter_Widget extends BF_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {

		// haven't title in any location
		$this->with_title = true;

		parent::__construct(
			'better-social-counter',
			__( 'Better Social Counter', 'better-studio' ),
			array( 'description' => __( 'Social Counter Widget', 'better-studio' ) )
		);

	}


	/**
	 * Front-end display of widget.
	 *
	 * @see BF_Widget::widget()
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {

		$instance = $this->parse_args( $this->defaults, $instance );

		if ( ! BF_Widgets_Manager::is_top_bar_sidebar() ) {
			echo $args['before_widget'];
		}

		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );
		if ( ! empty( $title ) && $this->with_title ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}

		if ( $BF_shortcode = BF_Shortcodes_Manager::factory( $this->id_base ) ) {

			echo $BF_shortcode->handle_widget( $instance );
		}

		if ( ! BF_Widgets_Manager::is_top_bar_sidebar() ) {
			echo $args['after_widget'];
		}
	}


	/**
	 * Adds backend form fields
	 */
	function load_fields() {

		$this->fields = array(
			array(
				'name'          => __( 'Title', 'better-studio' ),
				'attr_id'       => 'title',
				'type'          => 'text',
				'section_class' => 'widefat',
			),
			array(
				'name'          => __( 'Style', 'better-studio' ),
				'attr_id'       => 'style',
				'type'          => 'image_select',
				'section_class' => 'style-floated-left',
				'value'         => 'clean',
				'options'       => array(
					'modern'     => array(
						'label' => __( 'Style 1', 'better-studio' ),
						'img'   => BETTER_SOCIAL_COUNTER_DIR_URL . 'img/vc-social-counter-modern.jpg'
					),
					'clean'      => array(
						'label' => __( 'Style 2', 'better-studio' ),
						'img'   => BETTER_SOCIAL_COUNTER_DIR_URL . 'img/vc-social-counter-clean.jpg'
					),
					'box'        => array(
						'label' => __( 'Style 3', 'better-studio' ),
						'img'   => BETTER_SOCIAL_COUNTER_DIR_URL . 'img/vc-social-counter-box.jpg'
					),
					'button'     => array(
						'label' => __( 'Style 4', 'better-studio' ),
						'img'   => BETTER_SOCIAL_COUNTER_DIR_URL . 'img/vc-social-counter-button.jpg'
					),
					'big-button' => array(
						'label' => __( 'Style 5', 'better-studio' ),
						'img'   => BETTER_SOCIAL_COUNTER_DIR_URL . 'img/vc-social-counter-big-button.jpg'
					),
					'style-6'    => array(
						'label' => __( 'Style 6', 'better-studio' ),
						'img'   => BETTER_SOCIAL_COUNTER_DIR_URL . 'img/vc-social-counter-style-6.jpg'
					),
					'style-7'    => array(
						'label' => __( 'Style 7', 'better-studio' ),
						'img'   => BETTER_SOCIAL_COUNTER_DIR_URL . 'img/vc-social-counter-style-7.png'
					),
					'style-8'    => array(
						'label' => __( 'Style 8', 'better-studio' ),
						'img'   => BETTER_SOCIAL_COUNTER_DIR_URL . 'img/vc-social-counter-style-8.png'
					),
					'style-9'    => array(
						'label' => __( 'Style 9', 'better-studio' ),
						'img'   => BETTER_SOCIAL_COUNTER_DIR_URL . 'img/vc-social-counter-style-9.png'
					),
					'style-10'   => array(
						'label' => __( 'Style 10', 'better-studio' ),
						'img'   => BETTER_SOCIAL_COUNTER_DIR_URL . 'img/vc-social-counter-style-10.png'
					),
					'style-11'   => array(
						'label' => __( 'Style 11', 'better-studio' ),
						'img'   => BETTER_SOCIAL_COUNTER_DIR_URL . 'img/vc-social-counter-style-11.png'
					),
				),
			),
			array(
				'name'    => __( 'Show in colored  style?', 'better-studio' ),
				'attr_id' => 'colored',
				'type'    => 'switch',
			),
			array(
				'name'    => __( 'Number of Columns', 'better-studio' ),
				'attr_id' => 'columns',
				'type'    => 'select',
				'value'   => 'all',
				'options' => array(
					'1' => __( '1 Column', 'better-studio' ),
					'2' => __( '2 Column', 'better-studio' ),
					'3' => __( '3 Column', 'better-studio' ),
					'4' => __( '4 Column', 'better-studio' ),
				),
			),
			array(
				'name'          => __( 'Sort and Active Sites', 'better-studio' ),
				'attr_id'       => 'order',
				'type'          => 'sorter_checkbox',
				'options'       => Better_Social_Counter_Data_Manager::self()->get_widget_options_list(),
				'section_class' => 'better-social-counter-sorter',
			),
		);
	}
}