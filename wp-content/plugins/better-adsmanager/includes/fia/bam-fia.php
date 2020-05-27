<?php
/**
 * bam-fia.php
 *---------------------------
 * Handles all compatibility tasks for FIA
 *
 */


BAM_FIA::init();


/**
 * Better Ads Manager Facebook Instant Article compatibility
 *
 * @since 1.18.5
 */
class BAM_FIA {


	/**
	 *
	 * @since 1.18.5
	 */
	public static function init() {

		// Custom rules
		add_filter( 'instant_articles_transformer_custom_rules_loaded', array(
			'BAM_FIA',
			'customize_role_transformer'
		) );
	}


	/**
	 * Injects BAM custom rules into FIA plugin
	 *
	 * @param $transformer Transformer
	 *
	 * @return \Transformer
	 */
	public static function customize_role_transformer( $transformer ) {

		// Reads from child theme to override it
		$path = Better_Ads_Manager::dir_path( '/includes/fia/rules-configuration.json' );

		$json = bf_get_local_file_content( $path );

		$json = Better_Ads_Manager()->make_prefix_undetectable( $json );

		$transformer->loadRules( $json );

		return $transformer;
	}
} // BAM_FIA
