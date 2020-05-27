<?php

return array(

	array(

		'id'        => 'field_icon_select',
		'component' => 'BF_Section_Container',
		'args'      => array(
			'type'  => 'bf-icon-select',
			'label' => 'icon select',
			'id'    => 'field_icon_select',
			'name'  => 'icon_select',
		),

		'key' => 'field_icon_select',

		'children' => array(

			array(
				'id'        => 'icon_select',
				'component' => 'BF_Icon_Select',
				'args'      => array(
					'id' => 'icon_select',
				),
				'key'       => 'icon_select',
				'attribute' => array(
					'type'  => 'object',
					'items' => false,
				)
			),
		),
	),
);
