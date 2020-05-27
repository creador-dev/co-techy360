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
 *  Our portfolio is here: https://betterstudio.com/
 *
 *  \--> BetterStudio, 2017 <--/
 */



jQuery(function ($) {
    "use strict";

    var $context = $("#wpbody-content"),
        $table = $("#the-list", $context);

    var $items = $table.children('tr');

    function updateDisplayingNum(num) {

        $(".displaying-num", $context).html(
            bs_plugin_install_loc[num > 1 ? 'items_count' : 'item_count'].replace('%s', num)
        );
    }

    function updateResults($foundItems, searchValue) {

        $(".no-items", $table).remove();

        var msg;
        //
        // Update Results
        //
        if ($foundItems.length === 0) {

            msg = bs_plugin_install_loc.search_failed.replace('%s', searchValue);

            $items.hide();
            $table.append(
                '<tr class="no-items"><td class="colspanchange" colspan="3">' + msg + '</td></tr>'
            );

        } else {

            $foundItems.show();
            $items.not($foundItems).hide();
        }

        // Update displaying number
        updateDisplayingNum($foundItems.length);
    }

    function showAll() {

        $(".no-items", $table).remove();
        var total = $items.show().length;

        updateDisplayingNum(total);
    }

    $("#plugin-search-input", $context).on('keyup', function () {

        if (document.getElementById('current-plugin-status').value !== 'all') {

            return true;
        }

        var value = this.value.trim().toLowerCase();

        if (value === '') {

            showAll();

            return;
        }

        var $foundItems = $items.filter(function () {

            if (this.classList.contains('plugin-update-tr')) {

                if (!this.previousElementSibling) {
                    return false;
                }

                return $('.plugin-title strong', this.previousElementSibling).text().toLowerCase().indexOf(value) > -1;
            }

            return $('.plugin-title strong', this).text().toLowerCase().indexOf(value) > -1;
        });

        updateResults($foundItems, value);
    });

    $(".subsubsub a", $context).on('click', function () {

        if (document.getElementById('current-plugin-status').value !== 'all') {

            return true;
        }

        var $this = $(this),
            state = $this.closest('li').attr('class');

        //
        // Add activated class
        //

        $(".subsubsub a", $context).removeClass('current');

        $this.addClass('current');

        if ('all' === state) {

            showAll();

            return false;
        }

        var $foundItems = $items.filter(function () {

            var $item = $(this);

            if ($item.hasClass('plugin-update-tr')) {

                if (!this.previousElementSibling) {
                    return false;
                }

                return $item.prev().hasClass(state);
            }

            return $item.hasClass(state);
        });

        updateResults($foundItems, $this.text().replace(/\s*\(.*?\)\s*/, ''));

        return false;
    });

    var _confirmDelete = function (confirm, names) {
        var loc = $.extend(bs_plugin_install_loc.delete_confirm, {});


        var list = '';
        if (names) {
            list = '<ol>';
            names.forEach(function (name) {
                list += "<li>" + name + "</li>";
                list += "\n\t";
            });
        }
        list += '</ol>';

        loc.body = loc.body.replace("%list%", list);

        $.bs_modal({
            modalId: 'delete-confirm',
            content: loc,

            buttons: {
                close_modal: {
                    label: loc.button_no,
                    type: 'primary',
                    action: 'close'
                },
                custom_event: {
                    label: loc.button_yes,
                    type: 'secondary',
                    clicked: confirm
                }
            },
            button_position: 'left',
            events: {},
            styles: {
                container: 'overflow:visible;max-width: 530px;'
            }
        });
    };
    $("#bulk-action-form").on('click', '[type="submit"]:not([name="clear-recent-list"])', function (event) {

        var bulkAction = $(event.target).siblings('select').val();

        if (bulkAction !== 'delete-selected') {
            return true;
        }

        var $form = $("#bulk-action-form");
        // $form.one('submit', function () { return false; });

        var names = [];

        $(".check-column :checkbox:checked", $form).each(function () {
            var $row = $(this).closest('tr');

            names.push($(".plugin-title strong", $row).html());

        }).promise().done(function () {

            _confirmDelete(function () {

                var self = this;
                self.change_skin({
                    skin: 'loading',
                    animations: {
                        body: 'bs-animate bs-fadeInLeft'
                    }
                });

                $("#verify-delete-input").val('1');
                $("#bulk-action-form").submit();

            }, names);
        });

        return false;
    });

    $(".row-actions .delete a").on('click', function (e) {

        e.preventDefault();

        var url = this.href;

        _confirmDelete(function () {

            var self = this;
            self.change_skin({
                skin: 'loading',
                animations: {
                    body: 'bs-animate bs-fadeInLeft'
                }
            });
            window.location = url + "&verify-delete=1";
        });

    });

});