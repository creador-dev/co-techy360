class BF_Editor extends wp.element.Component {

    constructor() {

        super(...arguments);

        this.inputField = React.createRef();
    }

    componentDidMount() {
        document.dispatchEvent(
            new Event('bf-component-did-mount')
        );

        this.inputField.current.addEventListener('input', this.onChange.bind(this), false)
    }

    componentWillUnmount() {

        this.inputField.current.removeEventListener('input', this.onChange.bind(this), false)

    }
    shouldComponentUpdate(nextProps, nextState) {

        return this.state !== nextState;
    }


    onChange() {

        if (this.props.onChange) {
            this.props.onChange(this.inputField.current.value);
        }
    }

    render() {

        return (
            <div className="bf-editor-wrapper">
                <pre className="bf-editor" data-lang={this.props.lang}
                     data-max-lines={this.props.maxLines}
                     data-min-lines={this.props.minLines}></pre>

                <textarea className="bf-editor-field"  ref={this.inputField}>{this.props.value}</textarea>
            </div>
        )
    }
}


module.exports = BF_Editor;
