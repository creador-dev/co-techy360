<?php

new Publisher_WooCommerce();


/**
 * Publisher WooCommerce Compatibility
 */
class Publisher_WooCommerce {

	/**
	 * Publisher_WooCommerce constructor.
	 */
	function __construct() {

		include PUBLISHER_THEME_PATH . 'includes/woocommerce/options/metabox.php';
		include PUBLISHER_THEME_PATH . 'includes/woocommerce/options/terms.php';

		add_theme_support( 'woocommerce' );

		add_filter( 'init', array( $this, 'init' ) );

		/*
		 * Hook in on activation
		 */
		global $pagenow;

		if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' ) {
			add_action( 'init', array( $this, 'image_sizing' ), 1 );
		}

		// Active and new shortcodes
		add_filter( 'better-framework/shortcodes', array( $this, 'setup_shortcodes' ), 100 );

		// Related posts args
		add_filter( 'woocommerce_output_related_products_args', 'Publisher_WooCommerce::related_products_args' );

		remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
		add_action( 'woocommerce_after_single_product_summary', 'Publisher_WooCommerce::woocommerce_output_upsells', 15 );

		//
		// Dynamic headings for blocks
		//
		add_action( 'woocommerce_edit_account_form_start', 'Publisher_WooCommerce::woocommerce_edit_account_form_start' );
		add_action( 'woocommerce_checkout_before_order_review', 'Publisher_WooCommerce::woocommerce_checkout_before_order_review' );
		add_action( 'woocommerce_before_checkout_billing_form', 'Publisher_WooCommerce::woocommerce_before_checkout_billing_form' );
		add_action( 'woocommerce_before_order_notes', 'Publisher_WooCommerce::woocommerce_before_order_notes' );
		add_action( 'woocommerce_before_cart_totals', 'Publisher_WooCommerce::woocommerce_before_cart_totals' );
		add_filter( 'woocommerce_pagination_args', 'Publisher_WooCommerce::woocommerce_pagination_args' );
		add_action( 'woocommerce_before_account_navigation', 'Publisher_WooCommerce::woocommerce_before_account_navigation' );
		add_action( 'woocommerce_order_details_before_order_table', 'Publisher_WooCommerce::woocommerce_order_details_before_order_table' );

	}


	/**
	 * Initialize
	 */
	function init() {

		// Enqueue scripts
		add_action( 'wp_enqueue_scripts', array( $this, 'register_assets' ) );

		if ( bf_is( 'ajax' ) ) {
			add_filter( 'post_class', array( $this, 'ajax_post_class_fix' ), 10, 3 );
		} else {
			add_filter( 'loop_shop_columns', array( $this, 'loop_columns' ) );
		}

		// change loop products count
		add_filter( 'loop_shop_per_page', array( $this, 'loop_shop_per_page' ), 20 );

		// chanage cart table code
		add_action( 'woocommerce_before_cart_table', array( $this, 'before_cart_table' ), 1 );
		add_action( 'woocommerce_after_cart_table', array( $this, 'after_cart_table' ), 1 );

		// adds 'total-items-in-cart' to cart ajax update fragment
		add_filter( 'woocommerce_add_to_cart_fragments', array( $this, 'add_to_cart_fragments' ) );
	}


	/**
	 * Callback: Used for adding total items in cart
	 * Filter: woocommerce_add_to_cart_fragments
	 *
	 * @param $fragments
	 *
	 * @return mixed
	 */
	public function add_to_cart_fragments( $fragments ) {

		global $woocommerce;

		$fragments['total-items-in-cart'] = $woocommerce->cart->cart_contents_count;

		return $fragments;

	}


	/**
	 * Callback: Changes product loop posts count
	 * Filter: loop_shop_per_page
	 *
	 * @param $col
	 *
	 * @return int
	 */
	public function loop_shop_per_page( $col ) {

		if ( publisher_get_page_layout() == '1-col' ) {
			return 12;
		} else {
			return 9;
		}

	}


	/**
	 * Callback: Setup image sizes for WooCommerce
	 * Action: Init
	 */
	public function image_sizing() {

		update_option( 'shop_catalog_image_size', array(
			'width'  => '300',
			'height' => '300',
			'crop'   => 1
		) );

		update_option( 'shop_single_image_size', array(
			'width'  => '600',
			'height' => '600',
			'crop'   => 1
		) );

		update_option( 'shop_thumbnail_image_size', array(
			'width'  => '180',
			'height' => '180',
			'crop'   => 1
		) );

	}


	/**
	 * Callback: Specifying Loop columns
	 * Filter: loop_shop_columns
	 *
	 * @return int
	 */
	public function loop_columns() {

		if ( publisher_get_prop( 'woocommerce-columns', 0 ) ) {
			return publisher_get_prop( 'woocommerce-columns' );
		}

		$layout_file = publisher_get_page_layout();
		$layout_file = $layout_file[0];

		if ( $layout_file === '2' ) {
			return 3;
		} elseif ( $layout_file === '1' ) {
			return 4;
		} elseif ( $layout_file === '3' ) {

			if ( $layout_file === '3-col-0' ) {
				return 4;
			} else {
				return 3;
			}
		} else {
			return 3;
		}

	}


	/**
	 * Action callback: Add WooCommerce assets
	 */
	public function register_assets() {

		bf_enqueue_style(
			'publisher-woocommerce',
			get_template_directory_uri() . '/css/woocommerce.css',
			array( 'publisher' ),
			get_template_directory() . '/css/woocommerce.css',
			Better_Framework()->theme()->get( 'Version' )
		);
	}


	/**
	 * Callback: Adds code before cart table
	 * Filter: woocommerce_before_cart_table
	 */
	function before_cart_table() {

		?>
		<div class="wc-cart">
		<h2 class="section-heading <?php echo publisher_get_block_heading_class(); ?>"><span
					class="h-text"><?php _e( 'Shopping Cart', 'woocommerce' ); ?></span></h2>
		<?php
	}


	/**
	 * Callback: Adds code after cart table
	 * Filter: woocommerce_after_cart_table
	 */
	function after_cart_table() {

		?>
		</div>
		<?php
	}


	/**
	 * Setups Shortcodes
	 *
	 * @param $shortcodes
	 *
	 * @return array
	 */
	function setup_shortcodes( $shortcodes ) {

		require bf_get_theme_dir( 'includes/woocommerce/shortcodes/bs-products-1.php' );
		$shortcodes['bs-products-1'] = array(
			'shortcode_class' => 'Publisher_Products_1_Shortcode',
		);

		// todo Port all WC widgets into shortcode as UI and use the_widget() inside of that ;)

		return $shortcodes;

	}


	/**
	 * Callback: Fixes ajax requests for posts class because WP is doing shit thing in post_class!
	 * Filter: post_class
	 *
	 * @param $classes
	 * @param $class
	 * @param $post_id
	 *
	 * @return array
	 */
	function ajax_post_class_fix( $classes, $class, $post_id ) {

		if ( ! $post_id || 'product' !== get_post_type( $post_id ) ) {
			return $classes;
		}

		$classes[] = 'product';

		return $classes;
	}


	/**
	 * Changes related posts args
	 *
	 * @param $args
	 *
	 * @return mixed
	 */
	public static function related_products_args( $args ) {

		$check = array(
			'1-col'   => '',
			'3-col-0' => '',
		);

		if ( isset( $check[ publisher_get_page_layout() ] ) ) {
			$args['posts_per_page'] = 4;
			$args['columns']        = 4;
		} else {
			$args['posts_per_page'] = 3;
			$args['columns']        = 3;
		}

		return $args;
	}


	/**
	 * Changes related posts args
	 *
	 * @return mixed
	 */
	public static function woocommerce_output_upsells() {

		$check = array(
			'1-col'   => '',
			'3-col-0' => '',
		);

		if ( isset( $check[ publisher_get_page_layout() ] ) ) {
			$columns = 4;
		} else {
			$columns = 3;
		}

		woocommerce_upsell_display( $columns, $columns );
	}


	/**
	 * @hooked woocommerce_edit_account_form_start
	 */
	public static function woocommerce_edit_account_form_start() {

		?>
		<h3 class="section-heading <?php echo publisher_get_block_heading_class(); ?>"><span
					class="h-text"><?php esc_html_e( 'Your Information', 'woocommerce' ); ?></span></h3>
		<?php
	}


	/**
	 * @hooked woocommerce_checkout_before_order_review
	 */
	public static function woocommerce_checkout_before_order_review() {

		?>
		<h3 id="order_review_heading" class="section-heading <?php echo publisher_get_block_heading_class(); ?>"><span
					class="h-text"><?php esc_html_e( 'Your order', 'woocommerce' ); ?></span></h3>
		<?php
	}


	/**
	 * @hooked woocommerce_before_checkout_billing_form
	 */
	public static function woocommerce_before_checkout_billing_form() {

		if ( wc_ship_to_billing_address_only() && WC()->cart->needs_shipping() ) : ?>

			<h3 class="section-heading <?php echo publisher_get_block_heading_class(); ?>"><span
						class="h-text"><?php _e( 'Billing &amp; Shipping', 'woocommerce' ); ?></span></h3>

		<?php else : ?>

			<h3 class="section-heading <?php echo publisher_get_block_heading_class(); ?>"><span
						class="h-text"><?php _e( 'Billing details', 'woocommerce' ); ?></span></h3>

		<?php endif;

	}


	/**
	 * @hooked woocommerce_before_order_notes
	 */
	public static function woocommerce_before_order_notes() {

		if ( apply_filters( 'woocommerce_enable_order_notes_field', 'yes' === get_option( 'woocommerce_enable_order_comments', 'yes' ) ) ) : ?>

			<?php if ( ! WC()->cart->needs_shipping() || wc_ship_to_billing_address_only() ) : ?>

				<h3 class="section-heading <?php echo publisher_get_block_heading_class(); ?>"><span
							class="h-text"><?php _e( 'Additional information', 'woocommerce' ); ?></span></h3>

			<?php endif; ?>

		<?php endif;

	}


	/**
	 * @hooked woocommerce_before_cart_totals
	 */
	public static function woocommerce_before_cart_totals() {

		?>
		<h2 class="section-heading <?php echo publisher_get_block_heading_class(); ?>"><span
					class="h-text"><?php esc_html_e( 'Cart Totals', 'woocommerce' ); ?></span></h2>
		<?php

	}


	/**
	 * @hooked woocommerce_pagination_args
	 *
	 * @param $args
	 *
	 * @return mixed
	 */
	public static function woocommerce_pagination_args( $args ) {

		if ( is_rtl() ) {
			$args['next_text'] = publisher_translation_get( 'pagination_next' ) . ' <i class="fa fa-angle-left"></i>';
			$args['prev_text'] = '<i class="fa fa-angle-right"></i> ' . publisher_translation_get( 'pagination_prev' );
		} else {
			$args['next_text'] = publisher_translation_get( 'pagination_next' ) . ' <i class="fa fa-angle-right"></i>';
			$args['prev_text'] = ' <i class="fa fa-angle-left"></i> ' . publisher_translation_get( 'pagination_prev' );
		}

		return $args;

	}


	/**
	 * @hooked woocommerce_before_account_navigation
	 */
	public static function woocommerce_before_account_navigation() {

		?>
		<h2 class="section-heading <?php echo publisher_get_block_heading_class(); ?>"><span
					class="h-text"><?php esc_html_e( 'Navigation', 'woocommerce' ); ?></span></h2>
		<?php

	}


	/**
	 * @hooked woocommerce_order_details_before_order_table
	 */
	public static function woocommerce_order_details_before_order_table() {

		?>
		<h2 class="woocommerce-order-details__title section-heading <?php echo publisher_get_block_heading_class(); ?>">
			<span class="h-text"><?php esc_html_e( 'Order details', 'woocommerce' ); ?></span>
		</h2>
		<?php

	}


}
