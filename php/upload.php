<?php
//GGRRRRRR
$debug = false;
$file = $_FILES['file'];
$mimeType = mime_content_type($file['tmp_name']);

if($debug){
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    $arr = get_defined_vars();
    print_r($arr);
}

//Verification
//File MIME-type
switch($mimeType){
    case 'image/jpeg':
    case 'image/png':
    case 'image/gif':
    case 'image/tiff':
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

echo 'Success!';
 ?>
