<?php
/**
 * big-4.php
 *
 * @author    BetterStudio
 * @package   BetterReviews
 * @version   1.4.6
 */

$overall_rate = better_review_overall_rate();
$type         = better_reviews_get_prop( 'type' );

?>
<section <?php the_better_review_class( 'big-4' ) ?>>

	<div class="review-header clearfix">
		<div class="verdict clearfix">
			<div class="the-content verdict-summary"><?php

				if ( $heading = get_better_review_heading() ) {
					echo '<h4 class="page-heading uppercase"><span class="h-title">', $heading, '</span></h4>';
				}

				the_better_review_summary();

				?>
			</div>
		</div>
		<?php

		$aff_btn  = get_better_review_affiliate_btn();
		$aff_desc = get_better_review_affiliate_desc();

		if ( $aff_btn || $aff_desc ) {
			?>
			<section class="affiliate clearfix">
				<?php the_better_review_affiliate_btn() ?>
				<div class="affiliate-desc heading"><?php the_better_review_affiliate_desc() ?></div>
			</section>
			<?php
		}

		?>
	</div>

	<div class="criteria-list clearfix">

		<div class="overall">
                <span class="rate"><?php

	                if ( $type == 'points' ) {
		                echo round( $overall_rate / 10, 1 );
	                } else {
		                echo $overall_rate;
		                echo '<span class="percentage">%</span>';
	                }

	                ?></span>
			<?php the_better_review_rating(); ?>
			<span class="verdict-title"><?php the_better_review_verdict(); ?></span>
		</div>

		<ul><?php

			foreach ( get_better_review_criterias() as $criteria ) {

				$class = '';
				$css   = '';

				if ( $type == 'stars' && ! empty( $criteria['icon'] ) && ! empty( $criteria['icon']['font_code'] ) ) {

					if ( empty( $class ) ) {
						$class = 'rating-' . mt_rand( 1000, 10000 ) . '-spec';
					}

					// Custom icon of rating
					$css .= '.' . $class . ' .rating.rating.rating span:before , .' . $class . ' .rating.rating.rating:before{ content: "' . str_repeat( $criteria['icon']['font_code'], 5 ) . '" }';

					// fix for with issue
					$css .= '.' . $class . ' .rating.rating.rating{ max-width: inherit }';
				}


				if ( ! empty( $criteria['color'] ) ) {

					if ( empty( $class ) ) {
						$class = 'rating-' . mt_rand( 1000, 10000 ) . '-spec';
					}

					// color fix
					if ( $type == 'stars' ) {
						$css .= '.' . $class . ' .rating.rating.rating span:before{ color: ' . $criteria['color'] . '}';
					} else {
						$css .= '.' . $class . ' .rating.rating.rating span{ background-color: ' . $criteria['color'] . ' }';
					}
				}

				?>
				<li class="<?php echo $class; ?>">
					<div class="criterion">
					<span
							class="title"><?php echo ! empty( $criteria['label'] ) ? $criteria['label'] : __( 'Criteria', 'better-studio' ); ?></span>
						<?php if ( $type != 'stars' ) { ?>
							<span
									class="rate"><?php echo $type !== 'points' ? round( $criteria['rate'] * 10, 1 ) . '%' : round( $criteria['rate'], 1 ); ?></span>
						<?php } ?>
					</div>
					<?php

					if ( $type === 'points' ) {
						the_better_review_rating( $criteria['rate'] * 10, $type );
					} else {
						the_better_review_rating( $criteria['rate'] * 10, $type );
					}

					// Ads css to page
					if ( ! empty( $css ) ) {
						bf_add_css( $css, FALSE, TRUE );
					}

					?>
				</li>
				<?php
			}
			?>
		</ul>
	</div>
	<?php

	if ( $description = get_better_review_summary( 'bottom' ) ) { ?>
		<div class="review-description"><?php echo $description; ?></div>
	<?php }

	$pros = get_better_review_advantages();
	$cons = get_better_review_disadvantages();

	if ( $pros || $cons ) {

		?>
		<section class="review-cons-pros clearfix">

			<?php if ( $pros ) { ?>
				<aside class="review-pros-section">

					<h5 class="heading">
						<?php

						echo bf_get_icon_tag( better_reviews_get_prop( 'advantages_icon' ) );

						the_better_review_pros_heading();

						?>
					</h5>

					<ul>
						<?php

						foreach ( $pros as $advantage ) {
							printf( '<li>%s</li>', $advantage['label'] );
						}

						?>
					</ul>
				</aside>
			<?php } ?>

			<?php if ( $cons ) { ?>
				<aside class="review-cons-section">

					<h5 class="heading">
						<?php

						echo bf_get_icon_tag( better_reviews_get_prop( 'disadvantages_icon' ) );

						the_better_review_cons_heading();

						?>
					</h5>

					<ul>
						<?php

						foreach ( $cons as $disadvantage ) {
							printf( '<li>%s</li>', $disadvantage['label'] );
						}

						?>
					</ul>
				</aside>
			<?php } ?>

		</section>
	<?php } ?>

	<?php if ( get_better_review_readers_state() ) { ?>
		<footer class="readers-ratings clearfix">
			<aside class="ratings-results heading">
				<?php

				printf(
					Better_Reviews::get_option( 'text_readers_rating' ),
					'<span class="number">' . get_better_review_readers_average() . '</span>'
				);

				?>
			</aside>

			<aside class="rating">
			<span class="total-votes">
				<?php

				printf(
					Better_Reviews::get_option( 'text_votes' ),
					'<span class="number">' . get_better_review_readers_votes() . '</span>'
				);

				?>
			</span>

				<div class="rating rating-stars rating-type-stars" data-post-id="<?php the_ID() ?>"><span
							style="width: <?php the_better_review_readers_average() ?>;"></span></div>
			</aside>
		</footer>
	<?php } ?>
</section>
