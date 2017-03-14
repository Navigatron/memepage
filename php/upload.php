<?php
//Okay, first off, wtf do we expect to be set???
echo 'Printing ALL keys!<br/>';
foreach (get_defined_vars() as $key) {
    echo 'Key: '.$key.'<br/>';
}
echo 'That\'s all folks';
 ?>
