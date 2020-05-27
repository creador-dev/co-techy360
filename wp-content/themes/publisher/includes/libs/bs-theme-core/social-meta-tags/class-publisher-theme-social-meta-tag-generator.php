<?php
/***
 *  BetterStudio Themes Core.
 *
 *  ______  _____   _____ _                           _____
 *  | ___ \/  ___| |_   _| |                         /  __ \
 *  | |_/ /\ `--.    | | | |__   ___ _ __ ___   ___  | /  \/ ___  _ __ ___
 *  | ___ \ `--. \   | | | '_ \ / _ \ '_ ` _ \ / _ \ | |    / _ \| '__/ _ \
 *  | |_/ //\__/ /   | | | | | |  __/ | | | | |  __/ | \__/\ (_) | | |  __/
 *  \____/ \____/    \_/ |_| |_|\___|_| |_| |_|\___|  \____/\___/|_|  \___|
 *
 *  Copyright © 2017 Better Studio
 *
 *
 *  Our portfolio is here: https://betterstudio.com/
 *
 *  \--> BetterStudio, 2018 <--/
 */


new Publisher_Theme_Social_Meta_Tag_Generator();


/**
 * Better Meta Tag generator
 *
 * @package  BetterStudio Social Meta Tag Generator
 * @author   BetterStudio <info@betterstudio.com>
 * @version  1.1.0
 * @access   public
 * @see      http://www.betterstudio.com/
 */
class Publisher_Theme_Social_Meta_Tag_Generator {


	/**
	 * Includes overall attributes that should be added to the language attributes
	 *
	 * @since  1.0.0
	 *
	 * @var array
	 */
	private $doctypes = array();


	/**
	 * Contains list of OG tags that should be added in header
	 *
	 * @since  1.0.0
	 *
	 * @var array
	 */
	private $tags = array();


	/**
	 * Contains options than can be used in generators
	 *
	 * @since  1.0.0
	 *
	 * @var array
	 */
	private $args = array(
		'active' => true,
		'img'    => '',
	);


	function __construct( $args = array() ) {

		add_action( 'template_redirect', array( $this, 'init' ) );
	}


	/**
	 * Initialize functionality
	 */
	public function init() {

		$this->args = apply_filters( 'publisher-theme-core/social-meta-tags/config', $this->args );

		if ( ! $this->args['active'] ) {
			return;
		}

		//add_filter( 'language_attributes', array( $this, 'filter_language_attributes' ) );

		add_action( 'better-amp/template/head', array( $this, 'print_header_tags' ), 10 );
		add_action( 'wp_head', array( $this, 'print_header_tags' ), 1 );

		if ( ! $this->is_seo_plugin_active() ) {
			add_filter( 'wp_title', array( $this, 'wp_title' ), 1, 3 );
		}

	}


	/**
	 * Detects there is any active seo plugin
	 *
	 * @since  1.1.0
	 *
	 * @return bool
	 */
	function is_seo_plugin_active() {

		/**
		 *
		 * Supported  SEO plugins
		 *
		 * "Yoast SEO"            => https://wordpress.org/plugins/wordpress-seo/
		 * "All in One SEO Pack"  => https://wordpress.org/plugins/all-in-one-seo-pack/
		 * "SEO Ultimate"         => https://wordpress.org/plugins/seo-ultimate/
		 * "Platinum SEO Pack"    => https://wordpress.org/plugins/platinum-seo-pack/
		 * "WP Meta SEO"          => https://wordpress.org/plugins/wp-meta-seo/
		 * "The SEO Framework"    => https://wordpress.org/plugins/autodescription/
		 */
		if (
			defined( 'WPSEO_VERSION' ) ||
			class_exists( 'All_in_One_SEO_Pack' ) ||
			class_exists( 'SEO_Ultimate' ) ||
			class_exists( 'Platinum_SEO_Pack' ) ||
			defined( 'WPMSEO_VERSION' ) ||
			defined( 'THE_SEO_FRAMEWORK_VERSION' ) ||
			defined( 'SEOPRESS_VERSION' )
		) {
			return true;
		}

		return false;
	}


	/**
	 * Detects the facebook plugin is active
	 *
	 * @since  1.0.0
	 *
	 * @return bool
	 */
	function is_facebook_plugin_active() {

		if ( class_exists( 'Facebook_Loader' ) ) {
			return true;
		}

		return false;
	}


	/**
	 * Adds custom attributes to base language attributes
	 *
	 * @since  1.0.0
	 *
	 * @param $output
	 *
	 * @return string
	 */
	function filter_language_attributes( $output ) {

		if ( ! strstr( $output, 'xmlns:og="http://opengraphprotocol.org/schema/"' ) ) {
			$output .= ' xmlns:og="http://opengraphprotocol.org/schema/"';
		}

		if ( ! strstr( $output, 'xmlns:fb="http://www.facebook.com/2008/fbml"' ) ) {
			$output .= ' xmlns:fb="http://www.facebook.com/2008/fbml"';
		}

		return $output;
	}


	/**
	 * Adds new language attribute to defaults
	 *
	 * @since  1.0.0
	 *
	 * @param $attribute
	 */
	function add_language_attribute( $attribute ) {

		$this->doctypes[] = $attribute;

	}


	/**
	 * Used for adding element to Open Graph tags
	 *
	 * @since  1.0.0
	 *
	 * @param        $id
	 * @param        $value
	 * @param string $type
	 */
	function add_header_tag( $id, $value, $type = 'og' ) {

		if ( ! empty( $id ) && ! empty( $value ) ) {
			$this->tags[ $id ] = array(
				'id'    => $id,
				'value' => $value,
				'type'  => $type
			);
		}
	}


	/**
	 * Prints meta tags
	 *
	 * @since  1.0.0
	 */
	function print_header_tags() {

		if ( ! $this->is_seo_plugin_active() ) {

			$data = $this->get_current_page_info();
			$url  = $data['url'] ? esc_attr( $data['url'] ) : '';

			// Singulars: Posts and Pages
			if ( is_singular() && ! ( is_front_page() || is_home() ) ) {
				$img = publisher_get_thumbnail( 'large' );
			} else {
				$img = array();
			}

			$this->add_header_tag( 'og:locale', esc_attr( strtolower( get_locale() ) ) );
			$this->add_header_tag( 'og:site_name', esc_attr( get_bloginfo( 'name' ) ) );

			if ( $url ) {
				$this->add_header_tag( 'og:url', $url );
			}

			$this->add_header_tag( 'og:title', $data['title'] );

			if ( ! empty( $img['src'] ) ) {
				$this->add_header_tag( 'og:image', $img['src'] );
			}

			if ( ! empty( $img['caption'] ) ) {
				$this->add_header_tag( 'og:image:alt', $img['caption'] );
			}

			if ( is_singular() && isset( $data['meta_type'] ) && $data['meta_type'] === 'article' ) {

				foreach ( get_the_category() as $term ) {

					if ( ! $term || is_wp_error( $term ) ) {
						continue;
					}

					$this->add_header_tag( 'article:section', $term->name );
				}


				$tags = get_the_tags();

				if ( $tags && ! is_wp_error( $tags ) ) {
					foreach ( $tags as $term ) {

						if ( ! $term || is_wp_error( $term ) ) {
							continue;
						}

						$this->add_header_tag( 'article:tag', $term->name );
					}
				}
			}

			$this->add_header_tag( 'og:description', $data['description'] );
			$this->add_header_tag( 'og:type', isset( $data['meta_type'] ) ? $data['meta_type'] : 'website' );


			/**
			 *
			 * Twitter
			 *
			 */
			{
				$this->add_header_tag( 'twitter:card', 'summary', 'name' );

				if ( $url ) {
					$this->add_header_tag( 'twitter:url', $url, 'name' );
				}

				$this->add_header_tag( 'twitter:title', $data['title'], 'name' );

				$this->add_header_tag( 'twitter:description', $data['description'], 'name' );

				if ( ! empty( $img['src'] ) ) {
					$this->add_header_tag( 'twitter:image', $img['src'], 'name' );
				}

				if ( ! empty( $img['caption'] ) ) {
					$this->add_header_tag( 'twitter:image:alt', $img['caption'], 'name' );
				}
			}

		}

		$this->tags = apply_filters( 'publisher/social-meta-tags/meta-list', $this->tags );

		if ( count( $this->tags ) == 0 ) {
			return;
		}

		echo "\n<!-- Better Open Graph, Schema.org & Twitter Integration -->\n";

		foreach ( (array) $this->tags as $tag ) {

			if ( empty( $tag['id'] ) || empty( $tag['value'] ) ) {
				continue;
			}

			switch ( $tag['type'] ) {

				case 'og':
					echo '<meta property="' . esc_attr( $tag['id'] ) . '" content="' . esc_attr( $tag['value'] ) . '"/>' . "\n";
					break;

				case 'itemprop':
					echo '<meta itemprop="' . esc_attr( $tag['id'] ) . '" content="' . esc_attr( $tag['value'] ) . '"/>' . "\n";
					break;

				case 'name':
					echo '<meta name="' . esc_attr( $tag['id'] ) . '" content="' . esc_attr( $tag['value'] ) . '"/>' . "\n";
					break;

			}

		}

		echo "<!-- / Better Open Graph, Schema.org & Twitter Integration. -->\n";
	}


	/**
	 * Used for finding current page type
	 *
	 * @since  1.0.0
	 *
	 * @return string
	 */
	function get_the_type() {

		if ( is_front_page() || is_home() ) {

			return 'website';

		} elseif ( is_singular() ) {

			return 'article';

		}

		// "object" used for archives etc. because article doesn't apply there
		return 'object';

	}


	/**
	 * Callback: Filters the `wp_title` output early.
	 *
	 * Filter: wp_title
	 *
	 * @since  1.1.0
	 * @access publc
	 *
	 * @param  string $title
	 * @param  string $separator
	 * @param  string $seplocation
	 *
	 * @return string
	 */
	function wp_title( $title = '', $separator = '|', $seplocation = '' ) {

		$data = $this->get_current_page_info();

		return strip_tags( $data['title'] );

	} // wp_title


	/**
	 * Returns all data of current page with cache support
	 *
	 * @param string $separator
	 *
	 * @return array
	 */
	function get_current_page_info( $separator = '|' ) {

		static $info;

		if ( $info ) {
			return $info;
		}

		$info = array(
			'title'       => '',
			'description' => '',
			'type'        => '',
			'archive'     => false,
		);

		if ( is_front_page() ) {
			$info['url']         = home_url( '/' );
			$info['title']       = get_bloginfo( 'name' );
			$info['description'] = get_bloginfo( 'description' );
			$info['type']        = 'front_page';
			$info['meta_type']   = 'website';
			$info['archive']     = true;
		} elseif ( is_home() || is_singular() ) {

			$info['url']   = is_home() ? home_url( '/' ) : get_the_permalink();
			$info['title'] = single_post_title( '', false );
			$info['type']  = is_home() ? 'home' : 'singular';

			$info['meta_type'] = is_home() ? 'website' : 'article';

			global $post;

			if ( ! empty( $post->post_excerpt ) ) {

				$info['description'] = $post->post_excerpt;

			} elseif ( isset( $post->post_content ) ) {

				$info['description'] = self::esc_text( $post->post_content, 250 );
			}

		} elseif ( is_tax() ) {

			$term            = get_queried_object();
			$info['title']   = single_term_title( '', false );
			$info['url']     = get_term_link( $term, $term->taxonomy );
			$info['type']    = 'taxonomy';
			$info['archive'] = true;

			if ( isset( $term->taxonomy ) ) {
				$schema['description'] = term_description( 0, $term->taxonomy );
			}

		} elseif ( is_post_type_archive() ) {

			$post_type = get_query_var( 'post_type' );

			if ( is_array( $post_type ) ) {
				$post_type = reset( $post_type );
			}

			$info['url']     = get_post_type_archive_link( $post_type );
			$info['title']   = post_type_archive_title( '', false );
			$info['type']    = $post_type;
			$info['archive'] = true;

		} elseif ( is_author() ) {

			$info['url']     = get_author_posts_url( get_query_var( 'author' ), get_query_var( 'author_name' ) );
			$info['title']   = get_the_author_meta( 'display_name', get_query_var( 'author' ) );
			$info['type']    = 'author';
			$info['archive'] = true;

		} elseif ( get_query_var( 'minute' ) && get_query_var( 'hour' ) ) {

			$info['url']     = home_url( $_SERVER['REQUEST_URI'] );
			$info['title']   = get_the_time( _x( 'g:i a', 'minute and hour archives time format', 'publisher' ) );
			$info['type']    = 'date';
			$info['archive'] = true;

		} elseif ( get_query_var( 'minute' ) ) {

			$info['url']     = home_url( $_SERVER['REQUEST_URI'] );
			$info['title']   = sprintf( __( 'Minute %s', 'publisher' ), get_the_time( 'i' ) );
			$info['type']    = 'date';
			$info['archive'] = true;

		} elseif ( get_query_var( 'hour' ) ) {

			$info['url']     = home_url( $_SERVER['REQUEST_URI'] );
			$info['title']   = get_the_time( _x( 'g a', 'hour archives time format', 'publisher' ) );
			$info['type']    = 'date';
			$info['archive'] = true;

		} elseif ( is_day() ) {

			$info['url']     = get_day_link( get_query_var( 'year' ), get_query_var( 'monthnum' ), get_query_var( 'day' ) );
			$info['title']   = get_the_date( _x( 'F j, Y', 'daily archives date format', 'publisher' ) );
			$info['type']    = 'date';
			$info['archive'] = true;

		} elseif ( get_query_var( 'w' ) ) {

			$info['url']     = home_url( $_SERVER['REQUEST_URI'] );
			$info['title']   = sprintf( __( 'Week %1$s of %2$s', 'publisher' ), get_the_time( _x( 'W', 'weekly archives date format', 'publisher' ) ), get_the_time( _x( 'Y', 'yearly archives date format', 'publisher' ) ) );
			$info['type']    = 'date';
			$info['archive'] = true;

		} elseif ( is_month() ) {

			$info['url']     = get_month_link( get_query_var( 'year' ), get_query_var( 'monthnum' ) );
			$info['title']   = single_month_title( ' ', false );
			$info['type']    = 'date';
			$info['archive'] = true;

		} elseif ( is_year() ) {

			$info['url']     = get_year_link( get_query_var( 'year' ) );
			$info['title']   = get_the_date( _x( 'Y', 'yearly archives date format', 'publisher' ) );
			$info['type']    = 'date';
			$info['archive'] = true;

		} elseif ( is_archive() ) {

			$info['url']     = home_url( $_SERVER['REQUEST_URI'] );
			$info['title']   = __( 'Archives', 'publisher' );
			$info['type']    = 'archive';
			$info['archive'] = true;

		} elseif ( is_search() ) {

			$info['url']     = home_url( $_SERVER['REQUEST_URI'] );
			$info['title']   = sprintf( __( 'Search results for &#8220;%s&#8221;', 'publisher' ), get_search_query() );
			$info['type']    = 'search';
			$info['archive'] = true;

		} elseif ( is_404() ) {

			$info['url']     = home_url( $_SERVER['REQUEST_URI'] );
			$info['title']   = __( '404 Not Found', 'publisher' );
			$info['type']    = '404';
			$info['archive'] = false;
		}

		if ( empty( $info['description'] ) ) {
			$info['description'] = get_bloginfo( 'description' );
		}

		return $info;
	}


	/**
	 * Escape shortcodes and tags of text
	 *
	 * @param string $text
	 * @param int    $limit
	 *
	 * @return string $text
	 */
	private static function esc_text( $text, $limit = 0 ) {

		$text = strip_tags( $text );

		$text = strip_shortcodes( $text );

		$text = str_replace( array( "\r", "\n" ), '', $text );

		if ( $limit ) {
			return self::substr_text( $text, $limit );
		} else {
			return $text;
		}
	}


	/**
	 * Return a pice of text
	 *
	 * @param string $text
	 * @param int    $length
	 *
	 * @return string $text
	 */
	private static function substr_text( $text = '', $length = 110 ) {

		if ( empty( $text ) ) {
			return $text;
		}

		return mb_substr( $text, 0, $length, 'UTF-8' );
	}

} // Publisher_Theme_Social_Meta_Tag_Generator
