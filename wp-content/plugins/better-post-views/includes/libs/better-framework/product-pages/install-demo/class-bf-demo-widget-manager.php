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
 * Class BF_Demo_Widget_Manager
 */
class BF_Demo_Widget_Manager {

	public $sidebar_id = '';

	static $widgets_number = array();

	/**
	 * set active sidebar id
	 * uses by some methods
	 *
	 * @param string|int $sidebar_id The ID of the sidebar when it was registered.
	 *
	 * @return bool true on success or false on failure.
	 */
	public function set_sidebar_id( $sidebar_id ) {

		if ( $this->is_registered_sidebar( $sidebar_id ) ) {

			$this->sidebar_id = $sidebar_id;

			return TRUE;
		} else {

			$this->sidebar_id = '';

			return FALSE;
		}
	}

	/**
	 * Checks if a sidebar is registered.
	 *
	 * @param string|int $sidebar_id            The ID of the sidebar when it was registered.
	 *
	 * @global array     $wp_registered_sidebar Registered sidebars.
	 * @return bool True if the sidebar is registered, false otherwise.
	 */

	protected function is_registered_sidebar( $sidebar_id ) {
		global $wp_registered_sidebars;

		/**
		 * is_registered_sidebar() functoon become avaiable since wordpress 4.4.0
		 */
		if ( function_exists( 'is_registered_sidebar' ) ) {
			return is_registered_sidebar( $sidebar_id );
		}

		return isset( $wp_registered_sidebars[ $sidebar_id ] );
	}

	/**
	 * generate unique widget number to save widget option on unique array index number
	 *
	 * @param string $widget_id_base
	 *
	 * @return int widget id number
	 */
	protected function generate_widget_id_number( $widget_id_base ) {

		if ( ! function_exists( 'next_widget_id_number' ) ) {
			require_once ABSPATH . '/wp-admin/includes/widgets.php';// for next_widget_id_number()
		}

		if ( ! isset( self::$widgets_number[ $widget_id_base ] ) ) {
			self::$widgets_number[ $widget_id_base ] = next_widget_id_number( $widget_id_base );
		} else {
			self::$widgets_number[ $widget_id_base ] ++;
		}

		return self::$widgets_number[ $widget_id_base ];
	}

	/**
	 * add a widget to the sidebar
	 *
	 * @see set_sidebar_id()
	 *
	 * @param string $widget_id_base  base id of the widget
	 * @param array  $widget_settings widget settings
	 *
	 * @return bool true on success or false on failure.
	 */
	public function add_widget( $widget_id_base, $widget_settings = array() ) {
		global $wp_registered_widget_updates;

		if ( ! $this->is_registered_sidebar( $this->sidebar_id ) ) {
			return FALSE;
		}

		if ( ! isset( $wp_registered_widget_updates[ $widget_id_base ] ) ) {
			return FALSE;
		}

		//wp_get_sidebars_widgets() cache data and make a problem when trying to add multiple widget to sidebar
		$sidebars = get_option( 'sidebars_widgets' );


		$widget_number = $this->generate_widget_id_number( $widget_id_base );
		$widget_id     = $widget_id_base . '-' . $widget_number;

		$sidebars[ $this->sidebar_id ][] = $widget_id;

		wp_set_sidebars_widgets( $sidebars );

		$settings = get_option( 'widget_' . $widget_id_base, array() );

		/**
		 * ##  bug fixed    ##
		 *
		 * make sure $settings is an array
		 */
		if ( ! is_array( $settings ) ) {
			$settings = array();
		}

		$settings[ $widget_number ] = $widget_settings;

		update_option( 'widget_' . $widget_id_base, $settings );


		//save widget settings
		foreach ( (array) $wp_registered_widget_updates as $name => $control ) {

			if ( $name == $widget_id_base ) {
				if ( ! is_callable( $control['callback'] ) ) {
					continue;
				}

				ob_start();
				call_user_func_array( $control['callback'], $control['params'] );
				ob_end_clean();
			}
		}


		return TRUE;
	}

	/**
	 * TODO: test function
	 *
	 * get all widgets exists in a sidebar
	 *
	 * @return array|bool array of data on success or false on failure.
	 *
	 * array {
	 * @type        string|int $sidebar_id sidebar id
	 * @widgets     array       list of widgets
	 * @settings    array       widgets settings based on option_name
	 *
	 * }
	 */
	public function get_all_widgets() {

		$sidebars = wp_get_sidebars_widgets();

		if ( ! isset( $sidebars[ $this->sidebar_id ] ) ) {
			return FALSE;
		}

		$settings = array();

		foreach ( $sidebars[ $this->sidebar_id ] as $widget_numbers ) {
			if ( preg_match( "/^(.*?)\-(\d)+/i", $widget_numbers, $match ) ) {

				$widget_id_base = &$match[1];


				$option_name              = "widget_$widget_id_base";
				$option_value             = get_option( $option_name );
				$settings[ $option_name ] = $option_value;
			}
		}


		return array(
			'sidebar_id' => $this->sidebar_id,
			'widgets'    => $sidebars[ $this->sidebar_id ],
			'settings'   => $settings
		);
	}

	/**
	 * remove every widget exists in sidebar
	 *
	 * @return bool true on success or false on failure.
	 */

	public function remove_all_widgets() {

		$sidebars = wp_get_sidebars_widgets();

		if ( ! isset( $sidebars[ $this->sidebar_id ] ) ) {
			return FALSE;
		}

		$widgets_in_sidebar = array();

		foreach ( $sidebars[ $this->sidebar_id ] as $widget_numbers ) {
			if ( preg_match( "/^(.*?)\-(\d)+/i", $widget_numbers, $match ) ) {

				$widget_id_base = &$match[1];
				$widget_number  = &$match[2];

				$widgets_in_sidebar[ $widget_id_base ][] = $widget_number;
			}
		}

		//delete widget settings form database.

		foreach ( $widgets_in_sidebar as $id_base => $widget_numbers ) {

			$option_name = "widget_$id_base";

			$option = get_option( $option_name );

			if ( $option && is_array( $option ) ) {

				foreach ( $widget_numbers as $widget_number ) {

					unset( $option[ $widget_number ] );
				}

				if ( $option ) {

					update_option( $option_name, $option );
				} else {

					delete_option( $option_name );
				}
			}
		}

		//remove all widgets in sidebar
		$sidebars[ $this->sidebar_id ] = array();

		//save changes
		wp_set_sidebars_widgets( $sidebars );

		return TRUE;
	}

	/**
	 * @param string $widget_id_base
	 *
	 * @return array|bool. false on failure or array of information on success.
	 *
	 * array {
	 * @type string  $sidebar_id     active sidebar id.
	 * @type string  $widget_id_base widget id base
	 * @type array settings            widget settings array
	 *
	 * }
	 */
	public function get_widgets( $widget_id_base ) {
		$sidebars = wp_get_sidebars_widgets();

		if ( ! isset( $sidebars[ $this->sidebar_id ] ) ) {
			return FALSE;
		}

		$_widget_id_base = preg_quote( $widget_id_base );
		$settings        = get_option( 'widget_' . $widget_id_base, array() );

		$save_widgets  = array();
		$save_settings = array();

		foreach ( $sidebars[ $this->sidebar_id ] as $index => $widget ) {
			if ( preg_match( "/^$_widget_id_base\-(\d+)/i", $widget, $match ) ) {

				$widget_number = &$match[1];

				$save_settings[] = $settings[ $widget_number ];
			}
		}


		return array(
			'sidebar_id'     => $this->sidebar_id,
			'widget_id_base' => $widget_id_base,
			'settings'       => $save_settings
		);
	}

	/**
	 * remove all widget which 'id bases' is equal to $widget_id_base
	 *
	 * @param string $widget_id_base
	 *
	 * @return bool true ob success or false on failure.
	 */
	public function remove_widgets( $widget_id_base ) {
		$sidebars = wp_get_sidebars_widgets();

		if ( ! isset( $sidebars[ $this->sidebar_id ] ) ) {
			return FALSE;
		}

		$_widget_id_base = preg_quote( $widget_id_base );
		$settings        = get_option( 'widget_' . $widget_id_base, array() );

		foreach ( $sidebars[ $this->sidebar_id ] as $index => $widget ) {
			if ( preg_match( "/^$_widget_id_base\-(\d+)/i", $widget, $match ) ) {

				$widget_number = &$match[1];

				unset( $sidebars[ $this->sidebar_id ][ $index ] );
				unset( $settings[ $widget_number ] );
			}
		}

		wp_set_sidebars_widgets( $sidebars );
		update_option( 'widget_' . $widget_id_base, $settings );


		return TRUE;
	}

}

/**
 * Example:
 *
 *
 * $import = new BF_Demo_Widget_Manager();
 *
 * $import->set_sidebarId( 'aside-logo' );
 *
 *
 * var_dump( $import->remove_widgets( 'search' ) );
 * var_dump( $import->add_widget( 'search' ) );
 */
