<?php
include 'includes/header.php';
?>
<body>
<div class="container content">
    <?php
    include 'includes/navbar.php';
	try{
		include 'dashboard/includes/db.php';

		$posts_by_page = 6;
		// POSTS COUNTER
		$queryCounter = "SELECT * FROM posts WHERE post_status = 'published'";
		$send_info = $connection->prepare($queryCounter);
		$send_info->execute();
		$countPosts = $send_info->rowCount();
		$countPages = ceil($countPosts / $posts_by_page);

		// GET POSTS

		if(isset($_GET['page'])){
			$page = $_GET['page'];
		}
		else{
			$page = '';
		}

		if($page == '' || $page == 1){
			$page_1 = 0;
			$currentPage = 1;
		}
		else{
			$page_1 = ($page * $posts_by_page) - $posts_by_page;
			$currentPage = $page;
		}


	}
	catch (Exception $e){
		echo $e;
	}
	?>
        <div class="row">
            <div class="col-lg-12">
                <h1 class="float-left">Predchádzajúce podujatia<br>
                    <small class="float-left">Prečítajte si o tom, kde sme vystúpili a čo sme všetko organizovali.</small></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-offset-10 col-lg-2">
                <p class="text-right text-muted">Strana <?=$currentPage?> z <?=$countPages?></p>
            </div>
        </div>
        <div class="row">

            <?php
            try{
                include 'dashboard/includes/db.php';

                $posts_by_page = 6;
                // POSTS COUNTER
	            $queryCounter = "SELECT * FROM posts WHERE post_status = 'published'";
	            $send_info = $connection->prepare($queryCounter);
	            $send_info->execute();
	            $countPosts = $send_info->rowCount();
	            $countPosts = ceil($countPosts / $posts_by_page);

	            // GET POSTS

                if(isset($_GET['page'])){
                    $page = $_GET['page'];
                }
                else{
                    $page = '';
                }

                if($page == '' || $page == 1){
                    $page_1 = 0;
                }
                else{
                    $page_1 = ($page * $posts_by_page) - $posts_by_page;
                }

                $query = "SELECT * FROM posts WHERE post_status = 'published' ORDER BY post_id DESC LIMIT ".$page_1.", ".$posts_by_page;


                $send_info = $connection->prepare($query);

                $send_info->execute();

                $count = $send_info->rowCount();

                if($count==0){
                    echo "<h3>Žiadne články na zobrazenie.</h3>";
                }
                while ($row = $send_info->fetch(PDO::FETCH_ASSOC)){
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_image = $row['post_image'];
                    $temp_post_content = strip_tags($row['post_content']);

                    $post_content = (substr($temp_post_content, 0,190)."...");


                    echo "
                
            <div class=\"col-lg-4 col-md-4 col-sm-12 col-xs-12 \" style='margin: 2px auto; max-height: 500px;'>
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
                ";

                }

            }
            catch (Exception $e){
                echo $e;
            }
            ?>


    </div>
    <div class="row" style="margin-top: 20px">
        <ul class="pager">
            <?php
            $page = 1;
            if(isset($_GET['page'])){
                $page = $_GET['page'];
            }
            for ($i = 1; $i <= $countPages; $i++){
                if ($i == $page){
                ?>
                <li><a href="predchadzajuce-podujatia?page=<?=$i?>" class="active-page"><?=$i?></a></li>
            <?php
                }
                else{
	                ?>
                    <li><a href="predchadzajuce-podujatia?page=<?=$i?>"><?=$i?></a></li>
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