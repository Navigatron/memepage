var smallestIndex = 0;//Represents the oldest meme. Passed to the server to get older memes.

$(document).ready(function(){
    //Automatically load 20 memes.
    loadmemes(0);//Refresh, reload, visit page - always start from zero
    $('#moarMemesButton').on('click', function(){
        loadmemes(smallestIndex);
    })
});



var loadmemes = function(index){
    if (typeof index == 'undefined'){
        console.error('Cannot load an undefined amount of memes!');
    }
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
    if(Object.keys(names).length <20){
        $('#moarMemesButton').text('No more memes :(');
        $('#moarMemesButton').unbind();
        $('#moarMemesButton').on('click', function(){
            $('#moarMemesButton').text('I\'m sorry but its true, we\'re out of memes :,(');
            $('#moarMemesButton').unbind();
            $('#moarMemesButton').on('click', function(){
                $('#moarMemesButton').text('No, really. That\'s all we\'ve got.');
                $('#moarMemesButton').unbind();
                $('#moarMemesButton').on('click', function(){
                    $('#moarMemesButton').text('Stop clicking me.');
                    $('#moarMemesButton').unbind();
                    $('#moarMemesButton').on('click', function(){
                        $('#moarMemesButton').text('Really. Stop.');
                        $('#moarMemesButton').unbind();
                        $('#moarMemesButton').on('click', function(){
                            $('#moarMemesButton').text('You click me one more time and I\'ll disapear.');
                            $('#moarMemesButton').unbind();
                            $('#moarMemesButton').on('click', function(){
                                $('#moarMemesButton').remove();
                            })
                        })
                    })
                })
            })
        })
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
    $('.voteBar button').unbind();
    $('.voteBar button').on('click', function(){//One click handler per button
        var type = $(this).data('votetype');
        var image = $(this).parent().data('key');
        console.log('Got vote of type '+type+' on Image '+image+'.');
    });
}
