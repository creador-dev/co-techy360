var mediaLibPage = {

    initialized: false,
    $context: '',

    $img: '',

    setup: function () {

        if (!wp || !wp.media) {
            return;
        }

        var $body = $(document.body);

        this.$context = $body;

        if (!$body.hasClass('post-type-attachment') || !$body.hasClass('post-php')) {
            return
        }

        this.$img = $(".wp_attachment_image img.thumbnail", this.$context);

        this.editAttachmentPage();
    },

    editAttachmentPage: function () {

        this.initFocusPoint();

        this.appendPreviewButton($(".wp_attachment_image .button", this.$context));
    },

    initFocusPoint: function () {

        focusPoint.setup({
                $el: this.$img,
                parentSelector: "#wpbody-content",

                grid: loc.get("grid"),
                defaultPosition: this.getFocusPoint()
            }, {
                done: $.proxy(this.saveFocusPoint, this)
            }
        );
    },


    appendPreviewButton: function ($afterEl) {

        var self = this,
            link = "<input type='button' class='button preview-images-btn' value='" + loc.translate('preview') + "'>";

        var $link = $(link).insertAfter($afterEl);

        $link.on('click', function (e) {
            e.preventDefault();

            self.previewModal();
        });
    },

    previewModal: function () {

        var self = this;

        self.loading('start');

        var ajax = previewData.get(self.attachmentId(), self.securityNonce());

        ajax.done(function (res) {

            if (!helper.isUndefined(res.data))
                previewModal.setup(res.data);
        });

        ajax.always(function () {

            self.loading('stop');
        });

    },

    saveFocusPoint: function (topPercent, leftPercent) {

        this.regenerateThumbnails(topPercent, leftPercent);
        this.setFocusPoint(topPercent / 100, leftPercent / 100);
    },

    regenerateThumbnails: function (topPercent, leftPercent) {

        var self = this;

        var attachment_id = self.attachmentId();

        self.loading('start');

        var ajax = wp.ajax.post('bt-regenerate-thumbnails', {
            thumbnail_id: attachment_id,
            nonce: self.securityNonce(),
            focus_x: topPercent,
            focus_y: leftPercent,
        });

        ajax.done(function (res) {

            if (!helper.isUndefined(res.message)) {

                helper.notify($(".wp_attachment_holder", this.$context), res.message);
            }
        });

        ajax.always(function () {

            self.loading('stop');
        });
    },

    loading: function (state) {

        switch (state) {

            case 'start':

                UI.block($(".wp_attachment_holder", this.$context));

                break;

            case 'stop':
                UI.unblock($(".wp_attachment_holder", this.$context));

                break;
        }
    },

    attachmentId: function () {

        return $("#post_ID", this.$context).val();
    },


    securityNonce: function () {

        return $(".bt-regenerate-nonce", this.$context).val();
    },

    getFocusPoint: function () {

        return this.getDefaultFocusPoint();
    },

    setFocusPoint: function (top, left) {

        $(".attachment.selected", this.$context).data("focus-point", top + "-" + left);
    },

    getDefaultFocusPoint: function () {

        var point = $(".bt-focus-point-xy", this.$context).val();

        return point && point.indexOf('-') > -1 ? point.split('-') : helper.defaultFocusPoint(this.$img.width(), this.$img.height());
    }
};

mediaLibPage.setup();
