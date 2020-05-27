<?php

return array(

	array(

		'id'        => 'field_field1',
		'component' => 'BF_Section_Container',
		'args'      => array(
			'type'        => 'bf-background-image',
			'label'       => 'Site Background Image',
			'id'          => 'field_field1',
			'name'        => 'field1',
			'description' => 'Use light patterns in non-boxed layout',
		),

		'key' => 'field_field1',

		'children' => array(
			array(
				'id'        => 'field1',
				'component' => 'BF_Background_Image',
				'args'      => array(
					'id'          => 'field1',
					'uploadLabel' => 'Upload Image',
					'mediaTitle'  => 'media-title',
					'buttonText'  => 'button-text',
					'uploadLabel' => 'upload-label',
					'removeLabel' => 'remove-label',
					'inputClass'  => 'input-class'
				),
				'key'       => 'field1',

				'attribute' => array(

					'type'  => "array",
					'items' => false
				)
			),
		),
	),


);
