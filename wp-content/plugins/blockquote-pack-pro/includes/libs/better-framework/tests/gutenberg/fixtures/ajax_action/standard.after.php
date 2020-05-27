<?php

return array(

	array(

		'id'        => 'field_id1',
		'component' => 'BF_Section_Container',
		'args'      => array(
			'type'  => 'bf-ajax-action',
			'label' => 'Action',
			'id'    => 'field_id1',
			'name'  => 'id1',
		),

		'key' => 'field_id1',

		'children' => array(

			array(
				'id'        => 'id1',
				'component' => 'BF_Ajax_Action',
				'args'      => array(
					'id'         => 'id1',
					'buttonName' => '<i class="fa fa-refresh"></i> Reset Color Settings',
					'callback'   => 'callable',
					'confirm'    => 'Are you sure for resetting all color settings?',
					'token'      => Better_Framework::callback_token( 'callable' )
				),
				'key'       => 'id1',
			),
		),
	),
);
