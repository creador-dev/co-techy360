var Publisher_Theme_Admin = (function ($) {
    "use strict";

    return {

        init: function () {
            this.blocks_switch();
            this.mailchimp();
            this.custom_width_field();
            this.setup_override_listing_settings();
            this.white_label();

            this.setup_listing_settings_override_event()
        },

        mailchimp: function () {

            // widget
            $(document).on('change', '.widget-mailchimp-code-field textarea', function (e, target) {
                var match = $(this).val().match(/action="([^"]*?)"/i);

                if (match != undefined && match[1] !== undefined) {
                    $(this).closest('.widget-mailchimp-code-field').siblings('.widget-mailchimp-url-field').find('input').val(match[1]);
                }
            });

            // Visual Composer
            $(document).on('change', '.wpb_el_type_textarea_raw_html textarea[name="mailchimp-code"]', function () {
                var match = $(this).val().match(/action="([^"]*?)"/i);

                if (match != undefined && match[1] !== undefined) {
                    $(this).closest('.wpb_el_type_textarea_raw_html').siblings('div[data-vc-shortcode-param-name="mailchimp-url"]').find('textarea[name="mailchimp-url"]').val(match[1]);
                }
            });
        },

        blocks_switch: function () {

            $(document).on('click', '.blocks-field .blocks-switch span, .blocks-field .title', function () {

                var $this = $(this),
                    $parent = $this.closest('.blocks-field').find('.blocks-switch'),
                    $field = $parent.find('input'),
                    $section = $parent.closest('.bf-section-container'),
                    $relations = $section.find('.blocks-field[data-related-to="' + $this.closest('.blocks-field').data('id') + '"]');

                if ($parent.hasClass('checked')) {
                    $parent.removeClass('checked').addClass('unchecked');
                    $field.attr('value', 0).change();
                    $relations.addClass('disabled');
                } else {
                    $parent.removeClass('unchecked').addClass('checked');
                    $field.attr('value', 1).change();
                    $relations.removeClass('disabled');
                }

            }).on('click', '.blocks-field .blocks-checkbox-label', function () {

                var $this = $(this),
                    $field = $this.siblings('.blocks-checkbox');

                if ($field.hasClass('checked')) {
                    $field.removeClass('checked').addClass('unchecked');
                    $field.attr('value', 0).change();
                } else {
                    $field.removeClass('unchecked').addClass('checked');
                    $field.attr('value', 1).change();
                }

            });

        },

        custom_width_field: function () {
            var options = {
                columnMinWidth: 150,          // px
                wrapper2ColumnMinWidth: 600,  // px
                wrapper3ColumnMinWidth: 1000, // px
                wrapperMaxWidth: 1640,        // px
                transformPxRatio: 10,
                borderSpacing: 4
            };

            function uiContextFromUiObject(ui) {
                return ui.element.closest('.resizable-width-container');
            }

            function sanitizeWidth(width) {
                if (width % 2) {
                    width++;
                }

                return width;
            }

            function calcTotalWidthPercentage($cols) {
                var result = 0;
                $cols.each(function () {
                    result += $(this).data('width-prc');
                });

                return result;
            }

            function getColumns(ui) {

                var columnsToChange = [
                    ui.element,
                    ui.element.next('.resizable-width-column')
                ];

                var $context = uiContextFromUiObject(ui),
                    $columns = $(".resizable-width-column", $context),
                    $allCols = $columns;

                columnsToChange.forEach(function (el) {
                    $columns = $columns.not(el);
                });

                return [$columns, $allCols.not($columns)];
            }

            function updateColumnWidthPercentageLabel(e, ui) {
                var $context = uiContextFromUiObject(ui),
                    $cols = getColumns(ui),
                    allColsWidth = $('.resizable-width-section', $context).outerWidth(),
                    $columns = $cols[1],
                    percentage = 100 - calcTotalWidthPercentage($cols[0]);

                $columns.filter(':not(:last)').each(function () {
                    var $col = $(this),
                        colWidthPrc = Math.ceil($col.outerWidth() * 100 / allColsWidth);

                    $col.data('width-prc', colWidthPrc)
                        .find('.resizable-width-labels-percentage')
                        .text(colWidthPrc + '%');

                    $('input.col-' + ($col.data('index')) + '-width', $context).val(colWidthPrc);

                    percentage -= colWidthPrc;
                });

                percentage = Math.abs(percentage);
                var $lastCol = $columns.filter(':last');

                $lastCol.data('width-prc', percentage)
                    .find('.resizable-width-labels-percentage')
                    .text(percentage + '%');

                $('input.col-' + ($lastCol.data('index')) + '-width', $context).val(percentage);
            }

            function updateColumnWidthPxLabel(e, ui) {

                var $context = uiContextFromUiObject(ui),
                    $cols = getColumns(ui),
                    $columns = $cols[1],
                    total = $('input.total-width', $context).val(),
                    totalRemain = total - Math.ceil(calcTotalWidthPercentage($cols[0]) / 100 * total);

                if (!$columns.length) {
                    $columns = $('.resizable-width-column', $context);
                    totalRemain = total;
                }

                $columns.filter(':not(:last)').each(function (idx) {
                    var $col = $(this),
                        percentage = $col.data('width-prc'),
                        px = Math.ceil(percentage / 100 * total);


                    $col.data('width-px', px)
                        .find('.resizable-width-labels-px').text(px + 'px');

                    if (px <= options.columnMinWidth) {
                        $col.resizable('option', 'minWidth', $col.outerWidth());
                    }
                    totalRemain -= px;
                });

                $columns.filter(':last')
                    .data('width-px', totalRemain)
                    .find('.resizable-width-labels-px')
                    .text(totalRemain + 'px');
            }

            function fixNotResizingColumnsWidth(ui) {

                var columnsToChange = [
                    ui.element,
                    ui.element.next('.resizable-width-column')
                ];

                var $context = uiContextFromUiObject(ui),
                    $columns = $(".resizable-width-column", $context);

                columnsToChange.forEach(function (el) {
                    $columns = $columns.not(el);
                });

                $columns.each(function () { //Not Resizing Columns
                    var $col = $(this);

                    var w = $col.outerWidth();

                    $col.outerWidth(w).css({'min-width': w, 'max-width': w});
                });


                columnsToChange.forEach(function (el) {
                    el.attr('style', '');
                });
            }

            function getColumnsCount($cols) {
                return $cols.data('columns') || 2;
            }

            function limitMinColumnWidth(ui) {

                var $context = uiContextFromUiObject(ui),
                    $columnsWrapper = $(".resizable-width-columns-wrapper", $context),
                    total = $('input.total-width', $context).val(),
                    calcBorderSpacing = Math.max(2, (getColumnsCount($columnsWrapper) - 1)) * options.borderSpacing,
                    wrapperWidth = $columnsWrapper.width();

                var minWidth = Math.floor(options.columnMinWidth * wrapperWidth / total);
                ui.originalElement.resizable('option', 'minWidth', minWidth);


                var bothColumnWidth = ui.originalElement.next('.resizable-width-column').width() + ui.originalElement.width() + calcBorderSpacing,
                    maxWidth = bothColumnWidth - minWidth;
                ui.originalElement.resizable('option', 'maxWidth', maxWidth);
            }


            /**
             * Fix Initial Columns Width
             */
            (function () {
                $('.resizable-width-column').each(function () {
                    var $col = $(this);

                    var widthPrc = $col.data('width-prc');

                    if (widthPrc) {
                        $col.outerWidth(widthPrc + '%');
                    }
                });
            })();

            /**
             * Handle column width resizable
             */
            $(".resizable-width-columns").each(function () {
                $(".resizable-width-column:not(:last)", this).resizable({
                    handles: 'e',
                    minHeight: 250,
                    maxHeight: 250,

                    stop: function (event, ui) { // Convert px width to percentage
                        var totalWidth = 0,
                            widthStatus = [];

                        $(".resizable-width-column", ui.element.parent()).each(function () {
                            var $this = $(this),
                                cellWidth = $this.outerWidth();

                            totalWidth += cellWidth;
                            widthStatus.push([$this, cellWidth]);
                        }).promise().done(function () {
                            totalWidth /= 100;

                            for (var i = 0; i < widthStatus.length; i++) {
                                var $el = widthStatus[i][0];

                                $el.width((widthStatus[i][1] / totalWidth) + '%');
                            }
                        });

                    },
                    resize: function (e, ui) {
                        updateColumnWidthPercentageLabel(e, ui);
                        updateColumnWidthPxLabel(e, ui);
                    },
                    start: function (e, ui) {

                        limitMinColumnWidth(ui);
                        fixNotResizingColumnsWidth(ui);
                    }
                });
            });


            /**
             * Handle container width resizable
             */
            $(".resizable-width-container").each(function () {
                var $context = $(this),
                    $cols = $context.find('.resizable-width-columns-wrapper'),
                    columnsCount = getColumnsCount($cols),
                    minWidth = ( ( columnsCount == 2 ? 44 : 70 ) * columnsCount),
                    wrapperMinWidth = columnsCount == 2 ? options.wrapper2ColumnMinWidth : options.wrapper3ColumnMinWidth;

                function convertRealPX2ColumnPX(number) {
                    return (
                        (number - wrapperMinWidth) / (options.transformPxRatio / 2)
                    ) + minWidth;
                }

                var maxWidth = convertRealPX2ColumnPX(options.wrapperMaxWidth);

                /**
                 * Fix initial wrapper width
                 */
                var _initialWidth = convertRealPX2ColumnPX($cols.data('total'));
                $(".resizable-width-total-wrapper", $context).width(_initialWidth);
                $cols.width(_initialWidth);

                /**
                 * init container width resizable
                 */
                $cols.resizable({
                    minHeight: 280,
                    maxHeight: 280,
                    handles: 'e,w',
                    minWidth: minWidth,
                    maxWidth: maxWidth,
                    resize: function (e, ui) {

                        if (ui.size.width % 2) {
                            return;
                        }

                        var $context = uiContextFromUiObject(ui),
                            calcSize = wrapperMinWidth + (((ui.size.width - minWidth) / 2) * options.transformPxRatio);

                        calcSize = sanitizeWidth(calcSize);

                        $(".resizable-width-total-wrapper", $context).outerWidth(ui.size.width).css('left', ui.position.left);
                        $(".resizable-width-total-number", $context).text(Math.ceil(calcSize) + 'px');
                        $('input.total-width', $context).val(calcSize);

                        updateColumnWidthPxLabel(e, ui);
                    },
                    start: function (e, ui) {
                        ui.element.find('.resizable-width-column')
                            .css({'min-width': '', 'max-width': ''});

                        // transform width unit to percentage
                        var $context = uiContextFromUiObject(ui);
                        $('.resizable-width-column', $context).each(function () {
                            var $col = $(this),
                                widthPrc = $col.find('.resizable-width-labels-percentage').text();

                            $col.outerWidth(widthPrc);
                        });
                    }
                }).data('resize-options', {maxWidth: maxWidth});
            });
        },

        setup_override_listing_settings: function () {

            var pageBuildersWrapper = [
                '.wpb_edit_form_elements',
                '.kc-pop-tab',

            ], selectors;


            selectors = [];
            pageBuildersWrapper.forEach(function (selector) {

                selectors.push(selector+' .advanced-block-settings :input');
            });

            $(document).on('change', selectors.join(','), function () {

                var value = '',
                    $this = $(this),
                    $context = $this.closest(pageBuildersWrapper.join(',')),
                    isActive = $("input[name='override-listing-settings']", $context).val(),
                    $hidden = $("input[name='listing-settings']", $context);

                if (isActive !== '0') {
                    value = $this.closest('.advanced-block-settings').bf_serialize();
                }

                if ($hidden.length === 0) {
                    $('<input/>', {
                        'name': 'listing-settings',
                        'class': 'wpb_vc_param_value kc-param',
                        'value': value,
                        'type': 'hidden'
                    }).appendTo($context);
                } else {

                    $hidden.val(value)
                }
            });


            selectors = [];

            pageBuildersWrapper.forEach(function (wrapper) {
                selectors.push(wrapper + ' input[name="override-listing-settings"]');
            });

            $(document).on('change', selectors.join(','), function () {

                if (this.value !== '0') {
                    return;
                }

                var $context = $(this).closest(pageBuildersWrapper.join(','));

                $("input[name='listing-settings']", $context).remove();
            });
        },

        setup_listing_settings_override_event: function () {

            $(document).ajaxSuccess(function () {

                var $context = $('.wpb_edit_form_elements');

                $('.blocks-field :input:first', $context).trigger('change');
            });

            $(document).on('bf-kc-tab-loaded',function (e,$tab) {

                $('.blocks-field :input:first', $tab).trigger('change');
            });

        },

        white_label: function () {

            if ($('#bf-panel.panel-publisher-white-label .bf-controls input[name=publisher]').length <= 0) {
                return;
            }

            var _menu_text_def = 'Publisher',
                $side_menu = $('li#toplevel_page_bs-product-pages-welcome > a .wp-menu-name'),
                side_badge = $side_menu.find('.plugin-count'),
                $side_menu_theme_panel = $('li#toplevel_page_bs-product-pages-welcome li a[href="admin.php?page=better-studio/' + 'publisher"]'),
                $top_menu = $('li#wp-admin-bar-bs-product-pages-welcome-parent > a'),
                top_badge = $top_menu.find('.plugin-count'),
                top_icon = $top_menu.find('.bf-admin-bar-icon-bs-product-pages-welcome'),
                $top_menu_them_panel = $('li#wp-admin-bar-bs-product-pages-welcome-parent li[id="wp-admin-bar-better-studio/' + 'publisher"]' + ' a');

            if (side_badge.length > 0) {
                side_badge = side_badge[0].outerHTML;
            } else {
                side_badge = '';
            }

            if (top_badge.length > 0) {
                top_badge = top_badge[0].outerHTML;
            } else {
                top_badge = '';
            }

            if (top_icon.length > 0) {
                top_icon = top_icon[0].outerHTML;
            } else {
                top_icon = '';
            }

            var side_icon_id = '\\b024',
                side_icon_font = 'bs-icons',
                font_families = {};

            font_families['bs-icons'] = 'bs-icons';
            font_families['fontawesome'] = 'FontAwesome';


            if ($side_menu.length > 0)
                $('#bf-panel.panel-publisher-white-label .bf-controls input[name=publisher]').on('keyup', function () {
                    if ($(this).val() === '') {

                        update_theme_panel_link('');

                        if (top_badge !== '') {
                            $side_menu.html(_menu_text_def + ' <span class="bs-admin-menu-badge">' + side_badge + '</span>');
                        } else {
                            $side_menu.html(_menu_text_def);
                        }
                    } else {

                        update_theme_panel_link('theme');

                        if (top_badge !== '') {
                            $side_menu.html($(this).val() + ' <span class="bs-admin-menu-badge">' + side_badge + '</span>');
                        } else {
                            $side_menu.html($(this).val());
                        }
                    }
                });

            if ($top_menu.length > 0)
                $('#bf-panel.panel-publisher-white-label .bf-controls input[name=publisher]').on('keyup', function () {

                    if ($(this).val() === '') {

                        if (top_badge !== '') {
                            $top_menu.html(top_icon + _menu_text_def + ' <span class="bs-admin-menu-badge">' + top_badge + '</span>');
                        } else {
                            $top_menu.html(top_icon + _menu_text_def);
                        }
                    } else {

                        if (top_badge !== '') {
                            $top_menu.html(top_icon + $(this).val() + ' <span class="bs-admin-menu-badge">' + top_badge + '</span>');
                        } else {
                            $top_menu.html(top_icon + $(this).val());
                        }
                    }
                });


            $('#bf-panel.panel-publisher-white-label .bf-section[data-id=theme_icon] .bf-controls input.icon-input').on('change', function () {

                if ($(this).siblings('input.icon-input-font-code').val() == '') {
                    $("<style>li#wp-admin-bar-bs-product-pages-welcome-parent .bf-admin-bar-icon-bs-product-pages-welcome:before,#adminmenu li#toplevel_page_bs-product-pages-welcome .wp-menu-image.wp-menu-image.wp-menu-image.wp-menu-image:before{ content: '" + side_icon_id + "' !important; font-family: '" + font_families[side_icon_font] + "'; }</style>").appendTo('head');
                } else {
                    $("<style>li#wp-admin-bar-bs-product-pages-welcome-parent .bf-admin-bar-icon-bs-product-pages-welcome:before,#adminmenu li#toplevel_page_bs-product-pages-welcome .wp-menu-image.wp-menu-image.wp-menu-image.wp-menu-image:before{ content: '" + $(this).siblings('input.icon-input-font-code').val() + "' !important; font-family: '" + font_families[$(this).siblings('input.icon-input-type').val()] + "'; }</style>").appendTo('head');
                }
            });

            $('#bf-panel.panel-publisher-white-label .bf-controls input[name=white_label]').on('change', function () {

                var slug = $('#bf-panel.panel-publisher-white-label .bf-controls input[name=white_label]').val() == false ? '' : 'theme';

                if (slug == 'theme' && $('#bf-panel.panel-publisher-white-label .bf-controls input[name=publisher]').val() == '') {
                    slug = ''
                }

                update_theme_panel_link(slug);
            });

            // Change panel options link
            function update_theme_panel_link(new_slug) {

                if ($side_menu_theme_panel.length > 0) {
                    var pieces = $side_menu_theme_panel.attr('href').split(/[\s/]+/);

                    if (new_slug == '') {
                        pieces[1] = 'publisher';
                    } else {
                        pieces[1] = new_slug;
                    }

                    $side_menu_theme_panel.attr('href', pieces.join('/'));
                }

                if ($top_menu_them_panel.length > 0) {
                    var pieces = $top_menu_them_panel.attr('href').split(/[\s/]+/);

                    if (new_slug == '') {
                        pieces[pieces.length - 1] = 'publisher';
                    } else {
                        pieces[pieces.length - 1] = new_slug;
                    }

                    $top_menu_them_panel.attr('href', pieces.join('/'));
                }
            }

            // https://gist.github.com/mathewbyrne/1280286
            function slugify(text) {
                return text.toString().toLowerCase()
                    .replace(/\s+/g, '-')           // Replace spaces with -
                    .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
                    .replace(/\-\-+/g, '-')         // Replace multiple - with single -
                    .replace(/^-+/, '')             // Trim - from start of text
                    .replace(/-+$/, '');            // Trim - from end of text
            }

        }


    };// /return
})(jQuery);

// Load when ready
jQuery(document).ready(function () {
    Publisher_Theme_Admin.init();
});
