<?php

/**
 * Image Protection Tab
 */

$fields['image_protection'] = array(
	'std' => true,
	'id'  => 'image_protection',
);

$fields['image_right_click']        = array(
	'std' => true,
);
$fields['image_drag_drop']          = array(
	'std' => true,
);
$fields['image_no_a_tag']           = array(
	'std' => false,
);
$fields['image_hotlink_protection'] = array(
	'std' => false,
);

/**
 * Watermark Tab
 */

$fields['image_watermark_enable']    = array(
	'std' => false,
);
$fields['watermark_file']            = array(
	'std' => '',
);
$fields['watermark_backup_original'] = array(
	'std' => true,
);
$fields['watermark_position']        = array(
	'std' => 'bottom-left',
);
$fields['watermark_auto']            = array(
	'std' => true,
);

/**
 * Text Protection Tab
 */

$fields['content_copy']                     = array(
	'std' => 'full-protection',
);
$fields['content_copy_footer_text']         = array(
	'std' => '',
);
$fields['content_copy_footer_text_length']  = array(
	'std' => '',
);
$fields['allow_right_click']                = array(
	'std' => false,
);
$fields['allow_right_click_internal_links'] = array(
	'std' => true,
);
$fields['right_click_alert']                = array(
	'std' => '',
);
$fields['allow_selection']                  = array(
	'std' => false,
);
$fields['allow_copy']                       = array(
	'std' => false,
);

/**
 *  => Limit Windows Browsers Shortcuts
 */
$fields['disable_ctrl_a']       = array(
	'std' => true,
);
$fields['disable_ctrl_c']       = array(
	'std' => true,
);
$fields['disable_ctrl_x']       = array(
	'std' => true,
);
$fields['disable_ctrl_v']       = array(
	'std' => true,
);
$fields['disable_ctrl_s']       = array(
	'std' => true,
);
$fields['disable_ctrl_u']       = array(
	'std' => true,
);
$fields['disable_ctrl_p']       = array(
	'std' => true,
);
$fields['disable_ctrl_shift_i'] = array(
	'std' => true,
);

/**
 *  => Limit Mac OS Browsers Shortcuts
 */
$fields['disable_cmd_a']     = array(
	'std' => true
);
$fields['disable_cmd_c']     = array(
	'std' => true
);
$fields['disable_cmd_x']     = array(
	'std' => true
);
$fields['disable_cmd_v']     = array(
	'std' => true
);
$fields['disable_cmd_s']     = array(
	'std' => true
);
$fields['disable_cmd_u']     = array(
	'std' => true
);
$fields['disable_cmd_alt_u'] = array(
	'std' => true
);
$fields['disable_cmd_p']     = array(
	'std' => true
);
/*$fields['disable_cmd_shift_4']       = array(
	'std' => TRUE
);
$fields['disable_cmd_shift_3']       = array(
	'std' => TRUE
);
$fields['disable_cmd_ctrl_shift_3']  = array(
	'std' => TRUE
);
$fields['disable_cmd_shift_4_space'] = array(
	'std' => TRUE
);*/
$fields['disable_cmd_alt_i'] = array(
	'std' => true
);


/**
 * View Source Protection Tab
 */

$fields['view_source_protection']            = array(
	'view_source_protection' => true,
);
$fields['view_source_top_empty_lines']       = array(
	'view_source_protection' => true,
);
$fields['view_source_top_empty_lines_count'] = array(
	'std' => 1000,
);

/**
 * Disabled JavaScript Tab
 */

$fields['disabled_js_protection'] = array(
	'std' => 'off',
);

$fields['disabled_js_message'] = array(
	'std' => 'Please enable Browser JavaScript to visit the website.',
);

$fields['disabled_js_redirect_page'] = array(
	'std' => 0
);

/**
 * RSS Protection Tab
 */

$fields['rss_disable'] = array(
	'std' => true,
);


/**
 * Print Protection Tab
 */

$fields['print_protection']                = array(
	'std' => 'full-protection-msg',
);
$fields['print_protection_custom_message'] = array(
	'std' => 'You cannot print contents of this website.',
);

/**
 * Iframe Protection Tab
 */
$fields['iframe_protection']         = array(
	'std' => 'full',
);
$fields['iframe_protection_page']    = array(
	'std' => 0,
);
$fields['iframe_protection_message'] = array(
	'std' => 'Iframe requests are blocked.',
);


/**
 * Email Protection Tab
 */

$fields['email_protection'] = array(
	'std' => 'no',
);

/**
 * Feed Protection Tab
 */

$fields['feed_protection'] = array(
	'std' => '',
);

$fields['feed_footer_text'] = array(
	'std' => '',
);

/**
 * Advanced options Tab
 */

$fields['filter_by_users'] = array(
	'std' => 'off',
);

$fields['filter_users_role'] = array(
	'std' => array(),
);

$fields['filter_by_posts'] = array(
	'std' => 'off',
);

$fields['filter_posts'] = array(
	'std' => false,
);

$fields['filter_pages']              = array(
	'std' => false,
);
$fields['filter_exclude_pages_list'] = array(
	'std' => array(),
);

$fields['filter_taxonomies']      = array(
	'std' => false,
);
$fields['filter_taxonomies_list'] = array(
	'std' => array(),
);
$fields['filter_post_types']      = array(
	'std' => false,
);

$fields['filter_post_types_list'] = array(
	'std' => array(),
);


