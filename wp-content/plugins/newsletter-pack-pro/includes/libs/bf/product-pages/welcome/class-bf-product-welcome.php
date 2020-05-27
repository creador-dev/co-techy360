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
 * Class BF_Product_Welcome
 */
class BF_Product_Welcome extends BF_Product_Item {

	public $id = 'welcome';

	/**
	 * Store ajax params list.
	 *
	 * @var array
	 */
	protected $params;


	public function render_content( $item_data ) {

		if ( ! empty( $item_data['include_file'] ) && file_exists( $item_data['include_file'] ) ) {
			include $item_data['include_file'];
		}
	}


	public function ajax_request( $params ) {

		if ( empty( $params['bs_pages_action'] ) ) {
			return;
		}

		$this->params = $params;

		try {
			switch ( $params['bs_pages_action'] ) {

				case 'register':

					if ( isset( $params['bs-purchase-code'] ) && isset( $params['bs-register-token'] ) ) {

						//verify register product token

						if ( wp_create_nonce( 'bs-register-product' ) !== $params['bs-register-token'] ) {

							throw new Exception( 'invalid request.' );
						}

						$this->handle_reponse(
							$this->api_request( 'register-product', array(), array( 'purchase_code' => $this->params['bs-purchase-code'] ) )
						);
					}


					break;
			}
		} catch( Exception $e ) {

			wp_send_json( array( 'status' => 'error', 'error-message' => $e->getMessage() ) );

		}

	}


	/**
	 * @param array $response
	 *
	 * @throws Exception
	 */
	protected function handle_reponse( $response ) {

		if ( empty( $response ) ) {
			throw new Exception( __( 'unknown error occurred!', 'publisher' ) );
		}

		$purchase_code = $this->params['bs-purchase-code'];

		if ( is_wp_error( $response ) ) {

			$error_code = $response->get_error_code();

			if ( 'add-to-account' === $error_code || 'add-domain' == $error_code ) {

				$auth      = apply_filters( 'better-framework/product-pages/register-product/auth', array() );
				$uri       = site_url();
				$item_id   = $auth['item_id'];
				$bs_action = 'register-product';

				$link = add_query_arg( compact( 'purchase_code', 'uri', 'item_id', 'bs_action' ), 'http://betterstudio.com/account/apply-new-purchase' );

				if ( 'add-domain' == $error_code ) {

					$response = array(
						'error-message' => wp_kses( sprintf( __( 'Your current domain name was not added to this purchase code,<br/> <b>Please add this domain name to your license code</b> by clicking on the following button <br><br> <a href="%s" class="bf-btn-primary bs-pages-primary-btn" target="_blank" id="bs-login-register-btn">Add new domain</a>', 'publisher' ), $link ), bf_trans_allowed_html() ),
						'error-code'    => 'add-to-account',
						'result'        => 'error',
					);
				} else {

					$response = array(
						'error-message' => wp_kses( sprintf( __( 'This looks like <b>a new purchase code that hasn&#x2019;t been added to BetterStudio account yet</b>. Login to existing account or register new one to continue. <br><br> <a href="%s" class="bf-btn-primary bs-pages-primary-btn" target="_blank" id="bs-login-register-btn">Login or Register</a>', 'publisher' ), $link ), bf_trans_allowed_html() ),
						'error-code'    => 'add-to-account',
						'result'        => 'error',
					);
				}

			} else {

				throw new Exception( $response->get_error_message() );
			}
		}

		if ( isset( $response->status ) ) {

			$status = $response->status;
			bf_register_product_set_info( compact( 'purchase_code', 'status' ) );
		}

		wp_send_json( $response );
	}
}
