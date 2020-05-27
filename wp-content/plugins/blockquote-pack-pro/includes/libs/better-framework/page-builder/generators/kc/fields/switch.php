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
<div class="bf-switch bf-clearfix">

	<#
			var onLabel = data.options['on-label'] || '<?php _e( 'On', 'better-studio' ) ?>',
			offLabel = data.options['off-label'] || '<?php _e( 'Off', 'better-studio' ) ?>',
			inputClasses = data.options['input-class'];
			#>

		<label class="cb-enable <# if(data.value && data.value !== '0') { #> selected<# } #>"><span>{{{onLabel}}}</span></label>
		<label class="cb-disable <# if(!data.value || data.value === '0') { #> selected<# } #>"><span>{{{offLabel}}}</span></label>

		<input type="hidden" name="{{data.name}}" value="<# if(data.value && data.value !== '0') {#>1<#}else {#>0<#}#>"
		       class="kc-param checkbox {{inputClasses}}">
</div>