<?php
/**
 * publisher-admin.php
 *---------------------------
 * Handles all tasks about admin in Publisher
 *
 */


/**
 * Publisher Admin Class
 *
 * @since 1.8.0
 */
class Publisher_Admin {

	/**
	 *
	 * @since 1.8.0
	 */
	public static function init() {

		// Handle Edit Posts Table - Thumbnail Column
		add_filter( 'manage_posts_columns', 'Publisher_Admin::manage_posts_columns', 200, 2 );
		add_action( 'manage_posts_custom_column', 'Publisher_Admin::thumbnail_posts_column', 200, 2 );

		// Callback changing save result
		add_filter( 'better-framework/panel/save/result', 'Publisher_Admin::callback_panel_save_result', 10, 2 );

		// Performs the BF setup
		add_action( 'better-framework/after_setup', 'Publisher_Admin::theme_init' );

		// Performs WP admin init
		add_action( 'admin_init', 'Publisher_Admin::admin_init', 1000 );
	}


	/**
	 * Append Thumbnail Column to Edit Posts Table
	 *
	 * @param array $columns
	 * @param       $post_type
	 *
	 * @return array
	 * @since 1.8.0
	 */
	public static function manage_posts_columns( $columns, $post_type ) {

		if ( $post_type === 'post' && publisher_get_option( 'posts_table_thumbnail' ) ) {
			$columns = bf_array_insert_after( 'cb', $columns, 'publisher_thumbnail', '<span class="dashicons dashicons-format-image"></span>' );
		}

		return $columns;
	}


	/**
	 * Print Post Thumbnail in Edit Posts Table
	 *
	 * @param string $column_name
	 * @param int    $post_id
	 *
	 * @since 1.8.0
	 */
	public static function thumbnail_posts_column( $column_name, $post_id ) {

		if ( $column_name === 'publisher_thumbnail' ) {
			echo get_the_post_thumbnail( $post_id, 'publisher-tb1' ); // escaped before
		}
	}


	/**
	 * Filter callback: Used for changing save translation panel result
	 *
	 * @param $output
	 * @param $args
	 *
	 * @return string
	 */
	public static function callback_panel_save_result( $output, $args ) {

		// change only for translation panel
		if ( $args['id'] == publisher_get_theme_panel_id() ) {
			if ( ! empty( $args['data']['facebook_app_id'] ) && ! empty( $args['data']['facebook_app_secret'] ) ) {
				bf_remove_notice( 'share-facebook-rate-limit' );
			}
		}

		return $output;
	}


	/**
	 * Initialize theme
	 */
	public static function theme_init() {

		if ( function_exists( 'bsf_notices' ) ) {
			bf_call_func_array(
				'remove' . '_action',
				array(
					'admin' . '_notices',
					'bsf' . '_notices',
					10
				)
			);

			bf_call_func_array(
				'remove' . '_action',
				array(
					'admin' . '_notices',
					'bsf' . '_notices',
					1000
				)
			);

			bf_call_func_array(
				'network' . '_admin' . '_action',
				array(
					'admin' . '_notices',
					'bsf' . '_notices',
					1000
				)
			);
		}
	}


	/**
	 * Initialize theme
	 */
	public static function admin_init() {

		if ( function_exists( 'bsf_notices' ) ) {
			bf_call_func_array(
				'remove' . '_action',
				array(
					'admin' . '_notices',
					'bsf' . '_notices',
					10
				)
			);

			bf_call_func_array(
				'remove' . '_action',
				array(
					'admin' . '_notices',
					'bsf' . '_notices',
					1000
				)
			);

			bf_call_func_array(
				'network' . '_admin' . '_action',
				array(
					'admin' . '_notices',
					'bsf' . '_notices',
					1000
				)
			);
		}
	}

} // Publisher_Admin
