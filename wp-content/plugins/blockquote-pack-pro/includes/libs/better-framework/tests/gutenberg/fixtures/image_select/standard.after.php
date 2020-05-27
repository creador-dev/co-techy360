<?php

return array(

	array(

		'id'        => 'field_site_bg_image',
		'component' => 'BF_Section_Container',
		'args'      => array(
			'type'        => 'bf-image-select',
			'label'       => 'Name',
			'id'          => 'field_site_bg_image',
			'name'        => 'site_bg_image',
			'description' => 'Select responsive header color scheme',
		),

		'key' => 'field_site_bg_image',

		'children' => array(

			array(
				'id'        => 'site_bg_image',
				'component' => 'BF_Image_Select',
				'args'      => array(
					'id'      => 'site_bg_image',
					'options' => array(

						array(
							'id'    => 'dark',
							'img'   => 'images/options/resp-header-dark.png',
							'label' => 'Dark Style',
						),

						array(
							'id'    => 'light',
							'img'   => 'images/options/resp-header-light.png',
							'label' => 'Light Style',
						),
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
