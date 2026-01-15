<?php ob_start(); ?>
<?php
include "includes/header.php";
?>

<?php
include "includes/mobile-navigation.php";
?>

<div class="col-md-10 col-sm-12 d-none d-md-inline">
    <a class="float-left text-light mt-2" href="../index.php" target="_blank"><i class="fas fa-external-link-alt"></i>
        Zobraziť stránku</a>
	<?php
	include 'includes/profile_dropdown.php';
	?>
</div>
</nav>

<div class="container-fluid">
    <div class="row">
		<?php
		include "includes/navigation.php";
		?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2 text-muted">Kategórie článkov</h1>
            </div>

			<?php
			if (isset($_GET['source'])) {
				$source = $_GET['source'];
			} else {
				$source = '';
			}

			switch ($source) {
				case 'edit_category':
					include 'categories/edit_category.php';
					break;
				default:
					include 'categories/view_all_categories.php';
			}
			?>

        </main>
    </div>
</div>

<?php
include 'includes/footer.php';
?>
