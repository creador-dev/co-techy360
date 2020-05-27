var previewModal = {

    info: {},

    setup: function (info) {

        this.info = info;

        this.open();
    },

    open: function () {

        var self = this;

        if (!self.info.images) {
            return;
        }


        $.bs_selector_modal({
            bsModal: {
                destroyHtml: true,
                show: true
            },

            noSidebar: true,

            id: 'bt-thumbnil-selector',
            modalClass: 'bt-modal',

            itemInnerHtml: '<div class="bf-item-container">\n    <figure>\n        <img src="{{img}}"\n             alt="{{label}}"\n             class="bs-style-thumbnail" data-current-image="{{current_img}}">\n    </figure>\n</div>',

            content: self.info.l10n,
            items: self.info.images.map(self.noCacheImage),

            itemsGroupSize: 9,

            events: {}
        }, {
            initialZIndex: 209901
        });
    },

    noCacheImage: function (obj) {

        obj.img += "?" + new Date().getTime();

        return obj;
    }
};