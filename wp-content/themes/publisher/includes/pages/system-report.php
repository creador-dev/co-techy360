<?php

/**
 * callback: config system report tabs settings
 * filter: bs-product-pages/system-report/config
 *
 * @return array
 */
function publisher_bs_pages_report_params( $params ) {

	$params['theme_version'] = array(
		'box-settings' => array(
			'header'   => sprintf( __( '%s Versions', 'publisher' ), publisher_white_label_get_option( 'publisher' ) ),
			'position' => 10
		),
		'items'        => array(
			//display theme version
			array(
				'type'  => 'wp_theme.version',
				'label' => __( 'Version', 'publisher' )
			),
			//display custom field
			array(
				'type'  => 'bs_pages.history',
				'label' => __( 'History', 'publisher' ),
				'value' => ' - '
			),
		)
	);

	$params['wordpress_env'] = array(

		'box-settings' => array(
			'header'   => __( 'WordPress Environment', 'publisher' ),
			'position' => 15,
			'icon'     => 'fa-wordpress'
		),
		'items'        => array(
			array(
				'type'  => 'bloginfo.url',
				'label' => __( 'Home URL:', 'publisher' ),
				'help'  => __( 'Display home url', 'publisher' ),
			),
			//display site url
			array(
				'type'  => 'bloginfo.wpurl',
				'label' => __( 'Site URL:', 'publisher' ),
				'help'  => __( 'Display site url', 'publisher' )
			),
			//login url
			array(
				'type'  => 'wp.login_url',
				'label' => __( 'Login URL:', 'publisher' ),
				'help'  => __( 'Display login url', 'publisher' )
			),
			// WP version
			array(
				'type'  => 'wp.version',
				'label' => __( 'WP Version:', 'publisher' ),
				'help'  => __( 'WordPress version', 'publisher' )
			),
			// WP Memory Limit
			array(
				'type'     => 'wp.memory_limit',
				'label'    => __( 'WP Memory Limit:', 'publisher' ),
				'help'     => __( 'WP Memory Limit', 'publisher' ),
				'settings' => array(
					'standard_value' => '128M',
					'minimum_value'  => '64M'
				)
			),
			// php Memory Limit
			array(
				'type'  => 'ini.memory_limit',
				'label' => __( 'PHP Memory Limit:', 'publisher' ),
				'help'  => __( 'PHP Memory Limit', 'publisher' ),
			),
			// WP Debug Mode
			array(
				'type'  => 'wp.debug_mode',
				'label' => __( 'WP Debug Mode:', 'publisher' ),
				'help'  => __( 'WP Debug Mode', 'publisher' )
			),
			// WP Language
			array(
				'type'  => 'func.get_locale',
				'label' => __( 'WP Language:', 'publisher' ),
				'help'  => __( 'WP Language', 'publisher' )
			),
			// WP multisite check
			array(
				'type'     => 'func.is_multisite',
				'label'    => __( 'WP multisite enabled:', 'publisher' ),
				'help'     => __( 'check multisite enabled', 'publisher' ),
				'settings' => array(
					'hide_mark' => true
				)
			),
			// cache plugin checker
			array(
				'type'  => 'wp.cache_exists',
				'label' => __( 'Caching plugin:', 'publisher' ),
				'help'  => __( 'cache plugin', 'publisher' ),
			),
		)
	);

	$params['server_info'] = array(
		'box-settings' => array(
			'header'   => __( 'Server Environment', 'publisher' ),
			'position' => 20
		),
		'items'        => array(
			//web server
			array(
				'type'  => 'server.web_server',
				'label' => __( 'Server Info:', 'publisher' ),
				'help'  => __( 'web server help text', 'publisher' ),
			),
			//php version
			array(
				'type'  => 'server.php_version',
				'label' => __( 'PHP Version:', 'publisher' ),
				'help'  => __( 'PHP Version help', 'publisher' ),
			),
			//mysql version
			array(
				'type'  => 'server.mysql_version',
				'label' => __( 'Mysql Version:', 'publisher' ),
				'help'  => __( 'mysql Version help', 'publisher' ),
			),
			//PHP Post Max Size
			array(
				'type'  => 'ini.post_max_size',
				'label' => __( 'PHP Post Max Size:', 'publisher' ),
				'help'  => __( 'Post Max Upload Size', 'publisher' ),
			),
			//PHP max upload size
			array(
				'type'  => 'wp.max_upload_size',
				'label' => __( 'Max Upload Size:', 'publisher' ),
				'help'  => __( 'Max Upload Size', 'publisher' ),
			),
			//PHP execution time limit
			array(
				'type'              => 'ini.max_execution_time',
				'label'             => __( 'PHP Time Limit:', 'publisher' ),
				'after_description' => __( ' Second', 'publisher' ),
				'help'              => __( 'PHP Time Limit', 'publisher' ),
				'settings'          => array(
					'standard_value' => '20',
					'minimum_value'  => '10'
				)
			),
			//PHP max input vars
			array(
				'type'     => 'ini.max_input_vars',
				'label'    => __( 'PHP MAX Input Vars:', 'publisher' ),
				'help'     => __( 'PHP MAX Input Vars', 'publisher' ),
				'settings' => array(
					'standard_value' => '1500',
					'minimum_value'  => '1000'
				)
			),
			//SUHOSIN checker
			array(
				'type'  => 'server.suhosin_installed',
				'label' => __( 'SUHOSIN Installed:', 'publisher' ),
				'help'  => __( 'check SUHOSIN Installed?', 'publisher' ),
			),
			//ZipArchive exists
			array(
				'type'  => 'server.zip_archive',
				'label' => __( 'ZipArchive:', 'publisher' ),
				'help'  => __( 'ZipArchive help', 'publisher' ),
			),
			//check remote_get
			array(
				'type'  => 'server.remote_get',
				'label' => __( 'WP Remote Get:', 'publisher' ),
				'help'  => __( 'WP Remote Get', 'publisher' ),
			),
			//check remote_post
			array(
				'type'  => 'server.remote_post',
				'label' => __( 'WP Remote Post:', 'publisher' ),
				'help'  => __( 'WP Remote Post', 'publisher' ),
			),
		)
	);


	if ( is_child_theme() &&
	     is_callable( 'BF_Template_Compatibility::do_compatibility' )
	) {
		$params['overrided_templates'] = array(
			'box-settings' => array(
				'header'    => __( 'Outdated Template Files', 'publisher' ),
				'position'  => 50,
				'operation' => 'template-compatibility'
			),
		);
	}

	$params['active_plugins'] = array(
		'box-settings' => array(
			'header'    => __( 'Active Plugins (%%count%%)', 'publisher' ),
			'position'  => 55,
			'operation' => 'list-active-plugin'
		),
	);

	$params['export'] = array(
		'box-settings' => array(
			'header'    => __( 'Get system report', 'publisher' ),
			'position'  => 5,
			'operation' => 'report-export'
		),
	);

	return $params;
}

add_filter( 'better-framework/product-pages/system-report/config', 'publisher_bs_pages_report_params' );