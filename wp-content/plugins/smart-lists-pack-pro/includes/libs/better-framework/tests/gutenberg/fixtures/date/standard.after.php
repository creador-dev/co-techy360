<?php

return array(

	array(

		'id'        => 'field_field-id',
		'component' => 'BF_Section_Container',
		'args'      => array(
			'type'  => 'date-time-picker',
			'label' => 'Field Title',
			'id'    => 'field_field-id',
			'name'  => 'field-id',
		),

		'key' => 'field_field-id',

		'children' => array(
			array(

				'id'        => 'field-id',
				'component' => 'DateTimePicker',
				'args'      => array(
					'id' => 'field-id',
				),

				'key'       => 'field-id',
				'attribute' => Array(
					'type'  => 'string',
					'items' => false,
				),
			),
		),
	),
);
