var mediaModal = {

    initialized: false,
    $context: '',

    setup: function () {

        if (!wp || !wp.media) {
            return;
        }

        var self = this;

        if (wp.media.featuredImage && wp.media.featuredImage.frame) {

            this.initFeaturedImageModal();
        }

        if (wp.media.frames && self.isUploadPage()) {

            $(document).one('click', ".media-frame-content li.attachment", function () {

                setTimeout(function () {
                    self.initMediaLibraryModal();

                    self.initFocusPoint();
                    self.appendPreviewButton($(".attachment-actions .button", self.$context));
                });
            });
        }
    },

    initFeaturedImageModal: function () {

        var self = this;

        var frame = wp.media.featuredImage.frame();
        frame.on('ready', function () {

            if (self.initialized) {
                return;
            }

            self.$context = this.models[0].frame.$el;
            self.initialized = true;

            wp.Uploader.queue.on('reset', function () { // Upload completed

                setTimeout(function () {
                    self.initFocusPoint();
                    self.appendPreviewLink();
                });
            });
        });

        frame.on('selection:toggle', function () { // Image selected

            self.initFocusPoint();
            self.appendPreviewLink();
        });

        frame.on('uploader:ready', function (a) { // Image selected

            var interval = setInterval(function () {

                if (self.initFocusPoint()) {

                    self.appendPreviewLink();

                    clearInterval(interval);
                }

            }, 200);
        });

    },

    initMediaLibraryModal: function () {

        var self = this;

        wp.media.frames.edit.on('refresh', function (e) {

            self.initFocusPoint();
            self.appendPreviewButton($(".attachment-actions .button", self.$context));
        });
    },

    initFocusPoint: function () {

        return focusPoint.setup({
                $el: $(".thumbnail-image img", this.$context),
                parentSelector: ".media-frame-content",
                grid: loc.get("grid"),
                defaultPosition: this.getFocusPoint()
            },
            {
                done: $.proxy(this.saveFocusPoint, this)
            }
        );
    },

    appendPreviewLink: function () {

        var self = this,
            link = "<div class='preview-thumbnails'><a href='#'>" + loc.translate('preview') + "</a></div>";

        var $link = $(link).insertAfter($(".attachment-info .edit-attachment", this.$context));

        $link.on('click', function (e) {
            e.preventDefault();

            self.previewModal();
        });
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

                var $msgParent = self.isUploadPage() ? $(".thumbnail-image", self.$context) : $(".attachment-info", self.$context);

                helper.notify($msgParent, res.message);
            }
        });

        ajax.always(function () {

            self.loading('stop');
        });
    },

    loading: function (state) {

        switch (state) {

            case 'start':

                UI.block($(".attachment-info", this.$context));

                break;

            case 'stop':
                UI.unblock($(".attachment-info", this.$context));

                break;
        }
    },

    attachmentId: function () {

        if (this.isUploadPage()) {

            return $(".attachment-details", this.$context).data('id');

        } else {

            return $(".attachment.selected", this.$context).data('id');
        }
    },


    isUploadPage: function () {
        return $(document.body).hasClass('upload-php');
    },

    securityNonce: function () {
        return $(".bt-regenerate-nonce", this.$context).val();
    },

    getFocusPoint: function () {

        var $attachment = $(".attachment.selected", this.$context),
            point = $attachment.data('focus-point');

        return point ? point.split('-') : this.getDefaultFocusPoint();

    },
    setFocusPoint: function (top, left) {

        $(".attachment.selected", this.$context).data("focus-point", top + "-" + left);
    },
    getDefaultFocusPoint: function () {

        var point = $(".bt-focus-point-xy", this.$context).val(),
            $img = $(".thumbnail-image img", this.$context);

        return point && point.indexOf('-') > -1 ? point.split('-') : helper.defaultFocusPoint($img.width(), $img.height());
    }
};

mediaModal.setup();
