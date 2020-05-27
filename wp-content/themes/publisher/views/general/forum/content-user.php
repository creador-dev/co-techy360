<?php
/**
 * The template for displaying forum user profile.
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    1.8.4
 */

the_post();

?>
<div class="single-container">
	<article <?php publisher_attr( 'post', 'single-forum-content' ); ?>>

		<div id="bbp-user-<?php bbp_current_user_id(); ?>" class="bbp-single-user">
			<div <?php publisher_attr( 'post-content', 'clearfix' ); ?>>

				<?php bbp_get_template_part( 'content', 'single-user' ); ?>

			</div><!-- .entry-content -->
		</div><!-- #bbp-user-<?php bbp_current_user_id(); ?> -->


	</article><!-- .single-forum-content -->
</div>