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

    var prevModalZIndex = 0,
        activeModalsId  = [];
    var BS_Modal        = function (options) {
        function _return_true() {
            return true;
        }

        this.options = $.extend(true, {
            template: 'default',
            skin: 'skin-1',

            initialZIndex: 0,
            show: true,
            /**
             * {Obejct} Mustache View Object
             * @see {@link https://github.com/janl/mustache.js#usage}
             */
            content: {},
            close_button: true,  //Display Modal Window Close Button?
            button_position: 'right',
            animations: {
                delay: 600,
                open: 'bs-animate bs-fadeInDown',
                close: 'bs-animate bs-fadeOutUp'
            },

            /**
             * List of Buttons to Generate
             * buttons: {
             *   BUTTON_ID : {
             *       type: primary|secondary|normal,
             *       action: close|yes|normal,
             *       clicked: Callback Call After Button Clicked,
             *       label: Button Label,
             *       btn_classes: List of Button Classes as HTML Separated by space,
             *       href: Button Link href Value
             *   }
             * }
             */
            buttons: {},

            events: {
                //Event Fire Before click (on every thing) in Modal Section
                before_click: _return_true,
                //Event Fire After Click (on every thing) in Modal Section
                clicked: _return_true,
                handle_keyup: function (e, obj, _continue) {
                    return _continue;
                }
            },

            styles: {
                modal: '',
                container: ''
            },

            modalId: 'modal-'+Math.floor(Math.random() * 999), // Set Random Modal ID
            modalClass: '',
            destroyHtml: true, // Remove modal html after it closed
            is_vertical_center: true // if set true, make modal window center vertically
        }, options);

        // $modal HTML element object used in some methods
        this.$modal = false;
        // $overlay HTML element object used in some methods
        this.$overlay = false;
        //Timer setTimeout return numbers
        this.timerTimeouts = [];
        //document body jQuery object
        this.$document = false;
        //Modal Unique ID
        this.modalID = false;

        this.visible = false;

        this.init(); //Start Modal!
    };
    BS_Modal.prototype  = {

        /**
         * List of Modal Templates
         *
         * templates = {
         *  templateName: Mustache Template String
         *  ,
         *  ...
         * }
         */
        templates: {
            'default': '\n<div class="bs-modal-default"  {{#inline_style}} style="{{inline_style}}" {{/inline_style}}>\n    {{#close_button}}\n    <a href="#" class="bs-close-modal">\n        <i class="fa fa-times" aria-hidden="true"></i>\n    </a>\n    {{/close_button}}\n    <div class="bs-modal-header-wrapper bs-modal-clearfix">\n        <h2 class="bs-modal-header">\n            {{#icon}}\n            <i class="fa {{icon}}"></i>\n            {{/icon}}\n\n            {{header}}\n        </h2>\n    </div>\n\n    <div class="bs-modal-body">\n        {{{bs_body}}}\n    </div>\n\n    {{#bs_buttons}}\n    <div class="bs-modal-bottom bs-modal-buttons-{{btn_position}} bs-modal-clearfix">\n        {{{bs_buttons}}}\n    </div>\n    {{/bs_buttons}}\n</div>',
            'single_image': '\n<div class="bs-modal-default" {{#inline_style}} style="{{inline_style}}" {{/inline_style}}>\n    {{#close_button}}\n    <a href="#" class="bs-close-modal">\n        <i class="fa fa-times" aria-hidden="true"></i>\n    </a>\n    {{/close_button}}\n    <div class="bs-modal-header-wrapper bs-modal-clearfix">\n        <h2 class="bs-modal-header">\n            {{#icon}}\n            <i class="fa {{icon}}"></i>\n            {{/icon}}\n\n            {{header}}\n        </h2>\n    </div>\n\n    <div class="bs-modal-body bf-clearfix">\n        \n        <div class="bs-modal-image bf-clearfix" {{#image_align}} style="float:{{image_align}}"{{/image_align}}>\n\n            <img src="{{image_src}}" {{#image_style}} style="{{image_style}}"{{/image_style}}/>\n            \n            {{#image_caption}}\n            <div class="bs-modal-image-caption">\n                {{image_caption}}\n            </div>\n            {{/image_caption}}\n        </div>\n        {{{bs_body}}}\n    </div>\n\n    {{#bs_buttons}}\n    <div class="bs-modal-bottom bs-modal-buttons-left bs-modal-clearfix">\n        {{{bs_buttons}}}\n        \n        {{#checkbox}}\n        <div class="bs-modal-checkbox">\n            <input type="checkbox" name="include_content" class="toggle-content" value="1" checked="checked"> <label class="checkbox-label">{{checkbox_label}}</label>\n        </div>\n        {{/checkbox}}\n    </div>\n    {{/bs_buttons}}\n</div>'
        },

        /**
         * List of Modal Skins
         *
         * Skins = {
         *  skinName: Mustache Template String
         *  ,
         *  ...
         * }
         */
        skins: {
            'skin-1': '<div class="bs-modal-description">\n   {{#title}} <h3 class="bs-modal-title">{{title}}</h3>\n   {{/title}} \n    {{{body}}}\n</div>',
            'loading': ' <div class="bs-modal-loading bs-modal-loading-1">\n    <img src="data:image/false;base64,R0lGODlhIAAIAPEAALy8vHh4eP///wAAACH/C05FVFNDQVBFMi4wAwEAAAAh/hhPcHRpbWl6ZWQgd2l0aCBlemdpZi5jb20AIfkEBQsAAQAsAAAAACAACAAAAiGEb6GBuNyiWxK8Wq/UuHFPdaCSheLxTeSJmiPEWq4KNwUAIfkEBQsAAAAsAAAAAAgACAAAAgaMj6nL7V0AIfkEBQsAAgAsAAAAABQACAAAAhuEb6IS7Y3QYs/FM6u9IOvAdcsHcp4WnlU6fgUAIfkEBQsAAgAsDAAAABQACAAAAhuEb6IS7Y3QYs/FM6u9IOvAdcsHcp4WnlU6fgUAOw==" />\n\n     <div class="bs-modal-loading-heading">\n         <h4>{{loading_heading}}</h4>\n     </div>\n </div>\n',
            'loading-2': ' <div class="bs-modal-loading">\n     <div class="la-line-scale-pulse-out-rapid la-2x">\n         <div></div>\n         <div></div>\n         <div></div>\n         <div></div>\n         <div></div>\n     </div>\n     \n     <div class="bs-modal-loading-heading">\n         <h4>{{loading_heading}}</h4>\n     </div>\n</div>\n',
            success: ' <div class="bs-modal-success">\n     \n     <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>\n     \n     <div class="bs-modal-bs-modal-success-heading">\n         <h4>{{success_heading}}</h4>\n     </div>\n</div>\n'
        },

        /**
         * HTML Structure of Button
         * @see {@link this.generate_buttons}
         */
        button_struct: '<a {{#href}}href="{{href}}"{{/href}} {{#btn_classes}}class="{{btn_classes}}"{{/btn_classes}} id="{{id}}">{{{label}}}</a>',

        /**
         * Display Debug Console Messages
         * @param {*} message
         */
        debug: function (message) {
            console.error(message);
        },


        get_html: function (templateName, skinName, replacement) {

            if (typeof this.templates[ templateName ] === 'undefined') {
                this.debug('invalid template name');

                return false;
            }

            if (typeof this.skins[ skinName ] === 'undefined') {
                this.debug('invalid skin');

                return false;
            }
            var template = Mustache.parse(this.templates[ templateName ]);
            Mustache.parse(this.skins[ skinName ]);

            var body_content            = Mustache.render(this.skins[ skinName ], replacement),
                template_replace_object = {
                    bs_body: body_content,
                    bs_buttons: this.generate_buttons(),
                    close_button: this.options.close_button,
                    inline_style: this.options.styles.modal,
                    btn_position: this.options.button_position
                };

            this.handle_event('prepare_html', this,templateName, skinName, replacement);

            return Mustache.render(this.templates[ templateName ], $.extend(replacement, template_replace_object));
        },

        before_append_html: function (context) {
            this.handle_event('before_append_html', this, context);
        },
        /**
         *  This function will fire after modal HTML changed
         */

        after_append_html: function (context) {
            if (this.options.is_vertical_center) {
                this.make_vertical_center();
            }

            this.$modal.focus();

            this.handle_event('after_append_html', this, context);
        },

        /**
         * Fire after modal closed
         */
        after_close_modal: function () {
            // unbind resize event
            $(window).off('resize.bs-modal');

            activeModalsId.pop();
        },

        has_button: function () {

            return typeof this.options.buttons === 'object';
        },

        /**
         * Generate Modal Body HTML Codes. Prepare Skin HTML Output and Append to {{{bs_body}}} Section of Template.
         *
         * @returns {boolean} true on Success, false on Failure
         */
        append_html: function () {
            this.before_append_html('modal');

            var htmlOutput = this.get_html(this.options.template, this.options.skin, this.options.content);

            if (typeof htmlOutput !== 'string')
                return htmlOutput;

            this.$modal.html(htmlOutput);

            this.after_append_html('modal');

            return true;
        },

        /**
         * Generate Buttons HTML Code
         *
         * @returns {String} Button HTML Codes on Success, Empty String on Failure
         */
        generate_buttons: function () {
            if (!this.has_button())
                return '';

            Mustache.parse(this.button_struct);

            var html_output = '';

            for (var btn_id in this.options.buttons) {

                html_output += "\n";
                html_output += Mustache.render(this.button_struct, this.get_button_replacement_object(btn_id));
            }

            return html_output;
        },

        /**
         * Generate Mustache View Object used to Render Button HTML
         * @see {@link this.button_struct}
         *
         * @param button_id {String} Property Name of Option, buttons Object
         * @see {@link this.options.buttons}
         * @see {@link https://github.com/janl/mustache.js#usage}
         *
         * @returns {Object} Mustache View Object on Success, Empty Object on Failure
         */
        get_button_replacement_object: function (button_id) {
            if (typeof this.options.buttons[ button_id ] !== 'object') {
                this.debug('invalid button id');

                return {};
            }

            var obj = $.extend({focus: false}, this.options.buttons[ button_id ]);

            delete obj.clicked;

            obj.id = button_id;

            if (typeof obj.btn_classes !== 'string') {
                obj.btn_classes = '';
            }
            if ($.inArray(obj.type, [ 'primary', 'secondary' ]) !== -1) {
                obj.btn_classes += ' bs-modal-btn-' + obj.type;
            }

            if (obj.focus) {
                obj.btn_classes += ' bs-modal-btn-focus';
            }

            return obj;
        },

        /**
         * Close & Remove active Modal
         */
        close_modal: function (who_called) {

            this.visible   = false;
            var self       = this,
                who_called = who_called || 'callback';

            self.handle_event('modal_close', this, who_called);

            for (var i = 0; i < this.timerTimeouts.length; i++) {
                clearTimeout(this.timerTimeouts[ i ]);
            }

            self.$modal
                .removeClass(this.options.animations.open)
                .addClass(this.options.animations.close)
                .delay(this.options.animations.delay)
                .queue(function (n) {

                    self.$modal
                        .hide()
                        .removeClass(self.options.animations.close);

                    if (self.options.destroyHtml) {
                        self.$modal.remove();
                    } else {
                        self.$modal.clearQueue();
                    }
                    n();
                });

            self.$overlay.fadeOut(this.options.animations.delay, function () {
                if (self.options.destroyHtml) {
                    self.find().remove();
                }
                self.$document.removeClass('modal-open').removeClass('modal-open-vc');

                // remove keyup event when modal closed
                self.keyup_unbind();

                // handle after click global event
                self.handle_event('modal_closed', this, who_called);
            });

            self.after_close_modal();
        },


        /**
         * unbind keyup event
         */
        keyup_unbind: function () {

            if (this.options.destroyHtml) {
                this.$document.off('keyup.bs-modal-' + this.getModalID());
            }
        },
        /**
         * handle modal events. (EX: before_click event)
         * Fire Registered callback for event
         *
         * @param event {String} event name
         * @param el    {object} Active HTML Element Object
         * @returns     {*}      Return Fired Callback Results
         */
        handle_event: function (event, el) {
            var args = Array.prototype.slice.call(arguments, 2);

            if (typeof this.options.events[ event ] === 'function')
                return this.options.events[ event ].apply(this, [ el, this.options ].concat(args));
        },

        /**
         * Handle Timer Callback - Fire Registered Callback After Specified Delay
         *
         * @param timer_object. Timer Object. @see {@link this.options.timer}
         *   timer_object = {
         *      callback: function to fire.
         *      delay: delay to fire callback
         *  }
         *
         */
        handle_timer: function (timer_object) {
            var self = this;

            this.timerTimeouts.push(
                setTimeout(function () {
                    timer_object.callback.call(self, self.option);
                }, timer_object.delay)
            );

        },

        /**
         * Refresh Modal Content inside modal events
         * @param options {
             *   template:  {String} New Modal Template,
             *   skin:      {String} New Modal Skin,
             *   content:   {Obejct} Mustache View Object,
             *   animations:{Object} Animation Settings
             * }
         * @returns {*}
         */
        change_skin: function (options, deep) {
            deep = typeof deep === 'boolean' ? deep : true;

            var settings = $.extend(deep, {
                template: this.options.template,
                skin: this.options.skin,
                content: this.options.content,
                animations: {
                    open: false,
                    body: false,
                    delay: 20
                },
                buttons: {},
                styles: {},
            }, options);

            /**
             * set new button value
             * @see {@link this.generate_buttons}
             *
             * @type {Object}
             */
            this.options.buttons = settings.buttons;


            /***
             *
             */
            if (settings.styles.container) {
                var replacement = {inline_style: settings.styles.container},
                    wrapper     = Mustache.render('<div class="bs-modal" {{#inline_style}} style="{{inline_style}}" {{/inline_style}}></div>\n', replacement);

                this.$modal[ 0 ].outerHTML = wrapper;
                this.$modal                = this.find('.bs-modal')
                                                 .css('z-index', prevModalZIndex + 1)
                                                 .show();
                this.afterWrapperHtmlGenerated();
            }

            var htmlOutput = this.get_html(settings.template, settings.skin, settings.content);

            if (typeof htmlOutput !== 'string')
                return htmlOutput;

            this.$modal
                .html(htmlOutput)
                .removeClass(this.options.animations.open)
                .delay(20)
                .queue(function (n) {
                    if (settings.animations.open) {
                        $(this)
                            .addClass(settings.animations.open)
                    }
                    n();
                })
                .removeClass(function (idx, css) {

                    return (css.match(/(^|\s)skin-\S+/g) || []).join(' ');
                })
                .addClass('skin-' + settings.skin)
                .find('.bs-modal-body')
                .addClass(settings.animations.body);

            if (typeof settings.timer === 'object') {
                //start timer after modal open effect finished
                this.handle_timer(settings.timer);
            }

            this.after_append_html('change_skin');
            this.handle_event('modal_loaded', this);
        },

        make_vertical_center: function () {
            var self = this;
            $(window).on('resize.bs-modal', function () {

                if (!self.isModalLast()) {
                    return false;
                }

                var mh = self.$modal.innerHeight(),
                    wh = window.innerHeight;

                if (wh > mh) {
                    var top = Math.ceil((wh - mh) / 2);
                } else {
                    var top = 35; // default top margin
                }

                self.$modal.css('top', top);
            }).trigger('resize.bs-modal');
        },

        getModalID: function () {
            return this.modalID;
        },
        setModalID: function (ID) {
            this.modalID = ID;
        },

        setActiveModalId: function (ID) {
            activeModalsId.push(ID);
        },

        getActiveModalId: function () {
            if (activeModalsId.length) {
                return activeModalsId[ activeModalsId.length - 1 ];
            }

            return 0;
        },

        /**
         * Check is current modal last opened
         * @returns {boolean}
         */
        isModalLast: function () {
            return this.getActiveModalId() === this.getModalID();
        },

        find: function (selector) {
            var $context = this.$document.find('#' + this.getModalID());

            if (selector) {
                return $(selector, $context);
            }

            return $context;
        },

        _fixModalZindex: function () {

        },

        show: function () {
            var self = this;

            if(self.$document.find('.vc_ui-panel.vc_active .vc_ui-panel-window-inner').length) {
                self.$document.addClass('modal-alongside-vc-panel');
            }

            this.$overlay
                .fadeIn(this.options.animations.open, function () {
                    self.$document.addClass('modal-open');
                });

            this.$modal
                .addClass(self.options.animations.open)
                .addClass('skin-' + self.options.skin)
                .show().delay(self.options.animations.delay).queue(function (n) {

                if (typeof self.options.timer === 'object') {
                    //start timer after modal open effect finished
                    self.handle_timer(self.options.timer);
                }

                n();
            });

            this.setActiveModalId(this.getModalID());
            this.visible = true;
            this.handle_event('modal_show', this);
        },
        /**
         * Initial Modal - Generate Modal Html Output and Handle Events
         */
        init: function () {

            this.$document = $(document.body);
            var self       = this;

            this.setModalID(this.options.modalId);
            this.setActiveModalId(this.getModalID());

            var generateModalHtml = this.find().length === 0;

            if (generateModalHtml) { //  append modal html elements if needed
                var replacement = {
                    inline_style: this.options.styles.container,
                    modal_id: this.getModalID(),
                    modal_class: this.options.modalClass
                };
                this.$document
                    .append(Mustache.render('<div id="{{modal_id}}"{{#modal_class}} class="{{modal_class}}"{{/modal_class}}>\n    <div class="bs-modal-overlay"></div>\n        <div class="bs-modal" {{#inline_style}} style="{{inline_style}}" {{/inline_style}}>\n    </div>\n</div>', replacement));
            }

            // $modal and $overlay used in some methods
            this.$modal   = this.find('.bs-modal');
            this.$overlay = this.find('.bs-modal-overlay');

            /**
             * Fix Modal Overlay Z-index
             */
            if (prevModalZIndex) {

                prevModalZIndex = Math.max(prevModalZIndex, this.options.initialZIndex);
                prevModalZIndex++;

                this.$overlay.css('z-index', prevModalZIndex);
                this.$modal.css('z-index', prevModalZIndex + 1);

            } else if(this.options.initialZIndex) {

                this.$overlay.css('z-index', this.options.initialZIndex);

                prevModalZIndex = this.options.initialZIndex;

            }else{
                prevModalZIndex = parseInt(this.$modal.css('z-index'));
            }


            if (generateModalHtml) {
                self.afterWrapperHtmlGenerated();
            }

            //close modal when user pressed esc key, if close button was enabled
            //and prevent opening another modal when user presses enter key
            if (this.options.close_button) {

                /**
                 * 27   => escape
                 * 13   => enter
                 */
                this.$document.on('keyup.bs-modal-' + this.getModalID(), function (e) {

                    if (!self.handle_event('handle_keyup', e, self.isModalLast())) {

                        return false;
                    }

                    if(e.target.tagName === "TEXTAREA") {
                        return false;
                    }

                    if (self.options.close_button && e.which === 27) {

                        self.close_modal('esc');
                    } else if (e.which === 13) {

                        //call primary button event
                        if (self.has_button()) {
                            var $btn_context  = self.$modal
                                                    .find('.bs-modal-bottom');
                            var $btn_selector = $(".bs-modal-btn-focus", $btn_context);
                            if (!$btn_selector.length) {
                                $btn_selector = $(".bs-modal-btn-primary", $btn_context);
                            }

                            $btn_selector.trigger('click');
                        }

                        self.keyup_unbind();
                    }
                });
            }

            if (this.options.show) {

                self.show();
            }


            if (generateModalHtml) {
                self.append_html();
            }

            this.handle_event('modal_loaded', this);
        },

        afterWrapperHtmlGenerated: function () {
            var self = this;

            //handle click events
            this.$modal.on('click', 'a', function (e) {

                //handle before click global event
                if (self.handle_event('before_click', this)) {

                    var $this = $(this), id = $this.attr('id');

                    //link with bs-close-modal is close button
                    if ($this.hasClass('bs-close-modal')) {

                        e.preventDefault();
                        self.close_modal('btn');

                    } else if (id && typeof self.options.buttons[ id ] === 'object') {
                        var btn = self.options.buttons[ id ];

                        // Handle buttons actions
                        switch (btn.action) {
                            case 'close':

                                self.close_modal('link');
                                break;
                        }

                        if (typeof btn.clicked === 'function') {

                            btn.clicked.call(self);
                        }

                    }

                    // handle after click global event
                    self.handle_event('clicked', this)
                }
            });
        }

    };


    /**
     * Register bs_modal jQuery function
     *
     * @param options options object.
     * @returns {jQuery}
     */
    $.bs_modal = function (options) {

        return new BS_Modal(options);
    };

    $.bs_modal_template = function (name, html) {

        if (html) {

            BS_Modal.prototype.templates[name] = html;
        } else {

            return BS_Modal.prototype.templates[name];
        }
    };

})(jQuery);
