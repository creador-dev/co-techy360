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


var Better_Fonts_Manager = (function ($) {
    "use strict";

    return {

        init: function () {

            switch (better_fonts_manager_loc.type) {

                // Setup Panel
                case 'panel':

                    this.setup_panel_fonts_manager();

                    //Setup General fields
                    this.setup_field_typography();
                    this.setup_field_font_selector();

                    this.attach_events();

                    $(".bf-section[data-id='font_stacks']").on('keyup', 'input[name$="[id]"]', function () {
                        var $this    = $(this),
                            $wrapper = $this.closest('.bf-repeater-item');

                        $wrapper.find('.bf-repeater-item-title .handle-repeater-title-label')
                            .text('Font Stack: ' + $this.val());

                    }).find('input[name$="[id]"]').keyup();

                    break;

                // Setup Widgets
                case 'widgets':

                    break;

                // Setup Metaboxes
                case 'metabox':
                    break;

                // Setup Menus
                case 'menus':

                    break;

            }

        },

        load_google_fonts: {},
        load_theme_fonts: {},
        load_custom_fonts: {},
        load_google_ea_fonts: {},

        attach_events: function () {
            var self = this;
            $(document).on('bf-ajax-tab-loaded', function (e, target) {
                self.setup_panel_fonts_manager(target);

                //Setup General fields
                self.setup_field_typography(target);
            });

        },

        _length: function (object) {
            if (!object) {
                return 0;
            }

            if (Object.keys) {
                return Object.keys(object).length;
            }

            var count = 0, i;

            for (i in object) {
                if (object.hasOwnProperty(i)) {
                    count++;
                }
            }

            return count;
        },

        ajax: function (action, data, success_callback) {
            return $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: better_framework_loc.bf_ajax_url,
                    data: $.extend(true, {
                        action: 'bf_ajax',
                        reqID: action,
                        type: better_framework_loc.type,
                        panelID: $('#bf-panel-id').val(),
                        nonce: better_framework_loc.nonce,
                        lang: better_framework_loc.lang,
                        data: []
                    }, data),
                    success: success_callback,
                    error: function () {
                        Better_Framework.panel_loader('error');
                    }
                }
            );
        },

        getFontSelectorFontsList: function () {

            var self = this, font;

            var results = [],
                lbl     = better_fonts_manager_loc.labels;

            for (var type in better_fonts_manager_loc.fonts) {

                for (var fontID in better_fonts_manager_loc.fonts[type]) {
                    font           = better_fonts_manager_loc.fonts[type][fontID];
                    var styleCount = font.variants ? self._length(font.variants) : 1,
                        cat        = font.category ? font.category : 'serif';

                    results.push({
                        type_label: lbl.types[type] ? lbl.types[type] : type,
                        type: type.replace('fonts', 'font'),
                        cat: cat,
                        name: font.name ? font.name : fontID,
                        styles: lbl.style.replace('%s', styleCount),
                        id: fontID,
                    });

                }
            }

            return results;
        },

        loadFonts: function (type, fontFamilies, fontloading, fontactive) {

            switch (type) {

                case 'google_font':
                    WebFont.load({
                        google: {
                            families: fontFamilies,
                            text: better_fonts_manager_loc.labels.preview_text
                        },
                        fontloading: fontloading,
                        fontactive: fontactive,
                        fontinactive: fontactive,
                        classes: false
                    });

                    break;

                case 'google_ea_font':
                case 'custom_font':
                case 'theme_font':

                    var qVar = type.replace(/\-+/g, '_') + "_id";

                    fontFamilies.forEach(function (fontfamily) {

                        WebFont.load({
                            custom: {
                                families: fontfamily,
                                urls: [better_fonts_manager_loc.admin_fonts_css_url + '&' + qVar + "=" + fontfamily]
                            },

                            fontloading: fontloading,
                            fontactive: fontactive,
                            fontinactive: fontactive,
                            classes: false
                        })
                    });

                    break;

                default:
                    return false;
                    break;
            }

            return true;
        },

        /**
         * Initialize font selector modal
         */
        setup_field_font_selector: function () {

            var self           = this,
                autoCloseDelay = 150,
                $context;

            var fonts = self.getFontSelectorFontsList(),
                $fontSelectorEl;


            function openCustomFontModal(mainModal, selectorModal) {
                var wpMediaFrameClosed = false;

                function catchWpMediaFrameStatus(modalObj) {
                    modalObj.$modal
                        .find('.bf-media-upload-btn')
                        .on('click', function () {
                            var $btn = $(this);
                            setTimeout(function () {

                                wp.media.frame.on('close', function () {
                                    wpMediaFrameClosed = true;
                                });

                                wp.media.frame.on('select', function () {
                                    $('.input', $btn.parent()).trigger('keyup');
                                });

                            }, 100);
                        });
                }

                function overlayClickCloseModal(modalObj) {
                    modalObj.find(".bs-modal-overlay").on('click', function () {
                        modalObj.close_modal();
                    })
                }

                function isWpMediaFrameClosed() {
                    return wpMediaFrameClosed;
                }


                function handleAddCustomFontBtn(addFontModal) {

                    function generateSingleFontHtml() {
                        var name = $('.font-name', addFontModal.$modal).val();

                        var o = selectorModal.options,
                            l = better_fonts_manager_loc.labels;

                        var replacement = {
                            type: 'custom_font',
                            cat: 'serif',
                            id: name,
                            name: name,
                            styles: 1,
                            preview_text: l.preview_text,
                            type_label: l.filter_types.custom_font
                        };

                        return Mustache.render(o.itemBeforeHtml + o.itemInnerHtml + o.itemAfterHtml, replacement);
                    }

                    var singleFontItem = generateSingleFontHtml(name);


                    var ajaxData = $.extend(better_fonts_manager_loc.add_font, {
                        args: $('.form', addFontModal.$modal).serialize()
                    });


                    // Display loading..
                    addFontModal.change_skin({
                        skin: 'loading',
                        template: 'default',
                        animations: {
                            body: 'bs-animate bs-fadeInLeft'
                        }
                    });

                    self.ajax('ajax_action', ajaxData, function (data) {

                        var fontsList = $('.bssm-list', selectorModal.bsModal.$modal);

                        if (data.new_font_id) {
                            fontsList
                                .find('.bf-font-family')
                                .val(data.new_font_id);
                        }

                        // Append new custom font to main modal
                        if (singleFontItem) {
                            fontsList.prepend(singleFontItem);
                            selectorModal.markAsSelected(fontsList.find(':first'));
                            selectorModal.updateItemsList();
                        }


                        addFontModal.close_modal();


                        setTimeout(function () {
                            mainModal.close_modal();
                        }, autoCloseDelay + addFontModal.options.animations.delay);
                    });
                }

                function handleCustomFontInteractiveFields(modalObj) {

                    var _isPrimaryBtnActive = false,
                        $modal              = modalObj.$modal;

                    function togglePrimaryBtnDisable(inputValue) {
                        if (inputValue && !_isPrimaryBtnActive) {
                            $modal.find('.bs-modal-btn-primary').removeClass('disabled');
                            _isPrimaryBtnActive = true;
                        } else if (!inputValue && _isPrimaryBtnActive) {

                            if (!$modal.find('.input-section:not(.empty)').length) {
                                $modal.find('.bs-modal-btn-primary').addClass('disabled');
                                _isPrimaryBtnActive = false;
                            }
                        }
                    }

                    /**
                     * Auto focus on 'Font Name' field
                     */
                    $modal.find('input.font-name').focus();

                    /**
                     * Trigger upload buttons active/deactivate style
                     */
                    $modal
                        .find(':input')
                        .on('keyup', function () {
                            var $this = $(this),
                                value = $.trim($this.val());

                            $this.parent()[value === '' ? 'addClass' : 'removeClass']('empty');

                            if ($this.hasClass('font-url-input')) {
                                togglePrimaryBtnDisable(value);
                            }
                        });
                }


                $.bs_modal_template('upload-font', '<div class="bs-modal-default bs-font-selector-modal bs-font-upload-modal" {{#inline_style}} style="{{inline_style}}"\n     {{/inline_style}}>\n{{#close_button}}\n<a href="#" class="bs-close-modal">\n    <i class="fa fa-times" aria-hidden="true"></i>\n</a>\n{{/close_button}}\n<div class="bs-modal-header-wrapper bs-modal-clearfix">\n    <h2 class="bs-modal-header">\n        {{#icon}}\n        <i class="fa {{icon}}"></i>\n        {{/icon}}\n\n        {{header}}\n    </h2>\n</div>\n\n<div class="bs-modal-body">\n\n    <form class="form">\n\n        <div class="bf-section-container">\n            <label for="custom-font-name">{{font_name}}</label>\n            <input type="text" class="font-name input" name="font-name" value="" id="custom-font-name" autofocus>\n\n        </div>\n\n\n        <div class="bf-clearfix bf-choose-fonts">\n            <div class="bf-section-container font-woff">\n                <label for="custom-font-woff">{{font_woff}}</label>\n                <div class="input-section empty">\n\n                    <input type="text" value="" id="custom-font-woff" name="fonts[woff]" class="input font-url-input">\n                    <a class="bf-media-upload-btn bssm-button" \n                       data-mediatitle="{{upload_woff}}"\n                       data-mediasettings=\'{"type":["font/woff","font/woff2"]}\'\n                       data-buttontext="{{upload_woff}}">\n                        {{upload_woff}}\n                    </a>\n                </div>\n            </div>\n\n\n            <div class="bf-section-container font-ttf">\n                <label for="custom-font-ttf">{{font_ttf}}</label>\n                <div class="input-section empty">\n\n                    <input type="text" value="" id="custom-font-ttf" name="fonts[ttf]" class="input font-url-input">\n                    <a class="bf-media-upload-btn bssm-button" \n                       data-mediatitle="{{upload_ttf}}"\n                       data-mediasettings=\'{"type":["font/ttf"]}\'\n                       data-buttontext="{{upload_ttf}}">\n                        {{upload_ttf}}\n                    </a>\n                </div>\n            </div>\n\n\n            <div class="bf-section-container font-svg">\n                <label for="custom-font-svg">{{font_svg}}</label>\n                <div class="input-section empty">\n\n                    <input type="text" value="" id="custom-font-svg" name="fonts[svg]" class="input font-url-input">\n                    <a class="bf-media-upload-btn bssm-button" \n                       data-mediatitle="{{upload_svg}}"\n                       data-mediasettings=\'{"type":["font/svg"]}\'\n                       data-buttontext="{{upload_svg}}">\n                        {{upload_svg}}\n                    </a>\n                </div>\n            </div>\n\n\n            <div class="bf-section-container font-eot">\n                <label for="custom-font-eot">{{font_eot}}</label>\n\n                <div class="input-section empty">\n\n                    <input type="text" value="" id="custom-font-eot" name="fonts[eot]" class="input font-url-input">\n                    <a class="bf-media-upload-btn bssm-button" \n                       data-mediatitle="{{upload_eot}}"\n                       data-mediasettings=\'{"type":["font/eot"]}\'\n                       data-buttontext="{{upload_eot}}">\n                        {{upload_eot}}\n                    </a>\n                </div>\n\n            </div>\n        </div>\n\n        {{{bs_buttons}}}\n    </form>\n</div>');
                $.bs_modal({
                    styles: {
                        container: 'max-width:555px'
                    },
                    template: 'upload-font',
                    content: $.extend(mainModal.options.content, {
                        header: 'Upload Custom Font',
                        icon: 'fa-upload'
                    }),
                    buttons: {
                        add_font: {
                            label: better_fonts_manager_loc.labels.add_font,
                            type: 'primary',
                            btn_classes: 'bssm-button add-font-btn disabled',
                            clicked: function () {
                                /**
                                 * Handle Add Custom Font Button
                                 */

                                handleAddCustomFontBtn(this);
                            }
                        }
                    },
                    events: {

                        after_append_html: function () {
                            handleCustomFontInteractiveFields(this);
                            catchWpMediaFrameStatus(this);
                            overlayClickCloseModal(this);
                        },

                        handle_keyup: function (e, obj, _continue) {
                            /**
                             * Enter:
                             *  e.which = 27
                             */
                            if (_continue && e.which === 27 && isWpMediaFrameClosed()) {
                                wpMediaFrameClosed = false;
                                return false;
                            }

                            return _continue;
                        }
                    }
                });
            }

            function moveFontUp($fontEL) {
                $fontEL.show();
                $fontEL.prependTo($fontEL.parent());
            }


            function scrollToTop($wrapper) {
                $wrapper.animate({scrollTop: 0}, 0);
            }


            var fontLoading = function (ff) {
                    $('.bssm-preview[data-font-family="' + ff + '"]', $context).css('font-size', '0')
                },
                fontLoaded  = function (ff) {
                    $('.bssm-preview[data-font-family="' + ff + '"]', $context)
                        .delay(40).queue(function (n) {
                        $(this).css('font-size', '22px').addClass('bs-animate bs-fadeInUp');
                        n();
                    })
                };

            function fetchFonts(elements) {

                var loadFonts = [],
                    modal     = this;
                elements.forEach(function (el) {
                    var $font = modal.$(el);

                    var id   = $font.data('item-id'),
                        type = $font.data('item-type');

                    loadFonts[type] = loadFonts[type] || [];
                    loadFonts[type].push(id);

                    $font.find('.bssm-preview')
                        .data('font-family', id)
                        .attr('data-font-family', id)
                        .css('font-family', id);


                });

                for (var fontType in loadFonts) {
                    self.loadFonts(fontType, loadFonts[fontType], fontLoading, fontLoaded);
                }
            }

            var modalObject;
            $(document).on("click", ".bf-font-selector", function () {
                $fontSelectorEl = $(this);

                var loc = $.extend({
                    header: better_fonts_manager_loc.labels.choose_font + ' {{btn}}'
                }, better_fonts_manager_loc.labels);

                modalObject = modalObject || $.bs_selector_modal({
                        id: 'font-selector-modal',
                        modalClass: 'bssm-style-1',

                        itemInnerHtml: '<div class="bssm-preview">\n    {{preview_text}}\n</div>\n<div class="bssm-info">\n    <span class="bssm-name">{{name}}</span>\n    <span class="bssm-type">{{type_label}}</span>\n    <span class="bssm-styles">{{styles}}</span>\n</div>',
                        content: loc,

                        items: fonts,
                        itemsGroupSize: 9,

                        categories: better_fonts_manager_loc.labels.filter_cats,
                        types: better_fonts_manager_loc.labels.filter_types,

                        inactivateTypes: ['google_ea_font'],

                        events: {
                            scrollIntoView: fetchFonts,

                            after_append_html: function () {
                                $context = this.bsModal.$modal;
                            },

                            item_select: function (selected, itemId) {

                                var modal = this;
                                setTimeout(function () {
                                    modal.bsModal.close_modal();
                                }, autoCloseDelay);

                            },
                            modal_closed: function () {
                                var selected = this.getSelectedItem();
                                if (!selected) {
                                    return;
                                }

                                var selectedElement = selected[0],
                                    selectedId      = selected[1];

                                moveFontUp(selectedElement);


                                $fontSelectorEl.parent()
                                    .find('.bf-font-family')
                                    .val(selectedId);

                                $fontSelectorEl.text(selectedId);
                                self.refresh_typography($fontSelectorEl.closest('.bf-section-container'), 'family');
                            },

                            modal_show: function () {

                                var selected = $fontSelectorEl.parent()
                                    .find('.bf-font-family')
                                    .val();

                                var $selectedFont = this.selectItem(selected);

                                if ($selectedFont.length) {

                                    this.markAsSelected($selectedFont);
                                    moveFontUp($selectedFont);
                                    scrollToTop($selectedFont.parent());

                                    fetchFonts.call(this, [$selectedFont[0]]);
                                }

                            },
                        },
                    }, {
                        buttons: {
                            upload_font: {
                                label: better_fonts_manager_loc.labels.upload_font,
                                type: 'primary',
                                icon: 'upload',
                                btn_classes: 'bssm-button',
                                clicked: function () {
                                    openCustomFontModal(this, modalObject);
                                }
                            }
                        },
                        events: {

                            prepare_html: function (el, options, templateName) {

                                this.options.content.header =
                                    this.options.content.header.replace('{{btn}}', this.generate_buttons());
                            }
                        }
                    });

                modalObject.show();
            });
        },

        /**
         * Setup Fonts Manager Panel
         ******************************************/
        setup_panel_fonts_manager: function (context) {

            // change all default fields font id
            $('.bf-section[data-id=custom_fonts] .bf-repeater-item', context).each(function (i) {

                var text = $(this).find('.better-custom-fonts-id input').val();

                text = text.replace('%i%', i + 1);

                $(this).find('.better-custom-fonts-id input').val(text);
            });

            // change new fonts id
            $('.bf-section[data-id=custom_fonts]', context).on('repeater_item_added', function () {

                var count = $(this).find('.bf-repeater-items-container').find('>*').size();

                var text = $(this).find('.bf-repeater-item:last-child .better-custom-fonts-id input').val();

                text = text.replace('%i%', count);

                $(this).find('.bf-repeater-item:last-child .better-custom-fonts-id input').val(text);
            });

        },


        /**
         * Setup Typography Field
         ******************************************/
        setup_field_typography: function (context) {

            // Init preview in page load
            $('.bf-section-typography-option', context).each(function () {
                Better_Fonts_Manager.refresh_typography($(this).closest(".bf-section-container"), 'first-time');
            });

            if (Object.keys(Better_Fonts_Manager.load_google_fonts).length > 0) {
                WebFont.load({
                    google: {
                        families: Object.keys(Better_Fonts_Manager.load_google_fonts).map(function (key) {
                            return Better_Fonts_Manager.load_google_fonts[key]
                        })
                    }
                });
            }

            if (Object.keys(Better_Fonts_Manager.load_custom_fonts).length > 0) {
                $.each(Better_Fonts_Manager.load_custom_fonts, function (key, value) {
                    WebFont.load({
                        custom: value
                    });
                });
            }

            if (Object.keys(Better_Fonts_Manager.load_google_ea_fonts).length > 0) {
                $.each(Better_Fonts_Manager.load_google_ea_fonts, function (key, value) {
                    WebFont.load({
                        custom: value
                    });
                });
            }

            if (Object.keys(Better_Fonts_Manager.load_theme_fonts).length > 0) {
                $.each(Better_Fonts_Manager.load_theme_fonts, function (key, value) {
                    WebFont.load({
                        custom: value
                    });
                });
            }

            // Prepare active field in page load
            $('.bf-section-typography-option .typo-enable-container input[type=hidden]', context).each(function () {

                $(this).closest(".bf-section-typography-option").addClass('have-enable-field');

                if ($(this).attr("checked")) {
                    $(this).closest(".bf-section-typography-option").addClass('enable-field`');
                } else {
                    $(this).closest(".bf-section-typography-option").addClass('disable-field');
                }

            });

            // Active field on change
            $(".bf-section-typography-option .typo-enable-container .cb-enable", context).click(function () {

                $(this).closest(".bf-section-typography-option").addClass('enable-field').removeClass('disable-field');

            });

            $(".bf-section-typography-option .typo-enable-container .cb-disable", context).click(function () {
                $(this).closest(".bf-section-typography-option").addClass('disable-field').removeClass('enable-field');
            });

            // When Font Variant Changes
            $('.bf-section-container .font-variants', context).on('change', function (evt, params) {
                Better_Fonts_Manager.refresh_typography($(this).closest(".bf-section-container"), 'variant');
            });

            // When Font Size Changes
            $('.bf-section-container .font-size', context).on('change', function (evt, params) {
                Better_Fonts_Manager.refresh_typography($(this).closest(".bf-section-container"), 'size');
            });

            // When Line Height Changes
            $('.bf-section-container .line-height', context).on('change', function (evt, params) {
                Better_Fonts_Manager.refresh_typography($(this).closest(".bf-section-container"), 'height');
            });

            // When Letter Spacing Changes
            $('.bf-section-container .letter-spacing', context).on('change', function (evt, params) {
                Better_Fonts_Manager.refresh_typography($(this).closest(".bf-section-container"), 'letter-spacing');
            });

            // When Align Changes
            $(' .bf-section-container .text-align-container select', context).on('change', function (evt, params) {
                Better_Fonts_Manager.refresh_typography($(this).closest(".bf-section-container"), 'align');
            });

            // When Color Changes
            $(' .bf-section-container .text-color-container .bf-color-picker', context).on('change', function (evt, params) {
                Better_Fonts_Manager.refresh_typography($(this).closest(".bf-section-container"), 'color');
            });

            // When Transform Changes
            $(' .bf-section-container .text-transform', context).on('change', function (evt, params) {
                Better_Fonts_Manager.refresh_typography($(this).closest(".bf-section-container"), 'transform');
            });


            // Preview Tab
            $('.typography-preview .preview-tab .tab', context).on('click', function () {

                if ($(this).hasClass('current')) {
                    return false;
                } else {

                    $(this).closest('.preview-tab').find('.current').removeClass('current');
                    $(this).closest('.typography-preview').find('.preview-text.current').removeClass('current');

                    $(this).addClass('current');

                    $(this).closest('.typography-preview').find('.preview-text.' + $(this).data('tab')).addClass('current');
                }

            });

        },

        // Used for refreshing typography preview
        refresh_typography_field: function ($parent, type, _css, first_time) {

            switch (type) {
                case  'size':
                    _css.fontSize = $parent.find('.font-size').val() + 'px';
                    break;

                case 'height':
                    if ($parent.find('.line-height').val() != '')
                        _css.lineHeight = $parent.find('.line-height').val() + 'px';
                    else
                        delete _css.lineHeight;
                    break;

                case 'letter-spacing':
                    if ($parent.find('.letter-spacing').val() != '')
                        _css.letterSpacing = $parent.find('.letter-spacing').val();
                    else
                        delete _css.letterSpacing;
                    break;

                case 'align':
                    _css.textAlign = $parent.find('.text-align-container select option:selected').val();
                    break;

                case 'color':
                    _css.color = $parent.find('.text-color-container .bf-color-picker').val();
                    break;

                case 'transform':
                    _css.textTransform = $parent.find('.text-transform').val();
                    break;

                case 'family':
                    _css.fontFamily = "'" + this.getSelectedFontId($parent) + "', sans-serif";
                    break;

                case 'variant':
                    var variant = $parent.find('.font-variants option:selected').val();

                    if (typeof variant == 'undefined')
                        break;

                    if (variant.match(/([a-zA-Z].*)/i) != null) {
                        var style = variant.match(/([a-zA-Z].*)/i);
                        if (style[0] == 'regular')
                            _css.fontStyle = 'normal';
                        else
                            _css.fontStyle = style[0];
                    } else {
                        delete _css.fontStyle;
                    }

                    if (variant.match(/\d*(\s*)/i) != null) {
                        var size        = variant.match(/\d*(\s*)/i);
                        _css.fontWeight = size[0];
                    } else {
                        delete _css.fontWeight;
                    }

                    break;

                case 'load-font':


                    var selected_font_id = this.getSelectedFontId($parent),
                        selected_font    = Better_Fonts_Manager.get_font(selected_font_id),
                        selected_variant = $parent.find('.font-variants option:selected').val();

                    switch (selected_font.type) {

                        case 'google-font':

                            if (first_time == 'first-time') {
                                Better_Fonts_Manager.load_google_fonts[selected_font_id + ':' + selected_variant] = selected_font_id + ':' + selected_variant;
                            } else {
                                WebFont.load({
                                    google: {
                                        families: [selected_font_id + ':' + selected_variant]
                                    }
                                });
                            }
                            _css.fontFamily = "'" + selected_font_id + "', sans-serif";
                            break;

                        case 'google-ea-font':

                            _css.fontFamily = "'" + selected_font_id + "', sans-serif";

                            if (first_time == 'first-time') {
                                Better_Fonts_Manager.load_google_ea_fonts[selected_font_id] = {
                                    families: [selected_font_id],
                                    urls: [better_fonts_manager_loc.admin_fonts_css_url + '&' + 'google_ea_font_id=' + selected_font_id]
                                };
                            } else {
                                if (typeof Better_Fonts_Manager.load_google_ea_fonts[selected_font_id] == "undefined") {
                                    WebFont.load({
                                        custom: {
                                            families: [selected_font_id],
                                            urls: [better_fonts_manager_loc.admin_fonts_css_url + '&' + 'google_ea_font_id=' + selected_font_id]
                                        }
                                    });
                                    Better_Fonts_Manager.load_google_ea_fonts[selected_font_id] = {
                                        families: [selected_font_id],
                                        urls: [better_fonts_manager_loc.admin_fonts_css_url + '&' + 'google_ea_font_id=' + selected_font_id]
                                    };
                                }
                            }

                            break;

                        case 'custom-font':

                            _css.fontFamily = "'" + selected_font_id + "', sans-serif";

                            if (first_time == 'first-time') {
                                Better_Fonts_Manager.load_custom_fonts[selected_font_id] = {
                                    families: [selected_font_id],
                                    urls: [better_fonts_manager_loc.admin_fonts_css_url + '&' + 'custom_font_id=' + selected_font_id]
                                };
                            } else {
                                if (typeof Better_Fonts_Manager.load_custom_fonts[selected_font_id] == "undefined") {
                                    WebFont.load({
                                        custom: {
                                            families: [selected_font_id],
                                            urls: [better_fonts_manager_loc.admin_fonts_css_url + '&' + 'custom_font_id=' + selected_font_id]
                                        }
                                    });
                                    Better_Fonts_Manager.load_custom_fonts[selected_font_id] = {
                                        families: [selected_font_id],
                                        urls: [better_fonts_manager_loc.admin_fonts_css_url + '&' + 'custom_font_id=' + selected_font_id]
                                    };
                                }
                            }

                            break;

                        case 'theme-font':

                            _css.fontFamily = "'" + selected_font_id + "', sans-serif";

                            if (first_time == 'first-time') {
                                Better_Fonts_Manager.load_theme_fonts[selected_font_id] = {
                                    families: [selected_font_id],
                                    urls: [better_fonts_manager_loc.admin_fonts_css_url + '&' + 'theme_font_id=' + selected_font_id]
                                };
                            } else {
                                if (typeof Better_Fonts_Manager.load_theme_fonts[selected_font_id] == "undefined") {
                                    WebFont.load({
                                        custom: {
                                            families: [selected_font_id],
                                            urls: [better_fonts_manager_loc.admin_fonts_css_url + '&' + 'theme_font_id=' + selected_font_id]
                                        }
                                    });
                                    Better_Fonts_Manager.load_theme_fonts[selected_font_id] = {
                                        families: [selected_font_id],
                                        urls: [better_fonts_manager_loc.admin_fonts_css_url + '&' + 'theme_font_id=' + selected_font_id]
                                    };
                                }
                            }


                            break;

                        case 'font-stack':

                            _css.fontFamily = "'" + selected_font_id + "', sans-serif";

                            break;

                    }

            }
            return _css;

        },

        getSelectedFontId: function ($context) {
            return $('.bf-font-family', $context).val()
        },

        // Used for refreshing all styles of typography field
        refresh_typography: function ($parent, type) {
            type = typeof type !== 'undefined' ? type : 'all';


            var $preview = $parent.find('.typography-preview .preview-text');

            var _css = $preview.css([
                "fontSize", "lineHeight", "textAlign", "fontFamily", "fontStyle", "fontWeight", "textTransform", "color", "letterSpacing"
            ]);

            switch (type) {

                case 'size':
                    _css = Better_Fonts_Manager.refresh_typography_field($parent, 'size', _css);
                    break;

                case 'height':
                    _css = Better_Fonts_Manager.refresh_typography_field($parent, 'height', _css);
                    break;

                case 'letter-spacing':
                    _css = Better_Fonts_Manager.refresh_typography_field($parent, 'letter-spacing', _css);
                    break;

                case 'transform':
                    _css = Better_Fonts_Manager.refresh_typography_field($parent, 'transform', _css);
                    break;

                case 'align':
                    _css = Better_Fonts_Manager.refresh_typography_field($parent, 'align', _css);
                    break;

                case 'color':
                    _css = Better_Fonts_Manager.refresh_typography_field($parent, 'color', _css);
                    break;

                case 'variant':

                    _css = Better_Fonts_Manager.refresh_typography_field($parent, 'variant', _css);

                    var selected_font_id = this.getSelectedFontId($parent),
                        selected_font    = Better_Fonts_Manager.get_font(selected_font_id),
                        selected_variant = $parent.find('.font-variants option:selected').val();

                    if (selected_variant == 'regular')
                        selected_variant = '';
                    else
                        selected_variant = ':' + selected_variant;

                    switch (selected_font.type) {

                        case 'google-font':

                            // load new font
                            WebFont.load({
                                google: {
                                    families: [selected_font_id + selected_variant]
                                }
                            });

                            _css.fontFamily = "'" + selected_font_id + "', sans-serif";

                            break;

                        case 'theme-font':
                        case 'custom-font':
                        case 'font-stack':

                            _css.fontFamily = "'" + selected_font_id + "', sans-serif";

                            break;

                    }

                    break;

                case 'family':

                    var selected_font_id       = this.getSelectedFontId($parent),
                        selected_font          = Better_Fonts_Manager.get_font(selected_font_id),
                        selected_font_variants = Better_Fonts_Manager.get_font_variants(selected_font),
                        selected_font_subsets  = Better_Fonts_Manager.get_font_subsets(selected_font);

                    // load and adds variants
                    $parent.find('.font-variants option').remove();
                    var selected  = false,
                        _selected = '';

                    // generate variant options
                    $.each(selected_font_variants, function (index, element) {

                        if (element['id'] == '400' || element['id'] == 'regular') {
                            selected = element['id'];
                        }

                        $parent.find('.font-variants').append('<option value="' + element['id'] + '" ' + ( element['id'] == selected ? ' selected' : '' ) + '>' + element['name'] + '</option>');

                    });

                    // select first if 400 is not available in font variants
                    if (selected == false)
                        $parent.find('.font-variants option:first-child').attr('selected', 'selected');

                    // load and adds subsets
                    $parent.find('.font-subsets option').remove();

                    // generate subset options
                    $.each(selected_font_subsets, function (index, element) {

                        // select latin as default subset
                        if (element['id'] == 'latin' || element['id'] == 'unknown') {
                            $parent.find('.font-subsets').append('<option value="' + element['id'] + '" selected>' + element['name'] + '</option>');
                        }
                        else {
                            $parent.find('.font-subsets').append('<option value="' + element['id'] + '">' + element['name'] + '</option>');
                        }

                    });

                    _css = Better_Fonts_Manager.refresh_typography_field($parent, 'load-font', _css);

                    _css = Better_Fonts_Manager.refresh_typography_field($parent, 'variant', _css);

                    _css = Better_Fonts_Manager.refresh_typography_field($parent, 'family', _css);

                    break;


                case 'first-time':

                    $parent.find('.load-preview-texts').remove();

                    _css = Better_Fonts_Manager.refresh_typography_field($parent, 'load-font', _css, 'first-time');

                    _css = Better_Fonts_Manager.refresh_typography_field($parent, 'family', _css);

                    _css = Better_Fonts_Manager.refresh_typography_field($parent, 'size', _css);

                    _css = Better_Fonts_Manager.refresh_typography_field($parent, 'height', _css);

                    _css = Better_Fonts_Manager.refresh_typography_field($parent, 'letter-spacing', _css);

                    _css = Better_Fonts_Manager.refresh_typography_field($parent, 'transform', _css);

                    _css = Better_Fonts_Manager.refresh_typography_field($parent, 'align', _css);

                    _css = Better_Fonts_Manager.refresh_typography_field($parent, 'variant', _css);

                    $parent.find('.typography-preview').css('display', 'block');

            }

            delete _css.lineHeight;

            $preview.attr('style', '');
            $preview.css(_css);
        },


        // Used for getting font information's
        get_font: function (font_id) {

            // Custom Fonts
            if (typeof better_fonts_manager_loc.fonts.theme_fonts[font_id] != "undefined") {

                return better_fonts_manager_loc.fonts.theme_fonts[font_id];

            }// Custom Fonts
            else if (typeof better_fonts_manager_loc.fonts.font_stacks[font_id] != "undefined") {

                return better_fonts_manager_loc.fonts.font_stacks[font_id];

            }
            // Font Stacks
            else if (typeof better_fonts_manager_loc.fonts.custom_fonts[font_id] != "undefined") {

                return better_fonts_manager_loc.fonts.custom_fonts[font_id];

            }
            // Google Fonts
            else if (typeof better_fonts_manager_loc.fonts.google_fonts[font_id] != "undefined") {

                return better_fonts_manager_loc.fonts.google_fonts[font_id];

            }
            // Google EA Fonts
            else if (typeof better_fonts_manager_loc.fonts.google_ea_fonts[font_id] != "undefined") {

                return better_fonts_manager_loc.fonts.google_ea_fonts[font_id];

            }

            return false;
        },


        // full list of default variants array
        get_default_variants: function () {

            return [
                {
                    "id": "100",
                    "name": better_fonts_manager_loc.texts.variant_100
                },

                {
                    "id": "300",
                    "name": better_fonts_manager_loc.texts.variant_300
                },
                {
                    "id": "400",
                    "name": better_fonts_manager_loc.texts.variant_400
                },
                {
                    "id": "500",
                    "name": better_fonts_manager_loc.texts.variant_500
                },
                {
                    "id": "700",
                    "name": better_fonts_manager_loc.texts.variant_700
                },
                {
                    "id": "900",
                    "name": better_fonts_manager_loc.texts.variant_900
                },
                {
                    "id": "100italic",
                    "name": better_fonts_manager_loc.texts.variant_100italic
                },
                {
                    "id": "300italic",
                    "name": better_fonts_manager_loc.texts.variant_300italic
                },
                {
                    "id": "400italic",
                    "name": better_fonts_manager_loc.texts.variant_400italic
                },
                {
                    "id": "500italic",
                    "name": better_fonts_manager_loc.texts.variant_500italic
                },

                {
                    "id": "700italic",
                    "name": better_fonts_manager_loc.texts.variant_700italic
                },
                {
                    "id": "900italic",
                    "name": better_fonts_manager_loc.texts.variant_900italic
                }
            ];

        },


        // Used for font variants
        get_font_variants: function (font) {

            // load font if font name is input
            if (typeof font == 'string') {

                font = Better_Fonts_Manager.get_font(font);

                if (font == false) {

                    return Better_Fonts_Manager.get_default_variants();
                }

            }

            switch (font.type) {

                case 'google-ea-font':
                case 'google-font':

                    return font.variants;
                    break;

                case 'theme-font':
                case 'font-stack':
                case 'custom-font':

                    return Better_Fonts_Manager.get_default_variants();

                    break;

            }

            return false;

        },


        // Used for font variants
        get_font_subsets: function (font) {

            // load font if font name is input
            if (typeof font == 'string') {

                font = Better_Fonts_Manager.get_font(font);

                if (font == false) {

                    return [
                        {
                            "id": "unknown",
                            "name": better_fonts_manager_loc.texts.subset_unknown
                        }
                    ];
                }

            }

            switch (font.type) {

                case 'google-font':

                    return font.subsets;
                    break;

                case 'google-ea-font':
                case 'theme-font':
                case 'font-stack':
                case 'custom-font':

                    return [
                        {
                            "id": "unknown",
                            "name": better_fonts_manager_loc.texts.subset_unknown
                        }
                    ];

                    break;

            }

            return false;

        }

    };

})(jQuery);

// load when ready
jQuery(function ($) {
    Better_Fonts_Manager.init();
});