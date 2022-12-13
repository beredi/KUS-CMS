<h2 style="float: left;">Zoznam všetkých videov</h2>
<a href="../videogallery.php" class="btn-info btn" style="float: right;" target="_blank"><i class=\"fab
                                                                                            fa-youtube\"></i> Zobraziť
    videogalériu</a>
<a href="?source=add_video" style="float: right; margin-right: 10px;" class="btn-success btn"><i
            class="fas fa-plus-circle"></i> Pridať nové video</a>

<table class="table table-hover table-striped" id="videos">
    <thead>
    <tr>
        <th>Názov</th>
        <th>Kód</th>
        <th>Upraviť</th>
        <th>Vymazať</th>
    </tr>
    </thead>
    <tbody>

	<?php

	try {
		include 'includes/db.php';


		$query = "SELECT * from videogallery ORDER BY id DESC";

		$send_info = $connection->prepare($query);

		$send_info->execute();

		while ($row = $send_info->fetch(PDO::FETCH_ASSOC)) {
			$id = $row['id'];
			$title = $row['title'];
			$code = $row['code'];


			echo "
            
            <tr>
                <td>$title</td>
                <td>$code</td>
                <td class=\"text-right tdWidth\">";
			if (isUser('admin') || isUser('moderator')) {
				echo "<a href=\"videogallery.php?source=edit_video&edit={$id}\"><i class=\"far fa-edit\"></i> Upraviť</a>
                ";
			}

			echo " </td>
                <td class=\"text-right tdWidth\">";
			if (isUser('admin') || isUser('moderator')) {
				echo "<a href=\"videogallery.php?delete=$id\" class='delete-button'><i class=\"far fa-trash-alt\"></i> Vymazať</a>";
			}
			echo "</td>
            </tr>
            ";

		}


	} catch (Exception $e) {
		echo $e;
	}
	?>


    </tbody>
</table>

<?php

if (isset($_GET['delete'])) {
	$id = $_GET['delete'];
	try { //ziska nazov podla ID
		include 'includes/db.php';


		$query = "SELECT * from videogallery WHERE id=:id";

		$send_info = $connection->prepare($query);
		$send_info->bindParam(':id', $id);
		$send_info->execute();


		$result = $send_info->fetch(PDO::FETCH_ASSOC);

		$title = $result['title'];

	} catch (Exception $e) {
		echo $e;
	}

	if (isset($_SESSION['user_role'])) {
		if (isUser('admin') || isUser('moderator')) {

			try {
				include 'includes/db.php';

				$query = "DELETE FROM videogallery WHERE id=:id";


				$send_info = $connection->prepare($query);
				$send_info->bindParam(':id', $id);
				$send_info->execute();
				// LOG
				include "includes/add_log.php";
				$logAction = "Vymazal video " . $title;
				createLog($connection, $logAction, "videogallery");
				header('Location: videogallery.php');
			} catch (Exception $e) {
				echo $e;
			}
		}
	}
}

?>


<script>
    $(document).ready(function () {
        $('#videos').DataTable({
            "order": [],
            "pageLength": 10
        });
    });
</script>
