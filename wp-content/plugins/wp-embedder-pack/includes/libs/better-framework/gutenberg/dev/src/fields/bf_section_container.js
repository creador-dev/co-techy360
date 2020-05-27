class BF_Section_Container extends wp.element.Component {

    componentDidMount() {

        document.dispatchEvent(
            new CustomEvent('bf-component-did-mount', {detail: ReactDOM.findDOMNode(this),})
        );
    }

    render() {

        let noHeadingClass = this.props.label.trim() === '' ? ' bf-no-heading' : '';

        let classes = this.props.classes ? this.props.classes : '';

        return (

            <div className={"bf-section-container bf-gutenberg bf-clearfix " + classes}
                 data-param-name={this.props.name}
                 data-param-settings={this.props.show_on ? JSON.stringify(this.props.show_on) : ''}
            >
                <div
                    className={'bf-section bf-clearfix bf-section-' + this.props.type + noHeadingClass}
                    data-id={this.props.name}>

                    <div className={'bf-heading bf-clearfix bf-heading-' + this.props.type}>
                        <h3><label>{this.props.label}</label></h3>
                    </div>

                    <div className="bf-controls bf-clearfix">
                        {this.props.children}
                    </div>

                    <div className="bf-explain bf-nonrepeater-explain bf-clearfix"
                         dangerouslySetInnerHTML={{__html: this.props.description}}>
                    </div>

                </div>
            </div>
        )
    }
}


module.exports = BF_Section_Container;
