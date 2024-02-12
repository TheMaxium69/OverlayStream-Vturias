<?php
$host = "localhost";
$userDB = "toor";
$passDB = "toor";
$Database = "vturias_panel";
$ConnectDB = mysqli_connect($host, $userDB, $passDB, $Database);
try{
    $db = new PDO("mysql:host=" . $host . ";dbname=" . $Database, $userDB, $passDB);
    $db->setAttribute(PDO::ERRMODE_EXCEPTION, 'ATTR_ERRMODE');
}catch(PDOEXeption $e){
    echo $e;
}
?>