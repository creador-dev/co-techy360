var betterWpEmbedderAdmin = {

    templates: [
        'modal-template',
        'shortcode-template',
        'custom-url-template'
    ],
    bsModal: false,

    initModal: function () {

        this.templates.forEach(function (id) {

            helper.registerModalTemplate('wp-embedder-pack-' + id);
        });

        this.bsModal = $.bs_modal({

            modalId: 'better-embed-modal',
            template: 'wp-embedder-pack-modal-template',

            content: WP_Embedder_Pack_loc.main_modal,

            events: {

                after_append_html: function () {

                    $(".wep-providers a", this.$modal).on('click', function () {

                        var $this = $(this);

                        if ($this.hasClass('disabled')) {

                            var content = {}, key, provider = $.trim($this.text());

                            for (key in WP_Embedder_Pack_loc.warning_modal) {

                                content[key] = WP_Embedder_Pack_loc.warning_modal[key].replace(/\{provider\}/g, provider);
                            }

                            $.bs_modal({

                                modalId: 'better-embed-warning',
                                content: content,
                                buttons: {
                                    close_modal: {
                                        label: WP_Embedder_Pack_loc.labels.go,
                                        type: 'primary',
                                        clicked: function () {

                                            window.open(WP_Embedder_Pack_loc.ajax_url.replace('admin-ajax.php', 'admin.php?page=better-studio%2Fwp-embedder-pack'), '_blank')
                                        }
                                    },
                                    custom_event: {
                                        label: WP_Embedder_Pack_loc.labels.cancel,
                                        type: 'secondary',
                                        action: 'close'

                                    }
                                },
                            });
                            return;
                        }

                        var provider = $this.data('provider');

                        if (!provider || !providers[provider]) {
                            return;
                        }

                        providers[provider].call(providers);
                    });
                }
            }
        });
    },


    open: function () {

        if (this.bsModal) {
            this.bsModal.init();
        } else {
            this.initModal();
            providers.init();
        }
    },

    close: function () {
        return this.bsModal.close_modal();
    },
};
