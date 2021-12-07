<?php

if (isset($_SESSION['user_role'])) {

	if (isset($_POST['add_file'])) {


		$name = $_POST['name'];
		$description = $_POST['description'];
		$file = $_FILES['file']['name'];
		$file_temp = $_FILES['file']['tmp_name'];

		if(isset($file)){
			if(!empty($file)){
				move_uploaded_file($file_temp, "../images/files/$file");

			}
			else {
				echo 'Neúspešné nahrávanie súboru';
			}
		}

		try {
			include "includes/db.php";


			$query = "INSERT INTO files(name, file, description) VALUES (:name, :file, :description)";

			$send_info = $connection->prepare($query);

			$send_info->bindParam(':name', $name);
			$send_info->bindParam(':file', $file);
			$send_info->bindParam(':description', $description);

			$send_info->execute();

			// LOG
			include "includes/add_log.php";
			$logAction = "Pridal súbor " . $name;
			createLog($connection, $logAction, "files");

			header('Location: files.php');


		} catch (Exception $e) {
			echo $e;
		}
	}
}


?>

<h2>Pridať súbor</h2>

<form action="" method="post" enctype="multipart/form-data" class="my-2">
	<div class="form-group">
		<label for="name">Názov:</label>
		<input type="text" class="form-control" id="name" placeholder="Zadajte názov súboru" name="name" required autocomplete="off">
	</div>
	<div class="form-group">
		<label for="description">Popis:</label>
		<input type="text" class="form-control" id="description" placeholder="Zadajte popis súboru" name="description" autocomplete="off">
	</div>
	<div class="form-group">
		<label for="file"><i class="fas fa-upload"></i> Súbor:</label>
        <input type="file" class="form-control-file" id="file" name="file" required>
	</div>


	<input type="submit" class="btn btn-primary" name="add_file" value="Pridať">

</form>