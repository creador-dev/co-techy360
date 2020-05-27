function BF_Code(params) {

    return (

        <textarea className="bf-code-editor"
                  data-lang={params.lang} data-line-numbers={params.lineNumber}
                  data-auto-close-brackets={params.autoCloseBrackets}
                  data-auto-close-tags={params.autoCloseTags}
                  placeholder={params.placeholder}
        >{params.value}</textarea>
    )
}


module.exports = BF_Code;
