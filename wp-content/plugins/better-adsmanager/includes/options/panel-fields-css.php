<?php

$fields[]                     = array(
	'name'       => __( 'Custom CSS/JS', 'better-studio' ),
	'id'         => 'custom_css_settings',
	'type'       => 'tab',
	'icon'       => 'bsai-css3',
	'margin-top' => '20',
);
$fields['custom_css_code']    = array(
	'name'       => __( 'Custom CSS Code', 'better-studio' ),
	'id'         => 'custom_css_code',
	'type'       => 'textarea',
	'desc'       => __( 'Paste your CSS code, do not include any tags or HTML in the field. Any custom CSS entered here will override the theme CSS. In some cases, the !important tag may be needed.', 'better-studio' ),
	'input-desc' => __( 'Please <strong>do not</strong> put code inside &lt;style&gt;&lt;/style&gt; tags.', 'better-studio' ),
);
$fields['custom_header_code'] = array(
	'name'       => __( 'HTML/JS Code before &lt;/head&gt;', 'better-studio' ),
	'id'         => 'custom_header_code',
	'input-desc' => __( 'Please put js code inside &lt;script&gt;&lt;/script&gt; tags.', 'better-studio' ),
	'type'       => 'textarea',
	'desc'       => __( 'This code will be placed before &lt;/head&gt; tag in html. Useful if you have an external script that requires it.', 'better-studio' )
);
