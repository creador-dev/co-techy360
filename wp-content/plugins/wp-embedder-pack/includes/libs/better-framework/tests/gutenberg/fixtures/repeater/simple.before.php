<?php

return array(
	array(
		'name'         => 'Repeater title',
		'id'           => 'the_id',
		'type'         => 'repeater',
		'default'      => array(
			array(
				'heading' => 'Default Heading',
			)
		),
		'options'      => array(
			'heading' => array(
				'name' => 'Custom Heading',
				'id'   => 'heading',
				'type' => 'text',
			),
			'type'    => array(
				'name'    => 'Select',
				'id'      => 'type',
				'type'    => 'select',
				'options' => array(
					'cat'    => 'by Category',
					'tag'    => 'by Tag',
					'author' => 'by Author',
				),
			),
		),
		'add_label'    => '<i class="fa fa-plus"></i> Add New Share Link',
		'delete_label' => 'Delete Link',
		'item_title'   => 'Custom Link',
	),
);
