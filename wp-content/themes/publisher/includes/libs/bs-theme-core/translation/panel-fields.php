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


$fields[] = array(
	'name' => __( 'Texts', 'publisher' ),
	'id'   => 'general_tab',
	'type' => 'tab',
	'icon' => 'bsai-global',
);
$fields[] = array(
	'name'            => '',
	'id'              => 'send_translation',
	'section_class'   => 'full-width-controls',
	'container_class' => 'share-translation-field-container',
	'type'            => 'custom',
	'input_callback'  => 'publisher_theme_core_translations_send_translations_cb'
);

// Translation texts
$fields = apply_filters( 'publisher-theme-core/translation/translations/fields', $fields );

//
// Backup & restore
//
$fields[] = array(
	'name'       => __( 'Backup & Restore', 'publisher' ),
	'id'         => 'backup_restore',
	'type'       => 'tab',
	'icon'       => 'bsai-export-import',
	'margin-top' => '30',
);
$fields[] = array(
	'name'      => __( 'Backup / Export', 'publisher' ),
	'id'        => 'backup_export_options',
	'type'      => 'export',
	'file_name' => $this->theme_id . '-translation-backup',
	'panel_id'  => $this->option_panel_id,
	'desc'      => __( 'This allows you to create a backup of your translation. Please note, it will not backup anything else.', 'publisher' )
);
$fields[] = array(
	'name'     => __( 'Restore / Import', 'publisher' ),
	'id'       => 'import_restore_options',
	'type'     => 'import',
	'panel_id' => $this->option_panel_id,
	'desc'     => __( '<strong>It will override your current translation!</strong> Please make sure to select a valid translation file.', 'publisher' ),
);

