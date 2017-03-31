<?php

if(isset($_GET['pass']) && $_GET['pass']=='8fc71f873719afaf75a9'){
    define('PHPROOT', dirname(__DIR__).'/php/');
    require_once(PHPROOT.'ConnectToDatabase.php');
    $sql = "SELECT * FROM humans";
    $result = $DatabaseConnection->query($sql);
    print_r(get_defined_vars());
    $DatabaseConnection->close();
}
 ?>
