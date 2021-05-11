<nav class="navbar col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link
                <?php

                if (isset($_GET['source'])){
                    $source = $_GET['source'];
                    if ($source == 'index'){
                        echo 'active';
                    }
                }

               ?> " href="index.php">
                    <i class="fas fa-home"></i>
                    Dashboard <span class="sr-only">(current)</span>
                </a>
            </li><!--
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file"></span>
                            Orders
                        </a>
                    </li>-->
            <!--Stranky-->
        <?php
            if (isset($_SESSION['user_role'])){
                if (strpos($_SESSION['user_role'], 'admin')){ ?>
            <li class="nav-item">
                <a data-toggle="collapse" href="#strankyMenu" class="nav-link">
                    <i class="far fa-file-alt"></i>
                    Stránky <i class="fas fa-caret-down"></i>
                </a>
                <div id="strankyMenu" class="collapse">
                    <ul class="nav navbar-nav">
                        <li class="dropdown-item" ><a href="about.php?pagepseu=addpage" class="nav-link"><i class="fas fa-plus-circle"></i> Pridať stránku</a></li>
	                    <?php
	                    include 'includes/db.php';

	                    $query = "SELECT * from pages";

	                    $send_info = $connection->prepare($query);

	                    $send_info->execute();
	                    while ($row = $send_info->fetch(PDO::FETCH_ASSOC)) {
		                    ?>
                            <li class="dropdown-item" ><a href="about.php?pagepseu=<?=$row['page_pseu']?>" class="nav-link"><i class="fas fa-arrow-circle-right"></i> <?=$row['page_title']?></a></li>
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
            <!--Články-->

            <li class="nav-item">
                <a data-toggle="collapse" href="#clankyMenu" class="nav-link">
                    <i class="far fa-sticky-note"></i>
                    Články <i class="fas fa-caret-down"></i>
                </a>


                <div id="clankyMenu" class="collapse">
                    <ul class="nav navbar-nav">
                        <li class="dropdown-item" ><a href="posts.php?source=add_post" class="nav-link"><i class="fas fa-pencil-alt"></i> Pridať článok</a></li>
                        <li class="dropdown-item" ><a href="posts.php" class="nav-link"><i class="fas fa-list-ul"></i> Zobraziť všetky články</a></li>
                    </ul>
                </div>
            </li>

            <!--Podujatia-->

            <li class="nav-item">
                <a data-toggle="collapse" href="#podujatiaMenu" class="nav-link">
                    <i class="far fa-calendar-alt"></i> Podujatia <i class="fas fa-caret-down"></i>
                </a>


                <div id="podujatiaMenu" class="collapse">
                    <ul class="nav navbar-nav">
                        <?php
                        if (isset($_SESSION['user_role'])){
                            if (!strpos($_SESSION['user_role'], 'uzivatel')){
                                echo "
                                
                        <li class=\"dropdown-item\" ><a href=\"events.php?source=add_event\" class=\"nav-link\"><i class=\"fas fa-pencil-alt\"></i> Pridať podujatie</a></li>
                                ";
                            }
                        }
                        ?>

                        <li class="dropdown-item" ><a href="events.php" class="nav-link"><i class="fas fa-list-ul"></i> Zobraziť všetky podujatia</a></li>
                    </ul>
                </div>
            </li>

            <!--Uzivatelia-->

            <li class="nav-item">
                <a data-toggle="collapse" href="#uzivateliaMenu" class="nav-link">
                    <i class="fas fa-users"></i> Užívatelia <i class="fas fa-caret-down"></i>
                </a>


                <div id="uzivateliaMenu" class="collapse">
                    <ul class="nav navbar-nav">
                        <?php
                        if (isUser('admin') || isUser('moderator')){
                            echo "
                        <li class=\"dropdown-item\" ><a href=\"users.php?source=add_user\" class=\"nav-link\"><i class=\"fas fa-pencil-alt\"></i> Pridať užívateľa</a></li>
                            ";
                        }
                        ?>

                        <li class="dropdown-item" ><a href="users.php?source=user_roles" class="nav-link"><i class="far fa-check-circle"></i> Roly užívateľov</a></li>
                        <li class="dropdown-item" ><a href="users.php" class="nav-link"><i class="fas fa-list-ul"></i> Zobraziť všetkých užívateľov</a></li>
	                    <?php if (isUser('admin') || isUser('moderator')){ ?>
                        <li class="dropdown-item" ><a href="members.php" class="nav-link"><i class="fas fa-id-card"></i> Zoznam členov spolku</a></li>
	                    <?php } ?>
                    </ul>
                </div>
            </li>

            <!--Videogallery-->
            <li class="nav-item">
                <a data-toggle="collapse" href="#videoMenu" class="nav-link">
                    <i class="fab fa-youtube"></i> Videogaléria <i class="fas fa-caret-down"></i>
                </a>
                <div id="videoMenu" class="collapse">
                    <ul class="nav navbar-nav">

				        <?php
				        if (isUser('admin') || isUser('moderator')){ ?>
                            <li class="dropdown-item" ><a href="videogallery.php?source=add_video" class="nav-link"><i class="fas fa-pencil-alt"></i> Pridať video</a></li>

					        <?php
				        }
				        ?>
                        <li class="dropdown-item" ><a href="videogallery.php" class="nav-link"><i class="fas fa-list-ul"></i> Zobraziť zoznam</a></li>
                    </ul>
                </div>

            </li>


            <!--Inventar-->

	        <?php
	        if (isUser('admin') || isUser('moderator')){
		        echo "
            <li class=\"nav-item\">
                <a class=\"nav-link\" href=\"inventory.php\">
                    <i class=\"fas fa-dolly-flatbed\"></i>
                    Inventár
                </a>
            </li>";
	        }
	        ?>

            <!--Carousel-->
            <?php
            if (!strpos($_SESSION['user_role'],'uzivatel')){
                echo "
            <li class=\"nav-item\">
                <a class=\"nav-link\" href=\"news.php\">
                    <i class=\"fas fa-paper-plane\"></i>
                    Novinky
                </a>
            </li>";
            }
            ?>

            <!-- SECRET MSGS -->
            <?php
            if (isUser('admin') || isUser('moderator')){
                echo "
            <li class=\"nav-item\">
                <a class=\"nav-link\" href=\"secret-posts.php\">
                    <i class=\"fas fa-user-secret\"></i>
                    Tajné správy
                </a>
            </li>";
            }
            ?>

            <!-- LOGS -->
            <?php
            if (isUser('admin')){
                echo "
            <li class=\"nav-item\">
                <a class=\"nav-link\" href=\"logs.php\">
                    <i class=\"fas fa-list\"></i>
                    Logy
                </a>
            </li>";
            }
            ?>

<!--            TUTORIALS-->
            <li class="nav-item">
                <a class="nav-link" href="tutorials.php">
                    <i class="fas fa-file-video"></i> Tutorialy
                </a>
            </li>

            <!--            JIRA-->
            <li class="nav-item">
                <a class="nav-link" href="https://kusjanakollara.atlassian.net/" target="_blank">
                    <i class="fas fa-project-diagram"></i> JIRA
                </a>
            </li>



        </ul>
        <hr width="90%">
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>prihlásený užívateľ</span><span class="float-right"> <?php
                if (isset($_SESSION['user_name'])){
                    echo $_SESSION['user_name']." ".$_SESSION['user_lastname'];
                }
                ?></span>
        </h6>
                        <ul class="nav flex-column mb-2">
                            <li class="nav-item">
                                <a class="nav-link" href="profile.php?edit=<?php echo $_SESSION['user_id'];?>">
                                    <i class="fas fa-user"></i>
                                    Profil
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="includes/logout.php">
                                    <i class="fas fa-sign-out-alt"></i>
                                    Odhlásiť sa
                                </a>
                            </li>
                        </ul>
    </div>
</nav>