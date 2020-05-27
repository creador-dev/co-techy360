<?php


/**
 * Better Comment Form Utility Methods
 *
 * @package    content-protector-pack/web-server/config
 *
 * @author     BetterStudio <info@betterstudio.com>
 * @copyright  Copyright (c) 2018, BetterStudio
 *
 * @since      1.0.0
 */
abstract class CPP_Web_Server_Configuration {


	/**
	 * Enable hotlink protection.
	 *
	 * @param array $file_types list of file types to protect.
	 *
	 * @return bool|WP_ERROR true on success or false|WP_Error on failure.
	 */
	abstract public function hotlink_protection_enable( $file_types );


	/**
	 * Drop hotlink protection configs.
	 *
	 * @param array $file_types list of file types to protect.
	 *
	 * @return bool|WP_ERROR true on success or false|WP_Error on failure.
	 */
	abstract public function hotlink_protection_disable( $file_types );


	/**
	 * Block all iframe requests.
	 *
	 * @return bool true on success or false|WP_Error on failure.
	 */
	abstract public function iframe_protection_enable();


	/**
	 * Allow any iframe requests.
	 *
	 * @return bool|WP_ERROR true on success or false|WP_Error on failure.
	 */
	abstract public function iframe_protection_disable();


	/**
	 * Rollback all changes.
	 *
	 * @return bool|WP_ERROR true on success or false|WP_Error on failure.
	 */
	abstract public function roll_back();

}