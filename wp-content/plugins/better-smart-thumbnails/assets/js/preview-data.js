var previewData = {

    get: function (attachmentId, securityNonce) {

        return $.Deferred(function (deferred) {

            if (cache.exist(attachmentId, 'selector-data')) {

                deferred.resolveWith(this, [cache.get(attachmentId, 'selector-data')]);

                return;
            }

            var ajax = wp.ajax.post('bt-preview-thumbnails', {
                thumbnail_id: attachmentId,
                nonce: securityNonce
            });

            ajax.done(function (res) {
                cache.add(attachmentId, res, 'selector-data');
                deferred.resolveWith(this, [res]);
            });

            ajax.fail(function () {

                deferred.rejectWith(this);
            });
        }).promise();
    },
};