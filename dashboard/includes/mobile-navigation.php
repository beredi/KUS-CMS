
<nav class="navbar navbar-dark bg-dark d-md-none d-sm-block fixed-top col-sm-12 text-xl-right text-white">
    <a class="navbar-toggler" role="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation" style="font-size: 25px">
        <i class="fas fa-bars"></i>
    </a>
    <div class="dropdown col-sm-12">
        <div class="collapse" id="navbarToggleExternalContent">
            <ul class="nav flex-column navbar-collapse text-left" style="width: 100%;">
                <li class="nav-item border-light border-bottom" style="width: 100%;"><a class="nav-link text-light" href="../index.php"><i class="fas fa-external-link-alt"></i> Zobraziť stránku</a></li>
                <li class="nav-item" style="width: 100%;"><a class="nav-link text-light" href="index.php"><i class="fas fa-home"></i> Dashboard</a></li>
                <!-- Stranky-->
                <?php
                if (isset($_SESSION['user_role'])){
                if (strpos($_SESSION['user_role'], 'admin')){ ?>
                <li class="nav-item" style="width: 100%;">
                    <a data-toggle="collapse" href="#strankyMenu" class="nav-link text-light">
                        <i class="far fa-file-alt"></i>
                        Stránky <i class="fas fa-caret-down"></i>
                    </a>


                    <div id="strankyMenu" class="collapse">
                        <ul class="nav mobnav">
	                        <?php
	                        include 'includes/db.php';

	                        $query = "SELECT * from pages";

	                        $send_info = $connection->prepare($query);

	                        $send_info->execute();
	                        while ($row = $send_info->fetch(PDO::FETCH_ASSOC)) {
		                        ?>
                                <li class="nav-item"  style="width: 100%;"><a href="about.php?pagepseu=<?=$row['page_pseu']?>"  class="nav-link text-light"><i class="fas fa-arrow-circle-right"></i> <?=$row['page_title']?></a></li>
		                        <?php
	                        }
	                        ?>
                        </ul>
                    </div>
                </li>
                    <?php
                }
                }
                ?>
                <!-- Clanky-->
                <li class="nav-item" style="width: 100%;">
                    <a data-toggle="collapse" href="#clankyMenu" class="nav-link text-light">
                        <i class="far fa-sticky-note"></i>
                        Články <i class="fas fa-caret-down"></i>
                    </a>


                    <div id="clankyMenu" class="collapse">
                        <ul class="nav">
                            <li class="nav-item"  style="width: 100%;"><a href="posts.php?source=add_post" class="nav-link text-light"><i class="fas fa-pencil-alt"></i> Pridať článok</a></li>
                            <li class="nav-item"  style="width: 100%;"><a href="posts.php" class="nav-link text-light border-bottom"><i class="fas fa-list-ul"></i> Zobraziť všetky články</a></li>
                        </ul>
                    </div>
                </li>
                <!--Podujatia-->

                <li class="nav-item" style="width: 100%;">
                    <a data-toggle="collapse" href="#podujatiaMenu" class="nav-link text-light">
                        <i class="far fa-calendar-alt"></i> Podujatia <i class="fas fa-caret-down"></i>
                    </a>


                    <div id="podujatiaMenu" class="collapse">
                        <ul class="nav">
                            <li class="nav-item"  style="width: 100%;"><a href="events.php?source=add_event" class="nav-link text-light"><i class="fas fa-pencil-alt"></i> Pridať podujatie</a></li>
                            <li class="nav-item"  style="width: 100%;"><a href="events.php" class="nav-link text-light border-bottom"><i class="fas fa-list-ul"></i> Zobraziť všetky podujatia</a></li>
                        </ul>
                    </div>
                </li>



                <!--Uzivatelia-->

                <li class="nav-item" style="width: 100%;">
                    <a data-toggle="collapse" href="#uzivateliaMenu" class="nav-link text-light">
                        <i class="fas fa-users"></i> Užívatelia <i class="fas fa-caret-down"></i>
                    </a>


                    <div id="uzivateliaMenu" class="collapse">
                        <ul class="nav">
                            <?php
                            if (strpos($_SESSION['user_role'], 'admin') || strpos($_SESSION['user_role'], 'moderator')){
                                echo "
                                
                            <li class=\"nav-item\"  style=\"width: 100%;\"><a href=\"users.php?source=add_user\" class=\"nav-link text-light\"><i class=\"fas fa-pencil-alt\"></i> Pridať užívateľa</a></li>
                                ";
                            }
                            ?>
                            <li class="nav-item"  style="width: 100%;"><a href="users.php?source=user_roles" class="nav-link text-light"><i class="far fa-check-circle"></i> Roly užívateľov</a></li>
                            <li class="nav-item"  style="width: 100%;"><a href="users.php" class="nav-link text-light"><i class="fas fa-list-ul"></i> Zobraziť všetkých užívateľov</a></li>
                        </ul>
                    </div>
                </li>
                <?php
                if (!strpos($_SESSION['user_role'], 'uzivatel')){
                    echo "
                <li class=\"nav-item\" style=\"width: 100%;\"><a class=\"nav-link text-light\" href=\"news.php\"> <i class=\"fas fa-paper-plane\"></i>
                        Novinky</a></li>";
                }
                ?>
                <?php
                if (strpos($_SESSION['user_role'], 'admin')){
                    echo "
                <li class=\"nav-item \" style=\"width: 100%;\"><a class=\"nav-link text-light\" href=\"logs.php\"> <i class=\"fas fa-paper-plane\"></i>
                        Logy</a></li>";
                }
                ?>
                <li class="nav-item" style="width: 100%;"><a class="nav-link text-light" href="tutorials.php"> <i class="fas fa-file-video"></i>
                Tutorialy</a></li>
                <li class="nav-item border-top border-light" style="width: 100%;">
                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-white-50">
                        <span>prihlásený užívateľ</span><span class="float-right"> <?php
                            if (isset($_SESSION['user_role'])){
                                echo $_SESSION['user_name']." ".$_SESSION['user_lastname'];
                            }
                            ?></span>
                    </h6>
                    <a class="nav-link text-light" href="profile.php?edit=<?php echo $_SESSION['user_id'];?>"><i class="fas fa-user"></i> Profil</a></li>
                <li class="nav-item" style="width: 100%;"><a class="nav-link text-light" href="includes/logout.php"><i class="fas fa-sign-out-alt"></i>Odhlásiť sa</a></li>
            </ul>
        </div>
</nav><!--//MOBILE NAVBAR-->
