<?php
if ( Migrator_Core_Connector::is_maintenance_mode() ) {

	return mg_view( 'server-error' );
}
?>
<div id="wp-migrator-panel" class="wp-migrator-panel">

	<header class="bf-page-header">
		<div class="bf-page-header-inner bf-clearfix">
			<h2 class="page-title"><?php _e( 'Publisher Migrator', WPMG_LOC ) ?></h2>
			<div class="page-desc"><p><?php _e( 'Switch to Publisher without losing data or shortcodes', WPMG_LOC ) ?></p></div>
		</div>
	</header>


	<div id="bf-nav"></div>

	<div id="wpmg-container" style="min-height: 50px;display: none;">

		<ul class="wpmg-tabs">

			<li class="active">
				<a href="#wpmg-themes">
					<?php _e( 'Themes', WPMG_LOC ) ?>
					<span class="count-badge"><?php echo $themes ? count( $themes ) : '0' ?></span>
				</a>
			</li>
			<li>
				<a href="#wpmg-plugins">
					<?php _e( 'Plugins', WPMG_LOC ) ?>
					<span class="count-badge"><?php echo $plugins ? count( $plugins ) : '0' ?></span>
				</a>
			</li>
		</ul>

		<div class="wpmg-products">

			<div id="wpmg-themes">

				<?php if ( $theme_migration_support && $themes ) : ?>

					<div class="wpmg-items">

						<div class="wpmg-items-search">
							<input type="text" name="search" data-type="theme"
							       placeholder="<?php esc_attr_e( 'Search your theme', WPMG_LOC ) ?>" autocomplete="off"
							       autofocus>
						</div>

						<ul class="product-items">
							<?php


							$base_url = mg_route( 'migrate' );

							foreach ( $themes as $theme ) {

								$permalink = add_query_arg( array(
									'item' => $theme['id'],
									'type' => 'theme'
								), $base_url );

								?>
								<li class="product-item" id="product-item-<?php echo esc_attr( $theme['id'] ) ?>">
									<?php if ( ! empty( $theme['badge'] ) ) {
										echo '<span class="product-item-badge">' . $theme['badge'] . '</span>';
									}

									if ( mg_is_migration_paused( $theme['id'], 'publisher', 'theme' ) ) {
										echo '<a href="', $permalink, '" class="play-button"><i class="fa fa-play"></i></a>';
									} ?>
									<span class="product-item-image">
							<img src="<?php echo $theme ['thumbnail']; ?>"/>
						</span>
									<span class="product-item-name">
							<?php echo $theme['name'] ?>
						</span>

									<div class="product-item-by"><?php echo $theme['creator_name'] ?></div>

									<a href="<?php echo $permalink ?>"
									   class="item-link"><?php echo $theme['name'] ?></a>
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
						<h2><?php _e( 'You cannot migrate your theme.', WPMG_LOC ) ?></h2>

						<div class="description">
							<p>
								<?php printf( __(
									'Sorry. your current theme (%s) is not currently supported. if you are excited about migrator plugin please tell us and we will add support for it if possible.'
									, WPMG_LOC
								), $current_theme ) ?>
							</p>
						</div>
					</div>

				<?php endif ?>
			</div>


			<div id="wpmg-plugins" style="display: none;">


				<?php if ( $plugin_migration_support && $plugins ) : ?>

					<div class="wpmg-items">

						<div class="wpmg-items-search">
							<input type="text" name="search" data-type="plugin"
							       placeholder="<?php esc_attr_e( 'Search plugin name', WPMG_LOC ) ?>"
							       autocomplete="off"
							       autofocus>
						</div>

						<ul class="product-items">
							<?php foreach ( $plugins as $plugin ) { ?>
								<li class="product-item" id="product-item-<?php echo esc_attr( $plugin['id'] ) ?>">
									<?php if ( ! empty( $plugin['badge'] ) ) {
										echo '<span class="product-item-badge">' . $plugin['badge'] . '</span>';
									} ?>
									<span class="product-item-image">
							<img src="<?php echo $plugin ['thumbnail']; ?>"/>
						</span>
									<span class="product-item-name">
							<?php echo $plugin['name'] ?>
						</span>

									<div class="product-item-by"><?php echo $plugin['creator_name'] ?></div>
									<a href="<?php echo mg_route( 'migrate', array(
										'item' => $plugin['id'],
										'type' => 'plugin'
									) ) ?>"
									   class="item-link"><?php echo $plugin['name'] ?></a>
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
						<h2><?php _e( 'You are not able to migrate any plugin.', WPMG_LOC ) ?></h2>

						<div class="description">
							<p>
								<?php printf( __(
									'it seems you don\'t have any plugin which need migration. '
									, WPMG_LOC
								), $current_theme ) ?>
							</p>
						</div>
					</div>

				<?php endif ?>

			</div>

		</div>
	</div>
</div>