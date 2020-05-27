function BF_Slider(props) {

    return (
        <div className="bf-slider-field">
            <div className="bf-slider-slider"
                 data-dimension =       {props.dimension} data-animation={props.animation} data-step={props.step}
                 data-val={props.value} data-min={props.min} data-max={props.max}
            ></div>
            <input type="hidden" className="bf-slider-input" value="0"/>
        </div>
    )
}

module.exports = BF_Slider;
