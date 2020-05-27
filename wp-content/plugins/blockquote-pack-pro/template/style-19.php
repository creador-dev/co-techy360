<?php
/**
 * The template to show quote style 19
 *
 * [bs-quote] shortcode
 *
 * @author     BetterStudio
 * @package    Blockquote Pack Pro
 * @version    1.1
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

?>
	<blockquote class="bs-quote bs-quote-19 bsq-t1 bsq-s17 bsq-<?php echo $atts['align']; ?>">
		<span class="bsq-edge"></span>
		<div class="quote-content">
			<?php echo wpautop( $atts['quote'] ); ?>
		</div>
		<?php if ( ! empty( $atts['author_name'] ) || ! empty( $atts['author_job'] ) || ! empty( $atts['author_avatar'] ) ) {
			?>
			<div class="quote-author clearfix">
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
