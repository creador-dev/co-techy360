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
			'title',
			array(
				'label'       => 'Tab Title',
				'type'        => 'custom',
				'description' => 'Description',
				'raw'         => '<h1>RawHTML</h1>',
			)
		),
	),
	array(
		'method' => 'end_controls_section',
		'args'   => array(),
	),
);
