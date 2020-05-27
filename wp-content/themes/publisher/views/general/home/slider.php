<?php
/**
 * The man code to print sliders.
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    1.8.4
 */

// Get slider params
$slider_config = publisher_main_slider_config( array(
	'type' => 'home',
) );

if ( ! $slider_config['show'] ) {
	return;
}

$class = array(
	'slider-container clearfix',
	'slider-type-' . $slider_config['type'],
	publisher_get_prop( 'home-slider-class', '' ),
);

switch ( $slider_config['type'] ) {

	case 'disable':
		return;
		break;

	case 'custom-blocks':
		$class[] = 'slider-' . $slider_config['style'] . '-container';
		$class[] = 'slider-overlay-' . $slider_config['overlay'];

		$query_args = array(
			'posts_per_page'      => $slider_config['posts'],
			'ignore_sticky_posts' => true,
		);

		if ( publisher_get_option( 'home_top_posts_query' ) === 'default' ) {

			// Home exclude category filters
			if ( publisher_get_option( 'home_cat_include' ) != '' ) {
				$query_args['cat'] = publisher_get_option( 'home_cat_include' );
			}

			// Home category filters
			if ( publisher_get_option( 'home_cat_exclude' ) != '' ) {
				$query_args['category__not_in'] = publisher_get_option( 'home_cat_exclude' );
			}

			// Home tag filters
			if ( publisher_get_option( 'home_tag_include' ) != '' ) {
				$query_args['tag__in'] = publisher_get_option( 'home_tag_include' );
			}

			// Home post type
			if ( publisher_get_option( 'home_custom_post_type' ) != '' ) {
				$query_args['post_type'] = explode( ',', publisher_get_option( 'home_custom_post_type' ) );
			}

		} else {

			// Home exclude category filters
			if ( publisher_get_option( 'home_slider_cat_include' ) != '' ) {
				$query_args['cat'] = publisher_get_option( 'home_slider_cat_include' );
			}

			// Home category filters
			if ( publisher_get_option( 'home_slider_cat_exclude' ) != '' ) {
				$query_args['category__not_in'] = publisher_get_option( 'home_slider_cat_exclude' );
			}

			// Home tag filters
			if ( publisher_get_option( 'home_slider_tag_include' ) != '' ) {
				$query_args['tag__in'] = publisher_get_option( 'home_slider_tag_include' );
			}

			// Home post type
			if ( publisher_get_option( 'home_slider_custom_post_type' ) != '' ) {
				$query_args['post_type'] = publisher_get_option( 'home_slider_custom_post_type' );
			}

		}

		$query = new WP_Query( $query_args );

		publisher_set_query( $query );

		// not show if there is no post
		if ( ! publisher_have_posts() ) {
			return;
		}

		if ( ! empty( $slider_config['columns'] ) ) {
			publisher_set_prop( 'listing-class', 'slider-overlay-' . $slider_config['overlay'] . ' columns-' . $slider_config['columns'] );
		} else {
			publisher_set_prop( 'listing-class', 'slider-overlay-' . $slider_config['overlay'] );
		}
		break;

	case 'rev_slider':

		if ( ! function_exists( 'putRevSlider' ) ) {
			return;
		}

		break;
}


?>
<div class="<?php echo esc_attr( implode( ' ', $class ) ); ?>">
<?php

// In columns wrapper
if ( ! $slider_config['in-column'] ){
	?>
	<div class="content-wrap">
	<div class="container">
	<div class="row">
	<div class="col-sm-12">
	<?php
}


switch ( $slider_config['type'] ) {

	case 'custom-blocks':
		publisher_get_view( $slider_config['directory'], $slider_config['file'] );
		break;

	case 'rev_slider':
		putRevSlider( $slider_config['style'] );
		break;

}


// In columns wrapper
if ( ! $slider_config['in-column'] ){
	?>
	</div>
	</div>
	</div>
	</div>
	<?php
}

?>
	</div><?php

publisher_clear_props();
publisher_clear_query();
