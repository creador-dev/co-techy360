<?php

return array(

	array(

		'id'        => 'field_sorter',
		'component' => 'BF_Section_Container',
		'args'      => array(
			'type'  => 'bf-sorter-checkbox',
			'label' => 'Title',
			'id'    => 'field_sorter',
			'name'  => 'sorter',
		),

		'key' => 'field_sorter',

		'children' => array(

			array(
				'id'        => 'sorter',
				'component' => 'BF_Sorter_Checkbox',
				'args'      => array(
					'id'    => 'sorter',
					'desc'  => '',
					'items' => array(
						array(
							'id'       => 'wordpress',
							'label'    => '<i class="fa fa-wordpress"></i> ' . __( 'WordPress', 'better-studio' ),
							'cssClass' => 'active-item'
						),
						array(
							'id'       => 'facebook',
							'label'    => '<i class="fa fa-facebook"></i> ' . __( 'Facebook', 'better-studio' ),
							'cssClass' => 'active-item',
						),
						array(
							'id'       => 'disqus',
							'label'    => '<i class="bf-icon bsfi-disqus"></i>' . __( 'Disqus', 'better-studio' ),
							'cssClass' => 'disable-item',
						),
					),

				),
				'key'       => 'sorter',
				'attribute' => array(
					'type'  => 'object',
					'items' => false,
				)
			),
		),
	),
);
