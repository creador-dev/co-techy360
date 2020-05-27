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

var Publisher_Translation = (function ($) {
    "use strict";

    // module
    return {

        /**
         * store object of localization data
         */
        loc: {},

        /**
         * store object all languages data
         */
        languages_list: typeof betterTranslationAllLanguages === 'object' ? betterTranslationAllLanguages : {},

        /**
         * locatization setter & getter
         *
         * @param value {Object}
         */
        set locatization(value) {
            var und = '{{undefined}}';

            this.loc = $.extend(
                {
                    button_no: false,
                    success: false,
                    button_yes: 'Yes',
                    loading: 'Loading',
                    header: und,
                    title: und,
                    body: und,
                },
                value
            );
        },
        get locatization() {

            return this.loc;
        },

        /**
         * Attach Events
         */
        init: function () {
            // Setup Translations Field
            this.set_translations_field();

            // Setup send translation
            this.set_send_translations();

        },


        /**
         * Handle Ajax Request
         *
         * @param params             {Object}    data to send
         * @param success_callback   {Function}  callback fire on success ajax request
         * @param error_callback     {Function}  callback fire on failure ajax request
         *
         * @private
         */
        _ajax: function (params, success_callback, error_callback) {

            var self       = this,
                ajaxParams = $.extend({
                        action: "bf_ajax",
                        reqID: "ajax_action",
                        type: "panel",
                        panelID: $("#bf-panel-id").val(),
                        nonce: publisher_theme_translation_loc.nonce,
                    },
                    params
                );

            $.ajax({
                type: "POST",
                dataType: "json",
                url: publisher_theme_translation_loc.ajax_url,
                data: ajaxParams,

                success: function (response) {

                    if (response.result && response.result.is_error) {
                        response.result.error_message += "\n\n";
                        response.result.error_message += JSON.stringify(ajaxParams);
                        console.error(response.result.error_message, response.result.error_code);
                        var modal = self._show_error(response.result.error_message, response.result.error_code),
                            $info = modal.$modal.find('.bs-pages-error-section textarea');


                        $info.height($info[ 0 ].scrollHeight);
                        modal.make_vertical_center();

                        response.status = 'error';
                    }

                    success_callback.apply(this, arguments);
                },
                error: function (e, code, msg) {
                    self._show_error(msg, code);

                    error_callback.apply(this, arguments);
                }
            });
        },

        _show_error: function (error_message, error_code) {
            var self = this,
                loc  = jQuery.extend({}, better_framework_loc.on_error);

            if (error_message && error_code) {
                loc.body = loc.display_error
                              .replace('%ERROR_CODE%', error_code)
                              .replace('%ERROR_MSG%', error_message);
            }

            return $.bs_modal({
                content: loc,

                buttons: {
                    close_modal: {
                        label: loc.button_ok,
                        type: 'primary',
                        action: 'close'
                    },
                }
            });
        },

        /**
         * Display loading message in Modal
         *
         * @param BS_Modal_Object {Object}   `this` object of BS modal
         * @param done_callback   {Function}  fire event when loading started
         * @private
         */
        _modal_loading: function (BS_Modal_Object, done_callback) {
            var self = this;

            BS_Modal_Object.change_skin({
                skin: 'loading',
                animations: {
                    body: 'bs-animate bs-fadeInLeft'
                },
                content: {
                    loading_heading: self.locatization.loading
                }
            });

            if (typeof done_callback === 'function') {
                done_callback(BS_Modal_Object);
            }
        },


        /**
         * Display success message in Modal
         *
         * @param BS_Modal_Object {Object}   `this` object of BS modal
         * @param done_callback   {Function}  fire event after some delay
         * @private
         */
        _modal_success: function (BS_Modal_Object, done_callback) {
            var self = this;

            BS_Modal_Object.change_skin({
                skin: 'success',
                animations: {
                    body: 'bs-animate bs-fadeInLeft'
                },
                content: {
                    success_heading: self.locatization.success || 'Success!'
                },
                timer: {
                    delay: 2200,
                    callback: done_callback
                }
            });
        },

        /**
         * Display error message in Modal
         *
         * @param BS_Modal_Object {Object}   `this` object of BS modal
         * @param done_callback   {Function}  fire event after some delay
         * @private
         */
        _modal_error: function (BS_Modal_Object, dataObj, context) {
            var self = this,
                loc  = jQuery.extend({}, publisher_theme_translation_loc.on_error);

            loc.body = loc.display_error
                          .replace('%ERROR_CODE%', dataObj.error_code || 'unknown')
                          .replace('%ERROR_MSG%', dataObj.error_message || dataObj.msg);

            loc.title = loc.titles[ context ] || loc.title;

            BS_Modal_Object.change_skin({
                template: 'default',
                skin: 'skin-1',

                content: loc,
                animations: {
                    body: 'bs-animate bs-fadeInLeft'
                },
            });
        },

        /**
         * Display BS Modal Prompt and call passed events
         *
         * @param loc_index         {String}    locatization object index saved in `publisher_theme_translation_loc` variable
         * @param on_accept         {Function}  callback function fire when prompt accepted
         * @param modal_events      {object}    list of modal events . {EventName=function{}, ...}
         *
         * @private
         */
        _confirm: function (loc_index, on_accept, modal_events) {

            if (typeof publisher_theme_translation_loc[ loc_index ] !== 'object') {
                return;
            }

            var self = this,
                loc  = publisher_theme_translation_loc[ loc_index ];

            loc.body          = loc.body.replace(
                /%%(\w+)%%/g,
                function (_, key) {

                    var callback = 'replace_' + key;

                    if (typeof self[ callback ] === 'function')
                        return self[ callback ]();
                }
            );
            this.locatization = loc;

            var buttons = {
                custom_event: {
                    label: this.locatization.button_yes,
                    type: 'primary',
                    clicked: function () {
                        on_accept.call(this);
                    }
                }
            };

            if (this.locatization.button_no) {
                buttons.close_modal = {
                    type: 'secondary',
                    action: 'close',
                    label: this.locatization.button_no
                };
            }

            $.bs_modal({
                content: this.locatization,
                close_button: false,
                buttons: buttons,
                button_position: 'left',
                events: modal_events || {},
                styles: {
                    container: 'overflow:visible;max-width: 530px;'
                }
            });
        },

        ajax_process: function (BS_Modal) {

            this._modal_loading();
        },
        turn_refresh_notice_off: function () {
            $(window).off('beforeunload.bs-admin');
        },
        /**
         * Translations Field
         ******************************************/
        set_translations_field: function () {

            var self    = this,
                $select = $("#better-framework-pre-translations");

            $select.on("change", function (e, who) {
                e.preventDefault();

                if (who === 'modal_closed') {
                    return false;
                }

                self._confirm('change_confirm', function () {
                        var modal = this;

                        self._modal_loading(modal);
                        self._ajax(
                            {
                                callback: publisher_theme_translation_loc.callback_change_translation,
                                bf_call_token: publisher_theme_translation_loc.callback_change_translation_token,
                                args: {
                                    lang: $("#better-framework-pre-translations").find(":selected").val(),
                                    current_lang: publisher_theme_translation_loc.lang
                                }
                            },
                            function (data) {

                                if (data.status == "succeed") {
                                    self.turn_refresh_notice_off();
                                    self._modal_success(modal, function () {
                                        if (typeof data.refresh != "undefined" && data.refresh) {
                                            location.reload();
                                        }
                                        modal.close_modal(data.status);
                                    })
                                } else if (data.status === 'error') {
                                    self._modal_error(modal, data, 'switch');
                                }
                            },
                            function () {
                                modal.close_modal('error');
                                Better_Framework.panel_loader("error")
                            }
                        );
                    },

                    {
                        modal_close: function (el, options, who_called) {
                            //set previous value if user canceled process
                            if (who_called !== 'succeed')
                                $select.find('[value=' + publisher_theme_translation_loc.current_lang + ']')
                                       .prop('selected', true).
                                       trigger('change', [ 'modal_closed' ]).
                                       trigger('chosen:updated');
                        }
                    }
                );
            });

            if ($.fn.chosen) {
                $select.chosen({width: "100%"});
            }
        },

        /**
         * Translations Send
         ******************************************/
        set_send_translations: function () {
            var self = this;

            $(document).on("click", "#better-translation-send", function (e) {

                e.preventDefault();


                self._confirm('share_confirm', function () {
                        var modal        = this,
                            $lang_select = modal.$modal.find('select.share-language'),
                            lang_code    = $lang_select.val(),
                            lang_name    = $lang_select.find(':selected').html();

                        self._modal_loading(modal);

                        self._ajax(
                            {
                                callback: publisher_theme_translation_loc.callback_send_translation,
                                bf_call_token: publisher_theme_translation_loc.callback_send_translation_token,
                                args: {
                                    lang_name: lang_name,
                                    lang_code: lang_code,
                                }
                            },
                            function (data) {

                                if (data.status == "succeed") {
                                    self._modal_success(modal, function () {

                                        if (typeof data.refresh != "undefined" && data.refresh) {
                                            location.reload();
                                        }
                                        modal.close_modal(data.status);
                                    })
                                } else {
                                    modal.close_modal(data.status);
                                }
                            },
                            function () {
                                modal.close_modal('error');
                                Better_Framework.panel_loader("error")
                            }
                        );
                    },
                    {
                        modal_loaded: function () {
                            var $body = this.$modal.find('.bs-modal-body');

                            $body.height(200);

                            if ($.fn.chosen) {
                                this.$modal.find('select.chosen').chosen();
                            }

                            var currentLang = $("#better-framework-pre-translations").val();

                            this.$modal.find('select.share-language')
                                .find('option[value="' + currentLang + '"]')
                                .prop('selected', true)
                                .trigger("chosen:updated");

                            $('.bs-modal-body', this.$modal).css('overflow', 'visible');
                        }
                    }
                );
            });
        },


        replace_language_dropdown: function () {
            var results = '<div class="typo-field-container bf-fullwidth-dropdown" style="margin-top: 15px;"><select name="share-language" class="chosen share-language">';

            for (var locale in this.languages_list) {
                results += '<option value="' + locale + '">' + this.languages_list[ locale ] + '</option>';
            }

            results += '</select></div>';
            return results;
        }
    };

})(jQuery);

// load when ready
jQuery(function () {
    Publisher_Translation.init();
});
