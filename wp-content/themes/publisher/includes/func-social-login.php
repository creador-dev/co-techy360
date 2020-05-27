<?php


if ( ! function_exists( 'publisher_social_login_providers' ) ) {
	/**
	 * Get social login providers urls
	 *
	 * Supported plugins:
	 * http://miled.github.io/wordpress-social-login/
	 *
	 *
	 * @since 1.8.0
	 *
	 * @return array
	 */
	function publisher_social_login_providers() {

		if ( ! defined( 'WORDPRESS_SOCIAL_LOGIN_ABS_PATH' ) ) {
			return array();
		}

		global $WORDPRESS_SOCIAL_LOGIN_PROVIDERS_CONFIG;

		if ( empty( $WORDPRESS_SOCIAL_LOGIN_PROVIDERS_CONFIG ) || ! is_array( $WORDPRESS_SOCIAL_LOGIN_PROVIDERS_CONFIG ) ) {
			return array();
		}

		$current_url = site_url( add_query_arg( false, false ) );

		$login_url = add_query_arg(
			array(
				'action'      => 'wordpress_social_authenticate',
				'mode'        => 'login',
				'redirect_to' => urlencode( $current_url ),
			),
			site_url( 'wp-login.php', 'login_post' )
		);

		$use_popup = function_exists( 'wp_is_mobile' ) && wp_is_mobile() ? 2 : get_option( 'wsl_settings_use_popup' );

		$providers = array();

		foreach ( $WORDPRESS_SOCIAL_LOGIN_PROVIDERS_CONFIG as $provider ) {

			$provider_id = isset( $provider["provider_id"] ) ? $provider["provider_id"] : '';
			$is_enable   = get_option( 'wsl_settings_' . $provider_id . '_enabled' );

			if ( ! $is_enable ) {
				continue;
			}

			$provider_url = add_query_arg( 'provider', $provider_id, $login_url );
			$provider_url = apply_filters( 'wsl_render_auth_widget_alter_authenticate_url', $provider_url, $provider_id, 'login', $current_url, $use_popup );

			$providers[ $provider_id ] = $provider_url;
		}

		return $providers;
	}
}


if ( $GLOBALS['pagenow'] !== 'wp-login.php' || ! empty( $_REQUEST['action'] ) && $_REQUEST['action'] !== 'register' ) {
	add_filter( 'wsl_render_auth_widget_alter_provider_icon_markup', 'publisher_wsl_get_button', 10, 3 );
}

if ( ! function_exists( 'publisher_wsl_get_button' ) ) {
	/**
	 * Used to change codes of WSL plugin to make it high compatible with Publisher
	 *
	 * @param      $provider_id
	 * @param      $provider_name
	 * @param      $authenticate_url
	 * @param bool $full
	 */
	function publisher_wsl_get_button( $provider_id, $provider_name, $authenticate_url, $full = true ) {

		$icons = array(
			'foursquare'    => 'fa-foursquare',
			'reddit'        => 'fa-reddit-alien',
			'disqus'        => 'bsfi-disqus',
			'linkedin'      => 'bsfi-linkedin',
			'yahoo'         => 'fa-yahoo',
			'instagram'     => 'bsfi-instagram',
			'wordpress'     => 'fa-wordpress',
			'google'        => 'bsfi-gplus',
			'twitter'       => 'bsfi-twitter',
			'facebook'      => 'bsfi-facebook',
			'lastfm'        => 'fa-lastfm',
			'tumblr'        => 'bsfi-tumblr',
			'stackoverflow' => 'fa-stack-overflow',
			'github'        => 'bsfi-github',
			'Dribbble'      => 'bsfi-dribbble',
			'500px'         => 'fa-500px',
			'steam'         => 'bsfi-steam',
			'twitchtv'      => 'fa-twitch',
			'vkontakte'     => 'bsfi-vk',
			'odnoklassniki' => 'fa-odnoklassniki',
			'aol'           => 'fa-odnoklassniki',
		);

		$provider_id_lower = strtolower( $provider_id );

		$icon = false;

		if ( isset( $icons[ $provider_id_lower ] ) ) {
			$icon = bf_get_icon_tag( $icons[ $provider_id_lower ] );
		}

		?>
		<a
			rel="nofollow"
			href="<?php echo $authenticate_url; ?>"
			data-provider="<?php echo $provider_id ?>"
			class="btn social-login-btn social-login-btn-<?php echo $provider_id_lower, ' ', ! empty( $icon ) ? 'with-icon' : ''; ?>"><?php

			if ( $full ) {
				echo $icon, sprintf( publisher_translation_get( 'login_with' ), ucfirst( $provider_name ) );
			} else {
				echo $icon, $provider_id;
			}

			?>
		</a>
		<?php

	} // publisher_wsl_get_button
}


if ( ! function_exists( 'publisher_wsl_disable_for_login_form' ) ) {
	/**
	 * Handy function used to disable WSL login buttons in bottom of login form.
	 *
	 * @param $settings
	 *
	 * @return int
	 */
	function publisher_wsl_disable_for_login_form( $settings ) {

		return 2;
	}
}
