jQuery(document).ready(function($) {
    let mediaUploadInputs = {
        'uploadButtonForpUTImageContent': {
            "hiddenInputId" : "pUTImageContent",
            "imgTagId": "imgpUTImageContent",
            "mediaUploaderTitle": "Choose a pop up picture"
        },
        'uploadButtonForpUTImageMobileContent': {
            "hiddenInputId" : "pUTImageMobileContent",
            "imgTagId": "imgpUTImageMobileContent",
            "mediaUploaderTitle": "Choose a mobile pop up image"
        }
    };

    for(let buttonID in mediaUploadInputs) {
        $('#' + buttonID).on('click', function (e) {
            e.preventDefault();
            let mediaUploader = wp.media.frames.file_frame = wp.media({
                title: mediaUploadInputs[buttonID]['mediaUploaderTitle'],
                button: {
                    text: 'Choose picture'
                },
                multiple: false
            });

            mediaUploader.on('select', function() {
                let attachment = mediaUploader.state().get('selection').first().toJSON();
                $("#" + mediaUploadInputs[buttonID]['hiddenInputId'] ).val(attachment.url);
                $("#" + mediaUploadInputs[buttonID]['imgTagId']).attr('src', attachment.url);
            });
            mediaUploader.open();
        });
    }
});