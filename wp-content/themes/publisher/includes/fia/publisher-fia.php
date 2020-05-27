<?php
/**
 * publisher-fia.php
 *---------------------------
 * Handles all compatibility tasks for FIA
 *
 */


/**
 * Publisher Facebook Instant Article compatibility
 *
 * @since 2.0
 */
class Publisher_FIA {

	/**
	 *
	 * @since 2.0
	 */
	public static function init() {

		if ( ! defined( 'IA_PLUGIN_VERSION' ) ) {
			return;
		}

		// Custom rules of Publisher
		add_filter( 'instant_articles_transformer_custom_rules_loaded', array(
			'Publisher_FIA',
			'customize_role_transformer'
		) );

		// Subtitle support
		add_filter( 'instant_articles_subtitle', array(
			'Publisher_FIA',
			'get_post_subtitle'
		), 10, 2 );

		// Advanced Fixes for content
		add_filter( 'instant_articles_content', array(
			'Publisher_FIA',
			'advanced_content_fix'
		), 10, 2 );

	}


	/**
	 * Injects Publisher custom rules into FIA plugin
	 *
	 * @param $transformer Transformer
	 *
	 * @return \Transformer
	 */
	public static function customize_role_transformer( $transformer ) {

		// Reads from child theme to override it
		$path = get_stylesheet_directory() . '/includes/fia/rules-configuration.json';

		if ( file_exists( $path ) ) {
			$transformer->loadRules( $path );
		} else {
			$transformer->loadRules( bf_get_local_file_content( PUBLISHER_THEME_PATH . 'includes/fia/rules-configuration.json' ) );
		}

		return $transformer;
	}


	/**
	 * Injects Publisher custom rules into FIA plugin
	 *
	 * @param string $subtitle
	 * @param /Instant_Articles_Post   $fia_post
	 *
	 * @return string
	 */
	public static function get_post_subtitle( $subtitle = '', $fia_post ) {

		if ( is_null( $fia_post ) ) {
			return $fia_post;
		}

		$subtitle = publisher_get_subtitle( 0, $fia_post->get_the_id() );

		return $subtitle;
	}


	/**
	 * Advanced content fixes for FIA
	 *
	 * @param string  $content
	 * @param integer $post_id
	 *
	 * @return string
	 */
	public static function advanced_content_fix( $content = '', $post_id ) {

		// Adds fia-pass class to all div tags without class
		$content = preg_replace( '/(<div)((?=\s|>)(?!(?:[^>=]|=([\'"])(?:(?!\1).)*\1)*?\sclass=[\'"])[^>]*(>))/i', '$1 class="fia-pass" $2', $content );

		return $content;
	}

} // Publisher_FIA
