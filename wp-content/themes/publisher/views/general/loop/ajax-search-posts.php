<?php
/**
 * Ajax search posts
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    7.0.0
 */

if ( publisher_have_posts() ) {

	publisher_get_view( 'loop', 'listing-thumbnail-1' );

	if ( publisher_get_prop( 'show-more-link', true ) ) {

		?>
		<a href="<?php echo esc_url( add_query_arg( array( 's' => $_REQUEST['s'] ), site_url( '/' ) ) ) ?>"
		   class="clean-button ajax-search-button">
			<?php publisher_translation_echo( 'more_posts' );
			?>
		</a>
		<?php

	}

} else {

	?>
	<div class="align-vertical-center search-404">
		<?php
		publisher_translation_echo( 'search_not_found' );
		?>
	</div>
	<?php

}

