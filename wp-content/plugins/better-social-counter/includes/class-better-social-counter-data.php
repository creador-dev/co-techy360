<?php

if ( ! class_exists( 'Better_Social_Counter_Utilities' ) ) {

	require Better_Social_Counter()->dir_path() . 'includes/class-better-social-counter-utilities.php';
}


class Better_Social_Counter_Data {

	/**
	 * Data container
	 *
	 * @var array
	 */
	protected $attributes = array();


	/**
	 * Get custom data attribute
	 *
	 * @param string|int $key
	 *
	 * @return mixed null on failure other type on success.
	 */
	public function get( $key ) {

		return Better_Social_Counter_Utilities::get_array_index( $this->attributes, $key );
	}


	/**
	 * Get custom data attribute
	 *
	 * @param string|int $key
	 *
	 * @param mixed      $value
	 */
	public function set( $key, $value ) {

		Better_Social_Counter_Utilities::push_value( $this->attributes, $key, $value );
	}


	/**
	 * Unset custom attribute index
	 *
	 * @param string|int $key
	 *
	 */
	public function un_set( $key ) {

		Better_Social_Counter_Utilities::pop_value( $this->attributes, $key );
	}


	/**
	 * Get custom data attribute
	 *
	 * @param string|int $key
	 *
	 * todo: add support for dot notation in $key
	 *
	 * @return bool
	 */
	public function exists( $key ) {


		return isset( $this->attributes[ $key ] );
	}


	/**
	 * Get all data
	 *
	 * @return array
	 */
	public function to_array() {

		return $this->attributes;
	}


	/**
	 * Get saved id
	 *
	 * @return string|null
	 */
	public function id() {

		if ( isset( $this->attributes['id'] ) ) {
			return $this->attributes['id'];
		}

		return NULL;
	}


	public function count() {

		if ( isset( $this->attributes['count'] ) ) {
			return $this->attributes['count'];
		}

		return NULL;
	}


	public function link() {

		if ( isset( $this->attributes['link'] ) ) {
			return $this->attributes['link'];
		}

		return NULL;
	}


	/**
	 * Fill object with custom data
	 *
	 * @access internal usage
	 *
	 * @param array $data
	 */
	public function _load( array $data ) {

		$this->attributes = $data;
	}
}