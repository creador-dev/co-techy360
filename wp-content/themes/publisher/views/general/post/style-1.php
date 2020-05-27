<?php
/**
 * Default post template.
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    7.6.0
 */
// Generate layout settings
$layout_setting = publisher_get_page_layout_setting();

if ( publisher_get_header_style() !== 'disable' ) {

	// Shows breadcrumb
	if ( publisher_show_breadcrumb() ) {
		Better_Framework()->breadcrumb()->generate( array(
			'before'       => '<div class="container bf-breadcrumb-container">',
			'after'        => '</div>',
			'custom_class' => 'bc-top-style'
		) );
		$layout_setting['container'] .= ' layout-bc-before';
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
<div class="content-wrap">
	<?php

	/**
	 * Fires in start of".content-wrap"
	 *
	 * @since 1.9.0
	 */
	do_action( 'publisher/content-wrap/start' );

	?>
	<main <?php publisher_attr( 'content', '' ); ?>>

		<div class="container <?php echo $layout_setting['container']; // escaped before ?> post-template-1">
			<div class="row main-section">
				<?php

				foreach ( $layout_setting['columns'] as $column ) {

					if ( $column['id'] == 'content' ) {
						?>
						<div class="<?php echo $column['class']; ?>">
							<?php publisher_get_view( 'post', 'content' ); ?>
						</div><!-- .content-column -->
						<?php

						// Clear all props
						publisher_clear_props();

					} else {
						?>
						<div class="<?php echo $column['class']; // escaped before ?>">
							<?php get_sidebar( $column['id'] ); ?>
						</div><!-- .<?php echo $column['id']; // escaped before ?>-sidebar-column -->
						<?php
					}
				}

				?>
			</div><!-- .main-section -->
		</div><!-- .container -->

	</main><!-- main -->
	<?php

	/**
	 * Fires before close of".content-wrap"
	 *
	 * @since 1.9.0
	 */
	do_action( 'publisher/content-wrap/end' );

	?>
</div><!-- .content-wrap -->
<?php

/**
 * Fires after close of".content-wrap"
 *
 * @since 1.9.0
 */
do_action( 'publisher/content-wrap/after' );

publisher_get_view( 'post', 'more-stories' );

?>
