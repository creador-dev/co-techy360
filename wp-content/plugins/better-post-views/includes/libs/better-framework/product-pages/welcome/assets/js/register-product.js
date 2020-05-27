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

(function ($) {
    var bs_product_register = function () {
        this.init();
    }

    bs_product_register.prototype = {
        init: function () {
            var self = this;
            jQuery(document).ready(function ($) {
                self.attach_register_btn_event();
                self.attach_submit_event();
                self.attach_help_modal();
            });
        },
        attach_register_btn_event: function () {
            var self = this;
            $(document).on('click', '#bs-login-register-btn', function (e) {
                e.preventDefault();
                self.attach_auto_check_license_event();
                window.open(this.href);
            });
        },
        attach_help_modal: function () {
            if ($.bs_modal) {

                $("#register-help-modal").on('click', function (e) {
                    e.preventDefault();
                    $.bs_modal({
                        content: bs_register_product.help,
                        buttons: {
                            close_modal: {
                                type: 'primary',
                                action: 'close',
                                label: bs_register_product.help.close_btn
                            }
                        },
                        template: 'single_image',
                        styles: {
                            container: 'top:10%'
                        },
                        is_vertical_center: false
                    });
                });
            }
        },
        bind_input_mask: function () {
            if ($.fn.inputmask) {
                $("#bs-purchase-code").inputmask({
                    mask: "*{8}\-*{4}\-*{4}\-*{4}\-*{12}"
                });
            }
        },
        attach_submit_event: function () {

            var self = this;
            $("#bs-register-product-form").on('submit', function (e) {
                e.preventDefault();
                self.register_product();

                return false;
            });
        },
        ajax_params: function (params) {
            var default_obj = {},
                default_params = $("#bs-pages-hidden-params").serializeArray();

            if (default_params) {
                for (var i = 0; i < default_params.length; i++) {
                    default_obj[ default_params[ i ].name ] = default_params[ i ].value;
                }
            }

            return $.extend(default_obj, params);
        },

        ajax: function (params, success_callback, always_callback) {

            params = this.ajax_params(params);

            $.ajax({
                 url: ajaxurl,
                 type: 'POST',
                 dataType: 'json',
                 data: $.extend(
                     {page_id: $("#bs-pages-current-id").val()},
                     params
                 )
             })
             .done(success_callback)
             .always(function () {
                 if (always_callback)
                     always_callback()
             });
        },
        register_product: function () {
            var $form = $("#bs-register-product-form"),
                self = this,
                $wrapper = $form.closest('.bs-pages-box-wrapper'),
                data = $form.serializeArray(),
                loadingClass = 'bs-loading-wrapper',
                ajax_params = {bs_pages_action: 'register'};

            if ($wrapper.hasClass(loadingClass))
                return false;

            for (var i = 0; i < data.length; i++) {
                ajax_params[ data[ i ].name ] = data[ i ].value;
            }

            $wrapper.addClass(loadingClass);
            this.ajax(ajax_params, function (r) {
                var stat = r.status || r[ 'error-code' ], m = bs_register_product.messages;

                $form.closest('.bs-pages-box-description')
                     .find('.bs-product-desc')
                     .html('<p>' + (function () {
                             if (typeof m[ stat ] === 'string')
                                 return m[ stat ];

                             if (typeof r[ 'error-message' ] === 'string')
                                 return r[ 'error-message' ];
                             return '';
                         })()      + '</p>');

                if (stat === 'success' || stat === 'add-to-account')
                    $form.slideUp();

                if (stat === 'add-to-account') {
                    self.attach_auto_check_license_event();
                } else {
                    self.remove_auto_check_license_event();
                }
            }, function () {
                $wrapper.removeClass(loadingClass)
            });

            return true;
        },
        attach_auto_check_license_event: function () {
            var self = this;
            $(window).on('focus.bs-reg-product', function () {
                self.register_product();
            });
        },
        remove_auto_check_license_event: function () {
            $(window).off('focus.bs-reg-product');
            this.register_window = false;
        }
    };

    new bs_product_register();
})(jQuery);