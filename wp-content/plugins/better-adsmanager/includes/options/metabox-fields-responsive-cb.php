<?php

$universal_ads_size = array(
	'240_240'  => '240 x 400 - ' . __( 'Regional ad sizes', 'better-studio' ),
	'580_400'  => '580 x 400 - ' . __( 'Regional ad sizes', 'better-studio' ),
	'250_360'  => '250 x 360 - ' . __( 'Regional ad sizes', 'better-studio' ),
	'980_120'  => '980 x 120 - ' . __( 'Regional ad sizes', 'better-studio' ),
	'750_100'  => '750 x 100 - ' . __( 'Regional ad sizes', 'better-studio' ),
	'750_200'  => '750 x 200 - ' . __( 'Regional ad sizes', 'better-studio' ),
	'750_300'  => '750 x 300 - ' . __( 'Regional ad sizes', 'better-studio' ),
	'930_180'  => '930 x 180 - ' . __( 'Regional ad sizes', 'better-studio' ),
	'120_90'   => '120 x 90',
	'120_240'  => '120 x 240',
	'120_600'  => '120 x 600',
	'125_125'  => '125 x 125',
	'160_160'  => '160 x 90',
	'160_600'  => '160 x 600',
	'180_90'   => '180 x 90',
	'180_150'  => '180 x 150',
	'200_90'   => '200 x 90',
	'200_200'  => '200 x 200',
	'234_60'   => '234 x 60',
	'250_250'  => '250 x 250',
	'320_100'  => '320 x 100',
	'300_250'  => '300 x 250',
	'300_600'  => '300 x 600',
	'300_1050' => '300 x 1050',
	'320_50'   => '320 x 50',
	'336_280'  => '336 x 280',
	'360_300'  => '360 x 300',
	'435_300'  => '435 x 300',
	'468_15'   => '468 x 15',
	'468_60'   => '468 x 60',
	'640_165'  => '640 x 165',
	'640_190'  => '640 x 190',
	'640_300'  => '640 x 300',
	'728_15'   => '728 x 15',
	'728_90'   => '728 x 90',
	'970_90'   => '970 x 90',
	'970_250'  => '970 x 250',
);

$size_list = array(
	'' => 'Auto',
	array(
		'label'   => __( 'General Shapes', 'better-studio' ),
		'options' => array(
			'rectangle'  => __( 'Rectangle Ad', 'better-studio' ),
			'vertical'   => __( 'Vertical Ad', 'better-studio' ),
			'horizontal' => __( 'Horizontal Ad', 'better-studio' ),
		),
	),
	array(
		'label'   => __( 'Universal Ad Sizes', 'better-studio' ),
		'options' => apply_filters( 'better-ads/universal-ad-sizes', $universal_ads_size ),
	),
);

?>
<table class="better-ads-table resp-table">
	<thead>
	<tr>
		<th class="td-device"><?php esc_html_e( 'Device', 'better-studio' ); ?></th>
		<th class="td-show"><?php esc_html_e( 'Show / Hide', 'better-studio' ); ?></th>
		<th class="td-size"><?php esc_html_e( 'Custom Size', 'better-studio' ); ?></th>
	</tr>
	</thead>
	<tbody>
	<tr>
		<td class="td-device"><?php esc_html_e( 'Desktop', 'better-studio' ); ?></td>
		<td class="td-show">
			<?php $field_show = bf_get_post_meta( 'show_desktop', get_the_ID(), '1' ); ?>
			<div class="bf-switch">
				<label
						class="cb-enable <?php echo $field_show == '1' ? 'selected' : ''; ?>"><span><?php esc_html_e( 'Show', 'better-studio' ); ?></span></label>
				<label
						class="cb-disable <?php echo $field_show == '0' ? 'selected' : ''; ?>"><span><?php esc_html_e( 'Hide', 'better-studio' ); ?></span></label>
				<input type="hidden" name="bf-metabox-option[better_ads_banner_options][show_desktop]"
				       value="<?php echo $field_show; ?>" class="checkbox">
			</div>
		</td>
		<td class="td-size">
			<?php $field_size = bf_get_post_meta( 'size_desktop', get_the_ID() ); ?>
			<div class="bf-select-option-container ">
				<select name="bf-metabox-option[better_ads_banner_options][size_desktop]">
					<?php

					foreach ( $size_list as $size_id => $size ) {

						if ( is_array( $size ) ) {

							?>
							<optgroup label="<?php echo $size['label']; ?>">
								<?php

								foreach ( $size['options'] as $size_id => $size ) {
									?>
									<option
											value="<?php echo $size_id ?>" <?php selected( $field_size, $size_id ) ?>><?php echo $size ?></option>
									<?php
								}

								?>
							</optgroup>
							<?php


						} else {
							?>
							<option
									value="<?php echo $size_id ?>" <?php selected( $field_size, $size_id ) ?>><?php echo $size ?></option>
							<?php
						}

					}

					?>
				</select>
			</div>
		</td>
	</tr>
	<tr>
		<td class="td-device"><?php esc_html_e( 'Tablet - Landscape', 'better-studio' ); ?></td>
		<td class="td-show">
			<?php $field_show = bf_get_post_meta( 'show_tablet_landscape', get_the_ID(), '1' ); ?>
			<div class="bf-switch">
				<label
						class="cb-enable <?php echo $field_show == '1' ? 'selected' : ''; ?>"><span><?php esc_html_e( 'Show', 'better-studio' ); ?></span></label>
				<label
						class="cb-disable <?php echo $field_show == '0' ? 'selected' : ''; ?>"><span><?php esc_html_e( 'Hide', 'better-studio' ); ?></span></label>
				<input type="hidden" name="bf-metabox-option[better_ads_banner_options][show_tablet_landscape]"
				       value="<?php echo $field_show; ?>" class="checkbox">
			</div>
		</td>
		<td class="td-size">
			<?php $field_size = bf_get_post_meta( 'size_tablet_landscape', get_the_ID(), '' ); ?>
			<div class="bf-select-option-container ">
				<select name="bf-metabox-option[better_ads_banner_options][size_tablet_landscape]">
					<?php

					foreach ( $size_list as $size_id => $size ) {

						if ( is_array( $size ) ) {

							?>
							<optgroup label="<?php echo $size['label']; ?>">
								<?php

								foreach ( $size['options'] as $size_id => $size ) {
									?>
									<option
											value="<?php echo $size_id ?>" <?php selected( $field_size, $size_id ) ?>><?php echo $size ?></option>
									<?php
								}

								?>
							</optgroup>
							<?php


						} else {
							?>
							<option
									value="<?php echo $size_id ?>" <?php selected( $field_size, $size_id ) ?>><?php echo $size ?></option>
							<?php
						}

					}

					?>
				</select>
			</div>
		</td>
	</tr>
	<tr>
		<td class="td-device"><?php esc_html_e( 'Tablet - Portrait', 'better-studio' ); ?></td>
		<td class="td-show">
			<?php $field_show = bf_get_post_meta( 'show_tablet_portrait', get_the_ID(), '1' ); ?>
			<div class="bf-switch">
				<label
						class="cb-enable <?php echo $field_show == '1' ? 'selected' : ''; ?>"><span><?php esc_html_e( 'Show', 'better-studio' ); ?></span></label>
				<label
						class="cb-disable <?php echo $field_show == '0' ? 'selected' : ''; ?>"><span><?php esc_html_e( 'Hide', 'better-studio' ); ?></span></label>
				<input type="hidden" name="bf-metabox-option[better_ads_banner_options][show_tablet_portrait]"
				       value="<?php echo $field_show; ?>" class="checkbox">
			</div>
		</td>
		<td class="td-size">
			<?php $field_size = bf_get_post_meta( 'size_tablet_portrait', get_the_ID(), '' ); ?>
			<div class="bf-select-option-container ">
				<select name="bf-metabox-option[better_ads_banner_options][size_tablet_portrait]">
					<?php

					foreach ( $size_list as $size_id => $size ) {

						if ( is_array( $size ) ) {

							?>
							<optgroup label="<?php echo $size['label']; ?>">
								<?php

								foreach ( $size['options'] as $size_id => $size ) {
									?>
									<option
											value="<?php echo $size_id ?>" <?php selected( $field_size, $size_id ) ?>><?php echo $size ?></option>
									<?php
								}

								?>
							</optgroup>
							<?php


						} else {
							?>
							<option
									value="<?php echo $size_id ?>" <?php selected( $field_size, $size_id ) ?>><?php echo $size ?></option>
							<?php
						}

					}

					?>
				</select>
			</div>
		</td>
	</tr>
	<tr>
		<td class="td-device"><?php esc_html_e( 'Mobile', 'better-studio' ); ?></td>
		<td class="td-show">
			<?php $field_show = bf_get_post_meta( 'show_phone', get_the_ID(), '1' ); ?>
			<div class="bf-switch">
				<label
						class="cb-enable <?php echo $field_show == '1' ? 'selected' : ''; ?>"><span><?php esc_html_e( 'Show', 'better-studio' ); ?></span></label>
				<label
						class="cb-disable <?php echo $field_show == '0' ? 'selected' : ''; ?>"><span><?php esc_html_e( 'Hide', 'better-studio' ); ?></span></label>
				<input type="hidden" name="bf-metabox-option[better_ads_banner_options][show_phone]"
				       value="<?php echo $field_show; ?>" class="checkbox">
			</div>
		</td>
		<td class="td-size">
			<?php $field_size = bf_get_post_meta( 'size_phone', get_the_ID(), '' ); ?>
			<div class="bf-select-option-container ">
				<select name="bf-metabox-option[better_ads_banner_options][size_phone]">
					<?php

					foreach ( $size_list as $size_id => $size ) {

						if ( is_array( $size ) ) {

							?>
							<optgroup label="<?php echo $size['label']; ?>">
								<?php

								foreach ( $size['options'] as $size_id => $size ) {
									?>
									<option
											value="<?php echo $size_id ?>" <?php selected( $field_size, $size_id ) ?>><?php echo $size ?></option>
									<?php
								}

								?>
							</optgroup>
							<?php


						} else {
							?>
							<option
									value="<?php echo $size_id ?>" <?php selected( $field_size, $size_id ) ?>><?php echo $size ?></option>
							<?php
						}

					}

					?>
				</select>
			</div>
		</td>
	</tr>
	</tbody>
</table>
