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
 * Class BF_Demo_Option_Manager
 *
 * add, delete, update option and transient
 *
 */
class BF_Demo_Option_Manager {


	/**
	 * get option name stored in option array
	 *
	 * @param array $option_params
	 *
	 * @return bool|string option name as string on success or false on failure.
	 */
	public function get_option_name( $option_params ) {

		if ( isset( $option_params['option_name'] ) && is_string( $option_params['option_name'] ) ) {

			return $option_params['option_name'];
		}

		return FALSE;
	}


	/**
	 * get option values stored in option array
	 *
	 * -external usage-
	 *
	 * @param array $option_params
	 *
	 * @return mixed null on failure another data type on success.
	 */
	public function get_option_value( $option_params = array() ) {

		if ( isset( $option_params['option_value'] ) ) {

			if ( is_array( $option_params['option_value'] ) ) {
				foreach ( $option_params['option_value'] as $id => $val ) {
					if ( is_array( $val ) ) {
						foreach ( $val as $_id => $_val ) {
							$option_params['option_value'][ $id ][ $_id ] = BF_Product_Demo_Installer::Run()->apply_pattern( $_val );
						}
					} else {
						$option_params['option_value'][ $id ] = BF_Product_Demo_Installer::Run()->apply_pattern( $val );
					}
				}
			} else {
				$option_params['option_value'] = BF_Product_Demo_Installer::Run()->apply_pattern( $option_params['option_value'] );
			}

			return $option_params['option_value'];
		}

		return BF_Product_Demo_Installer::Run()->apply_pattern( $option_params );
	}


	/**
	 * prepare a array with two index to pass add_option, update_option via call_user_func_array function.
	 *
	 * @param array $option_params
	 *
	 * @return array {
	 *
	 *     0 => option_name,
	 *     1 => option_value
	 *
	 * }
	 */
	protected function get_option_params( $option_params ) {

		if ( ! is_array( $option_params ) ) {
			return;
		}

		if ( isset( $option_params['option_value_file'] ) && is_readable( $option_params['option_value_file'] ) ) {
			$value = BF_Product_Demo_Installer::Run()->apply_pattern( bf_get_local_file_content( $option_params['option_value_file'] ) );

			// decode json value
			if ( $json_decode = bf_is_json( $value, TRUE ) ) {
				$value = $json_decode;
			}

			$option_params['option_value'] = $value;
		}

		$required_params = array(
			'option_name'  => '',
			'option_value' => '',
		);

		if ( ! array_diff_key( $required_params, $option_params ) ) {

			return array(
				$option_params['option_name'],
				$this->get_option_value( $option_params )
			);
		}
	}


	/**
	 * prepare a array with three index to pass set_transient, get_transient via call_user_func_array function.
	 *
	 * @param array $transient_params
	 *
	 * @return array
	 */

	protected function get_transient_params( $transient_params ) {

		if ( ! is_array( $transient_params ) ) {
			return;
		}

		$required_params = array(
			'transient_name'  => '',
			'transient_value' => '',
			'expiration'      => '',
		);

		if ( ! array_diff_key( $required_params, $transient_params ) ) {

			return array(
				$transient_params['transient_name'],
				$transient_params['transient_value'],
				$transient_params['expiration']
			);
		}
	}


	/**
	 * @param Array $option_params
	 *                                 array {
	 *
	 * @type string $option_name       Name of option to add. Expected to not be SQL-escaped.
	 * @type mixed  $option_value      Optional if 'option_value_file' index exists .Option value. Must be serializable
	 *       if non-scalar. Expected to not be SQL-escaped
	 * @type string $option_value_file Optional if 'option_value' index exists . file path to option value.  long
	 *       option value can save on file.
	 *  }
	 *
	 *
	 * @return bool False if option was not added and true if option was added.
	 */
	public function add_option( $option_params ) {

		if ( $option_params = $this->get_option_params( $option_params ) ) {

			//turn off autoload
			$option_params[2] = '';
			$option_params[3] = 'no';

			return call_user_func_array( 'add_option', $option_params );
		}
	}


	/**
	 * @param $option_id option unique ID in database
	 *
	 * @return bool true on success or false on failure
	 */
	public function remove_option( $option_id ) {

		global $wpdb;


		return (bool) $wpdb->delete( $wpdb->options, array( 'option_id', $option_id ) );
	}


	/**
	 *
	 * update option
	 *
	 * @param Array $option_params
	 *
	 * @see update_option()
	 * @see get_option_params()
	 *
	 * @return bool False if value was not updated and true if value was updated
	 */
	public function update_option( $option_params ) {

		if ( $update_option_params = $this->get_option_params( $option_params ) ) {

			return call_user_func_array( 'update_option', $update_option_params );
		}

		return FALSE;
	}


	/**
	 * combine new array value with previous option array
	 *
	 * @param Array $option_params
	 *
	 * @see update_option()
	 * @see get_option_params()
	 *
	 * @return bool False if value was not updated and true if value was updated
	 */
	public function merge_and_update_option( $option_params ) {

		if ( $update_option_params = $this->get_option_params( $option_params ) ) {

			//get previous option and make sure its array
			$prev_options = $this->get_option( $option_params );

			if ( empty( $prev_options ) ) {
				$prev_options = array();
			} else {
				$prev_options = (array) $prev_options;
			}

			//second index is option value
			$update_option_params[1] = array_merge( $prev_options, (array) $update_option_params[1] );

			return call_user_func_array( 'update_option', $update_option_params );
		}

		return FALSE;
	}


	/**
	 *
	 * @param array|string $option_params
	 *
	 * @see get_option_params()
	 *
	 * @return bool False if value was not updated and true if value was updated
	 */
	public function get_option( $option_params ) {

		if ( is_array( $option_params ) ) {

			return get_option( $this->get_option_name( $option_params ) );
		} elseif ( is_string( $option_params ) ) {

			return get_option( $option_params );
		}
	}


	/**
	 * @param array|string $option_params of option to remove. Expected to not be SQL-escaped
	 *
	 * @return bool True, if option is successfully deleted. False on failure.
	 */
	public function delete_option( $option_params ) {

		if ( is_array( $option_params ) ) {

			return delete_option( $this->get_option_name( $option_params ) );
		} elseif ( is_string( $option_params ) ) {

			return delete_option( $option_params );
		}

	}


	/**
	 * @param Array $transient_params
	 *
	 * @see get_transient_params()
	 *
	 * @return bool False if value was not set and true if value was set.
	 */
	public function set_transient( $transient_params ) {

		if ( $transient_params = $this->get_transient_params( $transient_params ) ) {

			return call_user_func_array( 'set_transient', $transient_params );
		}
	}


	/**
	 * @param string $transient Transient name. Expected to not be SQL-escaped
	 *
	 * @return bool true if successful, false otherwise
	 */

	public function remove_transient( $transient ) {

		return delete_transient( $transient );
	}


	/**
	 * @param Array $transient_params
	 *
	 * @see get_option_params()
	 *
	 * @return mixed Value of transient.
	 */
	public function get_transient( $transient_params ) {

		if ( $transient_params = $this->get_transient_params( $transient_params ) ) {

			return get_transient( $transient_params[0] );
		}
	}
}
