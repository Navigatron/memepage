$('#upload').on('click', function(e){
    console.log('You\'ve clicked upload!');
    console.log('File: '+$('#file')[0].files[0]);
    console.log('Uploading...');
    var formData = new FormData();
    var file = $('#file')[0].files[0];

    // Check the file type.
    if (!file.type.match('image.*')) {
        console.log('That\'s not an image file :(');
        return;
    }
    // Add the file to the request.
    formData.append('file', file, file.name);

    //Getting traditional up in here
    // Set up the request.
    var xhr = new XMLHttpRequest();
    // Open the connection.
    xhr.open('POST', 'php/upload.php', true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            // File(s) uploaded.
            console.log('All systems go!');
            $('#uploadMessage').html(xhr.responseText);
        } else {
            alert('An error occurred!');
        }
    };
    xhr.send(formData);
})
