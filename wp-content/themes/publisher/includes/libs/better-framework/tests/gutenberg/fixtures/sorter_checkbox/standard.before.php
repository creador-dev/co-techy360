<?php

return array(
	'sorter' => array(
		'id'   => 'sorter',
		'name' => 'Title',
		'type' => 'sorter_checkbox',

		'attribute' => array(
			'type'  => 'array',
			'items' => false
		),

		'options' => array(
			'wordpress' => array(
				'label'     => '<i class="fa fa-wordpress"></i> ' . __( 'WordPress', 'publisher' ),
				'css-class' => 'active-item'
			),
			'facebook'  => array(
				'label'     => '<i class="fa fa-facebook"></i> ' . __( 'Facebook', 'publisher' ),
				'css-class' => 'active-item',
			),
			'disqus'    => array(
				'label'     => '<i class="bf-icon bsfi-disqus"></i>' . __( 'Disqus', 'publisher' ),
				'css-class' => 'disable-item',
			),
		),

	),
);