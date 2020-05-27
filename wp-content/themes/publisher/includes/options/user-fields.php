<?php

$type = user_can( get_current_user_id(), 'edit_users' ) ? 'author' : 'subscriber';

/**
 * => Style
 */
$fields[]         = array(
	'name' => $type === 'author' ? __( 'Style', 'publisher' ) : __( 'Profile', 'publisher' ),
	'id'   => 'tab_style',
	'type' => 'tab',
	'icon' => $type === 'author' ? 'bsai-paint' : 'fa-user',
);
$fields['avatar'] = array(
	'name'         => __( 'User Avatar', 'publisher' ),
	'id'           => 'avatar',
	'type'         => 'media_image',
	'data-type'    => 'id',
	'upload_label' => __( 'Upload Avatar', 'publisher' ),
	'remove_label' => __( 'Upload Avatar', 'publisher' ),
	'desc'         => __( 'Upload your avatar. Use this to override Gravatar and WordPress default avatar.', 'publisher' ),
);

if ( $type === 'author' ) {
	$fields['page_layout']            = array(
		'name'             => __( 'Author Page Layout', 'publisher' ),
		'id'               => 'page_layout',
		'type'             => 'select_popup',
		'desc'             => __( 'Select & override page layout for this author.', 'publisher' ),
		'deferred-options' => array(
			'callback' => 'publisher_layout_option_list',
			'args'     => array(
				true,
			),
		),
		'texts'            => array(
			'modal_title'   => __( 'Choose Author Page layout', 'publisher' ),
			'modal_current' => __( 'Current', 'publisher' ),
			'modal_button'  => __( 'Select', 'publisher' ),
			'box_pre_title' => __( 'Selected layout', 'publisher' ),
			'box_button'    => __( 'Change layout', 'publisher' ),
		),
		'column_class'     => 'four-column',
	);
	$fields['page_listing']           = array(
		'name'             => __( 'Posts Listing', 'publisher' ),
		'id'               => 'page_listing',
		'type'             => 'select_popup',
		'desc'             => __( 'Select & override posts listing for this author.', 'publisher' ),
		'deferred-options' => array(
			'callback' => 'publisher_listing_option_list',
			'args'     => array(
				true,
			),
		),
		'texts'            => array(
			'modal_title'   => __( 'Choose Author Page Listing', 'publisher' ),
			'modal_current' => __( 'Current', 'publisher' ),
			'modal_button'  => __( 'Select', 'publisher' ),
			'box_pre_title' => __( 'Selected listing', 'publisher' ),
			'box_button'    => __( 'Change listing', 'publisher' ),
		),
		'column_class'     => 'three-column',
	);
	$fields['page_listing_excerpt']   = array(
		'name'    => __( 'Show Excerpt?', 'publisher' ),
		'id'      => 'page_listing_excerpt',
		'type'    => 'select',
		'desc'    => __( 'Select show or hide post excerpt in listings with excerpt.', 'publisher' ),
		'options' => array(
			'default' => __( '-- Default --', 'publisher' ),
			'show'    => __( 'Yes, Show.', 'publisher' ),
			'hide'    => __( 'No.', 'publisher' ),
		),
	);
	$fields['author_posts_count']     = array(
		'name' => __( 'Number of Post to Show', 'publisher' ),
		'id'   => 'author_posts_count',
		'desc' => wp_kses( sprintf( __( 'Leave this empty for default. <br>Default: %s', 'publisher' ), publisher_get_option( 'author_posts_count' ) != '' ? publisher_get_option( 'author_posts_count' ) : get_option( 'posts_per_page' ) ), bf_trans_allowed_html() ),
		'type' => 'text',
	);
	$fields['author_pagination_type'] = array(
		'name'             => __( 'Author pagination', 'publisher' ),
		'id'               => 'author_pagination_type',
		'type'             => 'select',
		'desc'             => __( 'Select pagination of profile archive.', 'publisher' ),
		'deferred-options' => array(
			'callback' => 'publisher_pagination_option_list',
			'args'     => array(
				true,
			),
		),
	);
}


/**
 * => Social Links
 */
$fields[]                 = array(
	'name'     => __( 'Social Links', 'publisher' ),
	'id'       => 'tab_social_links',
	'type'     => 'tab',
	'icon'     => 'bsai-link',
	'ajax-tab' => true
);
$fields['twitter_url']    = array(
	'name'           => __( 'Twitter URL', 'publisher' ),
	'id'             => 'twitter_url',
	'type'           => 'text',
	'desc'           => __( 'Enter Twitter profile URL.', 'publisher' ),
	'ajax-tab-field' => 'tab_social_links',
);
$fields['facebook_url']   = array(
	'name'           => __( 'Facebook URL', 'publisher' ),
	'id'             => 'facebook_url',
	'type'           => 'text',
	'desc'           => __( 'Enter Facebook page or profile link.', 'publisher' ),
	'ajax-tab-field' => 'tab_social_links',
);
$fields['gplus_url']      = array(
	'name'           => __( 'Google+ URL', 'publisher' ),
	'id'             => 'gplus_url',
	'type'           => 'text',
	'desc'           => __( 'Enter Google+ page link.', 'publisher' ),
	'ajax-tab-field' => 'tab_social_links',
);
$fields['youtube_url']    = array(
	'name'           => __( 'Youtube URL', 'publisher' ),
	'id'             => 'youtube_url',
	'type'           => 'text',
	'desc'           => __( 'Enter Youtube chanel or profile URL.', 'publisher' ),
	'ajax-tab-field' => 'tab_social_links',
);
$fields['instagram_url']  = array(
	'name'           => __( 'Instagram URL', 'publisher' ),
	'id'             => 'instagram_url',
	'type'           => 'text',
	'desc'           => __( 'Enter Instagram profile URL.', 'publisher' ),
	'ajax-tab-field' => 'tab_social_links',
);
$fields['linkedin_url']   = array(
	'name'           => __( 'Linkedin URL', 'publisher' ),
	'id'             => 'linkedin_url',
	'type'           => 'text',
	'desc'           => __( 'Enter Linkedin profile URL.', 'publisher' ),
	'ajax-tab-field' => 'tab_social_links',
);
$fields['github_url']     = array(
	'name'           => __( 'Github URL', 'publisher' ),
	'id'             => 'github_url',
	'type'           => 'text',
	'desc'           => __( 'Enter Github URL.', 'publisher' ),
	'ajax-tab-field' => 'tab_social_links',
);
$fields['pinterest_url']  = array(
	'name'           => __( 'Pinterest URL', 'publisher' ),
	'id'             => 'pinterest_url',
	'type'           => 'text',
	'desc'           => __( 'Enter Pinterest URL.', 'publisher' ),
	'ajax-tab-field' => 'tab_social_links',
);
$fields['dribbble_url']   = array(
	'name'           => __( 'Dribbble URL', 'publisher' ),
	'id'             => 'dribbble_url',
	'type'           => 'text',
	'desc'           => __( 'Enter Dribbble profile URL.', 'publisher' ),
	'ajax-tab-field' => 'tab_social_links',
);
$fields['vimeo_url']      = array(
	'name'           => __( 'Vimeo URL', 'publisher' ),
	'id'             => 'vimeo_url',
	'type'           => 'text',
	'desc'           => __( 'Enter Vimeo chanel or video URL.', 'publisher' ),
	'ajax-tab-field' => 'tab_social_links',
);
$fields['delicious_url']  = array(
	'name'           => __( 'Delicious URL', 'publisher' ),
	'id'             => 'delicious_url',
	'type'           => 'text',
	'desc'           => __( 'Enter Delicious profile URL.', 'publisher' ),
	'ajax-tab-field' => 'tab_social_links',
);
$fields['soundcloud_url'] = array(
	'name'           => __( 'SoundCloud URL', 'publisher' ),
	'id'             => 'soundcloud_url',
	'type'           => 'text',
	'desc'           => __( 'Enter SoundCloud profile URL.', 'publisher' ),
	'ajax-tab-field' => 'tab_social_links',
);
$fields['behance_url']    = array(
	'name'           => __( 'Behance URL', 'publisher' ),
	'id'             => 'behance_url',
	'type'           => 'text',
	'desc'           => __( 'Enter Behance profile URL.', 'publisher' ),
	'ajax-tab-field' => 'tab_social_links',
);
$fields['flickr_url']     = array(
	'name'           => __( 'Flickr URL', 'publisher' ),
	'id'             => 'flickr_url',
	'type'           => 'text',
	'desc'           => __( 'Enter Flickr profile URL.', 'publisher' ),
	'ajax-tab-field' => 'tab_social_links',
);
$fields['telegram_url']   = array(
	'name'           => __( 'Telegram URL', 'publisher' ),
	'id'             => 'telegram_url',
	'type'           => 'text',
	'desc'           => __( 'Enter Telegram page or channel URL.', 'publisher' ),
	'ajax-tab-field' => 'tab_social_links',
);


/**
 * Adds custom CSS options for metabox
 */
if ( $type === 'author' ) {
	bf_inject_panel_custom_css_fields( $fields );
}
