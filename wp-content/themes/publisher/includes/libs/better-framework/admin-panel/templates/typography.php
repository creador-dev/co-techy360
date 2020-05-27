<?php
$classes = $this->get_classes( $options );
$iri     = isset( $options['repeater_item'] ) && $options['repeater_item'] == true; // Is this section for a repeater item

$section_classes = $classes['section'];

$heading_classes  = $classes['heading'];
$controls_classes = $classes['controls'];
$explain_classes  = $classes['explain'];

if ( $iri ) {

	$section_classes  .= ' ' . $classes['repeater-section'];
	$heading_classes  .= ' ' . $classes['repeater-heading'];
	$controls_classes .= ' ' . $classes['repeater-controls'];
	$explain_classes  .= ' ' . $classes['repeater-explain'];

} else {

	$section_classes  .= ' ' . $classes['nonrepeater-section'];
	$heading_classes  .= ' ' . $classes['nonrepeater-heading'];
	$controls_classes .= ' ' . $classes['nonrepeater-controls'];
	$explain_classes  .= ' ' . $classes['nonrepeater-explain'];

}

$section_classes  .= ' ' . $classes['section-class-by-filed-type'];
$heading_classes  .= ' ' . $classes['heading-class-by-filed-type'];
$controls_classes .= ' ' . $classes['controls-class-by-filed-type'];
$explain_classes  .= ' ' . $classes['explain-class-by-filed-type'];

?>
<div class="bf-section-container bf-admin-panel bf-clearfix" data-id="<?php echo esc_attr( $options['id'] ); ?>"
	<?php echo bf_show_on_attributes( $options ); ?>>

	<div class="<?php echo esc_attr( $section_classes ); ?> bf-clearfix"
	     data-id="<?php echo esc_attr( $options['id'] ); ?>">

		<div class="<?php echo esc_attr( $heading_classes ); ?> bf-clearfix">
			<h3><label><?php echo esc_attr( $options['name'] ); ?></label></h3>
		</div>

		<div class="<?php echo esc_attr( $controls_classes ); ?> bf-clearfix">
			<?php echo $input; // escaped before in generating ?>
		</div>

		<?php if ( isset( $options['preview'] ) && $options['preview'] ) { ?>
			<div class="<?php echo esc_attr( $explain_classes ); ?> bf-clearfix">
				<?php if ( isset( $options['desc'] ) && ! empty( $options['desc'] ) ) { ?>
					<div class="typography-desc">
						<?php echo wp_kses( $options['desc'], bf_trans_allowed_html() ); ?>
					</div>
				<?php } ?>

				<?php if ( ! isset( $options['preview_tab'] ) ) {
					$options['preview_tab'] = 'title';
				}
				?>
				<a class="load-preview-texts"
				   href="javascript: void(0);"><?php esc_html_e( 'Load Preview', 'publisher' ); ?></a>
				<div class="typography-preview">
					<ul class="preview-tab bf-clearfix">
						<li class="tab <?php echo $options['preview_tab'] == 'title' ? 'current' : ''; ?>"
						    data-tab="title"><a
									href="javascript: void(0);"><?php esc_html_e( 'Heading', 'publisher' ); ?></a>
						</li>
						<li class="tab <?php echo $options['preview_tab'] == 'paragraph' ? 'current' : ''; ?>"
						    data-tab="paragraph"><a
									href="javascript: void(0);"><?php esc_html_e( 'Paragraph', 'publisher' ); ?></a>
						</li>
						<li class="tab <?php echo $options['preview_tab'] == 'divided' ? 'current' : ''; ?>"
						    data-tab="divided"><a
									href="javascript: void(0);"><?php esc_html_e( 'Divided', 'publisher' ); ?></a>
						</li>
					</ul>

					<p class="preview-text <?php echo $options['preview_tab'] == 'title' ? 'current' : ''; ?> title">
						<?php if ( isset( $options['preview_text'] ) && ! empty( $options['preview_text'] ) ) {
							echo esc_html( $options['preview_text'] );
						} else {
							echo bf_get_option( 'typo_text_heading', 'better-framework-custom-fonts' );
						} ?>
					</p>
					<p class="preview-text paragraph <?php echo $options['preview_tab'] == 'paragraph' ? 'current' : ''; ?>">
						<?php if ( isset( $options['preview_text'] ) && ! empty( $options['preview_text'] ) ) {
							echo esc_html( $options['preview_text'] );
						} else {
							echo bf_get_option( 'typo_text_paragraph', 'better-framework-custom-fonts' );
						} ?>
					</p>

					<p class="preview-text divided <?php echo $options['preview_tab'] == 'divided' ? 'current' : ''; ?>">
						<?php if ( isset( $options['preview_text'] ) && ! empty( $options['preview_text'] ) ) {
							echo esc_html( $options['preview_text'] );
						} else {
							echo bf_get_option( 'typo_text_divided', 'better-framework-custom-fonts' );

						} ?>
					</p>

				</div>
			</div>
		<?php } ?>
	</div>
</div>
