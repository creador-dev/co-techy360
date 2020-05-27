<?php
/**
 * The man code to print sliders.
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    1.9.0
 */

// Get slider params
$slider_config = publisher_main_slider_config();

if ( ! $slider_config['show'] ) {
	return;
}

$class = array(
	'slider-container clearfix',
	'slider-type-' . $slider_config['type'],
	publisher_get_prop( 'taxonomy-slider-class', '' ),
);

switch ( $slider_config['type'] ) {

	case 'disable':
		return;
		break;

	case 'custom-blocks':
		$class[] = 'slider-' . $slider_config['style'] . '-container';
		$class[] = 'slider-overlay-' . $slider_config['overlay'];


		$query_args = array(
			'posts_per_page' => $slider_config['posts'],
		);

		$term = get_queried_object();

		if ( isset( $term->taxonomy ) && isset( $term->term_id ) ) {
			$query_args['tax_query'] = array(
				array(
					'taxonomy' => $term->taxonomy,
					'field'    => 'term_id',
					'terms'    => $term->term_id,
				)
			);
		}

		$query = new WP_Query( $query_args );

		publisher_set_query( $query );

		// not show if there is no post
		if ( ! publisher_have_posts() ) {
			return;
		}

		$listing_class = 'slider-overlay-' . $slider_config['overlay'];

		if ( isset( $slider_config['class'] ) ) {
			$listing_class .= ' ' . $slider_config['class'];
		}

		if ( isset( $slider_config['columns'] ) ) {
			$listing_class .= ' columns-' . $slider_config['columns'];
			publisher_set_prop( 'listing-columns', $slider_config['columns'] );
		}

		publisher_set_prop( 'listing-class', $listing_class );

		// disable inner items width calculation
		if ( ! $slider_config['in-column'] ) {
			publisher_set_prop( 'calc-item-width', 0 );
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
