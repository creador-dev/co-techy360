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
			'head',
			array(
				'label'       => 'GTM',
				'type'        => 'textarea',
				'description' => 'Enter GTM code that should be appear after head',
			)
		),
	),
	array(
		'method' => 'end_controls_section',
		'args'   => array(),
	),
);
