<?php
ob_start();
session_start();
try {
	include 'dashboard/includes/db.php';
	$posts_by_page = 6;
	// POSTS COUNTER
	$queryCounter = "SELECT * FROM files";
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
		<title>Publikácie na stiahnutie - KUS Jána Kollára Selenča</title>
		<meta name="description"
			content="KUS Jána Kollára zo Selenče Vám ponúka stiahnuť si zdarma niektoré publikácie našich členov. Snažíme sa publikovať , aby budúce generácie mali z čoho čerpať.">
		<meta name="author" content="Jaroslav Beredi">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel='canonical' href="https://kusjanakollara.org/download" />

		<!-- pagination -->
		<?php
			if ($currentPage && $currentPage > 1){
				echo '<meta name="robots" content="noindex,follow" />';

				$pageAddition = $currentPage == 2 ? '' : '?page='.$currentPage-1; 
				echo '<link rel="prev" href="https://kusjanakollara.org/download'.$pageAddition.'" />';
			}
		?>
		<link rel="next" href="https://kusjanakollara.org/download?page=<?=$currentPage ? $currentPage+1 : "2"?>" />

		<meta property="og:title" content="Publikácie na stiahnutie - KUS Jána Kollára Selenča">
		<meta property="og:description" content="KUS Jána Kollára zo Selenče Vám ponúka stiahnuť si zdarma niektoré publikácie našich členov. Snažíme sa publikovať , aby budúce generácie mali z čoho čerpať.">
		<meta property="og:image" content="https://kusjanakollara.org/images/kus-jana-kollara.jpg">
		<meta property="og:url" content="https://www.kusjanakollara.org/download">
		<meta property="og:type" content="website">

		<meta name="twitter:card" content="summary_large_image">
		<meta name="twitter:title" content="Publikácie na stiahnutie - KUS Jána Kollára Selenča">
		<meta name="twitter:description" content="KUS Jána Kollára zo Selenče Vám ponúka stiahnuť si zdarma niektoré publikácie našich členov. Snažíme sa publikovať , aby budúce generácie mali z čoho čerpať.">
		<meta name="twitter:image" content="https://kusjanakollara.org/images/kus-jana-kollara.jpg">
		<meta name="twitter:url" content="https://www.kusjanakollara.org/download">

		<?php include 'includes/headerInclude.php'; ?>
    
</head>
<body>
<?php
include 'includes/navbar.php';
?>
<div class="container content">
    <h1>Na stiahnutie<br>
        <small>Pozrite si naše publikácie a promo materiál.</small></h1>
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
			$query = "SELECT * FROM files ORDER BY id DESC LIMIT " . $page_1 . ", " . $posts_by_page;

			$send_info = $connection->prepare($query);
			$send_info->execute();
			$count = $send_info->rowCount();
			if ($count == 0) {
				echo "<h3>Žiadne súbory na zobrazenie.</h3>";
			}
			while ($row = $send_info->fetch(PDO::FETCH_ASSOC)) {
				?>

                <div class="col-lg-3">
                    <div class="thumbnail text-center">
                        <a href="images/files/<?= $row['file'] ?>" class="font-weight-bold" style="font-size: 90pt;">
							<?php
							if (strpos($row['file'], '.pdf') !== false) {
								?>
                                <i class="fas fa-file-pdf"></i>
								<?php
							} elseif (strpos($row['file'], '.doc') !== false || strpos($row['file'], '.docx') !== false) {
								?>
                                <i class="fas fa-file-word"></i>
								<?php
							} elseif (strpos($row['file'], '.txt') !== false) {
								?>
                                <i class="fas fa-font"></i>
								<?php
							} else {
								?>
                                <i class="fas fa-file-alt"></i>
								<?php
							}
							?>
                        </a>
                        <a href="images/files/<?= $row['file'] ?>" title="<?= $row['name'] ?>">
                            <p><?= $row['name'] ?></p>
                        </a>
						<?php
						if (!empty($row['description'])) {
							?>
                            <p class="text-muted smallText"><?= $row['description'] ?></p>
							<?php
						}
						?>
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
                    <li><a href="download?page=<?= $i ?>" class="active-page"><?= $i ?></a></li>
					<?php
				} else {
					?>
                    <li><a href="download?page=<?= $i ?>"><?= $i ?></a></li>
					<?php
				}
			}
			?>
        </ul>

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
