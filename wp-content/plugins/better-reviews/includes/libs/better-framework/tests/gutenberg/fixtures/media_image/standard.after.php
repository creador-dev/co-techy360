<?php

return array(

	array(

		'id'        => 'field_typo_mg_1_img',
		'component' => 'BF_Section_Container',
		'args'      => array(
			'type'        => 'bf-media-image',
			'label'       => 'Default Thumbnail Image',
			'id'          => 'field_typo_mg_1_img',
			'name'        => 'typo_mg_1_img',
			'description' => 'By default, the post thumbnail will be shown but when the post haven\'nt thumbnail then this will be replaced',
		),

		'key' => 'field_typo_mg_1_img',

		'children' => array(

			array(
				'id'        => 'typo_mg_1_img',
				'component' => 'BF_Media_Image',
				'args'      => array(
					'id'          => 'typo_mg_1_img',
					'dataType'    => 'id',
					'type'        => 'media_image',
					'mediaTitle'  => 'Select or Image',
					'mediaButton' => 'Select Image',
					'uploadLabel' => 'Upload Image',
					'removeLabel' => 'Remove',
					'inputClass'  => '',
					'previewSize' => 'large',
					'showInput'   => true,
				),
				'key'       => 'typo_mg_1_img',

				'attribute' => array(
					'type'  => 'string',
					'items' => false
				)
			),
		),
	),
);
