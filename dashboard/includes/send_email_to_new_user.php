<?php

function sendEmailToNewUser($connection, $user_email, $user_titul, $user_name, $user_lastname, $user_password){

        $subject = 'Vitajte na KUS Jána Kollára!';

		$message = '<html><body>';
        $message .= $user_titul . ' ' . $user_name . ' ' . $user_lastname ." vitajte v systéme pre KUS Jána Kollára!<br><br>";
        $message .= "Vaše prihlasovacie údaje:<br>";
        $message .= "<strong>Email:</strong> ".$user_email."<br>";
        $message .= "<strong>Heslo:</strong> ".$user_password."<br>";;
        $message .= "<br><br>S pozdravom,<br><strong>admin team</strong>.";
		$message .= '</body></html>';

		$headers = "From: info@kusjanakollara.org\r\n";
		$headers .= "Reply-To: info@kusjanakollara.org\r\n";
		$headers .= "CC: \r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=utf-8\r\n";

        try {
            mail($user_email, $subject, $message, $headers);
        }
        catch (ErrorException $e){
            error_log('Email sending error ' . $e);
        }
}

?>