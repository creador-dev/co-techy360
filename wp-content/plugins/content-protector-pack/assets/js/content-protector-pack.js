(function () {

    var protector = {

        // Note: order is important
        activeKeys: {
            cmd: false,
            ctrl: false,
            alt: false,
            shift: false
        },

        setup: function () {

            this.loc('opt-1.0') && this.disableImageRightClick();
            this.loc('opt-1.1') && this.disableImageDragDrop();
            //
            this.loc('opt-2.1') && this.disableRightClick();
            this.loc('opt-2.0') && this.addText2Copy();
            this.loc('opt-2.4') && this.disableShortcuts();

            this.loc('opt-3.0') && this.disableIframeLoad();

            this.loc('opt-2.5') && this.disableTextSelection();
            this.loc('opt-2.6') && this.disableCopy();
        },


        disableImageDragDrop: function () {

            this.attachEvent('dragstart', this.returnFalse);
        },

        disableImageRightClick: function () {

            this.attachEvent('contextmenu', function (e) {

                if ('IMG' === e.target.tagName) {
                    e.preventDefault();
                    return false;
                }
            })
        },
        disableRightClick: function () {

            var self = this;

            this.attachEvent('contextmenu', function (e) {

                if (!self.loc('opt-2.2') || 'A' !== e.target.tagName) {

                    e.preventDefault();
                    self.rightClickAlert();

                    return false;
                }

                var host = self.getHost(e.target.href),
                    allowedHosts = self.loc('opt-2.7');


                if (!host || !allowedHosts) {
                    e.preventDefault();
                    self.rightClickAlert();

                    return false;
                }

                if (allowedHosts.indexOf(host) === -1) {

                    e.preventDefault();
                    self.rightClickAlert();

                    return false;
                }
            })
        },

        disableTextSelection: function () {

            this.attachEvent('selectstart', this.returnFalse);
        },

        disableCopy: function () {

            this.attachEvent('copy', this.returnFalse);
            this.attachEvent('cut', this.returnFalse);
        },

        addText2Copy: function () {

            var self = this;

            var appendText2Copy = function (e) {

                var clipdata = e.clipboardData || window.clipboardData;

                if (!clipdata) {
                    return;
                }

                var text = window.getSelection().toString();

                if (self.loc('opt-2.8') > 0 && text.length > self.loc('opt-2.8')) {
                    text = text.substring(0, self.loc('opt-2.8')) + '...';
                }

                e.preventDefault();

                text = text + "\n" + self.loc('opt-2.0');
                text = text.replace("%POSTLINK%", window.location.href);
                text = text.replace("%SITELINK%", window.location.origin);

                clipdata.setData('Text', text);
            };

            this.attachEvent('copy', appendText2Copy);
            this.attachEvent('cut', appendText2Copy);
        },

        disableShortcuts: function () {

            var self = this;

            this.attachEvent('keydown', function (e) {

                var code = e.keyCode ? e.keyCode : e.which;

                if (code === 16) {

                    self.activeKeys.shift = true;

                } else if (code === 17) {

                    self.activeKeys.ctrl = true;

                } else if (code === 18) {

                    self.activeKeys.alt = true;

                } else if (code === 91) {

                    self.activeKeys.cmd = true;
                } else {

                    var current = '', key;

                    for (key in self.activeKeys) {

                        if (self.activeKeys[key]) {

                            current += key;
                            current += '_';
                        }
                    }

                    current += String.fromCharCode(code);
                    current = current.toLowerCase();

                    if (self.loc('opt-2.4').indexOf(current) !== -1) {

                        e.preventDefault();
                        return false;
                    }
                }


                return true;
            });

            this.attachEvent('keyup', function (e) {

                var code = e.keyCode ? e.keyCode : e.which;

                if (code === 16) {
                    self.activeKeys.shift = false;
                }

                if (code === 17) {
                    self.activeKeys.ctrl = false;
                }

                if (code === 18) {
                    self.activeKeys.alt = false;
                }

                if (code === 91) {
                    self.activeKeys.cmd = false;
                }
            });

        },

        rightClickAlert: function () {

            var msg = this.loc('opt-2.3');

            if (msg) {
                this.alert(msg);
            }
        },

        disableIframeLoad: function () {

            if (!this.isIframe()) {
                return;
            }

            // Ignore internal iframes such as customizer page

            try {

                if (this.getHost(window.parent.location.href) === this.getHost(window.location.href)) {

                    return;
                }

            } catch (Err) {

            }
            var redirectUrl = this.loc('opt-3.2'),
                alert = this.loc('opt-3.1');

            if (this.loc('opt-3.0') === 'redirect' && redirectUrl) {

                if (window.location.href !== redirectUrl) {
                    window.location = redirectUrl;
                    return;
                }
            } else {

                document.write('<h1>' + alert + '</h1>');
                this.attachEvent('DOMContentLoaded', function () {
                    document.write('<h1>' + alert + '</h1>');
                });
            }
        },

        attachEvent: function (on, callback) {

            if (window.addEventListener) {

                window.addEventListener(on, callback, false);

            } else if (window.attachEvent) {

                window.attachEvent('on' + on, callback);
            }
        },

        returnFalse: function (e) {

            if (e && e.preventDefault) {
                e.preventDefault();
            }

            return false;
        },

        alert: function (msg) {

            alert(msg);
        },

        loc: function (loc) {

            if (!loc || !cpp_loc) {
                return;
            }

            if (loc.indexOf('.') == -1) {

                return cpp_loc[loc];
            }

            var _v = loc.split('.');
            var current = cpp_loc[_v[0]];

            if (typeof current === 'undefined') {
                return;
            }

            _v = _v.splice(1);

            var len = _v.length - 1;

            for (var i = 0; i <= len; i++) {

                if (typeof current[_v[i]] !== 'object' && i !== len) {
                    return;
                }

                current = current[_v[i]];
            }

            return current;
        },

        isIframe: function () {
            return window.parent !== window.self;
        },

        getHost: function (url) {

            var matches = url.match(/^https?\:\/\/(?:w{3}\.)?([^\/?#]+)(?:[\/?#]|$)/i);

            if (matches)
                return matches[1];
        }
    };

    protector.setup();

})();
