<?php

/**
 * => Banner Options
 */
$fields['ad_options'] = array(
	'name' => __( 'Ad', 'better-studio' ),
	'id'   => 'ad_options',
	'type' => 'tab',
	'icon' => 'bsai-advertise',
);
$fields['format']     = array(
	'name'          => __( 'Ad Format', 'better-studio' ),
	'desc'          => __( 'Choose format of ad.', 'better-studio' ),
	'id'            => 'format',
	'type'          => 'image_radio',
	'section_class' => 'style-floated-left bordered bam-image_format',
	'options'       => array(
		'normal' => array(
			'img'   => Better_Ads_Manager::dir_url( '/images/adformat-normal.png?v=' . Better_Ads_Manager::get_version() ),
			'label' => __( 'Normal Ad', 'better-studio' ),
		),
		'amp'    => array(
			'img'   => Better_Ads_Manager::dir_url( '/images/adformat-amp.png?v=' . Better_Ads_Manager::get_version() ),
			'label' => __( 'AMP Ad', 'better-studio' ),
		),
	)
);
$fields['type']       = array(
	'name'          => __( 'Ad Type', 'better-studio' ),
	'desc'          => __( 'Choose type of ad.', 'better-studio' ),
	'id'            => 'type',
	'type'          => 'image_radio',
	'section_class' => 'style-floated-left bordered bam-image_type',
	'options'       => array(
		'code'        => array(
			'img'   => Better_Ads_Manager::dir_url( '/images/adtype-adsense.png?v=' . Better_Ads_Manager::get_version() ),
			'label' => __( 'AdSense Ad', 'better-studio' ),
		),
		'dfp'         => array(
			'img'   => Better_Ads_Manager::dir_url( '/images/adtype-dfp.png?v=' . Better_Ads_Manager::get_version() ),
			'label' => __( 'Google DFP', 'better-studio' ),
		),
		'image'       => array(
			'img'   => Better_Ads_Manager::dir_url( '/images/adtype-image.png?v=' . Better_Ads_Manager::get_version() ),
			'label' => __( 'Image Ad', 'better-studio' ),
		),
		'custom_code' => array(
			'img'   => Better_Ads_Manager::dir_url( '/images/adtype-custom-code.png?v=' . Better_Ads_Manager::get_version() ),
			'label' => __( 'HTML Ad', 'better-studio' ),
		),
	),
);
$fields['code']       = array(
	'name'               => __( 'Google Adsense Code', 'better-studio' ),
	'id'                 => 'code',
	'desc'               => __( 'Paste your Google Adsense.', 'better-studio' ),
	'type'               => 'textarea',
	'section_class'      => 'pre-resp',
	'filter-field'       => 'type',
	'filter-field-value' => 'code',
);
$fields['dfp_spot']   = array(
	'name'             => __( 'Select DTP Spot', 'better-studio' ),
	'id'               => 'dfp_spot',
	'desc'             => __( 'Select DFP sport from list.', 'better-studio' ),
	'type'             => 'select',
	'deferred-options' => 'bam_deferred_dfp_spot_options',
	'show_on'          => array(
		array(
			'type=dfp',
		)
	),
);

$dfp = Better_Ads_Manager::get_option( 'dfp_code' );

if ( empty( $dfp ) ) {
	$fields['dfp_spot']['desc'] = __( '<strong style="color: red">Required:</strong> DFP before &lt;/head&gt; code was not entered. <br><br>', 'better-studio' );

	$fields['dfp_spot']['desc'] .= '<a href="' . admin_url( 'admin.php?page=better-studio/better-ads-manager' ) . '"><strong>' .
	                               __( 'Please enter DFP before &lt;/head&gt; code in Better Ads Manager panel.', 'better-studio' )
	                               . '</strong></a>';
}

$fields['custom_dfp_code'] = array(
	'name'    => __( 'Custom DFP Ad Code', 'better-studio' ),
	'id'      => 'custom_dfp_code',
	'desc'    => __( 'Paste any ad code here.', 'better-studio' ),
	'type'    => 'textarea',
	'show_on' => array(
		array(
			'type=dfp',
			'dfp_spot=custom',
		)
	)
);
$fields['custom_code']     = array(
	'name'               => __( 'Custom Ad Code', 'better-studio' ),
	'id'                 => 'custom_code',
	'desc'               => __( 'Paste any ad code here. <br><br><code>Note:</code> You can use HTML and Shortcodes in this field.', 'better-studio' ),
	'type'               => 'textarea',
	'section_class'      => 'pre-resp',
	'filter-field'       => 'type',
	'filter-field-value' => 'custom_code',
);
$fields['img']             = array(
	'name'               => __( 'Image', 'better-studio' ),
	'id'                 => 'img',
	'desc'               => __( 'Upload or chose ad image.', 'better-studio' ),
	'type'               => 'media_image',
	'media_title'        => __( 'Select or Upload Ad Image', 'better-studio' ),
	'media_button'       => __( 'Select Image', 'better-studio' ),
	'upload_label'       => __( 'Upload Ad Image', 'better-studio' ),
	'remove_label'       => __( 'Remove ', 'better-studio' ),
	'show_input'         => true,
	'input_placeholder'  => __( 'External banner link...', 'better-studio' ),
	'filter-field'       => 'type',
	'filter-field-value' => 'image',
);
$fields['url']             = array(
	'name'               => __( 'Link', 'better-studio' ),
	'id'                 => 'url',
	'desc'               => __( 'Paste you ad link here.', 'better-studio' ),
	'type'               => 'text',
	'filter-field'       => 'type',
	'filter-field-value' => 'image',
);
$fields['target']          = array(
	'name'               => __( 'Link Target', 'better-studio' ),
	'desc'               => __( 'Choose where to open the link?', 'better-studio' ),
	'id'                 => 'target',
	'type'               => 'select',
	"options"            => array(
		'_blank'  => __( '_blank - in new window or tab', 'better-studio' ),
		'_self'   => __( '_self - in the same frame as it was clicked', 'better-studio' ),
		'_parent' => __( '_parent - in the parent frame', 'better-studio' ),
		'_top'    => __( '_top - in the full body of the window', 'better-studio' ),
	),
	'filter-field'       => 'type',
	'filter-field-value' => 'image',
);
$fields['no_follow']       = array(
	'name'               => __( 'Link Rel No Follow', 'better-studio' ),
	'desc'               => __( 'Do you want to add rel nofollow to your link?', 'better-studio' ),
	'id'                 => 'no_follow',
	'type'               => 'switch',
	'section_class'      => 'pre-resp',
	'on-label'           => __( 'Yes', 'better-studio' ),
	'off-label'          => __( 'No', 'better-studio' ),
	'filter-field'       => 'type',
	'filter-field-value' => 'image',
);
$fields['amp_size']        = array(
	'name'    => __( 'Ad Size', 'better-studio' ),
	'desc'    => __( 'Chose Ad Size', 'better-studio' ),
	'id'      => 'amp_size',
	'type'    => 'select',
	"options" => array(
		'custom'  => __( '-- Custom Ad Size --', 'better-studio' ),
		'240_240' => __( '240 x 400', 'better-studio' ),
		'250_360' => __( '250 x 360', 'better-studio' ),
		'300_250' => __( '300 x 250 - Suggested', 'better-studio' ),
		'320_140' => __( '320 x 140', 'better-studio' ),
		'400_300' => __( '400 x 300', 'better-studio' ),
	),
	'show_on' => array(
		array(
			'format=amp',
			'type=code'
		),
	),
);
$fields['amp_size_width']  = array(
	'name'    => __( 'Ad Custom Width', 'better-studio' ),
	'desc'    => __( 'Enter only number without px or %.', 'better-studio' ),
	'id'      => 'amp_size_width',
	'type'    => 'text',
	'show_on' => array(
		array(
			'format=amp',
			'type=code',
			'amp_size=custom',
		),
	),
);
$fields['amp_size_height'] = array(
	'name'    => __( 'Ad Custom Height', 'better-studio' ),
	'desc'    => __( 'Enter only number without px or %.', 'better-studio' ),
	'id'      => 'amp_size_height',
	'type'    => 'text',
	'show_on' => array(
		array(
			'format=amp',
			'type=code',
			'amp_size=custom',
		),
	),
);
$fields['caption']         = array(
	'name' => __( 'Caption', 'better-studio' ),
	'id'   => 'caption',
	'desc' => __( 'Optional caption that will be shown after ad.', 'better-studio' ),
	'type' => 'text',
);
$fields[]                  = array(
	'name'            => '',
	'id'              => 'responsive_options',
	'section_class'   => 'full-width-controls',
	'container_class' => 'responsive-field-container',
	'type'            => 'custom',
	'input_callback'  => 'better_ads_field_responsive_callback'
);
// Following fields only added to make the previous field be saved!
// BF only saves the field you defined to it!
$fields['show_desktop']          = array(
	'type'     => 'id-holder',
	'save-std' => true,
);
$fields['size_desktop']          = array(
	'type'     => 'id-holder',
	'save-std' => true,
);
$fields['show_tablet_portrait']  = array(
	'type'     => 'id-holder',
	'save-std' => true,
);
$fields['size_tablet_portrait']  = array(
	'type'     => 'id-holder',
	'save-std' => true,
);
$fields['show_tablet_landscape'] = array(
	'type'     => 'id-holder',
	'save-std' => true,
);
$fields['size_tablet_landscape'] = array(
	'type'     => 'id-holder',
	'save-std' => true,
);
$fields['show_phone']            = array(
	'type'     => 'id-holder',
	'save-std' => true,
);
$fields['size_phone']            = array(
	'type'     => 'id-holder',
	'save-std' => true,
);


/**
 * => Advanced Settings
 */
$fields['style_tab']    = array(
	'name' => __( 'Style', 'better-studio' ),
	'id'   => 'style_tab',
	'type' => 'tab',
	'icon' => 'bsai-paint',
);
$fields['custom_class'] = array(
	'name' => __( 'Custom Class', 'better-studio' ),
	'id'   => 'custom_class',
	'type' => 'text',
	'desc' => __( 'This classes will be added to banner wrapper tag.<br>Separate classes with space.', 'better-studio' )
);
$fields['custom_id']    = array(
	'name' => __( 'Custom ID', 'better-studio' ),
	'id'   => 'custom_id',
	'type' => 'text',
	'desc' => __( 'This id will be added to banner wrapper tag.', 'better-studio' )
);
$fields['custom_css']   = array(
	'name' => __( 'Custom CSS', 'better-studio' ),
	'id'   => 'custom_css',
	'type' => 'textarea',
	'desc' => __( 'Paste your CSS code, do not include any tags or HTML in the field. Any custom CSS entered here will override the default CSS. In some cases, the !important tag may be needed.', 'better-studio' )
);


/**
 * => AdBlock Fallback
 * todo change icon to better one
 */
$fields['adblock_options']    = array(
	'name'       => __( 'Ad Blockers', 'better-studio' ),
	'id'         => 'adblock_options',
	'type'       => 'tab',
	'icon'       => 'bsai-delete',
	'margin-top' => '20',
	'badge'      => array(
		'text'  => __( 'New', 'better-studio' ),
		'color' => '#62D393'
	)
);
$fields['adblock-help']       = array(
	'name'          => __( 'Ad Blockers Fallback', 'better-studio' ),
	'id'            => 'adblock-help',
	'type'          => 'info',
	'std'           => __( '<p>Ad Blockers prevents page elements, mainly advertisements from being displayed that can hurts the main purpose of your site advertisement goals.</p>
                <p>We take and advanced attention to this and you can use following options to make fallback for when the main ad was detected with blockers.</p>
                <p><strong>Note:</strong> Ad Blockers can not detect simple image ads but use this option to external ad generators like Google Adsense.</p>', 'better-studio' ),
	'state'         => 'open',
	'info-type'     => 'help',
	'section_class' => 'widefat',
);
$fields['fallback_type']      = array(
	'name'    => __( 'Fallback Type', 'better-studio' ),
	'desc'    => __( 'Choose type of fallback for ad.', 'better-studio' ),
	'id'      => 'fallback_type',
	'type'    => 'select',
	'options' => array(
		'image' => __( 'Image', 'better-studio' ),
		'code'  => __( 'HTML Code', 'better-studio' ),
	)
);
$fields['fallback_code']      = array(
	'name'               => __( 'Custom HTML Code', 'better-studio' ),
	'id'                 => 'fallback_code',
	'desc'               => __( 'Paste your custom HTML code. Yo can add css code also within &lt;style&gt;&lt;/style&gt;', 'better-studio' ),
	'type'               => 'textarea',
	'container_class'    => 'fallback-code-field',
	'filter-field'       => 'fallback_type',
	'filter-field-value' => 'code',
);
$fields['fallback_img']       = array(
	'name'               => __( 'Fallback Image', 'better-studio' ),
	'id'                 => 'fallback_img',
	'desc'               => __( 'Upload or chose fallback image for ad.', 'better-studio' ),
	'type'               => 'media_image',
	'media_title'        => __( 'Select or Upload Ad Image', 'better-studio' ),
	'media_button'       => __( 'Select Image', 'better-studio' ),
	'upload_label'       => __( 'Upload Image', 'better-studio' ),
	'remove_label'       => __( 'Remove', 'better-studio' ),
	'filter-field'       => 'fallback_type',
	'filter-field-value' => 'image',
);
$fields['fallback_caption']   = array(
	'name'               => __( 'Caption', 'better-studio' ),
	'id'                 => 'fallback_caption',
	'desc'               => __( 'Optional caption that will be shown after Image.', 'better-studio' ),
	'type'               => 'text',
	'filter-field'       => 'fallback_type',
	'filter-field-value' => 'image',
);
$fields['fallback_url']       = array(
	'name'               => __( 'Link', 'better-studio' ),
	'id'                 => 'fallback_url',
	'desc'               => __( 'Paste you ad link here.', 'better-studio' ),
	'type'               => 'text',
	'filter-field'       => 'fallback_type',
	'filter-field-value' => 'image',
);
$fields['fallback_target']    = array(
	'name'               => __( 'Link Target', 'better-studio' ),
	'desc'               => __( 'Choose where To Open The link?', 'better-studio' ),
	'id'                 => 'fallback_target',
	'type'               => 'select',
	"options"            => array(
		'_blank'  => __( '_blank - in new window or tab', 'better-studio' ),
		'_self'   => __( '_self - in the same frame as it was clicked', 'better-studio' ),
		'_parent' => __( '_parent - in the parent frame', 'better-studio' ),
		'_top'    => __( '_top - in the full body of the window', 'better-studio' ),
	),
	'filter-field'       => 'fallback_type',
	'filter-field-value' => 'image',
);
$fields['fallback_no_follow'] = array(
	'name'               => __( 'Link Rel No Follow', 'better-studio' ),
	'desc'               => __( 'Do you want to add rel nofollow to your link?', 'better-studio' ),
	'id'                 => 'fallback_no_follow',
	'type'               => 'switch',
	'on-label'           => __( 'Yes', 'better-studio' ),
	'off-label'          => __( 'No', 'better-studio' ),
	'filter-field'       => 'fallback_type',
	'filter-field-value' => 'image',
);

