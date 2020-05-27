<?php


interface Migration_Process {

	/**
	 * Calculate how many steps needed to complete the process
	 *
	 * @return int
	 */
	public function calculate_steps();


	/**
	 * Transform data to new structure
	 *
	 * @param mixed $items an item to migrate
	 *
	 * @return int|bool the number of migrated items on success (even zero) false on failure.
	 */
	public function migrate( $items );


	/**
	 * Set configurations of the migration process
	 *
	 * @param Migration_Process_Config $configuration  the array configuration of the source product
	 * @param Migration_Process_Config $configuration2 the array configuration of the destination product
	 */
	public function set_migration_config( $configuration, $configuration2 );


	/**
	 * Get items to migrate
	 *
	 * @return array
	 */
	public function migration_items();
}
