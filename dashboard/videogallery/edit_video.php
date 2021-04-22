<?php

if (isset($_SESSION['user_role']) && isset($_GET['edit'])) {
//EVERYBODY CAN ADD THE POST
	if (isset($_POST['edit_video'])) {


		$title = $_POST['title'];
		$code = $_POST['code'];
		$id = $_GET['edit'];
		try {
			include "includes/db.php";


			$query = "UPDATE videogallery SET title=:title, code=:code WHERE id=:id";

			$send_info = $connection->prepare($query);

			$send_info->bindParam(':title', $title);
			$send_info->bindParam(':code', $code);
			$send_info->bindParam(':id', $id);

			$send_info->execute();

			// LOG
			include "includes/add_log.php";
			$logAction = "Upravil video " . $title;
			createLog($connection, $logAction, "videogallery");

			header('Location: videogallery.php');


		} catch (Exception $e) {
			echo $e;
		}
	}
	if (isset($_GET['edit'])){
		$id = $_GET['edit'];
		try {
			include "includes/db.php";


			$query = "SELECT * FROM videogallery WHERE id=:id";

			$send_info = $connection->prepare($query);
			$send_info->bindParam(':id', $id);
			$send_info->execute();
			$video = $send_info->fetch(PDO::FETCH_ASSOC);
			?>

			<h2>Upraviť video</h2>

			<form action="" method="post" enctype="multipart/form-data" class="my-2">
				<div class="form-group">
					<label for="post_title">Názov:</label>
					<input type="text" class="form-control" id="title" placeholder="Zadajte názov videa" name="title" required autocomplete="off" value="<?=$video['title']?>">
				</div>
				<div class="form-group">
					<label for="post_content">Kód:</label>
					<textarea class="form-control" rows="10" id="code" name="code" placeholder="Sem skopírujte EMBED kód bez značiek IFRAME a bez height a width..." required><?=$video['code']?></textarea>
				</div>


				<input type="submit" class="btn btn-primary" name="edit_video" value="Upraviť">



			</form>
<?php


		} catch (Exception $e) {
			echo $e;
		}
	}
}


?>
