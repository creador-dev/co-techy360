<?php
/**
 * Authors title template
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    7.1.0
 */

$author     = bf_get_author_archive_user();
$links_args = array(
	'list_start' => '',
);

/**
 * Filter the author bio avatar size.
 *
 * @since 'publisher- 1.0
 *
 * @param int $size The avatar height and width size in pixels.
 */
$avatar_size = apply_filters( 'publisher/author-archive/avatar-size', 100 );


if ( publisher_get_option( 'author_archive_show_posts_count' ) != 'hide' ) {
	$links_args['list_start'] .= '<li class="social-item posts-count"><span>' . str_replace( '%s', count_user_posts( $author->ID ), publisher_translation_get( 'author_posts_count' ) ) . '</span></li>';
}

?>
<section <?php publisher_attr( 'author', 'author-profile clearfix' ); ?>>

	<h3 class="section-heading <?php echo publisher_get_block_heading_class(); ?>">
		<span class="h-text"><?php publisher_translation_echo( 'author' ); ?></span>
	</h3>

	<div <?php publisher_attr( 'author-avatar' ); ?>>
		<?php echo isset( $author->ID ) ? get_avatar( $author->ID, $avatar_size ) : ''; // escaped before ?>
	</div>

	<h1 class="author-title">
		<span <?php publisher_attr( 'author-name' ); ?>><?php echo isset( $author->display_name ) ? esc_html( $author->display_name ) : ''; ?></span>

		<?php if ( publisher_get_option( 'author_posts' ) == 'show' ) { ?>
			<span class="title-counts"><?php echo sprintf( publisher_translation_get( 'author_posts_count' ), count_user_posts( $author->ID ) ) ?></span>
		<?php } ?>

		<?php if ( publisher_get_option( 'author_comments' ) == 'show' ) {

			global $wpdb;

			$comment_count = $wpdb->get_var( $wpdb->prepare( "SELECT COUNT(*) AS total FROM $wpdb->comments WHERE comment_approved = 1 AND user_id = %d", $author->ID ) );

			?>
			<span class="title-counts"><?php echo sprintf( publisher_translation_get( 'author_comments_count' ), $comment_count ) ?></span>
		<?php } ?>
	</h1>

	<div class="author-links">
		<?php publisher_the_author_social_icons( $author, $links_args ); ?>
	</div>

	<?php if ( isset( $author->ID ) && get_the_author_meta( 'description', $author->ID ) != '' ) { ?>
		<div <?php publisher_attr( 'author-bio' ); ?>>
			<?php echo wpautop( get_the_author_meta( 'description', $author->ID ) ); // escaped before ?>
		</div>
	<?php } ?>

</section>
