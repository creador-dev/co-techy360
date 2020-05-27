<?php

return array(

	array(

		'id'        => 'field_speed',
		'component' => 'BF_Section_Container',
		'args'      => array(
			'type'        => 'range-control',
			'label'       => 'Title',
			'id'          => 'field_speed',
			'name'        => 'speed',
			'description' => 'Set the speed of the ticker cycling, in second.',
		),

		'key' => 'field_speed',

		'children' => array(
			array(
				'id'        => 'speed',
				'component' => 'RangeControl',
				'args'      => array(
					'min'             => 5,
					'max'             => 85,
					'initialPosition' => 10,
					'id'              => 'speed',
				),

				'key'       => 'speed',
				'attribute' => Array(
					'type'  => 'string',
					'items' => false
				),
				'std'       => 10,
			),
		),
	),
);
