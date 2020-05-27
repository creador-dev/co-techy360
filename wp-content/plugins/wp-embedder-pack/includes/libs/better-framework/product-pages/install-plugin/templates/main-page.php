<?php

BF_Product_Plugin_Installer::flush_cache();

$list_table->prepare_items();
$list_table->views();
?>

	<form class="search-form search-plugins" method="get">
		<input type="hidden" name="plugin_status" value="<?php echo esc_attr( $status ) ?>"/>
		<input type="hidden" name="paged" value="<?php echo esc_attr( $page ) ?>"/>
		<input type="hidden" name="page"
		       value="<?php echo isset( $_REQUEST['page'] ) ? esc_attr( $_REQUEST['page'] ) : '' ?>"/>

		<?php $list_table->search_box( __( 'Search Installed Plugins', 'better-studio' ), 'plugin' ); ?>
	</form>

	<form method="post" id="bulk-action-form">

		<input type="hidden" name="verify-delete" value="0" id="verify-delete-input"/>
		<input type="hidden" name="plugin_status" value="<?php echo esc_attr( $status ) ?>"/>
		<input type="hidden" name="paged" value="<?php echo esc_attr( $page ) ?>"/>
		<input type="hidden" name="page"
		       value="<?php echo isset( $_REQUEST['page'] ) ? esc_attr( $_REQUEST['page'] ) : '' ?>"/>

		<?php $list_table->display(); ?>


		<input type="hidden" id="current-plugin-status"
		       value="<?php echo isset( $_GET['plugin_status'] ) ? esc_attr( $_GET['plugin_status'] ) : 'all' ?>">
	</form>
<?php
