<nav class="navbar navbar-dark bg-dark d-md-none d-sm-block fixed-top col-sm-12 text-xl-right text-white">
    <a class="navbar-toggler" role="button" data-toggle="collapse" data-target="#navbarToggleExternalContent"
       aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation"
       style="font-size: 25px">
        <i class="fas fa-bars"></i>
    </a>
    <div class="dropdown col-sm-12">
        <div class="collapse" id="navbarToggleExternalContent">
            <ul class="nav flex-column navbar-collapse text-left" style="width: 100%;">
                <li class="nav-item border-light border-bottom" style="width: 100%;"><a class="nav-link text-light"
                                                                                        href="../index.php"><i
                                class="fas fa-external-link-alt"></i> Zobraziť stránku</a></li>
                <li class="nav-item" style="width: 100%;"><a class="nav-link text-light" href="index.php"><i
                                class="fas fa-home"></i> Dashboard</a></li>
                <!-- Stranky-->
				<?php
				if (isset($_SESSION['user_role'])) {
					if (strpos($_SESSION['user_role'], 'admin')) { ?>
                        <li class="nav-item" style="width: 100%;">
                            <a data-toggle="collapse" href="#strankyMenu" class="nav-link text-light">
                                <i class="far fa-file-alt"></i>
                                Stránky <i class="fas fa-caret-down"></i>
                            </a>


                            <div id="strankyMenu" class="collapse">
                                <ul class="nav mobnav">
                                    <li class="nav-item" style="width: 100%;"><a href="about.php?pagepseu=addpage"
                                                                                 class="nav-link text-light"><i
                                                    class="fas fa-plus-circle"></i> Pridať stránku</a></li>
									<?php
									include 'includes/db.php';

									$query = "SELECT * from pages";

									$send_info = $connection->prepare($query);

									$send_info->execute();
									while ($row = $send_info->fetch(PDO::FETCH_ASSOC)) {
										?>
                                        <li class="nav-item" style="width: 100%;"><a
                                                    href="about.php?pagepseu=<?= $row['page_pseu'] ?>"
                                                    class="nav-link text-light"><i
                                                        class="fas fa-arrow-circle-right"></i> <?= $row['page_title'] ?>
                                            </a></li>
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
                            <li class="nav-item" style="width: 100%;"><a href="posts.php?source=add_post"
                                                                         class="nav-link text-light"><i
                                            class="fas fa-pencil-alt"></i> Pridať článok</a></li>
                            <li class="nav-item" style="width: 100%;"><a href="posts.php"
                                                                         class="nav-link text-light border-bottom"><i
                                            class="fas fa-list-ul"></i> Zobraziť všetky články</a></li>
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
                            <li class="nav-item" style="width: 100%;"><a href="events.php?source=add_event"
                                                                         class="nav-link text-light"><i
                                            class="fas fa-pencil-alt"></i> Pridať podujatie</a></li>
                            <li class="nav-item" style="width: 100%;"><a href="events.php"
                                                                         class="nav-link text-light border-bottom"><i
                                            class="fas fa-list-ul"></i> Zobraziť všetky podujatia</a></li>
                        </ul>
                    </div>
                </li>

                <!--Clenovia-->

				<?php if (isUser('admin') || isUser('moderator')) { ?>
                    <li class="nav-item" style="width: 100%;">
                        <a data-toggle="collapse" href="#clenoviaMenu" class="nav-link text-light">
                            <i class="fas fa-portrait"></i> Členovia <i class="fas fa-caret-down"></i>
                        </a>


                        <div id="clenoviaMenu" class="collapse">
                            <ul class="nav">

                                <li class="nav-item" style="width: 100%;">
                                    <a href="members.php?source=add_member" class="nav-link text-light">
                                        <i class="fas fa-pencil-alt"></i> Pridať člena
                                    </a>
                                </li>
                                <li class="nav-item" style="width: 100%;">
                                    <a href="members.php" class="nav-link text-light">
                                        <i class="fas fa-id-card"></i> Zoznam členov spolku</a>
                                </li>

                            </ul>
                        </div>
                    </li>
				<?php } ?>


                <!--Videogallery-->

                <li class="nav-item" style="width: 100%;">
                    <a data-toggle="collapse" href="#videoMenu" class="nav-link text-light">
                        <i class="fab fa-youtube"></i> Videogaléria <i class="fas fa-caret-down"></i>
                    </a>


                    <div id="videoMenu" class="collapse">
                        <ul class="nav">

							<?php
							if (isUser('admin') || isUser('moderator')) {
								?>
                                <li class="nav-item" style="width: 100%;"><a href="videogallery.php?source=add_video"
                                                                             class="nav-link text-light"><i
                                                class="fas fa-pencil-alt"></i> Pridať video</a></li>
							<?php } ?>
                            <li class="nav-item" style="width: 100%;"><a href="videogallery.php"
                                                                         class="nav-link text-light border-bottom"><i
                                            class="fas fa-list-ul"></i> Zobraziť zoznam</a></li>
                        </ul>
                    </div>
                </li>


                <!--Files-->

                <li class="nav-item" style="width: 100%;">
                    <a data-toggle="collapse" href="#filesMenu" class="nav-link text-light">
                        <i class="fas fa-folder-open"></i> Súbory <i class="fas fa-caret-down"></i>
                    </a>


                    <div id="filesMenu" class="collapse">
                        <ul class="nav">

							<?php
							if (isUser('admin') || isUser('moderator')) {
								?>
                                <li class="nav-item" style="width: 100%;"><a href="files.php?source=add_file"
                                                                             class="nav-link text-light"><i
                                                class="fas fa-pencil-alt"></i> Pridať súbor</a></li>
							<?php } ?>
                            <li class="nav-item" style="width: 100%;"><a href="files.php"
                                                                         class="nav-link text-light border-bottom"><i
                                            class="fas fa-list-ul"></i> Zobraziť všetky súbory</a></li>
                        </ul>
                    </div>
                </li>
                <!--Inventory-->
				<?php
				if (isUser('admin') || isUser('moderator')) {
					echo "
                <li class=\"nav-item\" style=\"width: 100%;\"><a class=\"nav-link text-light\" href=\"inventory.php\"> <i class=\"fas fa-dolly-flatbed\"></i>
                        Inventár</a></li>";
				}
				?>

                <!--Carousel-->
				<?php
				if (!isUser('uzivatel')) {
					echo "
                <li class=\"nav-item\" style=\"width: 100%;\"><a class=\"nav-link text-light\" href=\"news.php\"> <i class=\"fas fa-paper-plane\"></i>
                        Novinky</a></li>";
				}
				?>
                <!--SECRET MSGS-->
				<?php
				if (isUser('admin') || isUser('moderator')) {
					echo "
                <li class=\"nav-item \" style=\"width: 100%;\"><a class=\"nav-link text-light\" href=\"secret-posts.php\"> <i class=\"fas fa-user-secret\"></i>
                         Tajné správy</a></li>";
				}
				?>
                <!--LOGY-->
				<?php
				if (isUser('admin')) {
					echo "
                <li class=\"nav-item \" style=\"width: 100%;\"><a class=\"nav-link text-light\" href=\"logs.php\"> <i class=\"fas fa-paper-plane\"></i>
                        Logy</a></li>";
				}
				?>
                <!--TUTORIALS-->
                <li class="nav-item" style="width: 100%;"><a class="nav-link text-light" href="tutorials.php"> <i
                                class="fas fa-file-video"></i>
                        Tutorialy</a></li>

                <!--Pouzivatelia-->

                <li class="nav-item" style="width: 100%;">
                    <a data-toggle="collapse" href="#uzivateliaMenu" class="nav-link text-light">
                        <i class="fas fa-users"></i> Používatelia <i class="fas fa-caret-down"></i>
                    </a>


                    <div id="uzivateliaMenu" class="collapse">
                        <ul class="nav">
							<?php
							if (strpos($_SESSION['user_role'], 'admin') || strpos($_SESSION['user_role'], 'moderator')) {
								echo "
                                
                            <li class=\"nav-item\"  style=\"width: 100%;\">
                                <a href=\"users.php?source=add_user\" class=\"nav-link text-light\">
                                <i class=\"fas fa-pencil-alt\"></i> Pridať používateľa
                                </a>
                            </li>
                                ";
							}
							?>
                            <li class="nav-item" style="width: 100%;">
                                <a href="users.php" class="nav-link text-light">
                                    <i class="fas fa-list-ul"></i> Zobraziť všetkých používateľov</a>
                            </li>

                        </ul>
                    </div>
                </li>


                <li class="nav-item border-top border-light" style="width: 100%;">
                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-white-50">
                        <span>prihlásený používateľ</span><span class="float-right"> <?php
							if (isset($_SESSION['user_role'])) {
								echo $_SESSION['user_name'] . " " . $_SESSION['user_lastname'];
							}
							?></span>
                    </h6>
                    <a class="nav-link text-light" href="profile.php?edit=<?php echo $_SESSION['user_id']; ?>"><i
                                class="fas fa-user"></i> Profil</a></li>
                <li class="nav-item" style="width: 100%;"><a class="nav-link text-light"
                                                             href="https://kusjanakollara.org:2096/" target="_blank"><i
                                class="fas fa-envelope"></i> E-mail</a></li>
                <li class="nav-item" style="width: 100%;"><a class="nav-link text-light" href="includes/logout.php"><i
                                class="fas fa-sign-out-alt"></i>Odhlásiť sa</a></li>
                <li>
					<?php
					include('version.php');
					?></li>
            </ul>
        </div>
</nav><!--//MOBILE NAVBAR-->
