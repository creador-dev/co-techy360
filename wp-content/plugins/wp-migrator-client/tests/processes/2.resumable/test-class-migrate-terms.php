<?php


/**
 * @coversDefaultClass Migrate_Terms
 */
final class Migrate_Terms_Resumable_Test extends Migrate_Terms_Test {

	public function setUp() {

		WP_UnitTestCase::setUp();

		// enable resume
		add_filter( 'wp-migrator/migrating/resume-enabled', '__return_true', 200 );
	}


	/**
	 * @param $step
	 * @param $terms_id
	 */
	public function after_migration( $step, $terms_id ) {

		$instance = $this->get_instance();

		foreach ( $terms_id as $term_id ) {

			add_term_meta($term_id,$instance->config->resumable_key,$instance->config->resumable_value);
		}
	}
}
