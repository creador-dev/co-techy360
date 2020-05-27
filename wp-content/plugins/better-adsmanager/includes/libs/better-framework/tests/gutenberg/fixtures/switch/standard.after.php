<?php

return array(

	array(

		'id'        => 'field_switch',
		'component' => 'BF_Section_Container',
		'args'      => array(
			'type'  => 'bf-switch',
			'label' => 'Switch Label',
			'id'    => 'field_switch',
			'name'  => 'switch',
		),

		'key' => 'field_switch',

		'children' => array(
			array(
				'id'        => 'switch',
				'component' => 'BF_Switch',
				'args'      => array(
					'id'       => 'switch',
					'onLabel'  => 'Yes',
					'offLabel' => 'No',
				),

				'key'       => 'switch',
				'attribute' => Array(
					'type'  => 'string',
					'items' => false,
				),
			),
		),
	),
);
