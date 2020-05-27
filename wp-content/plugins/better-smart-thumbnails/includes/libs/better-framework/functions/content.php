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


// Callback For Video Format auto-embed
add_filter( 'better-framework/content/video-embed', 'bf_auto_embed_content' );
add_filter( 'better-framework/content/auto-embed', 'bf_auto_embed_content' );


if ( ! function_exists( 'bf_auto_embed_content' ) ) {
	/**
	 * Filter Callback: Auto-embed using a link
	 *
	 * @param string $content
	 *
	 * @return string
	 */
	function bf_auto_embed_content( $content ) {

		//
		// Custom External Videos
		//
		preg_match( '#^(http|https)://.+\.(mp4|m4v|webm|ogv|wmv|flv)$#i', $content, $matches );
		if ( ! empty( $matches[0] ) ) {
			return array(
				'type'    => 'external-video',
				'content' => do_shortcode( '[video src="' . $matches[0] . '"]' ),
			);
		}


		//
		// Custom External Audio
		//
		preg_match( '#^(http|https)://.+\.(mp3|m4a|ogg|wav|wma)$#i', $content, $matches );
		if ( ! empty( $matches[0] ) ) {
			return array(
				'type'    => 'external-audio',
				'content' => do_shortcode( '[audio src="' . $matches[0] . '"]' ),
			);
		}


		//
		// Default embeds and other registered
		//

		global $wp_embed;

		if ( ! is_object( $wp_embed ) ) {
			return array(
				'type'    => 'unknown',
				'content' => $content,
			);
		}

		$embed = $wp_embed->autoembed( $content );

		if ( $embed !== $content ) {
			return array(
				'type'    => 'embed',
				'content' => $embed,
			);
		}

		// No embed detected!
		return array(
			'type'    => 'unknown',
			'content' => $content,
		);
	}
}
