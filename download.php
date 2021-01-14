
<?php
include 'includes/header.php';
?>
<body>
<div class="container content">
    <?php
    include 'includes/navbar.php';
    ?>
</div>
<!--TODO: Dynamic files upload/read-->
<div class="container">
    <h1>Na stiahnutie<br>
    <small>Pozrite si naše publikácie a promo materiál.</small></h1>
    <div class="row photoGallery">
        <div class="col-lg-3">
            <div class="thumbnail text-center">
                <a href="images/files/cinnost-sprevadzana-hudbou.pdf">
                    <img src="images/pdf-icon.jpg" title="Stiahnuť" alt="Cinnost sprevadzana hudbou" style="width: 100px;">
                </a>
                <a href="images/files/cinnost-sprevadzana-hudbou.pdf" title="Stiahnuť">
                    <p>Činnosť sprevádzaná hudbou (.PDF)</p>
                </a>
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

<script src="links/link.js"></script>
</body>
<!--   font-family: 'Istok Web', sans-serif;   -->
</html>