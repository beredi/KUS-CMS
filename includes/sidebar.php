<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
    <h5>Posledné články:</h5>
	<?php

	try {
		include 'dashboard/includes/db.php';


		$query = "SELECT * FROM posts WHERE post_status ='published' ORDER BY post_id DESC LIMIT 3";

		$send_info = $connection->prepare($query);

		$send_info->execute();
        include 'includes/article.php';

		while ($row = $send_info->fetch(PDO::FETCH_ASSOC)) {
			$post_id = $row['post_id'];
			$post_title = $row['post_title'];
			$post_image = $row['post_image'];
			$post_content = $row['post_content'];


            generateArticleCard($post_id, $post_image, $post_title, $post_content);
		}

	} catch (Exception $e) {
		echo $e;
	}
	?></div>


<!--<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 clanokBody">
    <h5>Posledné články:</h5>
    <div class="media">
        <div class="media-top top">
            <a href="clanok1.html"><img src="images/contact.jpg" class="media-object" style="width:100%" alt="HEADING 1">HeEAD</a>
        </div>

    </div>
</div>-->
