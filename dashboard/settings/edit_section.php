<?php
if (isset($_GET['edit'])) {
    $sekcia_id = $_GET['edit'];
    include 'includes/db.php';
    try {

        $query = "SELECT * FROM sekcie WHERE id = " . $sekcia_id;
        $send_info = $connection->prepare($query);

        $send_info->execute();

        $sekcia = $send_info->fetch(PDO::FETCH_ASSOC);

        /// DOKONCI ZISKANIE TEJ KONKRETNEJ SEKCIE A POTOM JU UPRAV DO FORMULARA ZA EDIT
    } catch (Exception $e) {
        echo $e;
    }

    if (isset($_POST['editSection'])) {
        $name = $_POST['sekciaName'];
        try {

            $query = "UPDATE sekcie SET name = :name WHERE id = " . $sekcia_id;
            $send_info = $connection->prepare($query);

            $send_info->bindParam(':name', $name);

            $send_info->execute();

            // LOG
            include "includes/add_log.php";
            $logAction = "Upravil sekciu " . $name;
            createLog($connection, $logAction, "sekcie");

            header('Location: settings.php');
        } catch (Exception $e) {
            echo $e;
        }
    }

}
?>
<form method="post" action="">
    <div class="form-group">
        <input type="text" placeholder="Zadajte názov sekcie..." class="form-control mt-2" name="sekciaName" id="sekciaName" value="<?=$sekcia['name']?>">
        <input type="submit" class="btn btn btn-success mt-2" value="Upraviť sekciu" name="editSection">
    </div>
</form>