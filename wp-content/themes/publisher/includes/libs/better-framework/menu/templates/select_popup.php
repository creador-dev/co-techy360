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

<div class="bf-menu-custom-field better-custom-field-<?php echo esc_attr( $options['type'] ); ?> description <?php echo esc_attr( implode( ' ', $block_class ) ); ?>" <?php $parent_only; ?> <?php echo bf_show_on_attributes( $options ); ?> >

<?php
// set options from deferred callback
if ( isset( $options['deferred-options'] ) ) {
	if ( is_string( $options['deferred-options'] ) && is_callable( $options['deferred-options'] ) ) {
		$options['options'] = call_user_func( $options['deferred-options'] );
	} elseif ( is_array( $options['deferred-options'] ) && ! empty( $options['deferred-options']['callback'] ) && is_callable( $options['deferred-options']['callback'] ) ) {
		if ( isset( $options['deferred-options']['args'] ) ) {
			$options['options'] = call_user_func_array( $options['deferred-options']['callback'], $options['deferred-options']['args'] );
		} else {
			$options['options'] = call_user_func( $options['deferred-options']['callback'] );
		}
	}
}
if ( empty( $options['options'] ) ) {
	$options['options'] = array();
}

$list_style = 'grid-2-column';
if ( isset( $options['list_style'] ) && ! empty( $options['list_style'] ) ) {
	$list_style = $options['list_style'];
}

// default selected
$current = array(
	'key'   => '',
	'label' => isset( $options['default_text'] ) && ! empty( $options['default_text'] ) ? wp_kses( $options['default_text'], bf_trans_allowed_html() ) : esc_html__( 'chose one...', 'publisher' ),
	'img'   => ''
);

if ( isset( $options['value'] ) && ! empty( $options['value'] ) ) {
	if ( isset( $options['options'][ $options['value'] ] ) ) {
		$current        = $options['options'][ $options['value'] ];
		$current['key'] = $options['value'];
	}
}

$is_mega_menu_field = false;

$data2print = wp_array_slice_assoc( $options, array( 'texts', 'confirm_texts', 'column_class', 'confirm_changes' ) );

foreach ( (array) $options['options'] as $key => $option ) {
	if ( empty( $option['info'] ) ) {
		$option['info'] = array();
	}
	$option['info']['img']   = $option['img'];
	$option['info']['label'] = $option['label'];

	if ( isset( $option['badges'] ) ) {
		$option['info']['badges'] = $option['badges'];
	}
	if ( isset( $option['class'] ) ) {
		$option['info']['class'] = $option['class'];
	}
	if ( isset( $option['depth'] ) ) {
		$is_mega_menu_field          = true;
		$data2print[ $key ]['depth'] = $option['depth'];
	}

	$data2print['options'][ $key ] = bf_map_deep( $option['info'], 'sanitize_text_field' );
}

$input_name = esc_attr( $options['input_name'] );

$select_style = empty( $options['select_style'] ) ? 'creative' : 'regular-select';

$extra_classes = $is_mega_menu_field ? 'better-select-popup-mega-menu' : '';

if ( $select_style === 'regular-select' ) {
	echo '<div class="better-select-style better-select-popup ', $input_name, ' ', $extra_classes, '">
	<span class="active-item-label">' . $current['label'] . '</span>
';
} else {
	?>

	<div class="select-popup-field bf-clearfix <?php echo $extra_classes ?> <?php echo $input_name ?>">
	<div class="select-popup-selected-image">
		<img src="<?php echo $current['img'] ?>" alt="">
	</div>
	<div class="select-popup-selected-info">
		<div class="active-item-text"><?php
			if ( isset( $options['texts']['box_pre_title'] ) ) {

				echo $options['texts']['box_pre_title'];
			} else {

				_e( 'Active item', 'publisher' );
			}
			?></div>
		<div class="active-item-label"><?php echo $current['label'] ?></div>

		<a href="#" class="button"><?php
			if ( isset( $options['texts']['box_button'] ) ) {

				echo $options['texts']['box_button'];
			} else {
				_e( 'Change', 'publisher' );
			}

			?></a>
	</div>
	<?php
}

if ( $data2print ) {
	?>
	<script id="<?php echo str_replace( '-', '_', sanitize_html_class( $input_name ) ) ?>" class="select-popup-data"
	        type="application/json"><?php echo json_encode( $data2print ) ?></script>
	<?php
}

echo '<input type="hidden" name="' . $input_name . '" id="' . $input_name . '" value="' . esc_attr( $current['key'] ) . '" class="select-value"/>';

echo '</div>';

?>

	<div class="bf-section-info bf-clearfix mega-menu-depth-notice" style="display: none;">
		<div class="bf-section-info-title">
			<h3><i class="fa fa-warning"></i> Please Note</h3>

		</div>
		<div class="bf-section-info-message">
			<?php
			_e( 'Mega menu does not work on this particular location', 'publisher' )
			?>
		</div>
	</div>
<?php

echo '</div>'; // END .bf-menu-custom-field
