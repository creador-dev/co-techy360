<?php

return array(

	array(

		'id'        => 'field_typo_mg_1_img',
		'component' => 'BF_Section_Container',
		'args'      => array(
			'type'  => 'bf-image-preview',
			'label' => '',
			'id'    => 'field_typo_mg_1_img',
			'name'  => 'typo_mg_1_img',
		),

		'key' => 'field_typo_mg_1_img',

		'children' => array(

			array(
				'id'        => 'typo_mg_1_img',
				'component' => 'BF_Image_Preview',
				'args'      => array(
					'id'    => 'typo_mg_1_img',
					'urls'  => array(
						'path/to/img.png'
					),
					'align' => 'left',
				),
				'key'       => 'typo_mg_1_img',
			),
		),
	),
);
