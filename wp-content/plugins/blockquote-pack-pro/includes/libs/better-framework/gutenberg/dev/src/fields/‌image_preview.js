function BF_Image_Preview(params) {

    let images = params.urls.map(function (url, k) {

        return <img src={url} className={'image' + k} key={k}/>
    });

    return (

        <div className="info-value"
             style={{textAlign: params.align}}>
            {images}
        </div>
    )
}

module.exports = BF_Image_Preview;
