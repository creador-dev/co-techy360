jQuery(function ($) {

    var is_rtl = $(document.body).hasClass('rtl');

    /**
     * Style 1
     */
    $('.bs-smart-list.bssl-style-1 .bssl-items').each(function (i, el) {
        $(el).slick({
            sliderControlDots: 'off',
            prevArrow: '<a rel="prev" class="bssl-nav-btn-big prev"><i class="fa fa-angle-' + ( is_rtl ? 'right' : 'left' ) + '" aria-hidden="true"></i> ' + bs_smart_lists_loc.translations.nav_prev + '</a>',
            nextArrow: '<a rel="next" class="bssl-nav-btn-big next">' + bs_smart_lists_loc.translations.nav_next + ' <i class="fa fa-angle-' + ( is_rtl ? 'left' : 'right' ) + '" aria-hidden="true"></i></a>',
            rtl: is_rtl,
            slideMargin: 25,
            slide: '.bs-slider-item',
            appendArrows: $(el).siblings('.bssl-control-nav'),
            classPrefix: 'bs-slider-',
            adaptiveHeight: true,
            accessibility: false
        });
    });

    /**
     * Style 2
     */
    $('.bs-smart-list.bssl-style-2 .bssl-items').each(function (i, el) {
        $(el).slick({
            sliderControlDots: 'off',
            prevArrow: '<a rel="prev" class="bssl-nav-btn-big prev"><i class="fa fa-angle-' + ( is_rtl ? 'right' : 'left' ) + '" aria-hidden="true"></i> ' + bs_smart_lists_loc.translations.nav_prev + '</a>',
            nextArrow: '<a rel="next" class="bssl-nav-btn-big next">' + bs_smart_lists_loc.translations.nav_next + ' <i class="fa fa-angle-' + ( is_rtl ? 'left' : 'right' ) + '" aria-hidden="true"></i></a>',
            rtl: is_rtl,
            slideMargin: 25,
            slide: '.bs-slider-item',
            appendArrows: $(el).siblings('.bssl-control-nav'),
            classPrefix: 'bs-slider-',
            adaptiveHeight: true,
            accessibility: false
        });
    });

    /**
     * Style 3
     */
    $('.bs-smart-list.bssl-style-3 .bssl-items').each(function (i, el) {
        $(el).slick({
            sliderControlDots: 'off',
            prevArrow: '<a rel="prev" class="bssl-nav-btn-big prev"><i class="fa fa-angle-' + ( is_rtl ? 'right' : 'left' ) + '" aria-hidden="true"></i> ' + bs_smart_lists_loc.translations.nav_prev + '</a>',
            nextArrow: '<a rel="next" class="bssl-nav-btn-big next">' + bs_smart_lists_loc.translations.nav_next + ' <i class="fa fa-angle-' + ( is_rtl ? 'left' : 'right' ) + '" aria-hidden="true"></i></a>',
            rtl: is_rtl,
            slideMargin: 25,
            slide: '.bs-slider-item',
            appendArrows: $(el).siblings('.bssl-control-nav'),
            classPrefix: 'bs-slider-',
            adaptiveHeight: true,
            accessibility: false
        });
    });

    /**
     * Style 4
     */
    $('.bs-smart-list.bssl-style-4 .bssl-items').each(function (i, el) {
        $(el).slick({
            sliderControlDots: 'off',
            prevArrow: '<a rel="prev" class="bssl-outline bssl-nav-btn-big prev"><i class="fa fa-angle-' + ( is_rtl ? 'right' : 'left' ) + '" aria-hidden="true"></i> ' + bs_smart_lists_loc.translations.nav_prev + '</a>',
            nextArrow: '<a rel="next" class="bssl-outline bssl-nav-btn-big next">' + bs_smart_lists_loc.translations.nav_next + ' <i class="fa fa-angle-' + ( is_rtl ? 'left' : 'right' ) + '" aria-hidden="true"></i></a>',
            rtl: is_rtl,
            slideMargin: 25,
            slide: '.bs-slider-item',
            appendArrows: $(el).siblings('.bssl-control-nav'),
            classPrefix: 'bs-slider-',
            adaptiveHeight: true,
            accessibility: false
        });
    });

    /**
     * Style 5
     */
    $('.bs-smart-list.bssl-style-5 .bssl-items').each(function (i, el) {
        $(el).slick({
            sliderControlDots: 'off',
            prevArrow: '<a rel="prev" class="bssl-nav-btn-big prev"><i class="fa fa-angle-' + ( is_rtl ? 'right' : 'left' ) + '" aria-hidden="true"></i></a>',
            nextArrow: '<a rel="next" class="bssl-nav-btn-big next"><i class="fa fa-angle-' + ( is_rtl ? 'left' : 'right' ) + '" aria-hidden="true"></i></a>',
            rtl: is_rtl,
            slideMargin: 25,
            slide: '.bs-slider-item',
            appendArrows: $(el).siblings('.bssl-control-nav'),
            classPrefix: 'bs-slider-',
            adaptiveHeight: true,
            accessibility: false
        });
    });

    /**
     * Style 15
     */
    $('.bs-smart-list.bssl-style-15 .bssl-items').each(function (i, el) {
        $(el).slick({
            sliderControlDots: 'off',
            prevArrow: '<a rel="prev" class="bssl-nav-btn-big prev"><i class="fa fa-angle-' + ( is_rtl ? 'right' : 'left' ) + '" aria-hidden="true"></i> ' + bs_smart_lists_loc.translations.nav_prev + '</a>',
            nextArrow: '<a rel="next" class="bssl-nav-btn-big next">' + bs_smart_lists_loc.translations.nav_next + ' <i class="fa fa-angle-' + ( is_rtl ? 'left' : 'right' ) + '" aria-hidden="true"></i></a>',
            rtl: is_rtl,
            slideMargin: 25,
            slide: '.bs-slider-item',
            appendArrows: $(el).siblings('.bssl-control-nav'),
            classPrefix: 'bs-slider-',
            adaptiveHeight: true,
            accessibility: false
        });
    });


    /**
     * Style 16
     */
    $('.bs-smart-list.bssl-style-16 .bssl-control-nav select').on('change', function () {
        window.location = $(this).val();
    });

    /**
     * Style 17
     */
    $('.bs-smart-list.bssl-style-17 .bssl-control-nav .bssl-select').on('click', function () {
        $(this).toggleClass('open');
    });
    $('.bs-smart-list.bssl-style-17 .bssl-control-nav .bssl-select li').on('click', function (e) {
        e.preventDefault();
        window.location = $(this).data('url');
    });

    /**
     * Style 18
     */
    $('.bs-smart-list.bssl-style-18 .bssl-items').each(function (i, el) {

        $(el).slick({
            sliderControlDots: 'off',
            prevArrow: '<a rel="prev" class="bssl-nav-btn-big prev"><i class="fa fa-angle-' + ( is_rtl ? 'right' : 'left' ) + '" aria-hidden="true"></i></a>',
            nextArrow: '<a rel="next" class="bssl-nav-btn-big next"><i class="fa fa-angle-' + ( is_rtl ? 'left' : 'right' ) + '" aria-hidden="true"></i></a>',
            rtl: is_rtl,
            slide: '.bs-slider-item',
            appendArrows: $(el).siblings('.bssl-control-nav'),
            classPrefix: 'bs-slider-',
            adaptiveHeight: true,
            accessibility: false,
            fade: true
        });

        $(el).on('afterChange', function (slick, event, currentSlide) {
            var text = bs_smart_lists_loc.translations.trans_x_of_y,
                $label = $(this).closest('.bs-smart-list').find('.bssl-items-title .bssl-count');

            text = text.replace('%1$s', currentSlide + 1);
            text = text.replace('%2$s', $label.data('all'));

            $label.html(text);
        });

    });

    /**
     * Style-19
     */
    $('.bs-smart-list.bssl-style-19 .bssl-big-items').each(function (i, el) {

        $(el).slick({
            sliderControlDots: 'off',
            prevArrow: '<a rel="prev" class="bssl-nav-btn-big prev"><i class="fa fa-angle-' + ( is_rtl ? 'right' : 'left' ) + '" aria-hidden="true"></i></a>',
            nextArrow: '<a rel="next" class="bssl-nav-btn-big next"><i class="fa fa-angle-' + ( is_rtl ? 'left' : 'right' ) + '" aria-hidden="true"></i></a>',
            rtl: is_rtl,
            slide: '.bs-slider-item',
            appendArrows: $(el).siblings('.bssl-control-nav'),
            classPrefix: 'bs-slider-',
            adaptiveHeight: true,
            accessibility: false,
            fade: true
        });

    });

    /**
     * Style-20
     */
    $('.bs-smart-list.bssl-style-20 .bssl-big-items').each(function (i, el) {

        $(el).slick({
            sliderControlDots: 'off',
            prevArrow: '<a rel="prev" class="bssl-nav-btn-big prev"><i class="fa fa-angle-' + ( is_rtl ? 'right' : 'left' ) + '" aria-hidden="true"></i></a>',
            nextArrow: '<a rel="next" class="bssl-nav-btn-big next"><i class="fa fa-angle-' + ( is_rtl ? 'left' : 'right' ) + '" aria-hidden="true"></i></a>',
            rtl: is_rtl,
            slide: '.bs-slider-item',
            appendArrows: $(el).siblings('.bssl-control-nav'),
            classPrefix: 'bs-slider-',
            adaptiveHeight: true,
            accessibility: false,
            fade: true
        });

    });

});
