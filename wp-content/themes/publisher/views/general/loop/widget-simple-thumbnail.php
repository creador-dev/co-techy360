<?php
/**
 * Simple recent posts widget + thumbnail
 *
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    1.9.0
 */
?>
	<ul class="listing listing-widget listing-widget-thumbnail listing-widget-simple-thumbnail">
		<?php

		$thumbnail_size = publisher_get_prop_thumbnail_size( 'thumbnail' );

		while( publisher_have_posts() ): publisher_the_post(); ?>
			<li class="listing-item clearfix">
				<div <?php publisher_attr( 'post' ); ?>>
					<?php

					$thumbnail = publisher_get_thumbnail( $thumbnail_size, get_the_ID(), false );

					if ( ! empty( $thumbnail['src'] ) ) { ?>
						<a <?php publisher_the_thumbnail_attr( $thumbnail ); ?>
								class="img-holder" href="<?php publisher_the_permalink(); ?>"></a>
					<?php } ?>
					<p class="title">
						<a href="<?php publisher_the_permalink(); ?>" class="post-title post-url">
							<?php publisher_echo_html_limit_words( publisher_get_the_title(), 55 ); ?>
						</a>
					</p>
				</div>
			</li>
		<?php endwhile; ?>
	</ul>
<?php

unset( $thumbnail_size );
unset( $thumbnail );
