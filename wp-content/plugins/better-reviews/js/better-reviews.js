jQuery(function ($) {

    var docCookies = {
        getItem: function (sKey) {
            if (!sKey) {
                return null;
            }
            return decodeURIComponent(document.cookie.replace(new RegExp("(?:(?:^|.*;)\\s*" + encodeURIComponent(sKey).replace(/[\-\.\+\*]/g, "\\$&") + "\\s*\\=\\s*([^;]*).*$)|^.*$"), "$1")) || null;
        },
        setItem: function (sKey, sValue, vEnd, sPath, sDomain, bSecure) {
            if (!sKey || /^(?:expires|max\-age|path|domain|secure)$/i.test(sKey)) {
                return false;
            }
            var sExpires = "";
            if (vEnd) {
                switch (vEnd.constructor) {
                    case Number:
                        sExpires = vEnd === Infinity ? "; expires=Fri, 31 Dec 9999 23:59:59 GMT" : "; max-age=" + vEnd;
                        break;
                    case String:
                        sExpires = "; expires=" + vEnd;
                        break;
                    case Date:
                        sExpires = "; expires=" + vEnd.toUTCString();
                        break;
                }
            }
            document.cookie = encodeURIComponent(sKey) + "=" + encodeURIComponent(sValue) + sExpires + (sDomain ? "; domain=" + sDomain : "") + (sPath ? "; path=" + sPath : "") + (bSecure ? "; secure" : "");
            return true;
        },
        removeItem: function (sKey, sPath, sDomain) {
            if (!this.hasItem(sKey)) {
                return false;
            }
            document.cookie = encodeURIComponent(sKey) + "=; expires=Thu, 01 Jan 1970 00:00:00 GMT" + (sDomain ? "; domain=" + sDomain : "") + (sPath ? "; path=" + sPath : "");
            return true;
        },
        hasItem: function (sKey) {
            if (!sKey) {
                return false;
            }
            return (new RegExp("(?:^|;\\s*)" + encodeURIComponent(sKey).replace(/[\-\.\+\*]/g, "\\$&") + "\\s*\\=")).test(document.cookie);
        },
        keys: function () {
            var aKeys = document.cookie.replace(/((?:^|\s*;)[^\=]+)(?=;|$)|^\s*|\s*(?:\=[^;]*)?(?:\1|$)/g, "").split(/\s*(?:\=[^;]*)?;\s*/);
            for (var nLen = aKeys.length, nIdx = 0; nIdx < nLen; nIdx++) {
                aKeys[nIdx] = decodeURIComponent(aKeys[nIdx]);
            }
            return aKeys;
        }
    };


    function isRatingLock(postId) {

        return getStatusCookie().indexOf(postId.toString()) > -1;
    }

    function getStatusCookie() {
        var cookie = docCookies.getItem('better-review-user-rating');

        if (cookie) {
            return cookie.split(',');
        }

        return [];
    }

    function lockRating(postId) {
        var stat = getStatusCookie();
        stat.push(postId.toString());

        var time = 217.728e6; // a Year
        docCookies.setItem("better-review-user-rating", stat, time, betterReviewsLoc.cp);
    }

    var is_rtl = $('body').hasClass('rtl');

    $(".readers-ratings").on('mousemove', '.rating-stars:not(.disable)', function (e) {

        var $this = $(this),
            Gap = 2,
            w = ($this.width() - Gap) / 100,  // percentage width
            elPos = Math.ceil(is_rtl ? ( $(this).offset().left + $(this).width() ) - e.pageX : e.pageX - $(this).offset().left); // element left/right position

        var width = Math.min(100, Math.ceil(elPos / w)); // convert element position to  width (in percent)

        $this.children('span').width(width + '%').data('rate', width);

    }).on('click', '.rating-stars:not(.disable)', function () {

        var $this = $(this),
            $wrapper = $this.closest('.betterstudio-review'),
            loading = '<i class="fa fa-spinner fa-spin loading" style="margin: 0 50px;"></i>';

        $this.addClass('disable'); // disable click event

        // append loading
        $this.fadeOut(150, function () {
            $this.parent().append(loading);
        });

        $.ajax({
            url: betterReviewsLoc.ajax_url,
            type: 'POST',
            dataType: 'json',
            data: {
                action: 'better-review-rating',
                post_id: $this.data('post-id'),
                rating: $this.children('span').data('rate')
            },
        })
            .done(function (res) {

                if (res.success) {

                    lockRating($this.data('post-id'));

                    //Update Rating to new value
                    $this.children('span').width(res.data.vote + '%').data('rate', res.data.vote);
                    $('.ratings-results .number', $wrapper).html(res.data.vote + '%');
                    $this.fadeIn(150);

                    // update total votes value
                    $('.total-votes .number', $wrapper).html(res.data.votes_count);
                } else {

                    // Display error message

                    var $error = $('<span />', {
                        'class': 'error-message',
                    }).html(res.data.message);


                    $error.appendTo($this.parent());
                    $error.delay(4e3).fadeOut(150, function () {
                        $this.fadeIn(150);
                        $this.removeClass('disable'); // enable click event for next try
                    });
                }
            })
            .always(function () {

                $this.parent().find('.loading').remove();
            });
    });


    // disable ratings for voted posts

    $(".readers-ratings .rating-stars:not(.disable)").each(function () {
        var $this = $(this);

        if (isRatingLock($this.data('post-id'))) {
            $this.addClass('disable');
        }
    });
});