<div id="wp-migrator-panel" class="wp-migrator-panel">

	<header class="bf-page-header">
		<div class="bf-page-header-inner bf-clearfix">
			<h2 class="page-title"><?php _e( 'Migrate Plugin To?', WPMG_LOC ) ?></h2>
			<div class="page-desc"><p><?php _e( 'Choose a destination plugin for this plugin', WPMG_LOC ) ?></p></div>
		</div>
	</header>


	<div id="bf-nav"></div>

	<div id="wpmg-container" style="min-height: 50px;display: none;">

		<div class="wpmg-products">

			<a href="<?php echo esc_attr( remove_query_arg( array( 'item', 'type' ) ) ) ?>" class="mg-btn mg-btn-light">

				<i class="fa fa-chevron-left" aria-hidden="true"></i>

				<?php _e( 'Back to main page', WPMG_LOC ) ?>
			</a>

			<div class="wpmg-head-product">
				<ul class="product-items text-center">

					<li class="product-item" id="product-item-<?php echo esc_attr( $base_product['id'] ) ?>">
						<?php if ( ! empty( $base_product['badge'] ) ) {
							echo '<span class="product-item-badge">' . $base_product['badge'] . '</span>';
						} ?>
						<span class="product-item-image">
							<img src="<?php echo $base_product ['thumbnail']; ?>"/>
						</span>
						<span class="product-item-name">
							<?php echo $base_product['name'] ?>
						</span>

						<div class="product-item-by"><?php echo $base_product['creator_name'] ?></div>
					</li>

				</ul>

				<?php if ( $disabled ) { ?>


					<div class="disable-message text-center">

						<i class="fa fa-chevron-down down-icon" aria-hidden="true"></i>

						<h3><i class="fa fa-exclamation-triangle"
						       aria-hidden="true"></i> <?php _e( 'There Is No Active Plugin To Migrate!', WPMG_LOC ) ?>
						</h3>

						<div class="description">
							<?php
							_e( 'First install and active one of the following plugins and then go back to this page and refresh', WPMG_LOC );
							?>
						</div>
					</div>

				<?php } else { ?>
					<div class="choose-message text-center">

						<i class="fa fa-chevron-down down-icon" aria-hidden="true"></i>
						<h3><?php _e( 'What plugin you intend to migrate?' ) ?></h3>

					</div>
				<?php } ?>

			</div>

			<?php if ( $products ) : ?>

				<div class="wpmg-items ">

					<ul class="product-items text-center <?php
					if ( $disabled ) {
						echo ' disabled';
					}


					?>">
						<?php

						foreach ( $products as $product ) {

							$permalink = add_query_arg( 'destination', $product['id'] );
							?>
							<li class="product-item<?php echo isset( $active_plugins[ $product['id'] ] ) ? '' : ' disabled' ?>"
							    id="product-item-<?php echo esc_attr( $product['id'] ) ?>">
								<?php

								if ( ! empty( $product['badge'] ) ) {
									echo '<span class="product-item-badge">' . $product['badge'] . '</span>';
								}

								if ( mg_is_migration_paused( $source_product['id'], $product['id'], 'plugin' ) ) {
									echo '<a href="', $permalink, '" class="play-button"><i class="fa fa-play"></i></a>';
								}
								?>
								<span class="product-item-image">
							<img src="<?php echo $product ['thumbnail']; ?>"/>
						</span>
								<span class="product-item-name">
							<?php echo $product['name'] ?>
						</span>

								<div class="product-item-by"><?php echo $product['creator_name'] ?></div>

								<a href="<?php echo $permalink ?>"
								   class="bf-button bf-button-primary"><?php isset( $active_plugins[ $product['id'] ] ) ? _e( 'Select', WPMG_LOC ) : _e( 'Disabled', WPMG_LOC ) ?></a>

							</li>
						<?php } ?>
					</ul>

					<div class="error not-found" style="display: none;">
						<p>
							<?php _e( 'Not theme was found. please change your searching keyword!', WPMG_LOC ) ?>
						</p>
					</div>
				</div>

			<?php else: ?>

				<div class="error wp-migrator-support-error">
					<h2><?php _e( 'You cannot migrate the item', WPMG_LOC ) ?></h2>

					<div class="description">
						<p>
							<?php printf( __(
								'Unknown error occurred. please content betterstudio support'
								, WPMG_LOC
							), $current_theme ) ?>
						</p>
					</div>
				</div>

			<?php endif ?>
		</div>
	</div>
</div>