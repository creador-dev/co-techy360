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


/**
 * get image URI by attachment ID
 *
 * @param        $attachment_id image attachment ID.
 * @param string $size          image size identifier
 *
 * @see add_image_size
 *
 * @return string image attachment url on success empty string otherwise.
 */
function bf_product_demo_media_url( $attachment_id, $size = 'thumbnail' ) {

	if ( $src = wp_get_attachment_image_src( $attachment_id, $size ) ) {

		return $src[0];
	}

	return '';
}

/**
 * enqueue static files
 */
function bf_install_demo_enqueue_scripts() {

	if ( bf_is_product_page( 'install-demo' ) ) {

		$ver = BF_Product_Pages::Run()->get_version();

		bf_enqueue_script( 'bf-modal' );
		bf_enqueue_style( 'bf-modal' );

		wp_enqueue_style( 'bs-product-demo-styles', BF_Product_Pages::get_url( 'install-demo/assets/css/bs-product-demo.css' ), array(), $ver );

		wp_enqueue_script( 'bs-product-demo-scripts', BF_Product_Pages::get_url( 'install-demo/assets/js/bs-product-demo.js' ), array(), $ver );

		wp_localize_script( 'bs-product-demo-scripts', 'bs_demo_install_loc', array(
			'checked_label'   => __( 'Include content', 'better-studio' ),
			'unchecked_label' => __( 'Only settings', 'better-studio' ),


			'install' => array(
				'title'      => __( 'Are you sure to install demo?', 'better-studio' ),
				'header'     => __( 'Import Demo', 'better-studio' ),
				'body'       => wp_kses( __( '<p>This will import our predefined settings for the demo (background, template layouts, fonts, colors etc...) and our sample content.</p>
				<p>The demo can be fully uninstalled via the uninstall button. Please backup your settings to be sure that you don\'t lose them by accident.</p>
				', 'better-studio' ), bf_trans_allowed_html() ),
				'button_yes' => __( 'Yes, Import', 'better-studio' ),
				'button_no'  => __( 'Cancel', 'better-studio' ),
			),

			'uninstall' => array(
				'title'      => __( 'Are your sure to uninstall this demo?', 'better-studio' ),
				'header'     => __( 'Confirm Uninstalling Demo', 'better-studio' ),
				'body'       => __( 'By uninstalling demo all configurations from widgets, options, menus and other settings that was comes from our demo content will be removed and your settings will be rollback to before demo installation.', 'better-studio' ),
				'button_yes' => __( 'Yes, Uninstall', 'better-studio' ),
				'button_no'  => __( 'No, do not', 'better-studio' ),
			),

			'on_error' => array(
				'button_ok'       => __( 'Ok', 'better-studio' ),
				'default_message' => __( 'Cannot install demo.', 'better-studio' ),
				'body'            => __( 'Please try again several minutes later or contact better studio team support.', 'better-studio' ),
				'header'          => __( 'Demo installation failed', 'better-studio' ),
				'title'           => __( 'An error occurred while installing demo', 'better-studio' ),
				'display_error'   => __( '<div class="bs-pages-error-section">
					<a href="#" class="btn bs-pages-error-copy" data-copied="' . esc_attr__( 'Copied !', 'better-studio' ) . '">
						<i class="fa fa-files-o" aria-hidden="true"></i> Copy</a>  <textarea> Error:  %ERROR_CODE% %ERROR_MSG% </textarea>
				</div>', 'better-studio' ),
			),

			'uninstall_error' => array(
				'button_ok'       => __( 'Ok', 'better-studio' ),
				'default_message' => __( 'Cannot uninstall demo.', 'better-studio' ),
				'body'            => __( 'Please try again several minutes later or contact better studio team support.', 'better-studio' ),
				'header'          => __( 'Demo uninstalling process failed', 'better-studio' ),
				'title'           => __( 'An error occurred while uninstalling demo', 'better-studio' ),
			),

			'uninstall_start_error' => array(
				'button_ok'       => __( 'Ok', 'better-studio' ),
				'default_message' => __( 'Cannot install demo.', 'better-studio' ),
				'body'            => __( 'Please click ok and try again', 'better-studio' ),
				'header'          => __( 'Demo uninstalling process failed', 'better-studio' ),
				'title'           => __( 'An error occurred while uninstalling demo', 'better-studio' ),
			),

			'install_start_error' => array(
				'button_ok'       => __( 'Ok', 'better-studio' ),
				'default_message' => __( 'Cannot install demo.', 'better-studio' ),
				'body'            => __( 'Please click ok and try again', 'better-studio' ),
				'header'          => __( 'Demo installing process failed', 'better-studio' ),
				'title'           => __( 'An error occurred while installing demo', 'better-studio' ),
			),
		) );
	}

}

add_action( 'admin_enqueue_scripts', 'bf_install_demo_enqueue_scripts' );

/**
 * Get demo data
 *
 * @param string $demo_id demo id
 * @param string $context demo context content or settings
 *
 * @return array
 */
function bf_get_demo_data( $demo_id, $context = 'content' ) {

	static $data = array();
	if ( ! isset( $data[ $demo_id ] ) ) {
		$data[ $demo_id ] = apply_filters( 'better-framework/product-pages/install-demo/' . $demo_id . '/' . $context, array(), $demo_id );
	}

	return $data[ $demo_id ];
}