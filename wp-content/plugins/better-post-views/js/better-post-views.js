jQuery(document).ready(function ($) {
    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: better_post_views_vars.admin_ajax_url,
        data: {
            action: 'better_post_views',
            better_post_views_id: better_post_views_vars.post_id
        },
        success: function (data, textStatus, XMLHttpRequest) {
            if (data.status == 'succeed') {
                var selector = '[data-bpv-post="';
                selector += better_post_views_vars.post_id;
                selector += '"]';

                $(selector).html(data.html);
            }
        }
    });
});
