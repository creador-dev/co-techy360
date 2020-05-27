<?php


/**
 * Class BF_Page_Builders_Wrapper
 *
 * @since 4.0.0
 */
abstract class BF_Page_Builder_Wrapper {

	/**
	 * Register supported fields.
	 *
	 * @since 4.0.0
	 * @return bool true on success.
	 */
	abstract public function register_fields();


	/**
	 * Unique id of the page builder.
	 *
	 * @since 4.0.0
	 * @return string
	 */
	abstract public function unique_id();

	/**
	 * Register shortcode map.
	 *
	 * @param array $settings
	 * @param mixed $fields transformed fields
	 *
	 * @since 4.0.0
	 * @return bool true on success
	 */
	abstract public function register_map( array $settings, $fields );


	/**
	 * List of supported fields type.
	 *
	 * @since 4.0.0
	 * @return array
	 */
	abstract public function supported_fields();


	/**
	 * Call register_map method when this hook has been fired.
	 *
	 * Empty return value will fire the method immediately.
	 *
	 * @since 4.0.0
	 * @return string
	 */
	public static function register_map_hook() {

		return '';
	}


	/**
	 * Call register_fields method when this hook has been fired.
	 *
	 * Empty return value will fire the method immediately.
	 *
	 * @since 4.0.0
	 * @return string
	 */
	public static function register_fields_hook() {

		return '';
	}
}
