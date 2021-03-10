<?php
$servername = 'localhost';
$database = 'kusjanko_dashboard';
$username = 'kusjanko_admin';
$password = 'kusj4nkoll4r';

$connection = new PDO("mysql:host=$servername; dbname=$database", $username, $password);
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$key = 'EjfFxV0aL+A.';


?>