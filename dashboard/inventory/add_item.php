<?php
if (isset($_SESSION['user_role'])) {
	if (isUser('uzivatel')) {
		header('Location: index.php');
	}
}


if (isset($_POST['add_item'])) {
	if (isset($_SESSION['user_role'])) {


		if (!isUser('uzivatel')) {
			$name = $_POST['name'];
			$count = $_POST['count'];
			$actual_count = $_POST['actual_count'];
			try {
				include "includes/db.php";


				$query = "INSERT INTO inventory(name, count, actual_count) VALUES (:name, :count, :actual_count)";

				$send_info = $connection->prepare($query);

				$send_info->bindParam(':name', $name);
				$send_info->bindParam(':count', $count);
				$send_info->bindParam(':actual_count', $actual_count);
				$send_info->execute();
				echo "<h3 class='text-success'>Položka $name bola pridaná!</h3>";
				// LOG
				include "includes/add_log.php";
				$logAction = "Pridal položku " . $name;
				createLog($connection, $logAction, "inventár");
			} catch (Exception $e) {
				echo $e;
			}

		} else {
			echo "Nemate opravnenia";
		}

	}
}

?>

<h2>Pridať položku</h2>

<div class="col-md-5 col-sm-12">
    <form action="" method="post" class="my-2" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name" class="required">Názov:</label>
            <input type="text" class="form-control" id="name" aria-describedby="name" placeholder="Zadajte názov"
                   name="name" required autocomplete="off">
        </div>
        <div class="form-group">
            <label for="count">Počet:</label>
            <input type="number" class="form-control" id="count" aria-describedby="count" name="count">
        </div>
        <div class="form-group">
            <label for="actual_count" class="required">Počet na sklade:</label>
            <input type="number" class="form-control" id="actual_count" aria-describedby="actual_count"
                   name="actual_count" required autocomplete="off">
        </div>
        <input type="submit" class="btn btn-primary" name="add_item" value="Pridať">


    </form>
</div>
