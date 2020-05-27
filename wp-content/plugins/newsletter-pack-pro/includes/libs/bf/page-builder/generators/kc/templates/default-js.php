<#
		var sectionClass = data.options['section_class'] || '',
		settings = data.options['show_on'] ? JSON.stringify(data.options['show_on']) : '';
		#>
	<div
			class="bf-section-container {{sectionClass}}" data-param-name="{{data.name}}"
			data-param-settings="{{settings}}">
		<?php echo $input; // escaped before ?>
	</div>