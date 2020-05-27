<?php
/***
 *  BetterStudio Themes Core.
 *
 *  ______  _____   _____ _                           _____
 *  | ___ \/  ___| |_   _| |                         /  __ \
 *  | |_/ /\ `--.    | | | |__   ___ _ __ ___   ___  | /  \/ ___  _ __ ___
 *  | ___ \ `--. \   | | | '_ \ / _ \ '_ ` _ \ / _ \ | |    / _ \| '__/ _ \
 *  | |_/ //\__/ /   | | | | | |  __/ | | | | |  __/ | \__/\ (_) | | |  __/
 *  \____/ \____/    \_/ |_| |_|\___|_| |_| |_|\___|  \____/\___/|_|  \___|
 *
 *  Copyright © 2017 Better Studio
 *
 *
 *  Our portfolio is here: https://betterstudio.com/
 *
 *  \--> BetterStudio, 2018 <--/
 */


$types = Publisher_Page_Templates::get_types();

?>
<div class="bf-admin-page-wrap">

	<header class="bf-page-header">
		<h2 class="page-title"><?php echo esc_html( $title ); ?></h2>

		<?php if ( ! empty( $desc ) ) {
			echo '<div class="page-desc"><p>' . wp_kses( $desc, bf_trans_allowed_html() ) . '</p></div>';
		} ?>

		<div class="bs-page-template-types">
			<ul class="bspt-filters">
				<li class="current"><a href="#" data-filter="all"><?php _e( 'All', 'publisher' ) ?></a></li>
				<?php

				foreach ( $types as $type_name => $type_slug ) {
					printf( '<li><a href="#" data-filter="%s">%s</a></li>', esc_attr( $type_slug ), esc_attr( $type_name ) );
				}

				?>
			</ul>

			<div class="bspt-search">
				<input type="text" class="bspt-search-input" value=""
				       placeholder="<?php esc_attr_e( 'Search...', 'publisher' ) ?>">
				<i class="fa fa-search"></i>
			</div>
		</div>
	</header>

	<div class="bs-page-template-wrapper">
		<?php echo $body; // escaped before  ?>
	</div>

</div>