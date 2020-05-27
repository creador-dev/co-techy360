<?php


$fields['enable'] = array(

	'id'        => 'enable',
	'type'      => 'switch',
	'name'      => __( 'Smart Thumbnail Status', 'smart-thumbnails' ),
	'off-label' => __( 'Disable', 'smart-thumbnails' ),
	'on-label'  => __( 'Enable', 'smart-thumbnails' ),
);


$fields['grid'] = array(
	'id'        => 'grid',
	'type'      => 'switch',
	'name'      => __( 'Show grid on preview image', 'smart-thumbnails' ),
	'on-label'  => __( 'Yes', 'smart-thumbnails' ),
	'off-label' => __( 'No', 'smart-thumbnails' ),
	'show_on'   => array(
		array(
			'enable=1'
		)
	)
);

$fields['force-clear-cache'] = array(
	'id'        => 'force-clear-cache',
	'type'      => 'switch',
	'name'      => __( 'Force clear cache', 'smart-thumbnails' ),
	'desc'      => __( 'Force browser to reload images, after focus point has changed', 'smart-thumbnails' ),
	'on-label'  => __( 'Yes', 'smart-thumbnails' ),
	'off-label' => __( 'No', 'smart-thumbnails' ),
	'show_on'   => array(
		array(
			'enable=1'
		)
	)
);

$fields['default-focus-point'] = array(
	'name'    => __( 'Default focus point', 'better-content-protector' ),
	'type'    => 'select',
	'id'      => 'default-focus-point',
	'options' => array(
		'top-left'      => __( 'Top Left', 'better-content-protector' ),
		'top-center'    => __( 'Top Center', 'better-content-protector' ),
		'top-right'     => __( 'Top Right', 'better-content-protector' ),
		//
		'center-left'   => __( 'Center Left', 'better-content-protector' ),
		'center-center' => __( 'Center Center', 'better-content-protector' ),
		'center-right'  => __( 'Center Right', 'better-content-protector' ),
		//
		'bottom-left'   => __( 'Bottom Left', 'better-content-protector' ),
		'bottom-center' => __( 'Bottom Center', 'better-content-protector' ),
		'bottom-right'  => __( 'Bottom Right', 'better-content-protector' ),
	),
	'show_on' => array(
		array(
			'enable=1'
		)
	)
);

$fields['portrait-default-top'] = array(
	'id'        => 'portrait-default-top',
	'type'      => 'switch',
	'name'      => __( 'Place the focus point on the upper side for portrait images', 'smart-thumbnails' ),
	'desc'      => __( 'This will override `default focus point` for portrait images.', 'better-content-protector' ),
	'on-label'  => __( 'Yes', 'smart-thumbnails' ),
	'off-label' => __( 'No', 'smart-thumbnails' ),
	'show_on'   => array(
		array(
			'enable=1'
		)
	)
);

$fields['enlarge-smaller'] = array(
	'id'        => 'enlarge-smaller',
	'type'      => 'switch',
	'name'      => __( 'Enlarge small images', 'smart-thumbnails' ),
	'on-label'  => __( 'Yes', 'smart-thumbnails' ),
	'off-label' => __( 'No', 'smart-thumbnails' ),
	'show_on'   => array(
		array(
			'enable=1'
		)
	)
);


$fields['delete-unused-thumbnail'] = array(
	'id'        => 'delete-unused-thumbnail',
	'type'      => 'switch',
	'name'      => __( 'Delete useless thumbnail images', 'smart-thumbnails' ),
	'on-label'  => __( 'Yes', 'smart-thumbnails' ),
	'off-label' => __( 'No', 'smart-thumbnails' ),
	'show_on'   => array(
		array(
			'enable=1'
		)
	)
);
