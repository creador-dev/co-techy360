<?php
/**
 * Simple comment template
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    1.9.0
 */
?>
<li <?php publisher_attr( 'comment', 'clearfix' ); ?>>

	<div class="clearfix">

		<div class="comment-avatar">
			<?php echo get_avatar( $comment, 60 ); // escaped before ?>
		</div><!-- .comment-avatar -->

		<div class="comment-meta">
			<cite <?php publisher_attr( 'comment-author' ); ?>><?php comment_author_link(); ?> <span
						class="says"><?php publisher_translation_echo( 'comment_says' ); ?></span></cite>
			<time <?php publisher_attr( 'comment-published' ); ?>><i
						class="fa fa-calendar"></i> <?php echo sprintf( publisher_translation_get( 'readable_time_ago' ), human_time_diff( get_comment_date( 'U' ) ) );  // escaped before?>
			</time>
		</div><!-- .comment-meta -->

		<div <?php publisher_attr( 'comment-content' ); ?>>
			<?php

			if ( $comment->comment_approved == '0' ) {
				?>
				<em class="needs-approve"><?php publisher_translation_echo( 'comment_moderation' ); ?></em>
				<?php
			}

			comment_text(); ?>
		</div><!-- .comment-content -->

		<div class="comment-footer clearfix">
			<?php edit_comment_link( ' <i class="fa fa-edit"></i> ' . publisher_translation_get( 'comments_edit' ) ); ?>
			<?php publisher_echo_comment_reply_link(); ?>
		</div><!-- .comment-footer -->

	</div>

<?php /* No closing </li> is needed. */ ?>