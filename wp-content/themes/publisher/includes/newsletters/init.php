<?php


if ( ! function_exists( 'publisher_is_newsletter_pack_active' ) ) {
	/**
	 * Detect "Newsletter Pack" is active or not
	 *
	 * @return bool
	 */
	function publisher_is_newsletter_pack_active() {

		return class_exists( 'BS_Newsletter_Pack_Pro' );
	}
}


if ( ! function_exists( 'publisher_show_newsletter_location' ) ) {
	/**
	 * Return data of Newsletter Pack location by its ID prefix
	 *
	 * @param string $location_prefix
	 * @param array  $config
	 *
	 * @return array
	 */
	function publisher_show_newsletter_location( $location_prefix = '', $config = array() ) {

		if ( ! publisher_is_newsletter_pack_active() ) {
			return;
		}

		if ( ! isset( $config['custom-data']['style-type'] ) ) {
			$config['custom-data']['style-type'] = 'wide';
		}

		bsnp_show_location( $location_prefix, NULL, $config );
	}
}


add_filter( 'better-framework/panel/bs-newsletter-pack/fields', 'publisher_newsletter_location_top_reg', 50 );

if ( ! function_exists( 'publisher_newsletter_location_top_reg' ) ) {
	/**
	 * Publisher
	 *
	 * @param $fields
	 *
	 * @return array
	 */
	function publisher_newsletter_location_top_reg( $fields ) {

		$fields['_post_location'] = array(
			'name'   => __( 'Publisher - Post Newsletter Locations', 'publisher' ),
			'id'     => '_post_location',
			'type'   => 'heading',
			'layout' => 'style-2',
		);

		bsnp_inject_newsletter_field_to_fields( $fields, array(
			'group'           => true,
			'group_title'     => __( 'Before Post Author Box', 'publisher' ),
			'location_prefix' => 'post_before_author',
			'group_state'     => 'close',
		) );

		bsnp_inject_newsletter_field_to_fields( $fields, array(
			'group'           => true,
			'group_title'     => __( 'Before Next/Prev Post Links', 'publisher' ),
			'location_prefix' => 'post_before_nextprev',
			'group_state'     => 'close',
		) );

		bsnp_inject_newsletter_field_to_fields( $fields, array(
			'group'           => true,
			'group_title'     => __( 'Before Related Posts', 'publisher' ),
			'location_prefix' => 'post_before_related',
			'group_state'     => 'close',
		) );

		bsnp_inject_newsletter_field_to_fields( $fields, array(
			'group'           => true,
			'group_title'     => __( 'Before Comments', 'publisher' ),
			'location_prefix' => 'post_before_comment',
			'group_state'     => 'close',
		) );

		bsnp_inject_newsletter_field_to_fields( $fields, array(
			'group'           => true,
			'group_title'     => __( 'After Comments', 'publisher' ),
			'location_prefix' => 'post_after_comment',
			'group_state'     => 'close',
		) );

		return $fields;
	}
}


add_filter( 'better-framework/panel/bs-newsletter-pack/std', 'publisher_newsletter_locations_std', 10 );

/**
 * Newsletter locations default value
 *
 * @param $fields
 *
 * @return array
 */
function publisher_newsletter_locations_std( $fields ) {

	// Before author box
	$fields['post_before_author_newsletter'] = array(
		'std' => '',
	);
	$fields['post_before_author_style']      = array(
		'std' => 'default',
	);
	$fields['post_before_author_si_style']   = array(
		'std' => 'default',
	);

	// Before next/prev
	$fields['post_before_nextprev_newsletter'] = array(
		'std' => '',
	);
	$fields['post_before_nextprev_style']      = array(
		'std' => 'default',
	);
	$fields['post_before_nextprev_si_style']   = array(
		'std' => 'default',
	);

	// Before related
	$fields['post_before_related_newsletter'] = array(
		'std' => '',
	);
	$fields['post_before_related_style']      = array(
		'std' => 'default',
	);
	$fields['post_before_related_si_style']   = array(
		'std' => 'default',
	);

	// Before comment
	$fields['post_before_comment_newsletter'] = array(
		'std' => '',
	);
	$fields['post_before_comment_style']      = array(
		'std' => 'default',
	);
	$fields['post_before_comment_si_style']   = array(
		'std' => 'default',
	);

	// After comment
	$fields['post_after_comment_newsletter'] = array(
		'std' => '',
	);
	$fields['post_after_comment_style']      = array(
		'std' => 'default',
	);
	$fields['post_after_comment_si_style']   = array(
		'std' => 'default',
	);

	return $fields;
}
