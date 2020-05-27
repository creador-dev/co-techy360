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

jQuery(function ($) {
    var $document = jQuery(document);

    $document.on('tinymce-editor-init', function () {

        $document.on("change", ".affect-editor-on-change :input", function () {
            var input_match = this.name.match(/\[([^\]]+)\]$/);
            if (!input_match)
                return false;
            var input_name = input_match[1];

            jQuery("#content_ifr").contents().find("body").attr("data-" + input_name, this.value);
        }).find(".affect-editor-on-change")
            .find(':checked,:selected')
            .change();
    });
});
