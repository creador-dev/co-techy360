<?php
/**
 * pingback and trackback comments template
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    1.9.0
 */
?>
<li <?php publisher_attr( 'comment' ); ?>>

	<div>
		<div class="comment-meta">
			<cite <?php publisher_attr( 'comment-author' ); ?>><?php comment_author_link(); ?></cite>
			<time <?php publisher_attr( 'comment-published' ); ?>><i
						class="fa  fa-calendar"></i> <?php echo sprintf( publisher_translation_get( 'readable_time_ago' ), human_time_diff( get_comment_time( 'U' ) ) ); ?>
			</time>
		</div><!-- .comment-meta -->

		<div <?php publisher_attr( 'comment-content' ); ?>>
			<?php comment_text(); ?>
		</div><!-- .comment-content -->

		<div class="comment-footer">
			<?php edit_comment_link( ' <i class="fa fa-edit"></i> ' . publisher_translation_get( 'comments_edit' ) ); ?>
		</div><!-- .comment-footer -->
	</div>

<?php /* No closing </li> is needed. */ ?>