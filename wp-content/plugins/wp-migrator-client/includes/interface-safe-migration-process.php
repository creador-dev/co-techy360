<?php


interface Safe_Migration_Process {

	/**
	 * Backup existing data before start migrating process
	 *
	 * @param mixed $item_info
	 *
	 * @return bool true true on success.
	 */
	public function migration_backup( $item_info );


	/**
	 *  Restore backup version
	 *
	 * @param mixed $item_info
	 * @param bool  $delete_after delete data after restore completed
	 *
	 * @return bool true true on success.
	 */
	public function migration_restore( $item_info, $delete_after = TRUE );
}
