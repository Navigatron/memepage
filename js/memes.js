var smallestIndex = 0;//Represents the oldest meme. Passed to the server to get older memes.

$(document).ready(function(){
    //Automatically load 20 memes.
    loadmemes(smallestIndex);
});



var loadmemes = function(index){
    //Firstly, get the meme file names from the server.
    //POST REQUEST.
    var formData = new FormData();
    formData.append('index', index);
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'php/getmemes.php', true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            var names = xhr.responseText;
            //$('#memes').append('<span>'+names+'</span>');
            //K, now inject memes.
            injectMemes(jQuery.parseJSON(names));
        } else {
            alert('POST failure. Code: '+xhr.status);
            $('#memes').append('<span>Server failure.</span>');
        }
    };
    xhr.send(formData);
    //$('#memes').append('<span>That\'s it.</span>');
}

var injectMemes = function(names){//As JQuery
    for (var key in names) {
        console.log('Got a name: '+names[key]);
        $('#memes').append('<img src=\''+names[key]+'\'></img>');
    }
}
