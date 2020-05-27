<?php

return array(

	array(
		'method' => 'start_controls_section',
		'args'   =>
			array(
				'section_title',
				array(
					'label' => null,
				),
			),
	),
	array(
		'method' => 'add_control',
		'args'   => array(
			'field-id',
			array(
				'label'       => 'Field Title',
				'type'        => 'color',
				'description' => '',
			)
		),
	),
	array(
		'method' => 'end_controls_section',
		'args'   => array(),
	),
);
