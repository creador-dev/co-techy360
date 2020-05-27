<div class="bs-welcome-page-wrap">

	<div class="bs-welcome-header">

		<?php

		$custom_title = publisher_white_label_get_option( 'welcome_title' );
		$custom_text  = publisher_white_label_get_option( 'welcome_text' );

		?>

		<?php if ( ! $custom_title && ! $custom_text ) { ?>
			<a href="http://betterstudio.com/" target="_blank"><img
						style=" box-shadow: 0 0 29px #e2e2e2;" class="bs-welcome-thumbnail"
						src="<?php echo bf_get_theme_uri( 'includes/pages/assets/images/thumbnail.jpg' ); ?>"></a>
		<?php } ?>

		<h1><?php echo $custom_title ? $custom_title : sprintf( esc_html__( 'Welcome to %s', 'publisher' ), publisher_white_label_get_option( 'publisher' ) ); ?>
			<div class="bs-welcome-version">V<?php echo Better_Framework()->theme()->get( 'Version' ); ?></div>
		</h1>
		<div class="welcome-text">
			<?php

			if ( $custom_text ) {
				echo wpautop( do_shortcode( $custom_text ) );
			} else {
				esc_html_e( 'Thank you for choosing the best theme we have ever build! we did a lot of pressure to release this great
			product and we will offer our 5 star support to this theme for fixing all the issues and adding more
			features.', 'publisher' );
			} ?>
		</div>
	</div>

	<?php
	$reg_info = bf_register_product_get_info();

	if ( ! isset( $reg_info['status'] ) || $reg_info['status'] !== 'success' ) :

		$desc = sprintf( __( 'Your license of %s is not registered. Place your license code to unlock automatic updates, access to support, and Plugins. <a target="_blank" href="https://betterstudio.com/account/license-manager/">Get the license code</a> from your BetterStudio account and paste it in following box.', 'publisher' ), publisher_white_label_get_option( 'publisher' ) );

		?>
		<hr>
		<div class="bs-register-product bf-clearfix">
			<?php
			$page = isset( $_GET['page'] ) ? $_GET['page'] : '';
			bf_product_box( array(
				'icon'        => 'fa-unlock',
				'header'      => sprintf( __( 'Register %s', 'publisher' ), publisher_white_label_get_option( 'publisher' ) ),
				'has_loading' => true,
				'description' => '
		<div class="bs-product-desc">
		<div class="bs-icons-list">
            <i class="fa fa-lock register-product-icon" aria-hidden="true"></i>
			<i class="fa fa-key register-product-icon" aria-hidden="true"></i>
			<i class="fa fa-unlock register-product-icon" aria-hidden="true"></i>
        </div>
        <p>
        		' . $desc . '
		</p>
        </div>

        <form action="" id="bs-register-product-form">
        	' . wp_nonce_field( 'bs-register-product', 'bs-register-token', false ) . '
        	<input type="hidden" name="page" value="' . esc_attr( $page ) . '" >
        	<input type="text" name="bs-purchase-code" id="bs-purchase-code" class="bs-purchase-code" placeholder="' . esc_attr__( 'Enter Code and Hit Enter', 'publisher' ) . '">
		</form>

		',
				'classes'     => array( 'bs-fullwidth-box' )
			) );
			?>
		</div>
	<?php endif ?>
	<hr>

	<?php if ( ! $custom_text ) { ?>
		<div class="bs-welcome-intro-section bf-columns-2 bf-clearfix">
			<div class="bf-column">
				<h3><?php esc_html_e( 'Quick Start:', 'publisher' ); ?></h3>
				<p><?php echo wp_kses( sprintf( __( 'You can start using theme simply by installing Visual Composer plugin. Also there is more plugins for
				social counter, post views, ads manager ... that you can install them from our <a
					href="%s">plugin
					installer</a>.', 'publisher' ), admin_url( 'admin.php?page=bs-product-pages-install-plugin' ) ), bf_trans_allowed_html() ); ?></p>
				<p><?php echo wp_kses( sprintf( __( 'If you need setup your site like %s demos, you can use the <a
					href="%s">Demo Installer</a>
				that can do it for you with only <em>one click</em>.', 'publisher' ), publisher_white_label_get_option( 'publisher' ), admin_url( 'admin.php?page=bs-product-pages-install-demo' ) ), bf_trans_allowed_html() ); ?></p>
			</div>

			<div class="bf-column bf-text-right">
				<img style=" box-shadow: 0 0 29px #e2e2e2;"
				     src="<?php echo bf_get_theme_uri( 'includes/pages/assets/images/banner.jpg' ); ?>">
			</div>
		</div>

		<hr>

	<?php } ?>


	<?php

	if ( $support_list = apply_filters( 'better-framework/product-pages/support/config', array() ) ) :

		?>
		<div class="bs-product-pages-box-container bf-clearfix">
			<?php

			$_check = array();

			if ( isset( $support_list['documentation'] ) ) {
				$_check[] = 'documentation';
			}

			if ( isset( $support_list['video-tutorials'] ) ) {
				$_check[] = 'video-tutorials';
			}

			if ( isset( $support_list['knowledge-base'] ) ) {
				$_check[] = 'knowledge-base';
			}

			foreach ( $_check as $support_data ) {

				$support_list[ $support_data ]['classes'][] = 'fix-height-1';

				bf_product_box( $support_list[ $support_data ] );
			}

			unset( $_check );

			?>
		</div>
		<?php

	endif;

	?>
</div>