<?php
/**
 * Replies Loop
 *
 * @author     BetterStudio
 * @package    bbPress
 * @subpackage Publisher
 * @version    1.8.4
 */

do_action( 'bbp_template_before_replies_loop' ); ?>

	<ul id="topic-<?php bbp_topic_id(); ?>-replies" class="forums bbp-replies">

		<li class="bbp-header">

			<p class="posted-in"><?php publisher_translation_echo( 'bbp_posted_in' ); ?>
				<a href="<?php bbp_forum_permalink(); ?>"><?php bbp_forum_title(); ?></a>
			</p>

			<div class="bbp-reply-content">

				<?php if ( ! bbp_show_lead_topic() ) : ?>

					<?php bbp_topic_subscription_link(); ?>

					<?php bbp_user_favorites_link(); ?>

				<?php endif; ?>

			</div><!-- .bbp-reply-content -->

		</li><!-- .bbp-header -->

		<li class="bbp-body">

			<?php if ( bbp_thread_replies() ) : ?>

				<?php bbp_list_replies(); ?>

			<?php else : ?>

				<?php while( bbp_replies() ) : bbp_the_reply(); ?>

					<?php bbp_get_template_part( 'loop', 'single-reply' ); ?>

				<?php endwhile; ?>

			<?php endif; ?>

		</li><!-- .bbp-body -->

	</ul><!-- #topic-<?php bbp_topic_id(); ?>-replies -->

<?php do_action( 'bbp_template_after_replies_loop' ); ?>