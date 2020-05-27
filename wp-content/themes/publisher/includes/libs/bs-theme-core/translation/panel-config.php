<?php
/***
 *  BetterStudio Themes Core.
 *
 *  ______  _____   _____ _                           _____
 *  | ___ \/  ___| |_   _| |                         /  __ \
 *  | |_/ /\ `--.    | | | |__   ___ _ __ ___   ___  | /  \/ ___  _ __ ___
 *  | ___ \ `--. \   | | | '_ \ / _ \ '_ ` _ \ / _ \ | |    / _ \| '__/ _ \
 *  | |_/ //\__/ /   | | | | | |  __/ | | | | |  __/ | \__/\ (_) | | |  __/
 *  \____/ \____/    \_/ |_| |_|\___|_| |_| |_|\___|  \____/\___/|_|  \___|
 *
 *  Copyright © 2017 Better Studio
 *
 *
 *  Our portfolio is here: https://betterstudio.com/
 *
 *  \--> BetterStudio, 2018 <--/
 */


// Language  name for smart admin texts
$lang = bf_get_current_lang_raw();
if ( $lang != 'none' ) {
	$lang = bf_get_language_name( $lang );
} else {
	$lang = '';
}

$page_title = sprintf( __( '%s Translation Panel', 'publisher' ), $this->publisher );

$panel = array(
	'panel-name' => $page_title,
	'panel-desc' => '<p>' . __( 'Translate all strings of theme or select pre translation.', 'publisher' ) . '</p>',
	'texts'      => array(

		'panel-desc-lang'     => '<p>' . __( '%s Language Translation.', 'publisher' ) . '</p>',
		'panel-desc-lang-all' => '<p>' . __( 'All Languages Translations.', 'publisher' ) . '</p>',

		'reset-button'     => ! empty( $lang ) ? sprintf( __( 'Reset %s Translation', 'publisher' ), $lang ) : __( 'Reset Translation', 'publisher' ),
		'reset-button-all' => __( 'Reset All Translations', 'publisher' ),

		'reset-confirm'     => ! empty( $lang ) ? sprintf( __( 'Are you sure to reset %s translation?', 'publisher' ), $lang ) : __( 'Are you sure to reset translation?', 'publisher' ),
		'reset-confirm-all' => __( 'Are you sure to reset all translations?', 'publisher' ),

		'save-button'     => ! empty( $lang ) ? sprintf( __( 'Save %s Translation', 'publisher' ), $lang ) : __( 'Save Translation', 'publisher' ),
		'save-button-all' => __( 'Save All Translations', 'publisher' ),

		'save-confirm-all' => __( 'Are you sure to save all translations? this will override specified translations per languages', 'publisher' )

	),
	'config'     => array(
		'name'                => $page_title,
		'parent'              => $this->menu_parent,
		'slug'                => 'better-studio/translations/theme-translation',
		'page_title'          => $page_title,
		'menu_title'          => __( 'Theme Translation', 'publisher' ),
		'capability'          => 'manage_options',
		'menu_slug'           => $page_title,
		'notice-icon'         => $this->notice_icon,
		'icon_url'            => NULL,
		'position'            => $this->menu_position,
		'exclude_from_export' => false,
		'on_admin_bar'        => true
	),
);
