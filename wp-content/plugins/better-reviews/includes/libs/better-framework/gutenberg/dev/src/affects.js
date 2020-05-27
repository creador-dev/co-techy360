

jQuery(document).on('change', ".affect-block-align-on-change :input", function () {

    $("#editor").find('.editor-block-list__block.is-selected').attr('data-align', this.value);
});