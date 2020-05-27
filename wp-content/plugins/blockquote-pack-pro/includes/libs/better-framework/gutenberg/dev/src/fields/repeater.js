class BF_Repeater extends wp.element.Component {

    constructor(props) {

        super(...arguments);

        let items = [];

        if (props.value && Array.isArray(props.value)) {
            items = props.value;
        }

        this.state = {items};
    }

    shouldComponentUpdate(nextProps, nextState) {

        return this.state !== nextState;
    }

    appendItem() {

        let items = this.state.items.concat([this.props.defaultParams]);

        this.setState({items});
    }

    itemChanged(value) {

        let items = JSON.parse(JSON.stringify(this.repeater.state.items));

        if (!items[this.i]) {
            items[this.i] = {};
        }

        items[this.i][this.id] = value;

        this.repeater.setState({items});

        this.repeater.onChange(items);
    }

    onChange(items) {

        this.props.onChange && this.props.onChange(items||this.state.items);
    }

    prepareChildrenElements(elements, elementsValue, i) {

        return elements.map((element) => {

            let id = element.props.id,
                value = elementsValue && elementsValue[id] ? elementsValue[id] : '';

            let key = id + "__" + i;

            let props = {
                value,
                key,
                i,
                id,
                onChange: this.itemChanged.bind({repeater: this, id, i})
            };

            if (element.props.children) {

                props.children = this.prepareChildrenElements(Array.isArray(element.props.children) ? element.props.children : [element.props.children], elementsValue, i);
            }

            return React.cloneElement(element, props);
        });
    }

    render() {

        let items = this.state.items.map((values, i) => {

            let children = this.prepareChildrenElements(this.props.children, values, i);

            return (
                <div className="bf-repeater-item" key={i}>
                    {children}
                </div>
            )
        });

        return (

            <div className="bf-controls bf-nonrepeater-controls bf-controls-repeater-option no-desc bf-clearfix">
                <div className="bf-repeater-items-container bf-clearfix">
                    {items}
                </div>
                <button className="bf-clone-repeater-item bf-button bf-main-button"
                        onClick={this.appendItem.bind(this)}
                        dangerouslySetInnerHTML={{__html: this.props.addLabel}}>
                </button>
            </div>
        )
    }
}

module.exports = BF_Repeater;
