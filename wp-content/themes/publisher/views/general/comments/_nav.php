<?php
/**
 * Comments navigation template
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    1.8.4
 */

// Check for paged comments.
if ( ! get_option( 'page_comments' ) && 1 >= get_comment_pages_count() ) {
	return;
}

// Nav texts with RTL support
if ( is_rtl() ) {
	$prev = '<i class="fa fa-angle-double-right"></i> ' . publisher_translation_get( 'comment_previous' );
	$next = publisher_translation_get( 'comment_next' ) . ' <i class="fa fa-angle-double-left"></i>';
} else {
	$next = publisher_translation_get( 'comment_next' ) . ' <i class="fa fa-angle-double-right"></i>';
	$prev = '<i class="fa fa-angle-double-left"></i> ' . publisher_translation_get( 'comment_previous' );
}

?>
<div class="comments-nav">
	<div class="pagination bs-links-pagination clearfix">

		<?php previous_comments_link( $prev ); ?>

		<?php next_comments_link( $next ); ?>

		<span class="page-numbers">
			<?php printf( publisher_translation_get( 'comment_page_numbers' ), get_query_var( 'cpage' ) ? absint( get_query_var( 'cpage' ) ) : 1, get_comment_pages_count() ); ?>
		</span>

	</div><!-- .comments-nav-wrap -->
</div><!-- .comments-nav -->
