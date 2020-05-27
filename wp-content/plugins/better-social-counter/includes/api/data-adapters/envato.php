<?php

if ( ! $marketplace = Better_Social_Counter::get_option( 'envato_marketplace' ) ) {
	$marketplace = 'themeforest';
}

return array(

	'id'          => Better_Social_Counter::get_option( 'envato_username' ),
	'name'        => Better_Social_Counter::get_option( 'envato_' . $marketplace . '_name' ),
	'title'       => Better_Social_Counter::get_option( 'envato_title' ),
	'button'      => Better_Social_Counter::get_option( 'envato_button' ),
	'title_join'  => Better_Social_Counter::get_option( 'envato_title_join' ),
	'marketplace' => $marketplace,
);
