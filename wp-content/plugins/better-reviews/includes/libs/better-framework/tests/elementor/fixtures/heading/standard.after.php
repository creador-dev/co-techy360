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
			'hd1',
			array(
				'label'       => 'Slider',
				'type'        => 'heading',
				'description' => 'Description',
			)
		),
	),
	array(
		'method' => 'end_controls_section',
		'args'   => array(),
	),
);
