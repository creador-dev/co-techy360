<?php

/**
 * Handles generation off all icons
 */
class BF_Icons_Factory {

	/**
	 * Inner array of icons instances
	 *
	 * @var array
	 */
	private static $instances = array();


	private static $custom_icons_id = 'bf_custom_icons_list';


	/**
	 * @return string
	 */
	public static function get_custom_icons_id() {
		return self::$custom_icons_id;
	}


	/**
	 * @param string $custom_icons_id
	 */
	public static function set_custom_icons_id( $custom_icons_id ) {
		self::$custom_icons_id = $custom_icons_id;
	}


	/**
	 * Init
	 */
	function __construct() {
		if ( is_admin() ) {
			add_action( 'better-framework/icons/add-custom-icon', array( $this, 'add_custom_icon' ) );
			add_action( 'better-framework/icons/remove-custom-icon', array( $this, 'remove_custom_icon' ) );
		}
	}


	/**
	 * Handles custom icon add action
	 *
	 * @param $icon
	 */
	function add_custom_icon( $icon ) {

		$icons_list = get_option( self::get_custom_icons_id() );

		if ( $icons_list == FALSE ) {
			$icons_list = array();
		}

		$icon['id'] = 'icon-' . uniqid();

		$icons_list[ $icon['id'] ] = $icon;

		update_option( self::get_custom_icons_id(), $icons_list, 'no' );

		die( json_encode(
			array(
				'status' => 'success',
				'msg'    => __( 'Icon added successfully', 'better-studio' ),
				'icon'   => $icon,
			)
		) );

	}


	/**
	 * Handles custom icon upload action
	 *
	 * @param $icon_id
	 */
	function remove_custom_icon( $icon_id ) {

		$icons_list = get_option( self::get_custom_icons_id() );

		if ( $icons_list != FALSE && isset( $icons_list[ $icon_id ] ) ) {
			unset( $icons_list[ $icon_id ] );
			update_option( self::get_custom_icons_id(), $icons_list, 'no' );
		}

		die( json_encode(
			array(
				'status' => 'success',
				'msg'    => __( 'Icon removed successfully', 'better-studio' ),
				'icon'   => $icon_id,
			)
		) );

	}


	/**
	 * used for getting instance of a type of icons
	 *
	 * @param string $icon
	 *
	 * @return BF_Fontawesome|BF_BS_Icons
	 */
	public static function getInstance( $icon = '' ) {

		if ( isset( self::$instances[ $icon ] ) ) {
			return self::$instances[ $icon ];
		}

		if ( empty( $icon ) ) {
			return FALSE;
		}

		$_icon = $icon;

		// class name
		if ( $icon == 'bs-icons' ) {
			$icon = 'BS_Icons';
		} else {
			$icon = ucfirst( $icon );
		}

		if ( ! class_exists( 'BF_' . $icon ) ) {
			require_once BF_PATH . 'libs/icons/class-bf-' . $_icon . '.php';
		}

		// Init icon library
		$class                    = 'BF_' . $icon;
		self::$instances[ $icon ] = new $class;

		return self::$instances[ $icon ];
	}


	/**
	 * DEPRECATED: use bf_get_icon_tag function.
	 *
	 * Handy function for creating icon tag from id
	 *
	 * @param        $icon
	 * @param string $class
	 *
	 * @deprecated use bf_get_icon_tag function
	 *
	 * @return string
	 */
	public function get_icon_tag_from_id( $icon, $class = '' ) {
		return bf_get_icon_tag( $icon, $class );
	}

}