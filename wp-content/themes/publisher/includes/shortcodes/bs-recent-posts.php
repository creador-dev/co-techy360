<?php


/**
 * bs-recent-posts.php
 *---------------------------
 * [bs-recent-posts] shortcode & widget
 *
 */
class Publisher_Recent_Posts_Shortcode extends BF_Shortcode {

	function __construct( $id, $options ) {

		$id = 'bs-recent-posts';

		$_options = array(
			'defaults'            => array(
				'title'       => publisher_translation_get( 'recent_posts' ),
				'show_title'  => 1,
				'listing'     => 'simple-thumbnail-meta',
				'order'       => 'recent',
				'category'    => '',
				'tag'         => '',
				'post_type'   => '',
				'count'       => 5,
				'time_filter' => '',
			),
			'have_widget'         => true,
			'have_tinymce_add_on' => true,
		);

		if ( isset( $options['shortcode_class'] ) ) {
			$_options['shortcode_class'] = $options['shortcode_class'];
		}

		if ( isset( $options['widget_class'] ) ) {
			$_options['widget_class'] = $options['widget_class'];
		}

		parent::__construct( $id, $_options );
	}


	/**
	 * Handle displaying of shortcode
	 *
	 * @param array  $atts
	 * @param string $content
	 *
	 * @return string
	 */
	function display( array $atts, $content = '' ) {

		ob_start();

		publisher_set_prop( 'shortcode-bs-recent-posts-atts', $atts );
		publisher_get_view( 'shortcodes', 'bs-recent-posts' );
		publisher_clear_props();

		return ob_get_clean();

	}
}


/**
 * Posts Listing Widget
 */
class Publisher_Recent_Posts_Widget extends BF_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {

		parent::__construct(
			'bs-recent-posts',
			sprintf( __( '%s - Recent Posts', 'publisher' ), publisher_white_label_get_option( 'publisher' ) ),
			array(
				'description' => __( 'Advanced Recent Posts Widget', 'publisher' )
			)
		);
	}


	/**
	 * Adds backend fields
	 */
	function load_fields() {

		// Back end form fields
		$this->fields = array(
			array(
				'name' => __( 'Title', 'publisher' ),
				'id'   => 'title',
				'type' => 'text',
			),
			array(
				'name'          => __( 'Listing', 'publisher' ),
				'id'            => 'listing',
				'type'          => 'select',
				'section_class' => 'style-floated-left bordered',
				'options'       => array(
					'simple'                         => __( 'Title', 'publisher' ),
					'simple-meta'                    => __( 'Title + Meta', 'publisher' ),
					'simple-readable-meta'           => __( 'Title + Readable Meta', 'publisher' ),
					'simple-thumbnail'               => __( 'Title + Thumbnail', 'publisher' ),
					'simple-thumbnail-meta'          => __( 'Title + Thumbnail + Meta', 'publisher' ),
					'simple-thumbnail-readable-meta' => __( 'Title + Thumbnail + Readable Meta', 'publisher' ),
					'listing-thumbnail-2'            => __( 'Thumbnail Listing 2', 'publisher' ),
					'listing-text-1'                 => __( 'Text Listing 1', 'publisher' ),
					'listing-text-2'                 => __( 'Text Listing 2', 'publisher' ),
				)
			),
			array(
				'name'        => __( 'Category', 'publisher' ),
				'id'          => 'category',
				'type'        => 'select',
				"options"     => array(
					'' => __( 'All Posts', 'publisher' ),
					array(
						'label'   => __( 'Categories', 'publisher' ),
						'options' => array(
							'category_walker' => 'category_walker'
						),
					),
				),
				'placeholder' => '',
			),
			array(
				'name'        => __( 'Tag', 'publisher' ),
				'id'          => 'tag',
				'type'        => 'ajax_select',
				"callback"    => 'BF_Ajax_Select_Callbacks::tags_callback',
				"get_name"    => 'BF_Ajax_Select_Callbacks::tag_name',
				'placeholder' => '',
			),
			array(
				'name' => __( 'Posts Count', 'publisher' ),
				'id'   => 'count',
				'type' => 'text',
			),
			array(
				'name' => __( 'Custom Post Type', 'publisher' ),
				'id'   => 'post_type',
				'type' => 'text',
				'desc' => 'Don\'t forgot add "post" if you changed this',
			),
			array(
				'name'    => __( 'Time Filter', 'publisher' ),
				'id'      => 'time_filter',
				'type'    => 'select',
				"options" => array(
					''          => __( 'No Filter', 'publisher' ),
					'today'     => __( 'Today Posts', 'publisher' ),
					'yesterday' => __( 'Today + Yesterday Posts', 'publisher' ),
					'week'      => __( 'This Week Posts', 'publisher' ),
					'month'     => __( 'This Month Posts', 'publisher' ),
					'year'      => __( 'This Year Posts', 'publisher' ),
				),
			),
			array(
				'name'    => __( 'Post Orders', 'publisher' ),
				'id'      => 'order',
				'type'    => 'select',
				"options" => publisher_get_order_field_option(),
			),
		);
	}
}
