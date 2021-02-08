<?php
                if (strpos($_SESSION['user_role'],'admin')){?>
                    <a href="tutorials.php?source=add_tutorial" class="btn btn-success">Pridať tutorial</a>
                <?php
                }

try{
    include 'includes/db.php';

    $query = "SELECT * FROM tutorials ORDER BY id DESC";
    $send_info = $connection->prepare($query);

    $send_info->execute();

    while ($row = $send_info->fetch(PDO::FETCH_ASSOC)){
        $tutorial_id = $row['id'];
        $code = $row['code'];
        $title = $row['title'];
        $description = $row['description'];?>
        <div class="row" style="margin: 10px; border-bottom: 1px solid #9d9d9d">
            <div class="col-sm-12">
                <h4 class="text-info font-weight-bold" style="font-size: 18px;"><?=$title?></h4><a href="tutorials.php?delete=<?=$tutorial_id?>" class="btn btn-danger float-right"><i class="far fa-trash-alt"></i> Vymazať</a>
            </div>
            <div class="col-sm-12">
                <p class="text-muted" style="font-size: 12px;"><?=$description?></p>
            </div>
            <div class="col-sm-12">
                <!--  iframe width="" height="" $CODE  -->
                <iframe width="100%" height="315" <?=$code?>></iframe>
            </div>
        </div>
        <?php
    }
}
catch (Exception $e){
    echo $e;
}


if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    try { //ziska nazov podla ID
        include 'includes/db.php';


        $query = "SELECT * from tutorials WHERE id=:id";

        $send_info = $connection->prepare($query);
        $send_info->bindParam(':id', $id);
        $send_info->execute();


        $result = $send_info->fetch(PDO::FETCH_ASSOC);

        $tutorial = $result['title'];

    } catch (Exception $e) {
        echo $e;
    }

    if (isset($_SESSION['user_role'])) {
        if (strpos($_SESSION['user_role'], 'admin')) {

            try {
                include 'includes/db.php';

                $query = "DELETE FROM tutorials WHERE id=:id";


                $send_info = $connection->prepare($query);
                $send_info->bindParam(':id', $id);
                $send_info->execute();
                // LOG
                include "includes/add_log.php";
                $logAction = "Vymazal tutorial " . $tutorial;
                createLog($connection, $logAction, "tutorialy");
                header('Location: tutorials.php');
            } catch (Exception $e) {
                echo $e;
            }
        }
    }
}


?>



