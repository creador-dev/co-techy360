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

if ( ! isset( $options['id'] ) ) {
	$options['id'] = '';
}
$style = ! empty( $options['layout'] ) ? $options['layout'] : 'style-1';

$parent_only = isset( $option['parent_only'] ) ? ' data-parent_only="true"' : '';

// Block Classes
$block_class = array();
if ( isset( $options['width'] ) && ! empty( $options['width'] ) ) {
	$block_class[] = 'description-' . $options['width'];
} else {
	$block_class[] = 'description-wide';
}

if ( isset( $options['class'] ) && ! empty( $options['class'] ) ) {
	$block_class[] = $options['class'];
}

$block_class[] = 'bf-field-' . $options['id'];

$block_class = apply_filters( 'better-framework/menu/fields-class', $block_class );


?>
<div
		class="bf-section-container bf-menus bf-clearfix <?php echo esc_attr( implode( ' ', $block_class ) ); ?>" <?php echo $parent_only;  // escaped before ?> <?php echo bf_show_on_attributes( $options ); ?>>
	<div class="bf-section-heading bf-clearfix <?php echo $style; ?>"
	     data-id="<?php echo esc_attr( $options['id'] ); ?>"
	     id="<?php echo esc_attr( $options['id'] ); ?>">
		<div class="bf-section-heading-title bf-clearfix">
			<h3><?php echo esc_html( $options['name'] ); ?></h3>
		</div>
		<?php if ( ! empty( $options['desc'] ) ) { ?>
			<div
					class="bf-section-heading-desc bf-clearfix"><?php echo wp_kses( $options['desc'], bf_trans_allowed_html() ); ?></div>
		<?php } ?>
	</div>
</div>
