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
			'off_canvas_footer',
			array(
				'label'       => 'Footer help text',
				'type'        => 'wysiwyg',
				'description' => 'Enter your contact info and personal tips/helps in this field.',
			)
		),
	),
	array(
		'method' => 'end_controls_section',
		'args'   => array(),
	),
);
