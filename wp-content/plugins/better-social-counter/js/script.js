var Better_Social_Counter = (function($) {
    "use strict";

    return {

        init: function(){
            // Define elements that use elementQuery
            this.fix_element_query();
        },

        /**
         * Define elements that use elementQuery on local/cross domain
         */
        fix_element_query: function(){

            if( typeof elementQuery != 'function' ){
                return;
            }

            elementQuery({
                ".better-social-counter": { "max-width": [ "358px","199px","230px",'900px', '530px', '750px' ] },
                ".better-social-banner": { "max-width":  ["250px"] }
            });

        }


    };// /return
})(jQuery);

// Load when ready
jQuery(function($) {

    Better_Social_Counter.init();

});