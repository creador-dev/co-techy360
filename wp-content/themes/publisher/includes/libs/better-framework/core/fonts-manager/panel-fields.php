<?php
/***
 *  BetterFramework is BetterStudio framework for themes and plugins.
 *
 *  ______      _   _             ______                                           _
 *  | ___ \    | | | |            |  ___|                                         | |
 *  | |_/ / ___| |_| |_ ___ _ __  | |_ _ __ __ _ _ __ ___   _____      _____  _ __| | __
 *  | ___ \/ _ \ __| __/ _ \ '__| |  _| '__/ _` | '_ ` _ \ / _ \ \ /\ / / _ \| '__| |/ /
 *  | |_/ /  __/ |_| ||  __/ |    | | | | | (_| | | | | | |  __/\ V  V / (_) | |  |   <
 *  \____/ \___|\__|\__\___|_|    \_| |_|  \__,_|_| |_| |_|\___| \_/\_/ \___/|_|  |_|\_\
 *
 *  Copyright © 2017 Better Studio
 *
 *
 *  Our portfolio is here: https://betterstudio.com/
 *
 *  \--> BetterStudio, 2018 <--/
 */


//
// Custom Fonts
//
$fields[]               = array(
	'name' => __( 'Custom Fonts', 'publisher' ),
	'id'   => 'custom_fonts_tab',
	'type' => 'tab',
	'icon' => 'bsai-add',
);
$custom_fonts           = array();
$custom_fonts['id']     = array(
	'name'            => __( 'Font Name', 'publisher' ),
	'id'              => 'id',
	'std'             => '',
	'type'            => 'text',
	'container_class' => 'better-custom-fonts-id',
	'section_class'   => 'full-with-both',
	'repeater_item'   => true
);
$custom_fonts['woff']   = array(
	'name'            => __( 'Font .woff', 'publisher' ),
	'button_text'     => __( 'Upload .woff', 'publisher' ),
	'id'              => 'woff',
	'std'             => '',
	'type'            => 'media',
	'container_class' => 'better-custom-fonts-woff',
	'section_class'   => 'full-with-both',
	'repeater_item'   => true
);
$custom_fonts['woff2']  = array(
	'name'            => __( 'Font .woff2', 'publisher' ),
	'button_text'     => __( 'Upload .woff2', 'publisher' ),
	'id'              => 'woff2',
	'std'             => '',
	'type'            => 'media',
	'container_class' => 'better-custom-fonts-woff2',
	'section_class'   => 'full-with-both',
	'repeater_item'   => true
);
$custom_fonts['ttf']    = array(
	'name'            => __( 'Font .ttf', 'publisher' ),
	'button_text'     => __( 'Upload .ttf', 'publisher' ),
	'id'              => 'ttf',
	'std'             => '',
	'type'            => 'media',
	'container_class' => 'better-custom-fonts-ttf',
	'section_class'   => 'full-with-both',
	'repeater_item'   => true
);
$custom_fonts['svg']    = array(
	'name'            => __( 'Font .svg', 'publisher' ),
	'button_text'     => __( 'Upload .svg', 'publisher' ),
	'id'              => 'svg',
	'std'             => '',
	'type'            => 'media',
	'container_class' => 'better-custom-fonts-svg',
	'section_class'   => 'full-with-both',
	'repeater_item'   => true
);
$custom_fonts['eot']    = array(
	'name'            => __( 'Font .eot', 'publisher' ),
	'button_text'     => __( 'Upload .eot', 'publisher' ),
	'id'              => 'eot',
	'std'             => '',
	'type'            => 'media',
	'container_class' => 'better-custom-fonts-eot',
	'section_class'   => 'full-with-both',
	'repeater_item'   => true
);
$custom_fonts['otf']    = array(
	'name'            => __( 'Font .otf', 'publisher' ),
	'button_text'     => __( 'Upload .otf', 'publisher' ),
	'id'              => 'otf',
	'std'             => '',
	'type'            => 'media',
	'container_class' => 'better-custom-fonts-otf',
	'section_class'   => 'full-with-both',
	'repeater_item'   => true
);
$fields['custom_fonts'] = array(
	'name'          => __( 'Upload Custom Fonts', 'publisher' ),
	'id'            => 'custom_fonts',
	'type'          => 'repeater',
	'save-std'      => true,
	'delete_label'  => __( 'Delete Font', 'publisher' ),
	'item_title'    => __( 'Custom Font', 'publisher' ),
	'section_class' => 'full-with-both',
	'options'       => $custom_fonts
);


//
// TypeKit Fonts
//
$fields[]                = array(
	'name' => __( 'TypeKit Fonts', 'publisher' ),
	'id'   => 'typekit_tab',
	'type' => 'tab',
	'icon' => 'bsai-typekit',
);
$fields[]                = array(
	'name'          => __( 'What is TypeKit?', 'publisher' ),
	'id'            => '_typekit-help',
	'type'          => 'info',
	'std'           => __( 'TypeKit offer a service that allows you to select from a range of hundreds of high quality fonts for your WordPress website. The fonts are applied using the font-face standard, so they are standards compliant, fully licensed and accessible.', 'publisher' ),
	'state'         => 'open',
	'info-type'     => 'warning',
	'section_class' => 'widefat',
);
$fields[]                = array(
	'name'          => __( 'How to setup TypeKit?', 'publisher' ),
	'id'            => '_typekit-setup',
	'type'          => 'info',
	'std'           => __( '<ol>
                <li>Go To <a href="https://goo.gl/mKugDo" target="_blank">typekit.com</a> and register for an account</li>
                <li>Choose a few fonts to add to your account and Publish them.</li>
                <li>Go to the <strong>Kit Editor</strong> and get your <strong>Embed Code</strong> (link at the top right of the screen)</li>
                <li>Copy the whole 2 lines of your embed code into the following <strong>TypeKit Embed Code</strong> field.</li>
                <li>You have to add fonts of your TypeKit kit into following the <strong>Kit Fonts List</strong> field.</li>
                <li>Done, You can select TypeKit fonts from panels in typography field.</li>
            </ol>', 'publisher' ),
	'state'         => 'open',
	'info-type'     => 'help',
	'section_class' => 'widefat',
);
$fields['typekit_code']  = array(
	'name' => __( 'TypeKit Embed Code', 'publisher' ),
	'desc' => __( 'Enter the whole 2 lines of your kit embed code into this field. Create new item for each font.', 'publisher' ),
	'id'   => 'typekit_code',
	'type' => 'textarea',
);
$tk_font['name']         = array(
	'name'            => __( 'Font Name', 'publisher' ),
	'desc'            => __( 'Name that will be shown in panel fields', 'publisher' ),
	'id'              => 'id',
	'std'             => '',
	'type'            => 'text',
	'container_class' => 'better-font-stack-name',
	'section_class'   => 'full-with-both',
	'repeater_item'   => true
);
$tk_font['id']           = array(
	'name'            => __( 'Font Family ID', 'publisher' ),
	'desc'            => __( 'Font family ID of selected font in TypeKit. Ex: fair-sans', 'publisher' ),
	'id'              => 'id',
	'std'             => '',
	'type'            => 'text',
	'container_class' => 'better-font-stack-stack',
	'section_class'   => 'full-with-both',
	'repeater_item'   => true
);
$fields['typekit_fonts'] = array(
	'name'          => __( 'Kit Fonts List', 'publisher' ),
	'desc'          => __( 'Enter fonts of your kit into following fields to can select it from fonts selector popup in panels.', 'publisher' ),
	'id'            => 'typekit_fonts',
	'type'          => 'repeater',
	'save-std'      => true,
	'add_label'     => '<i class="fa fa-plus"></i> ' . __( 'Add New TypeKit Font', 'publisher' ),
	'delete_label'  => __( 'Delete Font', 'publisher' ),
	'item_title'    => __( 'TypeKit Fonts', 'publisher' ),
	'section_class' => 'full-with-both',
	'options'       => $tk_font
);


//
// Fonts Stacks
//
$fields[]              = array(
	'name' => __( 'Font Stacks', 'publisher' ),
	'id'   => 'font_stacks_tab',
	'type' => 'tab',
	'icon' => 'bsai-font',
);
$font_stacks['id']     = array(
	'name'            => __( 'Font Name', 'publisher' ),
	'id'              => 'id',
	'std'             => '',
	'type'            => 'text',
	'container_class' => 'better-font-stack-name',
	'section_class'   => 'full-with-both',
	'repeater_item'   => true
);
$font_stacks['stack']  = array(
	'name'            => __( 'Font Stack', 'publisher' ),
	'id'              => 'stack',
	'std'             => '',
	'type'            => 'text',
	'container_class' => 'better-font-stack-stack',
	'section_class'   => 'full-with-both',
	'repeater_item'   => true
);
$fields['font_stacks'] = array(
	'name'          => __( 'Web Safe CSS Font Stacks', 'publisher' ),
	'id'            => 'font_stacks',
	'type'          => 'repeater',
	'save-std'      => true,
	'add_label'     => '<i class="fa fa-plus"></i> ' . __( 'Add New Font Stack', 'publisher' ),
	'delete_label'  => __( 'Delete Font Stack', 'publisher' ),
	'item_title'    => __( 'CSS Font Stack', 'publisher' ),
	'section_class' => 'full-with-both',
	'options'       => $font_stacks
);


//
// Advanced Options
//
$fields[] = array(
	'name' => __( 'Advanced', 'publisher' ),
	'id'   => 'typo_opt_tab',
	'type' => 'tab',
	'icon' => 'bsai-gear',
);
$fields[] = array(
	'name'          => __( 'Google Fonts Protocol', 'publisher' ),
	'id'            => 'google_fonts_protocol',
	'desc'          => __( 'Select protocol of fonts link for Google Fonts.', 'publisher' ),
	'std'           => 'http',
	'type'          => 'select',
	'section_class' => 'style-floated-left',
	'options'       => array(
		'http'     => __( 'HTTP', 'publisher' ),
		'https'    => __( 'HTTPs', 'publisher' ),
		'relative' => __( 'Relative to Site', 'publisher' ),
	),
);
$fields[] = array(
	'name'  => __( 'Typography Field Preview Texts', 'publisher' ),
	'type'  => 'group',
	'state' => 'not',
);
$fields[] = array(
	'name' => __( 'Font modal preview text', 'publisher' ),
	'id'   => 'typo_text_font_manager',
	'type' => 'text',
);
$fields[] = array(
	'name' => __( 'Heading Text', 'publisher' ),
	'id'   => 'typo_text_heading',
	'type' => 'text',
);
$fields[] = array(
	'name' => __( 'Paragraph Text', 'publisher' ),
	'id'   => 'typo_text_paragraph',
	'type' => 'textarea',
);
$fields[] = array(
	'name' => __( 'Divided Text', 'publisher' ),
	'id'   => 'typo_text_divided',
	'type' => 'textarea',
);


//
// Backup & restore
//
$fields[] = array(
	'name'       => __( 'Backup & Restore', 'publisher' ),
	'id'         => 'backup_restore',
	'type'       => 'tab',
	'icon'       => 'bsai-export-import',
	'margin-top' => '30',
);
$fields[] = array(
	'name'      => __( 'Backup / Export', 'publisher' ),
	'id'        => 'backup_export_options',
	'type'      => 'export',
	'file_name' => 'custom-fonts-backup',
	'panel_id'  => $this->option_panel_id,
	'desc'      => __( 'This allows you to create a backup of your translation. Please note, it will not backup anything else.', 'publisher' )
);
$fields[] = array(
	'name'     => __( 'Restore / Import', 'publisher' ),
	'id'       => 'import_restore_options',
	'type'     => 'import',
	'panel_id' => $this->option_panel_id,
	'desc'     => __( '<strong>It will override your current translation!</strong> Please make sure to select a valid translation file.', 'publisher' ),
);

