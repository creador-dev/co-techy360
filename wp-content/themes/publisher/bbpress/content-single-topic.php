<?php
/**
 * Single Topic Content Part
 *
 * @author     BetterStudio
 * @package    bbPress
 * @subpackage Publisher
 * @version    1.8.4
 */

?>
<div id="bbpress-forums">
	<?php do_action( 'bbp_template_before_single_topic' );

	if ( post_password_required() ) {

		bbp_get_template_part( 'form', 'protected' );

	} else {

		bbp_topic_tag_list();

		if ( bbp_show_lead_topic() ) {

			bbp_get_template_part( 'content', 'single-topic-lead' );

		}

		if ( bbp_has_replies() ) :

			bbp_get_template_part( 'loop', 'replies' );

			bbp_get_template_part( 'pagination', 'replies' );

		endif;

		bbp_get_template_part( 'form', 'reply' );

	}

	do_action( 'bbp_template_after_single_topic' ); ?>
</div>