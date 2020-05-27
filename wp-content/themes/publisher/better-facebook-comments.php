<?php
/**
 * better-facebook-comments.php
 *
 * Custom template file for our "Better Facebook Comments" plugin.
 *
 * @author    BetterStudio
 * @package   Publisher
 * @version   1.9.0
 */

?>
<section id="comments-template-<?php the_ID() ?>" class="comments-template comment-respond">

	<?php if ( ! publisher_get_global( 'multiple-comments', false ) ) { ?>
		<div class="section-heading <?php echo publisher_get_block_heading_class(); ?>"><span class="h-text"><?php publisher_translation_echo( 'comments' ); ?></span>
		</div>
	<?php } ?>

	<div id="comments" class="better-comments-area better-facebook-comments-area">
		<div id="respond">
			<div class="fb-comments" data-href="<?php the_permalink(); ?>"
			     data-numposts="<?php echo Better_Facebook_Comments::get_option( 'numposts' ); ?>"
			     data-colorscheme="<?php echo Better_Facebook_Comments::get_option( 'colorscheme' ); ?>"
			     data-order-by="<?php echo Better_Facebook_Comments::get_option( 'order_by' ); ?>" data-width="100%"
			     data-mobile="false"><?php echo Better_Facebook_Comments::get_option( 'text_loading' ); ?></div>

			<?php if ( bf_is_doing_ajax() ) { ?>
				<script>if (typeof FB != "undefined") FB.XFBML.parse();</script>
			<?php } ?>
		</div>
	</div>
</section>
