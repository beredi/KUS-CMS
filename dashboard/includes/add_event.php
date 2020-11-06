<?php
if (isset($_SESSION['user_role'])){
    if (strpos($_SESSION['user_role'], 'uzivatel')){
        header('Location: index.php');
    }
}


if (isset($_POST['add_event'])){
    if (isset($_SESSION['user_role'])){


        if (strpos($_SESSION['user_role'], 'admin') || strpos($_SESSION['user_role'], 'moderator') || strpos($_SESSION['user_role'], 'lektor')){



            $event_name = $_POST['event_name'];
            $event_date = $_POST['event_date'];
            $event_time = $_POST['event_time'].'h';
            $event_place = $_POST['event_place'];
            $event_content = $_POST['event_content'];



            $event_photo = $_FILES['event_photo']['name'];
            $event_photo_temp = $_FILES['event_photo']['tmp_name'];
            if(isset($event_photo)){
                if(!empty($event_photo)){
                    move_uploaded_file($event_photo_temp, "../images/events/$event_photo");

                }
                else {
                    echo 'Nastala chyba';
                }
            }

            try{
                include "includes/db.php";


                $query = "INSERT INTO events(event_name, event_date, event_time, event_place, event_content, event_photo) VALUES (:event_name, :event_date, :event_time, :event_place, :event_content, :event_photo )";

                $send_info = $connection->prepare($query);

                $send_info->bindParam(':event_name', $event_name);
                $send_info->bindParam(':event_date', $event_date);
                $send_info->bindParam(':event_time', $event_time);
                $send_info->bindParam(':event_place', $event_place);
                $send_info->bindParam(':event_content', $event_content);
                $send_info->bindParam(':event_photo', $event_photo);
                $send_info->execute();
                echo "<h3 class='text-success'>Podujatie $event_name bolo pridané!</h3>";
            }
            catch (Exception $e){
                echo $e;
            }

        }
        else {
            echo "Nemate opravnenia";
        }

    }
}

?>

<h2>Pridať podujatie</h2>

<div class="col-md-5 col-sm-12">
<form action="" method="post" class="my-2" enctype="multipart/form-data">
    <div class="form-group">
        <label for="event_name">Typ:</label>
        <input type="text" class="form-control" id="event_name" aria-describedby="eventName" placeholder="Zadajte typ podujatia" name="event_name" required autocomplete="off">
        <small id="eventName" class="form-text text-muted">Napríklad: <span class="text-info">Vystúpenie, Zájazd, Dielňa</span></small>
    </div>
    <div class="form-group">
        <label for="event_date">Vyberte dátum uskutočnenia:</label>
        <input type="date" class="form-control" id="event_date" aria-describedby="eventDate" name="event_date">
    </div>
    <div class="form-group">
        <label for="event_time">Čas uskutočnenia:</label>
        <input type="text" class="form-control" id="event_time" aria-describedby="eventTime" name="event_time" placeholder="Zadajte čas uskutočnenia" required  autocomplete="off">
        <small id="eventTime" class="form-text text-muted">Napíšte čas v 24h formáte. Napríklad: <span class="text-info">7.00, 9.15, 18.30, 20.00</span></small>
    </div>
    <div class="form-group">
        <label for="event_place">Miesto uskutočnenia:</label>
        <input type="text" class="form-control" id="event_place" aria-describedby="eventPlace" name="event_place" placeholder="Zadajte miesto uskutočnenia" autocomplete="off" required>
        <small id="eventPlace" class="form-text text-muted">Napríklad: <span class="text-info">Dom kultúry Selenča, Pukanec (SR) a pod.</span></small>
    </div>
    <div class="form-group mt-3">
        <label for="event_photo">Obrázok: <span class="text-danger">(do 10MB!)</span></label>
        <input type="file" class="form-control-file" id="event_photo" name="event_photo">
    </div>
    <div class="form-group">
        <label for="event_content">Krátky opis:</label>
        <textarea placeholder="Napíšte krátky opis o podujatí" name="event_content" class="form-control" rows="3" aria-describedby="eventContent" required></textarea>
        <small id="eventContent" class="form-text text-muted">Napríklad: <span class="text-info">Vystúpenie v rámci osláv osady.</span></small>
    </div>
    <input type="submit" class="btn btn-primary" name="add_event" value="Pridať">



</form>
</div>