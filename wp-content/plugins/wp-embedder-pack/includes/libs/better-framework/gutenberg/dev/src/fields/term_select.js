class BF_Switch extends wp.element.Component {

    constructor() {

        super(...arguments);

        this.inputField = React.createRef();

    }

    componentDidMount() {

        this.inputField.current.addEventListener('input', this.onChange.bind(this), false)


        /// ReactDOM.findDOMNode(this),
        document.dispatchEvent(
            new CustomEvent('bf-component-did-mount', {detail: ReactDOM.findDOMNode(this),})
        );
    }

    componentWillUnmount() {

        this.inputField.current.removeEventListener('input', this.onChange.bind(this), false)
    }

    onChange() {

        this.props.onChange
        &&
        this.props.onChange(this.inputField.current.value);
    }

    render() {

        return (

            <div className="bf-term-select-field">
                <div className="bf-field-term-select-wrapper bf-field-term-select-deferred loading"
                     data-taxonomy={this.props.taxonomy}>
                    Loading...
                </div>

                <div className="bf-field-term-select-help">
                    <label>{this.props.labels.help}</label>

                    <div className="bf-checkbox-multi-state disabled none-state">
                        <span data-state="none"></span>
                    </div>
                    <label>{this.props.labels.not_selected}</label>

                    <div className="bf-checkbox-multi-state disabled active-state">
                        <span className="bf-checkbox-active">
                            <i className="fa fa-check" aria-hidden="true"></i>
                        </span>
                    </div>
                    <label>{this.props.labels.selected}</label>

                    <div className="bf-checkbox-multi-state disabled deactivate-state">
                        <span className="bf-checkbox-active">
                           <i className="fa fa-times" aria-hidden="true"></i>
                        </span>
                    </div>

                    <label>{this.props.labels.excluded}</label>
                </div>

                <input type="hidden" value={this.props.value} ref={this.inputField}
                       className="bf-term-select-value"/>
            </div>
        )
    }
}

module.exports = BF_Switch;
