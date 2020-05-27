<?php
/**
 * 3 column layout with right sidebar.
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
	<main <?php publisher_attr( 'content' ); ?>>

		<div class="container <?php echo $layout_setting['container']; ?>">
			<div class="row main-section">
				<?php

				foreach ( $layout_setting['columns'] as $column ) {

					if ( $column['id'] == 'content' ) {
						?>
						<div class="<?php echo $column['class']; ?>">
							<?php

							if ( function_exists( 'is_bbpress' ) && ( bbp_is_single_user_edit() || bbp_is_single_user() ) ) {
								publisher_get_view( 'forum/content-user' );
							} else {
								// Prints post and other post type templates
								// Location: "views/general/{posttype}/content.php"
								publisher_get_content_template();
							}

							?>
						</div><!-- .content-column -->
						<?php
					} else {
						?>
						<div class="<?php echo $column['class']; ?>">
							<?php get_sidebar( $column['id'] ); ?>
						</div><!-- .<?php echo $column['id']; ?>-sidebar-column -->
						<?php
					}
				}

				?>
			</div><!-- .main-section -->
		</div><!-- .layout-3-col -->

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

?>
