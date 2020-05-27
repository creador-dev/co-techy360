<?php

return array(

	array(

		'id'        => 'field_site_bg_image',
		'component' => 'BF_Section_Container',
		'args'      => array(
			'type'        => 'bf-image-radio',
			'label'       => 'Header Style',
			'id'          => 'field_site_bg_image',
			'name'        => 'site_bg_image',
			'description' => 'Select header style.',
		),

		'key' => 'field_site_bg_image',

		'children' => array(

			array(
				'id'        => 'site_bg_image',
				'component' => 'BF_Image_Radio',
				'args'      => array(
					'id'      => 'site_bg_image',
					'options' => array(
						array(
							'id'    => 'style-1',
							'img'   => '1',
							'label' => '1',
							'class' => '1',
						),
						array(
							'id'    => 'style-2',
							'img'   => '2',
							'label' => '2',
							'class' => '2',
						)
					),
				),
				'key'       => 'site_bg_image',
				'attribute' => array(
					'type'  => 'string',
					'items' => false
				)
			),
		),
	),
);
