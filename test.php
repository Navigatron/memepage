<?php
//Gimme dat database!!!

$server='127.0.0.1';
$username='root';
$password='mysjavatech98';

//Create the Connection;
$DatabaseConnection = new mysqli($server, $username, $password);

//Make sure no connection errors
if($DatabaseConnection->connect_error){
    die('Connection Error: '.$DatabaseConnection->connect_error);
}
echo "Connected to the database!";

 ?>
