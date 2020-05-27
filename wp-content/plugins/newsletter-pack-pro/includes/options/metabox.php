<?php


add_filter( 'better-framework/metabox/add', 'bsnp_metabox_add', 100 );

if ( ! function_exists( 'bsnp_metabox_add' ) ) {
	/**
	 * Adds metabox to BF
	 *
	 * @param  array $metabox
	 *
	 * @since 1.0
	 *
	 * @return array
	 */
	function bsnp_metabox_add( $metabox ) {

		$metabox['bsnp_newsletter_post_settings'] = array(
			'panel-id' => BS_Newsletter_Pack_Pro::$panel_id,
		);

		$metabox['bsnp_newsletter_settings'] = array(
			'panel-id' => BS_Newsletter_Pack_Pro::$panel_id,
		);

		$metabox['bsnp_newsletter_style'] = array(
			'panel-id' => BS_Newsletter_Pack_Pro::$panel_id,
		);

		return $metabox;
	}
}


add_filter( 'better-framework/metabox/bsnp_newsletter_settings/config', 'bsnp_metabox_newsletter_settings_config', 10 );

if ( ! function_exists( 'bsnp_metabox_newsletter_settings_config' ) ) {
	/**
	 * Configs custom metaboxe
	 *
	 * @param $config
	 *
	 * @since 1.0
	 *
	 * @return array
	 */
	function bsnp_metabox_newsletter_settings_config( $config ) {

		return array(
			'title'    => __( 'Configuration', 'better-studio' ),
			'pages'    => array( 'bsnp-newsletter' ),
			'context'  => 'normal',
			'prefix'   => false,
			'priority' => 'high'
		);

	} // bsnp_metabox_newsletter_config
} // if


add_filter( 'better-framework/metabox/bsnp_newsletter_settings/std', 'bsnp_metabox_newsletter_settings_std', 10 );

if ( ! function_exists( 'bsnp_metabox_newsletter_settings_std' ) ) {
	/**
	 * Configs metabox STD's
	 *
	 * @param $fields
	 *
	 * @return array
	 */
	function bsnp_metabox_newsletter_settings_std( $fields ) {

		$fields['type']            = array(
			'std' => 'mailchimp',
		);
		$fields['mailchimp_code']  = array(
			'std' => '',
		);
		$fields['aweber_code']     = array(
			'std' => '',
		);
		$fields['feedburner_id']   = array(
			'std' => '',
		);
		$fields['mailerlite_code'] = array(
			'std' => '',
		);

		return $fields;
	}
}


add_filter( 'better-framework/metabox/bsnp_newsletter_settings/fields', 'bsnp_metabox_newsletter_settings_fields', 10 );

if ( ! function_exists( 'bsnp_metabox_newsletter_settings_fields' ) ) {
	/**
	 * Configs metabox fields
	 *
	 * @param $fields
	 *
	 * @since 1.0
	 *
	 * @return array
	 */
	function bsnp_metabox_newsletter_settings_fields( $fields ) {

		$fields['type'] = array(
			'name'          => __( 'Newsletter Provider', 'better-studio' ),
			'desc'          => __( 'Chose the Newsletter service provider that you are using.', 'better-studio' ),
			'id'            => 'type',
			'type'          => 'image_radio',
			'section_class' => 'style-floated-left bordered bam-image_format',
			'options'       => array(
				'mailchimp'  => array(
					'img'   => BS_Newsletter_Pack_Pro::dir_url( '/images/options/type-mailchimp.png?v=' . BS_Newsletter_Pack_Pro::get_version() ),
					'label' => __( 'Mailchimp', 'better-studio' ),
				),
				'aweber'     => array(
					'img'   => BS_Newsletter_Pack_Pro::dir_url( '/images/options/type-aweber.png?v=' . BS_Newsletter_Pack_Pro::get_version() ),
					'label' => __( 'AWeber', 'better-studio' ),
				),
				'mailerlite' => array(
					'img'   => BS_Newsletter_Pack_Pro::dir_url( '/images/options/type-mailerlite.png?v=' . BS_Newsletter_Pack_Pro::get_version() ),
					'label' => __( 'Mailer Lite', 'better-studio' ),
				),
				'feedburner' => array(
					'img'   => BS_Newsletter_Pack_Pro::dir_url( '/images/options/type-feedburner.png?v=' . BS_Newsletter_Pack_Pro::get_version() ),
					'label' => __( 'Feedburner', 'better-studio' ),
				),
			),
		);


		//
		// Mailchimp
		//
		{
			$fields['mailchimp_help'] = array(
				'name'      => __( 'MailChimp Instructions', 'better-studio' ),
				'std'       => sprintf(
					__( '<p>To integrate MailChimp with your Newsletter Pack, you will need MailChimp signup form code that you can find it with following steps:</p>
<ol>
    <li><a href="%s" target="_blank">Log in</a> to your MailChimp account.</li>
    <li>From your account Dashboard, click <strong>Lists</strong> in the navigation menu.</li>
    <li>Find the list you want to connect to your site, click on it.</li>
    <li>Find the "<strong>Sign up forms</strong>" from the list navigation, click on it.</li>
    <li>Click "<strong>Select</strong>" on the "<strong>Embedded</strong>" forms option.</li>
    <li>Find the "<strong>Copy/paste onto your site</strong>" section.</li>
    <li>Click anywhere in the box to select the code.</li>
    <li>Press "<strong>ctrl + C</strong>" on a PC or "<strong>command + C</strong>" on a Mac to copy the code.</li>
    <li>Paste it in following "<strong>MailChimp Form Code</strong>" field.</li>
</ol>
			                ',
						'better-studio' )
					,
					'https://goo.gl/MU6UWn'
				),
				'id'        => 'mailchimp_help',
				'type'      => 'info',
				'state'     => 'open',
				'info-type' => 'help',
				'show_on'   => array(
					array(
						'type=mailchimp',
					)
				)
			);

			$fields['mailchimp_code'] = array(
				'name'    => __( 'MailChimp Form Code', 'better-studio' ),
				'desc'    => __( 'Read previous instruction for finding MailChimp form code.', 'better-studio' ),
				'id'      => 'mailchimp_code',
				'type'    => 'textarea',
				'show_on' => array(
					array(
						'type=mailchimp',
					),
				),
			);
		}


		//
		// AWeber
		//
		{
			$fields['aweber_help'] = array(
				'name'      => __( 'Aweber Instructions', 'better-studio' ),
				'std'       => sprintf(
					__( '<p>To integrate AWeber with Newsletter Pack, you need AWeber signup form code that you can find it with following steps:</p>
<ol>
    <li><a href="%s" target="_blank">Log in</a> to your AWeber account.</li>
    <li>From your account Dashboard, click <strong>Sign Up Forms</strong> in the navigation menu.</li>
    <li>Find the "<strong>Create a Sign Up Form</strong>" from the right and top section, click on it.</li>
    <li>Click "<strong>Select</strong>" on the "<strong>Embedded</strong>" forms option.</li>
    <li>Don\'t the settings and click on the "<strong>Go To Step 2</strong>" button in bottom of page.</li>
    <li>Enter a name for your newsletter sign up form and click on "<strong>Go To Step 3</strong>" button in bottom of page.</li>
    <li>Click on "<strong>Save Your Form</strong>" button to create the sign up form.</li>
    <li>Click on "<strong>I will Install My Form</strong>" button and click on the "<strong>Raw HTML Version</strong>" in the opened tab.</li>
    <li>Copy the full sign up form code.</li>
    <li>Paste it in following "<strong>AWeber Raw HTML Code</strong>" field.</li>
</ol>
			                ',
						'better-studio' )
					,
					'https://goo.gl/sjnBr2'
				),
				'id'        => 'aweber_help',
				'type'      => 'info',
				'state'     => 'open',
				'info-type' => 'help',
				'show_on'   => array(
					array(
						'type=aweber',
					)
				)
			);

			$fields['aweber_code'] = array(
				'name'    => __( 'AWeber Raw HTML Code', 'better-studio' ),
				'desc'    => __( 'Read previous instruction for finding AWeber code.', 'better-studio' ),
				'id'      => 'aweber_code',
				'type'    => 'textarea',
				'show_on' => array(
					array(
						'type=aweber',
					),
				),
			);
		}


		//
		// Mailer Lite
		//
		{
			$fields['mailerlite_help'] = array(
				'name'      => __( 'Mailer Lite Instructions', 'better-studio' ),
				'std'       => sprintf(
					__( '<p>To integrate Mailer Lite with Newsletter Pack, you need Mailer Lite signup form code that you can find it with following steps:</p>
							<ol>
							    <li><a href="%s" target="_blank">Log in</a> to your Mailer Lite account.</li>
							    <li>From your account Dashboard, click <strong>Forms</strong> in the navigation menu.</li>
							    <li>Find the "<strong>Create Popup</strong>" from the right and top section, click on the down arrow icon and select the "<strong>Create Embedded Form</strong>".</li>
							    <li>Enter a name for sign up and click on "<strong>Save and continue</strong>".</li>
							    <li>In the opened page select on "<strong>Create Embed Form</strong>" button.</li>
							    <li>In the opened page select the "<strong>Subscriber groups</strong>" adn click on "<strong>Save and continue</strong>" button.</li>
							    <li>Keep the newsletter form the default data and click on "<strong>Save</strong>" button.</li>
							    <li>Your sign up form was created but you have to find the html code, Find the "Embed form into your website" and select on the "<strong>HTML</strong>" and copy code to your clipboard.</li>
							    <li>Don\'t the settings and click on the "<strong>Go To Step 2</strong>" button in bottom of page.</li>
							    <li>Paste it in following "<strong>Mailer Lite Raw HTML Code</strong>" field.</li>
							</ol>
			                ',
						'better-studio' )
					,
					'https://goo.gl/Vk8LeK'
				),
				'id'        => 'mailerlite_help',
				'type'      => 'info',
				'state'     => 'open',
				'info-type' => 'help',
				'show_on'   => array(
					array(
						'type=mailerlite',
					)
				)
			);

			$fields['mailerlite_code'] = array(
				'name'    => __( 'Mailer Lite Raw HTML Code', 'better-studio' ),
				'desc'    => __( 'Read previous instruction for finding Mailer Lite code.', 'better-studio' ),
				'id'      => 'mailerlite_code',
				'type'    => 'textarea',
				'show_on' => array(
					array(
						'type=mailerlite',
					),
				),
			);
		}


		//
		// Feedburber
		//
		{
			$fields['feedburner_id'] = array(
				'name'    => __( 'Feedburner ID', 'better-studio' ),
				'desc'    => __( 'Enter Feedburner ID.', 'better-studio' ),
				'id'      => 'feedburner_id',
				'type'    => 'text',
				'show_on' => array(
					array(
						'type=feedburner',
					),
				),
			);
		}


		return $fields;
	}
}


add_filter( 'better-framework/metabox/bsnp_newsletter_style/config', 'bsnp_metabox_newsletter_style_config', 10 );

if ( ! function_exists( 'bsnp_metabox_newsletter_style_config' ) ) {
	/**
	 * Configs custom metaboxe
	 *
	 * @param $config
	 *
	 * @since 1.0
	 *
	 * @return array
	 */
	function bsnp_metabox_newsletter_style_config( $config ) {

		return array(
			'title'    => __( 'Style & Layout', 'better-studio' ),
			'pages'    => array( 'bsnp-newsletter' ),
			'context'  => 'normal',
			'prefix'   => false,
			'priority' => 'high'
		);

	} // bsnp_metabox_newsletter_style_config
} // if


add_filter( 'better-framework/metabox/bsnp_newsletter_style/std', 'bsnp_metabox_newsletter_style_std', 10 );

if ( ! function_exists( 'bsnp_metabox_newsletter_style_std' ) ) {
	/**
	 * Configs metaboxe STD's
	 *
	 * @param $fields
	 *
	 * @since 1.0
	 *
	 * @return array
	 */
	function bsnp_metabox_newsletter_style_std( $fields ) {

		/**
		 * Style
		 */
		$fields['style'] = array(
			'std' => 'style-1',
		);
		$fields['color'] = array(
			'std' => '',
		);


		/**
		 * Texts
		 */
		$fields['text_title']  = array(
			'std' => 'Subscribe to our newsletter',
		);
		$fields['text_desc']   = array(
			'std' => 'Sign up here to get the latest news, updates and special offers delivered directly to your inbox.',
		);
		$fields['text_input']  = array(
			'std' => 'Enter your email address',
		);
		$fields['text_button'] = array(
			'std' => 'Subscribe',
		);
		$fields['text_after']  = array(
			'std' => 'You can unsubscribe at any time',
		);


		/**
		 * Social Icons
		 */
		$fields['social_icons']       = array(
			'std' => 1,
		);
		$fields['social_icons_style'] = array(
			'std' => 't1-s1',
		);
		$fields['social_icons_sites'] = array(
			'std' => array(
				'facebook'  => '1',
				'twitter'   => '1',
				'google'    => '1',
				'youtube'   => '1',
				'instagram' => '1',
			),
		);


		return $fields;
	}
}


add_filter( 'better-framework/metabox/bsnp_newsletter_style/fields', 'bsnp_metabox_newsletter_style_fields', 10 );

if ( ! function_exists( 'bsnp_metabox_newsletter_style_fields' ) ) {
	/**
	 * Configs metabox fields
	 *
	 * @param $fields
	 *
	 * @since 1.0
	 *
	 * @return array
	 */
	function bsnp_metabox_newsletter_style_fields( $fields ) {

		$fields['newsletter_style'] = array(
			'name' => __( 'Style', 'better-studio' ),
			'id'   => 'newsletter_style',
			'type' => 'tab',
			'icon' => 'bsai-paint',
		);
		$fields['style']            = array(
			'name'             => __( 'Newsletter Style', 'better-studio' ),
			'id'               => 'style',
			'type'             => 'select_popup',
			'deferred-options' => array(
				'callback' => 'bsnp_get_newsletters_style_option',
				'args'     => array(
					false,
				),
			),
			'texts'            => array(
				'modal_title'   => __( 'Choose Newsletter Style', 'better-studio' ),
				'box_pre_title' => __( 'Active style', 'better-studio' ),
				'box_button'    => __( 'Change Style', 'better-studio' ),
			),
			'desc'             => __( 'Select a newsletter style.', 'better-studio' ),
			'column_class'     => 'three-column',
		);
		$fields['color']            = array(
			'name' => __( 'Color', 'better-studio' ),
			'id'   => 'color',
			'type' => 'color',
			'desc' => __( 'Highlight color of newsletter.', 'better-studio' )
		);


		$fields[]              = array(
			'name'   => __( 'Texts (Translations)', 'better-studio' ),
			'type'   => 'heading',
			'layout' => 'style-1',
			'id'     => '_heading',
		);
		$fields['text_title']  = array(
			'name' => __( 'Heading', 'better-studio' ),
			'id'   => 'text_title',
			'type' => 'text',
			'desc' => __( '', 'better-studio' )
		);
		$fields['text_desc']   = array(
			'name' => __( 'Description', 'better-studio' ),
			'id'   => 'text_desc',
			'type' => 'text',
			'desc' => __( '', 'better-studio' )
		);
		$fields['text_input']  = array(
			'name' => __( 'Email Input', 'better-studio' ),
			'id'   => 'text_input',
			'type' => 'text',
			'desc' => __( '', 'better-studio' )
		);
		$fields['text_button'] = array(
			'name' => __( 'Subscribe button', 'better-studio' ),
			'id'   => 'text_button',
			'type' => 'text',
			'desc' => __( '', 'better-studio' )
		);
		$fields['text_after']  = array(
			'name' => __( 'After form text', 'better-studio' ),
			'id'   => 'text_after',
			'type' => 'text',
			'desc' => __( '', 'better-studio' )
		);


		$fields['newsletter_icons']   = array(
			'name' => __( 'Social Icons', 'better-studio' ),
			'id'   => 'newsletter_icons',
			'type' => 'tab',
			'icon' => 'bsai-sitemap',
		);
		$fields['social_icons']       = array(
			'name'      => __( 'Show Social Icons in Newsletter?', 'better-studio' ),
			'id'        => 'social_icons',
			'desc'      => __( '', 'better-studio' ),
			'type'      => 'switch',
			'on-label'  => __( 'Yes', 'better-studio' ),
			'off-label' => __( 'No', 'better-studio' ),
		);
		$fields['social_icons_style'] = array(
			'name'             => __( 'Icons style', 'better-studio' ),
			'id'               => 'social_icons_style',
			'type'             => 'select_popup',
			'deferred-options' => array(
				'callback' => 'bsnp_get_newsletters_si_style_option',
				'args'     => array(
					false,
				),
			),
			'texts'            => array(
				'modal_title'   => __( 'Choose Icon Style', 'better-studio' ),
				'box_pre_title' => __( 'Active style', 'better-studio' ),
				'box_button'    => __( 'Change Style', 'better-studio' ),
			),
			'desc'             => __( 'Select a icon style.', 'better-studio' ),
			'column_class'     => 'three-column',
			'show_on'          => array(
				array(
					'social_icons=1',
				),
			),
		);
		if ( class_exists( 'Better_Social_Counter' ) && class_exists( 'Better_Social_Counter_Data_Manager' ) ) {
			$fields['social_icons_sites'] = array(
				'name'             => __( 'Sort and Active Sites', 'better-studio' ),
				'id'               => 'social_icons_sites',
				'desc'             => sprintf( __( 'Select & sort sites you will to show them in newsletter. <br><br>
For activating site you should enter your information in <a href="%s" target="_blank">Better Social Counter</a> Panel.
', 'better-studio' ), get_admin_url( null, 'admin.php?page=better-studio/better-social-counter' ) ),
				'type'             => 'sorter_checkbox',
				'deferred-options' => array(
					'callback' => 'bsnp_social_counter_options_list_callback',
				),
				'section_class'    => 'better-social-counter-sorter',
				'show_on'          => array(
					array(
						'social_icons=1',
					),
				),
			);
		} else {
			$fields['social_icons_sites_help'] = array(
				'name'          => __( 'Social Icons Instructions', 'better-studio' ),
				'id'            => 'social_icons_sites_help',
				'type'          => 'info',
				'state'         => 'open',
				'std'           => __( '<p>For adding social icons in top bar you should first install and active <strong>Better Social Counter</strong> plugin.</p>', 'better-studio' ),
				'info-type'     => 'help',
				'section_class' => 'widefat',
				'show_on'       => array(
					array(
						'social_icons=1',
					),
				),
			);
		}

		return $fields;
	}
}


add_filter( 'better-framework/metabox/bsnp_newsletter_post_settings/config', 'bsnp_metabox_newsletter_post_settings_config', 10 );

if ( ! function_exists( 'bsnp_metabox_newsletter_post_settings_config' ) ) {
	/**
	 * Configs custom metabox
	 *
	 * @param $config
	 *
	 * @since 1.0
	 *
	 * @return array
	 */
	function bsnp_metabox_newsletter_post_settings_config( $config ) {

		return array(
			'title'    => __( 'Newsletter Pack', 'better-studio' ),
			'pages'    => array( 'post' ),
			'context'  => 'normal',
			'prefix'   => false,
			'priority' => 'low'
		);

	} // bsnp_metabox_newsletter_config
} // if


add_filter( 'better-framework/metabox/bsnp_newsletter_post_settings/std', 'bsnp_metabox_newsletter_post_settings_std', 10 );

if ( ! function_exists( 'bsnp_metabox_newsletter_post_settings_std' ) ) {
	/**
	 * Configs metaboxe STD's
	 *
	 * @param $fields
	 *
	 * @since 1.0
	 *
	 * @return array
	 */
	function bsnp_metabox_newsletter_post_settings_std( $fields ) {

		$fields['bsnp_disable_all'] = array(
			'std'      => '0',
			'save-std' => false,
		);

		return $fields;
	}
}


add_filter( 'better-framework/metabox/bsnp_newsletter_post_settings/fields', 'bsnp_metabox_newsletter_post_settings_fields', 10 );

if ( ! function_exists( 'bsnp_metabox_newsletter_post_settings_fields' ) ) {
	/**
	 * Configs metabox fields
	 *
	 * @param $fields
	 *
	 * @since 1.0
	 *
	 * @return array
	 */
	function bsnp_metabox_newsletter_post_settings_fields( $fields ) {

		$fields['bsnp_disable_all'] = array(
			'name'      => __( 'Disable All Newsletters?', 'better-studio' ),
			'id'        => 'bsnp_disable_all',
			'type'      => 'switch',
			'on-label'  => __( 'Yes', 'better-studio' ),
			'off-label' => __( 'No', 'better-studio' ),
			'desc'      => __( 'Hides all newsletter in this post.', 'better-studio' ),
		);

		return $fields;
	}
}
