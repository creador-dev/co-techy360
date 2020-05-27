<?php
/**
 * better-disqus-comments.php
 *
 * Custom template file for our "Better Disqus Comments" plugin.
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

	<div id="comments" class="better-comments-area better-disqus-comments-area">

		<div id="disqus_thread" data-post-id="<?php the_ID() ?>"></div>

		<noscript><?php _e( 'Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a>', 'publisher' ); ?></noscript>

	</div>
</section>
