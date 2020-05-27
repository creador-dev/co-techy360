/**
 * todo: add support for type param
 */
class BF_Background_Image extends wp.element.Component {

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
            this.props.onChange({type: '', img: this.inputField.current.value});
        }
    }

    render() {

        let props = this.props;

        let imageUrl = '';

        if (props.value && props.value.img) {
            imageUrl = props.value.img;
        }

        return (

            <div className="bf-background-image-field">

                <a href="#" className="bf-button bf-main-button bf-background-image-upload-btn"
                   data-mediatitle={props.mediaTitle} buttontext={props.buttonText}
                ><i className="fa fa-upload"></i> {props.uploadLabel}</a>

                <a href="#" className="bf-button bf-background-image-remove-btn"

                ><i className="fa fa-remove"></i> {props.removeLabel}</a>


                <input type="hidden" className={"bf-background-image-input " + props.inputClass}
                       value={imageUrl} ref={this.inputField}/>

                <div className="bf-background-image-preview">
                    <img src={imageUrl}/>
                </div>
            </div>
        )
    }
}


module.exports = BF_Background_Image;
