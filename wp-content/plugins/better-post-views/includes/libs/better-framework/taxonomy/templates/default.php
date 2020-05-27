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


$classes = $this->get_classes( $options );
$iri     = isset( $options['repeater_item'] ) && $options['repeater_item'] == TRUE; // Is this section for a repeater item

$section_classes   = $classes['section'];
$container_classes = $classes['container'];

$heading_classes  = $classes['heading'];
$controls_classes = $classes['controls'];
$explain_classes  = $classes['explain'];

if ( $iri ) {

	$section_classes .= ' ' . $classes['repeater-section'];
	$heading_classes .= ' ' . $classes['repeater-heading'];
	$controls_classes .= ' ' . $classes['repeater-controls'];
	$explain_classes .= ' ' . $classes['repeater-explain'];

} else {

	$section_classes .= ' ' . $classes['nonrepeater-section'];
	$heading_classes .= ' ' . $classes['nonrepeater-heading'];
	$controls_classes .= ' ' . $classes['nonrepeater-controls'];
	$explain_classes .= ' ' . $classes['nonrepeater-explain'];

}

$section_classes .= ' ' . $classes['section-class-by-filed-type'];
$heading_classes .= ' ' . $classes['heading-class-by-filed-type'];
$controls_classes .= ' ' . $classes['controls-class-by-filed-type'];
$explain_classes .= ' ' . $classes['explain-class-by-filed-type'];

if ( ! isset( $options['desc'] ) || empty( $options['desc'] ) ) {
	$controls_classes .= ' ' . 'no-desc';
}


$section_attr = $this->get_section_filter_attr( $options );

?>
<div
	class="<?php echo esc_attr( $container_classes ); ?> bf-metabox bf-clearfix" <?php echo $section_attr// escaped before; ?>>
	<div class="<?php echo esc_attr( $section_classes ); ?> bf-clearfix"
	     data-id="<?php echo esc_attr( $options['id'] ); ?>">

		<div class="<?php echo esc_attr( $heading_classes ); ?> bf-clearfix">
			<h3><label><?php echo esc_attr( $options['name'] ); ?></label></h3>
		</div>

		<div class="<?php echo esc_attr( $controls_classes ); ?> bf-clearfix">
			<?php echo $input; // escaped before ?>
		</div>

		<?php if ( ! empty( $options['desc'] ) ) { ?>
			<div
				class="<?php echo esc_attr( $explain_classes ); ?> bf-clearfix"><?php echo wp_kses( $options['desc'], 'better-studio' ); ?></div>
		<?php } ?>

	</div>
</div>