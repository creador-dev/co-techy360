<?php
/**
 * Search Loop - Single Reply
 *
 * @author     BetterStudio
 * @package    bbPress
 * @subpackage Publisher
 * @version    1.8.4
 */

?>
<div <?php bbp_reply_class(); ?>>

	<div class="bbp-reply-author">

		<?php do_action( 'bbp_theme_before_reply_author_details' ); ?>

		<?php bbp_reply_author_link( array( 'type' => 'avatar', 'sep' => '<br />', 'show_role' => true ) ); ?>

		<?php if ( bbp_is_user_keymaster() ) : ?>

			<?php do_action( 'bbp_theme_before_reply_author_admin_details' ); ?>

			<div class="bbp-reply-ip"><?php bbp_author_ip( bbp_get_reply_id() ); ?></div>

			<?php do_action( 'bbp_theme_after_reply_author_admin_details' ); ?>

		<?php endif; ?>

		<?php do_action( 'bbp_theme_after_reply_author_details' ); ?>

	</div><!-- .bbp-reply-author -->

	<div class="bbp-reply-content">

		<div class="reply-meta">
			<span class="bbp-reply-post-author"><?php bbp_reply_author_link( array( 'type' => 'name' ) ); ?></span>
			<span
				class="bbp-reply-post-date"><?php publisher_translation_echo( 'bbp_on' ); ?><?php bbp_reply_post_date(); ?></span>
			<a href="<?php bbp_reply_url(); ?>" class="bbp-reply-permalink">#<?php bbp_reply_id(); ?></a>
		</div>

		<?php do_action( 'bbp_theme_before_reply_content' ); ?>

		<?php bbp_reply_content(); ?>

		<?php do_action( 'bbp_theme_after_reply_content' ); ?>

	</div><!-- .bbp-reply-content -->

</div><!-- .reply -->


<div id="post-<?php bbp_reply_id(); ?>" class="bbp-reply-header">

	<div class="bbp-meta">

		<?php if ( bbp_is_single_user_replies() ) : ?>

			<span class="bbp-header">
				<?php echo publisher_translation_get( 'bbp_in_reply_to' ) . ' '; ?>
				<a class="bbp-topic-permalink"
				   href="<?php bbp_topic_permalink( bbp_get_reply_topic_id() ); ?>"><?php bbp_topic_title( bbp_get_reply_topic_id() ); ?></a>
			</span>

		<?php endif; ?>

		<?php do_action( 'bbp_theme_before_reply_admin_links' ); ?>

		<?php bbp_reply_admin_links(); ?>

		<?php do_action( 'bbp_theme_after_reply_admin_links' ); ?>

	</div><!-- .bbp-meta -->

</div><!-- #post-<?php bbp_reply_id(); ?> -->