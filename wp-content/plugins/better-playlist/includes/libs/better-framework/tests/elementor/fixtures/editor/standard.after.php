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
			'sample-id',
			array(
				'label'       => 'Admin Pages CSS Code',
				'type'        => 'code',
				'description' => 'You can change admin pages style with adding CSS code into this field.',
				'language'    => 'css',
			)
		),
	),
	array(
		'method' => 'end_controls_section',
		'args'   => array(),
	),
);
