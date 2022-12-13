<?php
include 'includes/header.php';
?>
<body>
<div class="container">
	<?php
	include 'includes/navbar.php';
	?>

    <!--CAROUSEL-->
    <div id="myCarousel" class="carousel slide hidden-sm hidden-xs" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
			<?php


			try {

				include "dashboard/includes/db.php";

				$query_select = "SELECT * FROM news";
				$send_info = $connection->prepare($query_select);

				$send_info->execute();


				while ($row = $send_info->fetch(PDO::FETCH_ASSOC)) {
					$value = $row['news_value'];
				}
			} catch (Exception $e) {

			}
			if ($value == 0) {

				try {

					include "dashboard/includes/db.php";
					$query = "SELECT * FROM posts WHERE post_status = 'published' ORDER BY post_id DESC LIMIT 3";

					$select_info = $connection->prepare($query);

					$select_info->execute();

					$i = 1;
					while ($row = $select_info->fetch(PDO::FETCH_ASSOC)) {
						$post_title = $row['post_title'];
						$post_image = $row['post_image'];
						$post_id = $row['post_id'];

						echo "
                    
            <div class=\"item ";

						if ($i == 1) {
							echo 'active';
						}

						echo "\">
                <div style=\"width: 100%; height: 640px;\">
                    <img src=\"images/articles/$post_image\"  alt=\"$post_title\" style=\"width: 100%; margin: auto 0;\">
                </div>
                <div class=\"carousel-caption\">
                    <h3>$post_title</h3>
                    <p><a href=\"clanok.php?p_id=$post_id\" role=\"button\" class=\"btn-primary btn\">Čítaj viac!</a> </p>
                </div>
            </div>
                    ";

						$i++;
					}
				} catch (Exception $e) {
					echo $e;
				}
			} else {

				try {

					include "dashboard/includes/db.php";
					$query = "SELECT * FROM posts WHERE post_status = 'published' ORDER BY post_position DESC LIMIT 3";

					$select_info = $connection->prepare($query);

					$select_info->execute();

					$i = 1;
					while ($row = $select_info->fetch(PDO::FETCH_ASSOC)) {
						$post_title = $row['post_title'];
						$post_image = $row['post_image'];
						$post_id = $row['post_id'];

						echo "
                    
            <div class=\"item ";

						if ($i == 1) {
							echo 'active';
						}

						echo "\">
                <div style=\"width: 100%; height: 640px;\">
                    <img src=\"images/articles/$post_image\"  alt=\"$post_title\" style=\"width: 100%; margin: auto 0;\">
                </div>
                <div class=\"carousel-caption\">
                    <h3>$post_title</h3>
                    <p><a href=\"clanok.php?p_id=$post_id\" role=\"button\" class=\"btn-primary btn\">Čítaj viac!</a> </p>
                </div>
            </div>
                    ";

						$i++;
					}
				} catch (Exception $e) {
					echo $e;
				}


			}


			?>

        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!--SMALL SCREEN-->
    <div class="row hidden-lg hidden-md">
        <h3 style="margin-left: 2px;">Posledné články:</h3>
		<?php

		try {
			include 'dashboard/includes/db.php';


			$query = "SELECT * FROM posts WHERE post_status = 'published' ORDER BY post_id DESC LIMIT 3";

			$send_info = $connection->prepare($query);

			$send_info->execute();

			while ($row = $send_info->fetch(PDO::FETCH_ASSOC)) {
				$post_id = $row['post_id'];
				$post_title = $row['post_title'];
				$post_image = $row['post_image'];


				echo "        
            <div class=\"media\">
                <div class=\"media-top top\">
                    <a href=\"clanok.php?p_id=$post_id\"><img src=\"images/articles/$post_image\" class=\"media-object\" style=\"width:100%\" alt=\"$post_title\"></a>
                </div>
                <div class=\"media-body\" style='border: 0; border-bottom: 1px solid rgba(44,50,127,0.1);'>
                    <h4 class=\"media-heading\"><a href=\"clanok.php?p_id=$post_id\">$post_title</a></h4>
                </div>
            </div>
        ";
			}

		} catch (Exception $e) {
			echo $e;
		}
		?>
    </div>
</div>
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
