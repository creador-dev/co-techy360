<?php

return array(

	array(

		'id'        => 'field_sample',
		'component' => 'BF_Section_Container',
		'args'      => array(
			'type'        => 'bf-ajax-select',
			'label'       => 'Tags',
			'description' => 'Show posts associated with certain tags in homepage.',
			'id'          => 'field_sample',
			'name'        => 'sample',
		),

		'key' => 'field_sample',

		'children' => array(

			array(
				'id'        => 'sample',
				'component' => 'BF_Ajax_Select',
				'args'      => array(
					'id'          => 'sample',
					'callback'    => 'BF_Ajax_Select_Callbacks::tags_callback',
					'placeholder' => 'Search and find tag...',
				),
				'key'       => 'sample',
				'attribute' => array(
					'type'  => 'string',
					'items' => false
				),
			),
		),
	),
);
