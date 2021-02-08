<?php
if (isset($_GET['edit'])) {
	$id = $_GET['edit'];

	try {

		include "includes/db.php";

		$query = "SELECT * FROM inventory WHERE id = $id ";

		$send_info = $connection->prepare($query);

		$send_info->execute();

		while ($row = $send_info->fetch(PDO::FETCH_ASSOC)) {
			$name = $row['name'];
			$count = $row['count'];
			$actual_count = $row['actual_count'];

		}
	}
	catch (Exception $e){
		echo $e;
	}
}

if (isset($_SESSION['user_role'])){

	if (isUser('admin') || isUser('moderator')){


		if (isset($_POST['edit_item'])){
			$name = $_POST['name'];
			$count = $_POST['count'];
			$actual_count = $_POST['actual_count'];

			try{
				include "includes/db.php";


				$query = "UPDATE inventory SET ";

				$query .= "name = :name, ";
				$query .= "count = :count, ";
				$query .= "actual_count = :actual_count ";
				$query .= "WHERE id = :id ";

				$send_info = $connection->prepare($query);

				$send_info->bindParam(':name', $name);
				$send_info->bindParam(':count', $count);
				$send_info->bindParam(':actual_count', $actual_count);
				$send_info->bindParam(':id', $id);
				$send_info->execute();


				// LOG
				include "includes/add_log.php";
				$logAction = "Aktualizoval položku " . $name;
				createLog($connection, $logAction, "inventár");
				header('Location: inventory.php');
			}
			catch (Exception $e){
				echo $e;
			}
		}

	}
	else {
		header('Location: index.php');
	}
}
?>





<h2>Upraviť podujatie</h2>

<div class="col-md-5 col-sm-12">
	<form action="" method="post" class="my-2" enctype="multipart/form-data">
		<div class="form-group">
			<label for="name">Názov:</label>
			<input type="text" class="form-control" id="name" aria-describedby="name" placeholder="Zadajte názov" name="name" required autocomplete="off" value="<?=$name?>">
		</div>
		<div class="form-group">
			<label for="count">Počet:</label>
			<input type="number" class="form-control" id="count" aria-describedby="count" name="count" value="<?=$count?>">
		</div>
		<div class="form-group">
			<label for="actual_count">Počet na sklade:</label>
			<input type="number" class="form-control" id="actual_count" aria-describedby="actual_count" name="actual_count" required  autocomplete="off" value="<?=$actual_count?>">
		</div>
		<input type="submit" class="btn btn-primary" name="edit_item" value="Upraviť">



	</form>
</div>