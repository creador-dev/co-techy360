jQuery(document).ready(function ($) {
    jQuery(document).ajaxSuccess(function (e, xhr, settings) {
        var data = $.unserialize(settings.data);

        if (data.action !== "vc_load_shortcode") {
            return;
        }

        var iframe = document.getElementById("vc_inline-frame"),
            win    = iframe.contentWindow || iframe;

        if (typeof win.elementQuery === "function") {
            win.elementQuery();
        }
        if (typeof win.$bs_sticky_sidebars === "object" && win.$bs_sticky_sidebars.length) {
            win.$bs_sticky_sidebars.hcSticky('reinit');
        }
    });
});
