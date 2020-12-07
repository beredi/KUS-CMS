<?php
include 'includes/header.php';
?>

<body>
<div class="container content">
    <?php
    include 'includes/navbar.php';

    include 'dashboard/includes/db.php';

    $query = "SELECT * from pages WHERE page_pseu = \"about\"";

    $send_info = $connection->prepare($query);

    $send_info->execute();
    while ($row = $send_info->fetch(PDO::FETCH_ASSOC)) {
    $title = $row['page_title'];
    $description = $row['page_description'];
    $content = $row['page_content'];
    ?>
        <div class="row">
            <div class="col-lg-12">
                <h1><?=$title?></h1><br>
                    <p class="text-muted"><?=$description?></p>
            </div>
        </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 about">
             <div class="text-justify contentBody">
             <?=$content?>
             </div>
        </div>

    </div>
</div>
<?php } ?>


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