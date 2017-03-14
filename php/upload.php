<meta charset="utf-8">
<?php
//Okay, first off, wtf do we expect to be set???
echo 'Printing POST keys!<br/>';
foreach (array_keys($_POST) as $key) {
    echo 'Key: '.$key.'<br/>';
}
echo 'Printing FILE keys!<br/>';
foreach (array_keys($_FILE) as $key) {
    echo 'Key: '.$key.'<br/>';
}
echo 'That\'s all folks';
 ?>
