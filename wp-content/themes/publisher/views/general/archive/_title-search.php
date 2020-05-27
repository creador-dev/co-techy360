<?php
/**
 * Search result page title template
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    1.8.4
 */

if ( ! publisher_have_posts() ) {
	return;
}

?>
<div class="search-header">
	<?php

	get_search_form();

	$search = get_search_query();

	// Display found Categories
	if ( $terms = publisher_search_terms( $search ) ) {

		echo '<div class="found-categories">';
		echo '<span class="label"> ', publisher_translation_get( 'searched_cats' ), '</span>';

		echo '<ul>';
		foreach ( $terms as $_term ) {

			$link = get_term_link( $_term, 'category' );

			if ( ! is_wp_error( $link ) ) {

				echo '<li><a href="' . esc_url( $link ) . '" class="clean-button clean-button-light term-' . $_term->term_id . '">',
				'<i class="fa fa-folder-open" aria-hidden="true"></i>', $_term->name,
				'</a></li>';
			}
		}
		echo '</ul>';

		echo '</div>';
	}

	// Display found Tags
	if ( $terms = publisher_search_terms( $search, 'post_tag' ) ) {

		echo '<div class="found-tags">';
		echo '<span class="label"> ', publisher_translation_get( 'searched_tags' ) . '</span>';

		echo '<ul>';
		foreach ( $terms as $_term ) {

			$link = get_term_link( $_term, 'post_tag' );

			if ( ! is_wp_error( $link ) ) {

				echo '<li><a href="' . esc_url( $link ) . '" class="clean-button clean-button-light">',
				'<i class="fa fa-hashtag" aria-hidden="true"></i>', $_term->name,
				'</a></li>';
			}
		}
		echo '</ul>';

		echo '</div>';
	}

	?>
</div>
