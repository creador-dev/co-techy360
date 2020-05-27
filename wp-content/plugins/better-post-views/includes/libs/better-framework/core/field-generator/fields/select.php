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

$container_class = '';

$select = Better_Framework::html()->add( 'select' )->name( $options['input_name'] );

if ( isset( $options['input_class'] ) ) {
	$select->class( $options['input_class'] );
}

if ( isset( $options['multiple'] ) && $options['multiple'] ) {
	$select->attr( 'multiple', 'multiple' );
	$container_class .= 'multiple ';
}


if ( empty( $options['value'] ) ) {
	$val = array();;
} elseif ( is_array( $options['value'] ) ) {
	$val = $options['value'];
} else {
	$val = explode( ',', $options['value'] );
}

foreach ( $options['options'] as $option_id => $option_val ) {

	if ( $option_id === 'category_walker' ) {

		if ( is_array( $option_val ) && ! empty( $option_val['taxonomy'] ) ) {
			$tax = $option_val['taxonomy'];
		} else {
			$tax = 'category';
		}

		$r = array(
			'walker'       => new Walker_Better_CategoryDropdown,
			'orderby'      => 'name',
			'multiple'     => isset( $options['multiple'] ) ? $options['multiple'] : FALSE,
			'hierarchical' => 1,
			'selected'     => $val,
			'show_count'   => 0
		);

		$cats_list = walk_category_dropdown_tree( get_terms( $tax, $r ), 0, $r );

		$select->text( $cats_list );

		continue;

	}

	if ( is_array( $option_val ) && isset( $option_val['disabled'] ) ) {

		$selected = FALSE;
		if ( empty( $val ) && empty( $option_id ) ) {
			$selected = TRUE;
		} elseif ( in_array( $option_id, $val ) ) {
			$selected = TRUE;
		}

		$select->text( '<option value="' . esc_attr( $option_id ) . '" ' . ( $selected ? 'selected="selected"' : '' ) . ' ' . ( $option_val['disabled'] ? 'disabled="disabled"' : '' ) . '>' . wp_kses( $option_val['label'], bf_trans_allowed_html() ) . '</option>' );

	} elseif ( is_array( $option_val ) ) {

		if ( ! isset( $option_val['options'] ) && ! isset( $option_val['label'] ) ) {
			continue;
		}

		$select->text( '<optgroup label="' . $option_val['label'] . '">' );

		foreach ( $option_val['options'] as $_option_id => $_option_val ) {

			if ( $_option_id === 'category_walker' ) {

				if ( is_array( $_option_val ) && ! empty( $_option_val['taxonomy'] ) ) {
					$tax = $_option_val['taxonomy'];
				} else {
					$tax = 'category';
				}

				$r = array(
					'walker'       => new Walker_Better_CategoryDropdown,
					'orderby'      => 'name',
					'multiple'     => isset( $options['multiple'] ) ? $options['multiple'] : FALSE,
					'hierarchical' => 1,
					'selected'     => $val,
					'show_count'   => 0
				);

				$terms_list = walk_category_dropdown_tree( get_terms( $tax, $r ), 0, $r );

				$select->text( $terms_list );
				continue;

			} else {

				if ( is_array( $_option_val ) ) {
					$select->text( '<option value="' . esc_attr( $_option_id ) . '" ' . ( in_array( $_option_id, $val ) ? 'selected="selected"' : '' ) . ' ' . ( $_option_val['disabled'] ? 'disabled="disabled"' : '' ) . '>' . wp_kses( $_option_val['label'], bf_trans_allowed_html() ) . '</option>' );
				} else {
					$select->text( '<option value="' . esc_attr( $_option_id ) . '" ' . ( in_array( $_option_id, $val ) ? 'selected="selected"' : '' ) . '>' . wp_kses( $_option_val, bf_trans_allowed_html() ) . '</option>' );
				}
			}
		}

		$select->text( '</optgroup>' );

	} else {
		// only for when default item id is empty and no any other selected!
		$selected = FALSE;
		if ( empty( $val ) && empty( $option_id ) ) {
			$selected = TRUE;
		} elseif ( in_array( $option_id, $val ) ) {
			$selected = TRUE;
		}

		$select->text( '<option value="' . esc_attr( $option_id ) . '" ' . ( $selected ? 'selected="selected"' : '' ) . '>' . wp_kses( $option_val, bf_trans_allowed_html() ) . '</option>' );
	}

}

echo '<div class="bf-select-option-container ' . esc_attr( $container_class ) . '">';
echo $select->display(); // escaped before
echo '</div>';
echo $this->get_filed_input_desc( $options ); // escaped before