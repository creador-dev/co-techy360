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
 *  Our portfolio is here: https://betterstudio.com/
 *
 *  \--> BetterStudio, 2018 <--/
 */


if ( isset( $options['panel_id'] ) && ! empty( $options['panel_id'] ) ) {
	$panel_id = 'data-panel_id="' . esc_attr( $options['panel_id'] ) . '"';
} else {
	return '';
}

?>

<input type="file" <?php echo $panel_id; // escaped before ?> name="bf-import-file-input" id="bf-import-file-input"
       class="bf-import-file-input">

<a class="bf-import-upload-btn bf-button bf-main-button"><i
			class="fa fa-upload"></i><?php esc_html_e( 'Import', 'better-studio' ); ?></a>