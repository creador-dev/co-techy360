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


if ( isset( $options['file_name'] ) && ! empty( $options['file_name'] ) ) {
	$file_name = 'data-file_name="' . esc_attr( $options['file_name'] ) . '"';
} else {
	$file_name = '';
}


if ( isset( $options['panel_id'] ) && ! empty( $options['panel_id'] ) ) {
	$panel_id = 'data-panel_id="' . esc_attr( $options['panel_id'] ) . '"';
} else {
	return '';
}


?>
<div>
	<a class="bf-button bf-main-button"
	   id="bf-download-export-btn" <?php echo $file_name; // escaped before ?> <?php echo $panel_id; // escaped before ?>><i
			class="fa fa-download"></i> <?php esc_html_e( 'Download Backup', 'better-studio' ); ?></a>
</div>