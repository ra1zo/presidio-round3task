<?php

define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','cwmsdb');



$mysqli = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                     

if($mysqli  === false){
    die("ERROR");
}


//Pdo object db establishment
try
{
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS);
}
catch (PDOException $e)
{
exit("Error");
}

return $mysqli;


?>
