<?php
/**
 * The template to show popular categories shortcode/widget
 *
 * [bs-popular-categories] shortcode
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    1.9.1
 */

$atts = publisher_get_prop( 'shortcode-bs-popular-categories-atts' );

if ( empty( $atts['css-class'] ) ) {
	$atts['css-class'] = '';
}

if ( ! empty( $atts['custom-css-class'] ) ) {
	$atts['css-class'] .= ' ' . sanitize_html_class( $atts['custom-css-class'] );
}

$custom_id = empty( $atts['custom-id'] ) ? '' : sanitize_html_class( $atts['custom-id'] );

?>
	<div <?php
	if ( $custom_id ) {
		echo 'id="', $custom_id, '"';
	}
	?> class="bs-shortcode bs-popular-categories <?php echo esc_attr( $atts['css-class'] ); ?>">
		<?php

		bf_shortcode_show_title( $atts ); // show title

		// Custom and Auto Generated CSS Codes
		if ( ! empty( $atts['css-code'] ) ) {
			bf_add_css( $atts['css-code'], true, true );
		}

		$args = array(
			'orderby'    => 'count',
			'show_count' => true,
			'hide_empty' => false,
			'order'      => 'DESC',
			'number'     => intval( $atts['count'] ) > 0 ? intval( $atts['count'] ) : 6,
		);

		if ( ! empty( $atts['exclude'] ) ) {
			if ( is_array( $atts['exclude'] ) ) {
				$atts['exclude'][] = 1;
				$args['exclude']   = implode( ',', $atts['exclude'] ); // Exclude uncategorized
			} else {
				$args['exclude'] = rtrim( '1,' . $atts['exclude'], ',' ); // Exclude uncategorized
			}
		} else {
			$args['exclude'] = 1; // Exclude uncategorized
		}

		$categories = get_categories( $args );

		if ( ! empty( $categories ) ) {

			?>
			<ul class="bs-popular-terms-list">
				<?php

				foreach ( $categories as $term ) {
					echo '<li class="bs-popular-term-item term-item-' . esc_attr( $term->term_id ) . '">
					<a href="' . esc_url( get_category_link( $term->term_id ) ) . '">' . $term->name . '<span class="term-count">' . $term->count . '</span></a>
				  </li>'; // escaped before
				}

				?>
			</ul>
			<?php
		}

		?>
	</div>
<?php

unset( $args );
unset( $categories );
unset( $atts );
