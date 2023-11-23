<?php
session_start();
include 'includes/articleHeader.php';

if (isset($_GET['p_id'])) {
	$post_id = $_GET['p_id'];
}

try {

	include 'dashboard/includes/db.php';
	$query = "SELECT * FROM posts WHERE post_id = $post_id ";

	$send_info = $connection->prepare($query);

	$send_info->execute();

	while ($row = $send_info->fetch(PDO::FETCH_ASSOC)) {

		$post_title = $row['post_title'];
		$post_image = $row['post_image'];
		$post_tags = $row['post_tags'];
		$post_status = $row['post_status'];
		$temp_post_content = strip_tags($row['post_content']);
	}
	if (!isset($_SESSION['user_role']) && $post_status == 'draft') {

		header('Location: index.php');
	}


} catch (Exception $e) {
	echo $e;
}

articleHeader($post_title, $post_image, $temp_post_content, $post_tags);


?>
<body>
<div class="container content">
	<?php
	include 'includes/navbar.php';
	?>
    <!--CONTENT-->


	<?php
	if (isset($_GET['p_id'])) {
		$post_id = $_GET['p_id'];
	}

	try {

		include 'dashboard/includes/db.php';
		$query = "SELECT * FROM posts INNER JOIN users ON posts.post_author = users.user_id WHERE post_id = $post_id";

		$send_info = $connection->prepare($query);

		$send_info->execute();

		while ($row = $send_info->fetch(PDO::FETCH_ASSOC)) {

			$post_title = $row['post_title'];
			$post_author_id = $row['post_author'];
			$post_author_name = $row['user_name'];
			$post_author_lastname = $row['user_lastname'];
			$post_author = $post_author_name . ' ' . $post_author_lastname;


			$post_date1 = strtotime($row['post_date']);
			$post_date = date('d. M. Y', $post_date1);
			$post_content = $row['post_content'];
			$post_image = $row['post_image'];
			$post_status = $row['post_status'];
			$post_tags = $row['post_tags'];
		}

	} catch (Exception $e) {
		echo $e;
	}

	?>

    <div class="row">
        <!-- S PRAVOU STRANOU : POSLEDNE CLANKY -->
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 clanokBody">
            <!-- BEZ PRAVEJ STRANY : POSLEDNE CLANKY
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clanokBody">-->
			<?php
			if ($post_status == 'draft') {
				echo "<h3 class='text-danger'>Tento článok nie je publikovaný</h3>";

			}
			?>
            <h2><?php echo $post_title; ?><br>
                <small>
                    <!-- Share on FB button -->
                    <span class="glyphicon glyphicon glyphicon-calendar"></span> <?php echo $post_date; ?> | <span
                            class="glyphicon glyphicon glyphicon-user"></span> <?php echo $post_author; ?> </small>
				<?php
				if ($post_status !== 'draft') {
					?>
                    <a style="margin-left: 10px;" class="btn btn-primary btn-sm"
                       href="https://www.facebook.com/sharer/sharer.php?u=kusjanakollara.org/clanok.php?p_id=<?= $post_id ?>"
                       target="_blank">
                        <i class="fab fa-facebook"></i> Zdieľať
                    </a>
					<?php

				}
				?>
            </h2>
            <hr>
            <!---TEXT
            <div class="text-justify contentPageBody">
				<?php echo $post_content; ?>
                <p class="text-muted">Kľúčové slová: <?php echo $post_tags; ?></p>

            </div>--->
        </div>

        <!--SIDEBAR-->

		<?php

		include 'includes/sidebar.php';
		?>


    </div>
</div>

<!--FOOTER-->
<?php include 'includes/footer.php'; ?>
<?php
footer("other");
?>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/bootstrap.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script src="links/link.js"></script>
</body>
<!--   font-family: 'Istok Web', sans-serif;   -->
</html>
