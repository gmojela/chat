<?php

$db_server = "127.0.0.1";
$db_user = "root";
$db_pass = "201025060";
$db_name = "chat";
$db_dsn = "mysql:host=$db_server";

try{
    $conn = new PDO($db_dsn, $db_user, $db_pass);
} catch(PDOException $e){
    die( "Connection failed: " . $e->getMessage());
}


?>