jQuery(document).ready(function($) { 
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

var pickerApiLoaded = false,
    authApiLoaded = false;
var oauthToken = cookie.getItem('wep-google-drive');

var providers = {

    icons: {},

    init: function () {

        // load Google Drive
        gapi.load('auth', {
            'callback': function () {
                authApiLoaded = true;
            }
        });
        gapi.load('picker', {
            'callback': function () {
                pickerApiLoaded = true;
            }
        });

        // Load dropbox
        var script = document.createElement('script');
        script.src = 'https://www.dropbox.com/static/api/2/dropins.js';
        script.dataset.appKey = WP_Embedder_Pack_loc.api.dropbox;
        script.id = 'dropboxjs';
        document.body.appendChild(script);

        var icons = this.icons;

        $(".wep-providers a", betterWpEmbedderAdmin.bsModal.$modal).each(function () {

            var $this = $(this),
                provider = $this.data('provider');

            if (!provider || !providers[provider]) {
                return;
            }

            icons[provider] = $this.find('.fa,.icon')[0].outerHTML;
        });
    },


    upload: function () {

        var self = this;

        var frame = wp.media({
            title: WP_Embedder_Pack_loc.labels.media_title,
            button: {
                text: WP_Embedder_Pack_loc.labels.media_button
            },
            multiple: false,
        });

        // when select pressed in uploader popup
        frame.on('select', function () {

            var attachment = frame.state().get('selection').first().toJSON();

            shortcode.editForm(attachment.url, {
                icon: self.icons.upload || false,
                filename: attachment.filename,
                filesize: attachment.filesizeInBytes,

            }, {attachment_id: attachment.id})
        });

        frame.open();
    },

    custom_url: function () {

        var self = this;

        betterWpEmbedderAdmin.bsModal.change_skin({

                animations: {
                    body: 'bs-animate bs-fadeInLeft'
                },
                buttons: {
                    close_modal: {
                        label: WP_Embedder_Pack_loc.labels.insert,
                        type: 'primary',
                        clicked: function () {

                            var url = $.trim($("#wep-custom-url", this.$modal).val());

                            if (!url.match(/^https?\:\/\//)) {
                                url = 'http://' + url;
                            }

                            shortcode.editForm(url, {
                                icon: self.icons.custom_url || false,
                                filename: filename = url.split('/').reverse()[0],
                                filesize: undefined,

                            });
                        }
                    },
                    custom_event: {
                        label: WP_Embedder_Pack_loc.labels.cancel,
                        type: 'secondary',
                        action: 'close'

                    }
                },
                template: 'wp-embedder-pack-custom-url-template'
            }
        );
    },

    dropbox: function () {
        var self = this;

        Dropbox.init({
            appKey: WP_Embedder_Pack_loc.dropbox_key
        });

        Dropbox.choose({
            linkType: "preview",
            multiselect: false,
            success: function (files) {

                var url = files[0].link.replace("dl=0", "dl=1");
                shortcode.editForm(url, {
                    icon: self.icons.dropbox || false,
                    filename: files[0].name,
                    filesize: files[0].bytes,

                });
            }
        });
    },

    google: function () {
        var self = this;

        /**
         * @source github.com/howdy39/google-picker-api-demo
         */
        var initGoogleDrive = function (pickerCallback) {

            var viewIdForhandleAuthResult;

            // Scope to use to access user's photos.
            var scope = [
                'https://www.googleapis.com/auth/drive',
            ];

            function handleAuthResult(authResult) {

                var expire = parseInt(authResult.expires_at);

                if (authResult && !authResult.error) {
                    oauthToken = authResult.access_token;
                    createPicker(viewIdForhandleAuthResult, true);
                    //
                    cookie.setItem('wep-google-drive', oauthToken, expire - Math.ceil(Date.now() / 1e3));
                }
            }

            // Create and render a Picker object for picking user Photos.
            function createPicker(viewId, setOAuthToken) {
                if (authApiLoaded && pickerApiLoaded) {
                    var picker;

                    if (authApiLoaded && oauthToken && setOAuthToken) {
                        picker = new google.picker.PickerBuilder().addView(viewId).setOAuthToken(oauthToken).setDeveloperKey(WP_Embedder_Pack_loc.api.google.api_key).setCallback(pickerCallback).build();
                    } else {
                        picker = new google.picker.PickerBuilder().addView(viewId).setDeveloperKey(WP_Embedder_Pack_loc.api.google.api_key).setCallback(pickerCallback).build();
                    }

                    picker.setVisible(true);
                }
            }

            var viewId = google.picker.ViewId.DOCS,
                setOAuthToken = true;

            if (authApiLoaded && !oauthToken) {

                viewIdForhandleAuthResult = viewId;
                window.gapi.auth.authorize(
                    {
                        'client_id': WP_Embedder_Pack_loc.api.google.client_id,
                        'scope': scope,
                        'immediate': false
                    },
                    handleAuthResult
                );
            } else {

                createPicker(viewId, setOAuthToken);
            }

            return false;
        };

        initGoogleDrive(function (data) {

            if (data[google.picker.Response.ACTION] == google.picker.Action.PICKED) {
                var doc = data[google.picker.Response.DOCUMENTS][0];

                shortcode.editForm(doc.embedUrl, {
                    icon: self.icons.google || false,
                    filesize: doc.sizeBytes,
                    download_able: false,
                    filename: doc.name

                }, {drive_id: doc.id})
            }
        });
    }

};

var shortcode = {

    insertContent: function (content) {

        tinyMCE.activeEditor.insertContent(content);
    },

    insertShortcode: function (options) {

        this.insertContent(wp.shortcode.string(options));
    },

    generateAtts: function () {

        if (!betterWpEmbedderAdmin.bsModal) {
            throw "invalid call";
        }

        var attrs = {};

        $(":input", betterWpEmbedderAdmin.bsModal.$modal).each(function () {

            var $this = $(this),
                name = encodeURIComponent($this.attr('name'));

            if ($this.is(':radio,:checkbox')) {
                attrs[name] = this.checked ? this.value : '0';
            }
            else if ($this.is("select[multiple]")) {

                attrs[name] = [];

                $this.find('option:selected').each(function (i) {
                    var $_this = $(this),
                        _val = encodeURIComponent($_this.val());

                    attrs[name][_val] = _val;
                });
            }
            else {
                attrs[name] = this.value;
            }
        });

        return attrs;
    },

    editForm: function (fileUrl, options, extraAttrs) {

        if (!betterWpEmbedderAdmin.bsModal) {
            throw "invalid call";
        }

        options = $.extend({
            icon: '<i class="fa fa-upload"></i>',
            url: fileUrl,
            download_able: true
        }, options || {});

        var self = this;

        if (options.filesize) {
            options.filesize = helper.formatSize(options.filesize);
        }

        betterWpEmbedderAdmin.bsModal.change_skin({

                animations: {
                    body: 'bs-animate bs-fadeInLeft'
                },
                content: options,

                buttons: {
                    close_modal: {
                        label: WP_Embedder_Pack_loc.labels.insert,
                        type: 'primary',
                        clicked: function () {

                            var attrs = $.extend(self.generateAtts(), extraAttrs || {});

                            if (attrs.attachment_id) {
                                delete attrs.url;
                            }

                            shortcode.insertShortcode({
                                tag: 'wp-embedder-pack',
                                content: '',
                                attrs: attrs,
                                type: 'self-closing'
                            });

                            this.close_modal();
                        }
                    },
                    custom_event: {
                        label: WP_Embedder_Pack_loc.labels.cancel,
                        type: 'secondary',
                        action: 'close'

                    }
                },
                template: 'wp-embedder-pack-shortcode-template'
            }
        );
    }
};


$('.wp-embedder-pack').click(function () {

    betterWpEmbedderAdmin.open();
});

});