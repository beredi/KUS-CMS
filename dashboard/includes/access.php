<?php
function isUser($role){
	if (isset($_SESSION['user_role'])){
		if (strpos($_SESSION['user_role'],$role)){
			return true;
		}
	}
	else {
		return false;
	}
}
?>
