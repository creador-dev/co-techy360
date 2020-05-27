<?php
/**
 * Meta for loop without a tag
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    1.8.4
 */
?>
<div <?php publisher_attr( 'post-meta' ); ?>>

	<span <?php publisher_attr( 'author-avatar' ); ?> >
		<?php echo get_avatar( get_the_author_meta( 'ID' ), 20 ); ?>
		<i <?php publisher_attr( 'post-meta-author', 'author' ); ?>>
			<?php the_author(); ?>
		</i>
	</span>

	<span class="time"><time <?php publisher_attr( 'post-meta-published' ); ?>><?php the_time( publisher_translation_get( 'comment_time' ) ); ?></time></span>

	<?php

	// Comments link
	if ( comments_open() ) {

		$title  = apply_filters( 'better-studio/theme/meta/comments/title', publisher_get_the_title() );
		$link   = apply_filters( 'better-studio/theme/meta/comments/link', publisher_get_comments_link() );
		$number = apply_filters( 'better-studio/theme/meta/comments/number', publisher_get_comments_number() );
		$text   = apply_filters( 'better-studio/themes/meta/comments/text', $number );

		echo sprintf( '<span title="%1$s" ' . publisher_get_attr( 'post-meta-comments' ) . '>%2$s</span>',
			esc_attr( sprintf( publisher_translation_get( 'leave_comment_on' ), $title ) ),
			$text
		);

		?>
		<?php
	}

	?>
</div><!-- post-meta -->
