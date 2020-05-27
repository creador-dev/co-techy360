<?php
/**
 * Single column layout template file.
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    7.6.0
 */

$container_class = 'layout-1-col layout-no-sidebar';

if ( ( 'page' == get_option( 'show_on_front' ) ) && is_front_page() && bf_get_query_var_paged( 1 ) > 1 ) {
	$content_type = 'front paginated';
} elseif ( publisher_is_singular() ) {
	$content_type = 'singular';
} // Other pages template
else {
	$content_type = 'archive';
}

// Page that was not built with WP Bakery Page Builder
if ( ! publisher_is_singular() || ! publisher_is_pagebuilder_used( get_the_ID() ) ) {
	$container_class .= ' container';
}

if ( publisher_get_header_style() !== 'disable' ) {

	// Shows breadcrumb
	if ( publisher_show_breadcrumb() ) {
		Better_Framework()->breadcrumb()->generate( array(
			'before'       => '<div class="container bf-breadcrumb-container">',
			'after'        => '</div>',
			'custom_class' => 'bc-top-style'
		) );
		$container_class .= ' layout-bc-before';
	}

	// After header Ad
	publisher_show_ad_location( 'header_after', array(
			'container-class' => 'better-ads-after-header',
			'before'          => '<div class="container adcontainer">',
			'after'           => '</div>',
		)
	);
}

/**
 * Fires before ".content-wrap" start
 *
 * @since 1.9.0
 */
do_action( 'publisher/content-wrap/before' );

?>
<main <?php publisher_attr( 'content' ); ?>>
	<?php

	/**
	 * Fires in start of".content-wrap"
	 *
	 * @since 1.9.0
	 */
	do_action( 'publisher/content-wrap/start' );

	?>
	<div class="<?php echo $container_class; ?>">
		<div class="content-column">
			<?php

			if ( $content_type === 'singular' ) {
				// Prints post and other post type templates
				// Location: "views/general/{posttype}/content.php"
				publisher_get_content_template();
			} else {


				if ( $content_type !== 'front paginated' ) {
					// Prints the title of archive pages
					// Location: "views/general/archive/page.php"
					publisher_get_view( 'archive', 'title' );
				} else {
					// Setup query for paginated posts on static homepage
					publisher_setup_paged_frontpage_query();
				}

				if ( publisher_have_posts() ) {

					// You can use this for adding codes before the main loop
					do_action( 'publisher/archive/before-loop' );

					// Process and show page "after X post" ad
					publisher_process_page_listing_block_ad();

					// Prints posts base of listing that was selected in panels.
					// Location: "views/general/loop/listing-*.php"
					publisher_get_view( 'loop', publisher_get_page_listing() );

					// You can use this to add some code after the main query.
					// the pagination will be printed from this action.
					do_action( 'publisher/archive/after-loop' );


				} else {

					// Prints no result message
					// Location: "views/general/loop/_none-result.php"
					publisher_get_view( 'loop', '_none-result' );

				}

				// Clear all props
				publisher_clear_props();
			}

			?>
		</div><!-- .content-column -->
	</div>
	<?php

	/**
	 * Fires before close of".content-wrap"
	 *
	 * @since 1.9.0
	 */
	do_action( 'publisher/content-wrap/end' );

	?>
</main><!-- main -->
<?php

/**
 * Fires after close of".content-wrap"
 *
 * @since 1.9.0
 */
do_action( 'publisher/content-wrap/after' );

?>
