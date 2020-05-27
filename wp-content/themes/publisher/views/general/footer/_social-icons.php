<?php
/**
 * Footer social icons template
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    1.8.4
 */

// active footer icons
$icons = publisher_get_option( 'footer_social_sites' );

// make string for shortcode
if ( is_array( $icons ) ) {
	$_icons = array();

	foreach ( (array) $icons as $icon_key => $icon ) {
		if ( $icon ) {
			$_icons[ $icon_key ] = $icon_key;
		}
	}

	$icons = implode( ',', $_icons );
}


?>
<div class="footer-social-icons">
	<div class="content-wrap">
		<div class="container">
			<?php echo do_shortcode( "[better-social-counter show_title='0' style='big-button' columns='5' colored='1' order='{$icons}']" ); // escaped before ?>
		</div>
	</div>
</div>
