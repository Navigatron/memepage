<meta charset="utf-8">
<?php
//Okay, first off, wtf do we expect to be set???
if(isset($_POST['file'])){
    echo 'Post->file exists.<br/>';
    echo 'it\'s set to: '.$_POST['file'];
}
 ?>
