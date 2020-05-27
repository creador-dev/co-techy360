<?php
/**
 * Custom content from pages in menu
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    2.0.0
 */

// get all args
$args = publisher_get_prop( 'mega-menu-args', array() );

$page_id = isset( $args['current-item']->custom_menu_page_content ) ? $args['current-item']->custom_menu_page_content : NULL;

$content = '';

if ( ! $page_id ) {
	if ( bf_is_user_logged_in() ) {
		$content = '<span>' . __( 'Please select a page for "Page Builder Mega Menu" in Appearance -> Menu.', 'publisher' ) . '</span>';
	}

} else {

	// get selected page content 
	if ( $page = get_post( $page_id ) ) {
		publisher_set_menu_pagebuilder_status( true );
		$content = do_shortcode( $page->post_content );
		publisher_set_menu_pagebuilder_status( false );
	}
}

?>
	<div class="mega-menu mega-type-page-builder">
		<?php echo $content; // escaped before ?>
	</div>
<?php

publisher_clear_props();
