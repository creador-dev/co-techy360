<?php

//
// Facebook
//
$fields[]                        = array(
	'name' => __( 'Facebook', 'better-studio' ),
	'id'   => 'facebook_tab',
	'type' => 'tab',
	'icon' => 'bsfi-facebook'
);
$fields['facebook_page']         = array(
	'name' => __( 'Facebook Page ID/Name', 'better-studio' ),
	'id'   => 'facebook_page',
	'desc' => __( 'Enter Your Facebook Page Name or ID.', 'better-studio' ),
	'type' => 'text',
);
$fields['facebook_show_counter'] = array(
	'name' => __( 'Show Likes Count?', 'better-studio' ),
	'id'   => 'facebook_show_counter',
	'desc' => __( 'Show/hide count in the widgets.', 'better-studio' ),
	'type' => 'switch',
);
$fields['facebook_count']        = array(
	'name'    => __( 'Fake Likes Count', 'better-studio' ),
	'id'      => 'facebook_count',
	'desc'    => __( 'Set the fake count if you want.', 'better-studio' ),
	'type'    => 'text',
	'show_on' => array(
		array(
			'facebook_show_counter=1'
		),
	)
);
$fields[]                        = array(
	'name'  => __( 'Facebook Translation', 'better-studio' ),
	'type'  => 'group',
	'state' => 'open',
);
$fields['facebook_name']         = array(
	'name' => __( 'Name', 'better-studio' ),
	'id'   => 'facebook_name',
	'type' => 'text',
);
$fields['facebook_title']        = array(
	'name' => __( 'Text Below The Number', 'better-studio' ),
	'id'   => 'facebook_title',
	'type' => 'text',
);
$fields['facebook_title_join']   = array(
	'name' => __( 'Join Text', 'better-studio' ),
	'id'   => 'facebook_title_join',
	'type' => 'text',
);
$fields['facebook_button']       = array(
	'name' => __( 'Button Text', 'better-studio' ),
	'id'   => 'facebook_button',
	'type' => 'text',
);


//
// Twitter
//
$fields[]                       = array(
	'name' => __( 'Twitter', 'better-studio' ),
	'id'   => 'twitter_tab',
	'type' => 'tab',
	'icon' => 'bsfi-twitter'
);
$fields['twitter_username']     = array(
	'name' => __( 'Twitter Username', 'better-studio' ),
	'id'   => 'twitter_username',
	'type' => 'text',
);
$fields['twitter_show_counter'] = array(
	'name' => __( 'Show Followers Count?', 'better-studio' ),
	'id'   => 'twitter_show_counter',
	'desc' => __( 'Show/hide count in the widgets.', 'better-studio' ),
	'type' => 'switch',
);
$fields['twitter_count']        = array(
	'name'    => __( 'Fake Followers Count', 'better-studio' ),
	'id'      => 'twitter_count',
	'desc'    => __( 'Set the fake count if you want.', 'better-studio' ),
	'type'    => 'text',
	'show_on' => array(
		array(
			'twitter_show_counter=1'
		),
	)
);
$fields[]                       = array(
	'name'  => __( 'Twitter Translation', 'better-studio' ),
	'type'  => 'group',
	'state' => 'open',
);
$fields['twitter_name']         = array(
	'name' => __( 'Name', 'better-studio' ),
	'id'   => 'twitter_name',
	'type' => 'text',
);
$fields['twitter_title']        = array(
	'name' => __( 'Text Below The Number', 'better-studio' ),
	'id'   => 'twitter_title',
	'type' => 'text',
);
$fields['twitter_button']       = array(
	'name' => __( 'Button Text', 'better-studio' ),
	'id'   => 'twitter_button',
	'type' => 'text',
);
$fields['twitter_title_join']   = array(
	'name' => __( 'Join Text', 'better-studio' ),
	'id'   => 'twitter_title_join',
	'type' => 'text',
);


//
// Google+
//
$fields[] = array(
	'name' => __( 'Google+', 'better-studio' ),
	'id'   => 'snapchat_tab',
	'type' => 'tab',
	'icon' => 'bsfi-gplus'
);

$fields['google_page']         = array(
	'name' => __( 'Google+ Page ID/Name', 'better-studio' ),
	'id'   => 'google_page',
	'type' => 'text',
);
$fields['google_show_counter'] = array(
	'name' => __( 'Show Followers Count?', 'better-studio' ),
	'id'   => 'google_show_counter',
	'desc' => __( 'Show/hide count in the widgets.', 'better-studio' ),
	'type' => 'switch',
);
$fields['google_count']        = array(
	'name'    => __( 'Fake Followers Count', 'better-studio' ),
	'id'      => 'google_count',
	'desc'    => __( 'Set the fake count if you want.', 'better-studio' ),
	'type'    => 'text',
	'show_on' => array(
		array(
			'google_show_counter=1'
		),
	)
);
$fields[]                      = array(
	'name'  => __( 'Google+ Translation', 'better-studio' ),
	'type'  => 'group',
	'state' => 'open',
);
$fields['google_name']         = array(
	'name' => __( 'Name', 'better-studio' ),
	'id'   => 'google_name',
	'type' => 'text',
);
$fields['google_title']        = array(
	'name' => __( 'Text Below The Number', 'better-studio' ),
	'id'   => 'google_title',
	'type' => 'text',
);
$fields['google_button']       = array(
	'name' => __( 'Button Text', 'better-studio' ),
	'id'   => 'google_button',
	'type' => 'text',
);
$fields['google_title_join']   = array(
	'name' => __( 'Join Text', 'better-studio' ),
	'id'   => 'google_title_join',
	'type' => 'text',
);


//
// Youtube
//
$fields[]                       = array(
	'name' => __( 'Youtube', 'better-studio' ),
	'id'   => 'youtube_tab',
	'type' => 'tab',
	'icon' => 'bsfi-youtube'
);
$fields['youtube_username']     = array(
	'name' => __( 'Youtube Channel ID or Username', 'better-studio' ),
	'id'   => 'youtube_username',
	'type' => 'text',
);
$fields['youtube_show_counter'] = array(
	'name' => __( 'Show Subscribers Count?', 'better-studio' ),
	'id'   => 'youtube_show_counter',
	'desc' => __( 'Show/hide count in the widgets.', 'better-studio' ),
	'type' => 'switch',
);
$fields['youtube_count']        = array(
	'name'    => __( 'Fake Subscribers Count', 'better-studio' ),
	'id'      => 'youtube_count',
	'desc'    => __( 'Set the fake count if you want.', 'better-studio' ),
	'type'    => 'text',
	'show_on' => array(
		array(
			'youtube_show_counter=1'
		),
	)
);
$fields[]                       = array(
	'name'  => __( 'Youtube Translation', 'better-studio' ),
	'type'  => 'group',
	'state' => 'open',
);
$fields['youtube_name']         = array(
	'name' => __( 'Name', 'better-studio' ),
	'id'   => 'youtube_name',
	'type' => 'text',
);
$fields['youtube_title']        = array(
	'name' => __( 'Text Below The Number', 'better-studio' ),
	'id'   => 'youtube_title',
	'type' => 'text',
);
$fields['youtube_button']       = array(
	'name' => __( 'Button Text', 'better-studio' ),
	'id'   => 'youtube_button',
	'type' => 'text',
);
$fields['youtube_title_join']   = array(
	'name' => __( 'Join Text', 'better-studio' ),
	'id'   => 'youtube_title_join',
	'type' => 'text',
);


//
// Instagram
//
$fields[]                         = array(
	'name' => __( 'Instagram', 'better-studio' ),
	'id'   => 'instagram_title',
	'type' => 'tab',
	'icon' => 'bsfi-instagram'
);
$fields['instagram_username']     = array(
	'name' => __( 'Instagram UserName', 'better-studio' ),
	'id'   => 'instagram_username',
	'type' => 'text',
);
$fields['instagram_show_counter'] = array(
	'name' => __( 'Show Followers Count?', 'better-studio' ),
	'id'   => 'instagram_show_counter',
	'desc' => __( 'Show/hide count in the widgets.', 'better-studio' ),
	'type' => 'switch',
);
$fields['instagram_count']        = array(
	'name'    => __( 'Fake Followers Count', 'better-studio' ),
	'id'      => 'instagram_count',
	'desc'    => __( 'Set the fake count if you want.', 'better-studio' ),
	'type'    => 'text',
	'show_on' => array(
		array(
			'instagram_show_counter=1'
		),
	)
);
$fields[]                         = array(
	'name'  => __( 'Instagram Translation', 'better-studio' ),
	'type'  => 'group',
	'state' => 'open',
);
$fields['instagram_name']         = array(
	'name' => __( 'Name', 'better-studio' ),
	'id'   => 'instagram_name',
	'type' => 'text',
);
$fields['instagram_title']        = array(
	'name' => __( 'Text Below The Number', 'better-studio' ),
	'id'   => 'instagram_title',
	'type' => 'text',
);
$fields['instagram_button']       = array(
	'name' => __( 'Button Text', 'better-studio' ),
	'id'   => 'instagram_button',
	'type' => 'text',
);
$fields['instagram_title_join']   = array(
	'name' => __( 'Join Text', 'better-studio' ),
	'id'   => 'instagram_title_join',
	'type' => 'text',
);

// Linkedin
$fields[]                        = array(
	'name'  => __( 'Linkedin', 'better-studio' ),
	'id'    => 'linkedin_tab',
	'type'  => 'tab',
	'icon'  => 'bsfi-linkedin',
	'badge' => array(
		'text'  => __( 'New', 'better-studio' ),
		'color' => '#d54e21'
	),
);
$fields['linkedin_link']         = array(
	'name' => __( 'Linkedin url', 'better-studio' ),
	'id'   => 'linkedin_link',
	'type' => 'text',
);
$fields['linkedin_show_counter'] = array(
	'name' => __( 'Show Followers Count?', 'better-studio' ),
	'id'   => 'linkedin_show_counter',
	'desc' => __( 'Show/hide count in the widgets.', 'better-studio' ),
	'type' => 'switch',
);
$fields['linkedin_count']        = array(
	'name'    => __( 'Fake Followers Count', 'better-studio' ),
	'id'      => 'linkedin_count',
	'desc'    => __( 'Set the fake count if you want.', 'better-studio' ),
	'type'    => 'text',
	'show_on' => array(
		array(
			'linkedin_show_counter=1'
		),
	)
);
$fields[]                        = array(
	'name'  => __( 'Translation', 'better-studio' ),
	'type'  => 'group',
	'state' => 'open',
);
$fields['linkedin_name']         = array(
	'name' => __( 'Name', 'better-studio' ),
	'id'   => 'linkedin_name',
	'type' => 'text',
);
$fields['linkedin_title']        = array(
	'name' => __( 'Text Below The Number', 'better-studio' ),
	'id'   => 'linkedin_title',
	'type' => 'text',
);
$fields['linkedin_title_join']   = array(
	'name' => __( 'Join Text', 'better-studio' ),
	'id'   => 'linkedin_title_join',
	'type' => 'text',
);
$fields['linkedin_button']       = array(
	'name' => __( 'Button Text', 'better-studio' ),
	'id'   => 'linkedin_button',
	'type' => 'text',
);

//
// Pinterest
//
$fields[]                         = array(
	'name' => __( 'Pinterest', 'better-studio' ),
	'id'   => 'pinterest_title',
	'type' => 'tab',
	'icon' => 'bsfi-pinterest'
);
$fields['pinterest_username']     = array(
	'name' => __( 'Pinterest UserName', 'better-studio' ),
	'id'   => 'pinterest_username',
	'type' => 'text',
);
$fields['pinterest_show_counter'] = array(
	'name' => __( 'Show Followers Count?', 'better-studio' ),
	'id'   => 'pinterest_show_counter',
	'desc' => __( 'Show/hide count in the widgets.', 'better-studio' ),
	'type' => 'switch',
);
$fields['pinterest_count']        = array(
	'name'    => __( 'Fake Followers Count', 'better-studio' ),
	'id'      => 'pinterest_count',
	'desc'    => __( 'Set the fake count if you want.', 'better-studio' ),
	'type'    => 'text',
	'show_on' => array(
		array(
			'pinterest_show_counter=1'
		),
	)
);
$fields[]                         = array(
	'name'  => __( 'Pinterest Translation', 'better-studio' ),
	'type'  => 'group',
	'state' => 'open',
);
$fields['pinterest_name']         = array(
	'name' => __( 'Name', 'better-studio' ),
	'id'   => 'pinterest_name',
	'type' => 'text',
);
$fields['pinterest_title']        = array(
	'name' => __( 'Text Below The Number', 'better-studio' ),
	'id'   => 'pinterest_title',
	'type' => 'text',
);
$fields['pinterest_button']       = array(
	'name' => __( 'Button Text', 'better-studio' ),
	'id'   => 'pinterest_button',
	'type' => 'text',
);
$fields['pinterest_title_join']   = array(
	'name' => __( 'Join Text', 'better-studio' ),
	'id'   => 'pinterest_title_join',
	'type' => 'text',
);


//
// Flickr
//
$fields[]                      = array(
	'name' => __( 'Flickr', 'better-studio' ),
	'id'   => 'flickr_title',
	'type' => 'tab',
	'icon' => 'bsfi-flickr'
);
$fields['flickr_group']        = array(
	'name' => __( 'Flickr Group ID', 'better-studio' ),
	'desc' => '<a href="https://goo.gl/NCa6eN" target="_blank">Flickr ID Finder</a>',
	'id'   => 'flickr_group',
	'type' => 'text',
);
$fields['flickr_show_counter'] = array(
	'name' => __( 'Show Followers Count?', 'better-studio' ),
	'id'   => 'flickr_show_counter',
	'desc' => __( 'Show/hide count in the widgets.', 'better-studio' ),
	'type' => 'switch',
);
$fields['flickr_count']        = array(
	'name'    => __( 'Fake Followers Count', 'better-studio' ),
	'id'      => 'flickr_count',
	'desc'    => __( 'Set the fake count if you want.', 'better-studio' ),
	'type'    => 'text',
	'show_on' => array(
		array(
			'flickr_show_counter=1'
		),
	)
);
$fields[]                      = array(
	'name'  => __( 'Flickr Translation', 'better-studio' ),
	'type'  => 'group',
	'state' => 'open',
);
$fields['flickr_title']        = array(
	'name' => __( 'Text Below The Number', 'better-studio' ),
	'id'   => 'flickr_title',
	'type' => 'text',
);
$fields['flickr_name']         = array(
	'name' => __( 'Name', 'better-studio' ),
	'id'   => 'flickr_name',
	'type' => 'text',
);
$fields['flickr_button']       = array(
	'name' => __( 'Button Text', 'better-studio' ),
	'id'   => 'flickr_button',
	'type' => 'text',
);
$fields['flickr_title_join']   = array(
	'name' => __( 'Join Text', 'better-studio' ),
	'id'   => 'flickr_title_join',
	'type' => 'text',
);


//
// Dribbble
//
$fields[]                        = array(
	'name' => __( 'Dribbble', 'better-studio' ),
	'id'   => 'dribbble_tab',
	'type' => 'tab',
	'icon' => 'bsfi-dribbble'
);
$fields['dribbble_username']     = array(
	'name' => __( 'Dribbble UserName', 'better-studio' ),
	'id'   => 'dribbble_username',
	'type' => 'text',
);
$fields['dribbble_show_counter'] = array(
	'name' => __( 'Show Followers Count?', 'better-studio' ),
	'id'   => 'dribbble_show_counter',
	'desc' => __( 'Show/hide count in the widgets.', 'better-studio' ),
	'type' => 'switch',
);
$fields['dribbble_count']        = array(
	'name'    => __( 'Fake Followers Count', 'better-studio' ),
	'id'      => 'dribbble_count',
	'desc'    => __( 'Set the fake count if you want.', 'better-studio' ),
	'type'    => 'text',
	'show_on' => array(
		array(
			'dribbble_show_counter=1'
		),
	)
);
$fields[]                        = array(
	'name'  => __( 'Dribbble Translation', 'better-studio' ),
	'type'  => 'group',
	'state' => 'open',
);
$fields['dribbble_name']         = array(
	'name' => __( 'Name', 'better-studio' ),
	'id'   => 'dribbble_name',
	'type' => 'text',
);
$fields['dribbble_title']        = array(
	'name' => __( 'Text Below The Number', 'better-studio' ),
	'id'   => 'dribbble_title',
	'type' => 'text',
);
$fields['dribbble_button']       = array(
	'name' => __( 'Button Text', 'better-studio' ),
	'id'   => 'dribbble_button',
	'type' => 'text',
);
$fields['dribbble_title_join']   = array(
	'name' => __( 'Join Text', 'better-studio' ),
	'id'   => 'dribbble_title_join',
	'type' => 'text',
);


//
// Vimeo
//
$fields[]                     = array(
	'name' => __( 'Vimeo', 'better-studio' ),
	'id'   => 'vimeo_tab',
	'type' => 'tab',
	'icon' => 'bsfi-vimeo'
);
$fields['vimeo_username']     = array(
	'name' => __( 'Vimeo Username', 'better-studio' ),
	'id'   => 'vimeo_username',
	'type' => 'text',
);
$fields['vimeo_type']         = array(
	'name'    => __( 'Profile or Channel?', 'better-studio' ),
	'id'      => 'vimeo_type',
	'type'    => 'select',
	'options' => array(
		'user'    => __( 'Profile', 'better-studio' ),
		'channel' => __( 'Channel', 'better-studio' ),
	)
);
$fields['vimeo_data']         = array(
	'name'    => __( 'Counts type?', 'better-studio' ),
	'id'      => 'vimeo_data',
	'type'    => 'select',
	'options' => array(
		'followers' => __( 'Followers count', 'better-studio' ),
		'videos'    => __( 'Videos count', 'better-studio' ),
		'total'     => __( 'Followers + Videos count', 'better-studio' ),
	)
);
$fields['vimeo_show_counter'] = array(
	'name' => __( 'Show Subscribers Count?', 'better-studio' ),
	'id'   => 'vimeo_show_counter',
	'desc' => __( 'Show/hide count in the widgets.', 'better-studio' ),
	'type' => 'switch',
);
$fields['vimeo_count']        = array(
	'name'    => __( 'Fake Subscribers Count', 'better-studio' ),
	'id'      => 'vimeo_count',
	'desc'    => __( 'Set the fake count if you want.', 'better-studio' ),
	'type'    => 'text',
	'show_on' => array(
		array(
			'vimeo_show_counter=1'
		),
	)
);
$fields[]                     = array(
	'name'  => __( 'Vimeo Translation', 'better-studio' ),
	'type'  => 'group',
	'state' => 'open',
);
$fields['vimeo_name']         = array(
	'name' => __( 'Name', 'better-studio' ),
	'id'   => 'vimeo_name',
	'type' => 'text',
);
$fields['vimeo_title']        = array(
	'name' => __( 'Text Below The Number', 'better-studio' ),
	'id'   => 'vimeo_title',
	'type' => 'text',
);
$fields['vimeo_button']       = array(
	'name' => __( 'Button Text', 'better-studio' ),
	'id'   => 'vimeo_button',
	'type' => 'text',
);
$fields['vimeo_title_join']   = array(
	'name' => __( 'Join Text', 'better-studio' ),
	'id'   => 'vimeo_title_join',
	'type' => 'text',
);


//
// Delicious
//
$fields[]                         = array(
	'name' => __( 'Delicious', 'better-studio' ),
	'id'   => 'delicious_title',
	'type' => 'tab',
	'icon' => 'bsfi-delicious'
);
$fields['delicious_username']     = array(
	'name' => __( 'Delicious UserName', 'better-studio' ),
	'id'   => 'delicious_username',
	'type' => 'text',
);
$fields['delicious_show_counter'] = array(
	'name' => __( 'Show Followers Count?', 'better-studio' ),
	'id'   => 'delicious_show_counter',
	'desc' => __( 'Show/hide count in the widgets.', 'better-studio' ),
	'type' => 'switch',
);
$fields['delicious_count']        = array(
	'name'    => __( 'Fake Followers Count', 'better-studio' ),
	'id'      => 'delicious_count',
	'desc'    => __( 'Set the fake count if you want.', 'better-studio' ),
	'type'    => 'text',
	'show_on' => array(
		array(
			'delicious_show_counter=1'
		),
	)
);
$fields[]                         = array(
	'name'  => __( 'Delicious Translation', 'better-studio' ),
	'type'  => 'group',
	'state' => 'open',
);
$fields['delicious_name']         = array(
	'name' => __( 'Name', 'better-studio' ),
	'id'   => 'delicious_name',
	'type' => 'text',
);
$fields['delicious_title']        = array(
	'name' => __( 'Text Below The Number', 'better-studio' ),
	'id'   => 'delicious_title',
	'type' => 'text',
);
$fields['delicious_button']       = array(
	'name' => __( 'Button Text', 'better-studio' ),
	'id'   => 'delicious_button',
	'type' => 'text',
);
$fields['delicious_title_join']   = array(
	'name' => __( 'Join Text', 'better-studio' ),
	'id'   => 'delicious_title_join',
	'type' => 'text',
);


//
// SoundCloud
//
$fields[]                          = array(
	'name' => __( 'SoundCloud', 'better-studio' ),
	'id'   => 'soundcloud_title',
	'type' => 'tab',
	'icon' => 'bsfi-soundcloud'
);
$fields[]                          = array(
	'name'          => __( 'SoundCloud Instructions', 'better-studio' ),
	'id'            => 'soundcloud-help',
	'type'          => 'info',
	'std'           => __( '
                                <ul>
                <li>Go To <a href="http://goo.gl/ZYjZhb" target="_blank">Your Applications</a> page.</li>
                <li>Click On "<strong>Register a new application</strong>" Button.</li>
                <li>Enter Your App Name and click on "<strong>Register</strong>".</li>
                <li>Check "<strong>Yes, I have read and accepted the Developer Policies</strong>" and Click on "<strong>Save App</strong>" Button</li>
                <li>Copy the "<strong>Client ID</strong>" and it in "<strong>API Key</strong>" input box.</li>
            </ul>
                                                ', 'better-studio' ),
	'state'         => 'open',
	'info-type'     => 'help',
	'section_class' => 'widefat',
);
$fields['soundcloud_username']     = array(
	'name' => __( 'SoundCloud UserName', 'better-studio' ),
	'id'   => 'soundcloud_username',
	'type' => 'text',
);
$fields['soundcloud_api_key']      = array(
	'name' => __( 'API Key', 'better-studio' ),
	'id'   => 'soundcloud_api_key',
	'type' => 'text',
);
$fields['soundcloud_show_counter'] = array(
	'name' => __( 'Show Followers Count?', 'better-studio' ),
	'id'   => 'soundcloud_show_counter',
	'desc' => __( 'Show/hide count in the widgets.', 'better-studio' ),
	'type' => 'switch',
);
$fields['soundcloud_count']        = array(
	'name'    => __( 'Fake Followers Count', 'better-studio' ),
	'id'      => 'soundcloud_count',
	'desc'    => __( 'Set the fake count if you want.', 'better-studio' ),
	'type'    => 'text',
	'show_on' => array(
		array(
			'soundcloud_show_counter=1'
		),
	)
);
$fields[]                          = array(
	'name'  => __( 'SoundCloud Translation', 'better-studio' ),
	'type'  => 'group',
	'state' => 'open',
);
$fields['soundcloud_name']         = array(
	'name' => __( 'Name', 'better-studio' ),
	'id'   => 'soundcloud_name',
	'type' => 'text',
);
$fields['soundcloud_title']        = array(
	'name' => __( 'Text Below The Number', 'better-studio' ),
	'id'   => 'soundcloud_title',
	'type' => 'text',
);
$fields['soundcloud_button']       = array(
	'name' => __( 'Button Text', 'better-studio' ),
	'id'   => 'soundcloud_button',
	'type' => 'text',
);
$fields['soundcloud_title_join']   = array(
	'name' => __( 'Join Text', 'better-studio' ),
	'id'   => 'soundcloud_title_join',
	'type' => 'text',
);


//
// Github
//
$fields[]                      = array(
	'name' => __( 'Github', 'better-studio' ),
	'id'   => 'github_title',
	'type' => 'tab',
	'icon' => 'bsfi-github'
);
$fields['github_username']     = array(
	'name' => __( 'Github UserName', 'better-studio' ),
	'id'   => 'github_username',
	'type' => 'text',
);
$fields['github_show_counter'] = array(
	'name' => __( 'Show Followers Count?', 'better-studio' ),
	'id'   => 'github_show_counter',
	'desc' => __( 'Show/hide count in the widgets.', 'better-studio' ),
	'type' => 'switch',
);
$fields['github_count']        = array(
	'name'    => __( 'Fake Followers Count', 'better-studio' ),
	'id'      => 'github_count',
	'desc'    => __( 'Set the fake count if you want.', 'better-studio' ),
	'type'    => 'text',
	'show_on' => array(
		array(
			'github_show_counter=1'
		),
	)
);
$fields[]                      = array(
	'name'  => __( 'Github Translation', 'better-studio' ),
	'type'  => 'group',
	'state' => 'open',
);
$fields['github_name']         = array(
	'name' => __( 'Name', 'better-studio' ),
	'id'   => 'github_name',
	'type' => 'text',
);
$fields['github_title']        = array(
	'name' => __( 'Text Below The Number', 'better-studio' ),
	'id'   => 'github_title',
	'type' => 'text',
);
$fields['github_button']       = array(
	'name' => __( 'Button Text', 'better-studio' ),
	'id'   => 'github_button',
	'type' => 'text',
);
$fields['github_title_join']   = array(
	'name' => __( 'Join Text', 'better-studio' ),
	'id'   => 'github_title_join',
	'type' => 'text',
);


//
// Behance
//
$fields[]                       = array(
	'name' => __( 'Behance', 'better-studio' ),
	'id'   => 'behance_title',
	'type' => 'tab',
	'icon' => 'bsfi-behance'
);
$fields['behance_username']     = array(
	'name' => __( 'Behance UserName', 'better-studio' ),
	'id'   => 'behance_username',
	'type' => 'text',
);
$fields['behance_show_counter'] = array(
	'name' => __( 'Show Followers Count?', 'better-studio' ),
	'id'   => 'behance_show_counter',
	'desc' => __( 'Show/hide count in the widgets.', 'better-studio' ),
	'type' => 'switch',
);
$fields['behance_count']        = array(
	'name'    => __( 'Fake Followers Count', 'better-studio' ),
	'id'      => 'behance_count',
	'desc'    => __( 'Set the fake count if you want.', 'better-studio' ),
	'type'    => 'text',
	'show_on' => array(
		array(
			'behance_show_counter=1'
		),
	)
);
$fields[]                       = array(
	'name'  => __( 'Behance Translation', 'better-studio' ),
	'type'  => 'group',
	'state' => 'open',
);
$fields['behance_name']         = array(
	'name' => __( 'Name', 'better-studio' ),
	'id'   => 'behance_name',
	'type' => 'text',
);
$fields['behance_title']        = array(
	'name' => __( 'Text Below The Number', 'better-studio' ),
	'id'   => 'behance_title',
	'type' => 'text',
);
$fields['behance_button']       = array(
	'name' => __( 'Button Text', 'better-studio' ),
	'id'   => 'behance_button',
	'type' => 'text',
);
$fields['behance_title_join']   = array(
	'name' => __( 'Join Text', 'better-studio' ),
	'id'   => 'behance_title_join',
	'type' => 'text',
);


//
// vk
//
$fields[]                  = array(
	'name' => __( 'VK', 'better-studio' ),
	'id'   => 'vk_title',
	'type' => 'tab',
	'icon' => 'bsfi-vk'
);
$fields['vk_username']     = array(
	'name' => __( 'VK Community ID/Name', 'better-studio' ),
	'id'   => 'vk_username',
	'type' => 'text',
);
$fields['vk_show_counter'] = array(
	'name' => __( 'Show Members Count?', 'better-studio' ),
	'id'   => 'vk_show_counter',
	'desc' => __( 'Show/hide count in the widgets.', 'better-studio' ),
	'type' => 'switch',
);
$fields['vk_count']        = array(
	'name'    => __( 'Fake Members Count', 'better-studio' ),
	'id'      => 'vk_count',
	'desc'    => __( 'Set the fake count if you want.', 'better-studio' ),
	'type'    => 'text',
	'show_on' => array(
		array(
			'vk_show_counter=1'
		),
	)
);
$fields[]                  = array(
	'name'  => __( 'VK Translation', 'better-studio' ),
	'type'  => 'group',
	'state' => 'open',
);
$fields['vk_name']         = array(
	'name' => __( 'Name', 'better-studio' ),
	'id'   => 'vk_name',
	'type' => 'text',
);
$fields['vk_title']        = array(
	'name' => __( 'Text Below The Number', 'better-studio' ),
	'id'   => 'vk_title',
	'type' => 'text',
);
$fields['vk_button']       = array(
	'name' => __( 'Button Text', 'better-studio' ),
	'id'   => 'vk_button',
	'type' => 'text',
);
$fields['vk_title_join']   = array(
	'name' => __( 'Join Text', 'better-studio' ),
	'id'   => 'vk_title_join',
	'type' => 'text',
);


// Tumblr
$fields[]                      = array(
	'name'  => __( 'Tumblr', 'better-studio' ),
	'id'    => 'tumblr_tab',
	'type'  => 'tab',
	'icon'  => 'bsfi-tumblr',
	'badge' => array(
		'text'  => __( 'New', 'better-studio' ),
		'color' => '#d54e21'
	),
);
$fields['tumblr_link']         = array(
	'name' => __( 'Blog Link', 'better-studio' ),
	'id'   => 'tumblr_link',
	'type' => 'text',
);
$fields['tumblr_show_counter'] = array(
	'name' => __( 'Show Subscribers Count?', 'better-studio' ),
	'id'   => 'tumblr_show_counter',
	'desc' => __( 'Show/hide count in the widgets.', 'better-studio' ),
	'type' => 'switch',
);
$fields['tumblr_count']        = array(
	'name'    => __( 'Fake Subscribers Count', 'better-studio' ),
	'id'      => 'tumblr_count',
	'desc'    => __( 'Set the fake count if you want.', 'better-studio' ),
	'type'    => 'text',
	'show_on' => array(
		array(
			'tumblr_show_counter=1'
		),
	)
);
$fields[]                      = array(
	'name'  => __( 'Translation', 'better-studio' ),
	'type'  => 'group',
	'state' => 'open',
);
$fields['tumblr_name']         = array(
	'name' => __( 'Name', 'better-studio' ),
	'id'   => 'tumblr_name',
	'type' => 'text',
);
$fields['tumblr_title']        = array(
	'name' => __( 'Text Below The Number', 'better-studio' ),
	'id'   => 'tumblr_title',
	'type' => 'text',
);
$fields['tumblr_title_join']   = array(
	'name' => __( 'Join Text', 'better-studio' ),
	'id'   => 'tumblr_title_join',
	'type' => 'text',
);
$fields['tumblr_button']       = array(
	'name' => __( 'Button Text', 'better-studio' ),
	'id'   => 'tumblr_button',
	'type' => 'text',
);


// ok.ru
$fields[]                     = array(
	'name'  => __( 'ok.ru', 'better-studio' ),
	'id'    => 'ok_ru_tab',
	'type'  => 'tab',
	'icon'  => 'bsfi-ok-ru',
	'badge' => array(
		'text'  => __( 'New', 'better-studio' ),
		'color' => '#d54e21'
	),
);
$fields['ok_ru_link']         = array(
	'name' => __( 'Profile Link', 'better-studio' ),
	'id'   => 'ok_ru_link',
	'type' => 'text',
);
$fields['ok_ru_show_counter'] = array(
	'name' => __( 'Show Subscribers Count?', 'better-studio' ),
	'id'   => 'ok_ru_show_counter',
	'desc' => __( 'Show/hide count in the widgets.', 'better-studio' ),
	'type' => 'switch',
);
$fields['ok_ru_count']        = array(
	'name'    => __( 'Fake Subscribers Count', 'better-studio' ),
	'id'      => 'ok_ru_count',
	'desc'    => __( 'Set the fake count if you want.', 'better-studio' ),
	'type'    => 'text',
	'show_on' => array(
		array(
			'ok_ru_show_counter=1'
		),
	)
);
$fields[]                     = array(
	'name'  => __( 'Translation', 'better-studio' ),
	'type'  => 'group',
	'state' => 'open',
);
$fields['ok_ru_name']         = array(
	'name' => __( 'Name', 'better-studio' ),
	'id'   => 'ok_ru_name',
	'type' => 'text',
);
$fields['ok_ru_title']        = array(
	'name' => __( 'Text Below The Number', 'better-studio' ),
	'id'   => 'ok_ru_title',
	'type' => 'text',
);
$fields['ok_ru_title_join']   = array(
	'name' => __( 'Join Text', 'better-studio' ),
	'id'   => 'ok_ru_title_join',
	'type' => 'text',
);
$fields['ok_ru_button']       = array(
	'name' => __( 'Button Text', 'better-studio' ),
	'id'   => 'ok_ru_button',
	'type' => 'text',
);


//
// Vine
//
$fields[]                    = array(
	'name' => __( 'Vine', 'better-studio' ),
	'id'   => 'vine_title',
	'type' => 'tab',
	'icon' => 'bsfi-vine'
);
$fields['vine_profile']      = array(
	'name' => __( 'Vine Profile URL', 'better-studio' ),
	'id'   => 'vine_profile',
	'type' => 'text',
);
$fields['vine_email']        = array(
	'name' => __( 'Account Email', 'better-studio' ),
	'id'   => 'vine_email',
	'type' => 'text',
);
$fields['vine_pass']         = array(
	'name' => __( 'Account Password', 'better-studio' ),
	'id'   => 'vine_pass',
	'type' => 'text',
);
$fields['vine_show_counter'] = array(
	'name' => __( 'Show Followers Count?', 'better-studio' ),
	'id'   => 'vine_show_counter',
	'desc' => __( 'Show/hide count in the widgets.', 'better-studio' ),
	'type' => 'switch',
);
$fields['vine_count']        = array(
	'name'    => __( 'Fake Followers Count', 'better-studio' ),
	'id'      => 'vine_count',
	'desc'    => __( 'Set the fake count if you want.', 'better-studio' ),
	'type'    => 'text',
	'show_on' => array(
		array(
			'vine_show_counter=1'
		),
	)
);
$fields[]                    = array(
	'name'  => __( 'Vine Translation', 'better-studio' ),
	'type'  => 'group',
	'state' => 'open',
);
$fields['vine_name']         = array(
	'name' => __( 'Name', 'better-studio' ),
	'id'   => 'vine_name',
	'type' => 'text',
);
$fields['vine_title']        = array(
	'name' => __( 'Text Below The Number', 'better-studio' ),
	'id'   => 'vine_title',
	'type' => 'text',
);
$fields['vine_button']       = array(
	'name' => __( 'Button Text', 'better-studio' ),
	'id'   => 'vine_button',
	'type' => 'text',
);
$fields['vine_title_join']   = array(
	'name' => __( 'Join Text', 'better-studio' ),
	'id'   => 'vine_title_join',
	'type' => 'text',
);


//
// Steam
//
$fields[]                     = array(
	'name' => __( 'Steam', 'better-studio' ),
	'id'   => 'steam_title',
	'type' => 'tab',
	'icon' => 'bsfi-steam'
);
$fields['steam_group']        = array(
	'name' => __( 'Steam Group Slug', 'better-studio' ),
	'id'   => 'steam_group',
	'type' => 'text',
);
$fields['steam_show_counter'] = array(
	'name' => __( 'Show Members Count?', 'better-studio' ),
	'id'   => 'steam_show_counter',
	'desc' => __( 'Show/hide count in the widgets.', 'better-studio' ),
	'type' => 'switch',
);
$fields['steam_count']        = array(
	'name'    => __( 'Fake Members Count', 'better-studio' ),
	'id'      => 'steam_count',
	'desc'    => __( 'Set the fake count if you want.', 'better-studio' ),
	'type'    => 'text',
	'show_on' => array(
		array(
			'steam_show_counter=1'
		),
	)
);
$fields[]                     = array(
	'name'  => __( 'Steam Translation', 'better-studio' ),
	'type'  => 'group',
	'state' => 'open',
);
$fields['steam_name']         = array(
	'name' => __( 'Name', 'better-studio' ),
	'id'   => 'steam_name',
	'type' => 'text',
);
$fields['steam_title']        = array(
	'name' => __( 'Text Below The Number', 'better-studio' ),
	'id'   => 'steam_title',
	'type' => 'text',
);
$fields['steam_button']       = array(
	'name' => __( 'Button Text', 'better-studio' ),
	'id'   => 'steam_button',
	'type' => 'text',
);
$fields['steam_title_join']   = array(
	'name' => __( 'Join Text', 'better-studio' ),
	'id'   => 'steam_title_join',
	'type' => 'text',
);


// Forrst
$fields[]                      = array(
	'name' => __( 'Forrst', 'better-studio' ),
	'id'   => 'forrst_title',
	'type' => 'tab',
	'icon' => 'bsfi-forrst'
);
$fields['forrst_username']     = array(
	'name' => __( 'Forrst UserName', 'better-studio' ),
	'id'   => 'forrst_username',
	'type' => 'text',
);
$fields['forrst_show_counter'] = array(
	'name' => __( 'Show Followers Count?', 'better-studio' ),
	'id'   => 'forrst_show_counter',
	'desc' => __( 'Show/hide count in the widgets.', 'better-studio' ),
	'type' => 'switch',
);
$fields['forrst_count']        = array(
	'name'    => __( 'Fake Followers Count', 'better-studio' ),
	'id'      => 'forrst_count',
	'desc'    => __( 'Set the fake count if you want.', 'better-studio' ),
	'type'    => 'text',
	'show_on' => array(
		array(
			'forrst_show_counter=1'
		),
	)
);
$fields[]                      = array(
	'name'  => __( 'Forrst Translation', 'better-studio' ),
	'type'  => 'group',
	'state' => 'open',
);
$fields['forrst_name']         = array(
	'name' => __( 'Name', 'better-studio' ),
	'id'   => 'forrst_name',
	'type' => 'text',
);
$fields['forrst_title']        = array(
	'name' => __( 'Text Below The Number', 'better-studio' ),
	'id'   => 'forrst_title',
	'type' => 'text',
);
$fields['forrst_button']       = array(
	'name' => __( 'Button Text', 'better-studio' ),
	'id'   => 'forrst_button',
	'type' => 'text',
);
$fields['forrst_title_join']   = array(
	'name' => __( 'Join Text', 'better-studio' ),
	'id'   => 'forrst_title_join',
	'type' => 'text',
);


// Mailchimp
$fields[]                         = array(
	'name' => __( 'Mailchimp', 'better-studio' ),
	'id'   => 'mailchimp_title',
	'type' => 'tab',
	'icon' => 'bsfi-mailchimp'
);
$fields[]                         = array(
	'name'          => __( 'Mailchimp Instructions', 'better-studio' ),
	'id'            => 'mailchimp-help',
	'type'          => 'info',
	'std'           => __( '
                                <ul>
                                    <li><a href="http://goo.gl/3qH8A7" target="_blank">How to find Mailchimp list ID</a></li>
                                    <li><a href="http://goo.gl/a834uj" target="_blank">How to find Mailchimp list URL</a></li>
                                    <li><a href="http://goo.gl/G2Bcvd" target="_blank">How to find Mailchimp API Key</a></li>
                                </ul>
                                                                    ', 'better-studio' ),
	'state'         => 'open',
	'info-type'     => 'help',
	'section_class' => 'widefat',
);
$fields['mailchimp_list_id']      = array(
	'name' => __( 'Mailchimp List ID', 'better-studio' ),
	'id'   => 'mailchimp_list_id',
	'type' => 'text',
);
$fields['mailchimp_list_url']     = array(
	'name' => __( 'Mailchimp List URL', 'better-studio' ),
	'id'   => 'mailchimp_list_url',
	'type' => 'text',
);
$fields['mailchimp_api_key']      = array(
	'name' => __( 'Mailchimp API Key', 'better-studio' ),
	'id'   => 'mailchimp_api_key',
	'type' => 'text',
);
$fields['mailchimp_show_counter'] = array(
	'name' => __( 'Show Subscribers Count?', 'better-studio' ),
	'id'   => 'mailchimp_show_counter',
	'desc' => __( 'Show/hide count in the widgets.', 'better-studio' ),
	'type' => 'switch',
);
$fields['mailchimp_count']        = array(
	'name'    => __( 'Fake Subscribers Count', 'better-studio' ),
	'id'      => 'mailchimp_count',
	'desc'    => __( 'Set the fake count if you want.', 'better-studio' ),
	'type'    => 'text',
	'show_on' => array(
		array(
			'mailchimp_show_counter=1'
		),
	)
);
$fields[]                         = array(
	'name'  => __( 'Mailchimp Translation', 'better-studio' ),
	'type'  => 'group',
	'state' => 'open',
);
$fields['mailchimp_name']         = array(
	'name' => __( 'Name', 'better-studio' ),
	'id'   => 'mailchimp_name',
	'type' => 'text',
);
$fields['mailchimp_title']        = array(
	'name' => __( 'Text Below The Number', 'better-studio' ),
	'id'   => 'mailchimp_title',
	'type' => 'text',
);
$fields['mailchimp_button']       = array(
	'name' => __( 'Button Text', 'better-studio' ),
	'id'   => 'mailchimp_button',
	'type' => 'text',
);
$fields['mailchimp_title_join']   = array(
	'name' => __( 'Join Text', 'better-studio' ),
	'id'   => 'mailchimp_title_join',
	'type' => 'text',
);


// Envato
$fields[]                           = array(
	'name' => __( 'Envato', 'better-studio' ),
	'id'   => 'envato_title',
	'type' => 'tab',
	'icon' => 'bsfi-envato'
);
$fields['envato_marketplace']       = array(
	'name'    => __( 'Marketplace', 'better-studio' ),
	'id'      => 'envato_marketplace',
	'type'    => 'select',
	'options' => array(
		'themeforest'  => __( 'ThemeForest', 'better-studio' ),
		'codecanyon'   => __( 'CodeCanyon', 'better-studio' ),
		'graphicriver' => __( 'GraphicRiver', 'better-studio' ),
		'photodune'    => __( 'PhotoDune', 'better-studio' ),
		'videohive'    => __( 'VideoHive', 'better-studio' ),
		'audiojungle'  => __( 'AudioJungle', 'better-studio' ),
		'3docean'      => __( '3dOcean', 'better-studio' ),
		'activeden'    => __( 'ActiveDen', 'better-studio' ),
	)
);
$fields['envato_username']          = array(
	'name' => __( 'Envato User Name', 'better-studio' ),
	'id'   => 'envato_username',
	'type' => 'text',
);
$fields['envato_show_counter']      = array(
	'name' => __( 'Show Followers Count?', 'better-studio' ),
	'id'   => 'envato_show_counter',
	'desc' => __( 'Show/hide count in the widgets.', 'better-studio' ),
	'type' => 'switch',
);
$fields['envato_count']             = array(
	'name'    => __( 'Fake Followers Count', 'better-studio' ),
	'id'      => 'envato_count',
	'desc'    => __( 'Set the fake count if you want.', 'better-studio' ),
	'type'    => 'text',
	'show_on' => array(
		array(
			'envato_show_counter=1'
		),
	)
);
$fields[]                           = array(
	'name'  => __( 'Envato Translation', 'better-studio' ),
	'type'  => 'group',
	'state' => 'open',
);
$fields['envato_themeforest_name']  = array(
	'name'               => __( 'Name', 'better-studio' ),
	'id'                 => 'envato_themeforest_name',
	'type'               => 'text',
	'filter-field'       => 'envato_marketplace',
	'filter-field-value' => 'themeforest',
);
$fields['envato_codecanyont_name']  = array(
	'name'               => __( 'Name', 'better-studio' ),
	'id'                 => 'envato_codecanyon_name',
	'type'               => 'text',
	'filter-field'       => 'envato_marketplace',
	'filter-field-value' => 'codecanyon',
);
$fields['envato_graphicriver_name'] = array(
	'name'               => __( 'Name', 'better-studio' ),
	'id'                 => 'envato_graphicriver_name',
	'type'               => 'text',
	'filter-field'       => 'envato_marketplace',
	'filter-field-value' => 'graphicriver',
);
$fields['envato_photodune_name']    = array(
	'name'               => __( 'Name', 'better-studio' ),
	'id'                 => 'envato_photodune_name',
	'type'               => 'text',
	'filter-field'       => 'envato_marketplace',
	'filter-field-value' => 'photodune',
);
$fields['envato_videohive_name']    = array(
	'name'               => __( 'Name', 'better-studio' ),
	'id'                 => 'envato_videohive_name',
	'type'               => 'text',
	'filter-field'       => 'envato_marketplace',
	'filter-field-value' => 'videohive',
);
$fields['envato_audiojungle_name']  = array(
	'name'               => __( 'Name', 'better-studio' ),
	'id'                 => 'envato_audiojungle_name',
	'type'               => 'text',
	'filter-field'       => 'envato_marketplace',
	'filter-field-value' => 'audiojungle',
);
$fields['envato_3docean_name']      = array(
	'name'               => __( 'Name', 'better-studio' ),
	'id'                 => 'envato_3docean_name',
	'type'               => 'text',
	'filter-field'       => 'envato_marketplace',
	'filter-field-value' => '3docean',
);
$fields['envato_activeden_name']    = array(
	'name'               => __( 'Name', 'better-studio' ),
	'id'                 => 'envato_activeden_name',
	'type'               => 'text',
	'filter-field'       => 'envato_marketplace',
	'filter-field-value' => 'activeden',
);
$fields['envato_title']             = array(
	'name' => __( 'Text Below The Number', 'better-studio' ),
	'id'   => 'envato_title',
	'type' => 'text',
);
$fields['envato_button']            = array(
	'name' => __( 'Button Text', 'better-studio' ),
	'id'   => 'envato_button',
	'type' => 'text',
);
$fields['envato_title_join']        = array(
	'name' => __( 'Join Text', 'better-studio' ),
	'id'   => 'envato_title_join',
	'type' => 'text',
);

// Telegram
$fields[]                        = array(
	'name' => __( 'Telegram', 'better-studio' ),
	'id'   => 'telegram_title',
	'type' => 'tab',
	'icon' => 'bsfi-telegram',
);
$fields['telegram_link']         = array(
	'name' => __( 'Telegram Link', 'better-studio' ),
	'desc' => __( 'Enter Telegram chat link.', 'better-studio' ),
	'id'   => 'telegram_link',
	'type' => 'text',
);
$fields['telegram_show_counter'] = array(
	'name' => __( 'Show Friends/Members Count?', 'better-studio' ),
	'id'   => 'telegram_show_counter',
	'desc' => __( 'Show/hide count in the widgets.', 'better-studio' ),
	'type' => 'switch',
);
$fields['telegram_count']        = array(
	'name'    => __( 'Fake Friends/Members Count', 'better-studio' ),
	'id'      => 'telegram_count',
	'desc'    => __( 'Set the fake count if you want.', 'better-studio' ),
	'type'    => 'text',
	'show_on' => array(
		array(
			'telegram_show_counter=1'
		),
	)
);
$fields[]                        = array(
	'name'  => __( 'Translation', 'better-studio' ),
	'type'  => 'group',
	'state' => 'open',
);
$fields['telegram_name']         = array(
	'name' => __( 'Name', 'better-studio' ),
	'id'   => 'telegram_name',
	'type' => 'text',
);
$fields['telegram_title']        = array(
	'name' => __( 'Text Below The Number', 'better-studio' ),
	'id'   => 'telegram_title',
	'type' => 'text',
);
$fields['telegram_title_join']   = array(
	'name' => __( 'Join Text', 'better-studio' ),
	'id'   => 'telegram_title_join',
	'type' => 'text',
);
$fields['telegram_button']       = array(
	'name' => __( 'Button Text', 'better-studio' ),
	'id'   => 'telegram_button',
	'type' => 'text',
);

// Line
$fields[]                    = array(
	'name' => __( 'Line', 'better-studio' ),
	'id'   => 'line_title',
	'type' => 'tab',
	'icon' => 'bsfi-line',
);
$fields['line_link']         = array(
	'name' => __( 'Line Link', 'better-studio' ),
	'desc' => __( 'Enter Line chat link.', 'better-studio' ),
	'id'   => 'line_link',
	'type' => 'text',
);
$fields['line_show_counter'] = array(
	'name' => __( 'Show Friends Count?', 'better-studio' ),
	'id'   => 'line_show_counter',
	'desc' => __( 'Show/hide count in the widgets.', 'better-studio' ),
	'type' => 'switch',
);
$fields['line_count']        = array(
	'name'    => __( 'Fake Friends Count', 'better-studio' ),
	'id'      => 'line_count',
	'desc'    => __( 'Set the fake count if you want.', 'better-studio' ),
	'type'    => 'text',
	'show_on' => array(
		array(
			'line_show_counter=1'
		),
	)
);
$fields[]                    = array(
	'name'  => __( 'Translation', 'better-studio' ),
	'type'  => 'group',
	'state' => 'open',
);
$fields['line_name']         = array(
	'name' => __( 'Name', 'better-studio' ),
	'id'   => 'line_name',
	'type' => 'text',
);
$fields['line_title']        = array(
	'name' => __( 'Text Below The Number', 'better-studio' ),
	'id'   => 'line_title',
	'type' => 'text',
);
$fields['line_title_join']   = array(
	'name' => __( 'Join Text', 'better-studio' ),
	'id'   => 'line_title_join',
	'type' => 'text',
);
$fields['line_button']       = array(
	'name' => __( 'Button Text', 'better-studio' ),
	'id'   => 'line_button',
	'type' => 'text',
);

// SnapChat
$fields[]                        = array(
	'name'  => __( 'SnapChat', 'better-studio' ),
	'id'    => 'snapchat_title',
	'type'  => 'tab',
	'icon'  => 'bsfi-snapchat',
	'badge' => array(
		'text'  => __( 'New', 'better-studio' ),
		'color' => '#d54e21'
	),
);
$fields['snapchat_link']         = array(
	'name' => __( 'SnapChat Link', 'better-studio' ),
	'desc' => __( 'Enter SnapChat link.', 'better-studio' ),
	'id'   => 'snapchat_link',
	'type' => 'text',
);
$fields['snapchat_show_counter'] = array(
	'name' => __( 'Show Friends Count?', 'better-studio' ),
	'id'   => 'snapchat_show_counter',
	'desc' => __( 'Show/hide count in the widgets.', 'better-studio' ),
	'type' => 'switch',
);
$fields['snapchat_count']        = array(
	'name'    => __( 'Fake Friends Count', 'better-studio' ),
	'id'      => 'snapchat_count',
	'desc'    => __( 'Set the fake count if you want.', 'better-studio' ),
	'type'    => 'text',
	'show_on' => array(
		array(
			'snapchat_show_counter=1'
		),
	)
);
$fields[]                        = array(
	'name'  => __( 'Translation', 'better-studio' ),
	'type'  => 'group',
	'state' => 'open',
);
$fields['snapchat_name']         = array(
	'name' => __( 'Name', 'better-studio' ),
	'id'   => 'snapchat_name',
	'type' => 'text',
);
$fields['snapchat_title']        = array(
	'name' => __( 'Number', 'better-studio' ),
	'id'   => 'snapchat_title',
	'type' => 'text',
);
$fields['snapchat_title_join']   = array(
	'name' => __( 'Join Text', 'better-studio' ),
	'id'   => 'snapchat_title_join',
	'type' => 'text',
);
$fields['snapchat_button']       = array(
	'name' => __( 'Button Text', 'better-studio' ),
	'id'   => 'snapchat_button',
	'type' => 'text',
);

// Viber
$fields[]                     = array(
	'name' => __( 'Viber', 'better-studio' ),
	'id'   => 'viber_title',
	'type' => 'tab',
	'icon' => 'bsfi-viber',
);
$fields['viber_link']         = array(
	'name' => __( 'Viber Link', 'better-studio' ),
	'desc' => __( 'Enter Viber chat link.', 'better-studio' ),
	'id'   => 'viber_link',
	'type' => 'text',
);
$fields['viber_show_counter'] = array(
	'name' => __( 'Show Friends Count?', 'better-studio' ),
	'id'   => 'viber_show_counter',
	'desc' => __( 'Show/hide count in the widgets.', 'better-studio' ),
	'type' => 'switch',
);
$fields['viber_count']        = array(
	'name'    => __( 'Fake Friends Count', 'better-studio' ),
	'id'      => 'viber_count',
	'desc'    => __( 'Set the fake count if you want.', 'better-studio' ),
	'type'    => 'text',
	'show_on' => array(
		array(
			'viber_show_counter=1'
		),
	)
);
$fields[]                     = array(
	'name'  => __( 'Translation', 'better-studio' ),
	'type'  => 'group',
	'state' => 'open',
);
$fields['viber_name']         = array(
	'name' => __( 'Name', 'better-studio' ),
	'id'   => 'viber_name',
	'type' => 'text',
);
$fields['viber_title']        = array(
	'name' => __( 'Text Below The Number', 'better-studio' ),
	'id'   => 'viber_title',
	'type' => 'text',
);
$fields['viber_title_join']   = array(
	'name' => __( 'Join Text', 'better-studio' ),
	'id'   => 'viber_title_join',
	'type' => 'text',
);
$fields['viber_button']       = array(
	'name' => __( 'Button Text', 'better-studio' ),
	'id'   => 'viber_button',
	'type' => 'text',
);

// BBM
$fields[]                   = array(
	'name' => __( 'BBM', 'better-studio' ),
	'id'   => 'BBM_title',
	'type' => 'tab',
	'icon' => 'bsfi-bbm',
);
$fields['bbm_link']         = array(
	'name' => __( 'BBM Link', 'better-studio' ),
	'desc' => __( 'Enter BBM chat link.', 'better-studio' ),
	'id'   => 'bbm_link',
	'type' => 'text',
);
$fields['bbm_show_counter'] = array(
	'name' => __( 'Show Friends Count?', 'better-studio' ),
	'id'   => 'bbm_show_counter',
	'desc' => __( 'Show/hide count in the widgets.', 'better-studio' ),
	'type' => 'switch',
);
$fields['bbm_count']        = array(
	'name'    => __( 'Fake Friends Count', 'better-studio' ),
	'id'      => 'bbm_count',
	'desc'    => __( 'Set the fake count if you want.', 'better-studio' ),
	'type'    => 'text',
	'show_on' => array(
		array(
			'bbm_show_counter=1'
		),
	)
);
$fields[]                   = array(
	'name'  => __( 'Translation', 'better-studio' ),
	'type'  => 'group',
	'state' => 'open',
);
$fields['bbm_name']         = array(
	'name' => __( 'Name', 'better-studio' ),
	'id'   => 'bbm_name',
	'type' => 'text',
);
$fields['bbm_title']        = array(
	'name' => __( 'Text Below The Number', 'better-studio' ),
	'id'   => 'bbm_title',
	'type' => 'text',
);
$fields['bbm_title_join']   = array(
	'name' => __( 'Join Text', 'better-studio' ),
	'id'   => 'bbm_title_join',
	'type' => 'text',
);
$fields['bbm_button']       = array(
	'name' => __( 'Button Text', 'better-studio' ),
	'id'   => 'bbm_button',
	'type' => 'text',
);


// Apple
$fields[]                        = array(
	'name' => __( 'Apple Store', 'better-studio' ),
	'id'   => 'appstore_title',
	'type' => 'tab',
	'icon' => 'bsfi-apple',
);
$fields['appstore_link']         = array(
	'name' => __( 'AppStore Link', 'better-studio' ),
	'desc' => __( 'Enter Apple Store link.', 'better-studio' ),
	'id'   => 'appstore_link',
	'type' => 'text',
);
$fields['appstore_show_counter'] = array(
	'name' => __( 'Show Downloads Count?', 'better-studio' ),
	'id'   => 'appstore_show_counter',
	'desc' => __( 'Show/hide count in the widgets.', 'better-studio' ),
	'type' => 'switch',
);
$fields['appstore_count']        = array(
	'name'    => __( 'Fake Downloads Count', 'better-studio' ),
	'id'      => 'appstore_count',
	'desc'    => __( 'Set the fake count if you want.', 'better-studio' ),
	'type'    => 'text',
	'show_on' => array(
		array(
			'appstore_show_counter=1'
		),
	)
);
$fields[]                        = array(
	'name'  => __( 'Translation', 'better-studio' ),
	'type'  => 'group',
	'state' => 'open',
);
$fields['appstore_name']         = array(
	'name' => __( 'Name', 'better-studio' ),
	'id'   => 'appstore_name',
	'type' => 'text',
);
$fields['appstore_title']        = array(
	'name' => __( 'Text Below The Number', 'better-studio' ),
	'id'   => 'appstore_title',
	'type' => 'text',
);
$fields['appstore_title_join']   = array(
	'name' => __( 'Join Text', 'better-studio' ),
	'id'   => 'appstore_title_join',
	'type' => 'text',
);
$fields['appstore_button']       = array(
	'name' => __( 'Button Text', 'better-studio' ),
	'id'   => 'appstore_button',
	'type' => 'text',
);


// Android
$fields[]                       = array(
	'name' => __( 'Google Play', 'better-studio' ),
	'id'   => 'android_title',
	'type' => 'tab',
	'icon' => 'bsfi-android',
);
$fields['android_link']         = array(
	'name' => __( 'Google Play App Link', 'better-studio' ),
	'desc' => __( 'Enter Google Play App link.', 'better-studio' ),
	'id'   => 'android_link',
	'type' => 'text',
);
$fields['android_show_counter'] = array(
	'name' => __( 'Show Downloads Count?', 'better-studio' ),
	'id'   => 'android_show_counter',
	'desc' => __( 'Show/hide count in the widgets.', 'better-studio' ),
	'type' => 'switch',
);
$fields['android_count']        = array(
	'name'    => __( 'Fake Downloads Count', 'better-studio' ),
	'id'      => 'android_count',
	'desc'    => __( 'Set the fake count if you want.', 'better-studio' ),
	'type'    => 'text',
	'show_on' => array(
		array(
			'android_show_counter=1'
		),
	)
);
$fields[]                       = array(
	'name'  => __( 'Translation', 'better-studio' ),
	'type'  => 'group',
	'state' => 'open',
);
$fields['android_name']         = array(
	'name' => __( 'Name', 'better-studio' ),
	'id'   => 'android_name',
	'type' => 'text',
);
$fields['android_title']        = array(
	'name' => __( 'Text Below The Number', 'better-studio' ),
	'id'   => 'android_title',
	'type' => 'text',
);
$fields['android_title_join']   = array(
	'name' => __( 'Join Text', 'better-studio' ),
	'id'   => 'android_title_join',
	'type' => 'text',
);
$fields['android_button']       = array(
	'name' => __( 'Button Text', 'better-studio' ),
	'id'   => 'android_button',
	'type' => 'text',
);


// RSS
$fields[]                    = array(
	'name'       => __( 'RSS', 'better-studio' ),
	'id'         => 'rss_title',
	'type'       => 'tab',
	'icon'       => 'bsfi-rss',
	'margin-top' => '10',
);
$fields['rss_type']          = array(
	'name'    => __( 'RSS Type', 'better-studio' ),
	'id'      => 'rss_type',
	'type'    => 'select',
	'options' => array(
		'wp'          => __( 'Site RSS link - site.com/rss', 'better-studio' ),
		'category'    => __( 'Category RSS link', 'better-studio' ),
		'custom_link' => __( 'Custom RSS link', 'better-studio' ),
	)
);
$fields['rss_type_category'] = array(
	'name'    => __( 'Category RSS', 'better-studio' ),
	'desc'    => __( 'Select a category that you want to show it\'s category in widgets. ', 'better-studio' ),
	'id'      => 'rss_type_category',
	'type'    => 'select',
	'options' => array(
		'' => __( '-- Auto Detect --', 'better-studio' ),
		array(
			'label'   => __( 'Categories', 'better-studio' ),
			'options' => array( 'category_walker' => 'category_walker' ),
		),
	),
	'show_on' => array(
		array( 'rss_type=category' )
	),
);
$fields['rss_type_custom']   = array(
	'name'    => __( 'Custom RSS link', 'better-studio' ),
	'desc'    => __( 'Enter your custom link for RSS', 'better-studio' ),
	'id'      => 'rss_type_custom',
	'type'    => 'text',
	'show_on' => array(
		array( 'rss_type=custom_link' )
	),
);
$fields['rss_show_counter']  = array(
	'name' => __( 'Show Subscribers Count?', 'better-studio' ),
	'id'   => 'rss_show_counter',
	'desc' => __( 'Show/hide count in the widgets.', 'better-studio' ),
	'type' => 'switch',
);
$fields['rss_count']         = array(
	'name'    => __( 'Fake Subscribers Count', 'better-studio' ),
	'id'      => 'rss_count',
	'desc'    => __( 'Set the fake count if you want.', 'better-studio' ),
	'type'    => 'text',
	'show_on' => array(
		array(
			'rss_show_counter=1'
		),
	)
);
$fields[]                    = array(
	'name'  => __( 'Translation', 'better-studio' ),
	'type'  => 'group',
	'state' => 'open',
);
$fields['rss_name']          = array(
	'name' => __( 'Name', 'better-studio' ),
	'id'   => 'rss_name',
	'type' => 'text',
);
$fields['rss_title']         = array(
	'name' => __( 'Text Below The Number', 'better-studio' ),
	'id'   => 'rss_title',
	'type' => 'text',
);
$fields['rss_title_join']    = array(
	'name' => __( 'Join Text', 'better-studio' ),
	'id'   => 'rss_title_join',
	'type' => 'text',
);
$fields['rss_button']        = array(
	'name' => __( 'Button Text', 'better-studio' ),
	'id'   => 'rss_button',
	'type' => 'text',
);


// Posts
$fields[]                   = array(
	'name' => __( 'Posts', 'better-studio' ),
	'id'   => 'posts_title',
	'type' => 'tab',
	'icon' => 'bsfi-posts',
);
$fields['posts_enabled']    = array(
	'name'      => __( 'Show Posts Count?', 'better-studio' ),
	'id'        => 'posts_enabled',
	'type'      => 'switch',
	'on-label'  => __( 'Show', 'better-studio' ),
	'off-label' => __( 'Hide', 'better-studio' ),
);
$fields['posts_count']      = array(
	'name'    => __( 'Fake Posts Count', 'better-studio' ),
	'id'      => 'posts_count',
	'desc'    => __( 'Set the fake count if you want.', 'better-studio' ),
	'type'    => 'text',
	'show_on' => array(
		array(
			'posts_enabled=1'
		),
	)
);
$fields[]                   = array(
	'name'  => __( 'Translation', 'better-studio' ),
	'type'  => 'group',
	'state' => 'open',
);
$fields['posts_name']       = array(
	'name' => __( 'Name', 'better-studio' ),
	'id'   => 'posts_name',
	'type' => 'text',
);
$fields['posts_title']      = array(
	'name' => __( 'Text Below The Number', 'better-studio' ),
	'id'   => 'posts_title',
	'type' => 'text',
);
$fields['posts_title_join'] = array(
	'name' => __( 'Join Text', 'better-studio' ),
	'id'   => 'posts_title_join',
	'type' => 'text',
);


// Comments
$fields[]                      = array(
	'name' => __( 'Comments', 'better-studio' ),
	'id'   => 'comments_title',
	'type' => 'tab',
	'icon' => 'bsfi-comments',
);
$fields['comments_enabled']    = array(
	'name'      => __( 'Show Comments Count?', 'better-studio' ),
	'id'        => 'comments_enabled',
	'type'      => 'switch',
	'on-label'  => __( 'Show', 'better-studio' ),
	'off-label' => __( 'Hide', 'better-studio' ),
);
$fields['comments_count']      = array(
	'name'    => __( 'Fake Comments Count', 'better-studio' ),
	'id'      => 'comments_count',
	'desc'    => __( 'Set the fake count if you want.', 'better-studio' ),
	'type'    => 'text',
	'show_on' => array(
		array(
			'comments_enabled=1'
		),
	)
);
$fields[]                      = array(
	'name'  => __( 'Translation', 'better-studio' ),
	'type'  => 'group',
	'state' => 'open',
);
$fields['comments_name']       = array(
	'name' => __( 'Name', 'better-studio' ),
	'id'   => 'comments_name',
	'type' => 'text',
);
$fields['comments_title']      = array(
	'name' => __( 'Text Below The Number', 'better-studio' ),
	'id'   => 'comments_title',
	'type' => 'text',
);
$fields['comments_title_join'] = array(
	'name' => __( 'Join Text', 'better-studio' ),
	'id'   => 'comments_title_join',
	'type' => 'text',
);


// Members
$fields[]                     = array(
	'name' => __( 'Members', 'better-studio' ),
	'id'   => 'members_title',
	'type' => 'tab',
	'icon' => 'bsfi-members',
);
$fields['members_enabled']    = array(
	'name'      => __( 'Show Members Count?', 'better-studio' ),
	'id'        => 'members_enabled',
	'type'      => 'switch',
	'on-label'  => __( 'Show', 'better-studio' ),
	'off-label' => __( 'Hide', 'better-studio' ),
);
$fields['members_count']      = array(
	'name'    => __( 'Fake Members Count', 'better-studio' ),
	'id'      => 'members_count',
	'desc'    => __( 'Set the fake count if you want.', 'better-studio' ),
	'type'    => 'text',
	'show_on' => array(
		array(
			'members_enabled=1'
		),
	)
);
$fields[]                     = array(
	'name'  => __( 'Translation', 'better-studio' ),
	'type'  => 'group',
	'state' => 'open',
);
$fields['members_title']      = array(
	'name' => __( 'Name', 'better-studio' ),
	'id'   => 'members_name',
	'type' => 'text',
);
$fields['members_title']      = array(
	'name' => __( 'Text Below The Number', 'better-studio' ),
	'id'   => 'members_title',
	'type' => 'text',
);
$fields['members_title_join'] = array(
	'name' => __( 'Join Text', 'better-studio' ),
	'id'   => 'members_title_join',
	'type' => 'text',
);


//
// Typography
//
$fields[] = array(
	'name'       => __( 'Typography', 'better-studio' ),
	'id'         => 'typography',
	'type'       => 'tab',
	'icon'       => 'bsai-typography',
	'margin-top' => '20',
);

$fields[]                       = array(
	'name'        => __( 'Reset Typography settings', 'better-studio' ),
	'id'          => 'reset_typo_settings',
	'type'        => 'ajax_action',
	'button-name' => '<i class="fa fa-refresh"></i> ' . __( 'Reset Typography', 'better-studio' ),
	'callback'    => 'Better_Social_Counter::reset_typography_options',
	'confirm'     => __( 'Are you sure for resetting typography?', 'better-studio' ),
	'desc'        => __( 'This allows you to reset all typography fields to default.', 'better-studio' )
);
$fields[]                       = array(
	'name'  => __( 'Social Counter Typography', 'better-studio' ),
	'type'  => 'group',
	'state' => 'close',
);
$fields['typo_title']           = array(
	'name'        => __( 'Followers Title', 'better-studio' ),
	'id'          => 'typo_title',
	'type'        => 'typography',
	'desc'        => __( 'You can change typography of sites follow texts with this option.', 'better-studio' ),
	'preview'     => true,
	'preview_tab' => 'title',
	'reset-typo'  => true, // to reset in panel
);
$fields['typo_count']           = array(
	'name'        => __( 'Follower Counts Number', 'better-studio' ),
	'id'          => 'typo_count',
	'type'        => 'typography',
	'desc'        => __( 'You can change typography of sites followers count text with this option.', 'better-studio' ),
	'preview'     => true,
	'preview_tab' => 'title',
	'reset-typo'  => true, // to reset in panel
);
$fields['typo_item_name']       = array(
	'name'        => __( 'Site Title', 'better-studio' ),
	'id'          => 'typo_item_name',
	'type'        => 'typography',
	'desc'        => __( 'You can change typography of sites title text with this option.', 'better-studio' ),
	'preview'     => true,
	'preview_tab' => 'title',
	'reset-typo'  => true, // to reset in panel
);
$fields['typo_item_title_join'] = array(
	'name'        => __( 'Site Title Join', 'better-studio' ),
	'id'          => 'typo_item_title_join',
	'type'        => 'typography',
	'desc'        => __( 'You can change typography of sites followers count text with this option.', 'better-studio' ),
	'preview'     => true,
	'preview_tab' => 'title',
	'reset-typo'  => true, // to reset in panel
);


$fields[]                            = array(
	'name'  => __( 'Social Banner Typography', 'better-studio' ),
	'type'  => 'group',
	'state' => 'close',
);
$fields['social_banner_typo_count']  = array(
	'name'        => __( 'Followers Count', 'better-studio' ),
	'id'          => 'social_banner_typo_count',
	'type'        => 'typography',
	'preview'     => true,
	'preview_tab' => 'title',
	'reset-typo'  => true, // to reset in panel
);
$fields['social_banner_typo_title']  = array(
	'name'        => __( 'Followers Title', 'better-studio' ),
	'id'          => 'social_banner_typo_title',
	'type'        => 'typography',
	'preview'     => true,
	'preview_tab' => 'title',
	'reset-typo'  => true, // to reset in panel
);
$fields['social_banner_typo_button'] = array(
	'name'        => __( 'Follow Button', 'better-studio' ),
	'id'          => 'social_banner_typo_button',
	'type'        => 'typography',
	'preview'     => true,
	'preview_tab' => 'title',
	'reset-typo'  => true, // to reset in panel
);


//
// Caching Options
//
$fields[]             = array(
	'name' => __( 'Caching Options', 'better-studio' ),
	'id'   => 'cache_options_title',
	'type' => 'tab',
	'icon' => 'bsai-database',
);
$fields['cache_time'] = array(
	'name'    => __( 'Maximum Lifetime of Cache', 'better-studio' ),
	'id'      => 'cache_time',
	'type'    => 'select',
	'options' => array(
		1  => __( '1 hours', 'better-studio' ),
		2  => __( '2 hours', 'better-studio' ),
		3  => __( '3 hours', 'better-studio' ),
		4  => __( '4 hours', 'better-studio' ),
		5  => __( '5 hours', 'better-studio' ),
		6  => __( '6 hours', 'better-studio' ),
		7  => __( '7 hours', 'better-studio' ),
		8  => __( '8 hours', 'better-studio' ),
		9  => __( '9 hours', 'better-studio' ),
		10 => __( '10 hours', 'better-studio' ),
		11 => __( '11 hours', 'better-studio' ),
		12 => __( '12 hours', 'better-studio' ),
		13 => __( '13 hours', 'better-studio' ),
		14 => __( '14 hours', 'better-studio' ),
		15 => __( '15 hours', 'better-studio' ),
		16 => __( '16 hours', 'better-studio' ),
		17 => __( '17 hours', 'better-studio' ),
		18 => __( '18 hours', 'better-studio' ),
		19 => __( '19 hours', 'better-studio' ),
		20 => __( '20 hours', 'better-studio' ),
		21 => __( '21 hours', 'better-studio' ),
		22 => __( '22 hours', 'better-studio' ),
		23 => __( '23 hours', 'better-studio' ),
		24 => __( '24 hours', 'better-studio' ),

	)
);
$fields[]             = array(
	'name'        => __( 'Clear Data Base Saved Caches', 'better-studio' ),
	'id'          => 'cache_clear_all',
	'type'        => 'ajax_action',
	'button-name' => '<i class="fa fa-refresh"></i> ' . __( 'Clear All Caches', 'better-studio' ),
	'callback'    => 'Better_Social_Counter::clear_cache_all',
	'confirm'     => __( 'Are you sure for deleting all caches?', 'better-studio' ),
	'desc'        => __( 'This allows you to clear all caches that are saved in data base.', 'better-studio' )
);


//
// Backup & Restore
//
$fields[] = array(
	'name'       => __( 'Backup & Restore', 'better-studio' ),
	'id'         => 'backup_restore',
	'type'       => 'tab',
	'icon'       => 'bsai-export-import',
	'margin-top' => '30',
);
$fields[] = array(
	'name'      => __( 'Backup / Export', 'better-studio' ),
	'id'        => 'backup_export_options',
	'type'      => 'export',
	'file_name' => 'better-social-counter-options-backup',
	'panel_id'  => Better_Social_Counter::$panel_id,
	'desc'      => __( 'This allows you to create a backup of your options and settings. Please note, it will not backup anything else.', 'better-studio' )
);
$fields[] = array(
	'name'     => __( 'Restore / Import', 'better-studio' ),
	'id'       => 'import_restore_options',
	'type'     => 'import',
	'panel_id' => Better_Social_Counter::$panel_id,
	'desc'     => __( '<strong>It will override your current settings!</strong> Please make sure to select a valid backup file.', 'better-studio' )
);
