<?php

if(isset($_GET['pass']) && $_GET['pass']=='8fc71f873719afaf75a9'){
    define('PHPROOT', dirname(__DIR__).'/php/');
    require_once(PHPROOT.'ConnectToDatabase.php');
    $sql = "DESCRIBE humans";
    $result = $DatabaseConnection->query($sql);
    if ($result->num_rows > 0) {

        
        //echo '<table><tr><td>id</td><td>token</td><td>timestamp</td></tr>';
        while($row = $result->fetch_assoc()) {//WHERE THE KEYS FOR ROW ARE THE COLUMN NAMES
            print_r($row);
            //echo '<tr><td>'.$row['id'].'</td><td>'.$row['token'].'</td><td>'.$row['timestamp'].'</td></tr>';
        }/*
        echo '</table>';//*/
    } else {
        echo "0 results";
    }
    $DatabaseConnection->close();
}
 ?>
