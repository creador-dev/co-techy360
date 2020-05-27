<?php


define( 'WP_MIGRATOR_PATH', dirname( __FILE__ ) );

define( 'WPMG_LOC', 'wp-migrator' );

define( 'WPMG_URL', trailingslashit(plugin_dir_url( __FILE__ )) );


require WP_MIGRATOR_PATH . '/vendor/autoload.php';

require WP_MIGRATOR_PATH . '/includes/core/helpers.php';

require WP_MIGRATOR_PATH . '/includes/functions.php';
