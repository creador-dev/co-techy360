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
			'switch-id',
			array(
				'label'       => 'Switch Label',
				'type'        => 'switcher',
				'description' => '',
				'label_on'    => 'Yes',
				'label_off'   => 'No',
			)
		),
	),
	array(
		'method' => 'end_controls_section',
		'args'   => array(),
	),
);
