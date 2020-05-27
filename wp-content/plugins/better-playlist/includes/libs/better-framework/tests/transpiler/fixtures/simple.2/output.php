<?php

return array(

	array(

		'id'        => 'tag_1',
		'component' => 'tag_div',
		'key'       => 'tag_1',

		'args' => array(
			'class'      => 'a',
			'data-count' => '1',
		),

		'children' => array(
			array(

				'id'        => 'tag_2',
				'component' => 'tag_p',
				'key'       => 'tag_2',

				'args' => array(
					'innerText' => 'inner text',
				),

				'children' => []
			),
			array(

				'id'        => 'tag_3',
				'component' => 'tag_br',
				'key'       => 'tag_3',

				'args' => array(
				),

				'children' => []
			),
			array(

				'id'        => 'tag_4',
				'component' => 'tag_p',
				'key'       => 'tag_4',

				'args' => array(
					'innerText' => 'after br',
				),

				'children' => []
			),
		),
	),
);
