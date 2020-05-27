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
 *  Our portfolio is here: https://betterstudio.com/
 *
 *  \--> BetterStudio, 2018 <--/
 */


/**
 * Used for generating listing, blocks and other display related things
 */
class BF_Block_Generator {


	/**
	 * Contains data that used in listings
	 *
	 * @var array
	 */
	static protected $block_atts = array();


	/**
	 * Getter for block atts
	 *
	 * @param string $key
	 * @param string $default
	 *
	 * @return array
	 */
	public static function get_attr( $key = '', $default = '' ) {

		if ( empty( $key ) || ! isset( self::$block_atts[ $key ] ) ) {
			return $default;
		}

		return self::$block_atts[ $key ];
	}


	/**
	 * Setter for block_atts
	 *
	 * @param string $key
	 * @param string $value
	 */
	public static function set_attr( $key = '', $value = '' ) {

		if ( empty( $key ) ) {
			return;
		}

		self::$block_atts[ $key ] = $value;

	}


	/**
	 * Used For Removing Attr
	 *
	 * @param string $key
	 */
	public static function unset_attr( $key = '' ) {

		if ( empty( $key ) ) {
			return;
		}

		unset( self::$block_atts[ $key ] );

	}


	/**
	 * Clears all attributes that saved in $block_atts
	 */
	public static function clear_atts() {

		self::$block_atts = array();

	}


	/**
	 * Used For Finding Best Count For Multiple columns
	 *
	 * @param int $count_all
	 * @param int $columns
	 * @param int $current_column
	 */
	public static function set_attr_count_multi_column( $count_all = 0, $columns = 1, $current_column = 1 ) {

		if ( $count_all == 0 ) {
			return;
		}

		$count = floor( $count_all / $columns );

		$reminder = $count_all % $columns;

		if ( $reminder >= $current_column ) {
			$count ++;
		}

		self::set_attr( "count", $count );
	}


	/**
	 * Used For Specifying Count
	 */
	public static function set_attr_count( $count ) {

		self::set_attr( "count", $count );

	}


	/**
	 * Used for adding class to block
	 *
	 * @param $value
	 */
	public static function set_attr_class( $value ) {

		if ( isset( self::$block_atts['block-class'] ) ) {
			self::$block_atts['block-class'] .= ' ' . $value;
		} else {
			self::$block_atts['block-class'] = $value;
		}

	}


	/**
	 * Used for retrieving block class attr
	 *
	 * @param $add_this
	 *
	 * @return array|string
	 */
	public static function get_attr_class( $add_this = '' ) {

		if ( $add_this ) {
			return self::get_attr( 'block-class' ) . ' ' . $add_this;
		} else {
			return self::get_attr( 'block-class' );
		}

	}


	/**
	 * Used for specifying thumbnail size
	 *
	 * @param $value
	 */
	public static function set_attr_thumbnail_size( $value ) {

		self::$block_atts['thumbnail-size'] = $value;

	}


	/**
	 * Used for retrieving block class attr
	 *
	 * @param $default
	 *
	 * @return array|string
	 */
	public static function get_attr_thumbnail_size( $default = '' ) {

		return self::get_attr( 'thumbnail-size', $default );

	}


	/**
	 * Used for including block elements
	 *
	 * @param string $block
	 * @param bool   $echo
	 * @param bool   $load
	 *
	 * @return string
	 */
	public static function get_block( $block = '', $echo = true, $load = true ) {

		if ( empty( $block ) ) {
			return '';
		}

		$template = 'blocks/' . $block . '.php';

		if ( $echo ) {
			locate_template( $template, $load, false );
		} else {
			ob_start();
			locate_template( $template, $load, false );

			return ob_get_clean();
		}

	}


	/**
	 * Used for including menus
	 *
	 * @param       string $menu menu file id
	 * @param       bool   $echo
	 * @param       bool   $load
	 *
	 * @return      string
	 */
	public static function get_menu( $menu = '', $echo = true, $load = true ) {

		if ( empty( $menu ) ) {
			return '';
		}

		$template = 'blocks/menu/' . $menu . '.php';

		if ( $echo ) {
			locate_template( $template, $load, false );
		} else {
			ob_start();
			locate_template( $template, $load, false );

			return ob_get_clean();
		}

	}


	/**
	 * Generates bread crumb with BF Breadcrumb
	 *
	 * @param bool $echo
	 *
	 * @return bool|string
	 */
	public static function breadcrumb( $echo = true ) {

		$output = Better_Framework::breadcrumb()->generate( false );

		if ( $echo ) {
			echo $output; // escaped before in generating
		} else {
			return $output;
		}

	}

}
