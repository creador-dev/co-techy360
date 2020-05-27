(function ($) {

    var BCP_Admin = {

        setup: function () {

            var self = this;

            $(document).on('click', '.cpp-watermark-control a', function (e) {

                e.preventDefault();

                var $li = $(this).closest('li'),
                    status = $li.hasClass('cpp-watermark-add') ? 'add' : 'remove';

                var $box = $li.closest('.cpp-watermark-control');

                var ajax = wp.ajax.post('cpp-watermark', {
                    status: status,
                    post_id: $box.data('post-id'),
                    nonce: $box.data('nonce')
                });

                self.block($box);

                ajax.done(function () {

                    $li.fadeOut(function () {
                        $li.siblings('li').fadeIn();
                    });

                    var $container = $li.closest('.media-modal-content');

                    // Refresh preview images
                    $(".attachment .thumbnail .centered img,.attachment-info .thumbnail img", $container).each(function () {

                        var $this = $(this),
                            src = $this.attr('src');

                        var m = src.toString().match(/(.+)\?\d+/);
                        if (m && m[1]) {
                            src = m[1];
                        }

                        $this.attr('src', src + "?" + new Date().getTime());
                    });
                });

                ajax.always(function () {

                    self.unblock($box);
                });
            });
        },

        is_blocked: function ($element) {

            return !!$element.data('bc-el-blocked');
        },

        block: function ($element) {

            if (this.is_blocked($element)) {
                return;
            }

            $element.data('bc-el-blocked', true);

            $element.prepend('<div class="bc-block-overlay" style="z-index:10;display:none;border:none;margin:0;padding:0;width:100%;height:100%;top:0;left:0;display:none;position: absolute;background:rgba(255,255,255,0.4)"></div>');

            $(".bc-block-overlay").fadeIn();
        },


        unblock: function ($element) {

            if (!this.is_blocked($element)) {
                return;
            }

            $element.data('bc-el-blocked', false);

            $(".bc-block-overlay").fadeOut(function () {
                $(this).remove();
            });
        },
    };


    BCP_Admin.setup();
})(jQuery);
