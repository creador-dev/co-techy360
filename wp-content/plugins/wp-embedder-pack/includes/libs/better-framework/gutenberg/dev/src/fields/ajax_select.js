class BF_Ajax_Select extends wp.element.Component {

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
            this.props.onChange(this.inputField.current.value);
        }
    }

    render() {
        
        let LiValues = this.props.values ? this.props.values.map(function(v) {

            return (
                <li id={v.id}>
                    {v.name}
                    <i className="del fa fa-remove"></i>
                </li>
            )
        }) : [];

        let inputValue = '';

        return (
            <div className="bf-ajax_select-field-container">
                <input type="text" className="bf-ajax-suggest-input" placeholder={this.props.placeholder}/>

                <span className="bf-search-loader">
                    <i className="fa fa-search"></i>
                </span>

                <input type="hidden" name={this.props.inputName}
                       ref={this.inputField}
                       value={inputValue} className={this.props.inputClass}
                       data-callback={this.props.callback} data-token={this.props.token}
                />

                <ul className="bf-ajax-suggest-search-results"></ul>

                <ul className="bf-ajax-suggest-controls">
                    {LiValues}
                </ul>
            </div>
        )
    }
}


module.exports = BF_Ajax_Select;
