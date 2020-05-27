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
				'label'       => 'Action',
				'type'        => 'button',
				'text'        => '<i class="fa fa-refresh"></i> Reset Color Settings',
				'description' => '',
				'button_type' => 'ajax-action',
				'js-event'    => 'ev'
			)
		),
	),
	array(
		'method' => 'end_controls_section',
		'args'   => array(),
	),
);
