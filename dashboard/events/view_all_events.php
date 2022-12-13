<h2>Všetky podujatia</h2>

<table class="table table-hover table-striped" id="podujatia">
    <thead>
    <tr>
        <th>Názov</th>
        <th>Dátum</th>
        <th>Čas</th>
        <th>Miesto</th>
        <th>Opis</th>
        <th>Fotka</th>
		<?php
		if (isset($_SESSION['user_role'])) {
			if (strpos($_SESSION['user_role'], 'uzivatel')) {
			} else {

				echo "
        <th>Upraviť</th>
        <th>Vymazať</th>";
			}
		}
		?>

    </tr>
    </thead>
    <tbody>

	<?php

	try {
		include 'includes/db.php';


		$query = "SELECT * from events ORDER BY event_id DESC";

		$send_info = $connection->prepare($query);

		$send_info->execute();

		while ($row = $send_info->fetch(PDO::FETCH_ASSOC)) {
			$event_id = $row['event_id'];
			$event_name = $row['event_name'];
			$event_date = $row['event_date'];
			$event_time = $row['event_time'];
			$event_place = $row['event_place'];
			$event_image = $row['event_photo'];
			$event_content = $row['event_content'];
			echo "
            
            <tr>
                <td>$event_name</td>
                <td>$event_date</td>
                <td>$event_time</td>
                <td>$event_place</td>
                <td>$event_content</td>
                <td><img src=\"../images/events/$event_image\" alt=\"placeholder\" width=\"100px\"></td>";

			if (isset($_SESSION['user_role'])) {
				if (strpos($_SESSION['user_role'], 'uzivatel')) {

				} else {
					echo "
                     <td class=\"text-right tdWidth\"><a href=\"events.php?source=edit_event&edit=$event_id\"><i class=\"far fa-edit\"></i> Upraviť</a></td>
                     
                <td class=\"text-right tdWidth\"><a href=\"events.php?delete=$event_id\" class='delete-button'><i class=\"far fa-trash-alt\"></i> Vymazať</a></td>
              
            </tr>
                    ";
				}
			}


		}


	} catch (Exception $e) {
		echo $e;
	}
	?>


    </tbody>
</table>


<?php

if (isset($_GET['delete'])) {
	$event_id = $_GET['delete'];
	try { //ziska nazov podla ID
		include 'includes/db.php';


		$query = "SELECT * from events WHERE event_id=:event_id";

		$send_info = $connection->prepare($query);
		$send_info->bindParam(':event_id', $event_id);
		$send_info->execute();


		$result = $send_info->fetch(PDO::FETCH_ASSOC);

		$event_name = $result['event_name'];

	} catch (Exception $e) {
		echo $e;
	}
	if (isset($_SESSION['user_role'])) {
		if (strpos($_SESSION['user_role'], 'admin')) {
			try {
				include 'includes/db.php';

				$query = "DELETE FROM events WHERE event_id=:event_id";


				$send_info = $connection->prepare($query);
				$send_info->bindParam(':event_id', $event_id);
				$send_info->execute();

				// LOG
				include "includes/add_log.php";
				$logAction = "Vymazal podujatie " . $event_name;
				createLog($connection, $logAction, "podujatia");
				header('Location: events.php');
			} catch (Exception $e) {
				echo $e;
			}

		}
	}
}

?>

