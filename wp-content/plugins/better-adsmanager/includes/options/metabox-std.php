<?php

/**
 * => Banner Options
 */
$fields['campaign']        = array(
	'std' => 'none',
);
$fields['format']          = array(
	'std' => 'normal',
);
$fields['type']            = array(
	'std' => 'code',
);
$fields['code']            = array(
	'std' => '',
);
$fields['dfp_spot']        = array(
	'std' => '',
);
$fields['custom_dfp_code'] = array(
	'std' => '',
);
$fields['custom_code']     = array(
	'std' => '',
);
$fields['img']             = array(
	'std' => '',
);
$fields['url']             = array(
	'std' => '',
);
$fields['target']          = array(
	'std' => '_blank',
);
$fields['caption']         = array(
	'std' => '',
);
$fields['no_follow']       = array(
	'std' => false,
);
$fields['amp_size']        = array(
	'std' => '300_250',
);
$fields['amp_size_width']  = array(
	'std' => '250',
);
$fields['amp_size_height'] = array(
	'std' => '300',
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
$fields['custom_class'] = array(
	'std' => '',
);
$fields['custom_id']    = array(
	'std' => '',
);
$fields['custom_css']   = array(
	'std' => '',
);


/**
 * => AdBlock Fallback
 */
$fields['fallback_type']      = array(
	'std' => 'image',
);
$fields['fallback_code']      = array(
	'std' => '',
);
$fields['fallback_img']       = array(
	'std' => '',
);
$fields['fallback_caption']   = array(
	'std' => '',
);
$fields['fallback_url']       = array(
	'std' => '',
);
$fields['fallback_target']    = array(
	'std' => '_blank',
);
$fields['fallback_no_follow'] = array(
	'std' => false,
);
