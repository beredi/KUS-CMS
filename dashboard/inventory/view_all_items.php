

<h2>Všetky položky</h2>
<a href="inventory.php?source=add_item" class="btn btn-primary" style="margin-bottom: 5px;">Pridať položku</a>
<form action="inventory/inventory_controller.php" method="post" style="display: inline">
    <button type="submit" name='export-to-excel' class="btn btn-success" style="margin-bottom: 5px;" id="export-to-excel-inventory"><i class="fas fa-file-excel"></i> Export do CSV</button>
</form>

<table class="table table-hover table-striped" id="clanky">
	<thead>
	<tr>
		<th>ID</th>
		<th>Názov</th>
		<th>Počet</th>
		<th>Počet na sklade</th>
	</tr>
	</thead>
	<tbody>

	<?php

	try{
		include 'includes/db.php';


		$query = "SELECT * from inventory ORDER BY id ASC";
		$send_info = $connection->prepare($query);

		$send_info->execute();
		while ($row = $send_info->fetch(PDO::FETCH_ASSOC)) {
			$id = $row['id'];
			$name = $row['name'];
			$count = $row['count'];
			$actual_count = $row['actual_count'];
			echo "            
            <tr>
                <td>$id</td>
                <td>$name</td>
                <td>$count</td>
                <td>$actual_count</td>
              <td class=\"tdWidth\"><a href=\"inventory.php?source=edit_item&edit={$id}\"><i class=\"far fa-edit\"></i> Upraviť</a></td>
            <td class=\"tdWidth\">";
			if (isUser('admin')){
				echo  " <a class='delete-button' href=\"inventory.php?delete=$id\"><i class=\"far fa-trash-alt\"></i> Vymazať</a>
            ";
			}
			echo "</td>
            </tr>";


		}


	}
	catch (Exception $e){
		echo $e;
	}
	?>


	</tbody>
</table>


<?php

if (isset($_GET['delete'])){
	$id = $_GET['delete'];
	try{ //ziska nazov podla ID
		include 'includes/db.php';


		$query = "SELECT * from inventory WHERE id=:id";

		$send_info = $connection->prepare($query);
		$send_info->bindParam(':id', $id);
		$send_info->execute();
		$result = $send_info->fetch(PDO::FETCH_ASSOC);
		$name = $result['name'];

	}
	catch (Exception $e){
		echo $e;
	}

	if (isset($_SESSION['user_role'])){


		if (isUser('admin')){

			try{
				include 'includes/db.php';

				$query = "DELETE FROM inventory WHERE id=:id";


				$send_info = $connection->prepare($query);
				$send_info->bindParam(':id', $id);
				$send_info->execute();

				// LOG
				include "includes/add_log.php";
				$logAction = "Vymazal položku " . $name;
				createLog($connection, $logAction, "inventár");

				header('Location: inventory.php');
			}
			catch (Exception $e){
				echo $e;
			}
		}
	}

}

?>

