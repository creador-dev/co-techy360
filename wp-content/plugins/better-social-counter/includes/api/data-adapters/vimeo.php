<?php

$vimeo_type = Better_Social_Counter::get_option( 'vimeo_type' );


if ( $vimeo_type === 'user' ) {

	$type = 'user';
	$id   = Better_Social_Counter::get_option( 'vimeo_username' );

} else {

	$type = 'channel';
	$id   = Better_Social_Counter::get_option( 'vimeo_username' );
}

return array(

	'id'         => $id,
	'type'       => $type,
	'field'      => Better_Social_Counter::get_option( 'vimeo_data' ),
	'name'       => Better_Social_Counter::get_option( 'vimeo_name' ),
	'title'      => Better_Social_Counter::get_option( 'vimeo_title' ),
	'button'     => Better_Social_Counter::get_option( 'vimeo_button' ),
	'title_join' => Better_Social_Counter::get_option( 'vimeo_title_join' ),
);
