<?php

return array(

	array(
		'id'        => 'the_id',
		'component' => 'PanelBody',
		'args'      => array(
			'title'       => 'Group title',
			'initialOpen' => true,
			'id'          => 'the_id',
		),

		'children' => array(

			array(

				'id'        => 'field_text',
				'component' => 'BF_Section_Container',
				'args'      => array(
					'type'  => 'text-control',
					'label' => 'Field Title',
					'id'    => 'field_text',
					'name'  => 'text',
				),

				'key' => 'field_text',

				'children' => array(
					array(
						'id'        => 'text',
						'component' => 'TextControl',
						'args'      => array(
							'type' => 'text',
							'id'   => 'text',
						),
						'key'       => 'text',
						'attribute' => array(
							'type'  => 'string',
							'items' => false
						)
					)
				),
			),
		),
		'key'      => 'the_id',
	),
);
