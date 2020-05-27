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
		'parent_title'        => '<strong>Better</strong> Ads',
		'slug'                => 'better-studio/better-ads-manager',
		'name'                => __( 'Better Ads Manager', 'better-studio' ),
		'page_title'          => __( 'Better Ads Manager', 'better-studio' ),
		'menu_title'          => __( 'Ads Manager', 'better-studio' ),
		'capability'          => 'manage_options',
		'icon_url'            => null,
		'position'            => '59.2',
		'icon'                => '\e033',
		'exclude_from_export' => false,
	),
	'texts'      => array(
		'panel-desc-lang'     => '<p>' . __( '%s Language Ads.', 'better-studio' ) . '</p>',
		'panel-desc-lang-all' => '<p>' . __( 'All Languages Ads.', 'better-studio' ) . '</p>',
		'reset-button'        => ! empty( $lang ) ? sprintf( __( 'Reset %s Ads', 'better-studio' ), $lang ) : __( 'Reset Ads', 'better-studio' ),
		'reset-button-all'    => __( 'Reset All Ads', 'better-studio' ),
		'reset-confirm'       => ! empty( $lang ) ? sprintf( __( 'Are you sure to reset %s Ads?', 'better-studio' ), $lang ) : __( 'Are you sure to reset Ads?', 'better-studio' ),
		'reset-confirm-all'   => __( 'Are you sure to reset all Ads?', 'better-studio' ),
		'save-button'         => ! empty( $lang ) ? sprintf( __( 'Save %s Ads', 'better-studio' ), $lang ) : __( 'Save Ads', 'better-studio' ),
		'save-button-all'     => __( 'Save All Ads', 'better-studio' ),
		'save-confirm-all'    => __( 'Are you sure to save all Ads? this will override specified Ads per languages', 'better-studio' )
	),
	'panel-name' => _x( 'Better Ads Manager', 'Panel title', 'better-studio' ),
	'panel-desc' => '<p>' . __( 'Manage your ads in better way!', 'better-studio' ) . '</p>',
);
