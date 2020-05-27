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

?>
<div class="bf-field-term-select-wrapper">
	<ul>
		<?php

		if ( ! class_exists( 'BF_Term_Select' ) ) {
			require BF_PATH . '/core/field-generator/class-bf-term-select.php';
		}

		wp_list_categories( array(
			'style'          => 'list',
			'title_li'       => false,
			'taxonomy'       => isset( $options['taxonomy'] ) ? $options['taxonomy'] : 'category',
			'walker'         => new BF_Term_Select,
			'selected_terms' => $options['value'],
			'input_name'     => 'bf-term-select', //$options['input_name'],
			'hide_empty'     => false,

		) );

		?>
	</ul>
</div>
<div class="bf-field-term-select-help">
	<label><?php _e( 'Help: Click on check box to', 'better-studio' ); ?></label>

	<div class="bf-checkbox-multi-state disabled none-state">
		<span data-state="none"></span>
	</div>
	<label><?php _e( 'Not Selected', 'better-studio' ) ?></label>

	<div class="bf-checkbox-multi-state disabled active-state">
        <span class="bf-checkbox-active" style="display: inline-block;">
            <i class="fa fa-check" aria-hidden="true"></i>
        </span>
	</div>
	<label><?php _e( 'Selected', 'better-studio' ) ?></label>

	<div class="bf-checkbox-multi-state disabled deactivate-state">
        <span class="bf-checkbox-active" style="display: inline-block;">
           <i class="fa fa-times" aria-hidden="true"></i>
        </span>
	</div>
	<label><?php _e( 'Excluded', 'better-studio' ) ?></label>

	<?php echo $this->get_filed_input_desc( $options ); // escaped before ?>

</div>

<input type="hidden"
       name="<?php echo esc_attr( $options['input_name'] ) ?>"
       value="<?php echo esc_attr( $options['value'] ) ?>"
       class="bf-term-select-value <?php echo isset( $options['input_class'] ) ? esc_attr( $options['input_class'] ) : ''; ?> kc-param"
>