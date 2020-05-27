<?php
/**
 * Horizontal mega menu template
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    1.8.4
 */

$args = publisher_get_prop( 'mega-menu-args', array() );

// Removes extra </ul></li> tag from end of code
$args['sub-menu'] = preg_replace( '/(<\/ul>)(\n)+(<\/li>)(\n)+/i', '', $args['sub-menu'] );

?>
	<div class="mega-menu mega-type-link-list">
		<ul class="mega-links">
			<?php echo $args['sub-menu']; // escaped before ?>
		</ul>
	</div>
<?php

publisher_clear_props();
