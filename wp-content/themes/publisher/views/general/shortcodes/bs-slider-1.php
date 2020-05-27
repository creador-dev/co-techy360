<?php
/**
 * The template to show slider 1 shortcode
 *
 * [bs-slider-1] shortcode
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    2.0
 */

$atts = publisher_get_prop( 'bs-slider-1' );

// Slider ID
$slider_id = 'slider-' . mt_rand();


if ( empty( $atts['animation'] ) ) {
	$atts['animation'] = 'slide';
}

if ( empty( $atts['slideshow_speed'] ) ) {
	$atts['slideshow_speed'] = 7000;
}

if ( empty( $atts['animation_speed'] ) ) {
	$atts['animation_speed'] = 600;
}

$heading_tag     = publisher_get_prop( 'item-heading-tag', 'h3' );
$sub_heading_tag = publisher_get_prop( 'item-sub-heading-tag', 'h5' );
$class           = '';

// Custom and Auto Generated CSS Codes
if ( ! empty( $atts['css-code'] ) ) {
	bf_add_css( $atts['css-code'], true, true );
}

?>
	<div class="bs-shortcode bs-slider bs-slider-1 clearfix <?php publisher_echo_prop( 'listing-class' ); ?>">

		<div class="better-slider" id="<?php echo esc_attr( $slider_id ); ?>"
		     data-slideshowSpeed="<?php echo esc_attr( $atts['slideshow_speed'] ); ?>"
		     data-animation="<?php echo esc_attr( $atts['animation'] ); ?>"
		     data-controlNav="<?php echo esc_attr( $atts['control_nav'] ); ?>"
		     data-animationSpeed="<?php echo esc_attr( $atts['animation_speed'] ); ?>">
			<ul class="slides">
				<?php

				publisher_set_prop( 'hide-meta-author-if-review', true ); // hide author to make space for reviews

				while( publisher_have_posts() ) {

					publisher_the_post();

					$subtitle = publisher_prop_is( 'show-subtitle', 1 );

					// Creates main term ID that used for custom category color style
					$main_term = publisher_get_post_primary_cat();
					if ( ! is_wp_error( $main_term ) && is_object( $main_term ) ) {
						$class = 'main-term-' . $main_term->term_id;
					} else {
						$class = 'main-term-none';
					}

					$img = publisher_get_thumbnail( publisher_get_prop_thumbnail_size( 'publisher-full' ) );

					if ( ! empty( $img ) ) {
						$class .= ' has-post-thumbnail';
					} else {
						$class .= ' has-not-post-thumbnail';
					}

					$permalink = get_permalink();

					?>
					<li class="slide bs-slider-item bs-slider-1-item <?php echo $class; ?>">
						<div class="item-content">

							<a class="img-cont" href="<?php echo $permalink; ?>"
							   style="background-image: url('<?php echo $img['src']; ?>')"></a>
							<?php

							if ( publisher_get_prop( 'show-term-badge', true ) ) {
								publisher_cats_badge_code( 1, '', false, true, 'floated' );
							}

							if ( publisher_get_prop( 'show-format-icon', true ) ) {
								publisher_format_icon();
							}

							?>
							<div class="content-container">
								<?php

								if ( $subtitle && publisher_prop_is( 'subtitle-location', 'before-title' ) ) {
									$subtitle = false;
									publisher_the_subtitle( '<' . $sub_heading_tag . ' class="post-subtitle">', '</' . $sub_heading_tag . '>', publisher_get_prop( 'subtitle-limit', 0 ) );
								}

								echo '<', $heading_tag, ' class="title">'; ?>
								<a class="post-url post-title" href="<?php echo $permalink; ?>">
									<?php publisher_echo_html_limit_words( get_the_title(), publisher_get_prop( 'title-limit', - 1 ) ); ?>
								</a>
								<?php echo '</', $heading_tag, '>';

								if ( $subtitle && publisher_prop_is( 'subtitle-location', 'before-meta' ) ) {
									$subtitle = false;
									publisher_the_subtitle( '<' . $sub_heading_tag . ' class="post-subtitle">', '</' . $sub_heading_tag . '>', publisher_get_prop( 'subtitle-limit', 0 ) );
								}

								if ( publisher_get_prop( 'show-meta', true ) ) {
									publisher_loop_meta();
								}

								if ( $subtitle && publisher_prop_is( 'subtitle-location', 'after-meta' ) ) {
									publisher_the_subtitle( '<' . $sub_heading_tag . ' class="post-subtitle">', '</' . $sub_heading_tag . '>', publisher_get_prop( 'subtitle-limit', 0 ) );
								}

								?>
							</div>
						</div>
					</li>
					<?php
				}

				?>
			</ul>
		</div>
	</div>
<?php

unset( $atts );
unset( $subtitle );
unset( $slider_id );
unset( $img );
unset( $main_term );
unset( $class );
unset( $permalink );
