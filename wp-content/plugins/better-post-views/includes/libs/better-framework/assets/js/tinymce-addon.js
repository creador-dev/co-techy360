var BetterStudio_TinyMCE_View = {

    settings: {},
    fetchShortcodes: [],
    shortcodeCounter: 0,
    fetchAllQueue: 0,
    repeaterPrefix: 'bf-metabox-option', // Repeater Fields Input Prefix

    init: function (jQuery) {

        var view = this;

        BF_TinyMCE_View.shortcodes &&
        BF_TinyMCE_View.shortcodes.forEach(function (args) {
            view.registerView(args);
        });

        this.$ = jQuery;
    },

    initEditModal: function ($modal) {

        var self = this;

        var $context = self.$('.tinymce-addon-fields', $modal);
        if (!$context.length) {
            return;
        }

        function hideAllTabs() {
            $context.children('.group').hide();
        }

        function showOnCompatible($target) {
            $target.find(':input:first').trigger('force-change');
        }

        // Show first
        hideAllTabs();
        $context.children('.group:first').show();
        self.$(".tabs-wrapper li:first").addClass('active-tab');


        // Handle Tabs
        self.$(".bf-tab-item-a", $context).on('click', function () {
            var $li           = self.$(this).closest('li'),
                targetSection = $li.data('go'),
                ID            = "bf-tmv-" + targetSection;

            // Set Active Tab
            $li.addClass('active-tab');
            $li.siblings('li').removeClass('active-tab');

            var $target = self.$("#" + ID, $context);
            hideAllTabs();
            $target.fadeIn(500);
            showOnCompatible($target);
        });

    },

    setSettings: function (args) {

        if (!args) {
            return;
        }

        if (args.shortcode) {
            this.settings[ args.shortcode ] = args.settings;
        }
    },

    getSettings: function (shortcode) {

        return this.settings[ shortcode ];
    },

    /**
     * Register TinyMCE View
     *
     * @param {Object} args configuration object {
     *
     * }
     */
    registerView: function (args) {

        var self = this;

        args = _.extend({}, {
            extend: {},
        }, args);

        if (args.settings) {
            self.setSettings(args);
        }

        wp.mce.views.register(args.shortcode, _.extend({}, self.viewsBaseClass(args), args.extend));
    },

    doShortcode: function (shortcode, viewObject) {
        var view = this;


        clearTimeout(view.fetchAllQueue);
        view.fetchAllQueue = setTimeout(function () {
            view.fetchAllShortcodes.call(view);
        });

        view.fetchShortcodes.push({
            query: {
                shortcode: shortcode,
                id: view.shortcodeCounter,
            },
            id: view.shortcodeCounter,
            view: viewObject
        });
        view.shortcodeCounter++;
    },

    fetchAllShortcodes: function () {
        var view               = this,
            data2send          = _.pluck(view.fetchShortcodes, 'query'),
            doShortcodePerStep = parseInt(BF_TinyMCE_View.doshortcode_steps || 5);


        var steps     = _.groupBy(data2send, function (d, index) { // chunk data
                return Math.floor(index / doShortcodePerStep);
            }),
            finalStep = Better_Framework._length(steps);

        var r, data, doneRequests = 0;

        for (var idx in steps) {

            data = steps[ idx ];

            wp.ajax.post('bf_ajax', {
                  reqID: 'fetch-mce-view-shortcode',
                  nonce: better_framework_loc.nonce,
                  shortcodes: data,

                  post_id: wp.media.view.settings.post.id
              })
              .done(function (response) {

                  _.each(response, function (output, id) {

                      var shortcode = _.findWhere(view.fetchShortcodes, {id: parseInt(id)});

                      if (shortcode && shortcode.view) {

                          if (output.type === 'no-items') {
                              shortcode.view.setError("[" + shortcode.view.shortcode.tag + "]<br/>" + output.message, 'no-alt');
                          } else {
                              shortcode.view.render(output);
                          }
                      }
                  });
              }).always(function () {
                if(++doneRequests === finalStep) {
                    view.fetchShortcodes  = [];
                    view.shortcodeCounter = 0;
                }
            });
        }
    },

    viewsBaseClass: function (args) {

        var self = this;

        if (wp.mce.bsShortcodes) {
            return wp.mce.bsShortcodes;
        }

        wp.mce.bsShortcodes = {

            args: {},

            initialize: function () {
                var view = this;

                self.doShortcode(view.shortcode.string(), view);
            },
            shortcode_data: {},

            edit: function (data, update) {

                var view = this;

                var shortcode_data = wp.shortcode.next(view.shortcode.tag, data),
                    values         = shortcode_data.shortcode.attrs.named;

                values.innercontent = shortcode_data.shortcode.content;

                var buttons = {
                    custom_event: {
                        label: BS_Shortcode_loc.save,
                        type: 'primary',
                        clicked: function () {

                            var modal  = this,
                                inputs = {};

                            var html = self.$(".bs-modal-body", this.$modal).clone();
                            self.$(".mce-field", this.$modal).each(function () {

                                if(this.type === 'radio' && ! this.checked) {
                                    return ;
                                }

                                /**
                                 * Collect input values
                                 */
                                var arraySequence = this.name.match(/\[(.*?)\]/g);
                                if (arraySequence) {
                                    var pointer,
                                        k = this.name.match(/^(.*?)(?=\[)/)[ 1 ];

                                    if (typeof inputs[ k ] === 'undefined') {
                                        inputs[ k ] = {};
                                    }

                                    pointer = inputs[ k ];

                                    for (var i = 0; i < arraySequence.length; i++) {
                                        k = arraySequence[ i ].substr(0, arraySequence[ i ].length - 1).substr(1);

                                        if (typeof pointer[ k ] === 'undefined') {
                                            pointer[ k ] = {};
                                        }

                                        pointer = pointer[ k ];
                                    }

                                    pointer.__VALUE__ = this.value;

                                } else {
                                    inputs[ this.name ] = this.value;
                                }
                            }).promise().done(function () {

                                var settings = self.getSettings(view.shortcode.tag);

                                var subShortcodes = '';
                                if (settings.sub_shortcodes) {

                                    var key, _shortcodeName;
                                    var contentKey;

                                    for (key in settings.sub_shortcodes) {

                                        if (!inputs[ key ]) {
                                            continue;
                                        }

                                        _shortcodeName = settings.sub_shortcodes[ key ];

                                        _.each(inputs[ key ], function (attrs) {

                                            attrs = _.mapObject(attrs, function (value) {
                                                if (typeof value === 'object' && '__VALUE__' in value) {
                                                    return value.__VALUE__;
                                                }
                                                return value;
                                            });

                                            if (typeof settings.extra.shortcode_content_fields[ key ] === 'string')
                                                contentKey = settings.extra.shortcode_content_fields[ key ];
                                            else
                                                contentKey = '';

                                            var content = '';

                                            if (contentKey && typeof attrs[ contentKey ] != 'undefined') {
                                                content = attrs[ contentKey ];
                                                delete attrs[ contentKey ];
                                            }

                                            subShortcodes += "\n\t";
                                            subShortcodes += wp.shortcode.string({
                                                tag: _shortcodeName,
                                                content: content,
                                                attrs: attrs,
                                                type: 'close'
                                            });
                                        });

                                        delete inputs[ key ];
                                    }
                                }

                                if (subShortcodes) {
                                    subShortcodes += "\n";
                                }

                                update(wp.shortcode.string({
                                    tag: view.shortcode.tag,
                                    attrs: _.pick(inputs, _.identity),
                                    type: 'open',
                                    content: subShortcodes,
                                }), false);

                                modal.close_modal('tinymce');
                            });
                        }
                    },
                    close_modal: {
                        type: 'secondary',
                        action: 'close',
                        label: better_framework_loc.translation.reset_panel.button_no,
                        focus: true
                    }
                };

                var editorModal = self.$.bs_modal({
                    modalId: 'es-modal',
                    skin: 'loading',
                    content: {
                        header: 'Loading...',
                        title: 'Loading...',
                        body: ''
                    },

                    buttons: buttons,
                    events: {
                        before_append_html: function () {
                            var zIndex = 1.55e5;
                            this.$overlay.css('z-index', zIndex);
                            this.$modal.css('z-index', zIndex + 1);
                        },
                        after_append_html: function () {
                            self.initEditModal(this.$modal);
                        }
                    }
                });

                wp.ajax.post('bf_ajax', {
                    action: 'bf_ajax',
                    reqID: 'fetch-mce-view-fields',
                    nonce: better_framework_loc.nonce,
                    shortcode: view.shortcode.tag,
                    shortcode_content: shortcode_data.shortcode.content,
                    //shortcode_attrs: shortcode_data.shortcode.attrs,
                    shortcode_values: values
                }).done(function (data) {

                    editorModal.change_skin({
                        skin: 'skin-1',
                        animations: {
                            //body: 'bs-animate bs-fadeInLeft'
                        },

                        content: {
                            header: (function (t) {

                                var _settings = self.getSettings(view.shortcode.tag);
                                var name      = _settings.name || '';

                                if (data.settings) {
                                    _settings.extra = data.settings;
                                    self.setSettings({
                                        settings: _settings,
                                        shortcode: view.shortcode.tag
                                    });
                                }

                                return t.toString().replace('%shortcode%', name);
                            })(BF_TinyMCE_View.l10n.modal.header),
                            title: '',
                            body: data.output
                        },
                        buttons: buttons
                    })
                });
            }
        };

        return wp.mce.bsShortcodes;
    }
};

jQuery(function () {
    BetterStudio_TinyMCE_View.init(jQuery);
})