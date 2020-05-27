<?php

return array(

	array(

		'id'        => 'field_the_id',
		'component' => 'BF_Section_Container',
		'args'      => array(
			'type'  => 'bf-repeater',
			'label' => 'Repeater title',
			'id'    => 'field_the_id',
			'name'  => 'the_id',
		),

		'key' => 'field_the_id',

		'children' => array(
			array(
				'id'        => 'the_id',
				'component' => 'BF_Repeater',
				'args'      => array(
					'id'            => 'the_id',
					'defaultParams' => array(
						'heading' => 'Default Heading',
						'type'    => '',
					),

					'addLabel'    => '<i class="fa fa-plus"></i> Add New Share Link',
					'deleteLabel' => 'Delete Link',
					'itemTitle'   => 'Custom Link',
				),

				'children'  => array(

					array(

						'id'        => 'field_heading',
						'component' => 'BF_Section_Container',
						'args'      => array(
							'type'  => 'text-control',
							'label' => 'Custom Heading',
							'id'    => 'field_heading',
							'name'  => 'heading',
						),

						'key' => 'field_heading',

						'children' => array(
							array(
								'id'        => 'heading',
								'component' => 'TextControl',
								'args'      => array(
									'type' => 'text',
									'id'   => 'heading',
								),

								'key'       => 'heading',
								'attribute' => Array(
									'type'  => 'string',
									'items' => false,
								),

								'repeater_item' => 'the_id',
							),
						),
					),

					array(

						'id'        => 'field_type',
						'component' => 'BF_Section_Container',
						'args'      => array(
							'type'  => 'tree-select',
							'label' => 'Select',
							'id'    => 'field_type',
							'name'  => 'type',
						),

						'key' => 'field_type',

						'children' => array(
							array(
								'id'        => 'type',
								'component' => 'TreeSelect',
								'args'      => array(

									'tree' => [
										[
											'name' => 'by Category',
											'id'   => 'cat',
										],
										[
											'name' => 'by Tag',
											'id'   => 'tag',
										],
										[
											'name' => 'by Author',
											'id'   => 'author',
										],
									],
									'id'   => 'type',
								),
								'key'       => 'type',
								'attribute' => Array(
									'type'  => 'string',
									'items' => false,
									'enum'  => [
										'cat',
										'tag',
										'author',
									]
								),

								'repeater_item' => 'the_id',
							)
						),
					),
				),
				'key'       => 'the_id',
				'attribute' => Array(
					'type'  => 'array',
					'items' => false,
				)
			),
		),
	),
);
