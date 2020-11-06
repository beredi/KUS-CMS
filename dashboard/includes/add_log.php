<?php

function createLog ($connection, $logAction, $logSection){
    //ZAPIS DO LOGOV
    $queryLogs = "INSERT INTO logs(log_date, log_author, log_section, log_action) VALUES (:log_date, :log_author, :log_section, :log_action)";

    $send_info = $connection->prepare($queryLogs);

    $currentDate = date("Y-m-d");
    $user_id = $_SESSION['user_id'];

    $send_info->bindParam(':log_date', $currentDate);
    $send_info->bindParam(':log_author', $user_id);
    $send_info->bindParam(':log_section', $logSection);
    $send_info->bindParam(':log_action', $logAction);

    $send_info->execute();

    //  (koniec) zapis do logov
}

?>