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
 * Handles all message showing in admin panel
 */
class BF_Admin_Notices {

	/**
	 * Store notice data to save in the database
	 * todo check and add custom location for pages
	 *
	 * @var array
	 */
	protected $notices_hook = array(
		'post-new.php' => 'edit_form_top',
		'post.php'     => 'edit_form_top',
	);


	/**
	 * @var mixed|void
	 */
	protected $notice_data;


	/**
	 * Flag to detect it should be save or not
	 *
	 * @var bool
	 */
	protected $should_save = FALSE;


	function __construct() {

		$this->apply_notice_hook();

		add_action( 'shutdown', array( $this, 'save_notices' ), 999 );
		add_action( 'wp_ajax_bf-notice-dismiss', array( $this, 'ajax_dismiss_handler' ) );

		$this->notice_data = $this->get_notices();
	}


	protected function apply_notice_hook() {

		global $pagenow;

		$hook = isset( $this->notices_hook[ $pagenow ] ) ? $this->notices_hook[ $pagenow ] : 'admin_notices';
		add_action( $hook, array( $this, 'show_notice' ) );
	}


	/**
	 * Adds notice to showing queue
	 *
	 * @param array          $notice      array {
	 *
	 * @type string|callable $mg          Message Text
	 * @type string          $id          optional. for deferred type.notice unique id
	 * @type string          $product     optional. unique id to detect notice is belong to which product
	 * @type string          $state       optional. success|warning|danger - default:success
	 * @type string          $thumbnail   optional. thumbnail image url
	 * @type array           $class       optional. notice custom classes
	 * @type string          $type        optional. Notice type is one of the deferred|fixed. - default: deferred.
	 * @type array           $page        optional. display notice on specific page. its an array of $pagenow values
	 * @type bool            $dismissible optional. display close notice button - default:true
	 * }
	 *
	 * @return bool true on success or false on error.
	 */
	function add_notice( $notice ) {

		$notice = bf_merge_args( $notice, array(
			'type'        => 'deferred',
			'dismissible' => TRUE,
			'id'          => FALSE,
			'product'     => FALSE,
			'state'       => 'success',
		) );

		if ( empty( $notice['msg'] ) ) {
			return FALSE;
		}

		/**
		 * Empty id just allowed for deferred type.
		 */
		if ( $notice['type'] !== 'deferred' && empty( $notice['id'] ) ) {
			return FALSE;
		}

		if ( empty( $notice['id'] ) ) {
			$notice['id'] = $this->generate_ID();
		}


		$this->notice_data[ $notice['id'] ] = apply_filters( 'better-framework/admin-notices/new', $notice );

		if ( $this->immediately_save() ) {
			return $this->update_notices( $this->notice_data );
		}

		$this->should_save = TRUE;

		return TRUE;
	}


	/**
	 * Remove a notice
	 *
	 * @param string|int|array $id notice unique id
	 *
	 * @return bool true on success or false on error
	 */
	function remove_notice( $id = NULL ) {

		if ( is_array( $id ) ) {
			$id = isset( $id['id'] ) ? $id['id'] : FALSE;
		}
		if ( ! $id ) {
			return FALSE;
		}

		$nt = &$this->notice_data;;

		if ( isset( $nt[ $id ] ) ) {

			unset( $nt[ $id ] );

			if ( $this->immediately_save() ) {
				return $this->update_notices( $nt );
			} else {

				unset( $this->notice_data[ $id ] );
				$this->should_save = TRUE;

				return TRUE;
			}
		}

		return FALSE;
	} // remove_notice


	protected function immediately_save() {

		return did_action( 'admin_footer' ) ||
		       ( defined( 'DOING_AJAX' ) && DOING_AJAX ) ||
		       ( defined( 'DOING_CRON' ) && DOING_CRON );
	}


	protected function generate_ID() {

		do {
			$id = mt_rand();
		} while( isset( $this->notice_data[ $id ] ) );

		return $id;
	}


	/**
	 * Callback: Shows notice
	 * Action  : admin_notices
	 */
	function show_notice() {

		if ( $notices = apply_filters( 'better-framework/admin-notices/show', $this->notice_data ) ) {

			foreach ( $notices as $notice ) {

				if ( ! bf_item_can_shown( $notice ) ) {
					continue;
				}

				if ( is_callable( $notice['msg'] ) ) {
					$message = call_user_func( $notice['msg'], $notice, $this );
				} elseif ( ! is_array( $notice['msg'] ) ) {
					$message = wpautop( $notice['msg'] );
				} else {
					$message = '';
				}

				if ( ! $message ) {
					continue;
				}

				$dismissible   = ! empty( $notice['dismissible'] );
				$has_thumbnail = ! empty( $notice['thumbnail'] ) && filter_var( $notice['thumbnail'], FILTER_VALIDATE_URL );

				$filter_class = str_replace( '.php', '', current_filter() );
				if ( ! isset( $notice['class'] ) || ! is_array( $notice['class'] ) ) {
					$notice['class'] = array();
				}
				$notice['class'][] = 'bf-notice';
				$notice['class'][] = 'bf-notice-' . sanitize_html_class( $filter_class );
				$notice['class'][] = sprintf( 'bf-notice-%s', $notice['type'] );

				if ( ! isset( $notice['class'] ) ) {
					$notice['class'] = array();
				}
				if ( $dismissible ) {
					$notice['class'][] = 'bf-notice-dismissible';
				}
				$notice['class'][] = $has_thumbnail ? 'bf-notice-has-thumbnail' : 'bf-notice-no-thumbnail';

				$notice['class'][] = 'bf-notice-' . $notice['state'];

				$attrs = '';

				if ( ! empty( $notice['show_all_label'] ) ) {
					$attrs .= sprintf( ' data-show-all="%s"', esc_attr( $notice['show_all_label'] ) );
				}

				if ( isset( $notice['show-all'] ) && ! $notice['show-all'] ) {
					$attrs .= ' data-show-all-enable="false"';
				}
				?>
				<div
						class="bf-notice-wrapper bf-notice-<?php echo esc_attr( $notice['id'] ) ?> wrap"<?php echo $attrs ?>>
					<div
							class="<?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $notice['class'] ) ) ); ?>">

						<div class="bf-notice-container">
							<?php
							if ( $has_thumbnail ) {
								printf( '<div class="bf-notice-thumbnail"><img src="%s" class="bf-notice-thumbnail-img"></div>', esc_html( $notice['thumbnail'] ) );
							}
							?>
							<div class="bf-notice-text-container">
								<div class="bf-notice-text">
									<?php
									echo $message;
									?>
								</div>
							</div>

							<button type="button" class="bf-notice-dismiss"
								<?php if ( $notice['type'] !== 'deferred' ) { ?>
									data-notice-token="<?php echo esc_attr( wp_create_nonce( 'notice-dismiss-' . $notice['id'] ) ) ?>"
									data-notice-id="<?php echo esc_attr( $notice['id'] ) ?>"
								<?php } ?>
							>
								<span
										class="screen-reader-text"><?php esc_html_e( 'Dismiss this notice.', 'better-studio' ); ?></span>
								<?php
								if ( isset( $notice['dismiss_label'] ) ) {
									echo $notice['dismiss_label'];
								}
								?>
							</button>
						</div>
					</div>
					<?php

					if ( $notice['type'] === 'deferred' ) {
						$this->remove_notice( $notice );
					}

					?>
				</div>
				<?php
			}
		}
	} // show_notice


	/**
	 * Set notices info in db
	 *
	 * @param array $notices
	 *
	 * @return bool true on success or false on failure.
	 */
	protected function update_notices( $notices ) {

		return update_option( 'bf_notices', $notices );
	}


	/**
	 * Get all notices
	 *
	 * @return array
	 */
	public function get_notices() {

		return get_option( 'bf_notices', array() );
	}


	/**
	 * Update notices storage  with given data
	 *
	 * @param array $notices
	 *
	 * @return bool true on success or false on failure
	 */
	public function set_notices( $notices ) {

		if ( is_array( $notices ) && $notices ) {
			return update_option( 'bf_notices', $notices );
		} elseif ( ! $notices ) {
			return delete_option( 'bf_notices' );
		}

		return FALSE;
	}


	/**
	 * Callback: Save added notices in db
	 * Action  : admin_footer
	 */
	function save_notices() {

		if ( ! $this->should_save ) {
			return;
		}

		if ( is_array( $this->notice_data ) ) {
			update_option( 'bf_notices', $this->notice_data );
		} elseif ( $this->notice_data === FALSE ) {
			delete_option( 'bf_notices' );
		}
	}


	/**
	 * Callback: close notice ajax request handler
	 * Action  : wp_ajax_bf-notice-dismiss
	 */
	public function ajax_dismiss_handler() {

		$required_params = array(
			'noticeId'    => '',
			'noticeToken' => '',
		);
		if ( array_diff_key( $required_params, $_REQUEST ) ) {

			return;
		}

		$id = &$_REQUEST['noticeId'];
		if ( ! wp_verify_nonce( $_REQUEST['noticeToken'], 'notice-dismiss-' . $id ) ) {
			wp_die( __( 'Security error occurred', 'better-studio' ) );
		}

		$this->remove_notice( $id );
	}
}
