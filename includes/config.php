<?php 
ob_start(); // Turns on output buffering

date_default_timezone_set("Asia/Amman");

try {
    $con =  new PDO("mysql:dbname=youtube;host=localhost", "root", "");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
}
catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}


?>