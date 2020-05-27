<?php

$classes = $this->get_classes( $options );
$iri     = isset( $options['repeater_item'] ) && $options['repeater_item'] == TRUE; // Is this section for a repeater item

$section_classes = $classes['section'] . ' bf-widget-field-section';

$heading_classes  = $classes['heading'] . ' bf-heading';
$controls_classes = $classes['controls'] . ' bf-control not-prepared';
$explain_classes  = $classes['explain'] . ' bf-desc';

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


if ( ! isset( $options['info-type'] ) ) {
	$options['info-type'] = 'info';
}

if ( ! isset( $options['state'] ) ) {
	$options['state'] = 'open';
}

?>
<div class="bf-section-container bf-admin-panel bf-clearfix" <?php echo bf_show_on_attributes( $options ); ?>>

	<div
		class="bf-section-info <?php echo esc_attr( $options['info-type'] ); ?> <?php echo esc_attr( $options['state'] ); ?> bf-clearfix">
		<div class="bf-section-info-title bf-clearfix">
			<h3><?php

				switch ( $options['info-type'] ) {

					case 'help':
						echo '<i class="fa fa-support"></i> ';
						break;

					case 'info':
						echo '<i class="fa fa-info"></i> ';
						break;

					case 'warning':
						echo '<i class="fa fa-warning"></i> ';
						break;

					case 'danger':
						echo '<i class="fa fa-exclamation"></i> ';
						break;

					default:
						echo '<i class="fa fa-info"></i> ';
						break;


				}

				echo esc_html( $options['name'] ); ?></h3>
		</div>
		<div class="<?php echo esc_attr( $controls_classes ); ?>  bf-clearfix">
			<?php echo $input; // escaped before in generating ?>
		</div>
	</div>
</div>