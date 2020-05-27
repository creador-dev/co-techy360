<?php

return array(

	array(

		'id'        => 'field_style',
		'component' => 'BF_Section_Container',
		'args'      => array(
			'type'        => 'bf-select-popup',
			'label'       => 'Pre-defined Styles',
			'id'          => 'field_style',
			'name'        => 'style',
			'description' => 'Select a pre-made style. Actually each style is a theme!',
		),

		'key' => 'field_style',

		'children' => array(

			array(
				'id'        => 'style',
				'component' => 'BF_Select_Popup',
				'args'      => array(
					'id'   => 'style',
					'data' => array(
						'texts'           => array(
							'modal_title'   => __( 'Choose Pre-defined Style', 'better-studio' ),
							'box_pre_title' => __( 'Active style', 'better-studio' ),
							'box_button'    => __( 'Change Style', 'better-studio' ),
							'default_text'  => __( 'chose one...', 'better-studio' ),
						),
						'confirm_changes' => true,
						'confirm_texts'   => array(
							'header'        => __( 'Do you want to change style?', 'better-studio' ),
							'button_ok'     => __( 'Yes, Change', 'better-studio' ),
							'button_cancel' => __( 'Cancel', 'better-studio' ),
							'title'         => __( 'With changing style following option will be changed.', 'better-studio' ),

							'caption' => __( '%s Style', 'better-studio' ),

							'list_items' => array(
								__( 'Color settings', 'better-studio' ),
								__( 'Typography options', 'better-studio' ),
								__( 'Page layout, Header and Footer option', 'better-studio' ),
							),

							'notice' => __( 'Please note your homepage, posts, logo and other options will not changed.', 'better-studio' )
						),
						'column_class'    => 'three-column',
					),

				),
				'key'       => 'style',
				'attribute' => array(
					'type'  => 'string',
					'items' => false
				)
			),
		),
	),

);
