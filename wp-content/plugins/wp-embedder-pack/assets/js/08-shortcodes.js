var shortcode = {

    insertContent: function (content) {

        tinyMCE.activeEditor.insertContent(content);
    },

    insertShortcode: function (options) {

        this.insertContent(wp.shortcode.string(options));
    },

    generateAtts: function () {

        if (!betterWpEmbedderAdmin.bsModal) {
            throw "invalid call";
        }

        var attrs = {};

        $(":input", betterWpEmbedderAdmin.bsModal.$modal).each(function () {

            var $this = $(this),
                name = encodeURIComponent($this.attr('name'));

            if ($this.is(':radio,:checkbox')) {
                attrs[name] = this.checked ? this.value : '0';
            }
            else if ($this.is("select[multiple]")) {

                attrs[name] = [];

                $this.find('option:selected').each(function (i) {
                    var $_this = $(this),
                        _val = encodeURIComponent($_this.val());

                    attrs[name][_val] = _val;
                });
            }
            else {
                attrs[name] = this.value;
            }
        });

        return attrs;
    },

    editForm: function (fileUrl, options, extraAttrs) {

        if (!betterWpEmbedderAdmin.bsModal) {
            throw "invalid call";
        }

        options = $.extend({
            icon: '<i class="fa fa-upload"></i>',
            url: fileUrl,
            download_able: true
        }, options || {});

        var self = this;

        if (options.filesize) {
            options.filesize = helper.formatSize(options.filesize);
        }

        betterWpEmbedderAdmin.bsModal.change_skin({

                animations: {
                    body: 'bs-animate bs-fadeInLeft'
                },
                content: options,

                buttons: {
                    close_modal: {
                        label: WP_Embedder_Pack_loc.labels.insert,
                        type: 'primary',
                        clicked: function () {

                            var attrs = $.extend(self.generateAtts(), extraAttrs || {});

                            if (attrs.attachment_id) {
                                delete attrs.url;
                            }

                            shortcode.insertShortcode({
                                tag: 'wp-embedder-pack',
                                content: '',
                                attrs: attrs,
                                type: 'self-closing'
                            });

                            this.close_modal();
                        }
                    },
                    custom_event: {
                        label: WP_Embedder_Pack_loc.labels.cancel,
                        type: 'secondary',
                        action: 'close'

                    }
                },
                template: 'wp-embedder-pack-shortcode-template'
            }
        );
    }
};
