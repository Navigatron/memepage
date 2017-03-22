<?php
define('ROOT', dirname(__DIR__).'/html/php/');
require_once(ROOT.'ReportErrors.php');
require_once(ROOT.'ConnectToDatabase.php');
echo 'All systems Go';

//test has two test rows, index and a string
//media has nothing in it right now, It'll have indexes later on.

$sql = "SELECT * FROM media";
$result = $DatabaseConnection->query($sql);
print_r($result);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: ".$row["id"].", text: ".$row["text"]."<br>";
    }
} else {
    echo "0 results";
}

$DatabaseConnection->close();
