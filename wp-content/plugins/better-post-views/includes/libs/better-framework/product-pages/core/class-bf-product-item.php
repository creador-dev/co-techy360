<?php
/***
 *  BetterFramework is BetterStudio framework for themes and plugins.
 *
 *  ______      _   _             ______                                           _
 *  | ___ \    | | | |            |  ___|                                         | |
 *  | |_/ / ___| |_| |_ ___ _ __  | |_ _ __ __ _ _ __ ___   _____      _____  _ __| | __
 *  | ___ \/ _ \ __| __/ _ \ '__| |  _| '__/ _` | '_ ` _ \ / _ \ \ /\ / / _ \| '__| |/ /
 *  | |_/ /  __/ |_| ||  __/ |    | | | | | (_| | | | | | |  __/\ V  V / (_) | |  |   <
 *  \____/ \___|\__|\__\___|_|    \_| |_|  \__,_|_| |_| |_|\___| \_/\_/ \___/|_|  |_|\_\
 *
 *  Copyright © 2017 Better Studio
 *
 *
 *  Our portfolio is here: http://themeforest.net/user/Better-Studio/portfolio
 *
 *  \--> BetterStudio, 2017 <--/
 */


/**
 * Class BF_Product_Item
 */
abstract class BF_Product_Item extends BF_Product_Pages_Base {

	public $data;

	public $id;


	abstract public function render_content( $item_data );

	protected function before_render() {

	}

	public function ajax_request( $params ) {

	}


	/**
	 * Display module main content
	 */
	public function render() {


		$page_elements = apply_filters( 'better-framework/product-pages/page/' . $this->id . '/config', array() );

		echo '<div class="wrap bs-product-item">';

		$this->header();

		$this->before_render();

		//call render_content method of children class
		call_user_func( array( $this, 'render_content' ), $page_elements );

		$this->append_hidden_fields();

		$this->after_render();

		do_action( 'better-framework/product-pages/page/' . $this->id . '/loaded', $this->id );

		echo '</div>';

	}

	protected function after_render() {

	}

	/**
	 * append hidden fields for ajax request
	 */
	protected function append_hidden_fields() {
		?>

		<form style="display: none;" id="bs-pages-hidden-params">

			<input type="hidden" name="active-page" id="bs-pages-current-id"
			       value="<?php echo esc_attr( $this->id ) ?>">

			<?php
			wp_nonce_field( 'bs-pages-' . $this->id, 'token', FALSE );

			?>
			<input type="hidden" name="action" value="bs_pages_ajax">

		</form>

		<?php
	}

	protected function get_tabs() {
		global $plugin_page;

		$settings = $this->get_config();

		$results = array();

		if ( isset( $settings['pages'] ) ) {

			foreach ( $settings['pages'] as $id => $menu ) {

				if ( empty( $menu['hide_tab'] ) ) {

					$page_slug = BF_Product_Pages::$menu_slug . "-$id";
					$active    = $page_slug === $plugin_page;

					if ( isset( $menu['type'] ) && $menu['type'] == 'tab_link' ) {
						$url = isset( $menu['tab_link'] ) ? $menu['tab_link'] : '';
					} else {
						$url = admin_url( 'admin.php?page=' . $page_slug );
					}

					$results[ $id ] = array(
						'url'     => $url,
						'active'  => $active,
						'label'   => isset( $menu['tab']['label'] ) ? $menu['tab']['label'] : $menu['name'],
						'classes' => isset( $menu['tab']['classes'] ) ? $menu['tab']['classes'] : '',
						'header'  => isset( $menu['tab']['header'] ) ? $menu['tab']['header'] : '',
					);
				}
			}

		}

		return $results;
	}

	protected function header() {

		?>
		<div class="bs-product-pages-tabs-wrapper">
			<ul class="bs-product-pages-tabs">
				<?php

				$tab_header = '';

				foreach ( $this->get_tabs() as $id => $tab ) {

					if ( empty( $tab['url'] ) ) {
						continue;
					}

					//generate classes
					$classes = array( 'tab' );

					if ( isset( $tab['classes'] ) ) {

						$classes = array_merge( $classes, (array) $tab['classes'] );
					}

					if ( empty( $tab['active'] ) ) {

						$classes = implode( ' ', array_map( 'sanitize_html_class', $classes ) );
						printf( '<li  class="%s"><a href="%s">%s</a></li>', $classes, esc_attr( $tab['url'] ), $tab['label'] );
					} else {

						$classes[] = 'bs-tab-active';

						if ( isset( $tab['header'] ) ) {
							$tab_header = $tab['header'];
						}
						$classes = implode( ' ', array_map( 'sanitize_html_class', $classes ) );
						printf( '<li  class="%s"><span>%s</span></li>', $classes, $tab['label'] );
					}
				}
				?>
			</ul>
			<div class="clear-fix"></div>
		</div>
		<?php if ( $tab_header ) : ?>
			<div class="description-bottom">
				<?php echo $tab_header; // escaped before ?>
			</div>
			<?php
		endif;

	} // header

} // BF_Product_Pages_Base