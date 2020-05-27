<?php

/**
 * Base playlist widgets class
 */
class BS_PlayList_Widget extends BF_Widget {

	/**
	 * Widget Unique ID
	 *
	 * @var string
	 */
	protected $widget_ID;


	/**
	 * Widget Label
	 *
	 * @var string
	 */
	protected $widget_name;


	/**
	 * Widget Description
	 *
	 * @var string
	 */
	protected $widget_description;


	/**
	 * initialize Widget Fields
	 */
	public function __construct() {

		// haven't title in any location
		$this->with_title = TRUE;

		$labels = array(
			'title'               => __( 'Widget Title', 'better-studio' ),
			'type'                => __( 'Playlist Type', 'better-studio' ),
			'type=playlist'       => __( 'From a playlist', 'better-studio' ),
			'type=custom'         => __( 'Custom Video Links', 'better-studio' ),
			'playlist_title'      => __( 'Custom Playlist Title', 'better-studio' ),
			'show_playlist_title' => __( 'Show Playlist Title', 'better-studio' ),
			'playlist_url'        => __( 'Playlist URL', 'better-studio' ),
			'videos_limit'        => __( 'Maximum Videos Count', 'better-studio' ),
			'videos'              => __( 'Playlist Videos List', 'better-studio' ),
		);

		$labels = wp_parse_args( $this->get_labels(), $labels );

		// Back end form fields
		$this->fields = array(
			array(
				'name'    => $labels['title'],
				'attr_id' => 'title',
				'type'    => 'text',
			),
			array(
				'name'          => $labels['type'],
				'attr_id'       => 'type',
				'type'          => 'select',
				'section_class' => 'widefat',
				"options"       => array(
					'playlist' => $labels['type=playlist'],
					'custom'   => $labels['type=custom'],
				),
			),
			array(
				'name'               => $labels['playlist_url'],
				'attr_id'            => 'playlist_url',
				'type'               => 'text',
				'section_class'      => 'widefat',
				'filter-field'       => 'type',
				'filter-field-value' => 'playlist',
			),
			array(
				'name'               => $labels['videos'],
				'attr_id'            => 'videos',
				'type'               => 'textarea',
				'section_class'      => 'widefat',
				'input-desc'         => __( 'Enter videos links each in one line.', 'better-studio' ),
				'filter-field'       => 'type',
				'filter-field-value' => 'custom',
			),
			array(
				'name'               => $labels['videos_limit'],
				'attr_id'            => 'videos_limit',
				'type'               => 'text',
				'filter-field'       => 'type',
				'filter-field-value' => 'playlist',
			),
			array(
				'name'    => $labels['playlist_title'],
				'attr_id' => 'playlist_title',
				'type'    => 'text',
			),
			array(
				'name'    => $labels['show_playlist_title'],
				'attr_id' => 'show_playlist_title',
				'type'    => 'switch',
			),
		);

		parent::__construct(
			$this->widget_ID,
			$this->widget_name,
			$this->widget_description
		);
	}


	/**
	 * method for override labels array indexes
	 *
	 * @return array
	 */
	function get_labels() {
		return array();
	}

}

