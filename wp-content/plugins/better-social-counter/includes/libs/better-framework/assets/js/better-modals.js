/***
 *  BetterFramework is BetterStudio framework for themes and plugins.
 *
 *  ______      _   _             ______                                           _
 *  | ___ \    | | | |            |  ___|                                         | |
 *  | |_/ / ___| |_| |_ ___ _ __  | |_ _ __ __ _ _ __ ___   _____      _____  _ __| | __
 *  | ___ \/ _ \ __| __/ _ \ '__| |  _| '__/ _` | '_ ` _ \ / _ \ \ /\ / / _ \| '__| |/ /
 *  | |_/ /  __/ |_| ||  __/ |    | | | | | (_| | | | | | |  __/\ V  V / (_) | |  |   <
 *  \____/ \___|\__|\__\___|_|    \_| |_|  \__,_|_| |_| |_|\___| \_/\_/ \___/|_|  |_|\_\
 *
 *  Copyright © 2017 Better Studio
 *
 *
 *  Our portfolio is here: https://betterstudio.com/
 *
 *  \--> BetterStudio, 2017 <--/
 */

(function($) {

    var Better_Framework_Modals = {

        loaded: false,

        init: function() {

            var Better_Icon_Modal = $('#better-icon-modal').on('opening', function(a,b,c,d) {
                var $this = $(this),
                    zIndex = 1.5e5;

                $this.closest('.remodal-wrapper').css('z-index', zIndex+1);
                $(".remodal-overlay").css('z-index', zIndex);
            }).remodal({
                hashTracking: false,
                closeOnEscape: true
            });

            $(document).on( 'click', '.bf-icon-modal-handler', function(e){

                e.preventDefault();

                if(! Better_Icon_Modal) {
                    console.error('icons modal not found!');

                    return ;
                }

                var $field_container = $(this),
                    $input = $field_container.find( 'input.icon-input'),
                    $modal = $( '#better-icon-modal'),
                    $search_input = $modal.find('input.better-icons-search-input');

                // Summarize data
                var selected = {
                    id:     $input.attr('value'),
                    label:  $input.data('label')
                };

                $modal.find( '.icons-list .icon-select-option[data-value="' + selected.id + '"]').addClass( 'selected' );

                Better_Icon_Modal.$handler = $(this);

                icons_modal_reset_all_filters();

                Better_Icon_Modal.open();

                $search_input.focus();

            });


            $(document).on('closing', '.better-modal.icon-modal', function ( e ) {

                // No icon selected
                if( $('.better-modal.icon-modal .icons-list .icon-select-option.selected').length == 0 ){
                    return;
                }

                var $field_container = Better_Icon_Modal.$handler,
                    $selected_container = $field_container.find( '.selected-option' ),
                    $input = $field_container.find( 'input.icon-input'),
                    $input_width = $field_container.find( 'input.icon-input-width'),
                    $input_height = $field_container.find( 'input.icon-input-height'),
                    $input_type = $field_container.find( 'input.icon-input-type'),
                    $input_font_code = $field_container.find( 'input.icon-input-font-code'),
                    $selected_icon = $('.better-modal.icon-modal .icons-list .icon-select-option.selected');

                // Summarize data
                var selected = {
                    id:     $selected_icon.data('value'),
                    label:  $selected_icon.data('label'),
                    code:  $selected_icon.data('font-code'),
                    width:  '',
                    height: '',
                    type:   ''
                };

                if( $selected_icon.hasClass( 'custom-icon' ) ){
                    selected.label = 'custom ';
                    selected.width = $('.better-modal.icon-modal .icon-fields input[name="icon-width"]').val();
                    selected.height = $('.better-modal.icon-modal .custom-icon-fields .icon-fields input[name="icon-height"]').val();
                    selected.type = $selected_icon.data('type');
                    selected.id = $selected_icon.data('custom-icon');
                }else{
                    selected.type = $selected_icon.data('type');
                }

                // Update view data
                if( selected.id != '' ){

                    if( selected.type == 'custom-icon' ){
                        $selected_container.html( '<i class="bf-icon bf-custom-icon "><img src="' + selected.id + '"></i> ' + better_framework_loc.translation.icon_modal.custom_icon );
                    }else{
                        $selected_container.html( '<i class="bf-icon fa ' + selected.id + '"></i>' + selected.label );
                    }
                }else{
                    $selected_container.html( selected.label );
                }

                var input;
                // Update field data
                $input.attr( 'label', selected.label );

                input = $input_width.val( selected.width ).change()[0];
                input && input.dispatchEvent(new Event('input'));

                input = $input_height.val( selected.height ).change()[0];
                input && input.dispatchEvent(new Event('input'));

                input = $input_type.val( selected.type ).change()[0];
                input && input.dispatchEvent(new Event('input'));

                input = $input_font_code.val(selected.code).change()[0];
                input && input.dispatchEvent(new Event('input'));

                input = $input.val( selected.id ).change()[0];
                input && input.dispatchEvent(new Event('input'));


                custom_icon_hide();
                $(this).find('.icon-select-option.selected').removeClass('selected');

            });

            $(document).on('click', '.better-modal.icon-modal .icons-list .icon-select-option', function () {

                $('.better-modal.icon-modal  .icons-list').find('.icon-select-option.selected').removeClass('selected');

                if( $(this).hasClass( 'custom-icon' ) ){

                    var $this = $(this),
                        $modal = $('#better-icon-modal');

                    $modal.find('.custom-icon-fields .icon-preview').attr( 'src', $this.data('custom-icon')).css({
                        'max-width': $this.data('width') + 'px',
                        'max-height': 'auto'
                    });

                    $modal.find('.icon-fields input[name="icon-width"]').val( $this.data('width') );
                    $modal.find('.icon-fields input[name="icon-height"]').val( '' );

                    $(this).toggleClass('selected');

                    custom_icon_show();

                }else{
                    $(this).toggleClass('selected');
                    Better_Icon_Modal.close();
                }
            });

            $(document).on('click', '.better-modal.icon-modal .icons-list .icon-select-option .delete-icon', function ( e ) {
                e.stopPropagation();
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: better_framework_loc.bf_ajax_url,
                    data:{
                        action   : 'bf_ajax',
                        reqID    : 'remove_custom_icon',
                        nonce    : better_framework_loc.nonce,
                        icon   	 :  $(this).closest('.icon-select-option').data('id')
                    }
                });

                $(this).closest('.icon-select-option').remove();

                if( $( '.better-modal.icon-modal .icons-list.custom-icons-list .icon-select-option').length == 0 ){
                    $( '.better-modal.icon-modal .no-custom-icon').removeClass('hidden');
                }else{
                    $( '.better-modal.icon-modal .no-custom-icon').addClass('hidden');
                }

            });

            $(document).on('click', '.better-modal.icon-modal .upload-custom-icon-container .section-footer .bf-button', function () {
                Better_Icon_Modal.close();
            });

            $('.better-modal.icon-modal .icons-container').mCustomScrollbar({
                theme: 'dark',
                live: true,
                scrollInertia: 2000
            });

            // Category Filter
            $(document).on('click', '.better-icons-category-list .icon-category' ,function(){

                var $this = $(this),
                    $modal = $( '#better-icon-modal'),
                    $options_list = $modal.find('.icons-list'),
                    $search_input = $modal.find('input.better-icons-search-input');

                if( $this.hasClass('selected') ){
                    return;
                }

                // clear search input
                $search_input.val('').parent().removeClass('show-clean').find('.clean').addClass('fa-search').removeClass('fa-times-circle');

                $modal.find('.better-icons-category-list li.selected').removeClass('selected');

                $this.addClass('selected');

                if( $this.attr('id') === 'cat-all' ){

                    $options_list.find('li').show();

                }else{

                    $options_list.find('li').each(function(){

                        if($(this).hasClass('default-option'))
                            return true;

                        var _cats = $(this).data('categories').split(' ');

                        if( _cats.indexOf($this.attr('id')) < 0){
                            $(this).hide();
                        }else{
                            $(this).show();
                        }

                    });

                }
                return false;

            });


            // Search
            $(document).on( 'keyup', '#better-icon-modal .better-icons-search-input' ,function(){

                if( $(this).val() != '' ){
                    $(this).parent().addClass('show-clean').find('.clean').removeClass('fa-search').addClass('fa-times-circle');
                }else{
                    $(this).parent().removeClass('show-clean').find('.clean').addClass('fa-search').removeClass('fa-times-circle');
                }

                icons_modal_reset_cats_filter();

                icons_modal_text_filter( $(this).val() );

                return false;

            });


            $(document).on('click', '#better-icon-modal .better-icons-search .clean' ,function() {

                var $modal = $( '#better-icon-modal'),
                    $search_input = $modal.find('input.better-icons-search-input');

                icons_modal_text_filter( '' );

                $search_input.val('').parent().removeClass('show-clean').find('.clean').addClass('fa-search').removeClass('fa-times-circle');

            });

            $(document).on( 'click', '.better-modal.icon-modal .upload-custom-icon' ,function() {
                var _this = $(this);

                var custom_uploader;

                var media_title = _this.data('media-title');
                var media_button_text = _this.data('button-text');

                if( custom_uploader ){
                    custom_uploader.open();
                    return;
                }

                custom_uploader = wp.media.frames.file_frame = wp.media({
                    title: media_title,
                    button: {
                        text: media_button_text
                    },
                    multiple: false//,
                    //library: { type : 'image'}
                });

                custom_uploader.on('select', function() {

                    var attachment = custom_uploader.state().get('selection').first().toJSON();

                    var icon = {
                        'type': 'custom-icon',
                        'icon': attachment.url,
                        'width': attachment.width,
                        'height': attachment.height
                    };

                    custom_icon_show_loading();

                    var $modal = $('#better-icon-modal');

                    $modal.find('.better-icons-category-list li.selected').removeClass('selected');

                    $modal.find('.custom-icon-fields .icon-preview').attr( 'src', icon.icon).css({
                        'max-width': icon.width  + 'px',
                        'max-height': 'auto'
                    });

                    $modal.find('.icon-fields input[name="icon-width"]').val( icon.width );
                    $modal.find('.icon-fields input[name="icon-height"]').val( '' );

                    $modal.find('.icons-list.custom-icons-list').append( '<li data-id="icon-" class="icon-select-option custom-icon selected" data-custom-icon="' + icon.icon + '" data-width="' + icon.width + '" data-height="' + icon.height + '" data-type="custom-icon"> \
                <i class="bf-custom-icon"><img src="' + icon.icon + '"></i><i class="fa fa-close delete-icon"></i></li>' );

                    custom_icon_show();

                    $.ajax({
                        type: 'POST',
                        dataType: 'json',
                        url: better_framework_loc.bf_ajax_url,
                        data:{
                            action   : 'bf_ajax',
                            reqID    : 'add_custom_icon',
                            nonce    : better_framework_loc.nonce,
                            icon   	 : icon
                        }
                    });
                });

                custom_uploader.open();

                if( $( '.better-modal.icon-modal .icons-list.custom-icons-list .icon-select-option').length == 0 ){
                    $( '.better-modal.icon-modal .no-custom-icon').removeClass('hidden');
                }else{
                    $( '.better-modal.icon-modal .no-custom-icon').addClass('hidden');
                }

                return false;
            });


            $(document).on( 'click', '.better-modal.icon-modal .upload-custom-icon-container .close-custom-icon' ,function() {
                custom_icon_hide();
            });

            $(document).on( 'keyup', '.better-modal.icon-modal .upload-custom-icon-container .custom-icon-fields .icon-fields input[name="icon-width"]' ,function() {
                $('.better-modal.icon-modal .custom-icon-fields .icon-preview').css({
                    'max-width': $(this).val() + 'px'
                });
            });

            $(document).on( 'keyup', '.better-modal.icon-modal .upload-custom-icon-container .custom-icon-fields .icon-fields input[name="icon-height"]' ,function() {
                $('.better-modal.icon-modal .custom-icon-fields .icon-preview').css({
                    'max-height': $(this).val() + 'px'
                });
            });


            function custom_icon_show_loading(){
                $( '#better-icon-modal .upload-custom-icon-container').addClass('show show-loading');
            }

            function custom_icon_hide_loading(){
                $( '#better-icon-modal .upload-custom-icon-container').addClass('show').removeClass('show-loading');
            }

            function custom_icon_hide(){
                $( '#better-icon-modal .upload-custom-icon-container').removeClass('show show-loading');
                $( '#better-icon-modal .better-icons-search').removeClass('hidden');
            }

            function custom_icon_show(){
                $( '#better-icon-modal .upload-custom-icon-container').addClass('show').removeClass('show-loading');
                $( '#better-icon-modal .better-icons-search').addClass('hidden');
            }


            // Used for clearing all filters
            function icons_modal_reset_all_filters(){

                var $modal = $( '#better-icon-modal'),
                    $search_input = $modal.find('input.better-icons-search-input');

                $search_input.val('').parent().removeClass('show-clean').find('.clean').addClass('fa-search').removeClass('fa-times-circle');

                icons_modal_text_filter( '' );

                icons_modal_reset_cats_filter();
            }


            // Used for clearing just category filter
            function icons_modal_reset_cats_filter(){

                var $modal = $( '#better-icon-modal'),
                    $options_list = $modal.find('.icons-list');

                $options_list.find('.icon-select-option').show();

                $modal.find('.better-icons-category-list li').removeClass('selected');
                $modal.find('.better-icons-category-list li#cat-all').addClass('selected');
            }


            // filters element with one text
            function icons_modal_text_filter( $search_text ){

                var $modal = $( '#better-icon-modal'),
                    $options_list = $modal.find('.icons-list');

                if( $search_text ){
                    $options_list.find(".label:not(:Contains(" + $search_text + "))").parent().hide();
                    $options_list.find(".label:Contains(" + $search_text + ")").parent().show();
                } else {
                    $options_list.find("li").show();
                }

            }


            this.loaded = true;
        }
    }
// load when ready
    $(function(){

        Better_Framework_Modals.init();
    });


    $(window).load(function() {

        if(! Better_Framework_Modals.loaded) {

            Better_Framework_Modals.init();
        }
    });

})(jQuery);

// res : http://stackoverflow.com/questions/1766299/make-search-input-to-filter-through-list-jquery
// custom css expression for a case-insensitive contains()
(function($) {
    jQuery.expr[':'].Contains = function(a,i,m){
        return (a.textContent || a.innerText || "").toUpperCase().indexOf(m[3].toUpperCase())>=0;
    };
})(jQuery);
