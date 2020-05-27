<?php


/**
 * WordPress Migrator Migration Handler Class
 *
 * @since     1.0.0
 *
 * @package   WP-Migrator/Migrator_Manager
 * @author    BetterStudio <info@betterstudio.com>
 * @link      http://www.betterstudio.com
 *
 * @version   1.0.0
 */
class Migrator_Process_Manager {

	/**
	 * @var Migration_Process_Config
	 *
	 * @see       source product properties
	 *
	 * @since     1.0.0
	 */
	private $config;


	/**
	 * @var Migration_Process_Config
	 *
	 * @see       destination product properties
	 *
	 * @since     1.0.0
	 */
	private $config2;


	/**
	 * Backup data while migration process if it possible
	 *
	 * @since 1.0.0
	 * @var bool
	 */
	public $backup = TRUE;


	/**
	 * Migrator_Process_Manager constructor.
	 *
	 * @param  array $config  source product configuration array
	 * @param array  $config2 destination product configuration array
	 * @param array  $options extra options
	 *
	 * @since     1.0.0
	 */
	public function __construct( array $config, array $config2 = array(), $options = array() ) {

		$this->set_config( $config );
		$this->set_config2( $config2 );

	}


	/**
	 * Set configuration array
	 *
	 * @param array $config
	 *
	 * @since 1.0.0
	 */
	public function set_config( array $config ) {

		$this->config = new Migration_Process_Config( $config );
	}

	/**
	 *
	 * Get configuration
	 *
	 * @since 1.0.0
	 *
	 * @return Migration_Process_Config
	 */
	public function get_config() {

		return $this->config;
	}


	/**
	 * Set configuration array
	 *
	 * @param array $config2
	 *
	 * @since 1.0.0
	 */
	public function set_config2( array $config2 ) {

		$this->config2 = new Migration_Process_Config( $config2 );
	}

	/**
	 *
	 * Get configuration
	 *
	 * @since 1.0.0
	 *
	 * @return Migration_Process_Config
	 */
	public function get_config2() {

		return $this->config2;
	}

	/**
	 * @var array
	 *
	 * @since     1.0.0
	 */
	public $processors = array(
		'posts' => 'Migrate_Posts',
		'terms' => 'Migrate_Terms',
		'menus' => 'Migrate_Menus',
	);


	/**
	 * Get fresh instance of processor class
	 *
	 * @param string $which the processor name @see $processors
	 *
	 * @since 1.0.0
	 *
	 * @return Migration_Process|null null on failure.
	 */
	public function factory( $which ) {

		if ( ! isset( $this->processors[ $which ] ) ) {
			return;
		}

		$instance = FALSE;

		/**
		 * @var Migration_Process $instance
		 */

		if ( is_string( $this->processors[ $which ] ) ) {
			$instance = new $this->processors[$which];
		} elseif ( is_object( $this->processors[ $which ] ) ) {
			$instance = $this->processors[ $which ];
		}

		if ( $instance !== FALSE ) {
			$instance->set_migration_config( $this->get_config(), $this->get_config2() );

			return $instance;
		}

	}


	/**
	 * Count total number of items to migrate
	 *
	 * @param string $which the processor name @see $processors
	 *
	 * @since 1.0.0
	 * @return int
	 */
	public function count_items( $which ) {

		if ( ! $instance = $this->factory( $which ) ) {
			return 0;
		}

		if ( Migrator_Util::is_object_countable( $instance ) ) {

			return count( $instance );
		}

		return 0;
	}

	/**
	 * Get total recalls of migrate class to complete the process.
	 *
	 * @since 1.0.0
	 *
	 * @return int
	 */
	public function calculate_total_steps() {

		$total = 0;

		foreach ( $this->processors as $id => $_ ) {

			$total += $this->factory( $id )->calculate_steps();
		}

		return $total;
	}


	/**
	 * Get number of recalls of the migrate classes to complete the whole process.
	 *
	 * @since 1.0.0
	 *
	 * @param array $processors
	 *
	 * @return array
	 */
	public function get_number_of_recalls( $processors = array() ) {

		$results = array();

		foreach ( array_intersect_key( $this->processors, array_flip( $processors ) ) as $id => $_ ) {

			$results[ $id ] = $this->factory( $id )->calculate_steps();
		}

		return $results;
	}


	/**
	 * Get items to migrate for active/current step
	 *
	 * @param object $factory
	 *
	 * @since 1.0.0
	 * @return Migration_Process|Resumable_Migration_Process|bool  false on failure.
	 */
	public function get_items( $factory ) {

		if ( $factory instanceof Resumable_Migration_Process && ! empty( $this->config['resume_enabled'] ) ) {

			return $factory->not_migrated_items();
		}

		if ( $factory instanceof Migration_Process ) {

			return $factory->migration_items();
		}

		return FALSE;
	}

	/**
	 * @param array $processor
	 *
	 * @param array $options
	 *
	 * @return bool|WP_Error|int int on success or
	 *
	 * false        if $options[error_type] === BS_Error_handler::NONE_ERROR
	 * WP_Error     if $options[error_type] === BS_Error_handler::WP_ERROR
	 * BS_Exception if $options[error_type] === BS_Error_handler::THROW_ERROR
	 *
	 * @throws BS_Exception
	 * @since 1.0.0
	 */
	public function migrate( $processor, $options = array() ) {

		$options = wp_parse_args( $options, array(
			'error_type' => BS_Error_handler::WP_ERROR,
			//
			''
		) );

		try {

			if ( ! $factory = $this->factory( $processor ) ) {
				throw new BS_Exception( 'Invalid processor', 'invalid-processor' );
			}

			$backup_item = apply_filters( 'wp-migrator/migrating/backup', $this->backup && $factory instanceof Safe_Migration_Process );
			$items       = apply_filters( 'wp-migrator/migrating/items', $factory->migration_items(), $processor, $factory );

			if ( $backup_item ) {
				$factory->migration_backup( $items );
			}

			$migrated_items = $factory->migrate( $items );

			if ( $migrated_items === FALSE ) {

				throw new BS_Exception( 'Cannot Migrate Data', 'error-while-migrating' );
			}

			return $migrated_items;

		} catch( BS_Exception $e ) {

			return BS_Error_handler::handle( $e, $options['error_type'] );
		}
	}
}
