<?php
/**
 * Simple recent posts widget
 *
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    1.9.0
 */
?>
<ul class="listing listing-widget listing-widget-simple">
	<?php while( publisher_have_posts() ): publisher_the_post(); ?>
		<li class="listing-item clearfix">
			<div <?php publisher_attr( 'post' ); ?>>
				<p class="title">
					<a href="<?php publisher_the_permalink(); ?>" class="post-url post-title">
						<?php publisher_echo_html_limit_words( publisher_get_the_title(), publisher_get_prop( 'title-limit', - 1 ) ); ?>
					</a>
				</p>
			</div>
		</li>
	<?php endwhile; ?>
</ul>
