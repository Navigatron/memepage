var smallestIndex = 0;//Represents the oldest meme. Passed to the server to get older memes.

$(document).ready(function(){
    //Automatically load 20 memes.
    loadmemes(smallestIndex);
    $('#moarMemesButton').on('click', function(){
        loadmemes(smallestIndex);
    })
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
    if(names.length <1){
        $('#moarMemesButton').text('No more memes :(');
    }
    for (var key in names) {
        var hide = '';
        if(!voting){
            hide = " style='display: none;'";
        }
        var memeid = (names[key].split('.')[0].split('/')[1]);//After the / and before the .
        //Capture the smallest memeid
        //console.log('ID: '+memeid+', INDEX: '+smallestIndex);
        if(smallestIndex==0 || Number(memeid) < Number(smallestIndex)){
            //console.log('UPDATING');
            smallestIndex = memeid;
        }
        $('#memes').append('\
            <div class=\'meme\'>\
                <div class=\'image\'>\
                    <img src='+names[key]+'></img>\
                    <div class=\'voteBar\''+hide+' data-key=\''+memeid+'\'>\
                        <button type=\'button\' data-votetype=\'0\'>Updoot</button>\
                        <button type=\'button\' data-votetype=\'1\'>Dank</button>\
                        <button type=\'button\' data-votetype=\'2\'>Edgy</button>\
                        <button type=\'button\' data-votetype=\'3\'>Downdoot</button>\
                    </div>\
                </div>\
            </div>');//Use lower case for data.
    }
    $('.voteBar button').on('click', function(){//One click handler per button
        var type = $(this).data('votetype');
        var image = $(this).parent().data('key');
        console.log('Got vote of type '+type+' on Image '+image+'.');
    });
}
