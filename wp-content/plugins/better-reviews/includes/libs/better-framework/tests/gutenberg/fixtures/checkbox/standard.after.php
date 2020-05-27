<?php

return array(

	array(

		'id'        => 'field_field-id',
		'component' => 'BF_Section_Container',
		'args'      => array(
			'type'  => 'radio-control',
			'label' => 'Field Title',
			'id'    => 'field_field-id',
			'name'  => 'field-id',
		),

		'key' => 'field_field-id',

		'children' => array(
			array(

				'id'        => 'field-id',
				'component' => 'RadioControl',
				'args'      => array(
					'options' => [
						[
							'label' => 'option 1',
							'value' => 'opt-1',
						],
						[
							'label' => 'option 2',
							'value' => 'opt-2',
						],
					],
					'id'      => 'field-id',
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
