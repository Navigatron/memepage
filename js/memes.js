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

var injectMemes = function(names){//As JSON
    for (var key in names) {
        var hide = '';
        if(!voting){
            hide = " style='display: none;'";
        }
        $('#memes').append('\
            <div class=\'meme\'>\
                <div class=\'image\'>\
                    <img src='+names[key]+'></img>\
                    <div class=\'voteBar\''+hide+' data-key=\''+(key.split(',')[0])+'\'>\
                        <button type=\'button\' data-voteType=\'0\'>Updoot</button>\
                        <button type=\'button\' data-voteType=\'1\'>Dank</button>\
                        <button type=\'button\' data-voteType=\'2\'>Edgy</button>\
                        <button type=\'button\' data-voteType=\'3\'>Downdoot</button>\
                    </div>\
                </div>\
            </div>');
    }
    $('.voteBar button').on('click', function(){//One click handler per button
        var type = $(this).data('voteType');
        var image = $(this).parent().data('key');
        console.log('Got vote of type '+type+' on Image '+image+'.');
    });
}
