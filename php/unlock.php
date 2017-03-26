<?php
/*
When your users submit the form where you integrated reCAPTCHA, you'll get as part of the payload a string with the name "g-recaptcha-response". In order to check whether Google has verified that user, send a POST request with these parameters:
URL: https://www.google.com/recaptcha/api/siteverify
secret (required)	6Lc4QxoUAAAAAG8vwXuI-2uS0PYepUXcSK5XRDOL
response (required)	The value of 'g-recaptcha-response'.
remoteip	The end user's ip address.


*/
$captcha = $_POST['g-recaptcha-response'];
if(sizeof($captcha)<1){
    //No verify, Because no Captcha.
    echo'false';
}
$response=json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6Lc4QxoUAAAAAG8vwXuI-2uS0PYepUXcSK5XRDOL&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']), true);
if($response['success'] == false){
    //No verify, because FAKED captcha!
    echo 'false';
}else{
    //Congrats, you get a cookie.
    //Good deal, use setcookie(); to set a cookie. Yes, it works over ajax.
    //Set cookie
    echo 'true';
}

 ?>
