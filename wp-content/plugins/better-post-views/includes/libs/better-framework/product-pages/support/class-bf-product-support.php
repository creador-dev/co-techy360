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
 * Class BF_Product_Support
 */
class BF_Product_Support extends BF_Product_Item {

	public $id = 'support';


	protected function before_render() {
		?>

		<style>
			.bf-btn-primary {
				padding: 3px 13px;
			}

			.bs-pages-secondary-btn {
				background: none;
				border: none;
				color: #a9a9a9;
			}
		</style>
		<?php
	}


	public function render_content( $options ) {

		//todo: hide support links when product was not resisted
		if ( $support_list = apply_filters( 'better-framework/product-pages/support/config', array() ) ) :

			?>
			<div class="bs-product-pages-box-container bf-clearfix">

				<?php
				foreach ( $support_list as $support_data ) {

					$support_data['classes'] = array( 'fix-height-1' );
					bf_product_box( $support_data );
				}
				?>
			</div>

			<?php
		else:

			$this->error( 'no support registered' );
		endif;
	}
}
