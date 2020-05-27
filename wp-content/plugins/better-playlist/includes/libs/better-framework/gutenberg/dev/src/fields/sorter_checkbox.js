class BF_Sorter_Checkbox extends wp.element.Component {

    constructor(props) {

        super(...arguments);

        let items = {};

        if (props.value && Array.isArray(props.value)) {
            items = props.value;
        }

        this.state = {items};

        this.onChange = this.onChange.bind(this);
    }

    componentDidMount() {

        document.dispatchEvent(
            new Event('bf-component-did-mount')
        );
    }

    shouldComponentUpdate(nextProps, nextState) {

        return this.state !== nextState || this.props !== nextProps;
    }

    collectValues() {

        let values = {};

        [...ReactDOM.findDOMNode(this).getElementsByClassName('sorter-checkbox-value')].forEach(function (e) {

            values[e.name] = e.checked ? '1' : '0';
        });

        return values;
    }

    onChange() {

        let inputValues = this.collectValues();

        if (inputValues !== this.state.items) {
            this.setState({items: inputValues})
        }

        if (this.props.onChange) {
            this.props.onChange(inputValues);
        }
    }

    render() {

        let values = this.state.items;

        let li = item => {

            let extraClass = item.cssClass ? item.cssClass : '';
            let activeClass = values[item.id] ? '' : 'checked-item';

            return (
                <li id={'bf-sorter-group-item-' + this.props.id + '-' + item.id} key={item.id}
                    className={extraClass + ' ' + 'item-' + this.props.id + ' ' + activeClass}
                >

                    <label>
                        <input value="1" type="checkbox"
                               defaultChecked={!!values[item.id]}
                               onChange={this.onChange} name={item.id}
                               className="sorter-checkbox-value"/>
                        <p dangerouslySetInnerHTML={{__html: item.label}}></p>
                    </label>

                </li>
            )
        };

        let displayedItems = [];

        let activeAndSelectedItems = this.props.items.filter((item) => {

            let visible = values[item.id] !== -1 && item.cssClass.indexOf('active-item') !== -1;

            if (visible) {
                displayedItems.push(item.id);
            }

            return visible;
        });

        let activeAndDeSelectedItems = this.props.items.filter((item) => {

            let visible = values[item.id] === -1 && item.cssClass.indexOf('active-item') !== -1;

            if (visible) {
                displayedItems.push(item.id);
            }

            return visible;
        });

        let disabledItems = this.props.items.filter((item) => {

            return displayedItems.indexOf(item.id) === -1;
        });


        return (
            <div className="bf-sorter-groups-container">

                <ul id={"bf-sorter-group-" + this.props.id} className={'bf-sorter-list bf-sorter-' + this.props.id}>

                    {
                        activeAndSelectedItems.map(li)
                    }

                    <li key="x2">activeAndDeSelectedItems</li>

                    {
                        activeAndDeSelectedItems.map(li)
                    }

                    {
                        disabledItems.map(li)
                    }
                </ul>
            </div>
        )
    }
}

module.exports = BF_Sorter_Checkbox;
