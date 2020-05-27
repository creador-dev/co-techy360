var bfGutenberg = {

    element: window.wp.element,
    blocks: window.wp.blocks,
    i18n: window.wp.i18n,
    //
    data: BF_Gutenberg,

    init: function () {

        this.registerBlocks();
    },

    registerBlocks: function () {

        for (var shortcode in this.data.blocks) {

            this.blocks.registerBlockType('publisher/' + shortcode, {
                title: 'publisher',
                icon: 'universal-access-alt',
                category: 'layout',
                edit: this.editBlock.bind(this),
                save: this.saveBlock.bind(this),

                attributes: {
                    cover: {
                        type: 'string',
                        source: 'attribute',
                        selector: 'img',
                        attribute: 'src',
                    },
                    author: {
                        type: 'string',
                        source: 'children',
                        selector: '.book-author',
                    },
                    pages: {
                        type: 'number',
                    },
                },
            });
        }
    },

    editBlock: function () {

        return this.element.createElement(
            'p',
            {
                style: {
                    backgroundColor: '#900',
                    color: '#fff',
                    padding: '20px',
                }
            },
            'Hello World, step 1 (from the editor).'
        );
    },

    saveBlock: function () {

        return null;
    }
};

bfGutenberg.init();