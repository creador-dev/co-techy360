<div id="wp-migrator-panel" class="wp-migrator-panel">
	<header class="bf-page-header">
		<div class="bf-page-header-inner bf-clearfix">
			<h2 class="page-title"><?php printf( __( 'Migrate to %s', WPMG_LOC ), ucfirst( $destination_product['name'] ) ) ?></h2>

			<div class="page-desc">
				<p><?php _e( 'Switch to Publisher without losing data or shortcodes', WPMG_LOC ) ?></p></div>
		</div>
	</header>

	<div id="wpmg-container" class="wp-migration-page" style="display: none;">

		<form action="" method="post" id="wp-migrator-form">

			<ul class="product-items">

				<li class="product-item source-product">

					<span class="product-item-image">
						<img src="<?php echo $source_product['thumbnail']; ?>"/>
					</span>

					<span class="product-item-name">
						<?php echo $source_product['name'] ?>
					</span>

					<div class="product-item-by"><?php echo $source_product['creator_name'] ?></div>
				</li>

				<li class="product-item destination-product">

					<span class="product-item-image">
						<img src="<?php echo $destination_product['thumbnail']; ?>"/>
					</span>

					<span class="product-item-name">
						<?php echo $destination_product['name'] ?>
					</span>

					<div class="product-item-by"><?php echo $destination_product['creator_name'] ?></div>
				</li>

			</ul>
			<div class="migrator-loading single">

				<div class="loading-arrow"></div>
				<div class="loading-arrow b"></div>
				<div class="loading-arrow c"></div>
				<div class="loading-arrow d"></div>
				<div class="loading-arrow e"></div>
				<div class="loading-arrow f"></div>
				<div class="loading-arrow g"></div>
			</div>

			<div class="bf-clearfix"></div>

			<div class="migration-finished" style="display: none;">

				<div class="heading">
					<div class="icon">
						<i class="fa fa-check" aria-hidden="true"></i>
					</div>
					<h3><?php _e( 'Finished!', WPMG_LOC ) ?></h3>

					<div class="message"></div>

					<h4><?php _e( 'Process Information', WPMG_LOC ) ?></h4>
				</div>


				<div class="migrator-report bf-clearfix">
					<ul class="summery bf-clearfix">
						<li class="success">
							<i class="fa fa-check-circle"></i>

							<div class="text"><?php printf( __( 'Success: %s', WPMG_LOC ), '<span class="number"></span>' ) ?></div>
						</li>
						<li class="skipped">
							<i class="fa fa-exclamation-circle"></i>

							<div class="text"><?php printf( __( 'Skipped: %s', WPMG_LOC ), '<span class="number"></span>' ) ?></div>
						</li>
						<li class="warning">
							<i class="fa fa-times-circle"></i>
							<div class="text"><?php printf( __( 'Warning: %s', WPMG_LOC ), '<span class="number"></span>' ) ?></div>
						</li>
					</ul>
				</div>
			</div>


			<div class="migration-process-info bf-clearfix">

				<?php $label = __( 'Imported %s', WPMG_LOC ); ?>
				<div class="migration-process-loading" style="display: <?php echo ! $percentage ? 'none' : 'block' ?>;">
					<div class="mg-pages-progressbar"
					     style="visibility: visible; width: <?php echo intval( $percentage ); ?>%;z-index: 30;">
						<div class="bs-pages-progress"></div>

						<div class="mg-progressbar-bg">
							<i class="fa fa-refresh spin-icon" aria-hidden="true"></i>
							<?php printf( $label, '<span class="percentage">' . $percentage . '%</span>' ); ?>
						</div>
					</div>

					<i class="fa fa-refresh spin-icon" aria-hidden="true"></i>
					<?php printf( $label, '<span class="percentage">' . $percentage . '%</span>' ); ?>
				</div>

				<div class="migration-process-control started bf-clearfix disabled" style="display: none;">
					<a href="#" data-action="pause">
						<i class="fa fa-pause" aria-hidden="true"></i>
						<span>Pause importing</span>
					</a>
				</div>

				<?php if ( $settings ) { ?>
					<div class="migration-process-detail" style="display: none;">

						<div class="index"></div>
						<ul>
							<?php

							foreach ( $settings as $slug => $option ) {

								if ( ! empty( $option[3] ) ) { ?>
									<li class="<?php echo $slug; ?>" data-name="<?php echo $slug; ?>">
										<i class="fa fa-spinner fa-spin " aria-hidden="true"></i>
										<span class="text"><?php

											printf( __( '%s: %s item', WPMG_LOC ), $option[0], number_format_i18n( $option[3] ) );

											?></span>
									</li>
								<?php }
							}
							?>
						</ul>
					</div>

				<?php } ?>
			</div>

			<div class="migration-settings bf-clearfix<?php echo $percentage ? ' paused' : ' ' ?>">

				<ul class="migration-user-settings">
					<?php

					if ( $settings ) {

						foreach ( $settings as $slug => $option ) {

							$is_disabled = $option[1] === 'disabled';

							if ( $is_disabled ) {

								$status = 'deactivate';

							} elseif ( $option[1] ) {

								$status = 'active';

							} else {

								$status = 'none';
							}
							?>

							<li class="setting">

								<div class="bf-radio-group">

									<div class="bf-checkbox-multi-state<?php echo $is_disabled ? ' disabled' : '' ?>"
									     data-current-state="<?php echo $status ?>">

										<input name="settings[migrate][<?php echo $slug ?>]"
										       type="hidden"
										       value="<?php echo $status ?>"
										       class="bf-checkbox-status migrator-part">

										<?php if ( $is_disabled ) { ?>

											<span data-state="deactivate" class="bf-checkbox-active">
									<i class="fa fa-times" aria-hidden="true"></i>
								</span>

										<?php } else { ?>

											<span data-state="none"></span>
											<span data-state="active" class="bf-checkbox-active">
										<i class="fa fa-check" aria-hidden="true"></i></span>

										<?php } ?>
									</div>
									<span class="label" data-status="none"><?php echo $option[0] ?></span>

									<?php if ( ! empty( $option[2] ) ) { ?>

										<ul class="children">

											<?php

											foreach ( $option[2] as $child_id => $child_option ) {

												$is_disabled = $option[1] === 'disabled';

												?>
												<li class="setting">
													<div class="bf-checkbox-multi-state disabled"
													     data-current-state="<?php echo $status ?>">
														<?php /*
														<input type="hidden"
														       name="settings[migrate][<?php echo $slug, '_', $child_id; ?>]"
														       class="bf-checkbox-status"
														       value="<?php echo $is_disabled ? 'deactivate' : 'active' ?>">
														*/ ?>

														<?php if ( $is_disabled ) { ?>

															<span data-state="deactivate" class="bf-checkbox-active">
														<i class="fa fa-times" aria-hidden="true"></i>
													</span>

														<?php } else { ?>

															<span data-state="none"></span>
															<span data-state="active" class="bf-checkbox-active">
														<i class="fa fa-check" aria-hidden="true"></i>
													</span>

														<?php } ?>
													</div>
													<span class="label"
													      data-status="none"><?php echo $child_option[0] ?></span>
												</li>
											<?php } ?>
										</ul>

									<?php } ?>
								</div>
							</li>
							<?php
						}
					}
					?>

					<li class="force-switch">

						<div class="bf-radio-group">

							<div class="bf-checkbox-multi-state" data-current-state="none">
								<input name="settings[force]" type="hidden" value="none" class="bf-checkbox-status"
								       id="migrator-force-switch">

								<span data-state="none"></span>
								<span data-state="active" class="bf-checkbox-active">
										<i class="fa fa-check" aria-hidden="true"></i>
								</span>

							</div>
							<span class="label" data-status="none"><?php _e( 'Force Switch Posts.', WPMG_LOC ) ?></span>
							<p class="description">
								<?php _e( 'Use this option if you want to run the switcher on the posts that already switched before!', WPMG_LOC ) ?>
							</p>
						</div>
					</li>
				</ul>


				<div class="migration-button">

					<input type="hidden" name="migration_id" id="migration_id"
					       value="<?php echo esc_attr( $migration_id ) ?>">

					<input type="hidden" name="action" value="migration_steps">

					<input type="hidden" name="product"
					       value="<?php
					       printf( '%s:%s:%s',
						       $product_type,
						       esc_attr( $source_product['id'] ),
						       esc_attr( $destination_product['id'] )
					       );
					       ?>">


					<button class="fright bf-button bf-button-primary large" type="submit">

						<?php if ( $percentage ) { ?>
							<i class="fa fa-play" aria-hidden="true"></i>

							<?php printf( __( 'Resume Migration %s', WPMG_LOC ), ucfirst( $destination_product['name'] ) ) ?>

						<?php } else { ?>

							<i class="fa fa-refresh" aria-hidden="true"></i>

							<?php printf( __( 'Migrator to %s', WPMG_LOC ), ucfirst( $destination_product['name'] ) ) ?>

						<?php } ?>
					</button>

				</div>
			</div>
		</form>
	</div>
</div>