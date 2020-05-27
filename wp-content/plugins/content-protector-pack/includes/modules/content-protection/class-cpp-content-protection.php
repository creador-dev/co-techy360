<?php


class CPP_Content_Protection {

	public function init() {

		if ( cpp_option( 'image_protection' ) && cpp_option( 'image_no_a_tag' ) ) {

			add_filter( 'the_content', array( $this, 'remove_image_parent_link' ) );
		}

		if ( cpp_option( 'view_source_protection' ) && cpp_option( 'view_source_top_empty_lines' ) ) {

			add_filter( 'template_include', array( $this, 'append_head_empty_lines' ), 9e3 );
		}

		add_action( 'wp_footer', array( $this, 'disable_print' ) );

		add_action( 'wp_footer', array( $this, 'disabled_js_protection' ) );

		add_filter( 'content-protector-pack/localize', array( $this, 'localize_vars' ) );

		$this->feed_protection();
	}


	/**
	 * @since 1.0.0
	 */
	protected function feed_protection() {

		if ( cpp_option( 'feed_protection' ) ) {

			if ( is_feed() ) {

				if ( cpp_option( 'feed_protection' ) === 'disable' ) {
					wp_die( __( 'Feed has been disabled.', 'content-protector-pack' ) );
				} elseif ( cpp_option( 'feed_protection' ) === 'redirect' ) {

					$link = '';

					//
					// All singulars link
					//
					if ( is_singular() ) {
						$link = get_permalink();
					}
					//
					// All archive post types link
					//
					elseif ( is_post_type_archive() ) {

						$object = get_queried_object();

						if ( $object && ! is_wp_error( $object ) ) {
							if ( isset( $object->query_var ) ) {
								$link = get_post_type_archive_link( $object->query_var );
							}
						}
					}
					//
					// All taxonomies
					//
					else {
						$object = get_queried_object();

						if ( $object && ! is_wp_error( $object ) ) {

							if ( isset( $object->term_id ) ) {
								$link = bf_get_term_link( $object, $object->taxonomy );
							}
						}
					}

					if ( empty( $link ) ) {
						$link = home_url( '/' );
					}

					wp_redirect( $link, 302 );
				}

			}

		}

		// Add message to footer of feed items
		if ( cpp_option( 'feed_footer_text' ) && cpp_option( 'feed_protection' ) === '' ) {
			add_filter( 'the_content_feed', array( $this, 'append_feed_footer_text' ) );
		}
	}


	/**
	 * Append custom defined message at the end of the posts
	 *
	 * @hooked the_content_feed
	 *
	 * @param string $content The current post content.
	 *
	 * @since  1.0.0
	 * @return string
	 */
	public function append_feed_footer_text( $content ) {

		return $content . cpp_option( 'feed_footer_text' );
	}


	/**
	 * Append localize variables.
	 *
	 * @param array $loc
	 *
	 * @since 1.0.0
	 * @return array
	 */
	public function localize_vars( $loc ) {

		if ( cpp_option( 'image_protection' ) ) {

			$loc['opt-1'] = array(
				(bool) cpp_option( 'image_right_click' ),
				(bool) cpp_option( 'image_drag_drop' ),
			);
		}

		if ( cpp_option( 'content_copy' ) !== 'no-protection' ) {

			$loc['opt-2'] = array(
				cpp_option( 'content_copy_footer_text' ),
				! cpp_option( 'allow_right_click' ),
				(bool) cpp_option( 'allow_right_click_internal_links' ),
				cpp_option( 'right_click_alert' ),
				$this->get_disabled_shortcuts(),
				! cpp_option( 'allow_selection' ),
				! cpp_option( 'allow_copy' ),
				cpp_hosts(),
				cpp_option( 'content_copy_footer_text_length' ), // characters length
			);
		}

		$iframe_protection = cpp_option( 'iframe_protection' );

		if ( $iframe_protection === 'message' || $iframe_protection === 'full' ) {

			$loc['opt-3'] = array(
				'message',
				cpp_option( 'iframe_protection_message' ),
				'',
			);

		} elseif ( $iframe_protection === 'redirect' ) {

			$loc['opt-3'] = array(
				'redirect',
				'',
				get_permalink( cpp_option( 'iframe_protection_page' ) ),
			);
		}

		return $loc;
	}


	/**
	 * Get list of disabled shortcuts.
	 *
	 * @since 1.0.0
	 * @return array
	 */
	protected function get_disabled_shortcuts() {

		$shortcuts = array();

		$keys = array(
			'ctrl_a',
			'ctrl_c',
			'ctrl_x',
			'ctrl_v',
			'ctrl_s',
			'ctrl_u',
			'ctrl_p',
			'cmd_a',
			'cmd_c',
			'cmd_x',
			'cmd_v',
			'cmd_s',
			'cmd_u',
			'cmd_p',
			'cmd_shift_4',
			'cmd_shift_3',
			'cmd_alt_i',
			'ctrl_shift_i',
			'cmd_alt_u',
			'cmd_ctrl_shift_3',
			'cmd_shift_4_space',
		);


		foreach ( $keys as $key ) {

			if ( cpp_option( "disable_$key" ) ) {

				$shortcuts[] = $key;
			}
		}

		return $shortcuts;
	}


	/**
	 * @hooked wp_footer
	 *
	 * @since  1.0.0
	 */
	public function disable_print() {

		$print = cpp_option( 'print_protection' );

		if ( 'no-protection' === $print ) {
			return;
		}

		if ( 'full-protection' === $print ) {
			?>

			<style type="text/css" media="print">
				* {
					display: none !important;
				}
			</style>
			<?php

			return;
		}

		if ( 'full-protection-msg' === $print ) {
			?>

			<style type="text/css" media="print">

				* {
					display: none !important;
				}

				body, html {
					display: block !important;
				}

				#cpp-print-disabled {
					top: 0;
					left: 0;
					color: #111;
					width: 100%;
					height: 100%;
					min-height: 400px;
					z-index: 9999;
					position: fixed;
					font-size: 30px;
					text-align: center;
					background: #fcfcfc;

					padding-top: 200px;

					display: block !important;
				}
			</style>

			<div id="cpp-print-disabled" style="display: none;">
				<?php echo cpp_option( 'print_protection_custom_message' ) ?>
			</div>

			<?php
		}
	}


	/**
	 * @hooked wp_footer
	 *
	 * @since  1.0.0
	 */
	public function disabled_js_protection() {

		if ( cpp_is_amp() ) {
			return;
		}

		$js_protection = cpp_option( 'disabled_js_protection' );

		if ( 'off' === $js_protection ) {

			return;
		}

		if ( 'custom_message' === $js_protection ) {
			?>

			<noscript>

				<style>
					#cpp-js-disabled {
						top: 0;
						left: 0;
						color: #111;
						width: 100%;
						height: 100%;
						z-index: 9999;
						position: fixed;
						font-size: 25px;
						text-align: center;
						background: #fcfcfc;
						padding-top: 200px;
					}

				</style>

				<div id="cpp-js-disabled">
					<h4>
						<?php echo cpp_option( 'disabled_js_message' ) ?>
					</h4>
				</div>

			</noscript>
			<?php

			return;
		}

		if ( 'force_redirect' === $js_protection && get_queried_object_id() != cpp_option( 'disabled_js_redirect_page' ) ) {

			?>
			<noscript>

				<meta http-equiv="refresh"
				      content="0;url=<?php echo esc_attr( get_permalink( cpp_option( 'disabled_js_redirect_page' ) ) ) ?>"/>
			</noscript>
			<?php

			return;
		}
	}


	/**
	 * @hooked the_content
	 *
	 * @param string $post_content
	 *
	 * @since  1.0.0
	 * @return array
	 */
	public function remove_image_parent_link( $post_content ) {

		if ( ! class_exists( 'CPP_Utils' ) ) {

			require Content_Protector_Pack::dir_path( 'includes/class-cpp-utils.php' );
		}

		CPP_Utils::remove_parent_link( $post_content, 'img' );

		return $post_content;
	}


	/**
	 * Print some empty lines before start html.
	 *
	 * @hooked template_include
	 *
	 * @param string $template The path of the template to include.
	 *
	 * @since  1.0.0
	 * @return string
	 */
	public function append_head_empty_lines( $template ) {

		if ( ! $count = intval( cpp_option( 'view_source_top_empty_lines_count' ) ) ) {
			return $template;
		}

		echo str_repeat( "\n", $count );

		return $template;
	}
}
