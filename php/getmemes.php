<?php
define('PHPROOT', dirname(__DIR__).'/php/');
require_once(PHPROOT.'ReportErrors.php');

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
//print_r(get_defined_vars());
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {//WHERE THE KEYS FOR ROW ARE THE COLUMN NAMES
        $glob = glob(dirname(__DIR__).'/media/'.$row['id'].'.*');
        //print_r(get_defined_vars());
        if(sizeof($glob)!=1){
            //Found more or less than one matching file.
            file_put_contents(dirname(__DIR__).'/log.txt', 'Search for file '.$row['id'].' returned '.sizeof($glob).' results.', FILE_APPEND);
            continue;
        }else{
            //There is one file matching one database entry. SHIP IT!
            //Break the file path into pieces. return media/(The last piece.)
            $names[] = 'media/'.end((explode('/',$glob[0])));//More ()'s?'
        }
    }
} else {
    //Send back an empty array.
    echo 'No results!';
}

//I guess that's it.
//$result = json_encode($names, JSON_FORCE_OBJECT);
//print_r(get_defined_vars());
$DatabaseConnection->close();
echo json_encode($names, JSON_FORCE_OBJECT);

 ?>
