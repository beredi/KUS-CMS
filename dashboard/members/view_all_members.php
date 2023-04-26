<div class="row">
    <div class="col-md-12" style="margin-bottom: 10px; padding: 10px 20px">
        <a href="#" class="btn btn-info btn-sm" id="random-member" name="all"><i class="fas fa-random"></i> Vybrať
            náhodne člena</a>
        <a href="#" class="btn btn-primary btn-sm" id="random-male" name="M"><i class="fas fa-male"></i> Vybrať náhodne
            muža</a>
        <a href="#" class="btn btn-danger btn-sm" id="random-female" name="F"><i class="fas fa-female"></i> Vybrať
            náhodne ženu</a>

        <form action="members/mebmers_export.php" method="post" style="display: inline;">
            <button type="submit" name='export-to-excel' class="btn btn-success btn-sm" style="margin-left: 10px;"
                    id="export-to-excel-members"><i class="fas fa-file-excel"></i> Export do CSV
            </button>
        </form>
    </div>
</div>
<h2 style="float: left;">Zoznam všetkých členov</h2>
<a href="members.php?source=add_member" class="btn-primary btn" style="float: right;">Pridať člena</a>

<table class="table table-hover table-striped" id="uzivatelia">
	<thead>
	<tr>
        <th></th>
        <th></th>
        <th>Titul</th>
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

	try {
		include 'includes/db.php';


		$query = "SELECT * from members ORDER BY id DESC";

		$send_info = $connection->prepare($query);

		$send_info->execute();

		while ($row = $send_info->fetch(PDO::FETCH_ASSOC)) {
			$id = $row['id'];
			$name = $row['name'];
			$lastname = $row['lastname'];
			$degree = $row['degree'];
			$dateofbirth = $row['dateofbirth'];
			$adress = $row['adress'];
			$JMBG = $row['JMBG'];
			$number = $row['number'];
			$email = $row['email'];
			$passnumber = $row['passnumber'];
			$year = $row['year'];
			$passscan = $row['passscan'];

            $query2 = "SELECT * from payments WHERE member_id = $id AND date LIKE '".date('Y', strtotime('now'))."%'";
            $getPayments = $connection->prepare($query2);
            $getPayments->execute();
            $rowCount = $getPayments->rowCount();
            $userPaid = $rowCount > 0;

            echo "<tr>";
            if ($userPaid){
                echo "<td><p class='bg-success text-white text-center p-1 rounded' title='Člen zaplatil za aktuálny rok'><i class=\"fas fa-dollar-sign\"></i></p></td>";
            }
            else {
                echo "<td><p class='bg-danger text-white text-center p-1 rounded' title='Člen nezaplatil za aktuálny rok'><i class=\"fas fa-dollar-sign\"></i></p></td>";
            }

			echo "     
                <td><a href='members.php?source=show_member&member_id=$id'><i class=\"fas fa-eye font-weight-bold text-primary\" style='font-size: 20px'></i></a></td>
                <td>$degree</td>
                <td>$name</td>
                <td>$lastname</td>
                <td>" . date('d.m.Y', strtotime($dateofbirth)) . "</td>
                <td>$adress</td>
                <td>$JMBG</td>
                <td>$number</td>
                <td>$email</td>
                <td>$passnumber</td>
                <td>$year</td>
                <td>";

			if (!empty($passscan)) {
				echo "<a href='../images/pass-scan/$passscan' target='_blank'>LINK</a>";
			}
			echo "</td>
                <td class=\"text-right tdWidth\">";
			if (isUser('admin') || isUser('moderator') || isUser('secretary')) {
				echo "<a href=\"members.php?source=edit_member&edit={$id}\"><i class=\"far fa-edit\"></i> Upraviť</a>
                ";
			}

			echo " </td>
                <td class=\"text-right tdWidth\">";
			if (isUser('admin') || isUser('moderator') || isUser('secretary')) {
				echo "<a href=\"members.php?delete=$id\" class='delete-button'><i class=\"far fa-trash-alt\"></i> Vymazať</a>";
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

<script src="members/js/randomMember.js" lang="js"></script>

<?php

if (isset($_GET['delete'])) {
	$id = $_GET['delete'];
	try { //ziska nazov podla ID
		include 'includes/db.php';


		$query = "SELECT * from members WHERE id=:id";

		$send_info = $connection->prepare($query);
		$send_info->bindParam(':id', $id);
		$send_info->execute();


		$result = $send_info->fetch(PDO::FETCH_ASSOC);

		$name = $result['name'] . ' ' . $result['lastname'];

	} catch (Exception $e) {
		echo $e;
	}

	if (isset($_SESSION['user_role'])) {
		if (isUser('admin') || isUser('moderator') || isUser('secretary')) {

			try {
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
			} catch (Exception $e) {
				echo $e;
			}
		}
	}
}

?>


<script>
    $(document).ready(function () {
        $('#uzivatelia').DataTable({
            "order": [],
            "pageLength": 10
        });
    });
</script>
