<?php
/**
 * Ajax search products
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    1.8.4
 */

if ( publisher_have_posts() ) {
	$shortcode = sprintf( '[bs-products-1 columns=%d]', publisher_get_prop( 'posts-count' ) );

	echo do_shortcode( $shortcode );

	if ( publisher_get_prop( 'show-more-link', true ) ) :

		?>
		<a href="<?php echo esc_attr( add_query_arg(
			'filter',
			'products',
			get_search_link()
		) ) ?>" class="clean-button ajax-search-button">
			<?php publisher_translation_echo( 'more_products' );
			?>
		</a>
		<?php
	endif;
} else {
	?>
	<div class="align-vertical-center search-404">
		<?php
		publisher_translation_echo( 'search_not_found' );
		?>
	</div>
	<?php
}
?>