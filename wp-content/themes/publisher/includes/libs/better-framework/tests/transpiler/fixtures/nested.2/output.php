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
				'component' => 'tag_p',
				'key'       => 'tag_2',

				'args'     => array(
					'innerText'  => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae facilis id ipsum quia quo quos totam
		voluptatibus! Aperiam aut debitis distinctio, dolore ducimus enim itaque iusto molestiae porro repellendus
		sed.',
					'data-x' => 'd'
				),
				'children' => array(),
			),
			array(
				'id'        => 'tag_3',
				'component' => 'tag_div',
				'key'       => 'tag_3',

				'args' => array(
					'class' => 'sample',
				),

				'children' => array(
					array(
						'id'        => 'tag_4',
						'component' => 'tag_h1',
						'key'       => 'tag_4',

						'args' => array(
							'innerText' => 'heading'
						),

						'children' => array(),
					),
					array(
						'id'        => 'tag_5',
						'component' => 'tag_p',
						'key'       => 'tag_5',

						'args' => array(
							'innerText' => 'text'
						),

						'children' => array(),
					)
				),
			),
			array(
				'id'        => 'tag_6',
				'component' => 'tag_div',
				'key'       => 'tag_6',

				'args' => array(
					'innerText' => '3424',
					'class' => 'another',
				),

				'children' => array(),
			)
		),
	),
);
