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
 *  \--> BetterStudio, 2017 <--/
 */
jQuery(document).ready(function () {

    if (jQuery('body').hasClass('publisher-field-excerpt')) {
        improve_excerpt_ux();
    }

    /**
     * Adds new excerpt box to post for improving UX
     */
    function improve_excerpt_ux() {

        // Move container into Title Dive because it should be higher than buttons of third-party plugins
        jQuery('.bs-post-fields.bs-post-top-fields').appendTo('#titlediv');

        function handle_post_excerpt() {

            var $field = jQuery('.post-excerpt-field textarea[name="bs-post-excerpt"]');

            if ($field.length < 1) {
                return;
            }

            // Hide all core excerpt points!
            jQuery('#screen-meta label[for="postexcerpt-hide"]').hide();
            jQuery('#postexcerpt').hide();

            $field.on('change', function () {
                var $this = jQuery(this);

                /* Yoast SEO and all other plugins compatibility */
                jQuery('textarea#excerpt').val($this.val()).trigger('input');

                /* refresh Yoast SEO score */
                if (typeof YoastSEO.app.refresh == "function") {
                    YoastSEO.app.refresh();
                }

            });

        }

        handle_post_excerpt();

    } // improve_excerpt_ux

});
