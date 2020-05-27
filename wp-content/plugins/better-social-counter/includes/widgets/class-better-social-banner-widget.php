<?php


/**
 * Better Social Counter Widget
 */
class Better_Social_Banner_Widget extends BF_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {

		// haven't title in any location
		$this->with_title = true;

		parent::__construct(
			'better-social-banner',
			__( 'Better Social Banner', 'better-studio' ),
			array( 'description' => __( 'Social Banner Widget', 'better-studio' ) )
		);

	}


	/**
	 * Adds backend form fields
	 */
	public function load_fields() {

		$sites = Better_Social_Counter_Data_Manager::self()->get_select_options_for_banner( true );

		// Select first active site
		$active_site = '';
		foreach ( $sites as $site_key => $site_value ) {
			if ( is_array( $site_value ) ) {
				continue;
			}
			$active_site = $site_key;
			break;
		}

		$this->fields = array(
			array(
				'name'          => __( 'Title', 'better-studio' ),
				'attr_id'       => 'title',
				'type'          => 'text',
				'section_class' => 'widefat',
			),
			array(
				'name'          => __( 'Site', 'better-studio' ),
				'attr_id'       => 'site',
				'type'          => 'select',
				'section_class' => 'style-floated-left',
				'value'         => $active_site,
				'options'       => Better_Social_Counter_Data_Manager::self()->get_select_options_for_banner( true ),
			),
		);
	}
}
