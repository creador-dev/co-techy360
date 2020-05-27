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

$style = ! empty( $options['layout'] ) ? $options['layout'] : 'style-1';

?>
<div class="bf-section-container bf-clearfix">
	<div class="bf-section-heading bf-clearfix <?php echo $style; ?>">
		<div class="bf-section-heading-title bf-clearfix">
			<h3><?php echo esc_html( $options['name'] ); ?></h3>
		</div>
		<?php if ( ! empty( $options['desc'] ) ) { ?>
			<div
					class="bf-section-heading-desc bf-clearfix"><?php echo wp_kses( $options['desc'], bf_trans_allowed_html() ); ?></div>
		<?php } ?>
	</div>
</div>
