var focusPoint = {

    markerArea: 10,

    isMouseDown: false,
    $element: false,
    $container: false,

    options: {},

    events: {},

    setup: function (options, events) {

        this.events = events || {};
        this.options = options || {};

        if (this.prepare()) {

            this.bindEvents();

            return true;
        }

        return false;
    },

    prepare: function () {

        if (!this.options.$el || !this.options.$el.length) {
            return false;
        }

        this.$element = this.options.$el;
        this.$element.wrap("<div class='bt-focus-point'></div>");
        //
        this.$container = this.$element.parent();
        this.$container.append('<div class="bt-focus-point-marker"></div>');

        if (this.options.defaultPosition) {
            this.fixMarkerPosition(this.options.defaultPosition);
        }

        if (this.options.grid) {
            this.appendGrid();
        }

        return true;
    },

    handle_event: function (event) {
        var args = Array.prototype.slice.call(arguments, 1);

        if (typeof this.events[event] === 'function')
            return this.events[event].apply(this, args);
    },

    appendGrid: function () {

        var $grid = $("<div>", {"class": "grid"}).insertAfter(this.$container.find('img'));

        $grid.html('<div class="x1"></div>\n<div class="x2"></div>\n\n<div class="y1"></div>\n<div class="y2"></div>');
    },

    fixMarkerPosition: function (pos) {

        var x = parseFloat(pos[0]),
            y = parseFloat(pos[1]);

        if (!(x >= 0 && x <= 1)) {
            return;
        }

        if (!(y >= 0 && y <= 1)) {
            return;
        }

        var $img = this.$container.find('img');
        var markerArea = this.markerArea;

        $(".bt-focus-point-marker", this.$container).css({
            top: Math.floor($img.height() * y) - markerArea,
            left: Math.floor($img.width() * x) - markerArea
        });
    },

    bindEvents: function () {

        var self = this;

        var markerArea = this.markerArea,
            $marker = $(".bt-focus-point-marker", this.$container);

        var $markerWrapper = (function () {

            var $m = self.options.parentSelector ? $(".bt-focus-point-marker", this.$container).closest(self.options.parentSelector) : '';

            if ($m && $m.length) {
                return $m;
            }

            return $(".bt-focus-point-marker", this.$container);

        })();

        $marker.mousedown(function () {

            self.isMouseDown = true;
        });

        $(".bt-focus-point").mousedown(function (e) {

            self.isMouseDown = true;

            $(document).trigger('mousemove.bt-focus-point', [e.pageX, e.pageY]);
        });


        $markerWrapper.mouseup(function () {

            if (!self.isMouseDown) {
                return;
            }

            self.isMouseDown = false;


            var top = parseInt($marker.css('top').replace('px', '')),
                left = parseInt($marker.css('left').replace('px', ''));

            var topPercent = Math.ceil((top + markerArea) / (self.$container.find('img').height() / 100)),
                leftPercent = Math.ceil((left + markerArea) / (self.$container.find('img').width() / 100));


            self.handle_event('done', Math.min(leftPercent, 100), Math.min(topPercent, 100));
        });

        var offset = this.$container.offset();

        if (!offset) {
            throw 'cannot initialize image focus point';
        }

        $(document).on('mousemove.bt-focus-point', function (e, pageX, pageY) {

            if (!self.isMouseDown) {
                return;
            }

            pageX = pageX || e.pageX;
            pageY = pageY || e.pageY;

            var x = pageX - offset.left - markerArea,
                y = pageY - offset.top - markerArea;


            var $img = self.$container.find('img'),
                box = {

                    top: $img.height() - markerArea,
                    left: $img.width() - markerArea,
                };

            y = Math.max(-markerArea, y);
            y = Math.min(box.top, y);

            x = Math.max(-markerArea, x);
            x = Math.min(box.left, x);

            $marker.css({
                top: Math.floor(y),
                left: Math.floor(x),
            });
        });
    }
};