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

?>
<div class="bf-section-container bf-clearfix">
	<div
			class="bf-section bf-section-image-preview bf-clearfix">
		<?php if ( ! empty( $options['name'] ) ) { ?>
			<div class="bf-section-info-title bf-clearfix">
				<h3><?php echo esc_html( $options['name'] ); ?></h3>
			</div>
		<?php } ?>
		<div class="<?php echo isset( $controls_classes ) ? esc_attr( $controls_classes ) : ''; ?>  bf-clearfix">
			<?php echo $input; // escaped before ?>
		</div>
	</div>
</div>
