<?php
echo 'This isnt for you.';
return;

//DEFINE ROOT
define('ROOT', dirname(__DIR__).'/html/php/');

//ENABLE ERROR REPORTING
require_once(ROOT.'ReportErrors.php');

//PRINT ABSOLUTELY EVERYTHING.
$arr = get_defined_vars();
print_r($arr);



////DATABASES

//CONNECT TO THE DATABASE
require_once(ROOT.'ConnectToDatabase.php');

//QUERIES
//SELECT DATA
$sql = "SELECT * FROM media";
//INSERT DATA
$sql = "INSERT INTO media (column, names) VALUES (value1, value2)";
//GET THE LAST INSERTED INDEX
$sql = "SELECT LAST_INSERT_ID()";

//RUN A QUERY
$result = $DatabaseConnection->query($sql);

//PRINT ABSOLUTELY EVERYTHING
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {//WHERE THE KEYS FOR ROW ARE THE COLUMN NAMES
        echo "id: ".$row["id"].", text: ".$row["text"]."<br>";
    }
} else {
    echo "0 results";
}

//CLOSE THE DATABASE CONNECTION
$DatabaseConnection->close();


 ?>
