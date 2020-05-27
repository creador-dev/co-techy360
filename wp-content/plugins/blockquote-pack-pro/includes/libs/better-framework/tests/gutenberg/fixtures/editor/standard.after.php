<?php

return array(

	array(

		'id'        => 'field_sample-id',
		'component' => 'BF_Section_Container',
		'args'      => array(
			'type'        => 'bf-editor',
			'label'       => 'Admin Pages CSS Code',
			'id'          => 'field_sample-id',
			'name'        => 'sample-id',
			'description' => 'You can change admin pages style with adding CSS code into this field.',
		),

		'key' => 'field_sample-id',

		'children' => array(

			array(
				'id'        => 'sample-id',
				'component' => 'BF_Editor',
				'args'      => array(
					'id'       => 'sample-id',
					'type'     => 'editor',
					'lang'     => 'css',
					//
					'maxLines' => 200,
					'minLines' => 20,
				),
				'key'       => 'sample-id',
				'attribute' => array(
					'type'  => 'string',
					'items' => false
				)
			),
		),
	),
);
