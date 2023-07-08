<?php

if (isset($_SESSION['user_role'])){

    if(isUser('admin') || isUser('moderator') || isUser('secretary')){
        if (isset($_GET['member_id'])){
            $member_id = $_GET['member_id'];
            $sekcie = [];
            try {
                $query = "SELECT * from sekcie";
                $send_info = $connection->prepare($query);
                $send_info->execute();

                while ($row = $send_info->fetch(PDO::FETCH_ASSOC)) {
                    $sekcie[$row['id']] =$row['name'];
                }
            } catch (Exception $e) {
                echo $e;
            }

            try{
                include "includes/db.php";

                $query = "SELECT * from members WHERE id = $member_id";
                $query2 = "SELECT * from payments WHERE member_id = $member_id AND date LIKE '".date('Y', strtotime('now'))."%'";

                $getPayments = $connection->prepare($query2);
                $getPayments->execute();
                $rowCount = $getPayments->rowCount();
                $userPaid = $rowCount > 0;

                $send_info = $connection->prepare($query);

                $send_info->execute();
                $rows = $send_info->fetch(PDO::FETCH_ASSOC);
                if (gettype($rows) !== 'array'){
                    echo "Nenašiel sa člen s ID $member_id";
                }
                else {
                    ?>
                    <div style="font-size: 20px">
                        <?php
                        if ($userPaid){
                        ?>
                            <div class="row">
                                <p class="p-2 bg-success text-white"><i class="fas fa-dollar-sign"></i> Člen má zaplatené členské na aktuálny rok</p>
                            </div>
                        <?php }
                        else {?>
                            <div class="row">
                                <p class="p-2 bg-danger text-white"><i class="fas fa-dollar-sign"></i> Člen nemá zaplatené členské na aktuálny rok</p>
                            </div>
                        <?php } ?>
                        <div class="row my-2">
                            <h3>Údaje o členovi:</h3>
                        </div>
                        <div class="row">
                            <p><i class="fas fa-user"></i> Meno a priezvisko: <strong class="ml-1"><?=$rows['name']?> <?=$rows['lastname']?></strong></p>
                        </div>
                        <div class="row">
                            <p><i class="fas fa-users"></i> Sekcie:

                                <?php

                                $sekcieArray = explode(',',$rows['sekcie']);
                                if ($sekcieArray) {
                                    $firstElement = true;
                                    foreach ($sekcieArray as $sekciaId) {
                                    ?>
                                        <strong class="ml-1"><?=!$firstElement ? ' | ' : ''?><?=$sekcie[$sekciaId]?></strong>
                                    <?php
                                        $firstElement = false;
                                    }
                                }

                                ?></p>
                        </div>
                        <div class="row">
                            <p><i class="fas fa-calendar"></i> Dátum narodenia: <strong class="ml-1"><?=date('d. m. Y', strtotime($rows['dateofbirth']))?></strong></p>
                        </div>
                        <div class="row">
                            <p><i class="fas fa-map-marker"></i> Adresa: <strong class="ml-1"><?=$rows['adress']?></strong></p>
                        </div>
                        <div class="row">
                            <p><i class="fas fa-id-card-alt"></i> JMBG: <strong class="ml-1"><?=$rows['JMBG']?></strong></p>
                        </div>
                        <div class="row">
                            <p><i class="fas fa-phone"></i> Telefónne číslo: <strong class="ml-1"><?=$rows['number']?></strong></p>
                        </div>
                        <div class="row">
                            <p><i class="fas fa-envelope"></i> Email: <strong class="ml-1"><?=$rows['email']?></strong></p>
                        </div>
                        <div class="row">
                            <p>Číslo pasu: <strong class="ml-1"><?=$rows['passnumber']?></strong></p>
                        </div>
                        <div class="row">
                            <p>Rok zapojenia sa do spolku: <strong class="ml-1"><?=$rows['year']?></strong></p>
                        </div>
                        <?php
                         if (!empty($rows['passscan'])){
                        ?>
                            <div class="row">
                                Scan pasu: <strong class="ml-1"><a href='../images/pass-scan/<?=$rows['passscan']?>' target='_blank'>LINK</a></strong>
                            </div>
                        <?php
                            }
                        ?>
                    </div>
                    <div class="row mt-5">
                        <h3 class="font-weight-bold">História platieb</h3>
                    </div>
                    <div class="row py-2">
                        <a href="members.php?source=new_payment&member_id=<?=$rows['id']?>" class="btn btn-success"><i class="fas fa-plus-circle"></i> Nová platba</a>
                    </div>
                    <?php
                    try {
                    include "includes/db.php";

                    $query = "SELECT * from payments WHERE member_id = $member_id ORDER BY id DESC";

                    $send_info = $connection->prepare($query);

                    $send_info->execute();
                    $payRows = $send_info->rowCount();
                        if ($payRows === 0){
                            echo "Žiadne platby pre člena " . $rows['name'] . " " . $rows['lastname'];
                        }
                        else {?>
                            <table class="table table-hover table-striped" id="payments">
                                <thead>
                                <tr>
                                <thead>
                                <tr>
                                    <th>Dátum</th>
                                    <th>Cena [RSD]</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>

                                <?php
                                    while ($newRow = $send_info->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                        <tr>
                                            <td><?=date('d. m. Y',strtotime($newRow['date']))?></td>
                                            <td><?=$newRow['value']?></td>
                                            <td><a href="members.php?delete_payment=<?=$newRow['id']?>" class="btn btn-danger"><i class="far fa-trash-alt"></i> Vymazať</a> </td>
                                        </tr>
                                <?php
                                    }
                                ?>
                                </tbody>
                            </table>
                        <?php

                        }

                    }
                    catch (Exception $e){
                            echo $e;
                        }
                        ?>


                    <script>
                        $(document).ready(function () {
                            $('#payments').DataTable({
                                "order": [],
                                "pageLength": 10
                            });
                        });
                    </script>

<?php
                }

            }
            catch (Exception $e){
                echo $e;
            }
        }

    }
    else{
        header('Location: index.php');
    }
}

?>

