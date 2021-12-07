<?php

if (isset($_SESSION['user_role']) && isset($_GET['edit'])) {

	if (isset($_POST['edit_file'])) {

        $id = $_GET['edit'];

		$name = $_POST['name'];
		$description = $_POST['description'];
        if($setFile = !empty($_FILES['file']['name'])){
	        $file = $_FILES['file']['name'];
	        $file_temp = $_FILES['file']['tmp_name'];
        }
		try {
			include "includes/db.php";

            if ($setFile){
	            $query = "UPDATE files SET name=:name, file=:file, description = :description WHERE id=:id";
	            $send_info = $connection->prepare($query);
	            $send_info->bindParam(':file', $file);
            }
            else{
	            $query = "UPDATE files SET name=:name, description = :description WHERE id=:id";
	            $send_info = $connection->prepare($query);
            }

			$send_info->bindParam(':id', $id);
			$send_info->bindParam(':name', $name);
			$send_info->bindParam(':description', $description);

			$send_info->execute();

			// LOG
			include "includes/add_log.php";
			$logAction = "Upravil súbor " . $name;
			createLog($connection, $logAction, "files");

			header('Location: files.php');


		} catch (Exception $e) {
			echo $e;
		}
	}
	if (isset($_GET['edit'])){
		$id = $_GET['edit'];
		try {
			include "includes/db.php";


			$query = "SELECT * FROM files WHERE id=:id";

			$send_info = $connection->prepare($query);
			$send_info->bindParam(':id', $id);
			$send_info->execute();
			$file = $send_info->fetch(PDO::FETCH_ASSOC);
			?>

			<h2>Upraviť súbor</h2>
            <form action="" method="post" enctype="multipart/form-data" class="my-2">
            <div class="form-group">
                <label for="name">Názov:</label>
                <input type="text" class="form-control" id="name" placeholder="Zadajte názov súboru" name="name" required autocomplete="off" value="<?=$file['name']?>">
            </div>
            <div class="form-group">
                <label for="description">Popis:</label>
                <input type="text" class="form-control" id="description" placeholder="Zadajte popis súboru" name="description" autocomplete="off" value="<?=$file['description']?>">
            </div>
            <div class="form-group">
                <label for="file"><i class="fas fa-upload"></i> Súbor:</label>
                <input type="file" class="form-control-file" id="file" name="file">
            </div>


            <input type="submit" class="btn btn-primary" name="edit_file" value="Upraviť">


            </form>
<?php


		} catch (Exception $e) {
			echo $e;
		}
	}
}


?>
