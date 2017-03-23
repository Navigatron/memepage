<?php
define('PHPROOT', dirname(__DIR__).'/php/');
require_once(PHPROOT.'ReportErrors.php');
function fukitol(){
    $arr = get_defined_vars();
    print_r($arr);
}
if(!isset($_POST['index'])){
    $arr = get_defined_vars();
    print_r($arr);
    echo '<br/>Lol';
    return;
}
$index = $_POST['index'];
if($index==0){
    $sql = 'SELECT * FROM media ORDER BY id DESC LIMIT 20';
}else{
    $sql = 'SELECT * FROM media WHERE id<$index ORDER BY id DESC LIMIT 20';
}

require_once(PHPROOT.'ConnectToDatabase.php');
$result = $DatabaseConnection->query($sql);
$names = array();
fukitol();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {//WHERE THE KEYS FOR ROW ARE THE COLUMN NAMES
        $glob = glob(dirname(__DIR__).'/media/'.$row['id'].'.*');
        fukitol();
        if(sizeof($glob)!=1){
            //Found more or less than one matching file.
            file_put_contents(dirname(__DIR__).'/log.txt', 'Search for file '.$row['id'].' returned '.sizeof($glob).' results.', FILE_APPEND);
            continue;
        }else{
            //There is one file matching one database entry. SHIP IT!
            $names = $glob[0];
        }
    }
} else {
    //Send back an empty array.
    echo 'No results!';
}

//I guess that's it.
fukitol();
$DatabaseConnection->close();
return json_encode($names);

 ?>
