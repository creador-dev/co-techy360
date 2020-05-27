<?php
/**
 * The template to show quote style 11
 *
 * [bs-quote] shortcode
 *
 * @author     BetterStudio
 * @package    Blockquote Pack Pro
 * @version    1.0
 */

if ( ! isset( $atts['align'] ) ) {
	$atts['align'] = 'center';
}

$_check = array(
	'left'  => '',
	'right' => '',
);

if ( ! isset( $_check[ $atts['align'] ] ) ) {
	echo '<div class="bs-quote-clearfix clearfix">';
}

$have_author = FALSE;

if ( ! empty( $atts['author_name'] ) || ! empty( $atts['author_job'] ) || ! empty( $atts['author_avatar'] ) ) {
	$have_author = TRUE;
}

?>
	<blockquote class="bs-quote bs-quote-11 bsq-t2 bsq-s1 bsq-<?php echo $atts['align']; ?>">
		<div class="quote-content <?php echo $have_author ? 'bsq-arrow bsq-arrow-bottom' : ''; ?>">
			<span class="bsq-quote-icon"></span>
			<?php echo wpautop( $atts['quote'] ); ?>
		</div>

		<?php if ( $have_author ) {
			?>
			<div class="quote-author">
				<?php if ( ! empty( $atts['author_avatar'] ) ) { ?>
					<img class="quote-author-avatar" src="<?php echo $atts['author_avatar']; ?>"/>
				<?php } ?>

				<?php if ( ! empty( $atts['author_name'] ) ) { ?>
					<?php echo bf_is_fia() ? '<cite>' : '<span class="quote-author-name">'; ?>
					<?php if ( ! empty( $atts['author_link'] ) ) { ?>
						<a href="<?php echo $atts['author_link']; ?>" target="_blank"
						   rel="nofollow"><?php echo $atts['author_name']; ?></a>
					<?php } else { ?>
						<?php echo $atts['author_name']; ?>
					<?php } ?>
					<?php echo bf_is_fia() ? '</cite>' : '</span>'; ?>
				<?php } ?>

				<?php if ( $atts['author_job'] && ! bf_is_fia() ) { ?>
					<span class="quote-author-job"><?php echo $atts['author_job']; ?></span>
					<?php
				} ?>
			</div>
			<?php
		} ?>
	</blockquote>
<?php

if ( ! isset( $_check[ $atts['align'] ] ) ) {
	echo '</div>';
}
