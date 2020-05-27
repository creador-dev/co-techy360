<?php

return array(
	'hr1' => array(
		'name'             => 'Pre-defined Styles',
		'id'               => 'style',
		'type'             => 'select_popup',
		'deferred-options' => array(
			'callback' => 'publisher_styles_config',
		),
		'texts'            => array(
			'modal_title'   => __( 'Choose Pre-defined Style', 'publisher' ),
			'box_pre_title' => __( 'Active style', 'publisher' ),
			'box_button'    => __( 'Change Style', 'publisher' ),
		),
		'desc'             => __( 'Select a pre-made style. Actually each style is a theme!', 'publisher' ),
		'confirm_changes'  => true,
		'confirm_texts'    => array(
			'header'        => __( 'Do you want to change style?', 'publisher' ),
			'button_ok'     => __( 'Yes, Change', 'publisher' ),
			'button_cancel' => __( 'Cancel', 'publisher' ),
			'title'         => __( 'With changing style following option will be changed.', 'publisher' ),

			'caption' => __( '%s Style', 'publisher' ),

			'list_items' => array(
				__( 'Color settings', 'publisher' ),
				__( 'Typography options', 'publisher' ),
				__( 'Page layout, Header and Footer option', 'publisher' ),
			),

			'notice' => __( 'Please note your homepage, posts, logo and other options will not changed.', 'publisher' )
		),
		'column_class'     => 'three-column',
	),
);