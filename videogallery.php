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
        <h1>Videogaléria<br>
            <small>Videá z našich vystúpení.</small></h1>
        <div class="row photoGallery">

	        <?php

	        try{

		        include 'dashboard/includes/db.php';
		        $query = "SELECT * FROM videogallery ORDER BY id DESC";

		        $send_info = $connection->prepare($query);

		        $send_info->execute();

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