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
<div class="bf-section-container bf-clearfix">
	<div
			class="bf-section-info <?php echo esc_attr( $options['info-type'] ) . ' ' . esc_attr( $options['state'] ); ?> bf-clearfix">
		<div class="bf-section-info-title bf-clearfix">
			<h3><?php echo esc_html( $options['name'] ); ?></h3>
		</div>
		<div class="<?php echo esc_attr( $controls_classes ); ?>  bf-clearfix">
			<?php echo $input; // escaped before ?>
		</div>
	</div>
</div>