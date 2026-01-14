<?php
ob_start();
session_start();
	try {
		include 'dashboard/includes/db.php';

		$posts_by_page = 6;
		// POSTS COUNTER
		$queryCounter = "SELECT * FROM posts WHERE post_status = 'published' ORDER BY post_date DESC";
		$send_info = $connection->prepare($queryCounter);
		$send_info->execute();
		$countPosts = $send_info->rowCount();
		$countPages = ceil($countPosts / $posts_by_page);

		// GET POSTS

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
		<title>Články o našej činnosti - KUS Jána Kollára Selenča</title>
		<meta name="description"
			content="Prečítajte si a pozrite si fotografie v článkach o činnosti kultúrno-umeleckého spolku Jána Kollára zo Selenče.Každoročne sa zúčastňujeme na rôznych podujatiach.">
		<meta name="author" content="Jaroslav Beredi">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel='canonical' href="https://kusjanakollara.org/predchadzajuce-podujatia" />

		<!-- pagination -->
		<?php
		if ($currentPage && $currentPage > 1){
			echo '<meta name="robots" content="noindex,follow" />';

			$pageAddition = $currentPage == 2 ? '' : '?page='.$currentPage-1; 
			echo '<link rel="prev" href="https://kusjanakollara.org/predchadzajuce-podujatia'.$pageAddition.'" />';
		}
		?>
		<link rel="next" href="https://kusjanakollara.org/predchadzajuce-podujatia?page=<?=$currentPage ? $currentPage+1 : "2"?>" />


		<meta property="og:title" content="Články o našej činnosti - KUS Jána Kollára Selenča">
		<meta property="og:description" content="Prečítajte si a pozrite si fotografie v článkach o činnosti kultúrno-umeleckého spolku Jána Kollára zo Selenče.Každoročne sa zúčastňujeme na rôznych podujatiach.">
		<meta property="og:image" content="https://kusjanakollara.org/images/kus-jana-kollara.jpg">
		<meta property="og:url" content="https://www.kusjanakollara.org/predchadzajuce-podujatia">
		<meta property="og:type" content="website">

		<meta name="twitter:card" content="summary_large_image">
		<meta name="twitter:title" content="Články o našej činnosti - KUS Jána Kollára Selenča">
		<meta name="twitter:description" content="Prečítajte si a pozrite si fotografie v článkach o činnosti kultúrno-umeleckého spolku Jána Kollára zo Selenče.Každoročne sa zúčastňujeme na rôznych podujatiach.">
		<meta name="twitter:image" content="https://kusjanakollara.org/images/kus-jana-kollara.jpg">
		<meta name="twitter:url" content="https://www.kusjanakollara.org/predchadzajuce-podujatia">

		<?php include 'includes/headerInclude.php'; ?>
    
</head>
<body>
<?php include 'includes/navbar.php'; ?>
<div class="container content">
	
    <div class="row">
        <div class="col-lg-12">
            <h1>Predchádzajúce podujatia</h1>
        	<p class="text-muted">Prečítajte si o tom, kde sme vystúpili a čo sme všetko organizovali.</p>
            
        </div>
    </div>
    <div class="row">
        <div class="col-lg-offset-10 col-lg-2">
            <p class="text-right text-muted">Strana <?= $currentPage ?> z <?= $countPages ?></p>
        </div>
    </div>
    <div class="row">
		<?php
		try {
			include 'dashboard/includes/db.php';

			$posts_by_page = 6;
			// POSTS COUNTER
			$queryCounter = "SELECT * FROM posts WHERE post_status = 'published'";
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

		$query = "SELECT * FROM posts WHERE post_status = 'published' ORDER BY post_date DESC LIMIT " . $page_1 . ", " . $posts_by_page;

		$send_info = $connection->prepare($query);
		$send_info->execute();

		$count = $send_info->rowCount();

		if ($count == 0) {
			echo "<h3>Žiadne články na zobrazenie.</h3>";
		}
		
		include 'includes/article.php';

		while ($row = $send_info->fetch(PDO::FETCH_ASSOC)) {
				$post_id = $row['post_id'];
				$post_title = $row['post_title'];
				$post_image = $row['post_image'];
				$temp_post_content = strip_tags($row['post_content']);

				$post_content = (substr($temp_post_content, 0, 190) . "...");
				
				echo "<div class=\"col-lg-4 col-md-6 col-sm-12 col-xs-12 article-card-wrapper\">";
				generateArticleCard($post_id, $post_image, $post_title, $post_content);
				echo "</div>";
				/*echo "
                
            <div class=\"col-lg-4 col-md-4 col-sm-12 col-xs-12 \" style='margin: 2px auto; height: 450px;'>
                <div class=\"media clanokMedia \">
                    <div class=\"media-top\">
                        <a href=\"clanok.php?p_id=$post_id\"><img src=\"images/articles/$post_image\" class=\"media-object\" style=\"width:100%;\" alt=\"$post_title\"></a>
                    </div>
                    <div class=\"media-body\">
                        <h3 class=\"media-heading\"><a href=\"clanok.php?p_id=$post_id\">$post_title</a></h3>
                        <p class='text-justify'>$post_content<a href=\"clanok.php?p_id=$post_id\"> Čítaj viac!</a></p>
                    </div>
                </div>
            </div>
                "*/;

			}

		} catch (Exception $e) {
			echo $e;
		}
		?>


    </div>
    <div class="row" style="margin-top: 30px; margin-bottom: 30px;">
        <div class="col-lg-12">
            <nav aria-label="Pagination">
                <ul class="pagination justify-content-center">
                    <?php
                    $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                    $totalPages = $countPages;
                    $range = 2; // Number of pages to show on each side of current page
                    
                    // Previous button
                    if ($currentPage > 1) {
                        echo '<li class="page-item">';
                        echo '<a class="page-link" href="predchadzajuce-podujatia?page=' . ($currentPage - 1) . '" aria-label="Previous">';
                        echo '<span aria-hidden="true">&laquo;</span>';
                        echo '</a></li>';
                    } else {
                        echo '<li class="page-item disabled">';
                        echo '<span class="page-link">&laquo;</span>';
                        echo '</li>';
                    }
                    
                    // First page
                    if ($currentPage > $range + 2) {
                        echo '<li class="page-item">';
                        echo '<a class="page-link" href="predchadzajuce-podujatia?page=1">1</a>';
                        echo '</li>';
                        echo '<li class="page-item disabled"><span class="page-link">...</span></li>';
                    }
                    
                    // Page numbers around current page
                    for ($i = 1; $i <= $totalPages; $i++) {
                        if ($i == 1 && $currentPage > $range + 2) {
                            continue; // Already shown above
                        }
                        
                        if ($i == $totalPages && $currentPage < $totalPages - $range - 1) {
                            continue; // Will be shown below
                        }
                        
                        if ($i >= $currentPage - $range && $i <= $currentPage + $range) {
                            if ($i == $currentPage) {
                                echo '<li class="page-item active">';
                                echo '<span class="page-link">' . $i . '</span>';
                                echo '</li>';
                            } else {
                                echo '<li class="page-item">';
                                echo '<a class="page-link" href="predchadzajuce-podujatia?page=' . $i . '">' . $i . '</a>';
                                echo '</li>';
                            }
                        }
                    }
                    
                    // Last page
                    if ($currentPage < $totalPages - $range - 1) {
                        echo '<li class="page-item disabled"><span class="page-link">...</span></li>';
                        echo '<li class="page-item">';
                        echo '<a class="page-link" href="predchadzajuce-podujatia?page=' . $totalPages . '">' . $totalPages . '</a>';
                        echo '</li>';
                    }
                    
                    // Next button
                    if ($currentPage < $totalPages) {
                        echo '<li class="page-item">';
                        echo '<a class="page-link" href="predchadzajuce-podujatia?page=' . ($currentPage + 1) . '" aria-label="Next">';
                        echo '<span aria-hidden="true">&raquo;</span>';
                        echo '</a></li>';
                    } else {
                        echo '<li class="page-item disabled">';
                        echo '<span class="page-link">&raquo;</span>';
                        echo '</li>';
                    }
                    ?>
                </ul>
            </nav>
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
