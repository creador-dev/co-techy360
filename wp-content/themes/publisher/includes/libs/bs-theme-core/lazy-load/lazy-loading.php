<?php

add_action( 'wp_enqueue_scripts', 'publisher_enqueue_lazy_loading' );

if ( ! function_exists( 'publisher_enqueue_lazy_loading' ) ) {
	/**
	 * Enqueue lazy loading javascript file
	 *
	 * @since 1.1.0
	 */
	function publisher_enqueue_lazy_loading() {

		if ( ! publisher_is_lazy_loading() ) {
			return;
		}

		$prefix = ! bf_is( 'dev' ) ? '.min' : '';

		bf_enqueue_script(
			'blazy',
			Publisher_Theme_Core()->get_dir_url( 'lazy-load/assets/js/blazy' . $prefix . '.js' ),
			array(),
			Publisher_Theme_Core()->get_dir_path( 'lazy-load/assets/js/blazy' . $prefix . '.js' ),
			Publisher_Theme_Core()->get_version()
		);
	}
}


if ( ! function_exists( 'publisher_lazy_load_image_sizes' ) ) {
	/**
	 * Get image alternative sizes
	 *
	 * @since 1.1.0
	 *
	 * @return array
	 */
	function publisher_lazy_load_image_sizes() {

		return array();
	}
}


if ( ! function_exists( 'publisher_enable_lazy_loading' ) ) {
	/**
	 * Turn lazy loading on
	 *
	 * @since 1.1.0
	 */
	function publisher_enable_lazy_loading() {

		global $publisher_lazy_active;

		$publisher_lazy_active = true;
	}
}


if ( ! function_exists( 'publisher_disable_lazy_loading' ) ) {
	/**
	 * Turn lazy loading off
	 *
	 * @since 1.1.0
	 */
	function publisher_disable_lazy_loading() {

		global $publisher_lazy_active;

		$publisher_lazy_active = false;
	}
}

if ( ! function_exists( 'publisher_is_lazy_loading' ) ) {
	/**
	 * Turn lazy loading off
	 *
	 * @since 1.1.0
	 */
	function publisher_is_lazy_loading() {

		global $publisher_lazy_active;

		return ! empty( $publisher_lazy_active ) && ! bf_is_doing_ajax( 'fetch-mce-view-shortcode' )
		       && ! bf_is_doing_ajax( 'kc_load_element_via_ajax' );
	}
}


if ( ! function_exists( 'publisher_generate_bs_srcset' ) ) {
	/**
	 * Generate custom srcset attribute value (bs-srcset)
	 *
	 * @since 1.8.0
	 *
	 * @param string|int $thumbnail_id post thumbnail ID
	 * @param string     $size         post thumbnail size
	 * @param array      $args         additional settings
	 *
	 * @return string
	 */
	function publisher_generate_bs_srcset( $thumbnail_id, $size, $args = array() ) {

		// Buggy plugins are passing array as size!
		if ( is_array( $size ) ) {
			return '';
		}

		$sizes = publisher_get_attachment_sizes( $thumbnail_id, $size );

		if ( empty( $sizes ) ) {
			return '';
		}

		if ( empty( $args['baseurl'] ) ) {

			$src     = wp_get_attachment_image_src( $thumbnail_id, $size );
			$baseurl = $src[0];

		} else {

			$baseurl = $args['baseurl'];
		}
		$baseurl = trailingslashit( dirname( $baseurl ) );

		return esc_attr( json_encode( compact( 'baseurl', 'sizes' ) ) );
	}
}


if ( ! function_exists( 'publisher_get_attachment_sizes' ) ) {
	/**
	 * Get related size of each thumbnail size based on the manual configuration
	 *
	 *
	 * @param        $thumbnail_id
	 * @param string $size
	 *
	 * @return array
	 */
	function publisher_get_attachment_sizes( $thumbnail_id, $size = '' ) {

		$meta = wp_get_attachment_metadata( $thumbnail_id );

		if ( ! $meta ) {
			return array();
		}

		$sizes = array();

		if ( ! empty( $meta['sizes'] ) ) {

			//
			// Manual related sizes
			//
			{
				$similar = '';

				if ( ! empty( $size ) ) {
					$similar = publisher_lazy_load_image_sizes();

					if ( ! isset( $similar[ $size ] ) ) {
						return array();
					}
				}
			}

			if ( empty( $size ) ) {
				foreach ( $meta['sizes'] as $_attr ) {
					$sizes[ $_attr['width'] ] = $_attr['file'];
				}
			} else {
				foreach ( array_intersect_key( $meta['sizes'], array_flip( $similar[ $size ] ) ) as $_attr ) {
					$sizes[ $_attr['width'] ] = $_attr['file'];
				}
			}
		}

		if ( isset( $meta['sizes'][ $size ]['width'] ) ) {
			$sizes[ $meta['sizes'][ $size ]['width'] ] = $meta['sizes'][ $size ]['file'];
		}

		if ( ! empty( $meta['width'] ) && ! empty( $meta['file'] ) ) { # always save original image size
			$sizes[ $meta['width'] ] = bf_basename( $meta['file'] );
		}

		ksort( $sizes );

		return $sizes;
	}
}


if ( ! function_exists( 'publisher_get_thumbnail_attr' ) ) {
	/**
	 * Get style attributes with background image
	 *
	 *
	 * @param array       $args             array {
	 *
	 * @type string|array $size             Optional. Image size. Accepts any valid image size, or an array of width and height values in pixels. Default 'thumbnail'.
	 * @type string       $extra_style      Optional. Element inline styles
	 * @type int          $attachment_id    Optional. Custom attachment ID
	 * @type bool         $smart_image_size Optional.
	 * }
	 *
	 * @return string
	 * @since    1.1.0
	 */
	function publisher_get_thumbnail_attr( $args = array() ) {

		if ( is_string( $args ) ) {
			$args = array( 'size' => $args );
		}

		if ( empty( $args['size'] ) ) {
			$args['size'] = 'thumbnail';
		}

		if ( ! isset( $args['extra_style'] ) ) {
			$args['extra_style'] = '';
		}
		if ( ! isset( $args['smart_image_size'] ) ) {
			$args['smart_image_size'] = true;
		}

		//
		// Thumbnail data can be come from outside!
		//
		if ( ! empty( $args['attachment_data'] ) && isset( $args['attachment_data']['src'] ) ) {
			$image_info = array(
				'id'    => isset( $args['attachment_data']['id'] ) ? $args['attachment_data']['id'] : '',
				'src'   => $args['attachment_data']['src'],
				'alt'   => isset( $args['attachment_data']['alt'] ) ? $args['attachment_data']['src'] : '',
				'title' => publisher_the_title_attribute( '', '', false ),
			);
		}

		if ( ! isset( $image_info ) ) {
			if ( ! empty( $args['attachment_id'] ) ) {
				$image_info = wp_get_attachment_image_src( $args['attachment_id'], $args['size'] );

				$image_info = array(
					'id'    => $args['attachment_id'],
					'src'   => $image_info[0],
					'alt'   => get_post_meta( $args['attachment_id'], '_wp_attachment_image_alt', true ),
					'title' => publisher_the_title_attribute( '', '', false ),
				);
			} else {
				$image_info = publisher_get_thumbnail( $args['size'] );
			}
		}

		$output = '';

		if ( ! empty( $image_info['alt'] ) ) {
			$output .= sprintf( ' alt="%s"', esc_attr( $image_info['alt'] ) );
		}

		if ( ! empty( $image_info['title'] ) ) {
			$output .= sprintf( ' title="%s"', esc_attr( $image_info['title'] ) );
		}

		if ( empty( $image_info['src'] ) ) {
			return '';
		}

		if ( publisher_is_lazy_loading() ) {

			$output .= sprintf( ' data-src="%s"', $image_info['src'] );

			if ( $args['extra_style'] ) {
				$output .= sprintf( ' style="%s"', $args['extra_style'] );
			}

			// Calculate custom srcset attr
			if ( ! empty( $image_info['id'] ) && $args['smart_image_size'] && ( ! isset( $image_info['skip_smart_lazy'] ) || ! $image_info['skip_smart_lazy'] ) ) {

				if ( $srcset = publisher_generate_bs_srcset( $image_info['id'], $args['size'] ) ) {

					$output .= sprintf( ' data-bs-srcset="%s"', $srcset );
				}
			}

		} else {

			$sizes = publisher_get_attachment_sizes( $image_info['id'], $args['size'] );

			//
			// Find the next size of current image and set it as retina image
			// It's not perfect but it's better than nothing!
			//
			{
				$retina = '';

				if ( ! empty( $sizes ) && isset( $sizes[ $image_info['width'] ] ) ) {

					$fetch_next = false;
					foreach ( $sizes as $k => $v ) {

						if ( $fetch_next ) {
							$retina = $v;
							break;
						}

						if ( $k === $image_info['width'] ) {
							$fetch_next = true;
						}
					}

					//
					// Create final URL for retina size
					//
					if ( $retina ) {

						if ( ! empty( $args['baseurl'] ) ) {
							$retina = trailingslashit( $args['baseurl'] ) . $retina;
						} else {
							$retina = trailingslashit( dirname( $image_info['src'] ) ) . $retina;
						}
					}
				}
			}

			if ( $retina ) {
				$output .= sprintf( ' style="background-image: url(%s);%s" data-bsrjs="%s"', $image_info['src'], $args['extra_style'], $retina );
			} else {
				$output .= sprintf( ' style="background-image: url(%s);%s"', $image_info['src'], $args['extra_style'] );
			}

		}

		return $output;
	}
}


if ( ! function_exists( 'publisher_the_thumbnail_attr' ) ) {
	/**
	 * Print style attributes with background image
	 *
	 * @param array|string $args
	 *
	 * @see      publisher_get_thumbnail_attr
	 *
	 * @since    1.1.0
	 */
	function publisher_the_thumbnail_attr( $args ) {

		echo publisher_get_thumbnail_attr( $args );
	}
}


if ( ! function_exists( 'publisher_get_image_attr' ) ) {
	/**
	 * Get style attributes with background image
	 *
	 * @param int    $image_url Image attachment ID.
	 * @param string $extra_style
	 *
	 * @since 1.1.0
	 * @return string
	 */
	function publisher_get_image_attr( $image_url, $extra_style = '' ) {

		if ( publisher_is_lazy_loading() ) {

			$output = sprintf( ' data-src="%s"', esc_url( $image_url ) );

			if ( $extra_style ) {
				$output .= sprintf( ' style="%s"', $extra_style );
			}

		} else {

			$output = sprintf( 'style="background-image: url(%s);%s"', esc_url( $image_url ), $extra_style );
		}

		return $output;
	}
}


if ( ! function_exists( 'publisher_the_image_attr' ) ) {
	/**
	 * Print style attributes with background image
	 *
	 * @param int    $image_url Image attachment ID.
	 * @param string $extra_style
	 *
	 * @since 1.1.0
	 */
	function publisher_the_image_attr( $image_url, $extra_style = '' ) {

		echo publisher_get_image_attr( $image_url, $extra_style );
	}
}

if ( ! function_exists( 'publisher_get_image_tag' ) ) {
	/**
	 * Get img tag with specified attributes
	 *
	 * @param array $attributes tag attributes
	 *
	 * @since 1.1.0
	 * @return string
	 */
	function publisher_get_image_tag( $attributes ) {

		if ( publisher_is_lazy_loading() && isset( $attributes['src'] ) ) {

			$attributes['data-src'] = $attributes['src'];
			unset( $attributes['src'] );
		}

		$output = '<img ';

		foreach ( $attributes as $attr_key => $attr_value ) {
			$output .= sprintf( ' %s="%s"', $attr_key, esc_attr( $attr_value ) );
		}

		$output .= '>';

		return $output;
	}
}

if ( ! function_exists( 'publisher_the_image_tag' ) ) {
	/**
	 * Print img tag with specified attributes
	 *
	 * @param array $attributes tag attributes
	 *
	 * @since 1.1.0
	 */
	function publisher_the_image_tag( $attributes ) {

		echo publisher_get_image_tag( $attributes );
	}
}

add_action( 'better-framework/after_setup', 'publisher_active_lazy_loading', 40 );

if ( ! function_exists( 'publisher_active_lazy_loading' ) ) {
	/**
	 * Active lazy loading
	 *
	 * @since 1.1.0
	 */
	function publisher_active_lazy_loading() {

		// disable lazy loading in admin
		if ( is_admin() && ! bf_is_doing_ajax() ) {
			return;
		}

		// disable lazy loading in gutenberg block render request
		if ( function_exists( 'bf_is_block_render_request' ) && bf_is_block_render_request() ) {
			return;
		}

		if ( publisher_get_option( 'lazy_loading' ) === 'enable' ) {
			publisher_enable_lazy_loading();
		}
	}
}

add_action( 'template_redirect', 'publisher_init_lazy_loading' );

if ( ! function_exists( 'publisher_init_lazy_loading' ) ) {
	/**
	 * Active lazy loading
	 *
	 * @since 1.1.0
	 */
	function publisher_init_lazy_loading() {

		add_filter( 'body_class', 'publisher_lazy_loading_class' );

		if ( ! publisher_is_lazy_loading() ) {
			return;
		}

		// BetterAMP or Official AMP plugins
		// Facebook Instant Articles
		if ( bf_is_amp() || bf_is_fia() ) {
			return;
		}

		// is RSS feed?
		if ( is_feed() ) {
			return;
		}

		// admin or ajax request
		if ( is_admin() ) {
			return;
		}

		// Transform the_content images to lazy load
		add_filter( 'post_thumbnail_html', 'publisher_lazy_loading_img_tags', 6 );
		add_filter( 'the_content', 'publisher_lazy_loading_img_tags', 6 );
		add_filter( 'get_avatar', 'publisher_lazy_loading_avatar', 999 );

		/**
		 * Begin Replace srcset with bs-srcset
		 */
		add_action( 'begin_fetch_post_thumbnail_html', '_themename_catch_featured_image_id', 11, 2 );
		add_action( 'end_fetch_post_thumbnail_html', '_themename_clear_featured_image_id' );

		// Disable Featured Image srcset
		add_filter( 'wp_calculate_image_srcset_meta', 'publisher_disable_featured_image_srcset', 11, 4 );

		// Append bs-srcset attribute
		add_filter( 'wp_get_attachment_image_attributes', 'publisher_add_bs_srcset_attr', 40, 3 );

	}
}


if ( ! function_exists( 'publisher_lazy_loading_img_tags' ) ) {
	/**
	 * Enable content images to load lazy
	 *
	 * @param string $content
	 *
	 * @since 1.8.0
	 * @return string
	 */
	function publisher_lazy_loading_img_tags( $content ) {

		$content = preg_replace( "'(<\s*img\s.*?\s+)src\s*=\s*'isx", '$1 data-src=', $content );
		$content = preg_replace( "'(<\s*img\s.*?\s+)srcset\s*=\s*'isx", '$1 data-srcset=', $content );

		return $content;
	}
}

if ( ! function_exists( 'publisher_lazy_loading_avatar' ) ) {
	/**
	 * Load avatar image lazy
	 *
	 * @param string $content
	 *
	 * @since 1.8.0
	 * @return string
	 */
	function publisher_lazy_loading_avatar( $content ) {

		$atts = bf_list_attributes( $content );

		// Convert srcset to bs-srcset
		if ( isset( $atts['srcset'] ) && isset( $atts['src'] ) && isset( $atts['width'] ) &&
		     preg_match( '/^(.*?)\s+(\d+)x$/i', $atts['srcset'], $match )
		) {

			$size2_url    = $match[1];
			$size2_factor = intval( $match[2] );

			$base_size = intval( $atts['width'] );
			$new_size  = $base_size * $size2_factor;

			$baseurl = trailingslashit( dirname( $size2_url ) );
			$sizes   = array(
				$base_size => bf_basename( $atts['src'] ),
				$new_size  => bf_basename( $size2_url )
			);
			ksort( $sizes );

			$atts['data-bs-srcset'] = esc_attr( json_encode( compact( 'baseurl', 'sizes' ) ) );
			unset( $atts['srcset'] );

			$atts['data-src'] = $atts['src'];
			unset( $atts['src'] );

			$content = '<img ';

			foreach ( $atts as $key => $value ) {
				$content .= sprintf( ' %s="%s"', $key, $value );
			}

			$content .= '/>';

		} else {

			$content = publisher_lazy_loading_img_tags( $content );
		}


		return $content;
	}
}


if ( ! function_exists( '_themename_catch_featured_image_id' ) ) {
	/**
	 * @param int|string $post_id
	 * @param int|string $thumbnail_id
	 *
	 * @since 1.8.0
	 */
	function _themename_catch_featured_image_id( $post_id, $thumbnail_id ) {

		$GLOBALS['publisher_catch_featured_image_id'] = $thumbnail_id;
	}
}

if ( ! function_exists( '_themename_clear_featured_image_id' ) ) {

	/**
	 * @since 1.8.0
	 */
	function _themename_clear_featured_image_id() {

		$GLOBALS['publisher_catch_featured_image_id'] = 0;
	}
}

if ( ! function_exists( 'publisher_disable_featured_image_srcset' ) ) {
	/**
	 * Turn srcset generating off
	 *
	 * @param array $image_meta
	 *
	 * @since 1.8.0
	 * @return array
	 */
	function publisher_disable_featured_image_srcset( $image_meta ) {

		$thumbnail_id = func_get_arg( 3 );

		if ( isset( $GLOBALS['publisher_catch_featured_image_id'] ) && $thumbnail_id == $GLOBALS['publisher_catch_featured_image_id'] ) {
			unset( $image_meta['sizes'] );
		}

		return $image_meta;
	}
}

if ( ! function_exists( 'publisher_add_bs_srcset_attr' ) ) {
	/**
	 * Generate bs-srcset attribute
	 *
	 * @param array   $atts
	 * @param WP_Post $attachment
	 * @param string  $size
	 *
	 * @return array
	 * @since 1.8.0
	 */
	function publisher_add_bs_srcset_attr( $atts, $attachment, $size ) {

		if ( isset( $GLOBALS['publisher_catch_featured_image_id'] ) && isset( $attachment->ID ) && $attachment->ID == $GLOBALS['publisher_catch_featured_image_id'] ) {

			if ( $srcset = publisher_generate_bs_srcset( $attachment->ID, $size ) ) {

				$atts['data-bs-srcset'] = $srcset;
			}
		}

		return $atts;
	}
}

if ( ! function_exists( 'publisher_lazy_loading_class' ) ) {
	/**
	 * Append lazy loading status  to body tag
	 *
	 * @param array $classes
	 *
	 * @return array
	 */
	function publisher_lazy_loading_class( $classes ) {

		if ( publisher_get_option( 'lazy_loading' ) === 'enable' ) {
			$classes[] = 'bs-ll-a'; // bs-lazyloading-active
		} else {
			$classes[] = 'bs-ll-d'; // bs-lazyloading-active
		}


		return $classes;
	}
}

if ( ! function_exists( 'publisher_lazy_loading_tinymce_class' ) ) {

	add_filter( 'tiny_mce_before_init', 'publisher_lazy_loading_tinymce_class' );

	/**
	 * Append lazy-loading disabled class to tinymce iframe
	 *
	 * @see publisher_is_lazy_loading
	 *
	 * @param array $mceInit
	 *
	 * @return array
	 */
	function publisher_lazy_loading_tinymce_class( $mceInit ) {

		if ( ! isset( $mceInit['body_class'] ) ) {
			$mceInit['body_class'] = '';
		}

		$mceInit['body_class'] .= ' bs-ll-d';

		return $mceInit;
	}
}
