<?php
include 'includes/header.php';
?>
<body>
<div class="container content">
    <?php
    include 'includes/navbar.php';
    ?>
    <!--CONTENT-->
    <div class="container">

	        <?php

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
	        }
	        catch (Exception $e) {
	            echo  $e;
	        }
		        ?>
        <div class="row">
            <div class="col-lg-12">
                <h1 class="float-left">Videogaléria<br>
                    <small class="float-left">Pozrite si bohatstvo našich aktivít</small></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-offset-10 col-lg-2">
                <p class="text-right text-muted">Strana <?=$currentPage?> z <?=$countPages?></p>
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
		        $query = "SELECT * FROM videogallery ORDER BY id DESC LIMIT ".$page_1.", ".$posts_by_page;

		        $send_info = $connection->prepare($query);
	            $send_info->execute();
	            $count = $send_info->rowCount();
	            if($count==0){
		            echo "<h3>Žiadne videá na zobrazenie.</h3>";
	            }
		        while ($row = $send_info->fetch(PDO::FETCH_ASSOC)){
		            ?>

                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="thumbnail text-center" style="height: 450px;">
                        <iframe width="100%" height="400px" <?=$row['code']?>></iframe>
                        <p><?=$row['title']?></p>
                    </div>
                </div>
            <?php
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
                        <li><a href="videogallery?page=<?=$i?>" class="active-page"><?=$i?></a></li>
					    <?php
				    }
				    else{
					    ?>
                        <li><a href="videogallery?page=<?=$i?>"><?=$i?></a></li>
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