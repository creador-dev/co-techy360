<?php
/**
 * Meta for loops (readable time)
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    1.8.4
 */
?>
<div <?php publisher_attr( 'post-meta' ); ?>>

	<a href="<?php echo esc_url( publisher_get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"
	   title="<?php echo publisher_translation_esc_attr( 'browse_auth_articles' ); ?>">
		<i <?php publisher_attr( 'post-meta-author', 'author' ); ?>>
			<?php the_author(); ?>
		</i>
	</a>

	<span class="time"><time <?php publisher_attr( 'post-meta-published' ); ?>><?php echo publisher_get_readable_date(); ?></time></span>
	<?php

	// Comments link
	if ( publisher_get_prop( 'meta-show-comments', true ) && comments_open() ) {

		$title  = apply_filters( 'better-studio/theme/meta/comments/title', publisher_get_the_title() );
		$link   = apply_filters( 'better-studio/theme/meta/comments/link', publisher_get_comments_link() );
		$number = apply_filters( 'better-studio/theme/meta/comments/number', publisher_get_comments_number() );

		$text = apply_filters( 'better-studio/themes/meta/comments/text', $number );

		echo sprintf( '<a href="%1$s" title="%2$s" ' . publisher_get_attr( 'post-meta-comments' ) . '>%3$s</a>',
			esc_url( $link ),
			esc_attr( sprintf( publisher_translation_get( 'leave_comment_on' ), $title ) ),
			$text
		);

		?>
		<?php
	}

	?>
</div>
