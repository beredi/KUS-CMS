<div class="row">
    <div class="col-sm-12">
        <h3>Sekcie</h3>
        <?php
        try {
            include 'includes/db.php';

            $query = "SELECT * FROM sekcie ORDER BY id DESC";
            $send_info = $connection->prepare($query);

            $send_info->execute();
            ?>
            <table class="table table-striped" id="sekcieTable">
            <thead>
                <tr>
                    <th>Názov</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php
            while ($row = $send_info->fetch(PDO::FETCH_ASSOC)) {
                $sekciaId = $row['id'];
                $sekciaName = $row['name']; ?>
                    <tr>
                        <td><?=$sekciaName?></td>
                        <td><a href="settings.php?source=edit_section&edit=<?=$sekciaId?>"><i class="far fa-edit"></i> Upraviť</a> |
                            <a href="settings.php?delete=<?=$sekciaId?>" class='delete-button text-danger'><i class="far fa-trash-alt"></i> Vymazať</a></td>
                    </tr>
                <?php
            }
        } catch (Exception $e) {
            echo $e;
        }?>
            </tbody>
            </table>
        <form method="post" action="settings/addNewSection.php">
            <div class="form-group d-flex flex-row justify-content-end mt-2">
                <input type="text" placeholder="Zadajte názov sekcie..." class="form-control w-75" name="sekciaName" id="sekciaName">
                <input type="submit" class="btn btn btn-success" value="Pridať novú sekciu" name="addSection">
            </div>
        </form>
    </div>
</div>


<?php

if (isset($_GET['delete'])) {
    $sekcia_id = $_GET['delete'];
    try { //ziska nazov podla ID
        include 'includes/db.php';


        $query = "SELECT * from sekcie WHERE id=:id";

        $send_info = $connection->prepare($query);
        $send_info->bindParam(':id', $sekcia_id);
        $send_info->execute();


        $result = $send_info->fetch(PDO::FETCH_ASSOC);

        $sekcia_name = $result['name'];

    } catch (Exception $e) {
        echo $e;
    }

    if (isset($_SESSION['user_role'])) {


        if (strpos($_SESSION['user_role'], 'admin')) {

            try {
                include 'includes/db.php';

                $query = "DELETE FROM sekcie WHERE id=:id";

                $send_info = $connection->prepare($query);
                $send_info->bindParam(':id', $sekcia_id);
                $send_info->execute();

                // LOG
                include "includes/add_log.php";
                $logAction = "Vymazal sekciu " . $sekcia_name;
                createLog($connection, $logAction, "sekcie");

                header('Location: settings.php');
            } catch (Exception $e) {
                echo $e;
            }
        }
    }

}

?>
