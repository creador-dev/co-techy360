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


/**
 * Contain Functionality Related To Posts and Pages That Used In Themes
 */
class BF_Posts {


	/**
	 * Deprecated!
	 *
	 * Custom excerpt
	 *
	 * @param  integer     $length
	 * @param  string|null $text
	 * @param bool         $echo
	 *
	 * @return string
	 */
	public static function excerpt( $length = 24, $text = NULL, $echo = TRUE ) {

		// If text not defined get excerpt
		if ( ! $text ) {

			// have a manual excerpt?
			if ( has_excerpt( get_the_ID() ) ) {

				if ( $echo ) {
					echo apply_filters( 'the_excerpt', get_the_excerpt() );

					return;
				} else {
					return apply_filters( 'the_excerpt', get_the_excerpt() );
				}

			} else {

				$text = get_the_content( '' );

			}

		}

		$text = strip_shortcodes( $text );
		$text = str_replace( ']]>', ']]&gt;', $text );

		// get plaintext excerpt trimmed to right length
		$excerpt = wp_trim_words( $text, $length, '&hellip;' );

		// fix extra spaces
		$excerpt = trim( str_replace( '&nbsp;', ' ', $excerpt ) );


		if ( $echo ) {
			echo $excerpt; // escaped before in generating inside WP Core
		} else {
			return $excerpt;
		}
	}


}