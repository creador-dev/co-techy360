<?php
/**
 * Single Forum Content Part
 *
 * @author     BetterStudio
 * @package    bbPress
 * @subpackage Publisher
 * @version    1.8.4
 */

?>
<div id="bbpress-forums">
	<?php do_action( 'bbp_template_before_single_forum' );

	if ( post_password_required() ) {

		bbp_get_template_part( 'form', 'protected' );

	} else { ?>
		<div class="the-content"><p class="forum-description"><?php bbp_forum_content(); ?></p></div>
		<?php bbp_forum_subscription_link();

		if ( bbp_has_forums() ) {

			bbp_get_template_part( 'loop', 'forums' );

		}

		if ( ! bbp_is_forum_category() && bbp_has_topics() ) {

			bbp_get_template_part( 'loop', 'topics' );

			bbp_get_template_part( 'pagination', 'topics' );

			bbp_get_template_part( 'form', 'topic' );

		} elseif ( ! bbp_is_forum_category() ) {

			bbp_get_template_part( 'feedback', 'no-topics' );

			bbp_get_template_part( 'form', 'topic' );

		}

	}
	do_action( 'bbp_template_after_single_forum' ); ?>
</div>