<?php
	$pagepseu = '';
	$metaDescription = '';

	if (isset($_GET['pagepseu'])) {
		$pagepseu = $_GET['pagepseu'];
	}
	if (!empty($pagepseu)){
		include 'dashboard/includes/db.php';
	
		$query = "SELECT * from pages WHERE page_pseu = '" . $pagepseu . "'";
	
		$send_info = $connection->prepare($query);
	
		$send_info->execute();
		$fetch = $send_info->rowCount();
		if ($fetch > 0){
			$page = $send_info->fetch(PDO::FETCH_ASSOC);
			$title = $page['page_title'];
			$description = $page['page_description'];
			$content = $page['page_content'];
			$metaDescription = $page['meta_description'];
		}
	}

	function pageDescription ($metaDescription){
		return $metaDescription !== '' ? $metaDescription : "Neexistujúca stránka na KUS Jána Kollára.org. Prosíme skontrolujte si URL";
	}
?>

<!DOCTYPE html>
<html lang="sk">
<!--HTML5 Document by Jaroslav Beredi-->
<head>
      <meta charset="UTF-8">
      <title>O nás - KUS Jána Kollára Selenča</title>
      <meta name="description" content="<?=pageDescription($metaDescription)?>">
      <meta name="author" content="Jaroslav Beredi">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel='canonical' href="https://kusjanakollara.org/about?pagepseu=<?=$pagepseu?>" />

      <meta property="og:title" content="O nás - KUS Jána Kollára Selenča">
      <meta property="og:description" content="<?=pageDescription($metaDescription)?>">
      <meta property="og:image" content="https://kusjanakollara.org/images/kus-jana-kollara.jpg">
      <meta property="og:url" content="https://www.kusjanakollara.org/about?pagepseu=<?=$pagepseu?>">
      <meta property="og:type" content="website">

      <meta name="twitter:card" content="summary_large_image">
      <meta name="twitter:title" content="O nás - KUS Jána Kollára Selenča">
      <meta name="twitter:description" content="<?=pageDescription($metaDescription)?>">
      <meta name="twitter:image" content="https://kusjanakollara.org/images/kus-jana-kollara.jpg">
      <meta name="twitter:url" content="https://www.kusjanakollara.org/about?pagepseu=<?=$pagepseu?>">

	  <?php include 'includes/headerInclude.php'; ?>
    
</head>
<body>
<?php include 'includes/navbar.php'; ?>
<div class="container content">
	<?php
	if (empty($pagepseu) || $fetch == 0){
		echo "Stránka neexistuje!";
	}
	else{
			?>
			<div class="row">
				<div class="col-lg-12">
					<h1><?= $title ?></h1>
					<p class="text-muted"><?= $description ?></p>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 about">
					<div class="text-justify contentPageBody">
						<?= $content ?>
					</div>
				</div>

			</div>
			</div>
			<?php
		
	}
	?>


<?php include 'includes/footer.php'; ?>
<!--FOOTER-->
<?php
footer("other");
?>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/bootstrap.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="lightbox/js/lightbox.js"></script>

<script src="links/link.js"></script>
</body>
<!--   font-family: 'Istok Web', sans-serif;   -->
</html>
