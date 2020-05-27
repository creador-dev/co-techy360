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


//
//
// Header elements attributes
//
//
add_filter( 'publisher_attr_site', 'publisher_attr_site', 5, 3 );
add_filter( 'publisher_attr_site-title', 'publisher_attr_site_title', 5, 3 );
add_filter( 'publisher_attr_site-logo', 'publisher_attr_site_logo', 5, 3 );
add_filter( 'publisher_attr_site-url', 'publisher_attr_site_url', 5, 3 );
add_filter( 'publisher_attr_site-description', 'publisher_attr_site_description', 5, 3 );


if ( ! function_exists( 'publisher_attr_site' ) ) {
	/**
	 * Site branding/info
	 * Usually this used for a wrapper that contains title and tagline and logo.
	 *
	 * @since   1.0.0
	 * @access  public
	 *
	 * @param   string $attr    Default or filtered attributes
	 * @param   string $class   Extra classes
	 * @param   string $context Specific context ex: primary
	 *
	 * @return  array
	 */
	function publisher_attr_site( $attr, $class = '', $context = '' ) {

		if ( ! empty( $context ) ) {
			$attr['id'] = "site-branding-{$context}";
		} else {
			$attr['id'] = 'site-branding';
		}

		if ( ! empty( $class ) ) {
			if ( isset( $attr['class'] ) ) {
				$attr['class'] .= ' site-branding ' . $class;
			} else {
				$attr['class'] = ' site-branding ' . $class;
			}
		} else {
			$attr['class'] = ' site-branding ' . $class;
		}

		$attr['itemtype']  = publisher_attr_get_protocol() . 'schema.org/Organization';
		$attr['itemscope'] = 'itemscope';

		return $attr;
	}
}


if ( ! function_exists( 'publisher_attr_site_title' ) ) {
	/**
	 * Site title attributes.
	 *
	 * @since   1.0.0
	 * @access  public
	 *
	 * @param   string $attr    Default or filtered attributes
	 * @param   string $class   Extra classes
	 * @param   string $context Specific context ex: primary
	 *
	 * @return  array
	 */
	function publisher_attr_site_title( $attr, $class = '', $context = '' ) {

		if ( ! empty( $context ) ) {
			$attr['id'] = "site-title-{$context}";
		} else {
			$attr['id'] = 'site-title';
		}

		if ( ! empty( $class ) ) {
			if ( isset( $attr['class'] ) ) {
				$attr['class'] .= ' ' . $class;
			} else {
				$attr['class'] = $class;
			}
		}

		$attr['itemprop'] = 'headline';

		return $attr;
	}
}


if ( ! function_exists( 'publisher_attr_site_description' ) ) {
	/**
	 * Site description attributes.
	 *
	 * @since   1.0.0
	 * @access  public
	 *
	 * @param   string $attr    Default or filtered attributes
	 * @param   string $class   Extra classes
	 * @param   string $context Specific context ex: primary
	 *
	 * @return  array
	 */
	function publisher_attr_site_description( $attr, $class = '', $context = '' ) {

		if ( ! empty( $context ) ) {
			$attr['id'] = "site-description-{$context}";
		} else {
			$attr['id'] = 'site-description';
		}

		if ( ! empty( $class ) ) {
			if ( isset( $attr['class'] ) ) {
				$attr['class'] .= ' ' . $class;
			} else {
				$attr['class'] = $class;
			}
		}

		$attr['itemprop'] = 'description';

		return $attr;
	}
}


if ( ! function_exists( 'publisher_attr_site_logo' ) ) {
	/**
	 * Site logo attributes.
	 *
	 * @since   1.0.0
	 * @access  public
	 *
	 * @param   string $attr    Default or filtered attributes
	 * @param   string $class   Extra classes
	 * @param   string $context Specific context ex: primary
	 *
	 * @return  array
	 */
	function publisher_attr_site_logo( $attr, $class = '', $context = '' ) {

		if ( ! empty( $context ) ) {
			$attr['id'] = $context;
		}

		if ( ! empty( $class ) ) {
			if ( isset( $attr['class'] ) ) {
				$attr['class'] .= ' ' . $class;
			} else {
				$attr['class'] = $class;
			}
		}

		$attr['itemprop'] = 'logo';

		return $attr;
	}
}


if ( ! function_exists( 'publisher_attr_site_url' ) ) {
	/**
	 * Site URL attributes.
	 *
	 * @since   1.0.0
	 * @access  public
	 *
	 * @param   string $attr    Default or filtered attributes
	 * @param   string $class   Extra classes
	 * @param   string $context Specific context ex: primary
	 *
	 * @return  array
	 */
	function publisher_attr_site_url( $attr, $class = '', $context = '' ) {

		if ( ! empty( $context ) ) {
			$attr['id'] = $context;
		}

		if ( ! empty( $class ) ) {
			if ( isset( $attr['class'] ) ) {
				$attr['class'] .= ' ' . $class;
			} else {
				$attr['class'] = $class;
			}
		}

		$attr['itemprop'] = 'url';
		$attr['rel']      = 'home';

		return $attr;
	}
}
