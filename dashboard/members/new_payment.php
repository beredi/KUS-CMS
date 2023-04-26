<?php

if (isset($_SESSION['user_role'])) {

    if (isUser('admin') || isUser('moderator') || isUser('secretary')) {

        if (isset($_POST['new_payment'])){
            $postId = $_POST['member_id'];
            $value = $_POST['value'];
            $date = $_POST['date'];

            try {
                include "includes/db.php";


                $query = "INSERT INTO payments(member_id, value, date) VALUES (:member_id, :value , :date) ";

                $send_info = $connection->prepare($query);

                $send_info->bindParam(':member_id', $postId);
                $send_info->bindParam(':value', $value);
                $send_info->bindParam(':date', $date);

                $send_info->execute();

                // LOG
                include "includes/add_log.php";
                $logAction = "Pridal platbu pre pouzivatela s ID: " . $postId;
                createLog($connection, $logAction, "členovia");

                header('Location: members.php?source=show_member&member_id='.$postId);

                }
            catch (Exception $e) {
                echo $e;
            }
        }

        if (isset($_GET['member_id'])) {
            $member_id = $_GET['member_id'];
            try {
                include "includes/db.php";

                $query = "SELECT * from members WHERE members.id = $member_id";

                $send_info = $connection->prepare($query);

                $send_info->execute();
                $rows = $send_info->fetch(PDO::FETCH_ASSOC);
                if (gettype($rows) !== 'array') {
                    echo "Nenašiel sa člen s ID $member_id";
                } else {
                    $fullName = $rows['name'] . ' ' . $rows['lastname'];
                    ?>
                <div class="row">
                    <div class="col-md-2">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="member">Nová platba pre člena</label>
                                <input type="text" class="form-control" id="member" value="<?=$fullName?>" name="member" disabled>
                                <input type="hidden" value="<?=$rows['id']?>" name="member_id">
                            </div>
                            <div class="form-group">
                                <label for="value">Cena</label>
                                <input type="number" class="form-control" id="value" value="500" name="value">
                            </div>
                            <div class="form-group">
                                <label for="value">Dátum platby</label>
                                <input type="date" class="form-control" id="date" value="<?=date('Y-m-d', strtotime('now'))?>" name="date">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-success" name="new_payment" value="Nová platba">
                            </div>
                        </form>
                    </div>
                </div>


<?php

                }
            } catch (Exception $e) {
                echo $e;
            }
        }
    }
}
else{
    header('Location: index.php');
}
?>