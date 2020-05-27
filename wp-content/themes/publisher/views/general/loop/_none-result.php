<?php
/**
 * The template part for displaying a message that posts cannot be found
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    1.8.4
 */
?>
<section class="no-results clearfix">

	<h2 class="title">
		<span <?php publisher_attr( 'post-title' ); ?>><?php publisher_translation_echo( 'no_res_nothing_found' ); ?></span>
	</h2>

	<div <?php publisher_attr( 'post-lead' ); ?>>

		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) { ?>

			<p><?php printf( publisher_translation_echo( 'no_res_publish_first' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php } elseif ( is_search() ) { ?>

			<p><?php publisher_translation_echo( 'no_res_search_nothing' ); ?></p>
			<?php get_search_form(); ?>

		<?php } else { ?>

			<p><?php publisher_translation_echo( 'no_res_message' ); ?></p>
			<?php get_search_form(); ?>

		<?php } ?>
	</div><!-- .post-summary -->

</section><!-- .no-results -->
