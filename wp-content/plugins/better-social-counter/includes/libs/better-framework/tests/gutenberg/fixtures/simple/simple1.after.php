<?php

return array(

	array(
		'id'        => 'field_title',
		'component' => 'BF_Section_Container',
		'args'      => array(
			'type'    => 'text-control',
			'label'   => 'Tab Title',
			'id'      => 'field_title',
			'name'    => 'title',
			'classes' => 'style-floated-left bordered center-images',
		),

		'key' => 'field_title',

		'children' => array(

			array(
				'id'        => 'title',
				'component' => 'TextControl',
				'args'      => array(
					'type' => 'text',
					'id'   => 'title',
				),
				'key'       => 'title',
				'attribute' => array(
					'type'  => 'string',
					'items' => false
				),
				'std'       => 'default',
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
					'items' => false
				),
				'std'       => 'default2',
			),
		),
	)
);
