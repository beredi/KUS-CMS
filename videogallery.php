<?php
ob_start();
session_start();
try {
	include 'dashboard/includes/db.php';
	$posts_by_page = 6;
	// POSTS COUNTER
	$queryCounter = "SELECT * FROM videogallery";
	$send_info = $connection->prepare($queryCounter);
	$send_info->execute();
	$countPosts = $send_info->rowCount();
	$countPages = ceil($countPosts / $posts_by_page);


	if (isset($_GET['page'])) {
		$page = $_GET['page'];
	} else {
		$page = '';
	}

	if ($page == '' || $page == 1) {
		$page_1 = 0;
		$currentPage = 1;
	} else {
		$page_1 = ($page * $posts_by_page) - $posts_by_page;
		$currentPage = $page;
	}
} catch (Exception $e) {
	echo $e;
}
?>
<!DOCTYPE html>
<html lang="sk">
<!--HTML5 Document by Jaroslav Beredi-->
<head>
		<meta charset="UTF-8">
		<title>Videogaléria - KUS Jána Kollára Selenča</title>
		<meta name="description"
		content="Pozrite si videa z našich vystúpení, alebo naše video spoty, ktoré sme vytvorili na radosť a pobavenie pre všetkých našich fanúšikov a priaznivcov.">
		<meta name="author" content="Jaroslav Beredi">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="canonical" href="https://kusjanakollara.org/videogallery" />

		<!-- pagination -->
		<?php
			if ($currentPage && $currentPage > 1){
				$pageAddition = $currentPage == 2 ? '' : '?page='.$currentPage-1; 
				echo '<link rel="prev" href="https://kusjanakollara.org/videogallery'.$pageAddition.'" />';
			}
		?>
		<link rel="next" href="https://kusjanakollara.org/videogallery?page=<?=$currentPage ? $currentPage+1 : "2"?>" />

		<meta property="og:title" content="Články o našej činnosti - KUS Jána Kollára Selenča">
		<meta property="og:description" content="Pozrite si videa z našich vystúpení, alebo naše video spoty, ktoré sme vytvorili na radosť a pobavenie pre všetkých našich fanúšikov a priaznivcov.">
		<meta property="og:image" content="https://kusjanakollara.org/images/kus-jana-kollara.jpg">
		<meta property="og:url" content="https://www.kusjanakollara.org/videogallery">
		<meta property="og:type" content="website">

		<meta name="twitter:card" content="summary_large_image">
		<meta name="twitter:title" content="Články o našej činnosti - KUS Jána Kollára Selenča">
		<meta name="twitter:description" content="Pozrite si videa z našich vystúpení, alebo naše video spoty, ktoré sme vytvorili na radosť a pobavenie pre všetkých našich fanúšikov a priaznivcov.">
		<meta name="twitter:image" content="https://kusjanakollara.org/images/kus-jana-kollara.jpg">
		<meta name="twitter:url" content="https://www.kusjanakollara.org/videogallery">

		<?php include 'includes/headerInclude.php'; ?>

</head>
<body>
<?php include 'includes/navbar.php'; ?>
<div class="container content">
    <!--CONTENT-->
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <h1>Videogaléria z našich aktivít a vystúpení</h1>
				<p class="text-muted">Pozrite si bohatstvo našich aktivít</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-offset-10 col-lg-2">
                <p class="text-right text-muted">Strana <?= $currentPage ?> z <?= $countPages ?></p>
            </div>
        </div>
        <div class="row photoGallery">
			<?php
			try {
				include 'dashboard/includes/db.php';
				$posts_by_page = 6;
				// POSTS COUNTER
				$queryCounter = "SELECT * FROM videogallery";
				$send_info = $connection->prepare($queryCounter);
				$send_info->execute();
				$countPosts = $send_info->rowCount();
				$countPosts = ceil($countPosts / $posts_by_page);

				// GET POSTS

				if (isset($_GET['page'])) {
					$page = $_GET['page'];
				} else {
					$page = '';
				}

				if ($page == '' || $page == 1) {
					$page_1 = 0;
				} else {
					$page_1 = ($page * $posts_by_page) - $posts_by_page;
				}
				$query = "SELECT * FROM videogallery ORDER BY id DESC LIMIT " . $page_1 . ", " . $posts_by_page;

				$send_info = $connection->prepare($query);
				$send_info->execute();
				$count = $send_info->rowCount();
				if ($count == 0) {
					echo "<h3>Žiadne videá na zobrazenie.</h3>";
				}
				while ($row = $send_info->fetch(PDO::FETCH_ASSOC)) {
					?>

                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="thumbnail text-center" style="height: 450px;">
                            <iframe width="100%" height="400px" <?= $row['code'] ?>></iframe>
                            <p><?= $row['title'] ?></p>
                        </div>
                    </div>
					<?php
				}

			} catch (Exception $e) {
				echo $e;
			}

			?>
        </div>
        <div class="row" style="margin-top: 20px">
            <ul class="pager">
				<?php
				$page = 1;
				if (isset($_GET['page'])) {
					$page = $_GET['page'];
				}
				for ($i = 1; $i <= $countPages; $i++) {
					if ($i == $page) {
						?>
                        <li><a href="videogallery?page=<?= $i ?>" class="active-page"><?= $i ?></a></li>
						<?php
					} else {
						?>
                        <li><a href="videogallery?page=<?= $i ?>"><?= $i ?></a></li>
						<?php
					}
				}
				?>
            </ul>

        </div>


    </div>
</div>

<?php include 'includes/footer.php'; ?>
<!--FOOTER-->
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
