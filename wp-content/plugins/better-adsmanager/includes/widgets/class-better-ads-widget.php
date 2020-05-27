<?php


/**
 * Better Ads Widget
 */
class Better_Ads_Widget extends BF_Widget {


	/**
	 * Register widget with WordPress.
	 */
	function __construct() {

		// Back end form fields
		$this->fields = array(
			array(
				'name'          => __( 'Title', 'better-studio' ),
				'attr_id'       => 'title',
				'type'          => 'text',
				'section_class' => 'widefat',
			),
			array(
				'name'          => __( 'Ad Type', 'better-studio' ),
				'input-desc'    => __( 'Choose simple banner or campaign..', 'better-studio' ),
				'attr_id'       => 'type',
				'type'          => 'select',
				'section_class' => 'widefat',
				"options"       => array(
					''         => __( '-- Select Ad Type --', 'better-studio' ),
					'campaign' => __( 'Campaign', 'better-studio' ),
					'banner'   => __( 'Banner', 'better-studio' ),
				),
			),
			array(
				'name'               => __( 'Banner', 'better-studio' ),
				'attr_id'            => 'banner',
				'type'               => 'select',
				'deferred-options'   => array(
					'callback' => 'better_ads_get_banners_option',
					'args'     => array(
						- 1,
						true
					),
				),
				'filter-field'       => 'type',
				'filter-field-value' => 'banner',
			),
			array(
				'name'               => __( 'Campaign', 'better-studio' ),
				'attr_id'            => 'campaign',
				'type'               => 'select',
				'deferred-options'   => array(
					'callback' => 'better_ads_get_campaigns_option',
					'args'     => array(
						- 1,
						true
					),
				),
				'filter-field'       => 'type',
				'filter-field-value' => 'campaign',
			),
			array(
				'name'               => __( 'Max Amount of Allowed Banners', 'better-studio' ),
				'input-desc'         => __( 'Leave empty to show all banners.', 'better-studio' ),
				'attr_id'            => 'count',
				'type'               => 'text',
				'filter-field'       => 'type',
				'filter-field-value' => 'campaign',
			),
			array(
				'name'               => __( 'Columns', 'better-studio' ),
				'attr_id'            => 'columns',
				'type'               => 'select',
				"options"            => array(
					1 => __( '1 Column', 'better-studio' ),
					2 => __( '2 Column', 'better-studio' ),
					3 => __( '3 Column', 'better-studio' ),
				),
				'filter-field'       => 'type',
				'filter-field-value' => 'campaign',
			),
			array(
				'name'               => __( 'Order By', 'better-studio' ),
				'attr_id'            => 'orderby',
				'type'               => 'select',
				'section_class'      => 'widefat',
				"options"            => array(
					'date'  => __( 'Date', 'better-studio' ),
					'title' => __( 'Title', 'better-studio' ),
					'rand'  => __( 'Rand', 'better-studio' ),
				),
				'filter-field'       => 'type',
				'filter-field-value' => 'campaign',
			),
			array(
				'name'               => __( 'Order', 'better-studio' ),
				'attr_id'            => 'order',
				'type'               => 'select',
				'section_class'      => 'widefat',
				"options"            => array(
					'ASC'  => __( 'Ascending', 'better-studio' ),
					'DESC' => __( 'Descending', 'better-studio' ),
				),
				'filter-field'       => 'type',
				'filter-field-value' => 'campaign',
			),
			array(
				'name'          => __( 'Align', 'better-studio' ),
				'attr_id'       => 'align',
				'type'          => 'select',
				'section_class' => 'widefat',
				"options"       => array(
					'left'   => __( 'Left', 'better-studio' ),
					'center' => __( 'Center', 'better-studio' ),
					'right'  => __( 'Right', 'better-studio' ),
				),
			),
			array(
				'name'          => __( 'Show Captions', 'better-studio' ),
				'attr_id'       => 'show-caption',
				'type'          => 'select',
				'section_class' => 'widefat',
				"options"       => array(
					1 => __( 'Show caption\'s', 'better-studio' ),
					0 => __( 'Hide caption\'s', 'better-studio' ),
				),
			),
			array(
				'name'          => __( 'Lazy Load Ad?', 'better-studio' ),
				'desc'          => __( 'Chose the behaviour of lazy loading.', 'better-studio' ),
				'attr_id'       => 'lazy-load',
				'type'          => 'select',
				"options"       => array(
					''        => __( '-- Inherit from panel --', 'better-studio' ),
					'enable'  => __( 'Yes, Lazy load this ad', 'better-studio' ),
					'disable' => __( 'No, Load this Ad as normal', 'better-studio' ),
				),
				'std'           => 'center',
				'show_on'       => array(
					array(
						'type=banner',
					),
					array(
						'type=campaign',
					),
				),
				'section_class' => 'widefat',
			),
		);

		parent::__construct(
			'better-ads',
			__( 'Better Ads', 'better-studio' ),
			array( 'description' => __( 'Show campaign and banners.', 'better-studio' ) )
		);
	}
}
