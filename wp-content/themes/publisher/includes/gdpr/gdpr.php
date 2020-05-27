<?php
/**
 * gdpr.php
 *---------------------------
 * Adds GDPR compatibility to Publisher
 *
 */


add_action( 'wp_ajax_bs_gdpr', 'publisher_gdpr_ajax' );
add_action( 'wp_ajax_nopriv_bs_gdpr', 'publisher_gdpr_ajax' );

if ( ! function_exists( 'publisher_gdpr_ajax' ) ) {
	/**
	 * GDPR Ajax Action
	 */
	function publisher_gdpr_ajax() {

		if ( isset( $_POST['data'] ) ) {
			if ( $_POST['data'] == 'show' ) {
				setcookie( 'bs_law_confirmation', 'hide', time() + 2592000, '/', $_SERVER['HTTP_HOST'] );
			} else {
				setcookie( 'bs_law_confirmation', 'show', time() + 2592000, '/', $_SERVER['HTTP_HOST'] );
			}
		}
	}
}


add_filter( 'publisher/main-wrap/after', 'publisher_gdpr_add_footer' );

if ( ! function_exists( 'publisher_gdpr_add_footer' ) ) {
	/**
	 * Adds cookie law popup to footer
	 */
	function publisher_gdpr_add_footer() {

		// GPR is not active
		if ( ! publisher_get_option( 'gdpr_cookie_law' ) ) {
			return;
		}

		$bs_law_confirmation = isset( $_COOKIE['bs_law_confirmation'] ) ? $_COOKIE['bs_law_confirmation'] : 'show';

		// Don't show popup
		if ( $bs_law_confirmation == 'hide' && publisher_get_option( 'gdpr_cookie_law_remove' ) ) {
			return;
		}

		?>
		<div class="bs-wrap-gdpr-law bs-wrap-gdpr-law-close">
			<div class="bs-gdpr-law">
				<p>
					<?php publisher_translation_echo( 'gdpr_cookie_policy' ); ?>

					<a class="bs-gdpr-accept" href="#"
					   data-cookie="<?php echo $bs_law_confirmation; ?>"><?php publisher_translation_echo( 'gdpr_cookie_accept' ); ?></a>

					<?php if ( publisher_get_option( 'gdpr_cookie_law_more' ) ) { ?>
						<a class="bs-gdpr-more"
						   href="<?php publisher_echo_option( 'gdpr_cookie_law_more' ) ?>"><?php publisher_translation_echo( 'gdpr_cookie_more' ); ?></a>
					<?php } ?>
				</p>
			</div>

			<?php if ( ! publisher_get_option( 'gdpr_cookie_law_remove' ) ) { ?>
				<a class="bs-gdpr-show" href="#"
				   data-cookie="<?php echo $bs_law_confirmation; ?>"><?php publisher_translation_echo( 'gdpr_cookie_button' ); ?></a>
			<?php } ?>
		</div>
		<?php
	}
}
