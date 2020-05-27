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
 *  Our portfolio is here: http://themeforest.net/user/Better-Studio/portfolio
 *
 *  \--> BetterStudio, 2017 <--/
 */


/**
 * Class BF_Product_Welcome
 */
class BF_Product_Welcome extends BF_Product_Item {

	public $id = 'welcome';


	public function render_content( $item_data ) {

		if ( ! empty( $item_data['include_file'] ) && file_exists( $item_data['include_file'] ) ) {
			include $item_data['include_file'];
		}
	}

	public function ajax_request( $params ) {


		if ( empty( $params['bs_pages_action'] ) ) {
			return;
		}

		try {
			switch ( $params['bs_pages_action'] ) {

				case 'register':

					if ( isset( $params['bs-purchase-code'] ) && isset( $params['bs-register-token'] ) ) {

						//verify register product token

						if ( wp_create_nonce( 'bs-register-product' ) !== $params['bs-register-token'] ) {

							throw new Exception( 'invalid request.' );
						}

						$purchase_code = &$params['bs-purchase-code'];
						if ( $response = $this->api_request( 'register-product', array(), compact( 'purchase_code' ) ) ) {

							if ( is_wp_error( $response ) ) {

								if ( $response->get_error_code() !== 'add-to-account' ) {

									throw new Exception( $response->get_error_message() );
								}

								$auth      = apply_filters( 'better-framework/product-pages/register-product/auth', array() );
								$uri       = site_url();
								$item_id   = $auth['item_id'];
								$bs_action = 'register-product';

								$link = add_query_arg( compact( 'purchase_code', 'uri', 'item_id', 'bs_action' ), 'http://community.betterstudio.com/apply-purchase-code' );

								$response = array(
									'error-message' => wp_kses( sprintf( __( 'This looks like <b>a new purchase code that hasn&#x2019;t been added to BetterStudio account yet</b>. Login to existing account or register new one to continue. <br><br> <a href="%s" class="bf-btn-primary bs-pages-primary-btn" target="_blank" id="bs-login-register-btn">Login or Register</a>', 'publisher' ), $link ), bf_trans_allowed_html() ),
									'error-code'    => 'add-to-account',
									'result'        => 'error',
								);
							}

							if ( isset( $response->status ) ) {
								$status = $response->status;
								bf_register_product_set_info( compact( 'purchase_code', 'status' ) );
							}

							wp_send_json( $response );
						} else {
							throw new Exception( __( 'unknown error occurred!', 'publisher' ) );
						}
					}


					break;
			}
		} catch( Exception $e ) {

			wp_send_json( array( 'status' => 'error', 'error-message' => $e->getMessage() ) );

		}

	}
}
