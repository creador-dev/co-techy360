class BF_Image_Radio extends wp.element.Component {


    constructor() {

        super(...arguments);

        this.inputField = React.createRef();

        this.state = {
            active: this.props.value
        }
    }

    componentDidMount() {

        this.inputField.current.addEventListener('input', this.onChange.bind(this), false)
    }

    componentWillUnmount() {

        this.inputField.current.removeEventListener('input', this.onChange.bind(this), false)

    }

    shouldComponentUpdate(nextProps, nextState) {

        // check

        return this.state !== nextState;
    }


    onChange() {

        console.log("#CHANGE");

        let active = this.inputField.current.value;

        if (this.props.onChange) {
            this.props.onChange(active);
        }


        this.setState({active});

    }

    render() {

        let activeValue = this.state.active;

        let options = this.props.options ? this.props.options : [];

        let onChange = this.onChange.bind(this);

        return (
            <div className="image-radio-field">
                {options.map((item, i) => {

                    let key = item.id || i;

                    return (
                        <div className="bf-image-radio-option" key={key}>

                            <label>

                                <input type="radio" onChange={onChange} value={key}
                                       defaultChecked={activeValue === key}/>

                            </label>

                            <img src={item.img} alt={item.label}/>

                            <p className="item-label">
                                {item.label}
                            </p>
                        </div>
                    )
                })}

                <input type="hidden" value={activeValue} ref={this.inputField} className="image-radio-value"/>
            </div>
        )
    }
}

module.exports = BF_Image_Radio;
