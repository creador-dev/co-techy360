var helper = {

    isObject: function (obj) {
        p
        var type = typeof obj;
        return type === 'function' || type === 'object' && !!obj;
    },

    isUndefined: function (obj) {

        return obj === void 0;
    },

    modalTemplate: function (templateId) {

        var el = document.getElementById(templateId);

        if (!el) {
            return '';
        }

        if (!el.innerText) {
            return '';
        }

        var template = el.innerText,
            defaultTemplate = $.bs_modal_template('default');

        if (defaultTemplate) {

            template = defaultTemplate.replace('{{{bs_body}}}', template);
        }
        return template;
    },

    registerModalTemplate: function (templateId) {

        var template = this.modalTemplate(templateId);

        if (template) {

            $.bs_modal_template(templateId, template);

            return true;
        }

        return false;
    },
    formatSize: function (size) {

        if (this.isUndefined(size) || /\D/.test(size)) {
            return 'N/A';
        }

        function round(num, precision) {
            return Math.round(num * Math.pow(10, precision)) / Math.pow(10, precision);
        }

        var boundary = Math.pow(1024, 4);

        // TB
        if (size > boundary) {
            return round(size / boundary, 1) + " TB";
        }

        // GB
        if (size > (boundary /= 1024)) {
            return round(size / boundary, 1) + " GB";
        }

        // MB
        if (size > (boundary /= 1024)) {
            return round(size / boundary, 1) + " MB";
        }

        // KB
        if (size > 1024) {
            return Math.round(size / 1024) + " KB";
        }

        return size + " Byte";
    },
};

/**
 * @source https://developer.mozilla.org/en-US/docs/Web/API/Document/cookie/Simple_document.cookie_framework
 *
 * @type {{getItem: cookie.getItem, setItem: cookie.setItem, removeItem: cookie.removeItem, hasItem: cookie.hasItem, keys: cookie.keys}}
 */
var cookie = {
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