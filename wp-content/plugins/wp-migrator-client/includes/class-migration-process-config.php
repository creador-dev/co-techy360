<?php

/**
 * @property string $destination_product_version          Migrating product version
 * @property string $destination_product_id               Migrating product id
 * @property string $source_product_version               Destination product id
 * @property string $source_product_id                    Destination product id
 * @property array  $term_meta_path                       Path to the term-meta option when their save in option table
 * @property string $product_type                         Migrating product type
 * @property array  $post_types                           Post types to migrate
 *
 * @property string $resumable_key                        Custom meta key to save resume state
 * @property string $resumable_value                      Resume state unique id
 */


class Migration_Process_Config {

	/**
	 * Store configuration array 
	 * 
	 * @var array
	 *
	 * @since 1.0.0
	 */
	public $config = array();


	/**
	 * Default items
	 *
	 * @var array
	 *
	 * @since 1.0.0
	 */
	public $defaults = array(

		'resumable_key' => 'wp-migrator-step-id',
	);


	/**
	 * Migration_Process_Config constructor.
	 *
	 * @param array $config
	 *
	 * @since 1.0.0
	 */
	public function __construct( array $config ) {

		$this->config = $config;
	}


	/**
	 * Get a configuration value
	 *
	 * @param string $var
	 *
	 * @since 1.0.0
	 * @return mixed  see
	 */
	public function __get( $var ) {

		if ( isset( $this->config [ $var ] ) ) {
			return $this->config [ $var ];
		}

		if ( isset( $this->defaults [ $var ] ) ) {
			return $this->defaults [ $var ];
		}
	}


	/**
	 * Check a variable exists
	 *
	 * @param string $var
	 *
	 * @return bool
	 */
	public function __isset( $var ) {

		return isset( $this->config [ $var ] ) || isset( $this->defaults[ $var ] );
	}


	/**
	 * Handy method to guss processing power of the hosting
	 *
	 * @since 1.0.0
	 * @return int
	 *
	 * 2 => low
	 * 3 => medium
	 * 4 => good
	 * 5 => very good
	 *
	 */
	public function server_power_rate() {

		static $import_per_step;

		if ( $import_per_step ) {
			return $import_per_step;
		}

		$is_memory_enough = $this->is_ini_value_changeable() || wp_convert_hr_to_bytes( WP_MEMORY_LIMIT ) < 67108864; // 64MB

		if ( ! $is_memory_enough ) {
			$import_per_step = 2;
		} elseif ( version_compare( '5.3', PHP_VERSION, '>' ) ) {
			$import_per_step = 3;
		} elseif ( version_compare( '5.5', PHP_VERSION, '>' ) ) {
			$import_per_step = 4;
		} elseif ( version_compare( '5.5', PHP_VERSION, '<=' ) ) {
			$import_per_step = 5;
		} else {
			$import_per_step = 2;
		}

		return $import_per_step;
	}


	/**
	 * Get current step for the active process
	 *
	 * @since 1.0.0
	 *
	 * @return int
	 */
	public function current_step() {

		$result = 1;

		if ( ! empty( $this->config['current_step'] ) ) {
			$result = $this->config['current_step'];

		} elseif ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {

			if ( ! empty( $_REQUEST['current_step'] ) ) {
				$result = $_REQUEST['current_step'];
			}
		}

		return absint( $result );
	}


	/**
	 * Is resumable mod enabled
	 *
	 * @since 1.0.0
	 *
	 * @return bool
	 */
	public function resume_enabled() {

		return apply_filters( 'wp-migrator/migrating/resume-enabled', TRUE );
	}


	/**
	 * @codeCoverageIgnore
	 *
	 * @param string $setting
	 *
	 * @since 1.0.0
	 * @return bool|mixed
	 */
	function is_ini_value_changeable( $setting = 'memory_limit' ) {

		if ( is_callable( 'wp_is_ini_value_changeable' ) ) {
			$args = func_get_args();

			if ( empty( $args ) ) {
				$args = array(
					$setting
				);
			}

			return call_user_func_array( 'wp_is_ini_value_changeable', $args );
		}

		/**
		 * implementation of wp_is_ini_value_changeable
		 */

		static $ini_all;

		if ( ! isset( $ini_all ) ) {
			$ini_all = ini_get_all();
		}

		// Bit operator to workaround https://bugs.php.net/bug.php?id=44936 which changes access level to 63 in PHP 5.2.6 - 5.2.17.
		if ( isset( $ini_all[ $setting ]['access'] ) && ( INI_ALL === ( $ini_all[ $setting ]['access'] & 7 ) || INI_USER === ( $ini_all[ $setting ]['access'] & 7 ) ) ) {
			return TRUE;
		}

		return FALSE;
	}
}
