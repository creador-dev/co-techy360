(function () {

    function appendFbScript() {
        var js, id = 'facebook-jssdk',
            fjs = document.getElementsByTagName('script')[0];

        if (document.getElementById(id)) return;
        js = document.createElement('script');
        js.id = id;
        js.src = "//connect.facebook.net/%%LOCALE%%/sdk.js#xfbml=1&appId=%%APP-ID%%&version=v2.0";
        fjs.parentNode.insertBefore(js, fjs);

        window.fbAsyncInit = function () {
            FB.init({
                appId: '%%APP-ID%%',
                xfbml: true,
                version: 'v2.0'
            });
            FB.Event.subscribe('comment.create', function (comment_data) {
                console.log(comment_data);
                update_comments_count();
            });
            FB.Event.subscribe('comment.remove', function (comment_data) {
                update_comments_count();
            });

            function update_comments_count(comment_data, comment_action) {
                jQuery.ajax({
                        type: 'GET',
                        dataType: 'json',
                        url: '%%ADMIN-AJAX%%',
                        data: {
                            action: 'clear_better_facebook_comments',
                            post_id: '%%POST-ID%%'
                        },
                        success: function (data) {
                            // todo sync comments count here! data have the counts
                        },
                        error: function (i, b) {
                            // todo
                        }
                    }
                )
            };
        };

        //%%TYPE%%
    }

    appendFbScript();

})();
