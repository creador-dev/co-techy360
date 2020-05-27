<?php

return array(

	array(

		'id'        => 'tag_1',
		'component' => 'tag_div',
		'key'       => 'tag_1',

		'args' => array(
		),

		'children' => array(
			array(
				'id'        => 'tag_2',
				'component' => 'tag_h1',
				'key'       => 'tag_2',

				'args'     => array(
					'innerText' => 'Heading'
				),
				'children' => array(),
			),
			array(
				'id'        => 'tag_3',
				'component' => 'tag_p',
				'key'       => 'tag_3',

				'args' => array(
					'innerText' => 'Lorem ipsum dolor sit amet, consectetur'
				),

				'children' => array(),
			)
		),
	),
);
