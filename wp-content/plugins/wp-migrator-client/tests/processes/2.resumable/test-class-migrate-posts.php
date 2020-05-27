<?php


/**
 * @coversDefaultClass Migrate_Posts
 */
final class Migrate_Posts_Resumable_Test extends Migrate_Posts_Test {

	public function setUp() {

		WP_UnitTestCase::setUp();

		// enable resume
		add_filter( 'wp-migrator/migrating/resume-enabled', '__return_true', 200 );
	}

	/**
	 * @param $step
	 * @param $posts_id
	 */
	public function after_migration( $step, $posts_id ) {

		$instance = $this->get_instance();

		foreach ( $posts_id as $post_id ) {

			add_post_meta($post_id,$instance->config->resumable_key,$instance->config->resumable_value);
		}
	}
}
