<?php ob_start(); ?>



<?php
include "includes/header.php"; //INCLUDE HEADER
?>
<!--MOBILE NAVBAR-->
<?php
include "includes/mobile-navigation.php"; //INCLUDE NAVIGATION FOR MOBILE
?>


<?php
?>
<?php
if (isset($_SESSION['user_role'])){
    if (!strpos($_SESSION['user_role'],'admin')){
        header('Location: index.php');
    }
}
?>
<!--LG SCREEN NAVBAR-->
<div class="col-md-10 col-sm-12 d-none d-md-inline">


    <a class="float-left text-light mt-2" href="../index.php" target="_blank"><i class="fas fa-external-link-alt"></i> Zobraziť stránku</a>
    <!--    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">-->


    <!--        USER INFO-->

    <?php
    include 'includes/profile_dropdown.php';
    ?>
</div><!--//LG SCREEN NAVBAR-->
</nav>

<div class="container-fluid">
    <div class="row">
        <?php
        include "includes/navigation.php";  //INCLUDE NAVIGATION
        ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2 text-muted">Logy</h1>
            </div>

            <table class="table table-hover table-striped" id="logs">
                <thead>
                <tr>
                    <th>Dátum</th>
                    <th>Autor</th>
                    <th>Oblasť</th>
                    <th>Akcia</th>
                    <th>Vymazať</th>
                </tr>
                </thead>
                <tbody>

                <?php

                try{
                    include 'includes/db.php';


                    $query = "SELECT * from logs INNER JOIN users on logs.log_author=users.user_id ORDER BY id DESC";

                    $send_info = $connection->prepare($query);

                    $send_info->execute();

                    while ($row = $send_info->fetch(PDO::FETCH_ASSOC)) {
                        $log_id = $row['id'];
                        $log_date = $row['log_date'];
                        $log_author = $row['log_author'];
                        $log_section = $row['log_section'];
                        $log_action = $row['log_action'];
                        $user_name = $row['user_name'];
                        $user_lastname = $row['user_lastname'];

                        echo "
            
            <tr>
                <td>$log_date</td>
                <td>$user_name $user_lastname</td>
                <td>$log_section</td>
                <td>$log_action</td>
    
            <td class=\"tdWidth\">";

                        if (strpos($_SESSION['user_role'], 'admin')){
                            echo  " <a href=\"logs.php?delete=$log_id\"><i class=\"far fa-trash-alt\"></i> Vymazať</a>
            ";
                        }

                        echo "</td>
            </tr>";


                    }


                }
                catch (Exception $e){
                    echo $e;
                }
                ?>


                </tbody>
            </table>




        </main>
    </div>
</div>
<?php

include 'includes/footer.php';


?>



<?php

if (isset($_GET['delete'])){
    $log_id = $_GET['delete'];


    if (isset($_SESSION['user_role'])){


        if (strpos($_SESSION['user_role'], 'admin')){

            try{
                include 'includes/db.php';

                $query = "DELETE FROM logs WHERE id=:log_id";


                $send_info = $connection->prepare($query);
                $send_info->bindParam(':log_id', $log_id);
                $send_info->execute();
                header('Location: logs.php');
            }
            catch (Exception $e){
                echo $e;
            }
        }
    }

}

?>


<script>
$(document).ready( function () {
    $('#logs').DataTable( {
        "order": [],
        "pageLength": 10
    } );
} );
</script>