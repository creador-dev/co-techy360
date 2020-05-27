<?php
/**
 * Multi column links mega menu template
 *
 * @author     BetterStudio
 * @package    Publisher
 * @version    1.8.4
 */

$args = publisher_get_prop( 'mega-menu-args', '' );

publisher_set_prop( 'mega-menu-columns', $args['current-item']->mega_menu );

?>
<div class="mega-menu mega-type-link">
	<?php

	$_check = array(
		'default'       => 3,
		'link-2-column' => 2,
		'link-3-column' => 3,
		'link-4-column' => 4,
		'link-5-column' => 5,
		'link-6-column' => 6,
	);

	if ( isset( $_check[ $args['current-item']->mega_menu ] ) ) {
		$columns = $_check[ $args['current-item']->mega_menu ];
	} else {
		$columns = $_check['default'];
	}

	?>
	<div class="content-wrap">
		<ul class="mega-links columns-<?php echo $columns; ?>">
			<?php echo $args['sub-menu']; // escaped before ?>
		</ul>
	</div>
</div>
<?php publisher_clear_props(); ?>

