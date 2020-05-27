class BF_Edit_Panel extends wp.element.Component {


    componentDidMount() {

        document.dispatchEvent(
            new CustomEvent('bf-edit-gutenberg-block', {detail: ReactDOM.findDOMNode(this),})
        );
    }

    render() {

        return (
            <div className="bf-edit-gutenberg-block">
                {this.props.children}
            </div>
        );
    }
}


module.exports = BF_Edit_Panel;
