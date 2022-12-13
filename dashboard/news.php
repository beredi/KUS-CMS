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
if (isset($_SESSION['user_role'])) {
	if (strpos($_SESSION['user_role'], 'uzivatel')) {
		header('Location: index.php');
	}
}
?>
<!--LG SCREEN NAVBAR-->
<div class="col-md-10 col-sm-12 d-none d-md-inline">


    <a class="float-left text-light mt-2" href="../index.php" target="_blank"><i class="fas fa-external-link-alt"></i>
        Zobraziť stránku</a>
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
                <h1 class="h2 text-muted">Novinky</h1>
            </div>


			<?php
			if (isset($_SESSION['user_role'])) {
				if (isset($_POST['news'])) {

					if (isset($_POST['last3']) && $_POST['last3'] == 'checked') {
						//                LAST 3 POSTS
						try {
							include 'includes/db.php';

							$query = "UPDATE news SET news_value = 0";

							$send_info = $connection->prepare($query);
							$send_info->execute();

							$query_update_all_posts = "UPDATE posts SET post_position = 0";
							$send_info0 = $connection->prepare($query_update_all_posts);
							$send_info0->execute();

							echo "<h3 class='text-success'>V novinkách sa objavia posledné tri články.</h3>";

							// LOG
							include "includes/add_log.php";
							$logAction = "Zmenil zobrazovanie noviniek na uvode";
							createLog($connection, $logAction, "novinky");

						} catch (Exception $e) {
							echo $e;
						}
					} else {

						$post_1 = $_POST['post_1'];
						$post_2 = $_POST['post_2'];
						$post_3 = $_POST['post_3'];


						if ($post_1 == $post_2 || $post_1 == $post_3 || $post_2 == $post_3) {

							echo "<h3 class='text-danger'>Musia byť vybraté tri rozličné články!</h3>";

						} else {

							try {
								include "includes/db.php";

								$query = "UPDATE news SET news_value = 1";

								$send_info = $connection->prepare($query);
								$send_info->execute();


								$query_update_all_posts = "UPDATE posts SET post_position = 0";
								$send_info0 = $connection->prepare($query_update_all_posts);
								$send_info0->execute();


								$query_post1 = "UPDATE posts SET post_position = 3 WHERE post_id = :post_id";
								$send_info1 = $connection->prepare($query_post1);
								$send_info1->bindParam(':post_id', $post_1);
								$send_info1->execute();


								$query_post2 = "UPDATE posts SET post_position = 2 WHERE post_id = :post_id";
								$send_info2 = $connection->prepare($query_post2);
								$send_info2->bindParam(':post_id', $post_2);
								$send_info2->execute();

								$query_post3 = "UPDATE posts SET post_position = 1 WHERE post_id = :post_id";
								$send_info3 = $connection->prepare($query_post3);
								$send_info3->bindParam(':post_id', $post_3);
								$send_info3->execute();

								echo "<h3 class='text-success'>V novinkách sa objavia tri vami vybraté články.</h3>";


								// LOG
								include "includes/add_log.php";
								$logAction = "Zmenil zobrazovanie noviniek na uvode";
								createLog($connection, $logAction, "novinky");

							} catch (Exception $e) {
								echo $e;
							}
							//                3 POSTS THAT USER CHOOSE
						}


					}

				}
			}

			?>


            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="last3" value="checked" id="value"
                           onclick="showMe('posts')"

						<?php

						try {
							include 'includes/db.php';

							$query = "SELECT * FROM news";
							$send_info = $connection->prepare($query);

							$send_info->execute();

							while ($row = $send_info->fetch(PDO::FETCH_ASSOC)) {
								$value = $row['news_value'];

							}

							if ($value == 0) {
								echo 'checked';
							}
						} catch (Exception $e) {
							echo $e;
						}
						?>


                    >
                    <label for="value" class="form-check-label">Posledné 3 články</label>
                </div>

                <div id="posts"

					<?php

					try {
						include 'includes/db.php';

						$query = "SELECT * FROM news";
						$send_info = $connection->prepare($query);

						$send_info->execute();

						while ($row = $send_info->fetch(PDO::FETCH_ASSOC)) {
							$value = $row['news_value'];

						}

						if ($value == 0) {
							echo " style=\"display: none;\"";
						}
					} catch (Exception $e) {
						echo $e;
					}
					?>


                >
                    <p class="my-3 font-weight-bold">Vybrať 3 články:</p>
                    <div class="form-group">
                        <label for="post_1">1. článok: </label>
                        <select name="post_1" class="form-control" id="post_1">
							<?php

							try {
								include 'includes/db.php';

								$query = "SELECT * FROM posts WHERE post_status = 'published' ORDER BY post_id DESC";

								$send_info = $connection->prepare($query);

								$send_info->execute();

								while ($row = $send_info->fetch(PDO::FETCH_ASSOC)) {
									$post_id = $row['post_id'];
									$post_title = $row['post_title'];
									$post_position = $row['post_position'];
									echo "
                                
                        <option value=\"$post_id\" ";
									if ($post_position == 3) {
										echo 'selected';
									}

									echo ">$post_title</option>
                                
                                ";
								}

							} catch (Exception $e) {
								echo $e;
							}

							?>
                        </select>

                    </div>
                    <div class="form-group">
                        <label for="post_2">2. článok: </label>
                        <select name="post_2" class="form-control" id="post_2">
							<?php

							try {
								include 'includes/db.php';

								$query = "SELECT * FROM posts WHERE post_status = 'published' ORDER BY post_id DESC";

								$send_info = $connection->prepare($query);

								$send_info->execute();

								while ($row = $send_info->fetch(PDO::FETCH_ASSOC)) {
									$post_id = $row['post_id'];
									$post_title = $row['post_title'];
									$post_position = $row['post_position'];
									echo "
                                
                        <option value=\"$post_id\" ";
									if ($post_position == 2) {
										echo 'selected';
									}

									echo ">$post_title</option>
                                
                                ";
								}

							} catch (Exception $e) {
								echo $e;
							}

							?>
                        </select>

                    </div>
                    <div class="form-group">
                        <label for="post_3">3. článok: </label>
                        <select name="post_3" class="form-control" id="post_3">
							<?php

							try {
								include 'includes/db.php';

								$query = "SELECT * FROM posts WHERE post_status = 'published' ORDER BY post_id DESC";

								$send_info = $connection->prepare($query);

								$send_info->execute();

								while ($row = $send_info->fetch(PDO::FETCH_ASSOC)) {
									$post_id = $row['post_id'];
									$post_title = $row['post_title'];
									$post_position = $row['post_position'];
									echo "
                                
                        <option value=\"$post_id\" ";
									if ($post_position == 1) {
										echo 'selected';
									}

									echo ">$post_title</option>
                                
                                ";
								}

							} catch (Exception $e) {
								echo $e;
							}

							?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-lg btn-info" name="news" value="Zmeniť">
                </div>

            </form>


        </main>
    </div>
</div>
<script>
    function showMe(box) {

        var chboxs = document.getElementsByName("last3");
        var vis = "none";
        for (var i = 0; i < chboxs.length; i++) {
            if (!chboxs[i].checked) {
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

