<?php
/**
 * Single column layout template file.
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    7.6.0
 */

$container_class = 'container layout-1-col layout-no-sidebar';

$slider_config = publisher_main_slider_config( array(
	'type' => 'home',
) );

if ( publisher_get_header_style() !== 'disable' ) {

	// Shows breadcrumb
	if ( publisher_show_breadcrumb() ) {

		$bc_custom_class = 'bc-top-style';

		if ( $slider_config['show'] ) {
			$bc_custom_class .= ' bc-before-slider-' . $slider_config['style'];
		}

		Better_Framework()->breadcrumb()->generate( array(
			'before'       => '<div class="content-wrap"><div class="container bf-breadcrumb-container">',
			'after'        => '</div></div>',
			'custom_class' => $bc_custom_class
		) );

		$container_class .= ' layout-bc-before';

		if ( $slider_config['show'] && ! $slider_config['in-column'] ) {
			publisher_set_prop( 'home-slider-class', 'slider-bc-before' );
		}
	}

	// After header Ad
	publisher_show_ad_location( 'header_after', array(
			'container-class' => 'better-ads-after-header',
			'before'          => '<div class="container adcontainer">',
			'after'           => '</div>',
		)
	);
}

// Temp flag for making decision to show not found posts or not
$posts_printed = false;

// Show slider -> Not in columns
if ( $slider_config['show'] && ! $slider_config['in-column'] ) {
	$posts_printed = true; // flag
	publisher_get_view( 'home', 'slider' );
}

?>
<div class="content-wrap">
	<main <?php publisher_attr( 'content', '' ); ?>>

		<div class="<?php echo $container_class; ?>">
			<div class="main-section">
				<div class="content-column">
					<?php

					// Show slider -> In columns
					if ( $slider_config['show'] && $slider_config['in-column'] ) {
						$posts_printed = true; // flag
						publisher_get_view( 'home', 'slider' );
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


					} elseif ( ! $posts_printed ) {

						// Prints no result message
						// Location: "views/general/loop/_none-result.php"
						publisher_get_view( 'loop', '_none-result' );

					}

					// Clear all props
					publisher_clear_props();

					?>
				</div><!-- .content-column -->

			</div><!-- .main-section -->
		</div><!-- .layout-1-col -->

	</main><!-- main -->
</div><!-- .content-wrap -->
