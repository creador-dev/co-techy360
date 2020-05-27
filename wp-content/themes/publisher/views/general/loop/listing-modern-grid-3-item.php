<?php
/**
 * Grid listing item template
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    1.9.0
 */

$thumbnail       = publisher_get_thumbnail();
$section_tag     = publisher_get_prop( 'item-tag', 'article' ) . ' ';
$heading_tag     = publisher_get_prop( 'item-heading-tag', 'h2' );
$sub_heading_tag = publisher_get_prop( 'item-sub-heading-tag', 'h3' );
$columns         = publisher_get_prop( 'listing-columns', 1 );

// Creates main term ID that used for custom category color style
$main_term = publisher_get_post_primary_cat();
if ( ! is_wp_error( $main_term ) && is_object( $main_term ) ) {
	$class = 'main-term-' . $main_term->term_id;
} else {
	$class = 'main-term-none';
}

// item width rounded for 50
if ( publisher_get_prop( 'calc-item-width', 1 ) ) {
	$class .= ' bsw-' . ceil( publisher_get_block_size( 50, 'down' ) / $columns / 50 ) * 50;
}

?>
	<<?php echo $section_tag; ?><?php publisher_attr( 'post', publisher_get_prop_class() . ' listing-item listing-mg-item listing-mg-3-item ' . $class ) ?>>
	<div class="item-content">
		<a <?php publisher_the_thumbnail_attr( publisher_get_prop_thumbnail_size( 'publisher-lg' ) ) ?>
				class="img-cont<?php if ( empty( $thumbnail['src'] ) )
					echo ' img-content-ni' ?>" href="<?php publisher_the_permalink(); ?>"></a>
		<?php

		if ( publisher_get_prop( 'show-format-icon', true ) ) {
			publisher_format_icon();
		}

		?>
		<div class="content-container">
			<?php

			if ( publisher_get_prop( 'show-term-badge', true ) ) {
				publisher_cats_badge_code( publisher_get_prop( 'term-badge-count', 1 ), '', false, true, 'floated' );
			}

			echo '<', $heading_tag, ' class="title">'; ?>
			<a href="<?php publisher_the_permalink(); ?>" class="post-title post-url">
				<?php publisher_echo_html_limit_words( publisher_get_the_title(), publisher_get_prop( 'title-limit', - 1 ) ); ?>
			</a>
			<?php echo '</', $heading_tag, '>';

			if ( publisher_get_prop( 'show-meta', true ) ) {
				publisher_loop_meta();
			}

			?>
		</div>
	</div>
	</<?php echo $section_tag; ?>>
<?php

$main_term = NULL;
$class     = NULL;
