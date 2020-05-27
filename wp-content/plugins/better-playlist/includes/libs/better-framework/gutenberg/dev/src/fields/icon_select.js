class BF_Icon_Select extends wp.element.Component {

    constructor() {

        super(...arguments);

        this.inputs = {
            icon: React.createRef(),
            height: React.createRef(),
            width: React.createRef(),
            code: React.createRef(),
        };
    }

    componentDidMount() {

        this.inputs.icon.current.addEventListener('input', this.onChange.bind(this), false)
    }

    componentWillUnmount() {

        this.inputs.icon.current.removeEventListener('input', this.onChange.bind(this), false)

    }

    shouldComponentUpdate(nextProps, nextState) {

        // check
        return this.state !== nextState;
    }

    iconType(icon) {

        if(! icon) {
            return '';
        }

        if (icon.substr(0, 3) == 'fa-') {
            return 'fontawesome';
        } // BetterStudio Font Icon
        else if (icon.substr(0, 5) == 'bsfi-' || icon.substr(0, 5) == 'bsai-') {

            return 'bs-icons';
        } // Dashicon
        else if (icon.substr(0, 10) == 'dashicons-') {
            return 'Dashicon';
        }

        return 'custom-icon';
    }

    iconTag(icon) {

        if(! icon) {
            return '';
        }

        icon = icon.toString();

        if (icon.substr(0, 3) == 'fa-') {
            return '<i class="bf-icon fa ' + icon + '"></i>';
        } // BetterStudio Font Icon
        else if (icon.substr(0, 5) == 'bsfi-') {

            return '<i class="bf-icon ' + icon + '"></i>';
        } // Dashicon
        else if (icon.substr(0, 10) == 'dashicons-') {
            return '<i class="bf-icon dashicons dashicons-' + icon + '"></i>';
        } // Better Studio Admin Icon
        else if (icon.substr(0, 5) == 'bsai-') {
            return '<i class="bf-icon ' + icon + '"></i>';
        } // Custom Icon -> as URL


        if (icon)
            return '<i class="bf-icon bf-custom-icon bf-custom-icon-url"><img src="' + icon + '"></i>';

        return '';
    }

    onChange() {

        this.props.onChange
        &&
        this.props.onChange({

            font_code: this.inputs.code.current.value,
            icon: this.inputs.icon.current.value,
            type: this.iconType(this.inputs.icon.current.value),
            height: this.inputs.height.current.value,
            width: this.inputs.width.current.value
        });
    }


    render() {

        let value = this.props.value;

        return (

            <div className="bf-icon-modal-handler">

                <div className="select-options">
                    <span className="selected-option"
                          dangerouslySetInnerHTML={{__html: this.iconTag(value && value.icon)}}>
                    </span>
                </div>

                <input type="hidden" className="icon-input" ref={this.inputs.icon} value={value && value.icon}/>
                <input type="hidden" className="icon-input-font-code" ref={this.inputs.code}
                       value={value && value.font_code}/>

                <input type="hidden" className="icon-input-height" ref={this.inputs.height}
                       value={value && value.height}/>
                <input type="hidden" className="icon-input-width" ref={this.inputs.width} value={value && value.width}/>
            </div>
        )
    }
}


module.exports = BF_Icon_Select;
