<?php

BF_Content_Inject::init();


/**
 * Class BF_Content_Inject
 *
 * Inject custom code into post content in single page
 *
 * @since 2.10.0
 */
class BF_Content_Inject {

	/**
	 * a Flag to turn injector on/off.
	 *
	 * @var bool
	 */
	static $working = true;

	/**
	 * Store injections list
	 *
	 * @var array
	 *
	 * @since 2.10.0
	 */
	static $injections = array();


	/**
	 * Store Custom configurations
	 *
	 * @var array
	 *
	 * @since 2.14.0
	 */
	static $config = array();


	/**
	 * Inject custom config
	 *
	 * @param array   $item        array {
	 *
	 * @type int      $priority    action priority.optional. default 10
	 * @type string   $position    top|middle|bottom|{Paragraph Number}
	 * @type string   $content     content to inject. optional if $content_cb set
	 * @type callable $content_cb  deferred content callback name. optional if $content set
	 *
	 * @type string   $user_status user sign-in status which is logged-in|guest. optional.
	 * @type callable $filter_cb   custom filter callback. optional.
	 * @type string   $post_type   post type filter. optional.
	 * @type array    $author      authors ID. optional.
	 * @type array    $taxonomies  terms ID. optional. array {
	 *
	 * @type string   $taxonomy    => @type array terms ID
	 *
	 * ...
	 * }
	 * }
	 *
	 * @since 2.10.0
	 */
	public static function inject( $item = array() ) {

		self::$injections[] = $item;
	}


	/**
	 * Injector custom configuration
	 *
	 * @param string $config_name
	 * @param array  $configuration   array {
	 *
	 * @type array   $blocks_elements block level html elements
	 *
	 * }
	 *
	 * @since 2.14.0
	 */
	public static function config( $config_name, $configuration ) {

		self::$config[ $config_name ] = $configuration;
	}


	/**
	 * Initialize library
	 *
	 * @since 2.10.0
	 */
	public static function init() {

		add_filter( 'the_content', 'BF_Content_Inject::the_content', 999 );
	}


	/**
	 * Handy function to get final content of injections.
	 *
	 * @param $injection
	 *
	 * @return mixed|string
	 */
	public static function get_injection_content( $injection ) {

		if ( isset( $injection['content_cb'] ) ) {
			return call_user_func( $injection['content_cb'], $injection );
		} elseif ( isset( $injection['content'] ) ) {
			return $injection['content'];
		}

		return '';
	}


	/**
	 * Modify post content and append custom codes
	 *
	 * @param string $content
	 *
	 * @since 2.10.0
	 * @return string
	 */
	public static function the_content( $content ) {

		if ( ! self::$working ) {
			return $content;
		}

		$before = $after = '';

		$paragraph_changed = false;

		usort( self::$injections, 'BF_Content_Inject::priority_sort' );
		usort( self::$injections, 'BF_Content_Inject::sort_config' );

		foreach ( self::$injections as $_inject ) {

			if ( ! self::can_inject( $_inject ) ) {
				continue;
			}


			if ( $_inject['position'] === 'top' ) {

				$before .= self::get_injection_content( $_inject );

			} elseif ( $_inject['position'] === 'bottom' ) {

				$after .= self::get_injection_content( $_inject );

			} else {

				if ( ! isset( $html_blocks ) ) {
					$html_blocks       = self::get_html_blocks( $content );
					$html_blocks_count = bf_count( $html_blocks );
				}

				if ( $_inject['position'] === 'middle' ) {

					$position = floor( $html_blocks_count / 2 );
					self::inject_after( $html_blocks, $_inject, $position );
					$paragraph_changed = true;

				} elseif ( $position = absint( $_inject['position'] ) ) {

					$config_id    = empty( $_inject['config'] ) ? 'default' : $_inject['config'];
					$allowed_tags = isset( self::$config[ $config_id ]['blocks_elements'] ) ? self::$config[ $config_id ]['blocks_elements'] : array();

					if ( ! $after || ( $position !== $html_blocks_count ) ) {

						self::inject_after( $html_blocks, $_inject, $_inject['position'], $allowed_tags );
						$paragraph_changed = true;
					}
				}
			}
		}

		if ( $paragraph_changed ) {
			$content = '';

			foreach ( $html_blocks as $block ) {
				$content .= $block['content'];
				$content .= ' ';
			}
		}

		return $before . $content . $after;

	} // the_content


	/**
	 * Whether to check can inject custom code or not
	 *
	 * @param array    $conf
	 *
	 * @global WP_Post $post Wordpress active post object
	 *
	 * @since 2.10.0
	 * @return bool true if possible
	 */
	public static function can_inject( $conf ) {

		global $post;

		$return = true;


		//
		// Filter callback
		//
		if ( ! empty( $conf['filter_cb'] ) ) {
			$return = call_user_func( $conf['filter_cb'], $post->ID, $conf, $post );

			if ( ! $return ) {
				return $return;
			}
		}


		//
		// Post type filter
		//
		if ( ! empty( $conf['post_type'] ) ) {

			if ( is_string( $conf['post_type'] ) ) {
				if ( $conf['post_type'] !== $post->post_type ) {
					$return = false;
				}
			} elseif ( is_array( $conf['post_type'] ) ) {
				if ( ! in_array( $post->post_type, $conf['post_type'] ) ) {
					$return = false;
				}
			}

			if ( ! $return ) {
				return $return;
			}
		}


		//
		// User status
		//
		if ( ! empty( $conf['user_status'] ) ) {

			$return = is_user_logged_in() ? 'logged-in' === $conf['user_status'] : 'guest' === $conf['user_status'];

			if ( ! $return ) {
				return $return;
			}
		}


		//
		// Post Author
		//
		if ( ! empty( $conf['author'] ) ) {

			$return = in_array( $post->post_author, $conf['author'] );

			if ( ! $return ) {
				return $return;
			}
		}


		//
		// Taxonomy
		//
		if ( ! empty( $conf['taxonomies'] ) ) {

			foreach ( $conf['taxonomies'] as $taxonomy => $IDs ) {

				$terms_id = wp_get_post_terms( $post->ID, $taxonomy, array( 'fields' => 'ids' ) );

				if ( is_wp_error( $terms_id ) || array_diff( $IDs, $terms_id ) ) {

					$return = false;
					break;
				}
			}

		}


		return $return;

	} // can_inject


	/**
	 * Divide html into several block
	 *
	 * @param string $html
	 * @param string $block_level_elements list of blocks level elements separated by pipe (Vertical bar)
	 *
	 * @return array|bool false on failure or array on success
	 * @since 2.10.0
	 */
	public static function get_html_blocks( $html, $block_level_elements = '' ) {

		if ( ! $block_level_elements ) {
			$block_level_elements = 'address|article|aside|blockquote|canvas|dd|div|dl|fieldset|figcaption|figure|footer|form|h1|h2|h3|h4|h5|h6|header|hgroup|hr|li|main|nav|ol|output|p|pre|section|table|tfoot|ul|video';
		}

		preg_match_all( '/
			( # Capture Whole HTML or Text
				\s* ( < \s* (' . $block_level_elements . ')  (?=.*\>) )? # Select HTML Open Tag

				(?(2)  # IF Open Tag Exists
					(.*?)  # accept innerHTML
		             <\s*\/\s*(?:\\3) \s* > \s* # Select HTML Close Tag
				|  # Else
				[^\n]+  # Capture pain text
				)  #END Condition
			)
		 /six', trim( $html ), $match );

		if ( empty( $match ) ) {
			return false;
		}

		$empty_check = array(
			'<p>&amp;nbsp;</p>' => '',
			'&nbsp;'            => '',
			'<p>&nbsp;</p>'     => '',
		);


		$block_valid_html = array();

		if ( array_filter( $match[3] ) ) { // html tag exits

			/**
			 * Fix Nested HTML Tag
			 */
			$html_blocks = array( 0 => array( 'content' => '' ) );
			$last_index  = - 1;

			$mark_plain_text_as_new_block = true;

			foreach ( $match[3] as $index => $tag ) {

				if ( ! trim( $match[1][ $index ] ) ) {
					continue;
				}

				if ( $tag ) {

					$ttext = trim( $match[1][ $index ] );

					if ( ! isset( $block_valid_html[ $index ] ) ) {
						$block_valid_html[ $index ] = self::is_valid_html( $match[0][ $index ] );
					}


					if (
						isset( $empty_check[ $ttext ] )

						|| (
							isset( $html_blocks[ $last_index ]['content'] ) &&
							! self::is_valid_html( $html_blocks[ $last_index ]['content'] )
						)

						|| (
							isset( $block_valid_html[ $index - 1 ] ) && ! $block_valid_html[ $index - 1 ]
						)
					) {

						if ( $last_index === - 1 ) {
							$last_index ++;
						}

						$html_blocks[ $last_index ]['content'] .= $match[0][ $index ];
					} else {

						$last_index ++;
						$html_blocks[ $last_index ]['content'] = $match[0][ $index ];
						$html_blocks[ $last_index ]['tag']     = $tag;

						$mark_plain_text_as_new_block = true;
					}

				} else {

					$is_plain_text = ! strstr( $match[1][ $index ], '<' );

					if ( $is_plain_text && $mark_plain_text_as_new_block ) {

						$last_index ++;
						$mark_plain_text_as_new_block = false;

						$html_blocks[ $last_index ]['content'] = $match[0][ $index ];
						$html_blocks[ $last_index ]['tag']     = $tag;

					} else {

						if ( $last_index === - 1 ) {
							$last_index ++;
						}

						$html_blocks[ $last_index ]['content'] .= $match[0][ $index ];
					}

				}
			}
		} else { // there is no html tag

			$html_blocks = array();

			$i = 0;
			foreach ( $match[0] as $text ) {

				if ( trim( $text ) === '' ) {
					$i ++;
					continue;
				}

				if ( ! isset( $html_blocks[ $i ]['content'] ) ) {
					$html_blocks[ $i ]['content'] = '';
					$html_blocks[ $i ]['tag']     = '';
				}

				$html_blocks[ $i ]['content'] .= "\n";
				$html_blocks[ $i ]['content'] .= $text;

			}
		}

		return $html_blocks;
	} // get_html_blocks


	/**
	 * Inject custom code after a paragraph
	 *
	 * @param array  $blocks    All blocks
	 * @param string $injection Content for injecting it
	 * @param int    $position  Position of injection in blocks
	 * @param array  $tags      todo:doc
	 *
	 * @return string content
	 *
	 * @since 2.10.0
	 */
	public static function inject_after( &$blocks, $injection, $position, $tags = array() ) {

		$inject_position = $position > 0 ? 'after' : 'before';

		if ( $tags ) {

			$tags     = array_flip( $tags );
			$position = absint( $position );

			$i = 0;

			foreach ( $blocks as $idx => $info ) {

				$tag = $info['tag'];

				if ( isset( $tags[ $tag ] ) ) {
					$i ++;
				}

				if ( $i === $position ) {


					if ( 'after' === $inject_position ) {

						$blocks[ $idx ]['content'] .= self::get_injection_content( $injection );

					} else {

						$blocks[ $idx ]['content'] = self::get_injection_content( $injection ) . $blocks[ $idx ]['content'];
					}

					break;
				}
			}

		} else {

			$position --;

			if ( isset( $blocks[ $position ]['content'] ) ) {

				if ( 'after' === $inject_position ) {

					$blocks[ $position ]['content'] .= self::get_injection_content( $injection );
				} else {

					$blocks[ $position ]['content'] = self::get_injection_content( $injection ) . $blocks[ $position ]['content'];
				}
			}
		}
	}


	/**
	 * Partial Check have html valid structure
	 *
	 * @param string $string
	 *
	 * @access private
	 *
	 * @return bool true|null true if valid html false not valid html and null for none-html strings
	 */
	public static function is_valid_html( $string ) {

		if ( preg_match_all( '@\<(/?[^<>&/\<\>\x00-\x20=]++)@', $string, $matches ) ) {
			$tags = array_count_values( $matches[1] );

			$self_close = array(
				'command' => '',
				'keygen'  => '',
				'source'  => '',
				'embed'   => '',
				'area'    => '',
				'base'    => '',
				'br'      => '',
				'col'     => '',
				'hr'      => '',
				'wbr'     => '',
				'img'     => '',
				'link'    => '',
				'meta'    => '',
				'input'   => '',
				'param'   => '',
				'track'   => '',
			);

			foreach ( array_diff_key( $tags, $self_close ) as $tag => $count ) {

				if ( $tag[0] === '/' || $tag[0] === '!' ) {
					continue;
				}

				$close_tag = '/' . $tag;

				if ( ! isset( $tags[ $close_tag ] ) || $tags[ $close_tag ] !== $count ) {
					return false;
				}
			}

			return true;
		}
	}


	/**
	 * Move bottom position indexes up
	 *
	 * @param array  $a
	 * @param  array $b
	 *
	 * @since 2.10.0
	 * @return int
	 */
	public static function sort_config( $a, $b ) {

		if ( $a['position'] === 'bottom' ) {
			return - 1;
		}
		if ( $b['position'] === 'bottom' ) {
			return 1;
		}

		return 0;
	}


	/**
	 * Sort config array by priority
	 *
	 * @param array  $a
	 * @param  array $b
	 *
	 * @since 2.10.0
	 * @return int
	 */
	public static function priority_sort( $a, $b ) {

		$a_priority = isset( $a['priority'] ) ? $a['priority'] : 10;
		$b_priority = isset( $b['priority'] ) ? $b['priority'] : 10;

		if ( $a_priority == $b_priority ) {
			return 0;
		} elseif ( $a_priority < $b_priority ) {
			return - 1;
		} elseif ( $a_priority > $b_priority ) {
			return 1;
		}
	}
}


if ( ! function_exists( 'bf_content_inject' ) ) {

	/**
	 * Inject custom config
	 *
	 * @param array $inject
	 *
	 * @see   BF_Content_Inject::inject
	 *
	 * @since 2.10.0
	 */
	function bf_content_inject( $inject = array() ) {

		BF_Content_Inject::inject( $inject );
	}
}


if ( ! function_exists( 'bf_content_inject_config' ) ) {

	/**
	 * Register custom settings/ configuration for injector
	 *
	 * @param string $config_name
	 * @param array  $configuration
	 *
	 * @see   BF_Content_Inject::config
	 *
	 * @since 2.14.0
	 */
	function bf_content_inject_config( $config_name, $configuration = array() ) {

		BF_Content_Inject::config( $config_name, $configuration );
	}
}
