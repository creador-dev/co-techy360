<?php


/**
 * Merge and compress static js/css files.
 *
 * @since 2.9.0
 */
class BF_Styles extends BF_Minify {

	public $printed = array();

	/**
	 * Set current css file
	 *
	 * @see sanitize
	 *
	 * @var string
	 */
	public $_current_file_url;

	/**
	 * Store extra css content
	 *
	 * @see add_css_file
	 *
	 * @var array
	 */
	public $extra_css = array();


	/**
	 * Initialize
	 *
	 * @since 2.9.0
	 */
	public function init() {

		if ( is_admin() ) {

			add_action( 'admin_head', 'BF_Styles::print_head_styles' );
			add_action( 'admin_footer', 'BF_Styles::print_footer_styles' );
		} else {

			add_action( 'wp_head', 'BF_Styles::print_head_styles' );
			add_action( 'wp_footer', 'BF_Styles::print_footer_styles' );
		}
	}


	/**
	 * Print style tags
	 *
	 * @since 2.9.0
	 */
	public function print_output() {

		$handles = $this->do_items( FALSE, 'all' );
		$this->_print_styles( $handles );

		$this->printed = $handles;
	}


	/**
	 *
	 */
	public function print_all_extra_css() {

		if ( ! $this->extra_css ) {
			return;
		}

		foreach ( $this->extra_css as $id => $_ ) {

			if ( $css = $this->get_extra_css( $id ) ) {

				if ( $css['type'] === 'file' ) {
					self::print_style( $css['data'], $id );
				} elseif ( $css['type'] === 'inline' ) {
					self::print_inline_css( $css['data'] );
				}
			}
		}
	}


	/**
	 * @param string $id
	 *
	 * @return array
	 */
	public function get_extra_css( $id ) {

		static $cache_dir, $cache_url;

		if ( ! $cache_dir ) {
			$cache_dir = trailingslashit( WP_CONTENT_DIR . '/' . self::$cache_dir );
			$cache_url = trailingslashit( content_url( self::$cache_dir ) );
		}

		if ( ! isset( $this->extra_css[ $id ] ) ) {
			return array();
		}

		$filename = $this->string_hash( $id ) . '.css';

		if ( is_readable( $cache_dir . $filename ) ) {

			return array(
				'type' => 'file',
				'data' => $cache_url . $filename,
			);
		} else {

			$content = call_user_func( $this->extra_css[ $id ], $id );

			if ( $this->is_dir_writable( $cache_dir ) ) {

				$this->_current_file_url = site_url( add_query_arg( FALSE, FALSE ) );

				$content = $this->sanitize_content( $content );
				$content = $this->minify( $content );
			}

			if ( self::write_file( $cache_dir . $filename, $content ) ) {

				return array(
					'type' => 'file',
					'data' => $cache_url . $filename,
				);
			}

			return array(
				'type' => 'inline',
				'data' => $content,
			);
		}
	}


	/**
	 * Print style tags
	 *
	 * @since 2.9.0
	 */
	public function print_output2() {

		$this->done = array();

		$handles = $this->do_items( array_diff( $this->queue, $this->printed ) );

		$this->_print_styles( $handles );
	}


	/**
	 * Compress css content
	 *
	 * @param string $css
	 * @param array  $handle
	 *
	 * @return string
	 * @since 2.9.0
	 */
	public function sanitize( $css, $handle ) {

		$this->_current_file_url = dirname( $this->registered[ $handle ]->src );


		return $this->sanitize_content( $css );
	}


	public function sanitize_content( $css ) {

		return preg_replace_callback( "'url \s* \( \s*  ([\"\'])? (?(1) (.*?)\\1 | ([^\s\)]+))  \s* \)'isx", array(
			$this,
			'sanitize_url'
		), $css );

	}


	/**
	 * @param array $match
	 *
	 * @access private
	 *
	 * @return string
	 */
	public function sanitize_url( $match ) {

		$path = empty( $match[3] ) ? $match[2] : $match[3];

		// is data URI ?
		if ( substr( $path, 0, 5 ) == 'data:' ) {
			return 'url("' . $path . '")';
		}

		if ( filter_var( $path, FILTER_VALIDATE_URL ) ) {
			return 'url("' . $path . '")';
		}

		if ( $path[0] === '/' ) {

			$parsed_url = parse_url( $this->_current_file_url );
			$url        = $parsed_url['scheme'] . '://' . $parsed_url['host'] . $path;

		} else {

			$url = bf_esc_file_path( trailingslashit( $this->_current_file_url ) . ltrim( $path, '/' ) );
		}

		return 'url("' . $url . '")';
	}


	/**
	 * Print style tags
	 *
	 * @param array $handles
	 *
	 * @since 2.9.0
	 */
	public function _print_styles( $handles ) {

		if ( ! $handles ) {
			return;
		}

		if ( count( $handles ) === 1 ) {
			self::print_style( $this->registered[ $handles[0] ]->src );

			return;
		}

		$file_dir  = trailingslashit( WP_CONTENT_DIR . '/' . self::$cache_dir );
		$file_name = $this->handles_hash( $handles ) . '.css';

		if ( is_readable( $file_dir . $file_name ) || $this->do_minify( $handles, $file_dir . $file_name ) ) {
			self::print_style( content_url( self::$cache_dir . '/' . $file_name ) );
		} else {

			foreach ( $handles as $handle ) {
				self::print_style( $this->registered[ $handle ]->src, $handle );
			}
		}
	}


	/**
	 * Print stylesheet tag
	 *
	 * @param string $url
	 * @param string $handle
	 *
	 * @since 2.9.0
	 */
	public static function print_style( $url, $handle = '' ) {

		if ( ! $handle ) {
			static $i = 0;

			$handle = 'bf-minifed-css-' . ++ $i;
		}

		echo '<link rel=\'stylesheet\' id=\'', $handle, '\' href=\'', $url, '\' type=\'text/css\' media=\'all\' />';
		echo "\n";
	}


	/**
	 * Print inline stylesheet
	 *
	 * @param string $css
	 * @param string $media
	 */
	public static function print_inline_css( $css, $media = 'screen' ) {

		echo '<style type=\'text/css\' media=\'' . $media . '\'>';
		echo $css;
		echo '</style>';
	}


	/**
	 * Print header stylesheet tags
	 */
	public static function print_head_styles() {

		bf_styles()->print_output();

		bf_styles()->print_all_extra_css();
	}


	/**
	 * Print footer stylesheet tags
	 */
	public static function print_footer_styles() {

		bf_styles()->print_output2();
	}


	/**
	 * Callback to compress files content
	 *
	 * @param string $content
	 *
	 * @since 2.9.0
	 * @return string|bool
	 */
	public function minify( $content ) {

		if ( ! bf_booster_is_active( 'minify-css' ) ) {
			return $content;
		}

		$content = str_replace( ' 0px', '0', $content );
		$content = preg_replace( '#\s+#', ' ', $content );
		$content = preg_replace( '#/\*.*?\*/#s', '', $content );
		$content = str_replace( '; ', ';', $content );
		$content = str_replace( ': ', ':', $content );
		$content = str_replace( ' {', '{', $content );
		$content = str_replace( '{ ', '{', $content );
		$content = str_replace( ', ', ',', $content );
		$content = str_replace( '} ', '}', $content );
		$content = str_replace( ';}', '}', $content );
		$content = str_replace( array( "\r", "\n", "\t" ), '', $content );
		$content = str_replace( ' ~ ', '~', $content );
		$content = str_replace( ' > ', '>', $content );
		$content = str_replace( ' + ', '+', $content );
		$content = str_replace( '@media (', '@media(', $content );
		$content = str_replace( ') and (', ')and(', $content );

		return trim( $content );
	}


	/**
	 * Append inline css content into a file
	 *
	 * @param string   $unique_id unique name
	 * @param callable $content_cb
	 */
	public function add_css_file( $unique_id, $content_cb ) {

		$this->extra_css[ $unique_id ] = $content_cb;
	}
}
