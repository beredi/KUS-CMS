<?php

if (isset($_SESSION['user_role'])) {
//EVERYBODY CAN ADD THE POST
	if (isset($_POST['add_video'])) {


		$title = $_POST['title'];
		$code = $_POST['code'];

		try {
			include "includes/db.php";


			$query = "INSERT INTO videogallery(title, code) VALUES (:title, :code)";

			$send_info = $connection->prepare($query);

			$send_info->bindParam(':title', $title);
			$send_info->bindParam(':code', $code);

			$send_info->execute();

			// LOG
			include "includes/add_log.php";
			$logAction = "Pridal video " . $title;
			createLog($connection, $logAction, "videogallery");

			header('Location: videogallery.php');


		} catch (Exception $e) {
			echo $e;
		}
	}
}


?>

<h2>Pridať video</h2>

<form action="" method="post" enctype="multipart/form-data" class="my-2">
    <div class="form-group">
        <label for="post_title" class="required">Názov:</label>
        <input type="text" class="form-control" id="title" placeholder="Zadajte názov videa" name="title" required
               autocomplete="off">
    </div>
    <div class="form-group">
        <label for="post_content" class="required">Kód:</label>
        <textarea class="form-control" rows="10" id="code" name="code"
                  placeholder="Sem skopírujte EMBED kód bez značiek IFRAME a bez height a width..." required></textarea>
    </div>


    <input type="submit" class="btn btn-primary" name="add_video" value="Pridať">


</form>
