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

/**
 *
 * @constructor
 */
function BetterStudio_ShortCodes() {

    this.editor = false;
    this.formatter = false;
    this.dom = false;
    this.events = {};

    this.init();
}
BetterStudio_ShortCodes.prototype = {

    /**
     * Set Tinymce variables
     *
     * @private
     */
    _initVars: function () {
        this.editor = tinyMCE.activeEditor;
        this.formatter = this.editor.formatter;
        this.dom = this.editor.dom;
    },

    _getFormatterName: function (obj) {
        if (typeof obj === 'object') {
            return obj.formatter || obj.command;
        }
    },
    _getFormatterValue: function (obj) {
        if (typeof obj === 'object') {
            return obj.formatterValues;
        }
    },

    _isset: function (variable) {
        return typeof variable === 'undefined' || variable === null ? false : true;
    },

    /**
     * Inserts a p element after the reference element.
     *
     * @param {Element/String/Array} referenceNode Reference element, element id or array of elements to insert after.
     * @private
     */
    _insertPAfter: function (referenceNode) {
        var p = this.dom.insertAfter(this.dom.create('p', {}, "&nbsp;"), referenceNode),
            rng = this.dom.createRng();
        // create p element and move cursor to el
        rng.setStart(p, 0);
        rng.setEnd(p, 0);
        this.editor.selection.setRng(rng);
    },

    /**
     * Append an element to referenceNode
     *
     * @param {Element} referenceNode Reference element.
     * @param {Object}  Optional. newElAttr object name/value collection with element attributes.
     * @param {String}  Optional. newElHTML HTML string to set as inner HTML of the element.
     * @param {String}  Optional. newElName Name of new element. default p
     * @private
     */
    _appendElement: function (referenceNode, newElAttr, newElHTML, newElName) {
        if (!referenceNode || !referenceNode.appendChild) {
            return;
        }
        newElName = newElName || 'p';

        var p = referenceNode.appendChild(this.dom.create(newElName, newElAttr, newElHTML)),
            rng = this.dom.createRng();
        // create p element and move cursor to el
        rng.setStart(p, 0);
        rng.setEnd(p, 0);
        this.editor.selection.setRng(rng);
    },
    _runWithDelay: function (callback, delay) {
        setTimeout(callback, delay || 10);
    },

    /**
     * Binds an event listener to a specific internal event by name
     *
     * @param {String}   name     Event name or space separated list of events to bind.
     * @param {callback} callback Callback to be executed when the event occurs.
     */
    on: function (name, callback) {
        if (typeof this.events[name] === 'undefined')
            this.events[name] = [];
        this.events[name].push(callback);
    },

    /**
     * Fire an event
     *
     *  @param {String} name Event name.
     */
    dispatchEvent: function (name) {
        var args = Array.prototype.slice.call(arguments, 1),
            self = this;
        if (typeof this.events[name] === 'object') {
            this.events[name].forEach(function (callback) {
                callback.apply(self, args);
            });
        }
    },

    /**
     * initial Functions & Variables
     */
    init: function () {
        var self = this;

        if (!self._isset(tinyMCE) || !self._isset(tinyMCE.activeEditor) || !self._isset(tinyMCE.activeEditor.formatter)) {
            jQuery(document).on('tinymce-editor-init', function () {
                self.init();
            });
            return;
        }

        this._initVars();
        this.registerFormatters();
        this.addCommands();
        this.attachEventListeners();
        this.attachInternalEvent();
    },

    each: function (o, cb, s) {
        var n, l;

        if (!o) {
            return 0;
        }

        s = s || o;

        if (o.length !== undefined) {
            // Indexed arrays, needed for Safari
            for (n = 0, l = o.length; n < l; n++) {
                if (cb.call(s, o[n], n, o) === false) {
                    return 0;
                }
            }
        } else {
            // Hashtables
            for (n in o) {
                if (o.hasOwnProperty(n)) {
                    if (cb.call(s, o[n], n, o) === false) {
                        return 0;
                    }
                }
            }
        }

        return 1;
    },

    /**
     * Check user selected thing in editor
     *
     * @returns {boolean} true on success
     */
    isUserSelected: function () {
        var selectionNode = this.editor.selection.getNode();

        return !(
            this.editor.selection.getNode().parentNode.hasAttribute("data-mce-bogus") ||
            this.dom.isEmpty(selectionNode) ||
            tinymce.trim(selectionNode.innerHTML) === '&nbsp;'
        );
    },
    getFormatters: function () {
        return {
            // pullquote
            BS_pullquote_Left: {
                block: 'blockquote',
                classes: 'bs-pullquote bs-pullquote-left'
            },
            BS_pullquote_Right: {
                block: 'blockquote',
                classes: 'bs-pullquote bs-pullquote-right'
            },

            //Dropcap
            BS_Dropcap_Simple: {
                inline: 'span',
                classes: 'dropcap dropcap-simple'
            },
            BS_Dropcap_Square: {
                inline: 'span',
                classes: 'dropcap dropcap-square'
            },
            BS_Dropcap_Square_Outline: {
                inline: 'span',
                classes: 'dropcap dropcap-square-outline'
            },
            BS_Dropcap_circle: {
                inline: 'span',
                classes: 'dropcap dropcap-circle'
            },
            BS_Dropcap_Circle_Outline: {
                inline: 'span',
                classes: 'dropcap dropcap-circle-outline'
            },

            // Highlight
            BS_Highlight: {
                inline: 'mark',
                classes: 'bs-highlight bs-highlight-default'
            },
            BS_Highlight_Red: {
                inline: 'mark',
                classes: 'bs-highlight bs-highlight-red'
            },

            //Alerts
            BS_Alert_Simple: {
                block: 'div',
                classes: 'bs-shortcode-alert alert alert-simple'
            },
            BS_Alert_Success: {
                block: 'div',
                classes: 'bs-shortcode-alert alert alert-success'
            },
            BS_Alert_Info: {
                block: 'div',
                classes: 'bs-shortcode-alert alert alert-info'
            },
            BS_Alert_Warning: {
                block: 'div',
                classes: 'bs-shortcode-alert alert alert-warning'
            },
            BS_Alert_Danger: {
                block: 'div',
                classes: 'bs-shortcode-alert alert alert-danger'
            },
        };
    },

    //TODO use mce native method: this.formatter.get()
    getFormatter: function (name) {
        var formatters = this.getFormatters();
        if (typeof formatters[name] === 'object')
            return formatters[name];
    },
    registerFormatters: function () {
        var self = this;

        self.each(this.getFormatters(), function (obj, id) {
            self.formatter.register(id, obj);
        });
    },

    attachEventListeners: function () {
        var self = this;

        self.editor.on('NewBlock', function (e) {
            function returnTrue() {
                return true;
            }

            var prev_el = self.editor.selection.dom.getPrev(e.newBlock, returnTrue);
            if (!prev_el) {
                return;
            }

            if (e.newBlock.tagName != 'P' || /\bbs\-.+/.test(e.newBlock.className)) {
                if (self.dom.isEmpty(prev_el)) {
                    self._insertPAfter(e.newBlock);
                    self.removeNode(prev_el);
                    self.removeNode(e.newBlock);
                }
                /**
                 * inert p element when pressing enter in columns
                 */
                else if (self.editor.dom.hasClass(prev_el, 'bs-shortcode-col')) {
                    /**
                     * keep text when press enter between paragraph
                     */
                    if (self.dom.isEmpty(e.newBlock)) {
                        self._appendElement(prev_el);
                    } else {
                        self._appendElement(prev_el);
                        self._appendElement(prev_el, {}, e.newBlock.innerHTML);
                    }

                    self.removeNode(e.newBlock);
                }
            }

            /**
             * exit column shortcode when pressing enter in columns
             */
            else if (self.findParentByClass(e.newBlock, 'bs-shortcode-col')) {
                if (prev_el.tagName === 'P' && self.dom.isEmpty(prev_el)) {
                    var parent = self.findParentByClass(e.newBlock, 'bs-shortcode-row');
                    //ignore coming out the block while press enter between elements (not bottom)
                    if (!self.editor.selection.dom.getNext(e.newBlock, returnTrue)) {
                        self._insertPAfter(parent);
                        self.removeNode(e.newBlock);
                    }
                }
            }

            /**
             * Stop duplicate element when pressed enter key for the following element classes
             */
            var preventDuplicateTag = [
                /\bbs-intro/,
                /\bbs-shortcode-alert/,
            ];
            var i, regex;
            for (i = 0; i < preventDuplicateTag.length; i++) {
                regex = preventDuplicateTag[i];
                if (regex.test(e.newBlock.className)) {
                    self._insertPAfter(e.newBlock);
                    self.removeNode(e.newBlock);
                    break;
                }
            }
        });
    },

    attachInternalEvent: function () {
        var self = this;

        function ins(txt) {
            self.editor.insertContent(txt);
        }

        /**
         * Append 'A' character when add dropcap on empty area
         */
        self.on('after-formatter', function (fmt) {
            if (/^\bBS_Dropcap.+/i.test(fmt)) {
                if (!self.isUserSelected()) {
                    ins("A");
                }
            }
        });

        /**
         * Append default text when insert highlight on empty area
         */
        self.on('after-formatter', function (fmt) {
            if (/^\bBS_Highlight.*/i.test(fmt)) {
                if (!self.isUserSelected()) {
                    ins("this is a highlighted text");
                }
            }
        });

        /**
         * Append default text when insert alert on empty area
         */
        self.on('after-formatter', function (fmt) {
            if (!self.isUserSelected()) {
                var matched = /^BS_Alert_(.*?)$/i.exec(fmt);
                if (matched) {
                    switch (matched[1].toLowerCase()) {
                        case 'simple':
                            ins("<p><strong>Simple!</strong> This is an alert message.</p>");
                            break;
                        case 'success':
                            ins("<p><strong>Well done!</strong> You successfully read this important alert message.</p>");
                            break;
                        case 'info':
                            ins("<p><strong>Heads up!</strong> This alert needs your attention, but it&#x2019;s not super important.</p>");
                            break;
                        case 'warning':
                            ins("<p><strong>Warning!</strong> Better check yourself, you&#x2019;re not looking too good.</p>");
                            break;
                        case 'danger':
                            ins("<p><strong>Oh snap!</strong> Change a few things up and try submitting again.</p>");
                            break;
                    }
                }
            }
        });
    },

    /**
     * Remove specified node
     *
     * @param   {Element}  node
     */
    removeNode: function (node) {
        // Make sure that the body node isn't removed

        if (!this.isNodeRoot(node)) {
            this.editor.dom.remove(node);
        }
    },

    /**
     * Check is node Root<body> element
     *
     * @returns {boolean}
     */
    isNodeRoot: function (node) {
        return node === this.editor.getBody();
    },

    addCommands: function () {
        var self = this,
            edit = self.editor;

        edit.addCommand('bs-formatter', function (_, value) {
            self.formatter.toggle(self._getFormatterName(value), self._getFormatterValue(value));
            edit.fire(value.command);
        });
        /**
         * Custom List Commands
         *
         * todo: InsertUnorderedList command sometime add nested ul
         * <ul>
         *  <ul>
         *   <li>...</li>
         *   ...
         *  </ul>
         * </ul>
         */
        edit.addCommand('BS_CheckList', function () {
            edit.execCommand("InsertUnorderedList", false)
            self._runWithDelay(function () {

                var $list = jQuery(self.dom.getParent(edit.selection.getNode(), "ul")),
                    listClass = 'bs-shortcode-list',
                    currentListType = 'list-style-check';

                if ($list.hasClass(listClass) && $list.hasClass(currentListType)) {
                    $list.removeClass(listClass).removeClass(currentListType);
                } else if ($list.hasClass(listClass) && !$list.hasClass(currentListType)) {
                    $list[0].className = $list[0].className.replace(/list\-.*/ig, '').trim();
                    $list.addClass(currentListType);
                } else {
                    $list.addClass(listClass).addClass(currentListType);
                }
            });
        });
        edit.addCommand('BS_StarList', function () {
            edit.execCommand("InsertUnorderedList", false)
            self._runWithDelay(function () {

                var $list = jQuery(self.dom.getParent(edit.selection.getNode(), "ul")),
                    listClass = 'bs-shortcode-list',
                    currentListType = 'list-style-star';

                if ($list.hasClass(listClass) && $list.hasClass(currentListType)) {
                    $list.removeClass(listClass).removeClass(currentListType);
                } else if ($list.hasClass(listClass) && !$list.hasClass(currentListType)) {
                    $list[0].className = $list[0].className.replace(/list\-.*/ig, "").trim();
                    $list.addClass(currentListType);
                } else {
                    $list.addClass(listClass).addClass(currentListType);
                }
            });
        });
        edit.addCommand('BS_EditList', function () {
            edit.execCommand("InsertUnorderedList", false)
            self._runWithDelay(function () {

                var $list = jQuery(self.dom.getParent(edit.selection.getNode(), "ul")),
                    listClass = 'bs-shortcode-list',
                    currentListType = 'list-style-edit';

                if ($list.hasClass(listClass) && $list.hasClass(currentListType)) {
                    $list.removeClass(listClass).removeClass(currentListType);
                } else if ($list.hasClass(listClass) && !$list.hasClass(currentListType)) {
                    $list[0].className = $list[0].className.replace(/list\-.*/ig, "").trim();
                    $list.addClass(currentListType);
                } else {
                    $list.addClass(listClass).addClass(currentListType);
                }
            });
        });
        edit.addCommand('BS_FolderList', function () {
            edit.execCommand("InsertUnorderedList", false)
            self._runWithDelay(function () {

                var $list = jQuery(self.dom.getParent(edit.selection.getNode(), "ul")),
                    listClass = 'bs-shortcode-list',
                    currentListType = 'list-style-folder';

                if ($list.hasClass(listClass) && $list.hasClass(currentListType)) {
                    $list.removeClass(listClass).removeClass(currentListType);
                } else if ($list.hasClass(listClass) && !$list.hasClass(currentListType)) {
                    $list[0].className = $list[0].className.replace(/list\-.*/ig, "").trim();
                    $list.addClass(currentListType);
                } else {
                    $list.addClass(listClass).addClass(currentListType);
                }
            });
        });
        edit.addCommand('BS_FileList', function () {
            edit.execCommand("InsertUnorderedList", false)
            self._runWithDelay(function () {

                var $list = jQuery(self.dom.getParent(edit.selection.getNode(), "ul")),
                    listClass = 'bs-shortcode-list',
                    currentListType = 'list-style-file';

                if ($list.hasClass(listClass) && $list.hasClass(currentListType)) {
                    $list.removeClass(listClass).removeClass(currentListType);
                } else if ($list.hasClass(listClass) && !$list.hasClass(currentListType)) {
                    $list[0].className = $list[0].className.replace(/list\-.*/ig, "").trim();
                    $list.addClass(currentListType);
                } else {
                    $list.addClass(listClass).addClass(currentListType);
                }
            });
        });
        edit.addCommand('BS_HeartList', function () {
            edit.execCommand("InsertUnorderedList", false)
            self._runWithDelay(function () {

                var $list = jQuery(self.dom.getParent(edit.selection.getNode(), "ul")),
                    listClass = 'bs-shortcode-list',
                    currentListType = 'list-style-heart';

                if ($list.hasClass(listClass) && $list.hasClass(currentListType)) {
                    $list.removeClass(listClass).removeClass(currentListType);
                } else if ($list.hasClass(listClass) && !$list.hasClass(currentListType)) {
                    $list[0].className = $list[0].className.replace(/list\-.*/ig, "").trim();
                    $list.addClass(currentListType);
                } else {
                    $list.addClass(listClass).addClass(currentListType);
                }
            });
        });
        edit.addCommand('BS_AsteriskList', function () {
            edit.execCommand("InsertUnorderedList", false)
            self._runWithDelay(function () {

                var $list = jQuery(self.dom.getParent(edit.selection.getNode(), "ul")),
                    listClass = 'bs-shortcode-list',
                    currentListType = 'list-style-asterisk';

                if ($list.hasClass(listClass) && $list.hasClass(currentListType)) {
                    $list.removeClass(listClass).removeClass(currentListType);
                } else if ($list.hasClass(listClass) && !$list.hasClass(currentListType)) {
                    $list[0].className = $list[0].className.replace(/list\-.*/ig, "").trim();
                    $list.addClass(currentListType);
                } else {
                    $list.addClass(listClass).addClass(currentListType);
                }
            });
        });

        /**
         * Column commands
         */
        (function () {
            var lorem = '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p>';

            function getRow() {
                var maybeRow, row,
                    rowClass = "bs-shortcode-row";

                maybeRow = edit.selection.getNode();
                if (edit.dom.hasClass(maybeRow, rowClass)) {
                    row = maybeRow;
                } else {
                    row = self.findParentByClass(maybeRow, rowClass)
                }

                return row;
            }

            function appendDefaultText(row) {
                var firstCol = self.dom.select('.bs-shortcode-col:first', row)[0];
                self._appendElement(firstCol, {}, lorem);
            }

            function moveCaretToFirstColumn(row) {
                self._runWithDelay(function () {
                    if (row) {
                        var rng = edit.dom.createRng();
                        rng.setStart(row, 0);
                        rng.setEnd(row, 0);
                        edit.selection.setRng(rng);
                    }
                });
            }

            /**
             * Prevent insert anything, inside row tag out of a column
             */
            function setContentEditableAttribute(row) {
                //Mark row as none editable element

                //Mark columns as editable element
                var cols = self.dom.select('.bs-shortcode-col', row);
                self.each(cols, function (col) {
                    col.setAttribute('data-mce-contenteditable', 'true');
                });
            }

            function handleColumn(beforeHTML, afterHTML) {
                //grab selected node and remove it. it will copy to first column
                var selectedNode = edit.selection.getNode(),
                    isNodeBody = self.isNodeRoot(selectedNode),
                    row;

                if (isNodeBody) {
                    var text = edit.selection.getContent();

                    edit.selection.setContent(
                        beforeHTML
                        + text
                        + afterHTML
                    );

                    //row = edit.selection.dom.getPrev(edit.selection.getNode(), function () {
                    //    return true;
                    //});


                } else {
                    self.removeNode(selectedNode);

                    edit.insertContent(
                        beforeHTML
                        + selectedNode.outerHTML
                        + afterHTML
                    );
                    row = getRow();
                }


                self._runWithDelay(function () {
                    row = getRow();

                    moveCaretToFirstColumn(row);
                    setContentEditableAttribute(row);

                    //append default lorem text if needed
                    if (edit.dom.isEmpty(selectedNode)) {
                        appendDefaultText(row);
                    }
                });
            }


            edit.addCommand('BS_Column_2', function () {
                handleColumn('<div class="row bs-shortcode-row bs-shortcode-row-2-column"><div class="col-xs-6 bs-shortcode-col">', '</div><div class="col-xs-6 bs-shortcode-col">' + lorem + '</div></div>');
            });
            edit.addCommand('BS_Column_3', function () {
                handleColumn(
                    '<div class="row bs-shortcode-row bs-shortcode-row-3-column"><div class="col-xs-4 bs-shortcode-col">',
                    '</div><div class="col-xs-4 bs-shortcode-col">' + lorem + '</div><div class="col-xs-4 bs-shortcode-col">' + lorem + '</div></div>'
                );
            });
            edit.addCommand('BS_Column_4', function () {
                handleColumn(
                    '<div class="row bs-shortcode-row bs-shortcode-row-4-column"><div class="col-xs-3 bs-shortcode-col">',
                    '</div><div class="col-xs-3 bs-shortcode-col">' + lorem + '</div><div class="col-xs-3 bs-shortcode-col">' + lorem +
                    '</div><div class="col-xs-3 bs-shortcode-col">' + lorem + '</div></div>'
                );
            });
        })();
    },
    /**
     * Find parent class of referenceNode with specified classes
     *
     * @param   {Element}   referenceNode Reference element.
     * @param   {String}    className
     * @returns {Element}   parent Node
     * @private
     */
    findParentByClass: function (referenceNode, className) {
        var root = this.dom.getRoot(),
            parent = referenceNode,
            breaked = false;

        while (parent && parent.parentNode && parent.parentNode != root) {
            parent = parent.parentNode;

            if (className && this.editor.dom.hasClass(parent, className)) {
                breaked = true;
                break;
            }
        }
        if (!className || breaked)
            return parent;
    },

    /**
     * Get parent element of node
     *
     * @param   {Element}  node
     * @param   {String}   parentTagName optional.
     * @returns {Element}  parent Node
     */
    getParentNode: function (node, parentTagName) {
        var root = this.dom.getRoot(),
            parent,
            editableRoot,
            breaked = false;
        parent = node;

        if (parentTagName) {
            parentTagName = parentTagName.toString().toUpperCase();
        }
        while (parent && parent.parentNode && parent.parentNode != root) {
            parent = parent.parentNode;

            if (parentTagName && parent.tagName === parentTagName) {
                breaked = true;
                break;
            }
        }


        if (!parentTagName || breaked)
            return parent;
    },
    /**
     * Replaces variables in the value. The variable format is %var.
     *
     * @private
     * @param {String} value Value to replace variables in.
     * @param {Object} vars Name/value array with variables to replace.
     * @return {String} New value with replaced variables.
     */
    replaceVars: function (value, vars) {
        if (typeof value != "string") {
            value = value(vars);
        } else if (vars) {
            value = value.replace(/%(\w+)/g, function (str, name) {
                return vars[name] || str;
            });
        }

        return value;
    },

    /**
     * @param {Object} condition
     */
    applyActiveConditions: function (condition) {
        if (!condition)
            return false;

        var active = 1,
            node = this.editor.selection.getNode(),
            parent = condition.tagName && !this.dom.isBlock(condition.tagName)
                ? node : this.getParentNode(node, condition.parent);

        if (!parent)
            return false;

        if (condition.tagName) {
            active &= condition.tagName.toUpperCase() === parent.tagName;
        }
        if (condition.classes) {
            active &= this.editor.dom.hasClass(parent, condition.classes);
        }

        return Boolean(active);
    },

    BS_PostRenderEvent: function (util_Class) {
        var self = this, fmt, values,
            opt = util_Class.settings;

        self.editor.on(opt.command, function () {
            var cond;

            fmt = self.getFormatter(self._getFormatterName(opt));
            if (fmt) {
                values = self._getFormatterValue(opt);
                cond = {tagName: fmt.block || fmt.inline, classes: self.replaceVars(fmt.classes, values)};
            } else if (opt.activeConditions) {
                cond = opt.activeConditions;
            } else {
                return;
            }

            var isActive = self.applyActiveConditions(cond);
            util_Class.active(isActive);
        });
    },

    /**
     * Fire Tinymce event
     *
     * @param {String} name Event name.
     */
    fireEvent: function (event) {
        if (event) {
            this.editor.fire(event);
        }
    },

    BS_TriggerSubMenu: function (menu_object) {
        var self = this;

        self.each(menu_object, function (obj) {
            self.fireEvent(obj.command);
        })
    },

    BS_CommandClickEvent: function (util_Class) {
        var currentCmd = util_Class.settings.command;
        if (!currentCmd) {
            return;
        }
        var self = this,
            cmd2remove = {name: ''};


        self.each(util_Class.parent().settings.items, function (settings) {
            cmd2remove.name = settings.command;

            if (cmd2remove.name !== currentCmd) {
                if (self.applyActiveConditions(settings.activeConditions)) {
                    self.editor.execCommand(cmd2remove.name, false);
                }
            }
        });

        self.editor.execCommand(currentCmd, false);
    },
    /**
     * Click event handler
     */
    BS_FormatterClickEvent: function (util_Class) {
        var self = this,
            currentFmt, fmt,
            fmt2remove = {
                name: '',
                value: ''
            };
        //remove another formatters
        currentFmt = self._getFormatterName(util_Class.settings);
        this.each(util_Class.parent().settings.items, function (settings) {
            fmt2remove.name = self._getFormatterName(settings);
            fmt2remove.value = self._getFormatterValue(settings);
            if (fmt2remove.name !== currentFmt) {
                var fmt = self.formatter.get(fmt2remove.name);
                if (self.formatter.match(fmt2remove.name, fmt2remove.name) &&
                    (!('toggle' in fmt[0]) || fmt[0].toggle)) {
                    self.formatter.remove(fmt2remove.name, fmt2remove.name);
                }
            }
        });

        this.dispatchEvent('before-formatter', currentFmt, util_Class);
        this.editor.execCommand('bs-formatter', false, util_Class.settings);
        this.dispatchEvent('after-formatter', currentFmt, util_Class);
    },

    BS_RawJsBeforeClickEvent: function (util_Class) {
        this.dispatchEvent('before-raw-js-click', util_Class.settings, util_Class);
    },
    BS_RawJsAfterClickEvent: function (util_Class) {
        this.dispatchEvent('after-raw-js-click', util_Class.settings, util_Class);
    },
    /**
     * Toggle classes and remove another classes
     *
     * @param {String} classes list of classes separated by comma
     * @param {RegExp} removeClassPattern remove all classes with this pattern on node
     * @param {Node}   node optional, default current selection
     */
    toggleClass: function (classes, removeClassPattern, node) {
        var self = this,
            currentClasses,
            nodes = node ? [node] : self.editor.selection.getSelectedBlocks();

        self.each(nodes, function (node) {
            currentClasses = self.dom.getAttrib(node, 'class', false);
            if (currentClasses) {
                self.each(currentClasses.split(' '), function (removeClass) {
                    self.each(classes.split(' '), function (toggledClass) {
                        if (toggledClass !== removeClass && removeClassPattern.test(removeClass)) {
                            self.dom.toggleClass(node, removeClass);
                        }
                    });
                });
            }
            self.dom.toggleClass(node, classes);
        });
    },

    /**
     * Insert a Button
     *
     * @param {String} btnType
     */
    insertButton: function (btnType) {
        var editor = this.editor;

        editor.execCommand("WP_Link", false, {});
        jQuery(editor.selection.getNode()).addClass("btn btn-default btn-" + btnType);
        editor.buttons.wp_link_advanced.onclick();
    }
};
