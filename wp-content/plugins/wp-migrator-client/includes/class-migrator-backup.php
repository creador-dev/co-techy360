<?php


/**
 * WordPress Migrator Class to Create Backup from any Data and ability to restore it.
 *
 * @since     1.0.0
 *
 * @package   WP-Migrator/Migrator_Manager
 * @author    BetterStudio <info@betterstudio.com>
 * @link      http://www.betterstudio.com
 *
 * @version   1.0.0
 */
class Migrator_Backup {


	/**
	 * Backup any data
	 *
	 * @param int    $object_id
	 * @param string $group_name
	 * @param mixed  $data
	 *
	 * @param array  $options
	 *
	 * @global wpdb  $wpdb wordpress database object
	 *
	 * @return bool
	 * @since 1.0.0
	 *
	 */
	public static function backup( $object_id, $group_name, $data, $options = array() ) {

		global $wpdb;

		if ( empty( $object_id ) ) {
			return FALSE;
		}

		$options = wp_parse_args( $options, array(
			'replace' => FALSE,
		) );

		$exists = self::exists( $object_id, $group_name );

		if ( ! $options['replace'] && $exists ) {
			return FALSE; // Cannot replace existing data
		}

		$data            = maybe_serialize( $data );
		$table_name      = self::table_name();
		$update_date_gmt = current_time( 'mysql', TRUE );

		if ( $exists ) {
			return (bool) $wpdb->update( $table_name, compact( 'data' ), compact( 'object_id', 'group_name' ) );
		}

		$backup_date_gmt = $update_date_gmt;

		return (bool) $wpdb->insert( $table_name, compact( 'object_id', 'group_name', 'data', 'backup_date_gmt', 'update_date_gmt' ) );
	}


	/**
	 * Read backed-up data
	 *
	 * @param int    $object_id
	 * @param string $group_name
	 * @param string $output
	 *
	 * @see   wpdb::get_row $output documentation
	 *
	 * @global wpdb  $wpdb wordpress database object
	 *
	 * @since 1.0.0
	 *
	 * @return array|object|null|void @see wpdb::get_row for more doc
	 */
	public static function find( $object_id, $group_name, $output = OBJECT ) {

		global $wpdb;

		$table_name = self::table_name();

		$result = $wpdb->get_row(
			$wpdb->prepare( "SELECT * FROM $table_name WHERE object_id = %d AND group_name = %s LIMIT 1", $object_id, $group_name ),
			$output );

		if ( $result ) {

			if ( $output === OBJECT ) {

				$result->data = maybe_unserialize( $result->data );
			} elseif ( $output === ARRAY_A ) {

				$result['data'] = maybe_unserialize( $result['data'] );
			} elseif ( $output === ARRAY_N ) {

				$result = array_map( 'maybe_unserialize', $result );
			}
		}

		return $result;
	}


	/**
	 * Check backup exists for given object id & group name
	 *
	 * @global wpdb  $wpdb wordpress database object
	 *
	 * @param int    $object_id
	 * @param string $group_name
	 *
	 * @since 1.0.0
	 *
	 * @return bool true if exists
	 */
	public static function exists( $object_id, $group_name ) {

		global $wpdb;

		$table_name = self::table_name();

		$sql = $wpdb->prepare(
			"SELECT ID FROM $table_name WHERE object_id = %d AND group_name = %s LIMIT 1",
			$object_id,
			$group_name
		);

		return (bool) $wpdb->get_var( $sql );
	}


	/**
	 * Delete an existing backup item
	 *
	 * @global wpdb  $wpdb wordpress database object
	 *
	 * @param int    $object_id
	 * @param string $group_name
	 *
	 * @since 1.0.0
	 *
	 * @return bool true on success
	 */
	public static function delete( $object_id, $group_name ) {

		global $wpdb;

		return (bool) $wpdb->delete( self::table_name(), compact( 'object_id', 'group_name' ) );
	}


	/**
	 * Install database table
	 *
	 * @global wpdb $wpdb wordpress database object
	 *
	 * @since 1.0.0
	 *
	 * todo: add index
	 * todo: make object_id and group_name unique
	 *
	 * @return bool true on successfully install
	 */
	public static function install() {

		global $wpdb;

		$table_name = self::table_name();

		$sql_list = array();

		$sql_list[] = "
			CREATE TABLE IF NOT EXISTS `$table_name` (
 				`ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  				`object_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  				`group_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  				`data` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  				`backup_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  				`update_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  				
  				PRIMARY KEY (`ID`)
			) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=$wpdb->collate;
		";

		if ( ! function_exists( 'dbDelta' ) ) {
			include ABSPATH . '/wp-admin/includes/upgrade.php';
		}

		return (bool) dbDelta( $sql_list );
	}


	/**
	 * The table name in the database
	 *
	 * @global wpdb $wpdb wordpress database object
	 *
	 * @since 1.0.0
	 *
	 * @return string
	 */
	public static function table_name() {

		global $wpdb;

		return "{$wpdb->prefix}migrator_backups";
	}

}
