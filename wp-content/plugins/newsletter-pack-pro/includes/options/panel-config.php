<?php

// Language  name for smart admin texts
$lang = bf_get_current_lang_raw();
if ( $lang != 'none' ) {
	$lang = bf_get_language_name( $lang );
} else {
	$lang = '';
}

$panel = array(
	'config'     => array(
		'parent'              => false,
		'parent_title'        => __( 'Newsletter Pack', 'better-studio' ),
		'slug'                => 'better-studio/newsletter-pack',
		'name'                => __( 'Newsletter Pack', 'better-studio' ),
		'page_title'          => __( 'Newsletter Pack', 'better-studio' ),
		'menu_title'          => __( 'Location Manager', 'better-studio' ),
		'capability'          => 'manage_options',
		'icon_url'            => null,
		'position'            => '59.2',
		'icon'                => array(
			'icon'      => 'fa-envelope-open',
			'type'      => 'fontawesome',
			'height'    => '',
			'width'     => '',
			'font_code' => '\f2b6',
			'font_name' => 'FontAwesome',
		),
		'exclude_from_export' => false,
	),
	'panel-name' => _x( 'Newsletter Location Manager Pro', 'Panel title', 'better-studio' ),
	'panel-desc' => '<p>' . __( 'Manage your Newsletter forms in better way!', 'better-studio' ) . '</p>',
);
