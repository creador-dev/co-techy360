<?php
/**
 * Prints branding information's of site
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    5.3.0
 */

$site_name = publisher_get_option( 'logo_text' );
if ( empty( $site_name ) ) {
	$site_name = get_bloginfo( 'name' );
}                   // Site name
$site_name = do_shortcode( $site_name );

$logo   = '';
$logo2x = '';

// Custom logo for categories
if ( is_category() && bf_get_term_meta( 'logo_image' ) != '' ) {
	$logo   = bf_get_term_meta( 'logo_image' );
	$logo2x = bf_get_term_meta( 'logo_image_retina' );
} // Custom logo for categories
elseif ( is_singular() ) {

	$logo   = bf_get_post_meta( 'logo_image' );
	$logo2x = bf_get_post_meta( 'logo_image_retina' );

	// not customized in post but in parent category
	if ( empty( $logo ) && is_singular( 'post' ) ) {

		$main_term = publisher_get_post_primary_cat();

		if ( ! is_wp_error( $main_term ) && is_object( $main_term ) && bf_get_term_meta( 'override_in_posts', $main_term ) ) {
			$logo   = bf_get_term_meta( 'logo_image', $main_term );
			$logo2x = bf_get_term_meta( 'logo_image_retina', $main_term );
		}
	}
}

// Site general logo
if ( ! $logo ) {
	$logo   = publisher_get_option( 'logo_image' );        // Site logo
	$logo2x = publisher_get_option( 'logo_image_retina' ); // Site 2X logo
}

// Make it retina friendly
if ( $logo2x != '' ) {
	$logo2x = ' data-bsrjs="' . esc_url( $logo2x ) . '" ';
}


// SEO improvement
// Use H1 for home
// Use H1 for front page created by VC
// Use H1 for front pages that was not created by VC and the Title Hiding feature is enable
{
	$tag = 'p';

	if ( is_home() ) {
		$tag = 'h1';
	} elseif ( is_front_page() ) {

		$use_page_builder = publisher_is_pagebuilder_used( get_the_ID() );

		if ( $use_page_builder ) {
			$tag = 'h1';
		} elseif ( bf_get_post_meta( '_hide_title' ) ) {
			$tag = 'h1';
		}
	}
}

?>
<div id="site-branding" class="site-branding">
	<<?php echo $tag, ' '; ?> id="site-title" class="logo h1 <?php echo empty( $logo ) ? 'text-logo' : 'img-logo'; ?>">
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" <?php publisher_attr( 'site-url' ); ?>>
		<?php

		// Site logo
		if ( ! empty( $logo ) ) { ?>
			<img id="site-logo" src="<?php echo esc_url( $logo ); ?>"
			     alt="<?php echo esc_attr( $site_name ); ?>" <?php echo $logo2x; // escaped before ?> />

			<span class="site-title"><?php echo $site_name, ' - ', get_bloginfo( 'description' ); ?></span>
			<?php
		} // Site title as text logo
		else {
			echo $site_name; // escaped before in WP
		}

		?>
	</a>
</<?php echo $tag; ?>>
</div><!-- .site-branding -->
