class BF_Select_Popup extends wp.element.Component {

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

    shouldComponentUpdate() {

        return false;
    }


    onChange() {
        //
        if (this.props.onChange) {
            this.props.onChange(this.inputField.current.value);
        }
    }

    render() {

        let labels = this.props.data.texts,
            currentImage = '',
            currentLabel = labels.default_text;

        if (this.props.data && this.props.data.options) {

            let opt = this.props.data.options[this.props.value] ?
                this.props.data.options[this.props.value] : this.props.data.options.default;

            if (opt) {
                currentImage = opt.current_img ? opt.current_img : opt.img;
                currentLabel = opt.label;
            }
        }


        return (

            <div className="select-popup-field bf-clearfix">
                <div className="select-popup-selected-image">
                    <img src={currentImage} alt={this.props.value}/>
                </div>
                <div className="select-popup-selected-info">
                    <div className="active-item-text">
                        {labels.box_pre_title}
                    </div>
                    <div className="active-item-label">{currentLabel}</div>

                    <a href="#" className="button">
                        {labels.box_button}
                    </a>
                </div>

                <script type="application/json" className="select-popup-data">{JSON.stringify(this.props.data)}</script>

                <input type="hidden" name={this.props.id} value={this.props.value} className="select-value"
                       ref={this.inputField}/>
            </div>
        )
    }
}


module.exports = BF_Select_Popup;
