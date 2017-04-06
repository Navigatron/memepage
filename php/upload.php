<?php
$debug = false;
if(!isset($_FILES['file'])){
    echo 'File not set';
    return;
}
$file = $_FILES['file'];
$mimeType = mime_content_type($file['tmp_name']);

if($debug){
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}

//Verification

//Humanity
if(isset($_COOKIE['token'])){
    define('PHPROOT', dirname(__DIR__).'/php/');
    require_once(PHPROOT.'verify.php');
    $result = verify($_COOKIE['token']);
    if(!$result){
        echo "Incorrect Token";
        return;
    }
}else{
    echo "You have not verified your humanity.";
    return;
}

//File MIME-type
switch($mimeType){
    case 'image/jpeg':
    case 'image/png':
    case 'image/gif':
    case 'image/tiff':
    case 'image/x-icon':
    case 'image/svg+xml':
    case 'image/webp':
        if($debug){
            echo 'Got file, mimeType: '.$mimeType;
        }
        break;
    default:
        echo 'Not supported filetype: '.$mimeType;
        return;
        break;
}
//File Size
if($file['size'] > 1000000){
    echo 'Size limit exceeded.';
    return;
}else if($debug){
    echo 'file size: '.$file['size'];
}

//Add the file to the database, get the files new name
define('PHPROOT', dirname(__DIR__).'/php/');
require(PHPROOT.'ConnectToDatabase.php');//We need a new one no matter what.

//Add to database
$sql = "INSERT INTO media (id) VALUES (null)";//Auto-increments primary key
$DatabaseConnection->query($sql);

if($debug){
    echo 'DB query went okay.';
}

//get name
$sql = "SELECT LAST_INSERT_ID()";
$result = $DatabaseConnection->query($sql);
$DatabaseConnection->close();

$newFileName = 'FailureRetreivingLastInsertedKeySeeUploadPHP51';
$newFileExtension = end((explode(".", $file['name'])));

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $newFileName = $row["LAST_INSERT_ID()"];//Thought it would be id, thought wrong.
} else {
    //Something really went wrong here.
    echo "Failure to determine height of meme pile.";
    return;
}

//Save to upload directory
define('ROOT', dirname(__DIR__).'/');
$uploadDirectory = ROOT.'media/';
if(move_uploaded_file($file['tmp_name'], $uploadDirectory.$newFileName.'.'.$newFileExtension)){
    echo 'Success!';
}else{
    echo 'Failure adding image to meme pile.';
}


 ?>
