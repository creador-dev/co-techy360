<?php


if ( ! function_exists( 'publisher_listing_social_share' ) ) {
	/**
	 * Prints listing share buttons
	 *
	 * @param array $args
	 */
	function publisher_listing_social_share( $args = array() ) {

		if ( ! isset( $args['type'] ) ) {
			$args['type'] = 'listing';
		}

		if ( ! isset( $args['class'] ) ) {
			$args['class'] = '';
		}

		if ( ! isset( $args['show_count'] ) ) {
			$args['show_count'] = false;
		}

		if ( ! isset( $args['show_title'] ) ) {
			$args['show_title'] = false;
		}

		if ( ! isset( $args['show_views'] ) ) {
			$args['show_views'] = false;
		}

		if ( ! isset( $args['show_comments'] ) ) {
			$args['show_comments'] = false;
		}

		if ( ! isset( $args['style'] ) ) {
			$args['style'] = publisher_get_option( 'social_share_style' );
		}

		$styles_fix = array(
			'style-1'  => array(
				'show_title' => false,
			),
			'style-2'  => array(
				'show_title' => true,
				'style'      => 'style-1',
			),
			'style-3'  => array(
				'show_title' => false,
				'style'      => 'style-2',
			),
			'style-4'  => array(
				'show_title' => true,
				'style'      => 'style-2',
			),
			'style-5'  => array(
				'show_title' => false,
				'style'      => 'style-3',
			),
			'style-6'  => array(
				'show_title' => true,
				'style'      => 'style-3',
			),
			'style-7'  => array(
				'show_title' => false,
				'style'      => 'style-4',
			),
			'style-8'  => array(
				'show_title' => true,
				'style'      => 'style-4',
			),
			'style-9'  => array(
				'show_title' => false,
				'style'      => 'style-5',
			),
			'style-10' => array(
				'show_title' => true,
				'style'      => 'style-5',
			),
			'style-11' => array(
				'show_title' => false,
				'style'      => 'style-6',
			),
			'style-12' => array(
				'show_title' => true,
				'style'      => 'style-6',
			),
			'style-13' => array(
				'show_title' => false,
				'style'      => 'style-7',
			),
			'style-14' => array(
				'show_title' => true,
				'style'      => 'style-7',
			),
			'style-15' => array(
				'show_title' => false,
				'style'      => 'style-8',
			),
			'style-16' => array(
				'show_title' => true,
				'style'      => 'style-8',
			),
			'style-17' => array(
				'show_title' => false,
				'style'      => 'style-9',
			),
			'style-18' => array(
				'show_title' => true,
				'style'      => 'style-9',
			),
			'style-19' => array(
				'show_title' => false,
				'style'      => 'style-10',
			),
			'style-20' => array(
				'show_title' => true,
				'style'      => 'style-10',
			),
			'style-21' => array(
				'show_title' => false,
				'style'      => 'style-11',
			),
			'style-22' => array(
				'show_title' => true,
				'style'      => 'style-11',
			),
			'style-23' => array(
				'show_title' => false,
				'style'      => 'style-12',
			),
			'style-24' => array(
				'show_title' => true,
				'style'      => 'style-12',
			),
			'style-25' => array(
				'show_title' => false,
				'style'      => 'style-13',
			),
			'style-26' => array(
				'show_title' => true,
				'style'      => 'style-13',
			),
		);

		if ( isset( $styles_fix[ $args['style'] ] ) ) {
			$args = array_merge( $args, $styles_fix[ $args['style'] ] );
		}

		$args['class'] .= ' ' . $args['style'];

		$sites = publisher_get_option( 'social_share_sites' );

		if ( $args['type'] === 'single' && publisher_get_option( 'social_share_count' ) === 'total-and-site' ) {
			$site_share_count = true;
		} else {
			$site_share_count = false;
		}

		?>
		<div class="post-share <?php echo esc_attr( $args['class'] ); ?>">
			<div class="post-share-btn-group">
				<?php


				if ( $args['type'] === 'single' && $args['show_comments'] && ( ! empty( $args['show_comments_force'] ) || comments_open() ) ) {

					$title  = apply_filters( 'better-studio/theme/meta/comments/title', publisher_get_the_title() );
					$link   = apply_filters( 'better-studio/theme/meta/comments/link', publisher_get_comments_link() );
					$number = apply_filters( 'better-studio/theme/meta/comments/number', publisher_get_comments_number() );
					$text   = apply_filters( 'better-studio/themes/meta/comments/text', $number );

					printf( '<a href="%1$s" class="post-share-btn post-share-btn-comments comments" title="%2$s"><i class="bf-icon fa fa-comments" aria-hidden="true"></i> <b class="number">%3$s</b></a>',
						esc_url( $link ),
						esc_attr( sprintf( publisher_translation_get( 'leave_comment_on' ), $title ) ),
						$text
					);

				}


				if ( $args['type'] === 'single' && $args['show_views'] && function_exists( 'The_Better_Views_Count' ) ) {

					$rank = publisher_get_ranking_icon( The_Better_Views_Count(), 'views_ranking', 'fa-eye', true );

					if ( isset( $rank['show'] ) && $rank['show'] ) {
						The_Better_Views(
							true,
							'<span class="views post-share-btn post-share-btn-views ' . $rank['id'] . '" data-bpv-post="' . get_the_ID() . '">' . $rank['icon'] . ' <b class="number">',
							'</b></span>',
							'show',
							'%VIEW_COUNT%'
						);
					}

				}

				?>
			</div>
			<?php
			if ( $args['type'] === 'single' ) {

			if ( $args['show_count'] ) {
				$count_labels = bf_social_shares_count( $sites );
			} else {
				$count_labels = array();
			}

			$total_count = array_sum( $count_labels );

			$rank = publisher_get_ranking_icon( $total_count, 'shares_ranking', 'fa-share-alt', true );

			if ( empty( $rank['id'] ) ) {
				$rank['id'] = 'rank-default';
			}

			if ( empty( $rank['icon'] ) ) {
				$rank['icon'] = '<i class="bf-icon fa fa-share-alt" aria-hidden="true"></i>';
			}

			?>
			<div class="share-handler-wrap <?php echo publisher_get_option( 'social_share_more' ) !== 'yes' ? 'bs-pretty-tabs-initialized' : ''; ?>">
				<span class="share-handler post-share-btn <?php echo $rank['id']; ?>">
					<?php

					echo $rank['icon'];

					if ( $total_count ) { ?>
						<b class="number"><?php echo bf_human_number_format( $total_count ) ?></b>
					<?php } else {
						?>
						<b class="text"><?php publisher_translation_echo( 'post_share' ); ?></b>
						<?php
					} ?>
				</span>
				<?php
				} elseif ( $args['type'] === 'listing' ) {
					//echo $label;
				}

				foreach ( (array) $sites as $site_key => $site ) {
					if ( $site ) {
						$count_label = $site_share_count && isset( $count_labels[ $site_key ] ) ? $count_labels[ $site_key ] : 0;
						echo publisher_shortcode_social_share_get_li( $site_key, $args['show_title'], $count_label );
					}
				}

				if ( $args['type'] === 'single' ) {
				?></div><?php
		}
		?>
		</div>
		<?php

	} // publisher_listing_social_share
}


if ( ! function_exists( 'publisher_share_option_list' ) ) {
	/**
	 * Panels layout field options
	 *
	 * @param bool $default
	 *
	 * @return array
	 */
	function publisher_share_option_list( $default = false ) {

		$option = array(
			'style-1'  => array(
				'img'         => PUBLISHER_THEME_URI . 'images/options/share-style-1-full.png?v=' . PUBLISHER_THEME_VERSION,
				'current_img' => PUBLISHER_THEME_URI . 'images/options/share-style-1.png?v=' . PUBLISHER_THEME_VERSION,
				'label'       => __( 'Style 1', 'publisher' ),
				'views'       => false,
				'info'        => array(
					'cat'  => array(
						__( 'Small', 'publisher' ),
					),
					'type' => array(
						__( 'Icon Button', 'publisher' ),
					),
				)
			),
			'style-2'  => array(
				'img'         => PUBLISHER_THEME_URI . 'images/options/share-style-2-full.png?v=' . PUBLISHER_THEME_VERSION,
				'current_img' => PUBLISHER_THEME_URI . 'images/options/share-style-2.png?v=' . PUBLISHER_THEME_VERSION,
				'label'       => __( 'Style 2', 'publisher' ),
				'views'       => false,
				'info'        => array(
					'cat'  => array(
						__( 'Small', 'publisher' ),
					),
					'type' => array(
						__( 'Text Button', 'publisher' ),
					),
				)
			),
			'style-3'  => array(
				'img'         => PUBLISHER_THEME_URI . 'images/options/share-style-3-full.png?v=' . PUBLISHER_THEME_VERSION,
				'current_img' => PUBLISHER_THEME_URI . 'images/options/share-style-3.png?v=' . PUBLISHER_THEME_VERSION,
				'label'       => __( 'Style 3', 'publisher' ),
				'views'       => false,
				'info'        => array(
					'cat'  => array(
						__( 'Large', 'publisher' ),
					),
					'type' => array(
						__( 'Icon Button', 'publisher' ),
					),
				)
			),
			'style-4'  => array(
				'img'         => PUBLISHER_THEME_URI . 'images/options/share-style-4-full.png?v=' . PUBLISHER_THEME_VERSION,
				'current_img' => PUBLISHER_THEME_URI . 'images/options/share-style-4.png?v=' . PUBLISHER_THEME_VERSION,
				'label'       => __( 'Style 4', 'publisher' ),
				'views'       => false,
				'info'        => array(
					'cat'  => array(
						__( 'Large', 'publisher' ),
					),
					'type' => array(
						__( 'Text Button', 'publisher' ),
					),
				)
			),
			'style-5'  => array(
				'img'         => PUBLISHER_THEME_URI . 'images/options/share-style-5-full.png?v=' . PUBLISHER_THEME_VERSION,
				'current_img' => PUBLISHER_THEME_URI . 'images/options/share-style-5.png?v=' . PUBLISHER_THEME_VERSION,
				'label'       => __( 'Style 5', 'publisher' ),
				'views'       => false,
				'info'        => array(
					'cat'  => array(
						__( 'Small', 'publisher' ),
					),
					'type' => array(
						__( 'Icon Button', 'publisher' ),
					),
				)
			),
			'style-6'  => array(
				'img'         => PUBLISHER_THEME_URI . 'images/options/share-style-6-full.png?v=' . PUBLISHER_THEME_VERSION,
				'current_img' => PUBLISHER_THEME_URI . 'images/options/share-style-6.png?v=' . PUBLISHER_THEME_VERSION,
				'label'       => __( 'Style 6', 'publisher' ),
				'views'       => false,
				'info'        => array(
					'cat'  => array(
						__( 'Small', 'publisher' ),
					),
					'type' => array(
						__( 'Text Button', 'publisher' ),
					),
				)
			),
			'style-7'  => array(
				'img'         => PUBLISHER_THEME_URI . 'images/options/share-style-7-full.png?v=' . PUBLISHER_THEME_VERSION,
				'current_img' => PUBLISHER_THEME_URI . 'images/options/share-style-7.png?v=' . PUBLISHER_THEME_VERSION,
				'label'       => __( 'Style 7', 'publisher' ),
				'views'       => false,
				'info'        => array(
					'cat'  => array(
						__( 'Small', 'publisher' ),
					),
					'type' => array(
						__( 'Icon Button', 'publisher' ),
					),
				)
			),
			'style-8'  => array(
				'img'         => PUBLISHER_THEME_URI . 'images/options/share-style-8-full.png?v=' . PUBLISHER_THEME_VERSION,
				'current_img' => PUBLISHER_THEME_URI . 'images/options/share-style-8.png?v=' . PUBLISHER_THEME_VERSION,
				'label'       => __( 'Style 8', 'publisher' ),
				'views'       => false,
				'info'        => array(
					'cat'  => array(
						__( 'Small', 'publisher' ),
					),
					'type' => array(
						__( 'Text Button', 'publisher' ),
					),
				)
			),
			'style-9'  => array(
				'img'         => PUBLISHER_THEME_URI . 'images/options/share-style-9-full.png?v=' . PUBLISHER_THEME_VERSION,
				'current_img' => PUBLISHER_THEME_URI . 'images/options/share-style-9.png?v=' . PUBLISHER_THEME_VERSION,
				'label'       => __( 'Style 9', 'publisher' ),
				'views'       => false,
				'info'        => array(
					'cat'  => array(
						__( 'Large', 'publisher' ),
					),
					'type' => array(
						__( 'Icon Button', 'publisher' ),
					),
				)
			),
			'style-10' => array(
				'img'         => PUBLISHER_THEME_URI . 'images/options/share-style-10-full.png?v=' . PUBLISHER_THEME_VERSION,
				'current_img' => PUBLISHER_THEME_URI . 'images/options/share-style-10.png?v=' . PUBLISHER_THEME_VERSION,
				'label'       => __( 'Style 10', 'publisher' ),
				'views'       => false,
				'info'        => array(
					'cat'  => array(
						__( 'Large', 'publisher' ),
					),
					'type' => array(
						__( 'Text Button', 'publisher' ),
					),
				)
			),
			'style-11' => array(
				'img'         => PUBLISHER_THEME_URI . 'images/options/share-style-11-full.png?v=' . PUBLISHER_THEME_VERSION,
				'current_img' => PUBLISHER_THEME_URI . 'images/options/share-style-11.png?v=' . PUBLISHER_THEME_VERSION,
				'label'       => __( 'Style 11', 'publisher' ),
				'views'       => false,
				'info'        => array(
					'cat'  => array(
						__( 'Large', 'publisher' ),
					),
					'type' => array(
						__( 'Icon Button', 'publisher' ),
					),
				)
			),
			'style-12' => array(
				'img'         => PUBLISHER_THEME_URI . 'images/options/share-style-12-full.png?v=' . PUBLISHER_THEME_VERSION,
				'current_img' => PUBLISHER_THEME_URI . 'images/options/share-style-12.png?v=' . PUBLISHER_THEME_VERSION,
				'label'       => __( 'Style 12', 'publisher' ),
				'views'       => false,
				'info'        => array(
					'cat'  => array(
						__( 'Large', 'publisher' ),
					),
					'type' => array(
						__( 'Text Button', 'publisher' ),
					),
				)
			),
			'style-13' => array(
				'img'         => PUBLISHER_THEME_URI . 'images/options/share-style-13-full.png?v=' . PUBLISHER_THEME_VERSION,
				'current_img' => PUBLISHER_THEME_URI . 'images/options/share-style-13.png?v=' . PUBLISHER_THEME_VERSION,
				'label'       => __( 'Style 13', 'publisher' ),
				'views'       => false,
				'info'        => array(
					'cat'  => array(
						__( 'Large', 'publisher' ),
					),
					'type' => array(
						__( 'Icon Button', 'publisher' ),
					),
				)
			),
			'style-14' => array(
				'img'         => PUBLISHER_THEME_URI . 'images/options/share-style-14-full.png?v=' . PUBLISHER_THEME_VERSION,
				'current_img' => PUBLISHER_THEME_URI . 'images/options/share-style-14.png?v=' . PUBLISHER_THEME_VERSION,
				'label'       => __( 'Style 14', 'publisher' ),
				'views'       => false,
				'info'        => array(
					'cat'  => array(
						__( 'Large', 'publisher' ),
					),
					'type' => array(
						__( 'Text Button', 'publisher' ),
					),
				)
			),
			'style-15' => array(
				'img'         => PUBLISHER_THEME_URI . 'images/options/share-style-15-full.png?v=' . PUBLISHER_THEME_VERSION,
				'current_img' => PUBLISHER_THEME_URI . 'images/options/share-style-15.png?v=' . PUBLISHER_THEME_VERSION,
				'label'       => __( 'Style 15', 'publisher' ),
				'views'       => false,
				'info'        => array(
					'cat'  => array(
						__( 'Large', 'publisher' ),
					),
					'type' => array(
						__( 'Icon Button', 'publisher' ),
					),
				)
			),
			'style-16' => array(
				'img'         => PUBLISHER_THEME_URI . 'images/options/share-style-16-full.png?v=' . PUBLISHER_THEME_VERSION,
				'current_img' => PUBLISHER_THEME_URI . 'images/options/share-style-16.png?v=' . PUBLISHER_THEME_VERSION,
				'label'       => __( 'Style 16', 'publisher' ),
				'views'       => false,
				'info'        => array(
					'cat'  => array(
						__( 'Large', 'publisher' ),
					),
					'type' => array(
						__( 'Text Button', 'publisher' ),
					),
				)
			),
			'style-17' => array(
				'img'         => PUBLISHER_THEME_URI . 'images/options/share-style-17-full.png?v=' . PUBLISHER_THEME_VERSION,
				'current_img' => PUBLISHER_THEME_URI . 'images/options/share-style-17.png?v=' . PUBLISHER_THEME_VERSION,
				'label'       => __( 'Style 17', 'publisher' ),
				'views'       => false,
				'info'        => array(
					'cat'  => array(
						__( 'Small', 'publisher' ),
					),
					'type' => array(
						__( 'Icon Button', 'publisher' ),
					),
				)
			),
			'style-18' => array(
				'img'         => PUBLISHER_THEME_URI . 'images/options/share-style-18-full.png?v=' . PUBLISHER_THEME_VERSION,
				'current_img' => PUBLISHER_THEME_URI . 'images/options/share-style-18.png?v=' . PUBLISHER_THEME_VERSION,
				'label'       => __( 'Style 18', 'publisher' ),
				'views'       => false,
				'info'        => array(
					'cat'  => array(
						__( 'Small', 'publisher' ),
					),
					'type' => array(
						__( 'Text Button', 'publisher' ),
					),
				)
			),
			'style-19' => array(
				'img'         => PUBLISHER_THEME_URI . 'images/options/share-style-19-full.png?v=' . PUBLISHER_THEME_VERSION,
				'current_img' => PUBLISHER_THEME_URI . 'images/options/share-style-19.png?v=' . PUBLISHER_THEME_VERSION,
				'label'       => __( 'Style 19', 'publisher' ),
				'views'       => false,
				'info'        => array(
					'cat'  => array(
						__( 'Small', 'publisher' ),
					),
					'type' => array(
						__( 'Icon Button', 'publisher' ),
					),
				)
			),
			'style-20' => array(
				'img'         => PUBLISHER_THEME_URI . 'images/options/share-style-20-full.png?v=' . PUBLISHER_THEME_VERSION,
				'current_img' => PUBLISHER_THEME_URI . 'images/options/share-style-20.png?v=' . PUBLISHER_THEME_VERSION,
				'label'       => __( 'Style 20', 'publisher' ),
				'views'       => false,
				'info'        => array(
					'cat'  => array(
						__( 'Small', 'publisher' ),
					),
					'type' => array(
						__( 'Text Button', 'publisher' ),
					),
				)
			),
			'style-21' => array(
				'img'         => PUBLISHER_THEME_URI . 'images/options/share-style-21-full.png?v=' . PUBLISHER_THEME_VERSION,
				'current_img' => PUBLISHER_THEME_URI . 'images/options/share-style-21.png?v=' . PUBLISHER_THEME_VERSION,
				'label'       => __( 'Style 21', 'publisher' ),
				'views'       => false,
				'info'        => array(
					'cat'  => array(
						__( 'Small', 'publisher' ),
					),
					'type' => array(
						__( 'Icon Button', 'publisher' ),
					),
				)
			),
			'style-22' => array(
				'img'         => PUBLISHER_THEME_URI . 'images/options/share-style-22-full.png?v=' . PUBLISHER_THEME_VERSION,
				'current_img' => PUBLISHER_THEME_URI . 'images/options/share-style-22.png?v=' . PUBLISHER_THEME_VERSION,
				'label'       => __( 'Style 22', 'publisher' ),
				'views'       => false,
				'info'        => array(
					'cat'  => array(
						__( 'Small', 'publisher' ),
					),
					'type' => array(
						__( 'Text Button', 'publisher' ),
					),
				)
			),
			'style-23' => array(
				'img'         => PUBLISHER_THEME_URI . 'images/options/share-style-23-full.png?v=' . PUBLISHER_THEME_VERSION,
				'current_img' => PUBLISHER_THEME_URI . 'images/options/share-style-23.png?v=' . PUBLISHER_THEME_VERSION,
				'label'       => __( 'Style 23', 'publisher' ),
				'views'       => false,
				'info'        => array(
					'cat'  => array(
						__( 'Small', 'publisher' ),
					),
					'type' => array(
						__( 'Icon Button', 'publisher' ),
					),
				)
			),
			'style-24' => array(
				'img'         => PUBLISHER_THEME_URI . 'images/options/share-style-24-full.png?v=' . PUBLISHER_THEME_VERSION,
				'current_img' => PUBLISHER_THEME_URI . 'images/options/share-style-24.png?v=' . PUBLISHER_THEME_VERSION,
				'label'       => __( 'Style 24', 'publisher' ),
				'views'       => false,
				'info'        => array(
					'cat'  => array(
						__( 'Small', 'publisher' ),
					),
					'type' => array(
						__( 'Text Button', 'publisher' ),
					),
				)
			),
			'style-25' => array(
				'img'         => PUBLISHER_THEME_URI . 'images/options/share-style-25-full.png?v=' . PUBLISHER_THEME_VERSION,
				'current_img' => PUBLISHER_THEME_URI . 'images/options/share-style-25.png?v=' . PUBLISHER_THEME_VERSION,
				'label'       => __( 'Style 25', 'publisher' ),
				'views'       => false,
				'info'        => array(
					'cat'  => array(
						__( 'Large', 'publisher' ),
					),
					'type' => array(
						__( 'Icon Button', 'publisher' ),
					),
				)
			),
			'style-26' => array(
				'img'         => PUBLISHER_THEME_URI . 'images/options/share-style-26-full.png?v=' . PUBLISHER_THEME_VERSION,
				'current_img' => PUBLISHER_THEME_URI . 'images/options/share-style-26.png?v=' . PUBLISHER_THEME_VERSION,
				'label'       => __( 'Style 26', 'publisher' ),
				'views'       => false,
				'info'        => array(
					'cat'  => array(
						__( 'Large', 'publisher' ),
					),
					'type' => array(
						__( 'Text Button', 'publisher' ),
					),
				)
			),
		);

		if ( $default ) {
			$option = array(
				          'default' => array(
					          'img'           => PUBLISHER_THEME_URI . 'images/options/share-style-default-full.png?v=' . PUBLISHER_THEME_VERSION,
					          'current_img'   => PUBLISHER_THEME_URI . 'images/options/share-style-default.png?v=' . PUBLISHER_THEME_VERSION,
					          'label'         => __( 'Default', 'publisher' ),
					          'current_label' => __( 'Default Layout', 'publisher' ),
				          )
			          ) + $option;
		}

		return $option;
	} // publisher_share_option_list
} // if


if ( ! function_exists( 'publisher_get_top_share_style' ) ) {
	/**
	 * Return post top share buttons style
	 *
	 * @return array
	 */
	function publisher_get_top_share_style() {

		return publisher_get_option( 'social_share_top_style' );
	} // publisher_get_top_share_style
} // if


if ( ! function_exists( 'publisher_get_bottom_share_style' ) ) {
	/**
	 * Return post bottom share buttons style
	 *
	 * @return array
	 */
	function publisher_get_bottom_share_style() {

		if ( publisher_get_option( 'social_share_bottom_style' ) && publisher_get_option( 'social_share_bottom_style' ) != 'default' ) {
			return publisher_get_option( 'social_share_bottom_style' );
		}

		return publisher_get_top_share_style();
	} // publisher_get_bottom_share_style
} // if
