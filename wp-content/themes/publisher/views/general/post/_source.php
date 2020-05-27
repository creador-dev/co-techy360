<?php
/**
 * Post "Source"
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    1.8.4
 */
?>
	<div class="entry-terms source clearfix <?php publisher_echo_prop( 'post-share-class' ) ?>">
		<span class="terms-label"><?php publisher_translation_echo( 'source' ); ?></span>
		<?php

		$fields = array(
			array(
				'name' => '_bs_source_name',
				'url'  => '_bs_source_url',
				'rel'  => '_bs_source_rel',
			),
			array(
				'name' => '_bs_source_name_2',
				'url'  => '_bs_source_url_2',
				'rel'  => '_bs_source_rel_2',
			),
			array(
				'name' => '_bs_source_name_3',
				'url'  => '_bs_source_url_3',
				'rel'  => '_bs_source_rel_3',
			),
		);

		foreach ( $fields as $source ) {

			if ( ! bf_get_post_meta( $source['url'] ) ) {
				continue;
			}

			$rel = bf_get_post_meta( $source['rel'] );

			if ( $rel === 'nofollow_blank' ) {
				$rel    = 'nofollow';
				$target = '_blank';
			} elseif ( $rel === 'follow_blank' ) {
				$rel    = '';
				$target = '_blank';
			} else {
				$target = '';
			}

			?>
			<a
				<?php if ( ! empty( $rel ) ) { ?>
					rel="<?php echo $rel; // escaped before ?>"
				<?php } ?>

				<?php if ( ! empty( $target ) ) { ?>
					target="<?php echo $target; // escaped before ?>"
				<?php } ?>

				href="<?php echo esc_url( bf_get_post_meta( $source['url'] ) ) ?>">
				<?php bf_echo_post_meta( $source['name'] ); ?>
			</a>
			<?php

		}

		?>
	</div>
<?php

unset( $fields );
