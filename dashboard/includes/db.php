<?php
$servername = 'localhost';
// $database = 'web';
$database = 'kus_jana_kollara';
$username = 'root';
$password = '';

$connection = new PDO("mysql:host=$servername; dbname=$database; charset=utf8", $username, $password);
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$connection->exec("SET NAMES utf8");


$key = 'EjfFxV0aL+A.';


?>