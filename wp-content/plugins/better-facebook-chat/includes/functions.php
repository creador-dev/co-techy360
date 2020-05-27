<?php

/**
 * Fetch facebook numeric ID
 *
 * @param string $username facebook page slug/username
 *
 * @return string none empty on success
 */
function bsfc_fetch_page_id( $username ) {

	$remote = wp_remote_get( 'https://www.facebook.com/' . $username );

	if ( ! $remote || is_wp_error( $remote ) ) {
		return '';
	}


	if ( wp_remote_retrieve_response_code( $remote ) !== 200 ) {
		return '';
	}

	preg_match( '/\"entity_id\"\s*:\s*\"(\d+)\"/', wp_remote_retrieve_body( $remote ), $matches );


	if ( $matches ) {

		return $matches[1];
	}

	return '';
}

/**
 * Get facebook numeric ID  for page name
 *
 * @param string $page_name facebook page URL or username
 *
 * @return string none empty on success
 */
function bsfc_get_page_id( $page_name ) {

	$fb_url_pattern = '/^https?:\/\/(?:www|m)\.facebook.com\/(?:profile\.php\?id=)?([a-zA-Z0-9\.]+)$/';

	preg_match( $fb_url_pattern, $page_name, $matches );


	if ( $matches ) {

		$username = $matches[1];
	} else {

		$username = $page_name;
	}

	$cache = get_option( 'bsfc_page_id', array() );

	if ( ! empty( $cache[ $username ] ) ) {

		return $cache[ $username ];
	}

	$page_id = bsfc_fetch_page_id( $username );

	update_option( 'bsfc_page_id', array( $username => $page_id ) );

	return $page_id;
}