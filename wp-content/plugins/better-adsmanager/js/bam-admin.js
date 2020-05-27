String.prototype.capitalize = function () {
    return this.charAt(0).toUpperCase() + this.slice(1);
};

var Better_Ads_Manager_Admin = (function ($) {
    "use strict";

    return {

        init: function () {

            Better_Ads_Manager_Admin.responsive_fields();

            Better_Ads_Manager_Admin.repeater_smart_label();

            Better_Ads_Manager_Admin.smart_label();

        },

        /**
         *
         * Responsive Fields
         *
         */
        responsive_fields: function () {

            Better_Ads_Manager_Admin.update_responsive_fields();

            $('.bf-controls-image_radio-option  input[name="bf-metabox-option[better_ads_banner_options][type]"], .bf-controls-image_radio-option  input[name="bf-metabox-option[better_ads_banner_options][format]"]').on('change', function () {
                Better_Ads_Manager_Admin.update_responsive_fields();
            });
        },
        update_responsive_fields: function () {
            var type = $('.bf-controls-image_radio-option  input[name="bf-metabox-option[better_ads_banner_options][type]"]:checked').attr('value'),
                format = $('.bf-controls-image_radio-option  input[name="bf-metabox-option[better_ads_banner_options][format]"]:checked').attr('value'),
                $resp = $('.bf-section[data-id="responsive_options"] .better-ads-table');

            if (format == 'amp') {
                $('.responsive-field-container').slideUp();
            } else {

                $('.responsive-field-container').slideDown();

                if (type == 'code') {
                    $resp.addClass('show-sizes');
                } else {
                    $resp.removeClass('show-sizes')
                }

            }
        },


        /**
         *
         * Fields Smart Label
         *
         */
        smart_label: function () {
            $(".fields-group.better-ads-ad-group-field").on('change', 'input[name$="-active"],select[name$="_type"],select[name$="_banner"],select[name$="_campaign"]', function () {
                Better_Ads_Manager_Admin.update_field_label($(this).closest('.fields-group.better-ads-ad-group-field'));
            }).find('select[name$="_type"]').change();
        },
        update_field_label: function ($group_field) {

            var label = [],
                before = '<span style="color: #b1b1b1;">[ </span>',
                after = '<span style="color: #b1b1b1;"> ]</span>',
                sep = '<span style="color: #9e9e9e;"> ' + better_adsmanager_loc.arrow + ' </span>',
                inactive_before = '<b style="color: red;">',
                inactive_after = '</b>',
                active_before = '<b style="color: green;">',
                active_after = '</b>',
                inactive = better_adsmanager_loc.translation.inactive;

            //
            // Post type
            //
            if (typeof $group_field.find('input[name$="post_type"]').val() != "undefined") {
                label.push(before + $group_field.find('input[name$="post_type"]').val().capitalize() + after);
            }


            //
            // After x paragraph
            //
            // if (typeof $group_field.find('input[name$="[paragraph]"]').val() != "undefined") {
            //     label.push(before + 'After ' + $group_field.find('input[name$="[paragraph]"]').val() + 'th p' + after);
            // }


            //
            // Type
            //
            var type = $group_field.find('select[name$="_type"] option:selected').val(),
                banner = $group_field.find('select[name$="_banner"] option:selected').val(),
                banner_label = $group_field.find('select[name$="_banner"] option:selected').text(),
                campaign = $group_field.find('select[name$="_campaign"] option:selected').val(),
                campaign_lable = $group_field.find('select[name$="_campaign"] option:selected').text();

            if (type === 'banner') {

                label.push(before + better_adsmanager_loc.translation.banner + after);

                if (banner === 'none') {
                    label.push(before + inactive_before + better_adsmanager_loc.translation.in_active_banner + inactive_after + after);
                } else {
                    label.push(before + active_before + banner_label.replace('[', '(').replace(']', ')') + active_after + after);
                }
            } else if (type === 'campaign') {

                label.push(before + better_adsmanager_loc.translation.campaign + after);

                if (campaign === 'none') {
                    label.push(before + inactive_before + better_adsmanager_loc.translation.in_active_campaign + inactive_after + after);
                } else {
                    label.push(before + active_before + campaign_lable + active_after + after);
                }
            }

            // Only 1 (post type) was added
            if (label.length == 1) {
                label.push(before + inactive_before + inactive + inactive_after + after);
            }

            if ($group_field.find('.fields-group-title-container .fields-group-title .ad-state-indicator').length < 1) {
                $group_field.find('.fields-group-title-container .fields-group-title').append('<p class="ad-state-indicator"></p>');
            }

            if (label.length > 0) {
                $group_field.find('.fields-group-title-container .fields-group-title .ad-state-indicator')
                    .html(label.join(sep));
            } else {
                $group_field.find('.fields-group-title-container .fields-group-title .ad-state-indicator')
                    .html(before + inactive_before + inactive + inactive_after + after);
            }
        },


        /**
         *
         * Repeater Field Smart Label
         *
         */
        repeater_smart_label: function () {
            $(".bf-section.better-ads-repeater-ad-field").on('keyup', 'input[name$="[post_type]"],input[name$="[paragraph]"]', function () {

                Better_Ads_Manager_Admin.update_repeater_field_label($(this).closest('.bf-repeater-item'));
            }).on('repeater_item_added', function() {
                Better_Ads_Manager_Admin.update_repeater_field_label($(this).find('.bf-repeater-item:last'));
            });

            $(".bf-section.better-ads-repeater-ad-field").on('change', 'select[name$="[type]"],select[name$="[banner]"],select[name$="[campaign]"]', function () {
                Better_Ads_Manager_Admin.update_repeater_field_label($(this).closest('.bf-repeater-item'));
            }).find('select[name$="[type]"]').change();
        },
        update_repeater_field_label: function ($repeater_field) {

            var label = [],
                before = '<span style="color: #b1b1b1;">[ </span>',
                after = '<span style="color: #b1b1b1;"> ]</span>',
                sep = '<span style="color: #9e9e9e;"> ' + better_adsmanager_loc.arrow + ' </span>',
                inactive_before = '<b style="color: red;">',
                inactive_after = '</b>',
                active_before = '<b style="color: green;">',
                active_after = '</b>',
                inactive = better_adsmanager_loc.translation.inactive;

            //
            // Post type
            //
            if (typeof $repeater_field.find('input[name$="[post_type]"]').val() != "undefined") {
                label.push(before + $repeater_field.find('input[name$="[post_type]"]').val().capitalize() + after);
            }


            //
            // After x paragraph
            //
            if (typeof $repeater_field.find('input[name$="[paragraph]"]').val() != "undefined") {
                var val = parseInt($repeater_field.find('input[name$="[paragraph]"]').val() || 0),
                    idx = 3;

                if(val) {

                    if(val >= 1 && val <= 3) {
                        idx = val-1;
                    }
                    label.push(before + better_adsmanager_loc.translation.after_x_paragraph[idx].replace('%s', val) + after);
                } else {
                    label.push(before + '-' + after);
                }
            }


            //
            // Type
            //
            var type = $repeater_field.find('select[name$="[type]"] option:selected').val(),
                banner = $repeater_field.find('select[name$="[banner]"] option:selected').val(),
                banner_label = $repeater_field.find('select[name$="[banner]"] option:selected').text(),
                campaign = $repeater_field.find('select[name$="[campaign]"] option:selected').val(),
                campaign_lable = $repeater_field.find('select[name$="[campaign]"] option:selected').text();

            if (type === 'banner') {

                label.push(before + better_adsmanager_loc.translation.banner + after);

                if (banner === 'none') {
                    label.push(before + inactive_before + better_adsmanager_loc.translation.in_active_banner + inactive_after + after);
                } else {
                    label.push(before + active_before + banner_label.replace('[', '(').replace(']', ')') + active_after + after);
                }
            } else if (type === 'campaign') {

                label.push(before + 'Campaign' + after);

                if (campaign === 'none') {
                    label.push(before + inactive_before + better_adsmanager_loc.translation.in_active_campaign + inactive_after + after);
                } else {
                    label.push(before + active_before + campaign_lable + active_after + after);
                }
            }

            // Only 1 (post type) was added
            if (label.length == 1) {
                label.push(before + inactive_before + inactive + inactive_after + after);
            }

            if (label.length > 0) {
                $repeater_field.find('.bf-repeater-item-title .handle-repeater-title-label')
                    .html(label.join(sep));
            } else {
                $repeater_field.find('.bf-repeater-item-title .handle-repeater-title-label')
                    .html(before + inactive_before + inactive + inactive_after + after);
            }
        }

    };
})(jQuery);

// Load when ready
jQuery(document).ready(function () {
    Better_Ads_Manager_Admin.init();
});
