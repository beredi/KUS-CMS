<?php
if (isset($_GET['edit'])) {
	$event_id = $_GET['edit'];

	try {

		include "includes/db.php";

		$query = "SELECT * FROM events WHERE event_id = $event_id ";

		$send_info = $connection->prepare($query);

		$send_info->execute();

		while ($row = $send_info->fetch(PDO::FETCH_ASSOC)) {
			$event_name = $row['event_name'];
			$event_date = $row['event_date'];
			$event_time = substr($row['event_time'], 0, -1);
			$event_place = $row['event_place'];
			$event_image = $row['event_photo'];
			$event_content = $row['event_content'];

		}
	} catch (Exception $e) {
		echo $e;
	}
}

if (isset($_SESSION['user_role'])) {

	if (strpos($_SESSION['user_role'], 'admin')) {


		if (isset($_POST['edit_event'])) {
			$event_name = $_POST['event_name'];
			$event_date = $_POST['event_date'];
			$event_time = $_POST['event_time'] . 'h';
			$event_place = $_POST['event_place'];
			$event_content = $_POST['event_content'];


			$event_photo = $_FILES['event_photo']['name'];
			$event_photo_temp = $_FILES['event_photo']['tmp_name'];
			if (isset($event_photo)) {
				if (!empty($event_photo)) {
					move_uploaded_file($event_photo_temp, "../images/events/$event_photo");

				}
			}

			if (empty($event_photo)) {

				try {
					include 'includes/db.php';
					$query = "SELECT * FROM events WHERE event_id = $event_id ";


					$send_info = $connection->prepare($query);

					$send_info->execute();

					while ($row = $send_info->fetch(PDO::FETCH_ASSOC)) {
						$event_photo = $row['event_photo'];
					}

				} catch (Exception $e) {
					echo $e;
				}


			}

			try {
				include "includes/db.php";


				$query = "UPDATE events SET ";

				$query .= "event_name = :event_name, ";
				$query .= "event_date = :event_date, ";
				$query .= "event_time = :event_time, ";
				$query .= "event_photo = :event_photo, ";
				$query .= "event_content = :event_content, ";
				$query .= "event_place = :event_place ";
				$query .= "WHERE event_id = :event_id ";

				$send_info = $connection->prepare($query);

				$send_info->bindParam(':event_name', $event_name);
				$send_info->bindParam(':event_date', $event_date);
				$send_info->bindParam(':event_time', $event_time);
				$send_info->bindParam(':event_place', $event_place);
				$send_info->bindParam(':event_content', $event_content);
				$send_info->bindParam(':event_photo', $event_photo);
				$send_info->bindParam(':event_id', $event_id);
				$send_info->execute();


				echo "<h3 class='text-success'>Podujatie $event_name bolo aktualizované!</h3>";

				// LOG
				include "includes/add_log.php";
				$logAction = "Aktualizoval podujatie " . $event_name;
				createLog($connection, $logAction, "podujatie");
			} catch (Exception $e) {
				echo $e;
			}
		}

	} else {
		header('Location: index.php');
	}
}
?>


<h2>Upraviť podujatie</h2>

<div class="col-md-5 col-sm-12">
    <form action="" method="post" class="my-2" enctype="multipart/form-data">
        <div class="form-group">
            <label for="event_name" class="required">Typ:</label>
            <input type="text" class="form-control" id="event_name" aria-describedby="eventName"
                   placeholder="Zadajte typ podujatia" name="event_name" value="<?php echo $event_name; ?>"
                   autocomplete="off" required>
            <small id="eventName" class="form-text text-muted">Napríklad: <span class="text-info">Vystúpenie, Zájazd, Dielňa</span></small>
        </div>
        <div class="form-group">
            <label for="event_date">Vyberte dátum uskutočnenia:</label>
            <input type="date" class="form-control" id="event_date" aria-describedby="eventDate" name="event_date"
                   value="<?php echo $event_date; ?>">
        </div>
        <div class="form-group">
            <label for="event_time" class="required">Čas uskutočnenia:</label>
            <input type="text" class="form-control" id="event_time" aria-describedby="eventTime" name="event_time"
                   autocomplete="off" placeholder="Zadajte čas uskutočnenia" value="<?php echo $event_time; ?>"
                   required>
            <small id="eventTime" class="form-text text-muted">Napíšte čas v 24h formáte. Napríklad: <span
                        class="text-info">7.00, 9.15, 18.30, 20.00</span></small>
        </div>
        <div class="form-group">
            <label for="event_place" class="required">Miesto uskutočnenia:</label>
            <input type="text" class="form-control" id="event_place" aria-describedby="eventPlace" name="event_place"
                   autocomplete="off" placeholder="Zadajte miesto uskutočnenia" value="<?php echo $event_place; ?>"
                   required>
            <small id="eventPlace" class="form-text text-muted">Napríklad: <span class="text-info">Dom kultúry Selenča, Pukanec (SR) a pod.</span></small>
        </div>
        <div class="form-group mt-3">
            <label for="event_photo">Obrázok: <span class="text-danger">(do 10MB!)</span></label>
            <input type="file" class="form-control-file" id="event_photo" name="event_photo">
            <img src='../images/events/<?php echo $event_image; ?>' alt='image' width="100px">
        </div>
        <div class="form-group">
            <label for="event_content" class="required">Krátky opis:</label>
            <textarea placeholder="Napíšte krátky opis o podujatí" name="event_content" class="form-control" rows="3"
                      aria-describedby="eventContent" required><?php echo $event_content; ?></textarea>
            <small id="eventContent" class="form-text text-muted">Napríklad: <span class="text-info">Vystúpenie v rámci osláv osady.</span></small>
        </div>
        <input type="submit" class="btn btn-primary" name="edit_event" value="Upraviť">


    </form>
</div>
