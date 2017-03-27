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
//print_r(get_defined_vars());
if(!$response['success']){
    //No verify, because FAKED captcha!
    echo 'false';
}else{
    //Congrats, you get a cookie.
    //Good deal, use setcookie(); to set a cookie. Yes, it works over ajax.
    //Generate token
    $token = bin2hex(openssl_random_pseudo_bytes(16));//Yes, must be hex.
    $timestamp = time();

    //Store to DB
    define('PHPROOT', dirname(__DIR__).'/php/');
    require_once(PHPROOT.'ConnectToDatabase.php');
    $sql = "INSERT INTO humans VALUES ('{$token}', '{$timestamp}')";
    $result = $DatabaseConnection->query($sql);
    print_r(get_defined_vars());
    $DatabaseConnection->close();

    setcookie('token', $token, time()+60*60*24*365*10);//User ID cookie expires in 10 years
    echo 'true';
}

 ?>
