<?php


if ( ! function_exists( 'publisher_white_label_get_option' ) ) {
	/**
	 * Get option from white label panel
	 *
	 * @param string $id Option Key
	 *
	 * @return mixed
	 */
	function publisher_white_label_get_option( $id = '' ) {

		static $options;

		//
		// Retrieve options form database
		//
		if ( is_null( $options ) ) {
			$options = get_option( 'publisher-white-label' );

			if ( $options == false || ! isset( $options['white_label'] ) ) {
				$options = array(
					'white_label' => false,
				);
			}

		}


		// From saved
		if ( ! empty( $options['white_label'] ) && ! empty( $options[ $id ] ) ) {

			// font code is not valid
			if ( $id === 'theme_icon' && empty( $options[ $id ]['font_code'] ) ) {
				return array(
					'icon'      => 'bsfi-publisher',
					'type'      => 'bs-icons',
					'height'    => '',
					'width'     => '',
					'font_code' => '\b024',
					'font_name' => 'bs-icons',
				);
			}

			return $options[ $id ];
		}

		// Change theme slug to "theme" when user changes theme name
		// prevents utf8 characters issue
		if ( $id === 'theme_slug' ) {
			$publisher = publisher_white_label_get_option( 'publisher' );

			if ( $publisher !== __( 'Publisher', 'publisher' ) ) {
				return 'theme';
			} else {
				return 'publisher';
			}
		}

		$default = array(
			'publisher'       => __( 'Publisher', 'publisher' ),
			'theme_icon'       => array(
				'icon'      => 'bsfi-publisher',
				'type'      => 'bs-icons',
				'height'    => '',
				'width'     => '',
				'font_code' => '\b024',
				'font_name' => 'bs-icons',
			),
			'theme_login_logo' => '',
			'welcome_title'    => '',
			'welcome_text'     => '',
			'only_user'        => '',
		);

		return $default[ $id ];
	}
}


$white_label_panel = false;

//
// Panel only for logged in users
//
if ( is_admin() ) {

	// specific user selected in panel
	$user = publisher_white_label_get_option( 'only_user' );

	if ( $user ) {
		$current_user = wp_get_current_user();

		// specific user is current user
		if ( $current_user->get( 'ID' ) === $user ) {
			$white_label_panel = true;
		}
	} else {
		$white_label_panel = true;
	}
}

if ( $white_label_panel ) {
	add_filter( 'better-framework/panel/add', 'publisher_white_label_panel_add', 10 );
	add_filter( 'better-framework/panel/publisher-white-label/config', 'publisher_white_label_panel_config', 10 );
	add_filter( 'better-framework/panel/publisher-white-label/fields', 'publisher_white_label_panel_fields', 10 );
	add_filter( 'better-framework/panel/publisher-white-label/std', 'publisher_white_label_panel_std', 10 );
}


if ( ! function_exists( 'publisher_white_label_panel_add' ) ) {
	/**
	 * Callback: White label panel
	 *
	 * Filter: better-framework/panel/options
	 *
	 * @param $panels
	 *
	 * @return mixed
	 */
	function publisher_white_label_panel_add( $panels ) {

		$panels['publisher-white-label'] = array(
			'id' => 'publisher-white-label',
		);

		return $panels;
	}
}


if ( ! function_exists( 'publisher_white_label_panel_config' ) ) {
	/**
	 * Callback: Init's BF options
	 *
	 * @param $panel
	 *
	 * @return mixed
	 */
	function publisher_white_label_panel_config( $panel ) {

		$panel = array(
			'panel-name'  => _x( 'Publisher White Label', 'Panel title', 'publisher' ),
			'panel-desc'  => '<p>' . __( 'Create your own brand easily!', 'publisher' ) . '</p>',
			'theme-panel' => true,

			'config' => array(
				'name'       => __( 'Publisher White Label', 'publisher' ),
				'parent'     => 'bs-product-pages-welcome',
				'slug'       => 'better-studio/white-label',
				'page_title' => __( 'Publisher White Label', 'publisher' ),
				'menu_title' => __( 'White Label', 'publisher' ) . ' <span class="bs-admin-menu-badge bs-admin-menu-badge-smaller">' . __( 'New', 'publisher' ) . '</span>',
				'capability' => 'manage_options',
				'menu_slug'  => __( 'Publisher White Label', 'publisher' ),
				'icon_url'   => NULL,
				'position'   => 70,
			),
		);

		return $panel;

	} // publisher_panel_config
}


if ( ! function_exists( 'publisher_white_label_panel_fields' ) ) {
	/**
	 * Callback: Init's BF options
	 *
	 * Filter: better-framework/panel/options
	 *
	 * @param $fields
	 *
	 * @return mixed
	 */
	function publisher_white_label_panel_fields( $fields ) {

		$fields['white_label'] = array(
			'name'      => __( 'Activate White Label?', 'publisher' ),
			'desc'      => __( 'You can rename Publisher to any name you like by enabling this option.', 'publisher' ),
			'id'        => 'white_label',
			'type'      => 'switch',
			'on-label'  => __( 'Yes', 'publisher' ),
			'off-label' => __( 'No', 'publisher' ),
		);

		$fields[] = array(
			'name'    => __( 'Publisher Branding', 'publisher' ),
			'type'    => 'heading',
			'show_on' => array(
				array(
					'white_label=1'
				)
			),
		);

		$fields['publisher'] = array(
			'name'       => __( 'Theme Name:', 'publisher' ),
			'desc'       => __( 'Enter new name for theme.', 'publisher' ),
			'input-desc' => __( 'Don\'t enter long name. ', 'publisher' ),
			'id'         => 'publisher',
			'type'       => 'text',
			'show_on'    => array(
				array(
					'white_label=1'
				)
			)
		);

		$fields['theme_icon'] = array(
			'name'       => __( 'Theme Small Icon', 'publisher' ),
			'desc'       => __( 'Choose new icon for theme.', 'publisher' ),
			'input-desc' => __( 'Not works for custom icons. ', 'publisher' ),
			'id'         => 'theme_icon',
			'type'       => 'icon_select',
			'show_on'    => array(
				array(
					'white_label=1'
				)
			)
		);

		$fields[] = array(
			'name'    => __( 'WordPress Branding', 'publisher' ),
			'type'    => 'heading',
			'show_on' => array(
				array(
					'white_label=1'
				)
			)
		);

		$fields['theme_login_logo'] = array(
			'name'         => __( 'WordPress Login Logo', 'publisher' ),
			'id'           => 'theme_login_logo',
			'data-type'    => 'id',
			'desc'         => __( 'Change WordPress blue logo with your brand logo.', 'publisher' ),
			'type'         => 'media_image',
			'input-desc'   => __( 'Tip: Small and rectangular images are better.', 'publisher' ),
			'media_title'  => __( 'Select or Upload Logo', 'publisher' ),
			'media_button' => __( 'Select Image', 'publisher' ),
			'upload_label' => __( 'Upload Logo', 'publisher' ),
			'remove_label' => __( 'Remove', 'publisher' ),
			'show_on'      => array(
				array(
					'white_label=1'
				)
			)
		);

		$fields[] = array(
			'name'    => __( 'Publisher Welcome Page', 'publisher' ),
			'type'    => 'heading',
			'show_on' => array(
				array(
					'white_label=1'
				)
			)
		);

		$fields['welcome_title'] = array(
			'name'    => __( 'Welcome Page Title', 'publisher' ),
			'id'      => 'welcome_title',
			'desc'    => __( 'Customize title of welcome page.', 'publisher' ),
			'type'    => 'text',
			'show_on' => array(
				array(
					'white_label=1'
				)
			)
		);

		$fields['welcome_text'] = array(
			'name'    => __( 'Welcome Page Text', 'publisher' ),
			'id'      => 'welcome_text',
			'desc'    => __( 'HTML tags and Shortcodes accepted.', 'publisher' ),
			'type'    => 'wp_editor',
			'show_on' => array(
				array(
					'white_label=1'
				)
			)
		);

		$fields[] = array(
			'name'    => __( 'Advanced Settings', 'publisher' ),
			'type'    => 'heading',
			'show_on' => array(
				array(
					'white_label=1'
				)
			)
		);

		$fields['only_user'] = array(
			'name'             => __( 'Show White Label Panel Only To This User', 'publisher' ),
			'id'               => 'only_user',
			'desc'             => __( 'All administrator users can see the white label panel by default but you can select a specific user to show this panel only for that user.', 'publisher' ),
			'input-desc'       => __( 'Are you sure?', 'publisher' ),
			'type'             => 'select',
			'deferred-options' => array(
				'callback' => 'bf_deferred_option_get_users',
				'args'     => array(
					array(
						'default'       => true,
						'default-label' => __( '-- Only All Administrator Users --', 'publisher' ),
						'group'         => true,
						'query'         => array(
							'number'  => 100,
							'orderby' => 'registered',
							'order'   => 'ASC',
							'role'    => 'Administrator'
						)
					)
				),
			),
			'show_on'          => array(
				array(
					'white_label=1'
				)
			)
		);


		return $fields;
	}
}


if ( ! function_exists( 'publisher_white_label_panel_std' ) ) {
	/**
	 * Callback: Init's BF options
	 *
	 * Filter: better-framework/panel/options
	 *
	 * @param $fields
	 *
	 * @return mixed
	 */
	function publisher_white_label_panel_std( $fields ) {

		$fields['white_label'] = array(
			'std' => 0,
		);

		$fields['publisher'] = array(
			'std' => '',
		);

		$fields['theme_icon'] = array(
			'std' => '',
		);

		$fields['theme_login_logo'] = array(
			'std' => '',
		);

		$fields['welcome_title'] = array(
			'std' => '',
		);

		$fields['welcome_text'] = array(
			'std' => '',
		);

		$fields['only_user'] = array(
			'std' => '',
		);

		return $fields;
	}
}


if ( publisher_white_label_get_option( 'theme_login_logo' ) ) {
	/**
	 * Changes WordPress login logo
	 *
	 * @hooked login_enqueue_scripts
	 */
	function publisher_white_label_login_logo() {


		$img = wp_get_attachment_image_src( publisher_white_label_get_option( 'theme_login_logo' ), 'full' );

		if ( ! $img || empty( $img[0] ) || empty( $img[1] ) || empty( $img[2] ) ) {
			return;
		}

		?>
		<style type="text/css">
			#login h1 {
				direction: ltr;
			}

			#login h1 a, .login h1 a {
				background-image: url(<?php echo $img[0]; ?>);
				width: <?php echo $img[1]; ?>px;
				height: <?php echo $img[2]; ?>px;
				background-size: <?php echo $img[1]; ?>px <?php echo $img[2]; ?>px;
				background-repeat: no-repeat;
				padding-bottom: 20px;
			<?php if( $img[1] > 320 ){
				$img[1] = ( $img[1] - 320 ) / 2;
				?> margin-left: -<?php echo $img[1]; ?>px;
			<?php

				  }?>
			}
		</style>
	<?php }

	add_action( 'login_enqueue_scripts', 'publisher_white_label_login_logo' );


	/**
	 * Changes WP login logo URL
	 *
	 * @hooked login_headerurl
	 *
	 * @param $url
	 *
	 * @return string
	 */
	function publisher_white_label_login_url( $url ) {

		return get_home_url();
	}

	add_action( 'login_headerurl', 'publisher_white_label_login_url' );


	/**
	 * Changes WP login logo alt text
	 *
	 * @hooked login_headertitle
	 *
	 * @param $alt
	 *
	 * @return string
	 */
	function publisher_white_label_login_url_alt( $alt ) {

		return get_bloginfo( 'name' );
	}

	add_action( 'login_headertitle', 'publisher_white_label_login_url_alt' );
}
