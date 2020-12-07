<?php

function sendEmailToAdminOrLector($connection, $edit=false){

//                    SEND MAIL TO LEKTOR AND ADMIN
    $query_email = "SELECT * FROM users WHERE user_role LIKE '%admin%' OR user_role LIKE '%lektor%'";

    $take_info = $connection->prepare($query_email);
    $take_info->execute();

    while ($row = $take_info->fetch(PDO::FETCH_ASSOC)){
        $to = $row['user_email'];
        $subject = 'Článok na schválenie KUS Jána Kollara.org -  ['. $_SESSION['user_name'] . ' ' . $_SESSION['user_lastname'] . '] ' . date("Y-m-d");
        if ($edit){
            $message = $_SESSION['user_name'] . ' ' . $_SESSION['user_lastname'] .' upravil článok a čaká na schválenie.';
        }
        else{
            $message = $_SESSION['user_name'] . ' ' . $_SESSION['user_lastname'] .' pridal nový článok a čaká na schválenie.';
        }
        try {
            mail($to, $subject, $message);
        }
        catch (ErrorException $e){
            error_log('Email sending error ' . $e);
        }


    }
}

?>