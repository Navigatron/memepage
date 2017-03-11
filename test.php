<?php
//Gimme dat database!!!
echo "Welcome to the Test!";
$server='127.0.0.1';
$username='root';
$password='mysjavatech98';
echo "Connecting...";
//Create the Connection;
$DatabaseConnection = new mysqli($server, $username, $password);
echo "Connected!";
//Make sure no connection errors
if($DatabaseConnection->connect_error){
    echo "Database Error: ".$DatabaseConnection->connect_error;
    die("Connection Error: ".$DatabaseConnection->connect_error);
}
echo "Connected to the database!";

 ?>
