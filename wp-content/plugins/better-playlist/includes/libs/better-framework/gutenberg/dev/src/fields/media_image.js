class BF_Media_Image extends wp.element.Component {

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

        var img = this.props.value;
        
        return (

            <div className="bf-media-image-field">

                <a href="#"
                   className={'bf-button bf-main-button bf-media-image-upload-btn' + (this.props.dataType === 'id' ? 'bf-media-type-id' : '')}
                   data-media-title={this.props.mediaTitle} data-button-text={this.props.mediaButton}
                   data-size={this.props.size}

                ><i className="fa fa-upload"></i> {this.props.uploadLabel}</a>

                <a href="#"
                   className="bf-button bf-media-image-remove-btn"
                   style={{display: img ? 'inline' : 'none'}}
                ><i
                    className="fa fa-remove"></i> {this.props.removeLabel}</a>

                <input type={this.props.showInput ? "text" : "hidden"} className="bf-media-image-input ltr" ref={this.inputField}/>

                <div className="bf-media-image-preview" style={{display: img ? 'block' : 'none'}}>
                    <img src={img}/>
                </div>
            </div>
        )
    }
}


module.exports = BF_Media_Image;
