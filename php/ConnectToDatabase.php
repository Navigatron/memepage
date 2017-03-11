<?php
//Gimme dat database!!!
$server='127.0.0.1';
$username='root';
$password='mysjavatech98';
$database='memestreme';
//Create the Connection;
$DatabaseConnection = new mysqli($server, $username, $password, $database);
//Make sure no connection errors
if($DatabaseConnection->connect_error){
    die("Connection Error: ".$DatabaseConnection->connect_error);
}
