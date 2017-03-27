//We need to get the captcha code and send it to the server.
//If the server is pleased, show the user the upload and vote features.
var voting = false;
function unlock(){
    //Dear 1337 H4X0RZ, Just wanna let you know, uploading and voting don't work without the cookie from actually doing the captcha. ;)
    $('#captchaBlock').hide();
    $('#uploadBlock').show();
    $('.voteBar').show();
    voting = true;
}
$(document).ready(function(){
    $('#captchaForm').submit(function(event){
        //Don't actually submit the form.
        event.preventDefault();

        var code = grecaptcha.getResponse();

        if(code.length <= 0){
            //Silly user, you need to fill out the captcha.
            $('#captchaFeedback').text('You need to do the captcha before you click this.');
            return false;
        }

        var formData = new FormData();
        formData.append('g-recaptcha-response', code);
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'php/unlock.php', true);
        xhr.onload = function () {
            if (xhr.status === 200) {
                //Post victory.
                if(xhr.responseText=='true'){
                    //Hello human!
                    //Server has given human a cookie. Good human.
                    //Here, have some upload and vote divs.
                    unlock();
                }else{
                    //Go away robbit :(
                    $('#captchaFeedback').text('Google sayz u r an robbit :(');
                }
            } else {
                alert('POST failure. Code: '+xhr.status);
            }
        };
        xhr.send(formData);

        //Even more not submitting the form.
        return false;
    });
});
