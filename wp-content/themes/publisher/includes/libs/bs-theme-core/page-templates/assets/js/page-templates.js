/***
 *  BetterStudio Themes Core.
 *
 *  ______  _____   _____ _                           _____
 *  | ___ \/  ___| |_   _| |                         /  __ \
 *  | |_/ /\ `--.    | | | |__   ___ _ __ ___   ___  | /  \/ ___  _ __ ___
 *  | ___ \ `--. \   | | | '_ \ / _ \ '_ ` _ \ / _ \ | |    / _ \| '__/ _ \
 *  | |_/ //\__/ /   | | | | | |  __/ | | | | |  __/ | \__/\ (_) | | |  __/
 *  \____/ \____/    \_/ |_| |_|\___|_| |_| |_|\___|  \____/\___/|_|  \___|
 *
 *  Copyright © 2017 Better Studio
 *
 *
 *  Our portfolio is here: https://betterstudio.com/
 *
 *  \--> BetterStudio, 2017 <--/
 */


jQuery(function ($) {

    function show_error(error_message, error_code) {
        var self = this,
            loc  = jQuery.extend({}, better_framework_loc.on_error);

        if (error_message && error_code) {
            loc.body = loc.display_error
                          .replace('%ERROR_CODE%', error_code)
                          .replace('%ERROR_MSG%', error_message);
        }

        return $.bs_modal({
            content: loc,

            buttons: {
                close_modal: {
                    label: loc.button_ok,
                    type: 'primary',
                    action: 'close'
                },
            }
        });
    }

    function toggleStatus(isOnline) {

        $items[ isOnline ? 'removeClass' : 'addClass' ]('offline');
        $items.filter('.need-internet').find('.bspt-install-btn')[ isOnline ? 'removeClass' : 'addClass' ]('disabled');

        $items.find('.bspt-screenshot img').each(function () {

            var $img = $(this);

            if (isOnline) {
                var shot = $img.data('screenshot');
                if (shot) {
                    $img.attr('src', shot);
                }
            } else {
                $img.data('screenshot', $img.attr('src'));
                $img.attr('src', BsPageTemplatesLoc.offline_img);
            }
        });
    }

    /**
     * @param {jQuery|String} element
     */
    function selectType(element) {
        if (typeof element === 'string') {
            element = $(".bspt-filters").find('[data-filter="' + element + '"]');
        }

        if(element && element.length) {

            var $el = element.closest('li');
            $el.addClass('current');
            $el.siblings('li')
               .removeClass('current');

            return true;
        }

        return false;
    }

    if ($.fn.isotope) {

        var $grid = jQuery('.bs-page-templates').isotope({
            itemSelector: '.bs-page-template',
            masonry: {
                columnWidth: 40,
                isFitWidth: true
            }
        });

        function filterResults(className) {
            $grid.isotope({filter: className});
        }

        /**
         * Handle filter by type
         */
        $(".bspt-filters").on('click', 'a', function (e) {
            e.preventDefault();

            var $this     = $(this),
                filter    = $this.data('filter'),
                className = filter === 'all' ? false : "." + filter;


            filterResults(className);
            selectType($this); // Toggle current class

            // clear search query
            $(".bspt-search-input").val('');
        });
    }

    var $items = $(".bs-page-template");

    /**
     * Install button click handler
     */
    $items.on('click', '.bspt-install-btn', function (e) {
        e.preventDefault();

        var $this = $(this);

        if( $this.hasClass('disabled') ){
            return;
        }

        $this.html(BsPageTemplatesLoc.loading);
        $this.addClass('in-loading');

        $items.addClass('disabled');
        $this.closest('.bs-page-template').addClass('in-loading').removeClass('disabled');

        var ajaxParams = {
            action: 'bf_ajax',
            reqID: 'ajax_field',
            type: better_framework_loc.type,
            nonce: better_framework_loc.nonce,
            callback: BsPageTemplatesLoc.add_template.callback,
            bf_call_token: BsPageTemplatesLoc.add_template.bf_call_token,

            template_id: $this.data('template-id')
        };

        $.ajax({
             url: better_framework_loc.bf_ajax_url,
             dataType: 'json',
             data: ajaxParams
         })
         .done(function (response) {

             if (response.result && response.result.is_error) {
                 response.result.error_message += "\n\n";
                 response.result.error_message += JSON.stringify(ajaxParams);
                 console.error(response.result.error_message, response.result.error_code);
                 var modal = show_error(response.result.error_message, response.result.error_code),
                     $info = modal.$modal.find('.bs-pages-error-section textarea');


                 $info.height($info[ 0 ].scrollHeight);
                 modal.make_vertical_center();

                 $this.html(BsPageTemplatesLoc.btn_label);

             } else if (response.post_url) {
                 Better_Framework.panel_loader('succeed');
                 window.location.href = response.post_url;

             }

             $items.removeClass('disabled');
             $this.removeClass('in-loading');
         })
         .fail(function (e, code, msg) {
             show_error(msg, code);
         });
    });


    /**
     * Handle search
     */
    var fuse = Fuse ?
        new Fuse(bsPageTemplatesData, {
            keys: [ "name", "cat" ],
            tokenize: true,
            matchAllTokens: true,

            threshold: 0.4

        })
        : false;

    $(".bspt-search-input").on('keyup', function () {
        var searchQuery = $.trim(this.value),
            $parent     = $(this).parent(),
            $i          = $parent.find('i.fa');

        if (searchQuery) {

            $i.addClass('fa-times-circle')
              .removeClass('fa-search');
        } else {

            $i.removeClass('fa-times-circle')
              .addClass('fa-search');
        }

        if (fuse && filterResults) {

            var selectors = [];
            fuse.search(searchQuery).forEach(function (s) {
                selectors.push("." + s.id);
            });

            var filter = false;
            if (selectors.length) {
                filter = selectors.join(',');
            } else if (searchQuery) {
                filter = '404';
            }

            filterResults(filter);
            selectType('all');
        }
    });

    $(".bspt-search").on('click', '.fa-times-circle', function (e) {
        e.preventDefault();

        var $input = $('.bspt-search-input', $(this).parent());
        $input.val('');
        $input.trigger('keyup');
    });

    if (typeof navigator.onLine === 'boolean' && !navigator.onLine) {
        toggleStatus(false);
    }

    window.addEventListener('online', function () {
        toggleStatus(true);
    });
    window.addEventListener('offline', function () {
        toggleStatus(false);
    });

});
