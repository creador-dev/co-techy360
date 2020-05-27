function BF_Ajax_action(props) {

    return (
        <div className="bf-ajax_action-field-container">

            <a className="bf-action-button bf-button bf-main-button"
               data-callback={props.callback} data-event={props.event}
               data-token={props.token} data-confirm={props.confirm}
               dangerouslySetInnerHTML={{__html: props.buttonName}}>
            </a>
        </div>

    )
}

module.exports = BF_Ajax_action;
