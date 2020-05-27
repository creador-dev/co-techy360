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


$hidden = Better_Framework::html()->add( 'input' )->type( 'hidden' )->name( $options['input_name'] )->val( '0' )->class( 'checkbox' );

// On Label
$on_label = __( 'On', 'better-studio' );
if ( isset( $options['on-label'] ) ) {
	$on_label = $options['on-label'];
}

// On Label
$off_label = __( 'Off', 'better-studio' );
if ( isset( $options['off-label'] ) ) {
	$off_label = $options['off-label'];
}

if ( $options['value'] ) {
	$on_checked  = 'selected';
	$off_checked = '';
	$hidden->attr( 'value', '1' );

} else {
	$on_checked  = '';
	$off_checked = 'selected';
}

if ( isset( $options['input_class'] ) ) {
	$hidden->class( $options['input_class'] );
}

?>
<div class="bf-switch bf-clearfix">

	<label
		class="cb-enable <?php echo esc_attr( $on_checked ); ?>"><span><?php echo esc_html( $on_label ); ?></span></label>
	<label class="cb-disable <?php echo esc_attr( $off_checked ); ?>"><span><?php echo esc_html( $off_label ); ?></span></label>
	<?php

	echo $hidden->display();  // escaped before

	?>
</div>