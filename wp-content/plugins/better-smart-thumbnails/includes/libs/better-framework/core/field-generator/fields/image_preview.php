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


$class = '';
$align = 'center';

if ( ! empty( $options['align'] ) ) {
	$align = $options['align'];
}

if ( ! empty( $options['class'] ) ) {
	$class = $options['class'];
}

if ( ( ! isset( $options['value'] ) || ! $options['value'] ) && isset( $options['std'] ) ) {
	$options['value'] = $options['std'];
}

?>
<div class="info-value <?php echo $class; // escaped before ?>"
     style="text-align: <?php echo $align; // escaped before ?>;">
	<?php foreach ( (array) $options['value'] as $k => $image ) { ?>
		<img class="image-<?php echo $k; ?>" src="<?php echo $image; // escaped before ?>"> 
	<?php } ?>
</div>
