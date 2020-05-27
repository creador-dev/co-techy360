<?php
/**
 * BS Product Pages Configuration
 */

add_filter( 'better-framework/product-pages/loader', 'publisher_register_bs_product_pages' );

if ( ! function_exists( 'publisher_register_bs_product_pages' ) ) {
	/**
	 * Registers theme bs_product_pages version to its initializer
	 *
	 * @param $frameworks
	 *
	 * @return array
	 */
	function publisher_register_bs_product_pages( $frameworks ) {

		$frameworks[] = array(
			'version' => '1.0.1',
			'path'    => bf_get_theme_dir( 'includes/libs/bs-product-pages' ),
			'uri'     => bf_get_theme_uri( 'includes/libs/bs-product-pages' ),
		);

		return $frameworks;
	}
}

add_filter( 'better-framework/product-pages/config', 'publisher_config_product_pages' );

if ( ! function_exists( 'publisher_config_product_pages' ) ) {
	/**
	 * Configuration for pages in BS Product Pages
	 *
	 * @return array
	 */
	function publisher_config_product_pages() {

		$admin_url = admin_url();

		//		bf_var_export_exit(publisher_white_label_get_option( 'theme_icon' ));

		return array(

			'menu_title'    => publisher_white_label_get_option( 'publisher' ),
			'menu_icon'     => publisher_white_label_get_option( 'theme_icon' ),
			'ID'            => publisher_white_label_get_option( 'theme_slug' ),
			'product_name'  => publisher_white_label_get_option( 'publisher' ),
			'product_type'  => 'theme',
			'notice-icon'   => PUBLISHER_THEME_URI . 'images/admin/notice-logo.png',
			'version'       => '1.0.0',
			'menu_position' => '3',

			'welcome' => sprintf( __( '
				<h3 class="heading"> Welcome to %s </h3>
				%s is now installed and ready to use! Get ready to build something beautiful. We hope you
				enjoy it!
		', 'publisher' ), publisher_white_label_get_option( 'publisher' ), publisher_white_label_get_option( 'publisher' ) ),

			'pages' => array(


				'welcome' => array(
					'name'          => __( 'Welcome', 'publisher' ),
					'menu_title'    => __( 'Welcome', 'publisher' ),
					'type'          => 'welcome',
					'menu_position' => 10,
				),

				'install-plugin' => array(
					'name'          => __( 'Plugins', 'publisher' ),
					'menu_title'    => __( 'Plugins', 'publisher' ),
					'type'          => 'plugins',
					'menu_position' => 30,

					'tab' => array(
						'header' => __( '
									<h4 class="heading"> Premium and Included Plugins </h4>

				<p>
					Install the included plugins with ease using this panel. All the plugins are well tested to work
					with
					the theme and we keep them up to date. The themes comes packed with the following plugins:
				</p>', 'publisher' ),
					)
				),

				'install-demo' => array(
					'name'          => __( 'Install Demos', 'publisher' ),
					'type'          => 'install-demo',
					'menu_position' => 40,

					'tab' => array(
						'label'   => __( 'Install Demos', 'publisher' ),
						'classes' => array(),
						'header'  => sprintf( __( '
				<h4 class="heading"> %s Demos </h4>

				<p>
 %s brings you a number of unique designs for your website. Our demos were carefully tested so you don&#x2019;t have to create everything from scratch. With the theme demos you know exactly which predefined templates is perfectly designed to start build upon. Each demo is fully customizable (fonts, colors and layouts).
				</p>
					', 'publisher' ), publisher_white_label_get_option( 'publisher' ), publisher_white_label_get_option( 'publisher' ) ),
					)
				),

				'theme-options' => array(
					'name'          => __( 'Theme Options', 'publisher' ),
					'type'          => 'tab_link',
					'tab_link'      => $admin_url . 'admin.php?page=better-studio/' . publisher_white_label_get_option( 'theme_slug' ),
					'menu_position' => 50,
				),

				'theme-translation' => array(
					'name'          => __( 'Theme Translation', 'publisher' ),
					'type'          => 'tab_link',
					'tab_link'      => $admin_url . 'admin.php?page=better-studio/translations/theme-translation',
					'menu_position' => 55,
				),

				'support' => array(
					'name'          => __( 'Support', 'publisher' ),
					'type'          => 'support',
					'menu_position' => 100,
					'tab'           => array(
						'header' => __( '<h4 class="heading">Out standing 5 star support</h4>

				<p>
					We care our product because know it needs support it\'s the reason why our customers are top priority and we do all presure to fix all issues.
					Our team is working hardly to help every customer, fix issues, keep documentation up to date, create new demos and develop new tools to make it more easily and powerful.
				</p><hr>', 'publisher' ),
					)
				),
				'report'  => array(
					'name'          => __( 'System Report', 'publisher' ),
					'type'          => 'report',
					'menu_position' => 90
				),

			)
		);
	} // publisher_config_product_pages
}

// Config  system report
include PUBLISHER_THEME_PATH . 'includes/pages/system-report.php';

// Welcome page config
add_action( 'better-framework/product-pages/page/welcome/loaded', 'publisher_bs_pages_welcome_page' );

function publisher_bs_pages_welcome_page() {

	wp_enqueue_style( 'publisher-welcome', bf_get_theme_uri( 'includes/pages/assets/css/welcome.css' ), array(), Better_Framework()->theme()->get( 'Version' ) );
	include bf_get_theme_dir( 'includes/pages/welcome.php' );
}

// Config Support
add_filter( 'better-framework/product-pages/support/config', 'publisher_bf_pages_support_params' );

function publisher_bf_pages_support_params( $items ) {

	$items['support-forum'] = array(
		'icon'        => 'fa-support',
		'header'      => __( ' Support forum', 'publisher' ),
		'buttons'     => array(
			array(
				'label'  => __( 'Open Forum', 'publisher' ),
				'class'  => 'bf-btn-primary',
				'target' => '_blank',
				'url'    => 'http://community.betterstudio.com/',
			),
		),
		'description' => sprintf( __( ' We offer outstanding support through our forum.
		To get support first you need to register (create an account) and open a thread in the %s Section. ', 'publisher' ), publisher_white_label_get_option( 'publisher' ) ),
	);

	$items['documentation'] = array(
		'icon'        => 'fa-book',
		'header'      => __( 'Documentation', 'publisher' ),
		'buttons'     => array(
			array(
				'label'  => __( 'Open Documentation', 'publisher' ),
				'class'  => 'bf-btn-primary',
				'target' => '_blank',
				'url'    => 'http://docs.betterstudio.com/publisher/',
			),
		),
		'description' => __( 'This is the place to go to reference different aspects of the theme. Our online documentation is an incredible resource for learning the ins and outs of theme.', 'publisher' )
	);

	$items['video-tutorials'] = array(
		'icon'        => 'fa-youtube-play',
		'header'      => __( 'Video Tutorials', 'publisher' ),
		'buttons'     => array(
			array(
				'label'  => __( 'Open Video Tutorials', 'publisher' ),
				'class'  => 'bf-btn-primary',
				'target' => '_blank',
				'url'    => 'https://www.youtube.com/playlist?list=PLsOOLqxZvZWB-XyKBjkuZ26jT25QVNDl9',
			),
		),
		'description' => sprintf( __( 'We created video tutorials for using all sections of %s and also we note advanced tips and tricks in using theme.', 'publisher' ), publisher_white_label_get_option( 'publisher' ) )
	);

	$items['knowledge-base'] = array(
		'icon'        => 'fa-archive',
		'header'      => __( 'Knowledge Base', 'publisher' ),
		'buttons'     => array(
			array(
				'label' => __( 'Coming soon', 'publisher' ),
				'class' => 'bf-btn-primary',
				'url'   => 'http://community.betterstudio.com/',
			),
		),
		'description' => __( ' Our knowledge base contains additional content that is not inside of our documentation. This information is more specific and unique to various versions or aspects of theme. ', 'publisher' )
	);


	return $items;
}

add_filter( 'better-framework/product-updater/product-info', 'publisher_bs_product_updater_params' );
function publisher_bs_product_updater_params( $items ) {

	$items[] = publisher_bs_register_product_params();

	return $items;
}
