<?php ob_start();
include "includes/header.php"; //INCLUDE HEADER
?>
<!--MOBILE NAVBAR-->
<?php
include "includes/mobile-navigation.php"; //INCLUDE NAVIGATION FOR MOBILE
?>


<?php
?>
<?php
if (!isset($_SESSION['user_role'])) {
	header('Location: index.php');
}
?>
<!--LG SCREEN NAVBAR-->
<div class="col-md-10 col-sm-12 d-none d-md-inline">


    <a class="float-left text-light mt-2" href="../index.php" target="_blank"><i class="fas fa-external-link-alt"></i>
        Zobraziť stránku</a>
    <!--    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">-->


    <!--        USER INFO-->

	<?php
	include 'includes/profile_dropdown.php';
	?>
</div><!--//LG SCREEN NAVBAR-->
</nav>

<div class="container-fluid">
    <div class="row">
		<?php
		include "includes/navigation.php";  //INCLUDE NAVIGATION
		?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2 text-muted">Nastavenia</h1>
            </div>
            <?php


            if (isset($_GET['source'])) {
                $source = $_GET['source'];
            } else {
                $source = '';
            }


            switch ($source) {
                case 'edit_section':
                    include 'settings/edit_section.php';
                    break;
                default:
                    include 'settings/view_all_settings.php';

            }
            ?>


        </main>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#sekcieTable').DataTable({
            "order": [],
            "pageLength": 10
        });
    });
</script>


<?php

include 'includes/footer.php';


?>

