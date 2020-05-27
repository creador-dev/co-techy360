<?php
/**
 * Next Prev posts
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    1.8.4
 */

$prev = get_previous_post_link( '%link' );
$next = get_next_post_link( '%link' );
$rtl  = is_rtl();

// If post type only have 1 post
if ( empty( $prev ) && empty( $next ) ) {
	return;
}

?>
	<section class="next-prev-post clearfix">

		<?php if ( ! empty( $prev ) ) { ?>
			<div class="prev-post">
				<p class="pre-title heading-typo"><i
							class="fa fa-arrow-<?php echo $rtl ? 'right' : 'left'; ?>"></i> <?php publisher_translation_echo( 'post_prev_post' ); ?>
				</p>
				<p class="title heading-typo"><?php echo get_previous_post_link( '%link' ); ?></p>
			</div>
		<?php } ?>

		<?php if ( ! empty( $next ) ) { ?>
			<div class="next-post">
				<p class="pre-title heading-typo"><?php publisher_translation_echo( 'post_next_post' ); ?> <i
							class="fa fa-arrow-<?php echo $rtl ? 'left' : 'right'; ?>"></i></p>
				<p class="title heading-typo"><?php echo get_next_post_link( '%link' ); ?></p>
			</div>
		<?php } ?>

	</section>
<?php

unset( $prev );
unset( $next );
unset( $rtl );
