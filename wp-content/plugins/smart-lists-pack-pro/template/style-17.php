<?php
/**
 * The template for smart list style 17
 *
 * @var $smart_list
 *
 * @author     BetterStudio
 * @package    Smart Lists Pack Pro
 * @version    1.1
 */

$page = bf_get_query_var_paged();
if ( ! isset( $smart_list['items'][ $page - 1 ] ) ) {
	$page = 1;
}

$item = $smart_list['items'][ $page - 1 ];

if ( empty( $item['title'] ) ) {
	$item['title'] = get_the_title();
}

// permalink for nav links
{
	$permalink = add_query_arg( 'page', '%%page%%', get_permalink() );

	// prev link
	{
		$prev = $page - 1;


		if ( ! isset( $smart_list['items'][ $prev - 1 ] ) ) {
			$prev = $smart_list['items-count'];
		}

		$prev = str_replace( '%%page%%', $prev, $permalink );
	}

	// next link
	{
		$next = $page + 1;

		if ( ! isset( $smart_list['items'][ $next - 1 ] ) ) {
			$next = 1;
		}

		$next = str_replace( '%%page%%', $next, $permalink );
	}
}

bssl_show_ad_location( 'bssl_before' );

if ( isset( $smart_list['before'] ) ) {
	echo '<span class="bs-smart-list-start bssl-before-style-17"></span>';
}

?>
	<div class="bs-smart-list bssl-style-17 bssl-t1 bssl-s17">

		<div class="bssl-inner">

			<div class="bssl-control-nav clearfix bssl-top">
			<span class="bssl-count"><?php echo sprintf( BS_Smart_Lists_Pack_Pro::get_option( 'trans_page_x_of_y' ), $page, $smart_list['items-count'] ); ?>
				:</span>

				<div class="bssl-select">
					<span class="bssl-select-current"><?php echo $smart_list['items'][ $page - 1 ]['title']; ?></span>
					<ul>
						<?php

						foreach ( $smart_list['items'] as $k => $v ) {

							?>
							<li class="<?php echo ( $k + 1 ) === $page ? 'bssl-current' : '' ?>"
							    data-url="<?php echo str_replace( '%%page%%', $k + 1, $permalink ); ?>">
								<b><?php echo number_format_i18n( $k + 1 ); ?></b>. <?php echo $v['title']; ?></li>
							<?php
						}

						?>
					</ul>
				</div>


				<a rel="next" class="bssl-nav-btn-text next" href="<?php echo $next; ?>">
					<?php echo BS_Smart_Lists_Pack_Pro::get_option( 'trans_page_next' ); ?> <i
							class="fa fa-angle-<?php echo is_rtl() ? 'left' : 'right'; ?>" aria-hidden="true"></i>
				</a>

				<a rel="prev" class="bssl-nav-btn-text prev" href="<?php echo $prev; ?>">
					<i class="fa fa-angle-<?php echo is_rtl() ? 'right' : 'left'; ?>"
					   aria-hidden="true"></i> <?php echo BS_Smart_Lists_Pack_Pro::get_option( 'trans_page_prev' ); ?>
				</a>
			</div>

			<div class="bssl-items">
				<div class="bssl-item bs-slider-item">

					<?php

					$src = $item['image_src'];
					$alt = ! empty( $item['alt'] ) ? $item['alt'] : strip_tags( $item['title'] );

					if ( ! empty( $src ) ) {

						?>
						<figure class="bssl-image-w">

							<?php if ( ! empty( $item['image_link'] ) ){ ?><a
									href="<?php echo $item['image_link']; ?>"><?php } ?>

								<img class="bssl-image"
								     src="<?php echo esc_url( $src ); ?>"
								     alt="<?php echo esc_attr( $alt ); ?>"
								/>

								<?php if ( ! empty( $item['image_link'] ) ){ ?></a><?php } ?>

							<?php if ( ! empty( $item['image_caption'] ) ) { ?>
								<figcaption class="wp-caption-text"><?php echo $item['image_caption']; ?></figcaption>
							<?php } ?>

						</figure>
						<?php

						bssl_show_ad_location( 'bssl_style_17' );

					}

					?>

					<h2 class="bssl-item-title heading-typo bssl-count-type-text">
						<span class="bssl-count"><?php echo number_format_i18n( $page ); ?>.</span>
						<?php echo $item['title']; ?>
					</h2>

					<div class="bssl-content the-content">
						<?php echo $item['content']; ?>
					</div>
				</div>
			</div>

			<div class="bssl-control-nav clearfix bssl-bottom">
				<a rel="prev" class="bssl-nav-btn-big prev" href="<?php echo $prev; ?>">
					<i class="fa fa-angle-<?php echo is_rtl() ? 'right' : 'left'; ?>"
					   aria-hidden="true"></i> <?php echo BS_Smart_Lists_Pack_Pro::get_option( 'trans_page_prev' ); ?>
				</a>

				<a rel="next" class="bssl-nav-btn-big next" href="<?php echo $next; ?>">
					<?php echo BS_Smart_Lists_Pack_Pro::get_option( 'trans_page_next' ); ?> <i
							class="fa fa-angle-<?php echo is_rtl() ? 'left' : 'right'; ?>" aria-hidden="true"></i>
				</a>
			</div>

		</div>
	</div>
<?php

if ( isset( $smart_list['after'] ) ) {
	echo '<span class="bs-smart-list-end"></span>';
}

bssl_show_ad_location( 'bssl_after' );
