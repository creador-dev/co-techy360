<?php
/**
 * Post "via" section
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    1.8.4
 */

?>
	<div class="entry-terms via clearfix <?php publisher_echo_prop( 'post-share-class' ) ?>">
		<span class="terms-label"><?php publisher_translation_echo( 'via' ); ?></span>
		<?php

		$fields = array(
			array(
				'name' => '_bs_via_name',
				'url'  => '_bs_via_url',
				'rel'  => '_bs_via_rel',
			),
			array(
				'name' => '_bs_via_name_2',
				'url'  => '_bs_via_url_2',
				'rel'  => '_bs_via_rel_2',
			),
			array(
				'name' => '_bs_via_name_3',
				'url'  => '_bs_via_url_3',
				'rel'  => '_bs_via_rel_3',
			),
		);

		foreach ( $fields as $via ) {

			if ( ! bf_get_post_meta( $via['url'] ) ) {
				continue;
			}

			$rel = bf_get_post_meta( $via['rel'] );

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

					href="<?php echo esc_url( bf_get_post_meta( $via['url'] ) ) ?>">
				<?php bf_echo_post_meta( $via['name'] ); ?>
			</a>
			<?php

		}

		?>
	</div>
<?php

unset( $fields );
