$(document).ready(function(){
    $('#upload').on('click', function(e){
        var file = $('#file')[0].files[0];

        // Check the file type.
        if (!file.type.match('image.*')) {
            $('#UploadMessage').text($('#UploadMessage').text()+'That\'s Not an Image!');
            return;
        }

        $('#UploadMessage').text('Uploading '+file.name+'... ');

        var formData = new FormData();
        formData.append('file', file, file.name);

        //Getting traditional up in here
        // Set up the request.
        var xhr = new XMLHttpRequest();
        // Open the connection.
        xhr.open('POST', 'php/upload.php', true);
        xhr.onload = function () {
            if (xhr.status === 200) {
                // File(s) uploaded.
                //console.log('All systems go!');
                $('#UploadMessage').text($('#UploadMessage').text()+xhr.responseText);
                //Clear file button - taken right from stack overflow.
                var control = $('#file');
                control.replaceWith( control = control.clone( true ) );//TODO this is ineffective
                //Clear loaded memes, re-load memes.
                $('#memes').empty();
                loadmemes(0);
            } else {
                alert('POST failure. Code: '+xhr.status);
                $('#UploadMessage').text($('#UploadMessage').text()+'POST request failure.');
            }
        };
        xhr.send(formData);
    })
});
