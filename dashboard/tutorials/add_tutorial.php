<?php

if (isset($_SESSION['user_role'])) {
//EVERYBODY CAN ADD THE POST
	if (isset($_POST['add_tutorial'])) {


		$title = $_POST['title'];
		$description = $_POST['description'];
		$code = $_POST['code'];

		try {
			include "includes/db.php";


			$query = "INSERT INTO tutorials(title, description, code) VALUES (:title, :description, :code)";

			$send_info = $connection->prepare($query);

			$send_info->bindParam(':title', $title);
			$send_info->bindParam(':description', $description);
			$send_info->bindParam(':code', $code);

			$send_info->execute();

			// LOG
			include "includes/add_log.php";
			$logAction = "Pridal tutorial " . $title;
			createLog($connection, $logAction, "tutorialy");

			header('Location: tutorials.php');


		} catch (Exception $e) {
			echo $e;
		}
	}
}


?>

<h2>Pridať tutorial</h2>

<form action="" method="post" enctype="multipart/form-data" class="my-2">
    <div class="form-group">
        <label for="post_title" class="required">Názov:</label>
        <input type="text" class="form-control" id="title" placeholder="Zadajte názov tutorialu" name="title" required
               autocomplete="off">
    </div>
    <div class="form-group">
        <label for="post_tags">Popis:</label>
        <input type="text" class="form-control" id="description" aria-describedby="postTags"
               placeholder="Zadajte popis videa" name="description" autocomplete="off">
    </div>
    <div class="form-group">
        <label for="post_content" class="required">Kód:</label>
        <textarea class="form-control" rows="10" id="code" name="code"
                  placeholder="Sem skopírujte EMBED kód bez značiek IFRAME a bez height a width..." required></textarea>
    </div>


    <input type="submit" class="btn btn-primary" name="add_tutorial" value="Pridať">


</form>
