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


// todo add option to disable sorter items and male iot wimple multi checkbox
// todo add std support for this field

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
	return;
}

$value     = isset( $options['value'] ) && is_array( $options['value'] ) ? $options['value'] : array();
$check_all = ( ! isset( $options['check_all'] ) || $options['check_all'] ) && ! count( $value ) ? TRUE : FALSE;

$groups_ids = array();

?>

<div class="bf-sorter-groups-container">
	<ul id="bf-sorter-group-<?php echo esc_attr( $options['id'] ); ?>"
	    class="bf-sorter-list bf-sorter-<?php echo esc_attr( $options['id'] ); ?>">
		<?php
		// Options That Saved Before
		foreach ( $value as $item_id => $item ) {
			if ( ! $item ) {
				continue;
			}
			if ( ! isset( $options['options'][ $item_id ] ) ) {
				continue;
			}
			?>
			<li id="bf-sorter-group-item-<?php echo esc_attr( $options['id'] ); ?>-<?php echo esc_attr( $item_id ); ?>"
			    class="<?php echo isset( $options['options'][ $item_id ]['css-class'] ) ? esc_attr( $options['options'][ $item_id ]['css-class'] ) : ''; ?> item-<?php echo esc_attr( $item_id ); ?> checked-item"
			    style="<?php echo isset( $options['options'][ $item_id ]['css'] ) ? esc_attr( $options['options'][ $item_id ]['css'] ) : ''; ?>">
				<label>
					<input name="<?php echo esc_attr( $options['input_name'] ) ?>[<?php echo esc_attr( $item_id ); ?>]"
					       value="1" type="checkbox" checked="checked"/>
					<?php echo $options['options'][ $item_id ]['label']; // escaped before ?>
				</label>
			</li>
			<?php

			unset( $options['options'][ $item_id ] );

		}

		// Options That Not Saved but are Active
		foreach ( $options['options'] as $item_id => $item ) {

			// Skip Disabled Items
			if ( isset( $item['css-class'] ) && strpos( $item['css-class'], 'active-item' ) === FALSE ) {
				continue;
			}
			?>
			<li id="bf-sorter-group-item-<?php echo esc_attr( $options['id'] ); ?>-<?php echo esc_attr( $item_id ); ?>"
			    class="<?php echo isset( $item['css-class'] ) ? esc_attr( $item['css-class'] ) : ''; ?> item-<?php echo esc_attr( $item_id ); ?> <?php echo $check_all ? ' checked-item' : ''; ?>" <?php echo $check_all ? ' checked="checked" ' : ''; ?>
			    style="<?php echo isset( $item['css'] ) ? esc_attr( $item['css'] ) : ''; ?>">
				<label>
					<input name="<?php echo esc_attr( $options['input_name'] ) ?>[<?php echo esc_attr( $item_id ); ?>]"
					       value="1" type="checkbox" <?php echo $check_all ? ' checked="checked" ' : ''; ?>/>
					<?php echo is_array( $item ) ? $item['label'] : $item; // escaped before ?>
				</label>
			</li>
			<?php

			unset( $options['options'][ $item_id ] );
		}

		// Disable Items
		foreach ( $options['options'] as $item_id => $item ) { ?>
			<li id="bf-sorter-group-item-<?php echo esc_attr( $options['id'] ); ?>-<?php echo esc_attr( $item_id ); ?>"
			    class="<?php echo isset( $item['css-class'] ) ? esc_attr( $item['css-class'] ) : ''; ?> item-<?php echo esc_attr( $item_id ); ?>"
			    style="<?php echo isset( $item['css'] ) ? esc_attr( $item['css'] ) : ''; ?>">
				<label>
					<input name="<?php echo esc_attr( $options['input_name'] ) ?>[<?php echo esc_attr( $item_id ); ?>]"
					       value="0" type="checkbox" disabled/>
					<?php echo is_array( $item ) ? $item['label'] : $item; // escaped before ?>
				</label>
			</li>
			<?php
		}

		?>
	</ul>
	<?php

	echo $this->get_filed_input_desc( $options ); // escaped before

	?>
</div>
