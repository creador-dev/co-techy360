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

(function ($) {
    "use strict";

    var xhr, xhrList = {},
        cache = {};

    function _dispatchEvents(fireScroll) {
        fireScroll = typeof fireScroll === 'undefined' ? true : fireScroll;
        if (fireScroll) {
            $(window).scroll(); // sticky column overflow fix
        }
    }

    function Better_Ajax_Pagination(settings) {

        this.prefix = 'bs_ajax_paginate_';
        this.deferredPrefix = 'bs_deferred_loading_';
        this.isPrevPage = false;
        this.$link_el = false;
        this.id = false;
        this.paginationStyle = false;

        this.settings = $.extend({
            afterSuccessDeferredAjax: function () {
            }
        }, settings);

        return this;
    }

    Better_Ajax_Pagination.prototype.init = function (wrapper) {
        var _this = this;

        $(wrapper).on('click', '.bs-ajax-pagination a', function (e) {
            e.preventDefault();

            var $this = $(this),
                $pagination = $this.parent();

            if ($this.hasClass('disabled') || $pagination.hasClass('bs-pagination-loading')) {
                return false;
            } else {
                $pagination.addClass('bs-pagination-loading')
            }

            var $this_pagination = $this.closest('.bs-pagination');

            _this.$link_el = $this;
            _this.id = $this.data('id');

            try {
                if (!_this.id)
                    throw 'invalid element';

                _this.setNewPageNumber();

                _this.paginationStyle = _this.getPaginationStyle();

                var props = _this.getAjaxProps(),
                    $this_pagination_wrapper = $this_pagination.prevAll('.bs-pagination-wrapper');

                var cached_data = _this.cache_get(props['current_page'], _this.id);
                if (typeof cached_data === 'object') {
                    $this_pagination_wrapper.addClass('bs-pagination-cached');

                    _this.handle_response(cached_data);
                    $pagination.removeClass('bs-pagination-loading');
                } else {

                    $this_pagination_wrapper.removeClass('bs-pagination-cached');
                    // add first page to cache
                    if (props['current_page'] == 2) {
                        _this.cache_add(
                            1,
                            {
                                output: $this_pagination_wrapper.html(),
                                label: $this_pagination.find('.bs-pagination-label').html(),
                                have_next: true,
                                have_prev: false
                            },
                            _this.id
                        );
                    }

                    // add loading
                    switch (_this.paginationStyle) {

                        case 'next_prev':
                            $this_pagination_wrapper.children().addClass('bs-pagination-in-loading');
                            $this_pagination_wrapper.prepend(_this.getLoadingRawHtml());
                            break;

                        case 'more_btn_infinity':
                            $this.find('.loaded').hide();
                            $this.find('.loading').show();
                            $this.removeClass('more_btn_infinity')
                                .addClass('infinity')
                                .addClass('bs-pagination-in-loading');
                            $this_pagination.removeClass('more_btn_infinity')
                                .addClass('infinity');
                            break;

                        case 'infinity':
                        case 'more_btn':
                            $this.addClass('bs-pagination-in-loading');
                            $this.find('.loaded').hide();
                            $this.find('.loading').show();
                            break;

                    }

                    xhr = $.ajax({
                        url: props['ajax_url'],
                        type: 'POST',
                        dataType: 'json',
                        data: props
                    })
                        .fail(function (e) {
                            $pagination.removeClass('bs-pagination-loading');

                            // remove loading
                            switch (_this.paginationStyle) {

                                case 'more_btn_infinity':
                                case 'next_prev':
                                    $this_pagination_wrapper.find('.bs-pagin-loading-wrapper').remove();
                                    $this.addClass('bs-pagination-in-loading');
                                    break;

                                case 'infinity':
                                case 'more_btn':
                                    $this.addClass('bs-pagination-in-loading');
                                    $this.find('.loaded').show();
                                    $this.find('.loading').hide();
                                    break;
                            }

                            if (e.statusText !== "abort")
                                alert('cannot load data. please check your internet connection!'); // todo make decision for this
                        })
                        .done(function (response) {
                            _this.handle_response(response);

                            if (_this.cacheThisStyle(_this.paginationStyle)) {
                                _this.cache_add(props['current_page'], response, _this.id);
                            }

                            // remove loading
                            switch (_this.paginationStyle) {

                                case 'more_btn_infinity':
                                    $this.removeClass('bs-pagination-in-loading');
                                    $this_pagination_wrapper.find('.bs-pagin-loading-wrapper').remove();
                                    break;

                                case 'next_prev':
                                    $this.removeClass('bs-pagination-in-loading');
                                    $this_pagination_wrapper.find('.bs-pagin-loading-wrapper').remove();
                                    $this_pagination_wrapper.children().removeClass('bs-pagination-in-loading');
                                    break;

                                case 'infinity':
                                case 'more_btn':
                                    $this.removeClass('bs-pagination-in-loading');
                                    $this.find('.loaded').show();
                                    $this.find('.loading').hide();
                                    break;

                            }

                            $pagination.removeClass('bs-pagination-loading');
                        });
                }
            } catch (err) {
                _this.debug(err);
            }
        });

        if(typeof OnScreen == 'function') {

            new OnScreen({
                tolerance: 0,
                debounce: 100,
                container: window
            }).on('enter', '.bs-ajax-pagination.infinity', function (el) {
                $(el).find('a').click();
            });
        }
    }
    Better_Ajax_Pagination.prototype.filter_slider_params = function (settings) {

        if (typeof settings.autoplayspeed !== 'undefined') {
            settings.autoplaySpeed = settings.autoplayspeed;
        }

        settings.dots = typeof settings.sliderControlDots !== 'undefined' && settings.sliderControlDots !== 'off';
        settings.autoplay = typeof settings.sliderAutoplay !== 'undefined' && parseInt(settings.sliderAutoplay);
        settings.speed = settings.sliderAnimationSpeed;

        if (typeof settings.sliderControlNextPrev !== 'undefined' && settings.sliderControlNextPrev == 'off') {
            settings.appendArrows = false;
        }

        return settings;
    };
    Better_Ajax_Pagination.prototype.handler_slider = function (sliderContext) {
        var self = this;

        if ($.fn.slick) {
            $('.bs-slider-items-container', sliderContext).each(function () {
                var $this = $(this),
                    is_rtl = $(document.body).hasClass('rtl');
                if ($this.hasClass('slick-ready')) {
                    return;
                }
                var defaults = $this.data(),
                    settings = self.filter_slider_params($.extend({
                        sliderControlDots: 'off',
                        prevArrow: '<a class="btn-bs-pagination prev" rel="prev" title="Previous">\n\t\t\t<i class="fa fa-angle-' + ( is_rtl ? 'right' : 'left' ) + '" aria-hidden="true"></i>\n\t\t</a>',
                        nextArrow: '<a rel="next" class="btn-bs-pagination next" title="Next">\n\t\t\t<i class="fa fa-angle-' + ( is_rtl ? 'left' : 'right' ) + '" aria-hidden="true"></i>\n\t\t</a>',
                        rtl: is_rtl,
                        slideMargin: 25,
                        slide: '.bs-slider-item',
                        appendArrows: $this.find('.bs-slider-controls .bs-control-nav'),
                        classPrefix: 'bs-slider-',
                        dotsClass: 'bs-slider-dots',
                        customPaging: function (slider, i) {
                            return $('<span class="bts-bs-dots-btn"></span>').text(i + 1);
                        }
                    }, defaults));

                if (settings.sliderControlDots && defaults.sliderControlDots) {
                    settings.appendDots = $this.find('.bs-slider-controls');
                    settings.dotsClass += ' ' + settings.dotsClass + '-' + defaults.sliderControlDots;
                }

                $this.slick(settings);
                $this.addClass('slick-ready');
            });

            $('.multi-tab').on('shown.bs.tab', 'a[data-toggle="tab"]:not([data-deferred-init])', function (e) {
                var selector = $(e.target).attr('href');
                $(selector).find('.bs-slider-items-container').slick('setPosition');
                _dispatchEvents();
            });
        }
    };


    Better_Ajax_Pagination.prototype.refreshLazyImages = function () {

        if (Publisher_Theme && Publisher_Theme.refreshLazyImages)
            Publisher_Theme.refreshLazyImages();
    };

    Better_Ajax_Pagination.prototype.bindDeferredEvents = function ($context) {
        //handler deferred html loading tabs
        var tabHeight = 200, self = this, minHeight = 0;
        $('.multi-tab', $context).on('show.bs.tab', 'a[data-deferred-init]', function (e) {
            var prev_el = $(this).closest('.multi-tab')
                .find('.active')
                .attr('href');
            tabHeight = $(prev_el).height();
        });
        $('.tabs-section', $context).on('show.bs.tab', 'a[data-deferred-init]', function (e) {
            var prev_el = $(this).closest('.tabs-section')
                    .find('.active:visible a')
                    .data('target'),
                $target = $(prev_el);
            tabHeight = $target.height();

        }).on('show.bs.tab', 'a', function () {

            self.refreshLazyImages();

            /**
             * Fix Mega Menu Height to prevent height jumping while change the tab
             */
            var prev_el = $(this).closest('.tabs-section')
                    .find('.active:visible a')
                    .data('target'),
                $target = $(prev_el),
                _tabHeight = $target.outerHeight();

            if (_tabHeight) {
                var $parent = $target.closest('.tab-content');
                if ($parent.length) {
                    var calcHeight = Math.max(_tabHeight, parseInt($parent.outerHeight()));

                    calcHeight = Math.max(calcHeight, minHeight);

                    $parent.css('min-height', calcHeight).data('bs-height', calcHeight);

                    minHeight = calcHeight;
                }
            }

        });
        $('a[data-deferred-init]', $context).each(function (e) {

            var $this = $(this),
                event = $this.data('deferred-event') || 'click';

            if ($this.closest('.deferred-block-exclude').length > 0) {
                return;
            }
            $this.on(event, function (e) {
                var $this = $(this),
                    blockID = $this.data('deferred-init'),
                    $wrapper = $("#bsd_" + blockID),
                    $container = $wrapper.closest('.bs-deferred-container');

                if ($wrapper.hasClass('bs-deferred-load-wrapper')) {
                    if ($wrapper.hasClass('bs-deferred-loaded')) {
                        var isPinned = $wrapper.closest('.bs-pinning-block.pinned').length;
                        _dispatchEvents(!isPinned);
                    } else {
                        $container.removeClass('bs-tab-animated');
                        self.handleDeferredElements($wrapper, {loadingHeight: tabHeight ? tabHeight : undefined}, function () {
                            $container.addClass('bs-tab-animated');
                            $wrapper.addClass('bs-deferred-loaded');

                            var $pagination = $container.find('.bs-pagination');

                            if (tabHeight && ( !$pagination.length || $pagination.hasClass('next_prev') )) {
                                $container.css('min-height', tabHeight);
                            }

                            tabHeight = undefined;
                        });
                    }
                }
            });
        });

    }
    Better_Ajax_Pagination.prototype.handleDeferredElements = function ($el, args, successCallback) {
        var self = this;

        if (!$el.hasClass('bs-deferred-load-wrapper')) {
            $el = $el.find('.bs-deferred-load-wrapper');
        }

        $el.each(function () {
            var $wrapper = $(this);
            if ($wrapper.hasClass('deferred-html-exists')) {
                return;
            }

            args = $.extend({
                loadingHeight: 100,
                loadingMinHeight: 0
            }, args);

            if (!$wrapper.find('.deferred-loading-container').length) {
                var $loading = $('<div></div>', {
                    'class': 'deferred-loading-container',
                    height: args.loadingHeight
                });

                var $pagination = $wrapper.find('.bs-pagination');

                if (args.loadingMinHeight && ( !$pagination || !$pagination.hasClass('more_btn') )) {
                    $loading.css('min-height', args.loadingMinHeight);
                }

                $loading.append(self.getLoadingRawHtml());
                $loading.appendTo($wrapper);
            }

            self.id = $wrapper.attr('id');
            var props = self.getAjaxProps('deferred');

            if (typeof  xhrList[self.id] === 'object')
                xhrList[self.id].abort();

            xhrList[self.id] = $.ajax({
                url: props['ajax_url'],
                type: 'POST',
                dataType: 'json',
                data: props
            }).done(function (response) {
                $wrapper.find('.deferred-loading-container').remove();
                delete xhrList[self.id];

                $wrapper.addClass('deferred-html-exists').append(response.output);
                self.handler_slider($wrapper);

                if (successCallback)
                    successCallback.call($wrapper, response);

                var isPinned = $wrapper.closest('.bs-pinning-block.pinned').length;
                _dispatchEvents(!isPinned);

                self.settings.afterSuccessDeferredAjax.call(self, $wrapper, response);
            });
        });
    };
    /**
     * Get loading html
     *
     * @returns {string}
     */
    Better_Ajax_Pagination.prototype.getLoadingRawHtml = function () {
        return '<div class="bs-pagin-loading-wrapper">' + bs_pagination_loc.loading + '</div>';
    }

    /**
     * Return Ajax Properties (data)
     *
     * @param type  string   pagination|deferred. get property of pagination or deferred loading. default: pagination
     * @returns {Array}
     */
    Better_Ajax_Pagination.prototype.getAjaxProps = function (propType) {
        propType = propType || 'pagination';
        var prefix = propType === 'deferred' ? this.deferredPrefix : this.prefix;

        var _jsonStringVarName = prefix + this.id, props;
        if (typeof window[_jsonStringVarName] === 'undefined')
            throw 'pagination settings not set';

        props = jQuery.parseJSON(window[_jsonStringVarName]);

        props['_data'] = props.data;

        switch (propType.toLowerCase()) {
            case 'pagination':
                props['action'] = 'pagination_ajax';
                props['current_page'] = this.$link_el.parent().data('current-page') || 1;
                props['pagin_type'] = this.paginationStyle;
                break;

            case 'deferred':
                props['action'] = 'deferred_loading';
                props['current_page'] = 1;
                break;
        }

        // Get public ajax variables

        if (this.$link_el) {

            var customData = this.$link_el.closest('.bs-pagination').data('bs-pagin-data');

            if (customData) {
                props['_data'] = customData;

            }
        }

        return props;
    };


    /**
     * save current page number
     */
    Better_Ajax_Pagination.prototype.setNewPageNumber = function () {
        var $pagination = this.$link_el.parent(),
            current_page = $pagination.data('current-page') || 1;

        this.isPrevPage = this.$link_el.hasClass('prev');

        if (this.isPrevPage) {
            if (current_page < 2)
                throw 'Wrong page number!';

            current_page--;
        } else {
            current_page++;
        }

        $pagination.data('current-page', current_page);
    };


    Better_Ajax_Pagination.prototype.debug = function (message) {
        console.error(message);
    };


    /**
     *
     * @param styleName string name of pagination style
     * @returns {boolean}
     */
    Better_Ajax_Pagination.prototype.cacheThisStyle = function (styleName) {
        return 'next_prev' === styleName;
    };


    /**
     * get name of pagination style from pagination link element
     *
     * @returns {string}
     */
    Better_Ajax_Pagination.prototype.getPaginationStyle = function () {
        var valid_types = [
            'next_prev',
            'more_btn',
            'more_btn_infinity',
            'infinity'
        ];
        var $pagination_wrapper = this.$link_el.closest('.bs-pagination'),
            current_class;
        for (var i = 0; i < valid_types.length; i++) {
            current_class = valid_types[i];
            if ($pagination_wrapper.hasClass(current_class))
                return current_class;
        }

        return '';
    };


    /**
     * get cached data
     *
     * @param name  string   cache name
     * @param group string   cache group group name
     * @returns {*}
     */
    Better_Ajax_Pagination.prototype.cache_get = function (name, group) {
        if (typeof cache[group] !== 'undefined' && typeof cache[group][name] !== 'undefined') {

            return cache[group][name];
        }
    };


    /**
     * save data on cache
     *
     * @param name  string   cache name
     * @param data  mixed    data to save
     * @param group string   cache group group name
     */
    Better_Ajax_Pagination.prototype.cache_add = function (name, data, group) {
        if (typeof cache[group] === 'undefined')
            cache[group] = {};

        cache[group][name] = data;
    };


    Better_Ajax_Pagination.prototype.handle_event = function (response, event) {

        if (typeof response['events'] !== 'object')
            return false;

        if (typeof response['events'][event] === 'string') {

            var callback_name = response['events'][event];
            //handle after ajax_event
            if (typeof window[callback_name] === 'function') {

                window[callback_name].call(this, response, event);
            }
        }
    };

    /**
     * handle ajax request, append html output and manage button classes and atts
     *
     * @param response ajax request response
     */
    Better_Ajax_Pagination.prototype.handle_response = function (response) {
        if (response === null || typeof response['error'] === 'string') {

            if (response === null) {
                this.debug("Error!");
            } else {
                this.debug(response['error']);
            }

            return;
        }

        var $paginate = this.$link_el.closest('.bs-pagination'),
            $outputSection = $paginate.prevAll('.bs-pagination-wrapper');

        // set dynamic page vars

        if (response.data) {
            $paginate.data('bs-pagin-data', response.data);
        }

        var isPinned = $paginate.closest('.bs-pinning-block.pinned').length;

        this.handle_event(response, 'before_append');

        switch (this.paginationStyle) {

            case 'next_prev':
                $outputSection.html(response['output']);
                this.handle_event(response, 'after_append');
                $outputSection
                    .addClass('bs-animate')
                    .addClass(this.isPrevPage ? 'bs-fadeInLeft' : 'bs-fadeInRight')
                    .delay(400)
                    .queue(function (n) {
                        $(this).removeClass('bs-animate bs-fadeInRight bs-fadeInLeft');
                        n();
                    });

                _dispatchEvents(!isPinned);
                if (typeof response['label'] !== 'undefined') {
                    $paginate.find('.bs-pagination-label').html(response['label']);
                }

                $paginate.find('.next')[response['have_next'] ? 'removeClass' : 'addClass']('disabled');

                $paginate.find('.prev')[response['have_prev'] ? 'removeClass' : 'addClass']('disabled');

                break;

            case 'more_btn':
            case 'more_btn_infinity':
            case 'infinity':

                if (typeof response['add-to'] === 'string') {
                    var $appended_el = $(response['output']);
                    if (response['add-type'] == 'prepend') {
                        $outputSection.find(response['add-to']).prepend($appended_el);
                    } else {
                        $outputSection.find(response['add-to']).append($appended_el);
                    }
                } else {
                    var $appended_el = $outputSection.append(response['output']).children(':last');
                }

                _dispatchEvents(!isPinned);
                this.handle_event(response, 'after_append');

                $appended_el
                    .addClass('bs-animate bs-fadeInUp')
                    .delay(400)
                    .queue(function (n) {
                        $(this).removeClass('bs-animate bs-fadeInUp');
                        n();
                    });

                if (this.paginationStyle === 'infinity') {
                    if (!response['have_next']) {
                        this.$link_el.unbind('inview').remove();
                    }
                } else {

                    if (response['have_next']) {
                        this.$link_el.removeClass('disabled');
                    } else {
                        this.$link_el.addClass('disabled');
                        this.$link_el.find('.loaded').remove();
                        this.$link_el.find('.no-more').show();
                    }
                }


                // Re-init sticky column
                setTimeout(function () {

                    if (!$.fn.hcSticky) {
                        return;
                    }

                    var el = $outputSection[0];

                    for (var i = 0; i <= 8; i++) {

                        if (!el || !el.parentElement) {
                            break;
                        }

                        if (el.parentElement.classList.contains('wrapper-sticky')) {

                            $(el).hcSticky('reinit');
                            break;
                        }

                        el = el.parentElement;
                    }

                });

                $outputSection.closest('');

                break;
        }

        this.refreshLazyImages();

        this.handle_event(response, 'after_response');
    };

    $.fn.Better_Ajax_Pagination = function (settings) {
        new Better_Ajax_Pagination(settings).handler_slider();

        return this.each(function () {
            new Better_Ajax_Pagination().init(this);
        });
    };

    $.fn.Better_Deferred_Loading = function (settings) {
        var pagination = new Better_Ajax_Pagination(settings);
        pagination.bindDeferredEvents(settings.context);

        return pagination;
    }
})(jQuery);