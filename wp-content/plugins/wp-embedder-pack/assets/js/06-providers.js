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
