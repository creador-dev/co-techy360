var helper = {
    isObject: function (obj) {
        var type = typeof obj;
        return type === 'function' || type === 'object' && !!obj;
    },
    isUndefined: function (obj) {

        return obj === void 0;
    },

    notify: function ($el, message) {

        $el.append("<div class='bt-user-message success' style='display: none;'>" + message + "</div>");

        $(".bt-user-message", $el).fadeIn().delay(5e3).queue(function (n) {

            $(this).fadeOut(function () {
                $(this).remove();
            });
            n();
        });
    },

    defaultFocusPoint: function (imageWidth, imageHeight) {

        if (loc.get('portrait_default_top') &&
            this.isImagePortrait(imageWidth, imageHeight)) {

            return [0.5, 0];
        }

        return loc.get('default_fp');
    },

    isImagePortrait: function (imageWidth, imageHeight) {

        return ( imageWidth + ( imageHeight * 0.14 ) ) < imageHeight;
    }
};
var cache = {
    storage: {},

    add: function (name, data, group) {

        if (helper.isUndefined(cache[group]))
            cache[group] = {};

        cache[group][name] = data;
    },

    get: function (name, group) {

        if (this.exist(name, group)) {

            return cache[group][name];
        }
    },

    exist: function (name, group) {

        return !helper.isUndefined(cache[group]) && !helper.isUndefined(cache[group][name]);
    }
};


var UI = {

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


var loc = {

    get: function (loc) {

        if (!loc) {
            return;
        }

        if (loc.indexOf('.') == -1) {

            return st_loc[loc];
        }

        var _v = loc.split('.');
        var current = st_loc[_v[0]];
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

    translate: function (index) {

        return this.get('translate.' + index);
    }
};