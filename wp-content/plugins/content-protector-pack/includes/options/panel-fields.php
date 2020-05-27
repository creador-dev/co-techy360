<?php

/**
 * Image Protection Tab
 */
$fields[] = array(
	'name' => __( 'Image Protection', 'content-protector-pack' ),
	'id'   => 'image_protection_tab',
	'type' => 'tab',
	'icon' => 'fa-camera',
);

$fields['image_protection'] = array(
	# opt-1
	'name' => __( 'Image Protection', 'content-protector-pack' ),
	'type' => 'switch',
	'id'   => 'image_protection',
);

$fields['image_right_click']        = array(
	# opt-1 => 0
	'name'    => __( 'Disable RightClick on images', 'content-protector-pack' ),
	'type'    => 'switch',
	'id'      => 'image_right_click',
	'show_on' => array(
		array(
			'image_protection=1'
		)
	),
);
$fields['image_drag_drop']          = array(
	# opt-1 => 1
	'name'    => __( 'Disable Drag/Drop on images', 'content-protector-pack' ),
	'type'    => 'switch',
	'id'      => 'image_drag_drop',
	'show_on' => array(
		array(
			'image_protection=1'
		)
	),
);
$fields['image_no_a_tag']           = array(
	'name'    => __( 'Remove images link', 'content-protector-pack' ),
	'type'    => 'switch',
	'id'      => 'image_no_a_tag',
	'show_on' => array(
		array(
			'image_protection=1'
		)
	),
);
$fields['image_hotlink_protection'] = array(
	'name'    => __( 'Hotlink Protection', 'content-protector-pack' ),
	'desc'    => __( 'With this option enabled, Website images will not be loaded from other sites', 'content-protector-pack' ),
	'type'    => 'switch',
	'id'      => 'image_hotlink_protection',
	'show_on' => array(
		array(
			'image_protection=1'
		)
	),
);


/**
 * Watermark Tab
 */
$fields[] = array(
	'name' => __( 'Watermark', 'content-protector-pack' ),
	'id'   => 'watermark_settings_tab',
	'type' => 'tab',
	'icon' => 'fa-tag',
);

$fields['image_watermark_enable'] = array(
	'name'      => __( 'Paste watermark on uploaded images', 'content-protector-pack' ),
	'type'      => 'switch',
	'id'        => 'image_watermark_enable',
	'on-label'  => __( 'Yes', 'content-protector-pack' ),
	'off-label' => __( 'No', 'content-protector-pack' ),
);

$fields['watermark_file'] = array(
	'name'         => __( 'Watermark image', 'content-protector-pack' ),
	'type'         => 'media_image',
	'id'           => 'watermark_file',
	'data-type'    => 'id',
	//
	'media_title'  => __( 'Select or Upload Watermark Image', 'content-protector-pack' ),
	'upload_label' => __( 'Upload Watermark Image', 'content-protector-pack' ),
	'media_button' => __( 'Select Image', 'content-protector-pack' ),
	'remove_label' => __( 'Remove', 'content-protector-pack' ),
	'show_on'      => array(
		array(
			'image_watermark_enable=1'
		)
	)
);

$fields['watermark_backup_original'] = array(
	'name'      => __( 'Backup original image', 'content-protector-pack' ),
	'type'      => 'switch',
	'id'        => 'watermark_backup_original',
	'on-label'  => __( 'Yes', 'content-protector-pack' ),
	'off-label' => __( 'No', 'content-protector-pack' ),
	'show_on'   => array(
		array(
			'image_watermark_enable=1'
		)
	)
);

$fields['watermark_position'] = array(
	'name'    => __( 'Watermark Image Position', 'content-protector-pack' ),
	'type'    => 'select',
	'id'      => 'watermark_position',
	'options' => array(
		'top-left'      => __( 'Top Left', 'content-protector-pack' ),
		'top-center'    => __( 'Top Center', 'content-protector-pack' ),
		'top-right'     => __( 'Top Right', 'content-protector-pack' ),
		//
		'center-left'   => __( 'Center Left', 'content-protector-pack' ),
		'center-center' => __( 'Center Center', 'content-protector-pack' ),
		'center-right'  => __( 'Center Right', 'content-protector-pack' ),
		//
		'bottom-left'   => __( 'Bottom Left', 'content-protector-pack' ),
		'bottom-center' => __( 'Bottom Center', 'content-protector-pack' ),
		'bottom-right'  => __( 'Bottom Right', 'content-protector-pack' ),
	),
	'show_on' => array(
		array(
			'image_watermark_enable=1'
		)
	)
);

$fields['watermark_auto'] = array(
	'name'      => __( 'Add Watermark to Images Automatically', 'content-protector-pack' ),
	'type'      => 'switch',
	'id'        => 'watermark_auto',
	'on-label'  => __( 'Yes', 'content-protector-pack' ),
	'off-label' => __( 'No', 'content-protector-pack' ),
	'show_on'   => array(
		array(
			'image_watermark_enable=1'
		)
	)
);


/**
 * Text Protection Tab
 */
$fields[] = array(
	'name' => __( 'Text Protection', 'content-protector-pack' ),
	'id'   => 'text_protection_tab',
	'type' => 'tab',
	'icon' => 'fa-pencil',
);


$fields['content_copy'] = array(
	# opt-2
	'name'    => __( 'Allow Users to Copy', 'content-protector-pack' ),
	'type'    => 'select',
	'id'      => 'content_copy',
	'options' => array(
		'no-protection'   => __( 'Allow to everyone', 'content-protector-pack' ),
		'full-protection' => __( 'Disable for everyone', 'content-protector-pack' ),
		'append-footer'   => __( 'Allow but append custom text at the end', 'content-protector-pack' ),
	),
);

$fields['content_copy_footer_text']         = array(
	# opt-2 => 0
	'name'    => __( 'Custom text', 'content-protector-pack' ),
	'desc'    => __( 'You can use HTML tags.<br><br><code>%POSTLINK%</code> will be replaced by the current page link.<br><code>%SITELINK%</code> will be replaced by the site link.', 'content-protector-pack' ),
	'type'    => 'text',
	'id'      => 'content_copy_footer_text',
	'show_on' => array(
		array(
			'content_copy!=no-protection',
			'content_copy=append-footer'
		)
	),
);
$fields['content_copy_footer_text_length']  = array(
	# opt-2 => 8
	'name'    => __( 'Copied text length?', 'content-protector-pack' ),
	'desc'    => __( 'You can cut the copied text to a number of characters by specifying it in this field.', 'content-protector-pack' ),
	'type'    => 'text',
	'id'      => 'content_copy_footer_text_length',
	'show_on' => array(
		array(
			'content_copy!=no-protection',
			'content_copy=append-footer'
		)
	),
);
$fields['allow_right_click']                = array(
	# opt-2 => 1
	'name'      => __( 'Allow Users to right click', 'content-protector-pack' ),
	'type'      => 'switch',
	'id'        => 'allow_right_click',
	'on-label'  => __( 'Yes', 'content-protector-pack' ),
	'off-label' => __( 'No', 'content-protector-pack' ),
	'show_on'   => array(
		array(
			'content_copy!=no-protection'
		)
	)
);
$fields['allow_right_click_internal_links'] = array(
	# opt-2 => 2
	'name'      => __( 'Allow right click on internal links', 'content-protector-pack' ),
	'desc'      => __( 'Some times users want to open your website content in new tab or copy the url, by enabling this option users allow to right click on internal links.', 'content-protector-pack' ),
	'type'      => 'switch',
	'id'        => 'allow_right_click_internal_links',
	'on-label'  => __( 'Yes', 'content-protector-pack' ),
	'off-label' => __( 'No', 'content-protector-pack' ),
	'show_on'   => array(
		array(
			'content_copy!=no-protection',
			'allow_right_click=0'
		)
	),
);
$fields['right_click_alert']                = array(
	# opt 2 => 3
	'name'    => __( 'Alert user after right click', 'content-protector-pack' ),
	'desc'    => __( 'Leave this field empty, if you don\'t want to alert user.', 'content-protector-pack' ),
	'type'    => 'text',
	'id'      => 'right_click_alert',
	'show_on' => array(
		array(
			'content_copy!=no-protection'
		)
	)
);

$fields['allow_selection'] = array(
	# opt-2 => 5
	'name'      => __( 'Allow users to select', 'content-protector-pack' ),
	'type'      => 'switch',
	'id'        => 'allow_selection',
	'on-label'  => __( 'Yes', 'content-protector-pack' ),
	'off-label' => __( 'No', 'content-protector-pack' ),
	'show_on'   => array(
		array(
			'content_copy!=no-protection',
		)
	),
);
$fields['allow_copy']      = array(
	# opt-2 => 5
	'name'      => __( 'Allow users to copy/cut', 'content-protector-pack' ),
	'type'      => 'switch',
	'id'        => 'allow_copy',
	'on-label'  => __( 'Yes', 'content-protector-pack' ),
	'off-label' => __( 'No', 'content-protector-pack' ),
	'show_on'   => array(
		array(
			'content_copy!=no-protection',
		)
	),
);

$fields[]                 = array(
	# opt 2 => 4
	'name'  => __( 'Limit Windows Browsers Shortcuts', 'better-studio' ),
	'type'  => 'group',
	'state' => 'close',
);
$fields['disable_ctrl_a'] = array(
	'name'      => __( 'Disable Ctrl+A', 'content-protector-pack' ),
	'desc'      => __( 'Select All', 'content-protector-pack' ),
	'type'      => 'switch',
	'id'        => 'disable_ctrl_a',
	'on-label'  => __( 'Yes', 'content-protector-pack' ),
	'off-label' => __( 'No', 'content-protector-pack' ),
);
$fields['disable_ctrl_c'] = array(
	'name'      => __( 'Disable Ctrl+C', 'content-protector-pack' ),
	'desc'      => __( 'Copy', 'content-protector-pack' ),
	'type'      => 'switch',
	'id'        => 'disable_ctrl_c',
	'on-label'  => __( 'Yes', 'content-protector-pack' ),
	'off-label' => __( 'No', 'content-protector-pack' ),
);
$fields['disable_ctrl_x'] = array(
	'name'      => __( 'Disable Ctrl+X', 'content-protector-pack' ),
	'desc'      => __( 'Cut', 'content-protector-pack' ),
	'type'      => 'switch',
	'id'        => 'disable_ctrl_x',
	'on-label'  => __( 'Yes', 'content-protector-pack' ),
	'off-label' => __( 'No', 'content-protector-pack' ),
);
$fields['disable_ctrl_v'] = array(
	'name'      => __( 'Disable Ctrl+V', 'content-protector-pack' ),
	'desc'      => __( 'Paste', 'content-protector-pack' ),
	'type'      => 'switch',
	'id'        => 'disable_ctrl_v',
	'on-label'  => __( 'Yes', 'content-protector-pack' ),
	'off-label' => __( 'No', 'content-protector-pack' ),
);
$fields['disable_ctrl_s'] = array(
	'name'      => __( 'Disable Ctrl+S', 'content-protector-pack' ),
	'desc'      => __( 'Save', 'content-protector-pack' ),
	'type'      => 'switch',
	'id'        => 'disable_ctrl_s',
	'on-label'  => __( 'Yes', 'content-protector-pack' ),
	'off-label' => __( 'No', 'content-protector-pack' ),
);
$fields['disable_ctrl_u'] = array(
	'name'      => __( 'Disable Ctrl+U', 'content-protector-pack' ),
	'desc'      => __( 'View Source', 'content-protector-pack' ),
	'type'      => 'switch',
	'id'        => 'disable_ctrl_u',
	'on-label'  => __( 'Yes', 'content-protector-pack' ),
	'off-label' => __( 'No', 'content-protector-pack' ),
);
$fields['disable_ctrl_p'] = array(
	'name'      => __( 'Disable Ctrl+P', 'content-protector-pack' ),
	'desc'      => __( 'Print Page', 'content-protector-pack' ),
	'type'      => 'switch',
	'id'        => 'disable_ctrl_p',
	'on-label'  => __( 'Yes', 'content-protector-pack' ),
	'off-label' => __( 'No', 'content-protector-pack' ),
);

$fields['disable_ctrl_shift_i'] = array(
	'name'      => __( 'Disable Ctrl+Shift+I', 'content-protector-pack' ),
	'desc'      => __( 'Developer Tools', 'content-protector-pack' ),
	'type'      => 'switch',
	'id'        => 'disable_ctrl_shift_i',
	'on-label'  => __( 'Yes', 'content-protector-pack' ),
	'off-label' => __( 'No', 'content-protector-pack' ),
);

$fields[] = array(
	# opt 2 => 4
	'name'  => __( 'Limit Mac OS Browsers Shortcuts', 'better-studio' ),
	'type'  => 'group',
	'state' => 'close',
);

$fields['disable_cmd_a'] = array(
	'name'      => __( 'Disable CMD+A', 'content-protector-pack' ),
	'desc'      => __( 'Select All', 'content-protector-pack' ),
	'type'      => 'switch',
	'id'        => 'disable_cmd_a',
	'on-label'  => __( 'Yes', 'content-protector-pack' ),
	'off-label' => __( 'No', 'content-protector-pack' ),
);
$fields['disable_cmd_c'] = array(
	'name'      => __( 'Disable CMD+C', 'content-protector-pack' ),
	'desc'      => __( 'Copy', 'content-protector-pack' ),
	'type'      => 'switch',
	'id'        => 'disable_cmd_c',
	'on-label'  => __( 'Yes', 'content-protector-pack' ),
	'off-label' => __( 'No', 'content-protector-pack' ),
);

$fields['disable_cmd_x'] = array(
	'name'      => __( 'Disable CMD+X', 'content-protector-pack' ),
	'desc'      => __( 'Cut', 'content-protector-pack' ),
	'type'      => 'switch',
	'id'        => 'disable_cmd_x',
	'on-label'  => __( 'Yes', 'content-protector-pack' ),
	'off-label' => __( 'No', 'content-protector-pack' ),
);
$fields['disable_cmd_v'] = array(
	'name'      => __( 'Disable CMD+V', 'content-protector-pack' ),
	'desc'      => __( 'Paste', 'content-protector-pack' ),
	'type'      => 'switch',
	'id'        => 'disable_cmd_v',
	'on-label'  => __( 'Yes', 'content-protector-pack' ),
	'off-label' => __( 'No', 'content-protector-pack' ),
);

$fields['disable_cmd_s']     = array(
	'name'      => __( 'Disable CMD+S', 'content-protector-pack' ),
	'desc'      => __( 'Save', 'content-protector-pack' ),
	'type'      => 'switch',
	'id'        => 'disable_cmd_s',
	'on-label'  => __( 'Yes', 'content-protector-pack' ),
	'off-label' => __( 'No', 'content-protector-pack' ),
);
$fields['disable_cmd_u']     = array(
	'name'      => __( 'Disable CMD+U', 'content-protector-pack' ),
	'desc'      => __( 'View Source', 'content-protector-pack' ),
	'type'      => 'switch',
	'id'        => 'disable_cmd_u',
	'on-label'  => __( 'Yes', 'content-protector-pack' ),
	'off-label' => __( 'No', 'content-protector-pack' ),
);
$fields['disable_cmd_alt_u'] = array(
	'name'      => __( 'Disable CMD+Option+U', 'content-protector-pack' ),
	'desc'      => __( 'View Source', 'content-protector-pack' ),
	'type'      => 'switch',
	'id'        => 'disable_cmd_alt_u',
	'on-label'  => __( 'Yes', 'content-protector-pack' ),
	'off-label' => __( 'No', 'content-protector-pack' ),
);
$fields['disable_cmd_p']     = array(
	'name'      => __( 'Disable CMD+P', 'content-protector-pack' ),
	'desc'      => __( 'Print Page', 'content-protector-pack' ),
	'type'      => 'switch',
	'id'        => 'disable_cmd_p',
	'on-label'  => __( 'Yes', 'content-protector-pack' ),
	'off-label' => __( 'No', 'content-protector-pack' ),
);

/*$fields['disable_cmd_shift_4']       = array(
	'name'      => __( 'Disable CMD+Shift+4', 'content-protector-pack' ),
	'desc'      => __( 'Screenshot a Portion of Your Screen', 'content-protector-pack' ),
	'type'      => 'switch',
	'id'        => 'disable_cmd_shift_4',
	'on-label'  => __( 'Yes', 'content-protector-pack' ),
	'off-label' => __( 'No', 'content-protector-pack' ),
);
$fields['disable_cmd_shift_3']       = array(
	'name'      => __( 'Disable CMD+Shift+3', 'content-protector-pack' ),
	'desc'      => __( 'Take a Screenshot of Your Entire Screen', 'content-protector-pack' ),
	'type'      => 'switch',
	'id'        => 'disable_cmd_shift_3',
	'on-label'  => __( 'Yes', 'content-protector-pack' ),
	'off-label' => __( 'No', 'content-protector-pack' ),
);
$fields['disable_cmd_ctrl_shift_3']  = array(
	'name'      => __( 'Disable CMD+Ctrl+Shift+3', 'content-protector-pack' ),
	'desc'      => __( 'Save a Screenshot to the Clipboard', 'content-protector-pack' ),
	'type'      => 'switch',
	'id'        => 'disable_cmd_ctrl_shift_3',
	'on-label'  => __( 'Yes', 'content-protector-pack' ),
	'off-label' => __( 'No', 'content-protector-pack' ),
);
$fields['disable_cmd_shift_4_space'] = array(
	'name'      => __( 'Disable CMD+Shift+4+Space', 'content-protector-pack' ),
	'desc'      => __( 'Screenshot of the Open Window', 'content-protector-pack' ),
	'type'      => 'switch',
	'id'        => 'disable_cmd_shift_4_space',
	'on-label'  => __( 'Yes', 'content-protector-pack' ),
	'off-label' => __( 'No', 'content-protector-pack' ),
);*/
$fields['disable_cmd_alt_i'] = array(
	'name'      => __( 'Disable CMD+Option+I', 'content-protector-pack' ),
	'desc'      => __( 'Developer Tools', 'content-protector-pack' ),
	'type'      => 'switch',
	'id'        => 'disable_cmd_alt_i',
	'on-label'  => __( 'Yes', 'content-protector-pack' ),
	'off-label' => __( 'No', 'content-protector-pack' ),
);

/**
 * View Source Protection Tab
 */
$fields[] = array(
	'name' => __( 'View Source Protection', 'content-protector-pack' ),
	'id'   => 'view_source_protection_tab',
	'type' => 'tab',
	'icon' => 'fa-html5',
);

$fields['view_source_protection'] = array(
	'name' => __( 'View Source Protection', 'content-protector-pack' ),
	'type' => 'switch',
	'id'   => 'view_source_protection',
);

$fields['view_source_top_empty_lines'] = array(
	'name'      => __( 'Add Empty Line Before Source Codes', 'content-protector-pack' ),
	'type'      => 'switch',
	'id'        => 'view_source_top_empty_lines',
	'on-label'  => __( 'Yes', 'content-protector-pack' ),
	'off-label' => __( 'No', 'content-protector-pack' ),
	'show_on'   => array(
		array(
			'view_source_protection=1'
		)
	)
);

$fields['view_source_top_empty_lines_count'] = array(
	'name'    => __( 'Line of Empty Lines', 'content-protector-pack' ),
	'type'    => 'text',
	'id'      => 'view_source_top_empty_lines_count',
	'show_on' => array(
		array(
			'view_source_protection=1',
			'view_source_top_empty_lines=1'
		)
	)
);

$fields['view_source_shortcuts'] = array(
	'name'    => __( 'View Source Shortcut', 'content-protector-pack' ),
	'type'    => 'info',
	'id'      => 'view_source_shortcuts',
	'std'     => __( 'You can disable/enable view source shortcut (ctrl or cmd + u) from <br/> <code>Text Protection > Limit Windows Browsers Shortcuts</code> <br> and <br/><code>Text Protection > Limit Mac OS Shortcuts</code>', 'content-protector-pack' ),
	'show_on' => array(
		array(
			'view_source_protection=1'
		)
	)
);

/**
 * Disabled JavaScript Tab
 */
$fields[] = array(
	'name' => __( 'Disabled JavaScript', 'content-protector-pack' ),
	'id'   => 'disabled_js_protection_tab',
	'type' => 'tab',
	'icon' => 'fa-code',
);

$fields['disabled_js_protection']    = array(
	'name'    => __( 'Disabled JavaScript Protection', 'content-protector-pack' ),
	'id'      => 'disabled_js_protection',
	'type'    => 'select',
	'options' => array(
		'off'            => __( 'No Protection', 'content-protector-pack' ),
		'custom_message' => __( 'Only Display Custom Message', 'content-protector-pack' ),
		'force_redirect' => __( 'Force Redirect', 'content-protector-pack' ),
	),
);
$fields['disabled_js_message']       = array(
	'name' => __( 'Disabled JavaScript Custom Message', 'content-protector-pack' ),
	'id'   => 'disabled_js_message',
	'type' => 'wp_editor',

	'show_on' => array(
		array(
			'disabled_js_protection=custom_message'
		)
	)
);
$fields['disabled_js_redirect_page'] = array(
	'name'             => __( 'Redirect users to', 'content-protector-pack' ),
	'id'               => 'disabled_js_redirect_page',
	'type'             => 'select',
	'deferred-options' => 'cpp_list_pages',
	'show_on'          => array(
		array(
			'disabled_js_protection=force_redirect'
		)
	)
);

/**
 * Feed Protection Tab
 */
$fields[] = array(
	'name' => __( 'Feed Protection', 'content-protector-pack' ),
	'id'   => 'feed_protection_tab',
	'type' => 'tab',
	'icon' => 'fa-feed',
);

$fields['feed_protection'] = array(
	'name'    => __( 'Feed Protection', 'content-protector-pack' ),
	'id'      => 'feed_protection',
	'type'    => 'select',
	'options' => array(
		''         => __( 'Don\'t Protect Feed', 'content-protector-pack' ),
		'disable'  => __( 'Disable Feed', 'content-protector-pack' ),
		'redirect' => __( 'Redirect Feed page to Normal page', 'content-protector-pack' ),
	),
);

$fields['feed_footer_text'] = array(
	'name'    => __( 'Custom text at the end of the posts', 'content-protector-pack' ),
	'id'      => 'feed_footer_text',
	'type'    => 'wp_editor',
	'desc'    => __( 'Leave this field empty, if you don\'t want to append anything.', 'content-protector-pack' ),
	'show_on' => array(
		array(
			'feed_protection=disable'
		),
		array(
			'feed_protection='
		),
	),
);

/**
 * Print Protection Tab
 */
$fields[] = array(
	'name' => __( 'Print Protection', 'content-protector-pack' ),
	'id'   => 'print_protection_tab',
	'type' => 'tab',
	'icon' => 'fa-print',
);

$fields['print_protection'] = array(
	'name'    => __( 'Allow Users to Print Pages', 'content-protector-pack' ),
	'type'    => 'select',
	'id'      => 'print_protection',
	'options' => array(
		'no-protection'       => __( 'Allow to everyone', 'content-protector-pack' ),
		'full-protection'     => __( 'Disable and show blank page', 'content-protector-pack' ),
		'full-protection-msg' => __( 'Disable and show custom message', 'content-protector-pack' ),
	),
);

$fields['print_protection_custom_message'] = array(
	'name'    => __( 'Custom message', 'content-protector-pack' ),
	'type'    => 'wp_editor',
	'id'      => 'print_protection_custom_message',
	'show_on' => array(
		array(
			'print_protection=full-protection-msg',
		)
	),
);

/**
 * Iframe Protection Tab
 */
$fields[] = array(
	'name' => __( 'Iframe Protection', 'content-protector-pack' ),
	'id'   => 'iframe_protection_tab',
	'type' => 'tab',
	'icon' => 'fa-square-o',
);

$fields['iframe_protection'] = array(
	'name'    => __( 'Iframe Protection', 'content-protector-pack' ),
	'type'    => 'select',
	'id'      => 'iframe_protection',
	'options' => array(
		'no'       => __( 'No protection', 'content-protector-pack' ),
		'full'     => __( 'Block all iframe requests', 'content-protector-pack' ),
		'redirect' => __( 'Redirect to custom page.', 'content-protector-pack' ),
		'message'  => __( 'Show Custom Message.', 'content-protector-pack' ),
	),
);

$fields['iframe_protection_page'] = array(
	'name'             => __( 'Page to redirect', 'content-protector-pack' ),
	'id'               => 'iframe_protection_page',
	'type'             => 'select',
	'deferred-options' => 'cpp_list_pages',
	'show_on'          => array(
		array(
			'iframe_protection=redirect'
		)
	)
);

$fields['iframe_protection_message'] = array(
	'name'    => __( 'Custom Message', 'content-protector-pack' ),
	'id'      => 'iframe_protection_message',
	'type'    => 'wp_editor',
	'show_on' => array(
		array(
			'iframe_protection=message'
		)
	)
);

/**
 * Email Protection Tab
 */
$fields[] = array(
	'name' => __( 'Email Protection', 'content-protector-pack' ),
	'id'   => 'email_protection_tab',
	'type' => 'tab',
	'icon' => 'fa-envelope-o',
);


$fields['email_protection'] = array(
	'name'    => __( 'Iframe Protection', 'content-protector-pack' ),
	'type'    => 'select',
	'id'      => 'email_protection',
	'options' => array(
		'no'               => __( 'No protection', 'content-protector-pack' ),
		'text-obfuscation' => __( 'Obfuscate all email addresses', 'content-protector-pack' ),
	),
);

$fields['email_obfuscation_help'] = array(
	'name'    => __( 'Email Obfuscation ', 'content-protector-pack' ),
	'type'    => 'info',
	'id'      => 'email_obfuscation_help',
	'std'     => __( 'With obfuscation enabled option, robots, scrappers and spiders can\'t read email addresses in posts content but humans are still able to read it.', 'content-protector-pack' ),
	'show_on' => array(
		array(
			'email_protection=text-obfuscation'
		)
	)
);

/**
 * Advanced options Tab
 */
$fields[] = array(
	'name' => __( 'Advanced Options', 'content-protector-pack' ),
	'id'   => 'advanced_tab',
	'type' => 'tab',
	'icon' => 'fa-filter',
);

$fields['filter_by_users'] = array(
	'name'    => __( 'Filter by users', 'content-protector-pack' ),
	'type'    => 'select',
	'id'      => 'filter_by_users',
	'options' => array(
		'off'             => __( 'No filter', 'content-protector-pack' ),
		'guests'          => __( 'Guest users', 'content-protector-pack' ),
		'specified_roles' => __( 'Guests and specified users', 'content-protector-pack' ),
	),
);

$fields['filter_users_role'] = array(
	'name'             => __( 'User roles', 'content-protector-pack' ),
	'id'               => 'filter_users_role',
	'type'             => 'select',
	'multiple'         => true,
	'deferred-options' => 'cpp_list_user_roles',
	'show_on'          => array(
		array(
			'filter_by_users=specified_roles'
		)
	)
);

$fields['filter_by_posts'] = array(
	'name'    => __( 'Filter by pages', 'content-protector-pack' ),
	'type'    => 'select',
	'id'      => 'filter_by_posts',
	'options' => array(
		'off'             => __( 'No filter', 'content-protector-pack' ),
		'all_except_home' => __( 'All pages except homepage', 'content-protector-pack' ),
		'specified_pages' => __( 'Custom pages', 'content-protector-pack' ),
	),
);


$fields['filter_posts'] = array(
	'name'    => __( 'Protect Posts', 'content-protector-pack' ),
	'type'    => 'switch',
	'id'      => 'filter_posts',
	'show_on' => array(
		array(
			'filter_by_posts=specified_pages'
		)
	),
);

$fields['filter_pages'] = array(
	'name'    => __( 'Protect pages', 'content-protector-pack' ),
	'type'    => 'switch',
	'id'      => 'filter_pages',
	'show_on' => array(
		array(
			'filter_by_posts=specified_pages'
		)
	),
);

$fields['filter_exclude_pages_list'] = array(
	'name'             => __( 'List of pages to exclude', 'content-protector-pack' ),
	'id'               => 'filter_exclude_pages_list',
	'type'             => 'select',
	'multiple'         => true,
	'deferred-options' => 'cpp_list_pages',
	'show_on'          => array(
		array(
			'filter_by_posts=specified_pages',
			'filter_pages=1',
		)
	)
);

$fields['filter_taxonomies'] = array(
	'name'    => __( 'Protect taxonomies', 'content-protector-pack' ),
	'type'    => 'switch',
	'id'      => 'filter_taxonomies',
	'show_on' => array(
		array(
			'filter_by_posts=specified_pages'
		)
	),
);

$fields['filter_taxonomies_list'] = array(
	'name'             => __( 'List of taxonomies to protect', 'content-protector-pack' ),
	'id'               => 'filter_taxonomies_list',
	'type'             => 'select',
	'multiple'         => true,
	'deferred-options' => 'cpp_list_taxonomies',
	'show_on'          => array(
		array(
			'filter_by_posts=specified_pages',
			'filter_taxonomies=1',
		)
	)
);

$fields['filter_post_types'] = array(
	'name'    => __( 'Protect custom post types', 'content-protector-pack' ),
	'type'    => 'switch',
	'id'      => 'filter_post_types',
	'show_on' => array(
		array(
			'filter_by_posts=specified_pages'
		)
	),
);

$fields['filter_post_types_list'] = array(
	'name'             => __( 'Post types list', 'content-protector-pack' ),
	'id'               => 'filter_post_types_list',
	'type'             => 'select',
	'multiple'         => true,
	'deferred-options' => 'cpp_list_post_types',
	'show_on'          => array(
		array(
			'filter_by_posts=specified_pages',
			'filter_post_types=1',
		)
	)
);

/**
 * => Import & Export
 */
bf_inject_panel_import_export_fields( $fields, array(
	'panel-id'         => 'content-protector-pack',
	'export-file-name' => 'content-protector-pack-backup',
) );
