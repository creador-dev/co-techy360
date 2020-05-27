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
			'speed',
			array(
				'label'       => 'Title',
				'type'        => 'slider',
				'description' => 'Set the speed of the ticker cycling, in second.',
				'range'       => array(
					'min'  => 5,
					'max'  => 85,
					'step' => 1,
				),
			)
		),
	),
	array(
		'method' => 'end_controls_section',
		'args'   => array(),
	),
);
