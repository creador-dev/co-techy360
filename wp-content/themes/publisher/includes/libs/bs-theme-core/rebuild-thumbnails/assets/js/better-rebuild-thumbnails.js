/***
 *  BetterStudio Themes Core.
 *
 *  ______  _____   _____ _                           _____
 *  | ___ \/  ___| |_   _| |                         /  __ \
 *  | |_/ /\ `--.    | | | |__   ___ _ __ ___   ___  | /  \/ ___  _ __ ___
 *  | ___ \ `--. \   | | | '_ \ / _ \ '_ ` _ \ / _ \ | |    / _ \| '__/ _ \
 *  | |_/ //\__/ /   | | | | | |  __/ | | | | |  __/ | \__/\ (_) | | |  __/
 *  \____/ \____/    \_/ |_| |_|\___|_| |_| |_|\___|  \____/\___/|_|  \___|
 *
 *  Copyright © 2017 Better Studio
 *
 *
 *  Our portfolio is here: https://betterstudio.com/
 *
 *  \--> BetterStudio, 2017 <--/
 */
var Better_Rebuild_Thumbnails = (function($) {
    "use strict";

    var step = 0;

    var current_step = 0;

    var imagesList;

    return {

        init: function(){

            $('.show-rebuild-log').click(function() {
                $(this).slideToggle(100).siblings('.rebuild-log').slideToggle(400);
            });


            $('.better-rebuild-all-thumbnails').click(function() {

                // Rebuilding
                if( $(this).hasClass('rebuilding') || $(this).hasClass('loading') || $(this).hasClass('error') ){
                    return false;
                }

                // Confirm regeneration
                if( ! confirm( better_rebuild_thumbnails_loc.text_confirm ) )
                    return;

                // Prepare loading
                jQuery(".better-rebuild-all-thumbnails").html(better_rebuild_thumbnails_loc.text_loading).addClass('loading');
                jQuery(".thumbnails-rebuild-wrapper .pre-desc").addClass('loading');

                // Only featured images
                var only_featured =jQuery("#only_featured").prop('checked') ? 1 : 0;

                jQuery.ajax({
                    url: better_rebuild_thumbnails_loc.ajax_url,
                    type: "POST",
                    data: {
                        action:             'BRT_get_thumbnails_list',
                        only_featured:      only_featured
                    },
                    success: function( result ){

                        // Save images list
                        Better_Rebuild_Thumbnails.imagesList = eval( result );

                        if( ! Better_Rebuild_Thumbnails.imagesList ){
                            jQuery(".better-rebuild-all-thumbnails").addClass('error').html(better_rebuild_thumbnails_loc.text_no_image);
                            return;
                        }

                        jQuery(".thumbnails-rebuild-wrapper .pre-desc").removeClass('loading').addClass('rebuilding').html('<img src="">');
                        jQuery(".better-rebuild-all-thumbnails").addClass('rebuilding').removeClass('loading').html(better_rebuild_thumbnails_loc.text_loader);
                        jQuery(".rebuild-log-container").addClass('rebuilding');

                        Better_Rebuild_Thumbnails.step = 100 / Better_Rebuild_Thumbnails.imagesList.length;

                        Better_Rebuild_Thumbnails.current_step = -1;

                        Better_Rebuild_Thumbnails.plus_loader();

                        Better_Rebuild_Thumbnails.rebuild_next_image();

                   },
                   error: function(request, status, error) {
                       jQuery(".better-rebuild-all-thumbnails").addClass('error').html(better_rebuild_thumbnails_loc.text_no_image);

                   }
               });


            });

        },


        rebuild_next_image: function(){

            // If Finished
            if( Better_Rebuild_Thumbnails.current_step >= Better_Rebuild_Thumbnails.imagesList.length ){
                jQuery(".better-rebuild-all-thumbnails").addClass('completed');
                jQuery(".thumbnails-rebuild-wrapper .pre-desc").addClass('completed');
                jQuery(".rebuild-log-container").slideDown('400');
                jQuery(".better-rebuild-all-thumbnails .loader").css('width', '100%').html(better_rebuild_thumbnails_loc.text_done);
                return;
            }

            jQuery.ajax({
                url: better_rebuild_thumbnails_loc.ajax_url,
                type: "POST",
                data: {
                    action:     'BRT_rebuild_image',
                    id:         Better_Rebuild_Thumbnails.imagesList[Better_Rebuild_Thumbnails.current_step].id,
                    title:      Better_Rebuild_Thumbnails.imagesList[Better_Rebuild_Thumbnails.current_step].title
                },
                success: function(data) {

                    var result = JSON.parse( data );

                    // Show image preview
                    if( result.status == 'success' ){
                        jQuery(".thumbnails-rebuild-wrapper .pre-desc img").attr("src",result.url);
                    }

                    // Update loader
                    Better_Rebuild_Thumbnails.plus_loader();

                    // Log result
                    Better_Rebuild_Thumbnails.log( result );

                    // Rebuild next image with ajax
                    Better_Rebuild_Thumbnails.rebuild_next_image();
                }
            });

        },

        plus_loader: function(){

            Better_Rebuild_Thumbnails.current_step = Better_Rebuild_Thumbnails.current_step + 1;

            jQuery(".better-rebuild-all-thumbnails .loader").css('width', ( Better_Rebuild_Thumbnails.current_step * Better_Rebuild_Thumbnails.step ) + '%' );

            // update building text
            var temp = better_rebuild_thumbnails_loc.text_rebuilding_state;
            temp = temp.replace('%number%', Better_Rebuild_Thumbnails.current_step == 0 ? 1 : Better_Rebuild_Thumbnails.current_step );
            temp = temp.replace('%all%', Better_Rebuild_Thumbnails.imagesList.length );
            jQuery(".better-rebuild-all-thumbnails .text-1 span, .better-rebuild-all-thumbnails .text-2 span").html( temp );

        },

        log: function( result ){

            var tempHTML = $('.rebuild-log-container .rebuild-log ol').html();

            tempHTML += result.message;

            $('.rebuild-log-container .rebuild-log ol').html(tempHTML);

            // Scroll down
            $('.rebuild-log-container .rebuild-log').animate({
                scrollTop:$('.rebuild-log-container .rebuild-log')[0].scrollHeight - $('.rebuild-log-container .rebuild-log').height()
            },400);
        }

    };

})(jQuery);

// load when ready
jQuery(function($) {

    Better_Rebuild_Thumbnails.init();

});