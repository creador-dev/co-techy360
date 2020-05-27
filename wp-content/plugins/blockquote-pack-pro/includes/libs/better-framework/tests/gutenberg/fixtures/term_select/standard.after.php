<?php

return array(

	array(

		'id'        => 'field_ts',
		'component' => 'BF_Section_Container',
		'args'      => array(
			'type'        => 'bf-term-select',
			'label'       => 'Newsticker Category Filter',
			'id'          => 'field_ts',
			'name'        => 'ts',
			'description' => 'Filter Newsticker posts to specific categories',
		),

		'key' => 'field_ts',

		'children' => array(

			array(
				'id'        => 'ts',
				'component' => 'BF_Term_Select',
				'args'      => array(
					'id'       => 'ts',
					'labels'   => array(
						'help'         => 'Help: Click on check box to',
						'not_selected' => 'Not Selected',
						'selected'     => 'Selected',
						'excluded'     => 'Excluded',
					),
					'taxonomy' => 'category'
				),
				'key'       => 'ts',
				'attribute' => array(
					'type'  => 'string',
					'items' => false
				)
			),
		),
	),
);
