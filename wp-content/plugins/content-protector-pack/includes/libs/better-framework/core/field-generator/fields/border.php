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


// border param must be set
if ( ! isset( $options['border'] ) ) {
	return '';
}

// All Borders
if ( isset( $options['border']['all'] ) ) {

	$border         = $options['border']['all'];
	$border['type'] = 'all';

	include BF_PATH . 'core/field-generator/fields/partial-border.php';

} // Specified borders
else {

	// Top Border
	if ( isset( $options['border']['top'] ) ) {

		$border          = $options['border']['top'];
		$border['type']  = 'top';
		$border['label'] = __( 'Top Border:', 'better-studio' );

		include BF_PATH . 'core/field-generator/fields/partial-border.php';

	}

	// Right Border
	if ( isset( $options['border']['right'] ) ) {

		$border          = $options['border']['right'];
		$border['type']  = 'right';
		$border['label'] = __( 'Right Border:', 'better-studio' );

		include BF_PATH . 'core/field-generator/fields/partial-border.php';

	}

	// Bottom Border
	if ( isset( $options['border']['bottom'] ) ) {

		$border          = $options['border']['bottom'];
		$border['type']  = 'bottom';
		$border['label'] = __( 'Bottom Border:', 'better-studio' );

		include BF_PATH . 'core/field-generator/fields/partial-border.php';

	}

	// Left Border
	if ( isset( $options['border']['left'] ) ) {

		$border          = $options['border']['left'];
		$border['type']  = 'left';
		$border['label'] = __( 'Left Border:', 'better-studio' );

		include BF_PATH . 'core/field-generator/fields/partial-border.php';

	}

}
