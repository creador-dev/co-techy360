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


if ( ! isset( $options['value']['family'] ) ) {

	$options['value']['family']  = 'Lato';
	$options['value']['variant'] = '';

}

$default = BF_Options::get_panel_std( $panel_id );
$default = isset( $default[ $options['id'] ] ) ? $default[ $options['id'] ] : '';

// prepare std id
if ( isset( $panel_id ) ) {
	$std_id = Better_Framework::options()->get_panel_std_id( $panel_id );
} else {
	$std_id = 'css';
}

$enabled = false;

if ( isset( $default[ $std_id ] ) ) {
	if ( isset( $default[ $std_id ]['enable'] ) ) {
		$enabled = true;
	}
} elseif ( isset( $default['std'] ) ) {
	if ( isset( $default['std']['enable'] ) ) {
		$enabled = true;
	}
}

if ( $enabled && ! isset( $options['value']['enable'] ) ) {
	$options['value']['enable'] = $default['std']['enable'];
}

// Get current font
$font = Better_Framework()->fonts_manager()->get_font( $options['value']['family'] );

if ( $enabled ) { ?>
	<div class="typo-fields-container bf-clearfix">
		<div class="typo-field-container">
			<div class="typo-enable-container"><?php

				$hidden = Better_Framework::html()->add( 'input' )->type( 'hidden' )->name( $options['input_name'] . '[enable]' )->val( $options['value']['enable'] ? '1' : 0 )->class( 'checkbox' );

				?>
				<div class="bf-switch bf-clearfix">
					<label
							class="cb-enable <?php echo esc_attr( $options['value']['enable'] ) ? 'selected' : ''; ?>"><span><?php esc_html_e( 'Enable', 'better-studio' ); ?></span></label>
					<label
							class="cb-disable <?php echo ! $options['value']['enable'] ? 'selected' : ''; ?>"><span><?php esc_html_e( 'Disable', 'better-studio' ); ?></span></label>
					<?php

					echo $hidden->display();  // escaped before

					?>
				</div>
			</div>
		</div>
	</div>
	<?php
}
?>
	<div class="typo-fields-container bf-clearfix">
		<span class="enable-disable"></span>
		<div class="typo-field-container font-family-container bf-select-option-container">
			<label><?php esc_html_e( 'Font Family:', 'better-studio' ); ?></label>
			<div class="select-placeholder bf-font-selector">
				<?php echo isset( $options['value']['family'] ) ? esc_attr( $options['value']['family'] ) : ' - ' ?>
			</div>
			<input type="hidden" name="<?php echo esc_attr( $options['input_name'] ); ?>[family]"
			       value="<?php echo isset( $options['value']['family'] ) ? esc_attr( $options['value']['family'] ) : '' ?>"
			       class="bf-font-family">
		</div>

		<div class="bf-select-option-container typo-field-container">
			<label
					for="<?php echo esc_attr( $options['input_name'] ); ?>[variant]"><?php esc_html_e( 'Font Weight:', 'better-studio' ); ?></label>
			<select name="<?php echo esc_attr( $options['input_name'] ); ?>[variant]"
			        id="<?php echo esc_attr( $options['input_name'] ); ?>-variants" class="font-variants">
				<?php

				Better_Framework()->fonts_manager()->get_font_variants_option_elements( $font, $options['value']['variant'] );

				?>
			</select>
		</div>

		<div class="bf-select-option-container typo-field-container">
			<label
					for="<?php echo esc_attr( $options['input_name'] ); ?>[subset]"><?php esc_html_e( 'Font Character Set:', 'better-studio' ); ?></label>
			<select name="<?php echo esc_attr( $options['input_name'] ); ?>[subset]"
			        id="<?php echo esc_attr( $options['input_name'] ); ?>-subset" class="font-subsets">
				<?php

				Better_Framework()->fonts_manager()->get_font_subset_option_elements( $font, $options['value']['subset'] );

				?>
			</select>
		</div>

		<?php

		$align = false;

		if ( isset( $default[ $std_id ] ) ) {
			if ( isset( $default[ $std_id ]['align'] ) ) {
				$align = true;
			}
		} elseif ( isset( $default['std'] ) ) {
			if ( isset( $default['std']['align'] ) ) {
				$align = true;
			}
		}

		if ( $align && ! isset( $options['value']['align'] ) ) {
			$options['value']['align'] = $default['std']['align'];
		}

		if ( $align ) { ?>
			<div class="bf-select-option-container  typo-field-container text-align-container">
				<label
						for="<?php echo esc_attr( $options['input_name'] ); ?>[align]"><?php esc_html_e( 'Text Align:', 'better-studio' ); ?></label>
				<?php
				$aligns = array(
					'inherit' => 'Inherit',
					'left'    => 'Left',
					'center'  => 'Center',
					'right'   => 'Right',
					'justify' => 'Justify',
					'initial' => 'Initial',
				);
				?>
				<select name="<?php echo esc_attr( $options['input_name'] ); ?>[align]"
				        id="<?php echo esc_attr( $options['input_name'] ); ?>-align">
					<?php foreach ( $aligns as $key => $align ) {
						echo '<option value="' . esc_attr( $key ) . '" ' . ( $key == $options['value']['align'] ? 'selected' : '' ) . '>' . esc_html( $align ) . '</option>';
					} ?>
				</select>
			</div>
		<?php } ?>

		<?php

		$transform = false;

		if ( isset( $default[ $std_id ] ) ) {
			if ( isset( $default[ $std_id ]['transform'] ) ) {
				$transform = true;
			}
		} elseif ( isset( $default['std'] ) ) {
			if ( isset( $default['std']['transform'] ) ) {
				$transform = true;
			}
		}

		if ( $transform && ! isset( $options['value']['transform'] ) ) {
			$options['value']['transform'] = $default['std']['transform'];
		}

		if ( $transform ) { ?>
			<div class="bf-select-option-container typo-field-container text-transform-container">
				<label
						for="<?php echo esc_attr( $options['input_name'] ); ?>[transform]"><?php esc_html_e( 'Text Transform:', 'better-studio' ); ?></label>
				<?php
				$transforms = array(
					'none'       => 'None',
					'capitalize' => 'Capitalize',
					'lowercase'  => 'Lowercase',
					'uppercase'  => 'Uppercase',
					'initial'    => 'Initial',
					'inherit'    => 'Inherit',
				);
				?>
				<select name="<?php echo esc_attr( $options['input_name'] ); ?>[transform]"
				        id="<?php echo esc_attr( $options['input_name'] ); ?>-transform" class="text-transform">
					<?php foreach ( $transforms as $key => $transform ) {
						echo '<option value="' . esc_attr( $key ) . '" ' . ( $key == $options['value']['transform'] ? 'selected' : '' ) . '>' . esc_html( $transform ) . '</option>';
					} ?>
				</select>
			</div>
		<?php } ?>


		<?php


		$size = false;

		if ( isset( $default[ $std_id ] ) ) {
			if ( isset( $default[ $std_id ]['size'] ) ) {
				$size = true;
			}
		} elseif ( isset( $default['std'] ) ) {
			if ( isset( $default['std']['size'] ) ) {
				$size = true;
			}
		}

		if ( $size && ! isset( $options['value']['size'] ) ) {
			$options['value']['size'] = $default['std']['size'];
		}

		if ( $size ) { ?>
			<div class="typo-field-container text-size-container">
				<label
						for="<?php echo esc_attr( $options['input_name'] ); ?>[size]"><?php esc_html_e( 'Font Size:', 'better-studio' ); ?></label>
				<div class="bf-field-with-suffix">
					<input type="text" name="<?php echo esc_attr( $options['input_name'] ); ?>[size]"
					       value="<?php echo esc_attr( $options['value']['size'] ); ?>" class="font-size"/><span
							class='bf-prefix-suffix bf-suffix'><?php esc_html_e( 'Pixel', 'better-studio' ); ?></span>
				</div>
			</div>
		<?php }

		//
		// Line Height
		//
		$line_height = false;

		if ( isset( $default[ $std_id ] ) ) {
			if ( isset( $default[ $std_id ]['line-height'] ) ) {
				$line_height_id = 'line-height';
				$line_height    = true;
			} elseif ( isset( $default[ $std_id ]['line_height'] ) ) {
				$line_height_id = 'line_height';
				$line_height    = true;
			}
		} elseif ( isset( $default['std'] ) ) {
			if ( isset( $default['std']['line-height'] ) ) {
				$line_height_id = 'line-height';
				$line_height    = true;
			} elseif ( isset( $default['std']['line_height'] ) ) {
				$line_height_id = 'line_height';
				$line_height    = true;
			}
		}

		if ( $line_height && ! isset( $options['value'][ $line_height_id ] ) ) {
			$options['value'][ $line_height_id ] = $default['std'][ $line_height_id ];
		}

		if ( $line_height ) { ?>
			<div class="typo-field-container text-height-container">
				<label><?php esc_html_e( 'Line Height:', 'better-studio' ); ?></label>
				<div class="bf-field-with-suffix ">
					<input type="text"
					       name="<?php echo esc_attr( $options['input_name'] ); ?>[<?php echo esc_attr( $line_height_id ); ?>]"
					       value="<?php echo esc_attr( $options['value'][ $line_height_id ] ); ?>" class="line-height"/><span
							class='bf-prefix-suffix bf-suffix'><?php esc_html_e( 'Pixel', 'better-studio' ); ?></span>
				</div>
			</div>
		<?php }


		//
		// Letter Spacing
		//
		$letter_spacing = false;

		if ( isset( $default[ $std_id ] ) ) {
			if ( isset( $default[ $std_id ]['letter-spacing'] ) ) {
				$letter_spacing = true;
			}
		} elseif ( isset( $default['std'] ) ) {
			if ( isset( $default['std']['letter-spacing'] ) ) {
				$letter_spacing = true;
			}
		}

		if ( $letter_spacing && ! isset( $options['value']['letter-spacing'] ) ) {
			$options['value']['letter-spacing'] = $default['std']['letter-spacing'];
		}

		if ( $letter_spacing ) { ?>
			<div class="typo-field-container text-height-container">
				<label><?php esc_html_e( 'Letter Spacing:', 'better-studio' ); ?></label>
				<div class="bf-field-with-suffix ">
					<input type="text" name="<?php echo esc_attr( $options['input_name'] ); ?>[letter-spacing]"
					       value="<?php echo esc_attr( $options['value']['letter-spacing'] ); ?>"
					       class="letter-spacing"/><span
							class='bf-prefix-suffix bf-suffix'><i class="fa fa-arrows-h"></i></span>
				</div>
			</div>
			<?php
		}


		//
		// Color field
		//
		$color = false;

		if ( isset( $default[ $std_id ] ) ) {
			if ( isset( $default[ $std_id ]['color'] ) ) {
				$color = true;
			}
		} elseif ( isset( $default['std'] ) ) {
			if ( isset( $default['std']['color'] ) ) {
				$color = true;
			}
		}

		if ( $color && ! isset( $options['value']['color'] ) ) {
			$options['value']['color'] = $default['std']['color'];
		}

		if ( $color ) {
			?>
			<div class="typo-field-container text-color-container">
				<label><?php esc_html_e( 'Color:', 'better-studio' ); ?></label>
				<div class="bs-color-picker-wrapper">
					<div class="bs-color-picker-stripe">
						<a class="wp-color-result" title="Select Color" data-current="Current Color"
						   style="background-color: <?php echo esc_attr( $options['value']['color'] ); ?>"></a>
					</div>

					<input type="text" name="<?php echo esc_attr( $options['input_name'] ) ?>[color]" value="<?php
					echo esc_attr( $options['value']['color'] )
					?>" class="bs-color-picker-value">
				</div>
			</div>

			<?php
		}
		?>

	</div>
<?php
