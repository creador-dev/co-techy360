<?php

return array(

	array(

		'id'        => 'tag_1',
		'component' => 'tag_div',
		'key'       => 'tag_1',

		'args'     => array(),
		'children' => array(
			array(

				'id'        => 'tag_2',
				'component' => 'tag_p',
				'key'       => 'tag_2',

				'args' => array(
					'innerText' => 'text'
				),

				'children' => []
			),
			array(

				'id'        => 'tag_3',
				'component' => 'RichText',
				'key'       => 'tag_3',

				'args'     => array(
					'tagName'   => 'ul',
					'multiline' => 'li',
				),
				'children' => array(),
			),
		),
	),
);
