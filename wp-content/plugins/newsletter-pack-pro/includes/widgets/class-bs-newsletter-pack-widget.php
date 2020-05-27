<?php


/**
 * Newsletter Pack Widget
 *
 * @since 1.0
 */
class BS_Newsletter_Pack_Widget extends BF_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {

		parent::__construct(
			'newsletter-pack',
			__( 'Newsletter Pack', 'better-studio' ),
			array( 'description' => __( 'Show pre-defined newsletter.', 'better-studio' ) )
		);
	}


	/**
	 * Adds backend fields
	 */
	function load_fields() {

		$this->fields = array(
			array(
				'name'             => __( 'Newsletter', 'better-studio' ),
				'id'               => 'newsletter',
				'type'             => 'select',
				'deferred-options' => array(
					'callback' => 'bsnp_get_newsletters_list_option',
					'args'     => array(
						- 1,
						true
					),
				),
			),
			array(
				'name'             => __( 'Override Style', 'better-studio' ),
				'id'               => 'style',
				'desc'             => __( 'Custom newsletter style for this location.', 'better-studio' ),
				'type'             => 'select_popup',
				'std'              => '',
				'deferred-options' => array(
					'callback' => 'bsnp_get_newsletters_style_option',
					'args'     => array(
						true,
					),
				),
				'texts'            => array(
					'modal_title'   => __( 'Choose Newsletter Style', 'better-studio' ),
					'box_pre_title' => __( 'Active style', 'better-studio' ),
					'box_button'    => __( 'Change Style', 'better-studio' ),
				),
				'section_class'    => 'newsletter-pack-newsletter-field',
				'show_on'          => array(
					array(
						'newsletter!=none'
					)
				),
			),
			array(
				'name'             => __( 'Override Social Icons Style', 'better-studio' ),
				'id'               => 'si_style',
				'desc'             => __( 'Custom newsletter style for this location.', 'better-studio' ),
				'type'             => 'select_popup',
				'std'              => '',
				'deferred-options' => array(
					'callback' => 'bsnp_get_newsletters_si_style_option',
					'args'     => array(
						true,
						true,
					),
				),
				'texts'            => array(
					'modal_title'   => __( 'Choose Social Icons Style', 'better-studio' ),
					'box_pre_title' => __( 'Active style', 'better-studio' ),
					'box_button'    => __( 'Change Style', 'better-studio' ),
				),
				'section_class'    => 'newsletter-pack-newsletter-field',
				'show_on'          => array(
					array(
						'newsletter!=none'
					)
				),
			),
		);
	}

}
