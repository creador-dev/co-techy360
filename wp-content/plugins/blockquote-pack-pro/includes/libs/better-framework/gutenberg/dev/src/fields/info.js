function BF_Info(props) {

    let icons = {
        help: 'fa fa-support',
        info: 'fa fa-info ',
        warning: 'fa fa-warning',
        danger: 'fa fa-exclamation',
        _default: 'fa fa-info',
    };

    return (

        <div className="bf-section-container bf-clearfix">
            <div
                className={"bf-section-info bf-clearfix " + props.level + " " + props.state}>
                <div className="bf-section-info-title bf-clearfix">
                    <h3>
                        <i className={icons[props.level] || icons._default}></i>
                        {props.title}
                    </h3>
                </div>
                <div className="bf-controls-info-option bf-clearfix" dangerouslySetInnerHTML={{__html: props.note}}>
                </div>
            </div>
        </div>
    )
}

module.exports = BF_Info;
