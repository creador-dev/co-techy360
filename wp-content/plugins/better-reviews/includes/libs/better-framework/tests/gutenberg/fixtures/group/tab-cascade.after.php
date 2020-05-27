<?php

return array(

	array(
		'id'        => 'the_id',
		'component' => 'PanelBody',
		'args'      => array(
			'title'       => 'Group title',
			'initialOpen' => true,
			'id'          => 'the_id',
		),

		'children' => array(

			array(

				'id'        => 'field_text',
				'component' => 'BF_Section_Container',
				'args'      => array(
					'type'  => 'text-control',
					'label' => 'Field Title',
					'id'    => 'field_text',
					'name'  => 'text',
				),

				'key' => 'field_text',

				'children' => array(
					array(
						'id'        => 'text',
						'component' => 'TextControl',
						'args'      => array(
							'type' => 'text',
							'id'   => 'text',
						),
						'key'       => 'text',
						'attribute' => Array(
							'type'  => 'string',
							'items' => false
						),
					)
				),
			),
		),

		'key' => 'the_id'
	),
	array(
		'id'        => 'the_id2',
		'component' => 'PanelBody',
		'args'      => array(
			'title'       => 'Group2 title',
			'initialOpen' => false,
			'id'          => 'the_id2',
		),

		'children' => array(

			array(

				'id'        => 'field_text2',
				'component' => 'BF_Section_Container',
				'args'      => array(
					'type'  => 'text-control',
					'label' => 'Field2 Title',
					'id'    => 'field_text2',
					'name'  => 'text2',
				),

				'key' => 'field_text2',

				'children' => array(
					array(
						'id'        => 'text2',
						'component' => 'TextControl',
						'args'      => array(
							'type' => 'text',
							'id'   => 'text2',
						),

						'key'       => 'text2',
						'attribute' => Array(
							'type'  => 'string',
							'items' => false
						),
					),
				),
			),
		),


		'key' => 'the_id2',
	),
	array(
		'id'        => 'the_id3',
		'component' => 'PanelBody',
		'args'      => array(
			'title'       => 'Group3 title',
			'initialOpen' => false,
			'id'          => 'the_id3',
		),

		'children' => array(

			array(

				'id'        => 'field_text3',
				'component' => 'BF_Section_Container',
				'args'      => array(
					'type'  => 'text-control',
					'label' => 'Field3 Title',
					'id'    => 'field_text3',
					'name'  => 'text3',
				),

				'key' => 'field_text3',

				'children' => array(
					array(
						'id'        => 'text3',
						'component' => 'TextControl',
						'args'      => array(
							'type' => 'text',
							'id'   => 'text3',
						),

						'key'       => 'text3',
						'attribute' => Array(
							'type'  => 'string',
							'items' => false
						),
					),
				),
			),

			array(

				'id'        => 'field_text3_2',
				'component' => 'BF_Section_Container',
				'args'      => array(
					'type'  => 'text-control',
					'label' => 'Field3_2 Title',
					'id'    => 'field_text3_2',
					'name'  => 'text3_2',
				),

				'key' => 'field_text3_2',

				'children' => array(
					array(
						'id'        => 'text3_2',
						'component' => 'TextControl',
						'args'      => array(
							'type' => 'text',
							'id'   => 'text3_2',
						),

						'key'       => 'text3_2',
						'attribute' => Array(
							'type'  => 'string',
							'items' => false
						),
					),
				),
			),

			array(

				'id'        => 'field_text3_3',
				'component' => 'BF_Section_Container',
				'args'      => array(
					'type'  => 'text-control',
					'label' => 'Field3_3 Title',
					'id'    => 'field_text3_3',
					'name'  => 'text3_3',
				),

				'key' => 'field_text3_3',

				'children' => array(
					array(
						'id'        => 'text3_3',
						'component' => 'TextControl',
						'args'      => array(
							'type' => 'text',
							'id'   => 'text3_3',
						),

						'key'       => 'text3_3',
						'attribute' => Array(
							'type'  => 'string',
							'items' => false
						),
					),
				),
			),
		),
		'key'      => 'the_id3',
	),
);
