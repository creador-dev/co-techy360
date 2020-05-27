<?php
/**
 * The template for displaying topics content
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    1.9.0
 */

the_post();

?>
<div class="single-container">
	<article <?php publisher_attr( 'post', 'single-topic-content' ); ?>>
		<h1 class="section-heading forum-section-heading <?php echo publisher_get_block_heading_class(); ?>">
			<span <?php publisher_attr( 'post-title', 'h-text' ); ?>><?php the_title(); ?></span></h1>

		<div <?php publisher_attr( 'post-content', 'clearfix' ); ?>>
			<?php publisher_the_content(); ?>
		</div>

	</article>
</div>
