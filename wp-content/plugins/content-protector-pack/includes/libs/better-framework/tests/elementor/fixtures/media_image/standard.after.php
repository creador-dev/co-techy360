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
			'typo_mg_1_img',
			array(
				'label'       => 'Default Thumbnail Image',
				'type'        => 'media',
				'description' => 'By default, the post thumbnail will be shown but when the post haven\'nt thumbnail then this will be replaced',
				'show_label'  => true,
				'label_block' => true,
			)
		),
	),
	array(
		'method' => 'end_controls_section',
		'args'   => array(),
	),
);
