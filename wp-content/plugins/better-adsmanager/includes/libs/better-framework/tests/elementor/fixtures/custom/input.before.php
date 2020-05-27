<?php

return array(
	'title' => array(
		'name'           => 'Tab Title',
		'id'             => 'title',
		'type'           => 'custom',
		'desc'           => 'Description',
		'input_callback' => array(
			'callback' => function () {

				echo '<h1>RawHTML</h1>';
			},
			'args'     => array(),
		),
	),
);
