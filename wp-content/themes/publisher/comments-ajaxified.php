<?php
/**
 * comments-ajaxified.php
 *
 * The template for displaying ajaxified comments.
 *
 * Content of each comment will be output with the type of comment.
 * You can view and/or edit the comment file in "views/general/comments"
 *
 * @author    BetterStudio
 * @package   Publisher
 * @version   1.8.4
 */

/* If a post password is required or comments is close, return. */
if ( post_password_required() || ! comments_open() ) {
	return;
}

?>
<?php
if ( ! bf_is_doing_ajax() ) {
	echo '<div id="respond">';
}
?>
	<section class="comments-template ajaxified-comments-container">
		<a href="#" class="comment-ajaxified-placeholder" data-comment-post-id="<?php the_ID() ?>">
			<i class="fa fa-comments"></i> <?php

			// Comments Number
			$num_comments = get_comments_number();

			if ( $num_comments <= 0 ) {
				publisher_translation_echo( 'comment_show_comment' );
			} else {
				printf( publisher_translation_get( 'comment_show_comments' ), $num_comments );
			}

			?>
		</a>
	</section>

<?php
if ( ! bf_is_doing_ajax() ) {
	echo '</div>';
}
?>