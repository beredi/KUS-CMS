<div class="row">
	<div class="col-md-12" style="margin-bottom: 10px; padding: 10px 20px">
		<a href="#" class="btn btn-success btn-sm"><i class="fas fa-file-excel"></i> Export do Excelu</a>
	</div>
</div>
<h2 style="float: left;">Zoznam všetkých členov</h2>
<a href="members.php?source=add_member" class="btn-primary btn" style="float: right;">Pridať člena</a>

<table class="table table-hover table-striped" id="uzivatelia">
	<thead>
	<tr>
		<th>Meno</th>
		<th>Priezvisko</th>
		<th>Dátum narodenia</th>
		<th>Adresa</th>
		<th>JMBG</th>
		<th>Telefónne číslo</th>
		<th>Email</th>
		<th>Číslo pasu</th>
        <th>Rok zapojenia sa</th>
        <th>Scan cestovného pasu</th>
        <th>Upraviť</th>
        <th>Vymazať</th>
	</tr>
	</thead>
	<tbody>

	<?php

	try{
		include 'includes/db.php';


		$query = "SELECT * from members ORDER BY id DESC";

		$send_info = $connection->prepare($query);

		$send_info->execute();

		while ($row = $send_info->fetch(PDO::FETCH_ASSOC)) {
			$id = $row['id'];
			$name = $row['name'];
			$lastname = $row['lastname'];
			$dateofbirth = $row['dateofbirth'];
			$adress = $row['adress'];
			$JMBG = $row['JMBG'];
			$number = $row['number'];
			$email = $row['email'];
			$passnumber = $row['passnumber'];
			$year = $row['year'];
			$passscan = $row['passscan'];


			echo "
            
            <tr>
                <td>$name</td>
                <td>$lastname</td>
                <td>".date('d.m.Y', strtotime($dateofbirth))."</td>
                <td>$adress</td>
                <td>$JMBG</td>
                <td>$number</td>
                <td>$email</td>
                <td>$passnumber</td>
                <td>$year</td>
                <td>";

			if (!empty($passscan)){
				echo "<a href='../images/pass-scan/$passscan' target='_blank'>LINK</a>";
            }
            echo "</td>
                <td class=\"text-right tdWidth\">";
			if (isUser('admin') || isUser('moderator')){
				echo "<a href=\"members.php?source=edit_member&edit={$id}\"><i class=\"far fa-edit\"></i> Upraviť</a>
                ";
			}

			echo " </td>
                <td class=\"text-right tdWidth\">";
			if (isUser('admin') || isUser('moderator')){
				echo "<a href=\"members.php?delete=$id\" class='delete-button'><i class=\"far fa-trash-alt\"></i> Vymazať</a>";
			}
			echo    "</td>
            </tr>
            ";

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


		$query = "SELECT * from members WHERE id=:id";

		$send_info = $connection->prepare($query);
		$send_info->bindParam(':id', $id);
		$send_info->execute();


		$result = $send_info->fetch(PDO::FETCH_ASSOC);

		$name = $result['name'].' '.$result['lastname'];

	}
	catch (Exception $e){
		echo $e;
	}

	if (isset($_SESSION['user_role'])){
		if (isUser('admin') || isUser('moderator')){

			try{
				include 'includes/db.php';

				$query = "DELETE FROM members WHERE id=:id";


				$send_info = $connection->prepare($query);
				$send_info->bindParam(':id', $id);
				$send_info->execute();
				// LOG
				include "includes/add_log.php";
				$logAction = "Vymazal člena " . $name;
				createLog($connection, $logAction, "členovia");
				header('Location: members.php');
			}
			catch (Exception $e){
				echo $e;
			}
		}
	}
}

?>

