(function ($) {
    var bs_product_demo_manager = function () {

        this.demo_steps = [];
        this.$loading_el = false;
        this.$active_box = false;
        this.active_el = false;
        this.ajax_extra_params = {};
        this.progress_min = 10;

        this.init();
    }

    bs_product_demo_manager.prototype = {
        $document: $(document),

        init: function () {
            var self = this;

            self.$document.ready(function () {

                self.demo_install();
                self.demo_uninstall();
            });
        },

        /**
         * context setter
         *
         * @param context {string} context name
         */
        set  context(context) {

            this.ajax_extra_params[ 'context' ] = context;
        },

        /**
         * context getter
         *
         * @returns {string} active context
         */
        get context() {

            return this.ajax_extra_params[ 'context' ];
        },


        /**
         * prepare ajax data
         *
         * @param params {object}
         * @returns {*}
         * @private
         */
        _ajax_params: function (params) {
            var default_obj = {},
                default_params = $("#bs-pages-hidden-params").serializeArray();

            if (default_params) {
                for (var i = 0; i < default_params.length; i++) {
                    default_obj[ default_params[ i ].name ] = default_params[ i ].value;
                }
            }

            return $.extend(default_obj, params);
        },

        /**
         * send ajax request and fire callback on success
         *
         * @param params {object} data to send
         * @param success_callback {Function} callback for ajax.done method
         */
        ajax: function (params, success_callback) {

            var self = this;
            params = this._ajax_params(params);

            $.ajax({
                 url: ajaxurl,
                 type: 'POST',
                 dataType: 'json',
                 data: $.extend(
                     {action: 'bs_pages_ajax', page_id: $("#bs-pages-current-id").val()},
                     params,
                     self.ajax_extra_params
                 )
             })
             .done(success_callback)
             .fail(function () {

                 self.show_error(self.context === 'install' ? 'install-aborted' : 'failed');
             })
        },

        /**
         * Display message to user
         *
         * @param messageEl {string} message selector
         * @private
         */
        _show_message: function (messageEl) {

            if (this.$active_box) {
                messageEl = messageEl || this._getMessageSelector();

                this.$active_box
                    .find('.messages ' + messageEl)
                    .show()
                    .siblings()
                    .hide();
            }
        },

        /**
         * Get message selector by context
         *
         * @return {string} message selector.
         * @private
         */
        _getMessageSelector: function () {
            var result = '';
            switch (this.context) {

                case 'uninstall':
                    result = '.uninstalling';
                    break;

                case 'install':
                    result = '.installing';
                    break;
            }

            return result;
        },

        /**
         * Get ajax bs_pages_action value by context
         *
         * @return {string} ajax action value.
         * @private
         */
        _getAjaxAction: function () {

            var result = '';
            switch (this.context) {

                case 'uninstall':
                    result = 'rollback';
                    break;

                case 'install':
                    result = 'import';
                    break;
            }

            return result;
        },

        /**
         * Run install/uninstall demo process
         *
         * @private
         */
        _demo_process: function () {

            var self = this,
                $this = $(self.active_el).closest('.bs-pages-buttons');
            this.$active_box = $this.closest('.bs-pages-demo-item');

            this.deactivate_boxes();
            this.deactivate_menu();
            this.deactivate_tabs();

            $this.hide();
            self._show_message();

            //display progressbar to user
            self.$loading_el = $this
                .closest('.bs-pages-demo-item')
                .find('.bs-pages-progressbar')
                .css('visibility', 'visible')
                .css('width', self.progress_min + '%'); //default progress bar value is 10 percent

            var demo_id = $this.data('demo-id');

            $(window).on('beforeunload.bs-demo-installer', function(e) {
                return true;
            });
            //get install/uninstall steps from server
            self.ajax(
                {
                    bs_pages_action: 'get_steps',
                    demo_id: demo_id
                },

                function (response) {

                    if (response && typeof response.success !== 'undefined' && response.success) {
                        self.demo_steps = response.result;
                        self.demo_ajax_request(demo_id, 0, 1, 1);
                    } else {
                        self.show_error(self.context === 'uninstall' ? 'uninstall-start-failed' : 'install-start-failed');
                    }
                }
            );
        },

        /**
         * bind click event for installation process
         */
        demo_install: function () {

            var self = this;

            $('.bs-pages-buttons').on('click', '.install-demo a', function (e) {

                e.preventDefault();

                self.active_el = this;

                /**
                 * show confirm modal before start installation process
                 */
                self._confirm(
                    {
                        header: bs_demo_install_loc.install.header,
                        title: bs_demo_install_loc.install.title,
                        body: bs_demo_install_loc.install.body,
                        button_label: bs_demo_install_loc.install.button_yes,
                        button_no: bs_demo_install_loc.install.button_no,
                        checkbox: true
                    },

                    function () {

                        this.close_modal();
                        self.context = 'install';
                        self._demo_process();
                    }
                );
            });
        },

        /**
         * bind click event for rollback process
         */
        demo_uninstall: function () {

            var self = this;

            $('.bs-pages-buttons').on('click', '.uninstall-demo a', function (e) {

                e.preventDefault();

                self.active_el = this;

                /**
                 * show confirm modal before start rollback process
                 */
                self._confirm(
                    {
                        header: bs_demo_install_loc.uninstall.header,
                        title: bs_demo_install_loc.uninstall.title,
                        body: bs_demo_install_loc.uninstall.body,
                        button_label: bs_demo_install_loc.uninstall.button_yes,
                        button_no: bs_demo_install_loc.uninstall.button_no,
                        checkbox: false
                    },
                    function () {


                        this.close_modal();
                        self.context = 'uninstall';
                        self._demo_process();
                    }
                );
            });

        },

        /**
         * Show confirm modal and fire callback if user accepted
         *
         * @param content {object} modal context object {@see BS_Modal} Mustache View Object
         * @param confirm_callback {Function}
         * @private
         */
        _confirm: function (content, confirm_callback) {

            var self = this;
            $.bs_modal({
                content: $.extend(
                    {
                        icon: 'fa-download',
                        image_align: $('body').hasClass('rtl') ? 'left' : 'right',
                        image_src: $(this.active_el).closest('.bs-pages-demo-item').find('.bs-demo-thumbnail').attr('src'),
                        checkbox_label: content.checkbox ? bs_demo_install_loc.checked_label : bs_demo_install_loc.unchecked_label
                    },
                    content
                ),

                buttons: {
                    custom_event: {
                        label: content.button_label,
                        type: 'primary',
                        clicked: function () {
                            confirm_callback.call(this);

                            self.$document.off('change.demo_settings');
                        }
                    },
                    close_modal: {
                        btn_classes: 'bs-modal-button-aside',
                        label: content.button_no || 'No',
                        type: 'secondary',
                        action: 'close',
                        focus:true
                    }
                },

                template: 'single_image'
            });

            /**
             * checkbox dynamic label
             *
             * change check label  `include content` or `Only settings`
             */
            var el = '.bs-modal .toggle-content';
            self.$document.on('change.demo_settings', el, function (e) {

                var $this = $(this), have_content = $this.is(':checked');
                $this.next('.checkbox-label').html(have_content ? bs_demo_install_loc.checked_label : bs_demo_install_loc.unchecked_label);

                self.ajax_extra_params[ 'have_content' ] = have_content ? 'yes' : 'no';

            }).find(el).change();
        },

        /**
         * handle box messages, hide loading message and display success message
         *
         *
         * @private
         */
        _demo_process_complete: function () {

            $(window).off('beforeunload.bs-demo-installer');
            if (this.active_el) {

                this.$active_box = $(this.active_el).closest('.bs-pages-demo-item');

                var $messages = this.$active_box.find('.messages'),
                    successSelector = false,
                    isUninstalling = this.context === 'uninstall',
                    btnSelector = false,
                    animation_delay = 5000,
                    success = true,
                    self = this;


                if (this.context === 'install-start-failed') {
                    btnSelector = '.preview-demo,.install-demo';
                    animation_delay = 0;
                    success = false;
                } else if (this.context === 'uninstall-start-failed') {
                    btnSelector = '.uninstall-demo';
                    animation_delay = 0;
                    success = false;
                } else if (this.context === 'failed') {
                    //process has been failed
                    successSelector = '.failed';
                    animation_delay = 0;
                    success = false;
                } else if (isUninstalling) {
                    // in uninstalling process
                    successSelector = '.uninstalled';
                    btnSelector = '.preview-demo,.install-demo';
                } else if(this.context === 'install-aborted') {
                    animation_delay = 0;
                    btnSelector = '.uninstall-demo';
                } else {
                    // in installing process
                    successSelector = '.installed';
                    btnSelector = '.uninstall-demo';
                }

                // hide loading message
                $messages.children().hide();
                if( successSelector ) {
                    $messages.find(successSelector).show();
                }
                // hide installed message and show uninstall button after 5 second
                $messages
                    .delay(animation_delay)
                    .queue(function (n) {
                        var $this = $(this);

                        // show uninstall button
                        var $buttons = $this
                            .closest('.bs-pages-demo-item')
                            .find('.bs-pages-buttons');

                        $buttons.children().hide();
                        if (btnSelector) {
                            // hide loading message
                            $messages.children().hide();

                            $buttons
                                .show()
                                .find(btnSelector)
                                .show();
                        }

                        n();
                    });

                // add installed class to box element wrapper
                this.$active_box
                    .delay(700)
                    .queue(function (n) {

                        if(success) {
                            $(this)[ isUninstalling ? 'removeClass' : 'addClass' ]('installed');
                        }
                        self.active_boxes();
                        self.active_menu();
                        self.active_tabs();

                        n();
                    });

                self.hide_progressbar(this.$active_box);
            }
        },

        active_menu: function () {
            $('#adminmenuwrap').removeClass('installing-demo');
        },
        active_tabs: function () {
            $('.bs-product-pages-tabs-wrapper').removeClass('installing-demo');
        },
        deactivate_menu: function () {
            $('#adminmenuwrap').addClass('installing-demo');
        },
        deactivate_tabs: function () {
            $('.bs-product-pages-tabs-wrapper').addClass('installing-demo');
        },
        active_boxes: function () {
            //remove disabled class for all boxes
            $(".bs-product-pages-install-demo")
                .find('.bs-pages-demo-item')
                .removeClass('demo-disabled');
        },

        deactivate_boxes: function () {
            //remove disabled class from active demo box
            this.$active_box.removeClass('demo-disabled');

            //add disabled class to another demo boxes
            $(".bs-product-pages-install-demo")
                .find('.bs-pages-demo-item')
                .not(this.$active_box)
                .addClass('demo-disabled');

        },
        hide_progressbar: function ($active_box) {
            $active_box = $active_box || $(this.active_el).closest('.bs-pages-demo-item');
            $active_box
                .find('.bs-pages-progressbar')
                .css('visibility', 'hidden')
                .delay(500)
                .queue(function (n) {
                    $(this).css('width', '0%');
                    n();
                });
        },

        demo_ajax_request: function (demo_id, index, step_number, progress_step) {

            var self = this,
                ajaxParams = {
                    demo_id: demo_id,
                    current_type: self.demo_steps.types[ index ],
                    current_step: step_number,
                    bs_pages_action: self._getAjaxAction()
                };

            self.ajax(
                ajaxParams ,
                function (response) {

                    if (response && typeof response.success !== 'undefined' && response.success) {

                        //increase loading
                        if (self.$loading_el) {
                            self.$loading_el.css(
                                'width',
                                Math.max(
                                    10,
                                    Math.floor(100 / self.demo_steps.total * progress_step)
                                ) + '%'
                            )
                        }

                        //call _demo_process_complete method on last ajax request
                        if (self.demo_steps.steps_count <= index && self.demo_steps.steps[ index ] <= step_number) {
                            self._demo_process_complete();

                        } else {

                            //calculate next step position
                            if (self.demo_steps.steps[ index ] <= step_number) {
                                index++;
                                step_number = 1;
                            } else {
                                step_number++;
                            }

                            self.demo_ajax_request(demo_id, index, step_number, progress_step + 1);
                        }
                    } else {
                        //process failed! so display error modal
                        if(response.result &&  response.result.is_error){
                            response.result.error_message += "\n\n";
                            response.result.error_message += JSON.stringify(ajaxParams);

                            console.error(response.result.error_message, response.result.error_code);

                            var body = bs_demo_install_loc.on_error.display_error
                                                          .replace('%ERROR_CODE%', response.result.error_code)
                                                          .replace('%ERROR_MSG%', response.result.error_message);
                            var modal  = self.show_error(undefined, undefined, {body: body}),
                                $info = modal.$modal.find('.bs-pages-error-section textarea');

                            $info.height($info[ 0 ].scrollHeight);
                            modal.make_vertical_center();
                        } else {
                            self.show_error();
                        }
                    }
                }
            );
        },

        /**
         * Display error modal
         */
        show_error: function (context,loc_index,content) {
            if (this.context === 'failed')
                return;
            var prevContext = this.context,
                rollback_force = true;

            this.context = context || 'failed';

            if (typeof loc_index === 'undefined') {
                loc_index = prevContext === 'install-aborted' ? 'uninstall_error' : 'on_error';
            }
            if( this.context === 'install-start-failed' ) {
                loc_index = 'install_start_error';
                rollback_force = false;
            } else if( this.context === 'uninstall-start-failed' ) {
                loc_index = 'uninstall_start_error';
                rollback_force = false;
            }

            var self = this,
                loc = jQuery.extend(bs_demo_install_loc[ loc_index ], content || {});

            return $.bs_modal({
                content: loc,
                buttons: {
                    close_modal: {
                        label: loc.button_ok,
                        type: 'primary',
                        action: 'close'
                    },
                },
                events: {
                    modal_close: function () {
                        self._show_error_done(context);
                        if(rollback_force) {
                            //rollback request
                            var demo_id = self.$active_box
                                              .find('.bs-pages-buttons')
                                              .data('demo-id');
                            self.ajax(
                                {
                                    bs_pages_action: 'rollback_force',
                                    demo_id: demo_id
                                },
                                function (response) {
                                }
                            );
                        }
                    }
                }
            });
        },

        _show_error_done: function (context) {
            this.context = context || 'failed';
            this._demo_process_complete();
            this.active_boxes();
            this.active_menu();
            this.active_tabs();
            this.hide_progressbar();
        }
    };

    new bs_product_demo_manager();
})(jQuery);