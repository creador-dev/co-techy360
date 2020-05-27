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
<div class="single-border border-<?php echo esc_attr( $border['type'] ); ?>"><?php

	if ( isset( $border['label'] ) ) {
		echo '<span class="border-label">' . wp_kses( $border['label'], bf_trans_allowed_html() ) . '</span>';
	}

	if ( in_array( 'width', $border ) ) {
		?>
		<span class="bf-field-with-suffix bf-field-with-prefix border-width">
        <span class='bf-prefix-suffix bf-prefix'><?php esc_html_e( 'Width:', 'better-studio' ); ?> </span><input
				type="text"
				name="<?php echo esc_attr( $options['input_name'] ); ?>[<?php echo esc_attr( $border['type'] ); ?>][width]"
				value="<?php echo esc_attr( $options['value'][ $border['type'] ]['width'] ); ?>"
				class="border-width"/><span
				class='bf-prefix-suffix bf-suffix'>px</span>
    </span>
		<?php
	}// width


	if ( in_array( 'style', $border ) ) {
		?>

		<span class="border-style-container"><?php
			$styles = array(
				'dotted' => __( 'Dotted', 'better-studio' ),
				'dashed' => __( 'Dashed', 'better-studio' ),
				'solid'  => __( 'Solid', 'better-studio' ),
				'double' => __( 'Double', 'better-studio' ),
				'groove' => __( 'Groove', 'better-studio' ),
				'ridge'  => __( 'Ridge', 'better-studio' ),
				'inset'  => __( 'Inset', 'better-studio' ),
				'outset' => __( 'Outset', 'better-studio' ),
			);

			?>
			<select
				name="<?php echo esc_attr( $options['input_name'] ); ?>[<?php echo esc_attr( $border['type'] ); ?>][style]"
				class="border-style">
				<?php foreach ( $styles as $key => $style ) {
					echo '<option value="' . esc_attr( $key ) . '" ' . ( $key == $options['value'][ $border['type'] ]['style'] ? 'selected' : '' ) . '>' . esc_html( $style ) . '</option>';
				} ?>
			</select>
        </span>

		<?php
	} //style

	if ( in_array( 'color', $border ) ) {

		echo '<span>';

		$input = Better_Framework::html()->add( 'input' )->type( 'text' )->name( $options['input_name'] . '[' . $border['type'] . '][color]' )->class( 'bf-color-picker' );

		$preview = Better_Framework::html()->add( 'div' )->class( 'bf-color-picker-preview' );

		if ( ! empty( $options['value'][ $border['type'] ]['color'] ) ) {
			$input->value( $options['value'][ $border['type'] ]['color'] )->css( 'border-color', $options['value'][ $border['type'] ]['color'] );
			$preview->css( 'background-color', $options['value'][ $border['type'] ]['color'] );
		}

		echo $input->display(); // escaped before
		echo $preview->display(); // escaped before
		echo '</span>';

	}

	?>
</div>