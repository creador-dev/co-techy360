<?php
/**
 * Search Loop - Single Forum
 *
 * @author     BetterStudio
 * @package    bbPress
 * @subpackage Publisher
 * @version    1.8.4
 */

?>
<ul id="bbp-forum-<?php bbp_forum_id(); ?>" <?php bbp_forum_class(); ?>>

	<li class="bbp-forum-info single-forum-info">

		<?php if ( bbp_is_user_home() && bbp_is_subscriptions() ) : ?>

			<span class="bbp-row-actions">

				<?php do_action( 'bbp_theme_before_forum_subscription_action' ); ?>

				<?php bbp_forum_subscription_link( array(
					'before'      => '',
					'subscribe'   => '+',
					'unsubscribe' => '&times;'
				) ); ?>

				<?php do_action( 'bbp_theme_after_forum_subscription_action' ); ?>

			</span>

		<?php endif; ?>

		<?php do_action( 'bbp_theme_before_forum_title' ); ?>

		<a class="bbp-forum-title" href="<?php bbp_forum_permalink(); ?>"><?php bbp_forum_title(); ?></a>

		<?php do_action( 'bbp_theme_after_forum_title' ); ?>

		<?php do_action( 'bbp_theme_before_forum_description' ); ?>

		<div class="bbp-forum-content"><?php bbp_forum_content(); ?></div>

		<?php do_action( 'bbp_theme_after_forum_description' ); ?>

		<?php do_action( 'bbp_theme_before_forum_sub_forums' ); ?>

		<?php bbp_list_forums(); ?>

		<?php do_action( 'bbp_theme_after_forum_sub_forums' ); ?>

		<?php bbp_forum_row_actions(); ?>

	</li>

	<li class="bbp-forum-topic-reply-count"><span
			class="count"><?php bbp_forum_topic_count(); ?></span> <?php publisher_translation_echo( 'bbp_topics' ); ?>
		<br>
		<?php echo bbp_show_lead_topic() ? '<span class="count">' . bbp_get_forum_reply_count() . '</span> ' . publisher_translation_get( 'bbp_replies' ) : '<span class="count">' . bbp_get_forum_post_count() . '</span> ' . publisher_translation_get( 'Posts' ); ?>
	</li>

	<li class="bbp-forum-freshness">

		<p class="bbp-topic-meta clearfix">

			<?php do_action( 'bbp_theme_before_topic_author' ); ?>

			<span class="bbp-topic-freshness-author"><?php echo bbp_get_author_link( array(
					'post_id' => bbp_get_forum_last_active_id(),
					'size'    => 60
				) ) ? publisher_translation_get( 'bbp_by' ) . ' ' . bbp_get_author_link( array(
						'post_id' => bbp_get_forum_last_active_id(),
						'size'    => 60
					) ) : ''; ?></span>

			<?php do_action( 'bbp_theme_after_topic_author' ); ?>

			<?php do_action( 'bbp_theme_before_forum_freshness_link' ); ?>

			<span class="freshness_link"><?php bbp_forum_freshness_link(); ?></span>

			<?php do_action( 'bbp_theme_after_forum_freshness_link' ); ?>

		</p>
	</li>

</ul><!-- #bbp-forum-<?php bbp_forum_id(); ?> -->