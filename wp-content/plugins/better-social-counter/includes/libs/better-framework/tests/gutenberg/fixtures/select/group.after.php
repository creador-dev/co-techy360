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
					'id'   => 'field-id',
					'tree' => [
						[
							'name'     => 'group 1',
							'id'       => 'group_1',
							'children' => [
								[ 'name' => 'option 1', 'id' => 'opt-1' ],
								[ 'name' => 'option 2', 'id' => 'opt-2' ],
								[ 'name' => 'option 3', 'id' => 'opt-3' ],
							]
						],
						[
							'name' => 'option 4',
							'id'   => 'opt-4',
						],
						[
							'name'     => 'group 2',
							'id'       => 'group_2',
							'children' => [
								[ 'name' => 'option 5', 'id' => 'opt-5' ],
								[ 'name' => 'option 6', 'id' => 'opt-6' ],
							]
						],
					]
				),

				'key'       => 'field-id',
				'attribute' => Array(
					'type'  => 'string',
					'items' => false,
					'enum' => [
						'group_1',
						'opt-4',
						'group_2',
						'opt-1',
						'opt-2',
						'opt-3',
						'opt-5',
						'opt-6',
					]
				),
			)
		),
	),
);
