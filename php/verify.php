<?php
function verify($token){
    define('PHPROOT', dirname(__DIR__).'/php/');
    require_once(PHPROOT.'ConnectToDatabase.php');
    $expire = time()-60*60*24;//One day in the past
    $sql = "SELECT * FROM humans WHERE token='{$token}' AND time>'{$expire}'";
    $result = $DatabaseConnection->query($sql);
    $DatabaseConnection->close();
    if ($result->num_rows > 0) {
        return true;
    } else {
        return false;
    }
}
 ?>
