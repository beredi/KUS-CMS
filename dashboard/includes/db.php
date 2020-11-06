<?php
$servername = 'localhost';
$database = 'web';
$username = 'root';
$password = '';

$connection = new PDO("mysql:host=$servername; dbname=$database", $username, $password);
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$key = 'EjfFxV0aL+A.';


?>