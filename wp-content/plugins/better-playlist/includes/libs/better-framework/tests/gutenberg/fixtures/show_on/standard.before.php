<?php

return array(
	'select'  => array(
		'name'    => 'select',
		'id'      => 'select',
		'type'    => 'select',
		'options' => array(
			'opt-1' => 'option 1',
			'opt-2' => 'option 2',
		)
	),
	'content' => array(
		'name'          => __( 'Tab Content', 'better-studio' ),
		'id'            => 'content',
		'type'          => 'textarea',
		'section_class' => 'style-floated-left bordered center-images',
		'show_on'       => array(
			array( 'inline_related_posts_status=show' )
		),
	),
);
