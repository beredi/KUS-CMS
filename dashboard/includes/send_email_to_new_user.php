<?php

function sendEmailToNewUser($connection, $user_email, $user_name, $user_lastname, $user_password){

        $subject = 'Vitajte na KUS Jána Kollára!';

        $message = $user_name . ' ' . $user_lastname ." vitajte v systéme pre KUS Jána Kollár!.<br>";
        $message .= "Vaše prihlasovacie údaje:<br>";
        $message .= "<strong>Email:</strong> ".$user_email."<br>";
        $message .= "<strong>Heslo:</strong> ".$user_password."<br>";;
        $message .= "<br><br>S pozdravom,<br><strong>admin team</strong>.";


        try {
            mail($user_email, $subject, $message);
        }
        catch (ErrorException $e){
            error_log('Email sending error ' . $e);
        }
}

?>