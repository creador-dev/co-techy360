<?php
/**
 * default.php
 *
 * @author    BetterStudio
 * @package   BetterReviews
 * @version   1.4.6
 */

$overall_rate = better_review_overall_rate();
$type         = better_reviews_get_prop( 'type' );

?>
<section <?php the_better_review_class() ?>>
	<div class="verdict clearfix">
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
		<div
				class="the-content verdict-summary"><?php
			if ( $heading = get_better_review_heading() ) {
				echo '<h4 class="page-heading uppercase"><span class="h-title">', $heading, '</span></h4>';
			}

			the_better_review_summary();
			?>
		</div>
	</div>
	<ul class="criteria-list"><?php

		foreach ( get_better_review_criterias() as $criteria ) {

			?>
			<li class="clearfix">
				<div class="criterion">
					<span
							class="title"><?php echo ! empty( $criteria['label'] ) ? $criteria['label'] : __( 'Criteria', 'better-studio' ); ?></span>
					<?php if ( $type != 'stars' ) { ?>
						<span
								class="rate"><?php echo $type !== 'stars' ? round( $criteria['rate'] * 10 ) . '%' : $criteria['rate']; ?></span>
					<?php } ?>
				</div>
				<?php
				if ( $type === 'points' ) {
					the_better_review_rating( $criteria['rate'] * 10, $type );
				} else {
					the_better_review_rating( $criteria['rate'] * 10, $type );
				}
				?>
			</li>
			<?php
		}

		?>
	</ul>
	<?php if ( $description = get_better_review_description() ) { ?>
		<div class="review-description"><?php echo $description; ?></div>
	<?php } ?>
</section>
