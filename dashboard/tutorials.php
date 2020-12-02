<?php ob_start();
include "includes/header.php"; //INCLUDE HEADER
?>
<!--MOBILE NAVBAR-->
<?php
include "includes/mobile-navigation.php"; //INCLUDE NAVIGATION FOR MOBILE
?>


<?php
?>
<?php
if (!isset($_SESSION['user_role'])){
        header('Location: index.php');
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
                <h1 class="h2 text-muted">Tutorialy</h1>
                <?php
                if (strpos($_SESSION['user_role'],'admin')){?>
                    <a href="#" class="btn btn-success">Pridať tutorial</a>
                <?php
                }
                ?>
            </div>

                        <?php

                        try{
                            include 'includes/db.php';

                            $query = "SELECT * FROM tutorials";
                            $send_info = $connection->prepare($query);

                            $send_info->execute();

                            while ($row = $send_info->fetch(PDO::FETCH_ASSOC)){
                                $code = $row['code'];
                                $title = $row['title'];
                                $description = $row['description'];?>
                                <div class="row" style="margin: 10px; border-bottom: 1px solid #eeeeee">
                                    <div class="col-sm-12">
                                        <h4 class="text-info font-weight-bold" style="font-size: 18px;"><?=$title?></h4>
                                    </div>
                                    <div class="col-sm-12">
                                        <p class="text-muted" style="font-size: 12px;"><?=$description?></p>
                                    </div>
                                    <div class="col-sm-12"><?=$code?></div>
                                </div>
            <?php
                            }
                        }
                        catch (Exception $e){
                            echo $e;
                        }
                        ?>





        </main>
    </div>
</div>
<script>
    function showMe (box) {

        var chboxs = document.getElementsByName("last3");
        var vis = "none";
        for(var i=0;i<chboxs.length;i++) {
            if(!chboxs[i].checked){
                vis = "block";
                break;
            }
        }
        document.getElementById(box).style.display = vis;


    }
</script>

<?php

include 'includes/footer.php';


?>

