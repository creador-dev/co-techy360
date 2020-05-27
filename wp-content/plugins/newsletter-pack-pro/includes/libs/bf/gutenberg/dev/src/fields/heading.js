function BF_Heading(props) {

    return (

        <div className="bf-section-container bf-clearfix">
            <div className="bf-section-heading bf-clearfix" data-id={props.id}
                 id={props.id}>
                <div className="bf-section-heading-title bf-clearfix">
                    <h3>{props.title}</h3>
                </div>
            </div>
        </div>
    )
}

module.exports = BF_Heading;
