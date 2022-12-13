<?php

session_start();

if (isset($_SESSION['user_name']) && isset($_SESSION['user_role']) && isset($_SESSION['user_id']) && isset($_SESSION['user_id'])) {


	unset($_SESSION['user_id']);
	unset($_SESSION['user_email']);
	unset($_SESSION['user_name']);
	unset($_SESSION['user_lastname']);
	unset($_SESSION['user_role']);
	unset($_SESSION['user_function']);
	unset($_SESSION['user_image']);

	header('Location: ../../index.php');

}


?>
