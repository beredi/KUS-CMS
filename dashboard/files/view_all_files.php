<h2 style="float: left;">Zoznam všetkých súborov</h2>
<a href="../download.php" class="btn-info btn" style="float: right;" target="_blank"><i class=\"fab fa-youtube\"></i>
    Zobraziť súbory</a>
<a href="?source=add_file" style="float: right; margin-right: 10px;" class="btn-success btn"><i
            class="fas fa-plus-circle"></i> Pridať nový súbor</a>

<table class="table table-hover table-striped" id="files">
    <thead>
    <tr>
        <th>Názov</th>
        <th>Popis</th>
        <th>Súbor</th>
        <th>Upraviť</th>
        <th>Vymazať</th>
    </tr>
    </thead>
    <tbody>

	<?php

	try {
		include 'includes/db.php';


		$query = "SELECT * from files ORDER BY id DESC";

		$send_info = $connection->prepare($query);

		$send_info->execute();

		while ($row = $send_info->fetch(PDO::FETCH_ASSOC)) {
			$id = $row['id'];
			$name = $row['name'];
			$file = $row['file'];
			$description = $row['description'];


			echo "
            
            <tr>
                <td>$name</td>
                <td>$description</td>
                <td>$file</td>
                <td class=\"text-right tdWidth\">";
			if (isUser('admin') || isUser('moderator')) {
				echo "<a href=\"files.php?source=edit_file&edit={$id}\"><i class=\"far fa-edit\"></i> Upraviť</a>
                ";
			}

			echo " </td>
                <td class=\"text-right tdWidth\">";
			if (isUser('admin') || isUser('moderator')) {
				echo "<a href=\"files.php?delete=$id\" class='delete-button'><i class=\"far fa-trash-alt\"></i> Vymazať</a>";
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


		$query = "SELECT * from files WHERE id=:id";

		$send_info = $connection->prepare($query);
		$send_info->bindParam(':id', $id);
		$send_info->execute();


		$result = $send_info->fetch(PDO::FETCH_ASSOC);

		$name = $result['name'];

	} catch (Exception $e) {
		echo $e;
	}

	if (isset($_SESSION['user_role'])) {
		if (isUser('admin') || isUser('moderator')) {

			try {
				include 'includes/db.php';

				$query = "DELETE FROM files WHERE id=:id";


				$send_info = $connection->prepare($query);
				$send_info->bindParam(':id', $id);
				$send_info->execute();
				// LOG
				include "includes/add_log.php";
				$logAction = "Vymazal súbor " . $name;
				createLog($connection, $logAction, "files");
				header('Location: files.php');
			} catch (Exception $e) {
				echo $e;
			}
		}
	}
}

?>


<script>
    $(document).ready(function () {
        $('#files').DataTable({
            "order": [],
            "pageLength": 10
        });
    });
</script>
