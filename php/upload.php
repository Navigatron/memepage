<?php
//Okay, first off, wtf do we expect to be set???
//*
echo 'Printing ALL keys!<br/>';
$arr = get_defined_vars();
print_r($arr);
echo '<br/>';//*/
$file = $_FILE['file'];
echo 'File is named \''.$file['name'].'\', and is '.$file['size'].' bytes in size.';

//Verification
//File MIME-type
switch(mime_content_type($file)){
    case 'image/jpeg':
        echo 'Got a jpeg!';
        break;
    case 'image/png':
        echo 'Got a png!';
        break;
    case 'image/gif':
        echo 'Got a gif!';
        break;
    case 'image/tiff':
        echo 'Got a tiff!';
        break;
    default:
        echo 'Not supported filetype!';
        return;
        break;
}
//File Size
if($file['size'] > 4000000){
    echo 'Size limit exceeded.';
    return;
}

echo 'Success! Putting file in le DB!';
 ?>
