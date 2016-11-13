<?php

require_once 'connection.php';

$conn->query("CREATE DATABASE IF NOT EXISTS $db_name;");
$conn->query("USE $db_name");
$conn->query("CREATE TABLE IF NOT EXISTS users_tbl(
	id INT AUTO_INCREMENT NOT NULL,
	username VARCHAR (250) NOT NULL,
	password VARCHAR (250) NOT NULL,
	PRIMARY KEY (id));"
);

$conn->query("CREATE TABLE IF NOT EXISTS messages_tbl(
	id INT AUTO_INCREMENT NOT NULL,
	user_id INT NOT NULL,
	messages TEXT (300) NOT NULL,
	PRIMARY KEY (id));"
);

?>