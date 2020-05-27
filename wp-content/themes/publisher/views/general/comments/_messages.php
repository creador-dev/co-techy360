<?php
/**
 * Handy file to show comments section messages
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    1.8.4
 */

if ( pings_open() && ! comments_open() ): ?>

	<p class="comments-closed pings-open">
		<?php printf( publisher_translation_get( 'comment_closed_tra_open' ), '<a href="' . esc_url( get_trackback_url() ) . '">', '</a>' ); ?>
	</p><!-- .comments-closed .pings-open -->

<?php elseif ( ! comments_open() ) : ?>

	<p class="comments-closed">
		<?php publisher_translation_echo( 'comment_closed' ); ?>
	</p><!-- .comments-closed -->

<?php endif; ?>
