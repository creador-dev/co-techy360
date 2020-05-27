var Better_Ads_Manager = (function ($) {
    "use strict";

    return {

        init: function () {

            if (Better_Ads_Manager.ads_state() == false)
                Better_Ads_Manager.blocked_ads_fallback();

        },

        // Get ad state, used to detect ad blocker state
        ads_state: function () {

            // If this is not defined, it means ad blocker disabled it!
            return typeof window.better_ads_adblock != "undefined";

        },


        // Retrieves ads fallback
        blocked_ads_fallback: function () {

            var blocked_ads = [];

            // Collect all ads
            $('.bsac-container').each(function () {

                // Blockers can't detect our image ad code ;)
                if ($(this).data('type') == 'image')
                    return 0;

                blocked_ads.push({
                    'element_id': $(this).attr('id'),
                    'ad_id': $(this).data('adid')
                });

            });

            if (blocked_ads.length < 1)
                return;

            jQuery.ajax({
                url: Better_Ads_Manager_Ajax_URL,
                type: "POST",
                data: {
                    action: 'better_ads_manager_blocked_fallback',
                    ads: blocked_ads
                },
                success: function (data) {

                    var result = JSON.parse(data);

                    $.each(result.ads, function (index, value) {
                        $('#' + value.element_id).html(value.code);
                    });

                }
            });

        }

    };// /return
})(jQuery);

// Load when ready
jQuery(document).ready(function () {

    Better_Ads_Manager.init();

});
