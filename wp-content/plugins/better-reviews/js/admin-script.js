var Better_Reviews_Admin = (function ($) {
    "use strict";

    // module
    return {

        init: function () {

            this.prepare_overall_rating_label();

        },

        prepare_overall_rating_label: function () {

            if ($(".bf-section-repeater-option[data-id=_bs_review_criteria]").length <= 0)
                return;

            Better_Reviews_Admin.calculate_overall_rating();


            $('input').on('change', function () {
                if ($(this).attr('name') == 'bf-metabox-option[bs_review_metabox][_bs_review_rating_type]') {
                    Better_Reviews_Admin.calculate_overall_rating();
                }
            });

            $(".bf-section-repeater-option[data-id=_bs_review_criteria]").on('change', '.bs-review-field-rating input', function () {
                Better_Reviews_Admin.calculate_overall_rating();
            });

            $(".bf-section[data-id=_bs_review_criteria]").on('repeater_item_added', function () {
                Better_Reviews_Admin.calculate_overall_rating();
            });

            $(".bf-section[data-id=_bs_review_criteria]").on('after_repeater_item_removed', function () {
                Better_Reviews_Admin.calculate_overall_rating();
            });

        },


        add_span: function () {

            if ($(".bf-section-repeater-option[data-id=_bs_review_criteria] .bf-heading-repeater-option h3 .overall-label").length > 0) {
                return $(".bf-section-repeater-option[data-id=_bs_review_criteria] .bf-heading-repeater-option h3 .overall-label i");
            }

            $(".bf-section-repeater-option[data-id=_bs_review_criteria] .bf-heading-repeater-option h3").append('<span class="overall-label">' + better_reviews_loc.overall_rating + ' ( <i>-</i> )</span>');

            return $(".bf-section-repeater-option[data-id=_bs_review_criteria] .bf-heading-repeater-option h3 .overall-label i");

        },


        calculate_overall_rating: function () {

            var $parent = $(".bf-section-repeater-option[data-id=_bs_review_criteria]");

            // Adds Overall Rating Span
            var $num = Better_Reviews_Admin.add_span();

            var total = 0;

            $parent.find('.bs-review-field-rating input[type=text]').each(function (index) {

                if (parseFloat($(this).val()))
                    total += parseFloat($(this).val());

            });

            console.log($parent.find('.bs-review-field-rating input'));


            $num.html(Better_Reviews_Admin.format_overall_rating_number(total, $parent.find('.bs-review-field-rating input').length));

        },

        format_overall_rating_number: function (sum, length) {

            var type = $('[data-id=_bs_review_rating_type] .bf-controls-image_radio-option input[type=radio]:checked').val();

            switch (type) {

                case 'percentage':
                case 'stars':
                    return Math.round(( ( sum * 10  ) / length ) * 10) / 10 + '%';
                    break;

                case 'points':
                    return Math.round(( sum / length ) * 10) / 10;
                    break;
            }

            return Math.round(( sum / length ) * 10) / 10;
        }

    };

})(jQuery);

// Load when ready
jQuery(function ($) {

    Better_Reviews_Admin.init();

});