<?php

return array(

	array(

		'id'        => 'field_field-id',
		'component' => 'BF_Section_Container',
		'args'      => array(
			'type'  => 'tree-select',
			'label' => 'Field Title',
			'id'    => 'field_field-id',
			'name'  => 'field-id',
		),

		'key' => 'field_field-id',

		'children' => array(
			array(

				'id'        => 'field-id',
				'component' => 'TreeSelect',
				'args'      => array(
					'tree' => [
						[
							'name' => 'option 1',
							'id'   => 'opt-1',
						],
						[
							'name' => 'option 2',
							'id'   => 'opt-2',
						],
					],
					'id'   => 'field-id',
				),

				'key'       => 'field-id',
				'attribute' => Array(
					'type'  => 'string',
					'items' => false,
					'enum'  => [
						'opt-1',
						'opt-2',
					]
				),
			)
		),
	),
);
