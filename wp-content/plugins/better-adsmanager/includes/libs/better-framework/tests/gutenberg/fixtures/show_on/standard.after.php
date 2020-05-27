<?php

return array(

	array(
		'id'        => 'field_select',
		'component' => 'BF_Section_Container',
		'args'      => array(
			'type'  => 'tree-select',
			'label' => 'select',
			'id'    => 'field_select',
			'name'  => 'select',
		),

		'key' => 'field_select',

		'children' => array(

			array(
				'id'        => 'select',
				'component' => 'TreeSelect',
				'args'      => array(
					'tree' => array(

						array(
							'id'   => 'opt-1',
							'name' => 'option 1',

						),
						array(
							'id'   => 'opt-2',
							'name' => 'option 2',
						),
					),
					'id'   => 'select',
				),
				'key'       => 'select',
				'attribute' => array(
					'type'  => 'string',
					'items' => false,
					'enum' => array(
						'opt-1',
						'opt-2',
					),
				)
			),

		),
	),

	array(
		'id'        => 'field_content',
		'component' => 'BF_Section_Container',
		'args'      => array(
			'type'    => 'textarea-control',
			'label'   => 'Tab Content',
			'id'      => 'field_content',
			'name'    => 'content',
			'classes' => 'style-floated-left bordered center-images',
			'show_on' => array(
				'show_on' => array(
					array( 'inline_related_posts_status=show' )
				)
			),
		),

		'key'      => 'field_content',
		'children' => array(

			array(
				'id'        => 'content',
				'component' => 'TextareaControl',
				'args'      => array(
					'id' => 'content',
				),
				'key'       => 'content',
				'attribute' => array(
					'type'  => 'string',
					'items' => false,
				)
			),
		),
	)
);
