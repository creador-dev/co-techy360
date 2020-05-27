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
							'modal_title'   => __( 'Choose Pre-defined Style', 'publisher' ),
							'box_pre_title' => __( 'Active style', 'publisher' ),
							'box_button'    => __( 'Change Style', 'publisher' ),
							'default_text'  => __( 'chose one...', 'publisher' ),
						),
						'confirm_changes' => true,
						'confirm_texts'   => array(
							'header'        => __( 'Do you want to change style?', 'publisher' ),
							'button_ok'     => __( 'Yes, Change', 'publisher' ),
							'button_cancel' => __( 'Cancel', 'publisher' ),
							'title'         => __( 'With changing style following option will be changed.', 'publisher' ),

							'caption' => __( '%s Style', 'publisher' ),

							'list_items' => array(
								__( 'Color settings', 'publisher' ),
								__( 'Typography options', 'publisher' ),
								__( 'Page layout, Header and Footer option', 'publisher' ),
							),

							'notice' => __( 'Please note your homepage, posts, logo and other options will not changed.', 'publisher' )
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
