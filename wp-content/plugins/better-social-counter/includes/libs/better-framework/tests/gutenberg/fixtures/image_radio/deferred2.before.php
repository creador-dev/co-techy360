<?php

return array(
	'site_bg_image' => array(

		'name'             => 'Header Style',
		'id'               => 'site_bg_image',
		'desc'             => 'Select header style.',
		'type'             => 'image_radio',
		'deferred-options' => array(
			'callback' => function () {

				return array(
					'style-1' => array(
						'img'   => '1',
						'label' => '1',
						'class' => '1',
					),
					'style-2' => array(
						'img'   => '2',
						'label' => '2',
						'class' => '2',
					)
				);
			}
		),
	),
);