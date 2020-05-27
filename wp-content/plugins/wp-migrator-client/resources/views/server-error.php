<?php

$is_maintenance = Migrator_Core_Connector::is_maintenance_mode();

?>
<div id="wp-migrator-panel" class="wp-migrator-panel">

	<div id="wpmg-container" style="min-height: 50px;display: none;">

		<div class="error wp-migrator-support-error">
			<h2>
				<?php
				if ( $is_maintenance ) {

					_e( 'Migration is not available.', WPMG_LOC );

				} else {
					_e( 'Server error', WPMG_LOC );
				}
				?>
			</h2>

			<div class="description">
				<?php
				if ( $is_maintenance ) {

					echo Migrator_Core_Connector::maintenance_mode_message();

				} else {

					echo '<p>';
					printf(
						__( 'Cannot connect to migrator server.Please wait for several minutes and try again or open a new support ticket on %s', WPMG_LOC ),
						'<a href="http://wpmigrator.io/support">Support Center</a>'
					);
					echo '</p>';
				}
				?>
			</div>
		</div>
	</div>
</div>