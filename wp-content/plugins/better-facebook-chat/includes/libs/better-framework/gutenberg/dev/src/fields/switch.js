class BF_Switch extends wp.element.Component {

    constructor() {

        super(...arguments);

        this.inputField = React.createRef();

    }

    componentDidMount() {

        this.inputField.current.addEventListener('input', this.onChange.bind(this), false)
    }

    componentWillUnmount() {

        this.inputField.current.removeEventListener('input', this.onChange.bind(this), false)

    }

    onChange() {

        if (this.props.onChange) {

            this.props.onChange(parseInt(this.inputField.current.value));
        }
    }

    render() {

        let checked = !!parseInt(this.props.value);

        return (

            <div className="bf-switch bf-clearfix">
                <label
                    className={"cb-enable" + (checked ? ' selected' : '')}><span>{this.props.onLabel}</span></label>
                <label
                    className={"cb-disable" + (checked ? '' : ' selected')}><span>{this.props.offLabel}</span></label>

                <input type="hidden" value="0" className="checkbox" ref={this.inputField}/>
            </div>
        )
    }
}

module.exports = BF_Switch;
