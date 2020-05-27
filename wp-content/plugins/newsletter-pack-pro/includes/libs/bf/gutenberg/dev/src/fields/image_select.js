 class BF_Image_Select extends wp.element.Component {


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

    shouldComponentUpdate(nextProps, nextState) {

        // check

        return this.state !== nextState;
    }


    onChange() {

        if (this.props.onChange) {
            // this.props.onChange(this.inputField.current.value);
        }
    }

    render() {

        let currentValue = '0',
            currentLabel = '#label#';

        let items = this.props.options.map(function (option) {

            let currentClass = currentValue === option.id ? 'selected' : '';

            return (
                <li data-value={option.id} data-label={option.label} className={'image-select-option ' + currentClass} key={option.id}>
                    <img src={option.img} alt={option.label}/>
                    <p>{option.label}</p>
                </li>
            )
        });


        return (
            <div className="better-select-image">

                <div className="select-options">
                    <span className="selected-option">{currentLabel}</span>

                    <div className="better-select-image-options">
                        <ul className={'options-list bf-clearfix' + this.props.listStyle}>
                            {items}
                        </ul>
                    </div>
                </div>

                <input type="hidden" value={currentValue} ref={this.inputField}/>
            </div>
        )
    }
}

module.exports = BF_Image_Select;
