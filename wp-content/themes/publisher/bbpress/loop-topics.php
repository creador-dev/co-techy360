<?php
/**
 * Topics Loop
 *
 * @author     BetterStudio
 * @package    bbPress
 * @subpackage Publisher
 * @version    1.8.4
 */

do_action( 'bbp_template_before_topics_loop' );

?>
	<ul id="bbp-forum-<?php bbp_forum_id(); ?>" class="bbp-topics">

		<li class="bbp-body">

			<div class="category-forum">
				<ul>
					<li class="bbp-header">

						<ul class="forum-titles forum-topics-list">
							<li class="bbp-topic-title"><?php publisher_translation_echo( 'bbp_topics_freshness' ); ?></li>
							<li class="bbp-topic-reply-posts-count"><?php publisher_translation_echo( 'bbp_voices' ); ?>
								/ <?php bbp_show_lead_topic() ? publisher_translation_echo( 'bbp_replies' ) : publisher_translation_echo( 'bbp_posts' ); ?></li>
						</ul>

					</li>
				</ul>
			</div>
			<?php while( bbp_topics() ) : bbp_the_topic(); ?>

				<?php bbp_get_template_part( 'loop', 'single-topic' ); ?>

			<?php endwhile; ?>

		</li>

	</ul>

<?php do_action( 'bbp_template_after_topics_loop' ); ?>