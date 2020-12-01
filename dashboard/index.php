<?php ob_start(); ?>
<?php
include "includes/header.php"; //INCLUDE HEADER
?>
<!--    MOBILE NAVBAR-->
    <?php
    include "includes/mobile-navigation.php"; //INCLUDE NAVIGATION FOR MOBILE
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
            <?php
            if (strpos($_SESSION['user_role'], 'admin')||strpos($_SESSION['user_role'], 'lektor')){

                try{
                    include 'includes/db.php';

                    $query = "SELECT * FROM posts WHERE post_status = 'draft'";

                    $send_info = $connection->prepare($query);

                    $send_info->execute();
                    $count = $send_info->rowCount();

                    if ($count!==0){



                        echo "
                
            <div class=\"bg-danger my-5 p-3 shadow\" style=\"width: 90%;\">
                <h4>
                    <a href=\"posts.php\" class=\" text-white\"><i class=\"fas fa-bell\"></i> Nechválené články: $count</a></h4>

            </div>
                
                ";
                    }

                }
                catch (Exception $e){
                    echo $e;
                }


            }
            ?>
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2 text-muted">Dashboard</h1>
            </div>

            <h2>Rýchly prístup</h2>
            <div class="row pb-3 border-bottom">
            <div class="col-md-4 col-sm-12">
                <div class="card text-right" style="width: 100%;">
                    <div class="card-body">
                        <h2 class="card-title"><a href="posts.php">
                            <i class="far fa-sticky-note"></i> Články <span class="badge badge-secondary">
                                    <?php
                                    try {
                                        include 'includes/db.php';


                                        $query = "SELECT * from posts ";

                                        $send_info = $connection->prepare($query);

                                        $send_info->execute();
                                        $count = $send_info->rowCount();
                                        echo $count;
                                    }catch (Exception $e){
                                        echo $e;
                                    }
                                    ?>
                                </span></a>
                        </h2>

                        <a href="posts.php?source=add_post" class="card-link"><i class="fas fa-pencil-alt"></i> Pridať článok</a>
                        <a href="posts.php" class="card-link"><i class="fas fa-list-ul"></i> Zobraziť všetky</a>
                    </div>
                </div>
            </div><!--  // class="col-md-4"   -->

                <div class="col-md-4 col-sm-12">
                    <div class="card text-right" style="width: 100%;">
                        <div class="card-body">
                            <h2 class="card-title"><a href="events.php">
                                    <i class="far fa-calendar-alt"></i> Podujatia <span class="badge badge-secondary">
                                    <?php
                                    try {
                                        include 'includes/db.php';


                                        $query = "SELECT * from events ";

                                        $send_info = $connection->prepare($query);

                                        $send_info->execute();
                                        $count = $send_info->rowCount();
                                        echo $count;
                                    }catch (Exception $e){
                                        echo $e;
                                    }
                                    ?></span></a>
                            </h2>

                            <?php
                            if (isset($_SESSION['user_role'])){
                                if (strpos($_SESSION['user_role'], 'uzivatel')){
                                }
                                else{

                                    echo "<a href=\"events.php?source=add_event\" class=\"card-link\"><i class=\"fas fa-pencil-alt\"></i> Pridať podujatie</a>";
                                }
                            }
                            ?>

                            <a href="events.php" class="card-link"><i class="fas fa-list-ul"></i> Zobraziť všetky</a>
                        </div>
                    </div>
                </div><!--  // class="col-md-4"   -->

                <div class="col-md-4 col-sm-12">
                    <div class="card text-right" style="width: 100%;">
                        <div class="card-body">
                            <h2 class="card-title"><a href="users.php">
                                    <i class="fas fa-users"></i> Užívatelia <span class="badge badge-secondary"><?php
                                        try {
                                            include 'includes/db.php';


                                            $query = "SELECT * from users ";

                                            $send_info = $connection->prepare($query);

                                            $send_info->execute();
                                            $count = $send_info->rowCount();
                                            echo $count;
                                        }catch (Exception $e){
                                            echo $e;
                                        }
                                        ?></span></a>
                            </h2>
                            <?php
                            if (strpos($_SESSION['user_role'], 'admin')||strpos($_SESSION['user_role'], 'moderator')){
                                echo " <a href=\"users.php?source=add_user\" class=\"card-link\"><i class=\"fas fa-pencil-alt\"></i> Pridať užívateľa</a>";
                            }
                            ?>

                            <a href="users.php" class="card-link"><i class="fas fa-list-ul"></i> Zobraziť všetkých</a>
                        </div>
                    </div>
                </div><!--  // class="col-md-4"   -->
            </div><!--  // class="row"   -->


            <h2 class="mt-3"><i class="fas fa-list-ol"></i> Posledné záznamy</h2>


            <div class="row" >
                <div class="col-md-12">
                    <button class="btn btn-outline-primary text-left mb-3" data-toggle="collapse"  data-toggle="collapse" href="#clanky" role="button" aria-expanded="true" aria-controls="clanky" style="width: 100%;">
                        Posledných 5 článkov: <i class="fas fa-caret-down text-right"></i>
                    </button>
                </div>

                <div class="col-md-12">
                <?php include 'includes/last_articles.php'; ?>  <!--LAST 5 ARTICLES-->
                </div>
            </div>

<hr>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <button class="btn btn-outline-primary text-left mb-3" data-toggle="collapse"  data-toggle="collapse" href="#uzivatelia" role="button" aria-expanded="true" aria-controls="uzivatelia" style="width: 100%;">
                            Posledných 5 užívateľov: <i class="fas fa-caret-down text-right"></i>
                        </button>
                    </div>
                    <p class="text-muted"></p>

                    <?php include 'includes/last_users.php'; ?> <!--LAST 5 USERS-->




                    </div>

            </div>

        </main>
    </div>
</div>

<?php


include 'includes/footer.php';
?>