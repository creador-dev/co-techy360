(function () {

    function bfGutenbergBlock() {

        this.element = window.wp && window.wp.element;
        this.blocks = window.wp && window.wp.blocks;
        this.prefix = 'better-studio/';
        this.props = {};
        this.attributes = {};
        //
        this.blockFields = {};
        this.shortcode = {};
    }

    bfGutenbergBlock.prototype.registerBlockType = function (shortcode, blockFields) {

        this.shortcode = shortcode;
        this.blockFields = blockFields;

        var blockID = this.shortcode.block_id || this.shortcode.id.replace(/_/g, '-');

        this.blocks.registerBlockType(this.prefix + blockID, {
            title: this.shortcode.name || this.shortcode.id,
            icon: this.blockIcon(),
            category: this.shortcode.category || 'betterstudio',
            edit: this.editBlock.bind(this),
            save: this.saveBlock.bind(this),

            attributes: this.blockAttributes(this.shortcode.id)
        });
    };

    bfGutenbergBlock.prototype.saveBlock = function () {

        return null;
    };

    bfGutenbergBlock.prototype.blockAttributes = function (blockId) {

        if (!this.blockFields) {
            return [];
        }

        var attributes = {},
            findDeep = function (field) {

                if (field.id && field.attribute) {
                    attributes[field.id] = field.attribute;
                }

                field.children && field.children.forEach(function (field2) {

                    findDeep(field2);
                });
            };

        this.blockFields.forEach(findDeep);

        return attributes;
    };

    bfGutenbergBlock.prototype.editBlock = function (props) {

        var id = props.name.replace(this.prefix, '');

        if (!id || id === props.name) {
            return [];
        }

        if(props.isSelected || !this.props.name) {
            this.props = props;
        }

        var isBlockDisabled = !this.shortcode.click_able,
            previewElement = this.element.createElement(
                this.getComponent('ServerSideRender'),
                {
                    block: props.name,
                    attributes: props.attributes,
                    key: 'D2'
                }
            );

        if (isBlockDisabled) {

            previewElement = this.element.createElement(
                this.getComponent('Disabled'),
                {
                    key: 'D1'
                },
                previewElement
            )
        }

        return [
            this.buildBlockFields(),
            previewElement
        ]
    };

    bfGutenbergBlock.prototype.buildElement = function (fields, parentField) {

        var children = [], self = this;

        fields.forEach(function (field) {

            if (field.children) {

                children.push(self.buildElement(field.children, field));

            } else if (Array.isArray(field)) {

                children.push(self.buildElement(field, parentField));

            } else {

                children.push(self.createElement(field));
            }
        });

        return self.createElement(parentField, children);
    };

    bfGutenbergBlock.prototype.createElement = function (field, childElements) {

        var params = [this.getComponent(field.component), this.componentArgs(field)].concat(
            childElements || []
        );

        return this.element.createElement.apply(this.element, params);
    };

    bfGutenbergBlock.prototype.componentArgs = function (field) {

        var args = field.args || {};

        if (field.component === 'Fragment') {
            return args;
        }
        var self = this;

        var prepareClassName = function (currentClasses, appendClass) {

            currentClasses = currentClasses || '';
            currentClasses += ' ';

            var attr = BF_Gutenberg.extraAttributes[field.id];

            if (attr && attr.enum) {

                attr.enum.forEach(function (className) {
                    currentClasses = currentClasses.replace(
                        new RegExp('\\b' + className + '\\s+', 'g'),
                        ''
                    );
                });
            } else if (appendClass === 1) {

                appendClass = field.id;

            } else if (appendClass === 0) {

                appendClass = '';
            }

            currentClasses = currentClasses.trim() + ' ' + appendClass;

            if (field.fixed_class && !currentClasses.match(new RegExp('\\b' + field.fixed_class + '\\s+', 'g'))) {

                currentClasses += ' ' + field.fixed_class;
            }

            return currentClasses;
        };

        if (!args.onChange)
            args.onChange = function (value) {

                var fieldId = field.action === 'add_class' ? 'className' : field.id;

                var attributes = {};
                attributes[fieldId] = field.action === 'add_class' ? prepareClassName(self.props.attributes[fieldId], value) : value;

                self.props.setAttributes(attributes);
            };

        var value = this.props.attributes[field.id];

        args.value = typeof value === 'undefined' ? field.std : value;

        return args;
    };

    bfGutenbergBlock.prototype.buildBlockFields = function () {

        // return this._buildFields(this.blockFields, {
        //     id: 'inspector',
        //     component: 'InspectorControls',
        //     args: {key: 'inspector'}
        // });

        return this.buildElement([
            {
                id: 'inspector',
                component: 'InspectorControls',
                args: {key: 'inspector'},
                children: [
                    {
                        id: 'bf_edit_panel',
                        component: 'BF_Edit_Panel',
                        args: {
                            type: 'edit-panel',
                        },
                        key: 'bf_edit_panel',
                        children: this.blockFields
                    }
                ]

            }
        ], {
            id: 'block_fragment',
            component: 'Fragment',
            args: {key: 'block_fragment'},
        });
    };

    bfGutenbergBlock.prototype.getComponent = function (component) {

        if (wp.editor[component]) {

            return wp.editor[component];
        }

        if (wp.components[component]) {
            return wp.components[component];
        }

        if (wp.element[component]) {
            return wp.element[component];
        }
    };

    bfGutenbergBlock.prototype.blockIcon = function () {

        if (this.shortcode.icon_url) {

            return this.element.createElement(
                'img', {src: this.shortcode.icon_url}
            )
        }

        return this.shortcode.icon || '';
    };


    var gutenbergCompatibility = {

        init: function () {

            this.registerBlocks();
            this.registerSharedFields();
        },


        registerBlocks: function () {

            if (!BF_Gutenberg || !BF_Gutenberg.blocks) {
                return;
            }

            var generator;

            for (var id in BF_Gutenberg.blocks) {

                generator = new bfGutenbergBlock();
                generator.registerBlockType(
                    BF_Gutenberg.blocks[id],
                    BF_Gutenberg.blockFields[id]
                );
            }
        },

        registerSharedFields: function () {

            if (!wp.hooks || !wp.hooks.addFilter) {
                return;
            }

            if (!wp.compose || !wp.compose.createHigherOrderComponent) {
                return;
            }

            if (!BF_Gutenberg.stickyFields) {
                return;
            }
            var generator = new bfGutenbergBlock();

            wp.hooks.addFilter('editor.BlockEdit', 'betterstudio/shared_settings', wp.compose.createHigherOrderComponent(function (BlockEdit) {


                return function (props) {


                    generator.props = props;
                    generator.attributes = props.attributes;

                    var validFields = BF_Gutenberg.stickyFields.filter(function (field) {

                        if (field.exclude_blocks && field.exclude_blocks.indexOf(props.name) > -1) {
                            return false;
                        }

                        if (field.include_blocks) {

                            return field.include_blocks.indexOf(props.name) > -1;
                        }

                        return true;
                    });

                    if (!validFields) {

                        return generator.element.createElement(
                            BlockEdit,
                            props
                        );
                    }

                    var hookedElements = generator.buildElement(validFields, {
                            id: 'inspector',
                            component: 'InspectorControls',
                            args: {key: 'inspector'}
                        }
                    );

                    return generator.element.createElement(
                        generator.getComponent('Fragment'),
                        {
                            key: 'E1'
                        },
                        hookedElements,

                        generator.element.createElement(
                            BlockEdit,
                            props
                        )
                    );
                };
            }));
        }
    };


    gutenbergCompatibility.init();
})();