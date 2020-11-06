
<?php
include 'includes/header.php';
?>
<body>
<div class="container content">
    <?php
    include 'includes/navbar.php';
    ?>
</div>
<div class="container">
    <h1>Fotogaléria<br>
    <small>Albumy z našich vystúpení.</small></h1>
    <div class="row photoGallery">
        <div class="col-lg-3">
            <div class="thumbnail text-center">
                <a href="malatina-2017.php"><img src="images/malatina-2017/1.jpg" title="Malatiná 2017" alt="photo" style="width: 100px;"> </a>
                <a href="malatina-2017.php"><p>Malatiná (Slovenská Republika)</p></a>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="thumbnail text-center">
                <a href="safarik-2017.php"><img src="images/safarik-2017/1.jpg" title="Šafárik 2017" alt="photo" style="width: 225px;"> </a>
                <a href="safarik-2017.php"><p>Program so SKC P. J. Šafárika</p></a>
            </div>
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
<script src="lightbox/js/lightbox.js"></script>

<script src="links/link.js"></script>
</body>
<!--   font-family: 'Istok Web', sans-serif;   -->
</html>