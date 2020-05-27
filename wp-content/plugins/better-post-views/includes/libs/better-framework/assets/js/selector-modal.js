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
    "use strict";


    /**
     * Init modal
     *
     * @param {Object} options
     * @constructor
     */
    var BsSelectorModal = function (options, bsModal) {

        this.options = $.extend(true, {
            itemBeforeHtml: '<li class="bssm-item {{class}}" data-item-type="{{type}}" data-item-cat="{{cat}}" data-item-id="{{id}}">',
            itemInnerHtml: '',
            itemAfterHtml: '</li>',

            modalHtml: false,
            id: 'modal-' + Math.ceil(Math.random() * 1e3),

            bsModal: bsModal || {},
            content: {},

            items: {},
            itemsGroupSize: 6,

            fuse: {
                keys: ["name"],
                tokenize: true,
                matchAllTokens: true,
                threshold: 0.3
            },

            searchDelay: 300,
            overlayClickCloseModal: true,
            searchAutoFocus: true,
            selectedItemId: 0,
            modalClass: '',


            categories: {},
            types: {},

            inactivateTypes: [],
            inactivateCats: [],


            /**
             * @property {callback} events.show_item Fire when a item must show
             * @property {callback} events.hide_item Fire when a item must hide
             *
             * @property {callback} events.modal_content [Filter] Generate bsModal options.content object
             * @property {callback} events.scrollIntoView  Fire when item into scrolled into view
             * @property {callback} events.after_append_html
             * @property {callback} events.item_select
             * @property {callback} events.item_click
             */
            events: {
                show_item: function (el) {
                    el.style.display = 'inline-block';
                },

                hide_item: function (el) {
                    el.style.display = 'none';
                }
            }

        }, options);

        if (!this.options.modalHtml) {

            var categories_template = '';

            if (this._length(this.options.categories)) {
                categories_template = '<div class="bssm-categories">\n    <h4 class="title"><span>{{filter_cat_title}}</span></h4>\n\n    <ul class="bssm-filter-items bf-radio-group">\n\n        {{#count_all}}\n        <li>\n            <div class="bf-radio-field" data-current-state="active" data-name="all"><span style="display: inline-block;"><i class="fa fa-circle" aria-hidden="true"></i></span></div>\n            <span class="name bf-radio-toggle" data-id="{{key}}">{{all_l10n}}</span><span class="length">({{count_all}})</span>\n        </li>\n        {{/count_all}}\n        \n        {{#filter_cats}}\n        <li>\n            <div class="bf-radio-field" data-current-state="deactivate" data-name="{{key}}"><span><i class="fa fa-circle" aria-hidden="true"></i></span></div>\n            <span class="name bf-radio-toggle" data-id="{{key}}">{{value}}</span><span class="length">({{count}})</span>\n        </li>\n        {{/filter_cats}}\n\n    </ul>\n</div>\n';
            }

            var types_template = '';

            if (this._length(this.options.types)) {
                types_template = '\n<div class="bssm-types">\n    <h4 class="title"><span>{{filter_type_title}}</span></h4>\n\n    <ul class="bssm-filter-items bf-radio-group">\n\n        {{#count_all}}\n        <li>\n            <div class="bf-radio-field" data-current-state="active" data-name="all"><span style="display: inline-block;"><i class="fa fa-circle" aria-hidden="true"></i></span></div>\n            <span class="name bf-radio-toggle" data-id="{{key}}">{{all_l10n}}</span><span class="length">({{count_all}})</span>\n        </li>\n        {{/count_all}}\n\n        {{#filter_types}}\n        <li>\n            <div class="bf-radio-field" data-current-state="deactivate" data-name="{{key}}"><span><i class="fa fa-circle" aria-hidden="true"></i></span></div>\n            <span class="name bf-radio-toggle" data-id="{{key}}">{{value}}</span>{{#count}}<span class="length">({{count}})</span>{{/count}}\n        </li>\n        {{/filter_types}}\n    </ul>\n</div>\t';
            }

            this.options.modalHtml = '<div class="bs-modal-default bs-selector-modal ' + this.options.modalClass + '" {{#inline_style}} style="{{inline_style}}" {{/inline_style}}>\n{{#close_button}}\n<a href="#" class="bs-close-modal">\n    <i class="fa fa-times" aria-hidden="true"></i>\n</a>\n{{/close_button}}\n<div class="bs-modal-header-wrapper bs-modal-clearfix">\n    <h2 class="bs-modal-header">\n        {{#icon}}\n        <i class="fa {{icon}}"></i>\n        {{/icon}}\n\n        {{{header}}}\n    </h2>\n</div>\n\n<div class="bs-modal-body">\n    <!--{{{bs_body}}}-->\n\n    <input type="hidden" name="item" class="bssm-input">\n\n    <div class="bssm-content {{content_class}}">\n        <ul class="bssm-list">\n            {{#items}}\n                '
                + this.options.itemBeforeHtml + this.options.itemInnerHtml + this.options.itemAfterHtml +
                '        \n            {{/items}}\n        </ul>\n    </div>\n    <div class="bssm-sidebar">\n        <div class="bssm-search">\n            <input type="text" class="bssm-search-input" value="" placeholder="{{search}}" autofocus>\n            <i class="fa fa-search"></i>\n        </div>\n\n        <div class="bssm-filter">\n            \n            ' + categories_template + types_template +
                '              </div>\n\n     \n    </div>\n</div>';
        }
        this.bsModal     = false;
        this.$allItems   = false;
        this.$itemsCache = {};

        this._scrollIntoView = [];
        this._visibleItems   = [];
        this.selectedItem    = false;

        this.initialized = false;

        this.fuse = new Fuse(this.options.items, this.options.fuse);

        this.init();
    };

    BsSelectorModal.prototype = {

        /**
         * Initialize Modal
         */
        init: function () {
            var self = this;

            self.initialized = true;

            $.bs_modal_template(this.options.id, this.options.modalHtml);

            var bsModalOptions = {
                modalId: this.options.id,
                buttons: this.options.buttons,
                destroyHtml: false,
                modalClass: this.options.modalClass,
                show: false,
                styles: {
                    container: 'width: 1060px;max-width:100%'
                },
                template: this.options.id,

                content: self._getModalContent(),

                events: {
                    before_append_html: function () {

                    },
                    after_append_html: function () {
                        self.bsModal = this;

                        self.updateItemsList();
                        self._bindEvents();

                        self._clearSearchResults();
                        self._updateSidebarCheckboxStatus();

                        self.handleEvent('after_append_html', '');

                    },
                    /**
                     * Update Input Value
                     */
                    modal_closed: function () {

                        self._clearSearchResults();
                        self._updateSidebarCheckboxStatus('dont-refresh-items');
                        self._showHide(self.$allItems, true);

                        self.handleEvent('modal_closed', '');

                        self.initialized = false;
                    },


                    modal_loaded: function () {

                        if (self.options.searchAutoFocus) {

                            /**
                             * Auto focus on 'search' field
                             */
                            $('input.bssm-search-input', this.$modal).focus();
                        }

                        self.handleEvent('modal_loaded', '');
                    },

                    modal_show: function () {
                        self.handleEvent('modal_show', '');

                        if (self.initialized) {
                            self.scrollIntoView(0, self.options.itemsGroupSize);
                        }
                    }
                }

            };

            $.bs_modal($.extend(true, bsModalOptions, self.options.bsModal));
        },

        show: function () {
            this.bsModal.show();
        },
        updateItemsList: function () {
            this.$allItems = $(".bssm-item", this.bsModal.$modal);
        },

        /**
         *
         * Bind Events
         *
         * @private
         */
        _bindEvents: function () {
            var self = this;

            var $context = this.bsModal.$modal;

            /**
             *
             * @param {jQuery|array} _visibleItems
             */
            function updateVisibleItems(_visibleItems) {
                self._visibleItems = _visibleItems;
            }

            updateVisibleItems(self.$allItems);

            var $itemsContainer = $(".bssm-list", $context),
                $itemsList      = $itemsContainer.find('.bssm-item');

            self._cacheItems($itemsList);

            function handleFilters() {

                function getActiveItems(type) {
                    var activeItems  = [],
                        activeFilter = $(".bssm-" + type + " .bf-radio-field[data-current-state='active']", $context).data('name');


                    if (activeFilter) {

                        if (activeFilter === 'all') {

                            var idx = type === 'categories' ? 'filter_cats' : "filter_" + type;

                            if (self.bsModal.options.content[idx]) {
                                self.bsModal.options.content[idx].forEach(function (o) {

                                    activeItems.push(o.key);
                                });
                            }
                        } else {

                            activeItems.push(activeFilter);
                        }
                    }

                    return activeItems;
                }

                var checkList = {};

                if (self._length(self.options.types)) {
                    checkList.itemType = getActiveItems('types');
                }

                if (self._length(self.options.categories)) {
                    checkList.itemCat = getActiveItems('categories');
                }

                return self._filterItems(function () {

                    return (function (el) {
                        var value, _break,
                            itemValue,
                            data = self.$(el).data(); // cat & type props encoded as json already

                        for (var x in checkList) {
                            value     = checkList[x];

                            if( data[x] === '' ){
                                continue;
                            }

                            itemValue = self.json_decode(data[x]);
                            if (typeof itemValue === "string") {
                                itemValue = [itemValue];
                            }

                            if (typeof value === "string") {
                                value = [value];
                            }

                            var found = false;
                            for (var i = 0; i < itemValue.length; i++) {

                                if ($.inArray(itemValue[i], value) > -1) {

                                    found = true;
                                    break;
                                }
                            }

                            if (!found) {
                                return false;
                            }
                        }

                        return true;
                    })(this);
                });
            }


            function itemsScrollIntoView() {

                var singleItemHeight = $itemsList.outerHeight(true);

                /**
                 * Detect how many items show in each row
                 */
                function getItemsInSingleRow() {
                    var maxWidth   = $itemsContainer.width(),
                        itemsWidth = $itemsContainer.find('.bssm-item').outerWidth(true);

                    return Math.max(1, Math.floor(maxWidth / itemsWidth));
                }

                function getCurrentActiveItemsBlockNumber() {
                    var numberOfRows = self.options.itemsGroupSize / getItemsInSingleRow();

                    return Math.ceil($itemsContainer.scrollTop() / (singleItemHeight * numberOfRows));
                }

                var block = getCurrentActiveItemsBlockNumber();

                if (block) {
                    var currentBlock = (block * self.options.itemsGroupSize ); // - 1;

                    self.scrollIntoView(currentBlock, currentBlock + self.options.itemsGroupSize);
                }

            }

            function handleItemSearch(e, status) {

                /**
                 * Escape: 27
                 * Space: 32
                 */
                if ($.inArray(e.which, [32, 27]) !== -1) {
                    return;
                }
                clearTimeout(_searchTimeout);

                var searchQuery = $.trim(this.value),
                    $parent     = $(this).parent(),
                    $i          = $parent.find('i.fa');

                $parent[searchQuery ? 'addClass' : 'removeClass']('active');

                if (searchQuery) {

                    $i.addClass('fa-times-circle')
                        .removeClass('fa-search');
                } else {

                    $i.removeClass('fa-times-circle')
                        .addClass('fa-search');
                }

                if (status === 'change-icon') {
                    return;
                }

                _searchTimeout = setTimeout(function () {

                    $(".bssm-filter-items .bf-radio-field[data-name='all']", $context).trigger('click', ['search']); // reset filters

                    if (searchQuery) {

                        var visibleItemsIds = [];

                        self.fuse.search(searchQuery).forEach(function (found) {
                            visibleItemsIds.push(found.id);
                        });

                        var found, _visibleItems = [];
                        for (var i = 0; i < self.$allItems.length; i++) {

                            found = visibleItemsIds.indexOf(
                                    self.get_attr(self.$allItems[i], 'itemId')
                                ) !== -1;

                            if (found) {
                                _visibleItems.push(self.$allItems[i]);
                            }

                        }

                        self._showHide(self.$allItems, false);
                        self._showHide(_visibleItems, true);

                        updateVisibleItems(_visibleItems);
                    } else {
                        self.$allItems.show();
                        updateVisibleItems(self.$allItems);
                    }

                }, self.options.searchDelay);
            }


            if (self.eventExists('item_click')) {

                $itemsContainer.on("click",".bssm-item", function () {
                    self.handleEvent('item_click', this);
                });
            }

            $itemsContainer.on("click",".bssm-item", function () {

                var $item = self.$(this);

                self.markAsSelected($item);

                self.handleEvent('item_select', this, $item.data('item-id'));
            });

            var _searchTimeout;

            $(".bssm-search", $context).each(function () {
                var $this = $(this);

                // Event for Search item
                $('.bssm-search-input', $this).on('keyup', handleItemSearch);


                $this.on('click', '.fa-times-circle', function () {
                    var $input = $('.bssm-search-input', $this);
                    $input.val('');
                    $input.trigger('keyup');
                });

            });


            // Event to Handle Filter by type & category

            $(".bssm-sidebar .bf-radio-group", $context).on('bf-radio-change', function (e, status, flag) {
                if (flag !== 'dont-refresh-items') {

                    if (flag !== 'search') {
                        $(".bssm-search-input", $context).val('').trigger('keyup', ['change-icon']);
                    }

                    var $foundItems = handleFilters();

                    self._showHide(self.$allItems, false);
                    self._showHide($foundItems, true);
                    updateVisibleItems($foundItems);
                }
            });


            if (self.eventExists('scrollIntoView')) {

                $itemsContainer.on('scroll', function () {
                    itemsScrollIntoView();
                });
            }

            if (self.options.overlayClickCloseModal) {

                self.bsModal.find(".bs-modal-overlay").on('click', function () {
                    self.bsModal.close_modal();
                });
            }
        },

        /**
         * Trigger 'scroll into view' event of elements from start to end range
         *
         * @param {number} start
         * @param {number} end
         * @private
         */

        scrollIntoView: function (start, end) {
            var self  = this,
                items = self._visibleItems.slice(start, end);

            var results = [], id;

            for (var i = 0; i < items.length; i++) {

                id = self.get_attr(items[i], 'itemId');

                if (self._scrollIntoView.indexOf(id) === -1) {

                    self._scrollIntoView.push(id);
                    results.push(items[i]);
                }
            }

            if (results.length) {
                self.handleEvent('scrollIntoView', results, start, end);
            }

        },


        getSelectedItem: function () {

            return this.selectedItem;
        },

        setSelectedItem: function (element, id) {

            this.selectedItem = [element, id];
        },

        markAsSelected: function ($item) {
            this.$allItems.removeClass('bssm-selected');
            $item.addClass('bssm-selected');

            this.setSelectedItem($item, $item.data('item-id'));
        },

        json_encode: function (data) {
            data = JSON.stringify(data);

            return data.replace(/"/g, '\\"').replace(/'/g, "\\'");

        },

        json_decode: function (data) {
            data = data.replace(/\\"/g, '"').replace(/\\'/g, "'");
            return JSON.parse(data);
        },
        /**
         * Generate BSModal content option bsModal.options.content
         * @returns object
         * @private
         */
        _getModalContent: function () {
            var self = this,
                data;

            var results = self.options.content,
                o       = self.options;

            // Fill items with json encoded cat & type attributes
            results.items = [];

            self.options.items.forEach(function (item) {

                var _item = $.extend({},item);

                if (_item.cat) {
                    _item.cat = self.json_encode(item.cat);
                }

                if (_item.type) {
                    _item.type = self.json_encode(item.type);
                }

                results.items.push(_item);
            });

            var itemsCount_all = self._length(self.options.items);
            var itemsCount = 0;

            // remove no category items from all count
            for (var i = 0; i < itemsCount_all; i++) {

                if ( typeof self.options.items[i] === 'object' &&
                    self.options.items[i]['id'] !== "default") {
                    itemsCount++;
                }
            }

            function appendCountProperty(data, count) {
                var c;

                for (var i = 0; i < data.length; i++) {
                    c = data[i].key;

                    if (typeof count[c] !== 'undefined') {
                        data[i].count = String(count[c]);
                    } else {
                        data[i].count = '0';
                    }
                }

                return data;
            }

            function _countKey(key) {

                var _results = {}, k;

                for (var i = 0; i < itemsCount_all; i++) {

                    if(typeof self.options.items[i] !== 'object') {
                        continue;
                    }

                    k = self.options.items[i][key];

                    if (_results[k])
                        _results[k]++;
                    else
                        _results[k] = 1;

                }

                return _results;
            }

            data                = self._prepareObjectForMustache(o.categories);
            results.filter_cats = appendCountProperty(data, _countKey('cat'));

            data                 = self._prepareObjectForMustache(o.types);
            results.filter_types = appendCountProperty(data, _countKey('type'));

            results.count_all = itemsCount;

            // results.ch = '<div class="bf-checkbox-multi-state" data-current-state="active">\n    <input type="hidden"\n           class="bf-checkbox-status"\n           value="active">\n\n    <span data-state="none"></span>\n    <span data-state="active" class="bf-checkbox-active" style="display: inline-block;">\n        <i class="fa fa-check" aria-hidden="true"></i>\n    </span>\n</div>'

            return this.handleEvent('modal_content', results);
        },


        _updateSidebarCheckboxStatus: function (flag) {
            var self = this;

            $('.bssm-sidebar .name[data-id]', self.bsModal.$modal).each(function () {
                var $this         = $(this),
                    $checkbox     = $this.parent().find('.bf-checkbox-multi-state'),
                    currentStatus = $checkbox.data('current-state');

                // Todo: check inactivateCats

                if ($.inArray($this.data('id'), self.options.inactivateTypes) > -1) {

                    if (currentStatus !== 'none') {
                        $checkbox.trigger('click', [flag]);
                    }
                } else {
                    if (currentStatus !== 'active') {
                        $checkbox.trigger('click', [flag]);
                    }
                }
            });
        },
        /**
         * Todo: add doc
         *
         * @private
         */
        _clearSearchResults: function () {

            //FIXME: remove
            return;

            var self = this;

            $(".bssm-search-input", this.bsModal.$modal).val('');

            self._showHide(self.$allItems, false);

            function filter(attr, values) {
                var el2hide = self._filterItems(function () {
                    return values.indexOf(
                            self.get_attr(this, attr)
                        ) !== -1;
                });

                self._showHide(el2hide, true);
            }

            // update default unchecked types
            if (this.options.inactivateTypes) {
                filter('data-item-type', this.options.inactivateTypes);
            }
            // update default unchecked categories
            if (this.options.inactivateCats) {
                filter('data-item-cat', this.options.inactivateCats);
            }
        },

        /**
         * Filter all Items jquery object
         *
         * @param {callback}
         * @returns {jQuery}
         * @private
         */
        _filterItems: function (callback) {

            return this.$allItems.filter(callback);
        },
        /**
         * Handle modal events.
         * Fire Registered callback for event
         *
         * @param  {String} event
         * @param  {*} retVal return value
         * @returns {*} Return Fired Callback Results
         */
        handleEvent: function (event, retVal) {
            var args = Array.prototype.slice.call(arguments, 1);
            if (typeof this.options.events[event] === 'function')
                return this.options.events[event].apply(this, args);

            return retVal;
        },

        /**
         * Check is any function registered for event
         *
         * @param  {String} event
         */
        eventExists: function (event) {
            return typeof this.options.events[event] === 'function';
        },

        /**
         * Get cached jQuery element
         *
         * @param {Element}
         * @returns {jQuery}
         */
        $: function (el) {
            if (el.dataset.itemId) {

                var id = el.dataset.itemId;

                if (!( id in this.$itemsCache )) {

                    this.$itemsCache[el.dataset.itemId] = $(el, this.$modal);
                }

                return this.$itemsCache[el.dataset.itemId];
            }

            return $(el, this.$modal);
        },

        selectItem: function (itemId) {

            if (!( itemId in this.$itemsCache )) {

                this.$itemsCache[itemId] = $('.bssm-item[data-item-id="' + itemId + '"]', this.bsModal.$modal);
            }

            return this.$itemsCache[itemId];
        },

        /**
         * Show/ hide items element
         *
         * @param {Array}  elements array of elements
         * @param {Boolean} show
         * @private
         */

        _showHide: function (elements, show) {

            var event = show ? 'show_item' : 'hide_item';

            for (var i = 0; i < elements.length; i++) {

                if (elements[i]) {
                    this.handleEvent(event, elements[i]);
                }
            }
        },
        /**
         * Get Element Attirubute
         *
         * @param {Element} el
         * @param {String} attr
         * @returns {*}
         */
        get_attr: function (el, attr) {

            if (el.dataset) {
                return el.dataset[attr];
            }

            return this.$(el, this.bsModal.$modal).attr(attr);
        },

        /**
         * Convert Key-Value paired object to array
         *
         * @param obj
         *  {
         *   Key: value
         *  }
         *  to
         *     [
         *      {
         *          key:key,
         *          value:value
         *      }
         *     ]
         *
         * @private
         */
        _prepareObjectForMustache: function (obj) {
            var results = [];
            for (var k in obj) {

                results.push({
                    key: k,
                    value: obj[k]
                });
            }

            return results;
        },

        _cacheItems: function (items) {
            this.$itemsCache = {};

            var $item, id;
            for (var i = 0; i < items.length; i++) {
                $item = $(items[i]);

                id = $item.data('item-id');


                this.$itemsCache[id] = $item;
            }

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


    };

    /**
     * Register bs_selector_modal jQuery function
     *
     * @param {Object} options Options
     * @param {Object} bsModalOptions override BsModal options
     *
     * @returns {BsSelectorModal} Selector modal object
     */
    $.bs_selector_modal = function (options, bsModalOptions) {

        return new BsSelectorModal(options, bsModalOptions);
    }
})(jQuery);
