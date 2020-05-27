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
<div class="bf-admin-page-wrap bf-admin-template-minimal-1">

	<header class="bf-page-header">
		<h2 class="page-title"><?php echo esc_html( $title ); ?></h2>

		<?php if ( ! empty( $desc ) ) {
			echo '<div class="page-desc">' . wp_kses( $desc, bf_trans_allowed_html() ) . '</div>';
		} ?>
	</header>

	<div class="bf-page-postbox">
		<div class="inside">

			<?php echo $body; // escaped before  ?>

		</div>
	</div>

</div>