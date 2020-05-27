<?php

return array(

	array(

		'id'        => 'field_css-code',
		'component' => 'BF_Section_Container',
		'args'      => array(
			'type'        => 'bf-code',
			'label'       => 'Admin Pages CSS Code',
			'id'          => 'field_css-code',
			'name'        => 'css-code',
			'description' => __( 'You can change admin pages style with adding CSS code into this field.', 'better-studio' ),
		),

		'key' => 'field_css-code',

		'children' => array(

			array(
				'id'        => 'css-code',
				'component' => 'BF_Code',
				'args'      => array(
					'id'                => 'css-code',
					'lang'              => 'css',
					//
					'lineNumbers'       => 'enable',
					'autoCloseBrackets' => 'disable',
					'autoCloseTags'     => 'enable',
					'placeholder'       => 'the-placeholder',
				),
				'key'       => 'css-code',
				'attribute' => array(
					'type'  => 'string',
					'items' => false,
				)
			),
		),
	),
);
