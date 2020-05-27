<?php

return array(
	array(

		'id'        => 'field_note',
		'component' => 'BF_Section_Container',
		'args'      => array(
			'type'  => 'bf-info',
			'label' => 'Important Note',
			'id'    => 'field_note',
			'name'  => 'note',
		),

		'key' => 'field_note',

		'children' => array(
			array(
				'id'        => 'note',
				'component' => 'BF_Info',
				'args'      => array(
					'note'  => '<p>Following options wouldn\'t work if you selected a custom page for front page but these settings will be used when you have not selected a static page for front page and the paginated pages of static homepage.</p>',
					'state' => 'open',
					'id'    => 'note',
					'level' => 'danger',
				),
				'key'       => 'note',
				'std'       => '<p>Following options wouldn\'t work if you selected a custom page for front page but these settings will be used when you have not selected a static page for front page and the paginated pages of static homepage.</p>',
			),
		),
	),

);
