<?php
$captcha = $_POST['g-recaptcha-response'];
if(sizeof($captcha)<1){
    //No verify, Because no Captcha.
    echo'false';
}
//They did a captcha - is it legit?
$response=json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6Lc4QxoUAAAAAG8vwXuI-2uS0PYepUXcSK5XRDOL&response=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']), true);
if(!$response['success']){
    //No verify, because FAKED captcha!
    echo 'false';
}else{
    //They did a captcha and google said it was good.
    //Congrats, you get a cookie.
    //Good deal, use setcookie(); to set a cookie. Yes, it works over ajax.

    //TODO: Give the humans table an ID column.
    //TODO: If they have an expired token, Put their new token in the ID of the old token.
    //      This will enable their votes to be remembered as them between expiration periods.

    $token = bin2hex(openssl_random_pseudo_bytes(16));//Yes, must be hex.
    $timestamp = time();

    //Store to DB
    define('PHPROOT', dirname(__DIR__).'/php/');
    require_once(PHPROOT.'ConnectToDatabase.php');
    $sql = "INSERT INTO humans VALUES ('{$token}', '{$timestamp}')";
    $result = $DatabaseConnection->query($sql);
    //print_r(get_defined_vars());//There can be no output before SETCOOKIE or SETCOOKIE will have no effect.
    $DatabaseConnection->close();

    setcookie('token', $token, time()+60*60*24*365*10, '/');//User ID cookie expires in 10 years
    print_r(get_defined_vars());
    echo 'true';
}

 ?>
