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

$options = bf_merge_args( $options, array(
	'lang' => 'plain_text'
) );

$max_lines = ! empty( $options['max-lines'] ) ? $options['max-lines'] : 15;

$min_lines = ! empty( $options['min-lines'] ) ? $options['min-lines'] : 10;

?>
	<div class="bf-editor-wrapper">
		<pre class="bf-editor" data-lang="<?php echo esc_attr( $options['lang'] ); ?>"
		     data-max-lines="<?php echo esc_attr( $max_lines ); ?>"
		     data-min-lines="<?php echo esc_attr( $min_lines ); ?>"></pre>

		<textarea name="<?php echo esc_attr( $options['input_name'] ) ?>"
		          class="bf-editor-field"><?php echo $options['value']; // escaped before in function that passes value to this ?></textarea>
	</div>
<?php

echo $this->get_filed_input_desc( $options ); // escaped before in function that passes value to this
