<?php
/**
 * better-gcs.php
 *
 * "Better Google Custom Search" plugin template.
 *
 * @author    BetterStudio
 * @package   Publisher
 * @version   1.9.0
 */

get_header();

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

?>
	<div class="content-wrap">
		<main <?php publisher_attr( 'content', '' ); ?>>

			<div class="container <?php echo $layout_setting['container']; ?>">
				<div class="row main-section">
					<?php

					foreach ( $layout_setting['columns'] as $column ) {

						if ( $column['id'] == 'content' ) {
							?>
							<div class="<?php echo $column['class']; ?>">
								<?php

								// Pre title
								$pre_title = sprintf(
									publisher_translation_get( 'archive_search_title' ),
									'<i>' . get_search_query() . '</i>',
									''
								);

								?>
								<div class="comments-wrap">
									<p class="section-heading <?php echo publisher_get_block_heading_class(); ?>"><span
											class="h-text"><?php echo $pre_title; // escaped before ?></span></p>
									<?php

									Better_GCS_Search_Box();

									?>
								</div>
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
			</div>

		</main><!-- main -->
	</div><!-- .content-wrap -->
<?php

get_footer();