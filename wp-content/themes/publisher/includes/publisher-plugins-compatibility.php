<?php
/**
 * publisher-plugins-compatibility.php
 *---------------------------
 * Handles all tasks about making Publisher compatible with third party plugins.
 *
 */


/**
 * Publisher third party plugins compatibility
 *
 * @since 1.8.0
 */
class Publisher_Plugins_Compatibility {

	/**
	 *
	 * @since 1.8.0
	 */
	public static function init() {


		/**
		 * Plugin: APS Arena Products
		 *
		 * http://www.webstudio55.com/plugins/arena-products/
		 *
		 * Issue: Remove duplicate posts and brands page conflict because it seams this plugins create 2 query!
		 * First removes all items so the second have not first page query results.
		 *
		 * Solution: Disable duplicate posts temporarily in archive pages of this plugin
		 *
		 */
		add_action( 'aps_brand_archive_after_controls', 'Publisher_Plugins_Compatibility::disable_duplicate_posts' );
		add_action( 'aps_brand_archive_after_results', 'Publisher_Plugins_Compatibility::enable_duplicate_posts' );


		/**
		 * Plugin: WooThemes Sensei
		 *
		 * https://woocommerce.com/products/sensei/
		 * https://docs.woocommerce.com/document/sensei-and-theme-compatibility/
		 *
		 * Issue: Template compatibility
		 */
		if ( function_exists( 'Sensei' ) ) {
			self::sensei_compatibility();
		}
	}


	/**
	 * Activates duplicate posts removal temporarily
	 */
	public static function disable_duplicate_posts() {

		publisher_set_global( 'disable-duplicate-posts', true );
	}


	/**
	 * Deactivates duplicate posts removal temporarily
	 */
	public static function enable_duplicate_posts() {

		publisher_unset_global( 'disable-duplicate-posts' );
	}


	/**
	 *  Plugin: WooThemes Sensei
	 *
	 * https://woocommerce.com/products/sensei/
	 */
	public static function sensei_compatibility() {

		global $woothemes_sensei;

		// Remove default wrappers
		if ( isset( $woothemes_sensei->frontend ) ) {
			remove_action( 'sensei_before_main_content', array(
				$woothemes_sensei->frontend,
				'sensei_output_content_wrapper'
			), 10 );
			remove_action( 'sensei_after_main_content', array(
				$woothemes_sensei->frontend,
				'sensei_output_content_wrapper_end'
			), 10 );
		}


		// Add Custom Wrappers
		add_action( 'sensei_before_main_content', 'Publisher_Plugins_Compatibility::sensei_wrapper_start', 10 );
		add_action( 'sensei_after_main_content', 'Publisher_Plugins_Compatibility::sensei_wrapper_end', 10 );

		// Add Theme Support
		add_action( 'after_setup_theme', 'Publisher_Plugins_Compatibility::declare_sensei_support' );
	}


	/**
	 *  Plugin: WooThemes Sensei
	 *
	 * https://woocommerce.com/products/sensei/
	 */
	public static function declare_sensei_support() {

		add_theme_support( 'sensei' );
	}


	/**
	 * Sensei template wrapper start (main content)
	 */
	public static function sensei_wrapper_start() {

		// Generate layout settings
		$layout_setting = publisher_get_page_layout_setting();

		?>
		<div class="container <?php echo $layout_setting['container']; ?>">
		<div class="row main-section">
		<div class="<?php echo $layout_setting['columns'][0]['class']; ?>">
		<?php
	}


	/**
	 * Sensei template wrapper end (sidebars)
	 */
	public static function sensei_wrapper_end() {

		// Generate layout settings
		$layout_setting = publisher_get_page_layout_setting();

		?>
		</div>
		<?php

		foreach ( $layout_setting['columns'] as $column ) {

			if ( $column['id'] == 'content' ) {
				continue;
			}

			?>
			<div class="<?php echo $column['class']; ?>">
				<?php get_sidebar( $column['id'] ); ?>
			</div><!-- .<?php echo $column['id']; ?>-sidebar-column -->
			<?php
		}

		?>
		</div><!-- .main-section -->
		</div>
		<?php
	} // sensei_wrapper_end


} // Publisher_Plugins_Compatibility
