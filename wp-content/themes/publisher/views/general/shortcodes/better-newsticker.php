<?php
/**
 * The template to show BetterNewsticker shortcode/widget
 *
 * [better-newsticker] shortcode
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    1.9.1
 */

$atts = publisher_get_prop( 'shortcode-better-newsticker' );

bf_shortcode_show_title( $atts ); // show title

// Custom and Auto Generated CSS Codes
if ( ! empty( $atts['css-code'] ) ) {
	bf_add_css( $atts['css-code'], true, true );
}

// Term class
$class = '';
if ( ! empty( $atts['cat'] ) ) {
	$class = 'term-' . $atts['cat'];
}

if ( ! empty( $atts['class'] ) ) {
	$class .= ' ' . $atts['class'];
}

if ( ! empty( $atts['css-class'] ) ) {
	$class .= ' ' . $atts['css-class'];
}

if ( ! empty( $atts['custom-css-class'] ) ) {
	$class .= ' ' . sanitize_html_class( $atts['custom-css-class'] );
}

if ( intval( $atts['count'] ) <= 0 || empty( $atts['count'] ) ) {
	$atts['count'] = 10;
}

$id = empty( $atts['custom-id'] ) ? 'newsticker-' . mt_rand() : sanitize_html_class( $atts['custom-id'] );

?>
	<div id="<?php echo $id; ?>" class="better-newsticker <?php echo $class; ?>"
	     data-speed="<?php echo intval( $atts['speed'] ) * 1000; ?>">
		<p class="heading "><?php echo $atts['ticker_text']; ?></p>
		<ul class="news-list">
			<?php

			$args = array(
				'posts_per_page' => $atts['count'],
				'post_type'      => 'post'
			);

			if ( ! empty( $atts['cat'] ) ) {
				$args['cat'] = $atts['cat'];
			}

			$query = new WP_Query( apply_filters( 'better-news-ticker/query/args', $args ) );

			if ( $query->have_posts() ) {
				while( $query->have_posts() ) {
					$query->the_post(); ?>
					<li><a class="limit-line" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
					<?php
				}
			} else { ?>
				<li class="limit-line"> ...</li>
			<?php } ?>
		</ul>
	</div>
<?php

unset( $query );
unset( $atts );
unset( $args );
unset( $id );
