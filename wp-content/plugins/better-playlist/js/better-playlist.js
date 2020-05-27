jQuery(document).ready(function ($) {

    $(".bsp-wrapper").on('click', '.bsp-videos-items a', function (e) {

        e.preventDefault();

        var $this = $(this),
            $playlist_wrapper = $this.closest('.bsp-wrapper'),
            $player_wrapper = $this.closest('.bsp-wrapper').find('.bsp-player'),
            ID = $(this).data('video-id'),
            URL = $player_wrapper.data('frame-url').replace('{video-id}',ID);

        //append video player
        $player_wrapper.html('<iframe type="text/html" width="100%" height="100%"\n        src="'+URL+'"\n        frameborder="0" allowfullscreen="allowfullscreen" mozallowfullscreen="mozallowfullscreen" msallowfullscreen="msallowfullscreen" oallowfullscreen="oallowfullscreen" webkitallowfullscreen="webkitallowfullscreen"></iframe>');

        //set current class for active li
        $this.closest('li')
            .addClass('bsp-current-item')
            .siblings('li')
            .removeClass('bsp-current-item');

        //get active video index & display to user
        var index = $playlist_wrapper
            .find('.bsp-current-item .bsp-video-index')
            .html();

        $playlist_wrapper
            .find('.bsp-current-playing .bsp-current-index')
            .html(index)

    });


    (function fix_element_query(){

        if (typeof elementQuery != 'function') {
            return;
        }

        elementQuery({
            ".bsp-wrapper": {
                "max-width": ["480px","680px","780px"]
            }
        });

    })();

});