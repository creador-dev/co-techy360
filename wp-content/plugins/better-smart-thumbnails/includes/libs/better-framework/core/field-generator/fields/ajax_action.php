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

?>
<div class="bf-ajax_action-field-container"><?php

	if ( isset( $options['confirm'] ) ) {
		$confirm = ' data-confirm="' . esc_attr( $options['confirm'] ) . '" ';
	} else {
		$confirm = '';
	}

	?>
	<a class="bf-action-button bf-button bf-main-button" data-callback="<?php echo esc_attr( $options['callback'] ); ?>"
		<?php if ( ! empty( $options['js-event'] ) ) printf( 'data-event="%s"', esc_attr( $options['js-event'] ) ) ?>
	   data-token="<?php echo esc_attr( Better_Framework::callback_token( $options['callback'] ) ) ?>" <?php echo $confirm; // escaped before ?>><?php echo $options['button-name']; // escaped before ?></a>
</div>
