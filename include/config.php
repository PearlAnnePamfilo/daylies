<?php

//Database CONNECTION

$host = "localhost";
$username = "root";
$password = "";
$database = "dayliesdb";

// $sql = mysqli_connect($host, $username, $password, $database) or die('Could not connect');

$database = new PDO('mysql:host=localhost;database='. $database . ';charset=utf8', $username, $password);
$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>