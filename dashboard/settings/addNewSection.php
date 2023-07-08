<?php

session_start();
if (isset($_POST['addSection'])) {
    $name = $_POST['sekciaName'];

    try {
        include '../includes/db.php';
        $query = "INSERT INTO sekcie(name) VALUES (:name)";

        $send_info = $connection->prepare($query);
        $send_info->bindParam(':name', $name);

        $send_info->execute();

        // LOG
        include "../includes/add_log.php";
        $logAction = "Pridal sekciu " . $name;
        createLog($connection, $logAction, "sekcie");

        header('Location: ../settings.php');

    } catch (Exception $e) {
        echo $e;
    }

}
