<?php
/**
 * publisher-comments.php
 *---------------------------
 * Handles all tasks about [advanced] comments in Publisher
 *
 */


/**
 * Publisher Comments Class
 *
 * @since 1.8.0
 */
class Publisher_Comments {

	/**
	 * @since 1.8.0
	 */
	public static function init() {

		add_action( 'wp_ajax_ajaxified-comments', 'Publisher_Comments::handle_ajaxified_comments' );
		add_action( 'wp_ajax_nopriv_ajaxified-comments', 'Publisher_Comments::handle_ajaxified_comments' );

		// Compatibility with Better Facebook Comments
		add_filter( 'better-facebook-comments/js/global-vars', 'Publisher_Comments::better_facebook_comments_vars' );

		add_action( 'template_redirect', 'Publisher_Comments::init_multiple_comments' );
	}


	/**
	 * Callback: a Handler to response comment ajax (deferred) loading
	 * Filter  : wp_ajax_ajaxified-comments
	 *           wp_ajax_nopriv_ajaxified-comments
	 *
	 * todo ajaxify paginated comments
	 *
	 * @since 1.8.0
	 */
	public static function handle_ajaxified_comments() {

		if ( empty( $_REQUEST['commentPostId'] ) ) {
			return;
		}

		ob_start();

		self::init_multiple_comments();

		$post_id = intval( $_REQUEST['commentPostId'] );
		$post    = get_post( $post_id );

		// todo: replace query_posts with WP_Query object
		query_posts( array(
			'p'         => $post->ID,
			'post_type' => $post->post_type,
		) );

		while( have_posts() ) {
			the_post();
			comments_template();
		}

		wp_reset_query();

		$output = ob_get_clean();

		wp_send_json( array(
			'rawHTML' => $output,
			'info'    => array(
				'post_id'   => $post->ID,
				'permalink' => get_permalink( $post ),
				'title'     => get_the_title( $post ),
			)
		) );

	} // handle_ajaxified_comments


	/**
	 * Callback: Change Better Facebook Comments text
	 *
	 * Filter: better-facebook-comments/js/global-vars
	 *
	 * @param $vars
	 *
	 * @since 1.8.0
	 *
	 * @return mixed
	 */
	public static function better_facebook_comments_vars( $vars ) {

		$vars['text_0']    = '<i class="fa fa-comments-o"></i> %%NUMBER%%';
		$vars['text_1']    = '<i class="fa fa-comments-o"></i> %%NUMBER%%';
		$vars['text_2']    = '<i class="fa fa-comments-o"></i> %%NUMBER%%';
		$vars['text_more'] = '<i class="fa fa-comments-o"></i> %%NUMBER%%';

		return $vars;
	}


	/**
	 * Ajax load comment template
	 *
	 * @since 1.8.0
	 */
	public static function load_comment_template() {

		if ( ! empty( $_REQUEST['query']['provider'] ) && ! empty( $_REQUEST['query']['comment-post-id'] ) ) {

			$post_id = intval( $_REQUEST['query']['comment-post-id'] );
			$post    = get_post( $post_id );

			publisher_set_global( 'multiple-comments', true );

			query_posts( array(
				'p'         => $post->ID,
				'post_type' => $post->post_type,
			) );

			while( have_posts() ) {
				the_post();
				echo self::get_comment_form( $_REQUEST['query']['provider'] );
			}

			wp_reset_query();
		}
	}


	/**
	 * Get active comment providers services
	 *
	 * @since 1.8.0
	 *
	 * @return array
	 */
	public static function get_comments_providers() {

		$providers = publisher_get_option( 'multiple_comments_providers' );

		if ( empty( $providers ) ) {
			return array();
		}

		$providers = array_filter( $providers );

		if ( isset( $providers['facebook'] ) && ! is_callable( 'Better_Facebook_Comments::factory' ) ) {
			unset( $providers['facebook'] );
		}

		if ( isset( $providers['disqus'] ) && ! is_callable( 'Better_Disqus_Comments::factory' ) ) {
			unset( $providers['disqus'] );
		}

		return $providers;
	}


	/**
	 * Multiple comment option panel choices
	 *
	 * @since 1.8.0
	 */
	public static function multiple_comments_form() {

		?>
		<div class="bs-comments-wrapper">
			<?php

			$_atts = array(
				'comment-post-id' => get_the_ID()
			);

			$view      = 'Publisher_Comments::load_comment_template';
			$type      = 'custom';
			$providers = self::get_comments_providers();
			$content   = '';

			if ( ! empty( $providers ) ) {

				?>
				<ul class="nav-tabs clearfix">
					<?php

					$i       = 0;
					$content = '';

					foreach ( $providers as $provider => $is_active ) {

						$i ++;

						$rand_id = mt_rand();

						$is_first_tab = $i === 1;
						$active_class = $is_first_tab ? 'active ' : '';

						echo '<li class="', $active_class, $provider, '-comment">';

						if ( $is_first_tab ) {

							echo '<a href="#' . $provider . '-' . $rand_id . '-comment-section" role="tab" data-toggle="tab">';
							$content .= '<div class="' . $active_class . 'tab-pane multi-' . $provider . '-comment-section" id="' . $provider . '-' . $rand_id . '-comment-section">' . self::get_comment_form( $provider ) . '</div>';

						} else {

							$_atts['provider'] = $provider;

							echo '<a href="#' . $provider . '-' . $rand_id . '-comment-section" data-toggle="tab" data-deferred-init="', $rand_id, '">';

							ob_start();
							publisher_theme_pagin_manager()->display_deferred_html( $_atts, $view, $type, $rand_id );
							$deferred_block = ob_get_clean();

							$content .= '<div class="tab-pane multi-' . $provider . '-comment-section" id="' . $provider . '-' . $rand_id . '-comment-section">' . $deferred_block . '</div>';
						}

						echo self::get_comment_provider_label( $provider ), '</a>';

						echo '</li>';
					}

					?>
				</ul>
				<?php

			}

			?>
			<div class="tab-content">
				<?php echo $content // escaped before ?>
			</div>

		</div>
		<?php

	} // multiple_comments_form


	/**
	 * Get label of the multiple comment ui tab
	 *
	 * @param string $provider
	 *
	 * @access private
	 * @see    multiple_comments_form
	 *
	 * @since  1.8.0
	 *
	 * @return string
	 */
	private static function get_comment_provider_label( $provider ) {

		$name  = '';
		$count = 0;

		switch ( $provider ) {

			case 'wordpress':

				$name .= '<i class="fa fa-comments" aria-hidden="true"></i>';
				$name .= publisher_translation_get( 'comments' );

				// disable counts count aggregate
				add_filter( 'better-facebook-comments/disable-aggregate', '__return_true' );
				add_filter( 'better-disqus-comments/disable-aggregate', '__return_true' );

				$count = get_comments_number();

				// active again counts count aggregate
				remove_filter( 'better-facebook-comments/disable-aggregate', '__return_true' );
				remove_filter( 'better-disqus-comments/disable-aggregate', '__return_true' );

				break;

			case 'facebook':

				$name .= '<i class="fa fa-facebook-square" aria-hidden="true"></i>';
				$name .= publisher_translation_get( 'fb-comments' );

				if ( is_callable( 'Better_Facebook_Comments::factory' ) ) {
					$instance = Better_Facebook_Comments::factory();
					$count_cb = array( $instance, 'get_comment_count' );

					if ( is_callable( $count_cb ) ) {
						$count = call_user_func( $count_cb );
					}
				}
				break;

			case 'disqus':

				$name .= '<i class="fa fa-question-circle" aria-hidden="true"></i>';
				$name .= publisher_translation_get( 'disq-comments' );

				$name .= '<span class="disqus-comment-count comments-count" data-disqus-url="' . esc_attr( get_the_permalink() ) . '"></span>';

				break;
		}

		if ( $count ) {
			$name .= sprintf( '<span class="comments-count">%s</span>', number_format_i18n( $count ) );
		}

		return $name;
	} // get_comment_provider_label


	/**
	 * Get Comment form
	 *
	 * @param string $provider comment provider service which is wordpress facebook or disqus
	 *
	 * @access private
	 * @see    multiple_comments_form
	 *
	 * @since  1.8.0
	 * @return string
	 */
	private static function get_comment_form( $provider ) {

		$output_cb   = false;
		$template_cb = false;

		ob_start();

		switch ( $provider ) {

			case 'wordpress':

				// disable other commenting system and internal multiple comment templating
				add_filter( 'better-facebook-comments/override-template', '__return_false' );
				add_filter( 'better-disqus-comments/override-template', '__return_false' );
				publisher_set_global( 'multiple-comments-template', true );

				// use default 'comments.php' file
				comments_template();

				break;

			case 'facebook':

				if ( is_callable( 'Better_Facebook_Comments::factory' ) ) {
					$output_cb   = array( Better_Facebook_Comments::factory(), 'output' );
					$template_cb = array( Better_Facebook_Comments::factory(), 'get_template' );
				}

				break;

			case 'disqus':

				if ( is_callable( 'Better_Disqus_Comments::factory' ) ) {
					$output_cb   = array( Better_Disqus_Comments::factory(), 'output' );
					$template_cb = array( Better_Disqus_Comments::factory(), 'get_template' );
				}
				break;
		}

		if ( $output_cb && is_callable( $output_cb ) ) {

			if ( is_callable( $template_cb ) ) {
				include call_user_func( $template_cb );
			}

			echo call_user_func( $output_cb );
		}

		return ob_get_clean();
	} // get_comment_form


	/**
	 * Initialize multiple comment feature
	 *
	 * @since 1.8.0
	 */
	public static function init_multiple_comments() {

		if ( publisher_get_option( 'multiple_comments' ) === 'disable' ) {
			return;
		}

		$providers = self::get_comments_providers();

		// disable disqus count in multiple comments!
		add_filter( 'better-disqus-comments/disable-aggregate', '__return_true', 100 );

		// disable facebook when that is not in comment providers!
		if ( ! isset( $providers['facebook'] ) ) {
			add_filter( 'better-facebook-comments/disable-aggregate', '__return_true', 100 );
		}

		if ( empty( $providers ) || bf_count( $providers ) == 1 ) {
			return;
		}

		add_filter( 'better-facebook-comments/allow-multiple', '__return_true' );
		add_filter( 'better-disqus-comments/allow-multiple', '__return_true' );

		$status = publisher_get_post_comments_type();

		if ( 'show-simple' === $status || 'show-ajaxified' === $status ) {
			add_filter( 'better-facebook-comments/override-template', '__return_false' );
			add_filter( 'better-disqus-comments/override-template', '__return_false' );
		}

		publisher_set_global( 'multiple-comments', true );


		if ( 'show-simple' === $status ||
		     (
			     'show-ajaxified' === $status && bf_is_doing_ajax() &&
			     isset( $_REQUEST['action'] ) && $_REQUEST['action'] === 'ajaxified-comments'
		     )
		) {
			add_filter( 'comments_template', 'Publisher_Comments::multiple_comments_template', 99 );
		}

	} // init_multiple_comments


	/**
	 * Path to multiple comment template file
	 *
	 * @param string $path
	 *
	 * @since 1.8.0
	 * @return string
	 */
	public static function multiple_comments_template( $path ) {

		if ( publisher_get_global( 'multiple-comments-template', false ) ) {
			return $path;
		}

		if ( $multiple_comment = locate_template( 'comments-multiple.php' ) ) {

			return $multiple_comment;
		}

		return $path;
	}

} // Publisher_Comments


if ( ! function_exists( 'publisher_get_post_comments_type' ) ) {
	/**
	 * Returns type of comments for current page
	 *
	 * @return bool|mixed|null|string
	 */
	function publisher_get_post_comments_type() {

		// Return from cache
		if ( publisher_get_global( 'post-comments-type-' . get_the_ID(), false ) ) {
			return publisher_get_global( 'post-comments-type-' . get_the_ID(), false );
		}

		$type = 'default';

		// for pages and posts
		if ( publisher_is_valid_cpt() ) {
			$type = bf_get_post_meta( 'post_comments', get_the_ID(), 'default' );
		}


		// get default from panel
		if ( empty( $type ) || $type === 'default' ) {
			if ( is_singular( 'page' ) ) {
				$type = publisher_get_option( 'page_comments' );
			} else {
				$type = publisher_get_option( 'post_comments' );
			}
		}


		// if ajaxify is not enabled
		if ( $type === 'show-ajaxified' && ! publisher_is_ajaxified_comments_active() ) {
			$type = 'show-simple';
		}

		$_check = array(
			'show-ajaxified' => '',
			'show-simple'    => '',
			'hide'           => '',
		);

		// if type is not valid
		if ( ! isset( $_check[ $type ] ) ) {
			$type = 'show-simple';
		}

		unset( $_check ); // clear memory

		//
		// If related post is infinity then posts loaded from ajax should have show comments button
		//
		if ( ! is_page() && publisher_get_related_post_type() === 'infinity-related-post' || ( defined( 'PUBLISHER_THEME_AJAXIFIED_LOAD_POST' ) && PUBLISHER_THEME_AJAXIFIED_LOAD_POST ) ) {
			$type = 'show-ajaxified';
		}

		// Change ajaxified to show simple when user submitted an comment before
		if ( $type === 'show-ajaxified' && ! empty( $_GET['bs-comment-added'] ) && $_GET['bs-comment-added'] === '1' ) {
			$type = 'show-simple';
		}

		// Cache it
		publisher_set_global( 'post-comments-type-' . get_the_ID(), $type );

		return $type;
	}
}


if ( ! function_exists( 'publisher_comments_template' ) ) {
	/**
	 * Handy function to getting correct comments file
	 */
	function publisher_comments_template() {


		switch ( publisher_get_post_comments_type() ) {

			case 'show-simple':
				comments_template();
				break;

			case 'show-ajaxified':
				comments_template( '/comments-ajaxified.php' );
				break;

			case false:
			case '':
			case 'hide':
				return;

		}

	}
}


if ( ! function_exists( 'publisher_multiple_comments_choices' ) ) {
	/**
	 * Multiple comment option panel choices
	 *
	 * @todo  add disqus icon
	 *
	 * @since 1.8.0
	 * @return array
	 */
	function publisher_multiple_comments_choices() {

		return array(
			'wordpress' => array(
				'label'     => '<i class="fa fa-wordpress"></i> ' . __( 'WordPress', 'publisher' ),
				'css-class' => 'active-item'
			),
			'facebook'  => array(
				'label'     => '<i class="fa fa-facebook"></i> ' . __( 'Facebook', 'publisher' ),
				'css-class' => is_callable( 'Better_Facebook_Comments::factory' ) ? 'active-item' : 'disable-item',
			),
			'disqus'    => array(
				'label'     => '<i class="bf-icon bsfi-disqus"></i>' . __( 'Disqus', 'publisher' ),
				'css-class' => is_callable( 'Better_Disqus_Comments::factory' ) ? 'active-item' : 'disable-item',
			),
		);
	}
}


if ( ! function_exists( 'publisher_multiple_comments_form' ) ) {
	/**
	 * Multiple comment option panel choices
	 *
	 * @todo  add disqus icon
	 *
	 * @since 1.8.0
	 * @return array
	 */
	function publisher_multiple_comments_form() {

		Publisher_Comments::multiple_comments_form();
	}
}
