<?php

return array(
	'hr1' => array(
		'name'             => 'Pre-defined Styles',
		'id'               => 'style',
		'type'             => 'select_popup',
		'deferred-options' => array(
			'callback' => 'themename_styles_config',
		),
		'texts'            => array(
			'modal_title'   => __( 'Choose Pre-defined Style', 'better-studio' ),
			'box_pre_title' => __( 'Active style', 'better-studio' ),
			'box_button'    => __( 'Change Style', 'better-studio' ),
		),
		'desc'             => __( 'Select a pre-made style. Actually each style is a theme!', 'better-studio' ),
		'confirm_changes'  => true,
		'confirm_texts'    => array(
			'header'        => __( 'Do you want to change style?', 'better-studio' ),
			'button_ok'     => __( 'Yes, Change', 'better-studio' ),
			'button_cancel' => __( 'Cancel', 'better-studio' ),
			'title'         => __( 'With changing style following option will be changed.', 'better-studio' ),

			'caption' => __( '%s Style', 'better-studio' ),

			'list_items' => array(
				__( 'Color settings', 'better-studio' ),
				__( 'Typography options', 'better-studio' ),
				__( 'Page layout, Header and Footer option', 'better-studio' ),
			),

			'notice' => __( 'Please note your homepage, posts, logo and other options will not changed.', 'better-studio' )
		),
		'column_class'     => 'three-column',
	),
);