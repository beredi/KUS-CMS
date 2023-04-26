<?php ob_start(); ?>
<?php
include "includes/header.php"; //INCLUDE HEADER
?>
<!--    MOBILE NAVBAR-->
<?php
include "includes/mobile-navigation.php"; //INCLUDE NAVIGATION FOR MOBILE
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
                <h1 class="h2 text-muted">Členovia</h1>
            </div>

			<?php


			if (isset($_GET['source'])) {
				$source = $_GET['source'];
			} else {
				$source = '';
			}


			switch ($source) {
				case 'add_member':
					include 'members/add_member.php';
					break;
				case 'edit_member':
					include 'members/edit_member.php';
					break;
				case 'show_member':
					include 'members/show_member.php';
					break;
				case 'new_payment':
					include 'members/new_payment.php';
					break;
				default:
					include 'members/view_all_members.php';

			}
			?>


        </main>
    </div>
</div>

<?php



if (isset($_GET['delete_payment'])) {
    $id = $_GET['delete_payment'];

    try {
        include 'includes/db.php';

        $query1 = "SELECT * from payments WHERE id=:id";

        $send_info1 = $connection->prepare($query1);
        $send_info1->bindParam(':id', $id);
        $send_info1->execute();


        $result = $send_info1->fetch(PDO::FETCH_ASSOC);

        $query = "DELETE FROM payments WHERE id=:id";


        $send_info = $connection->prepare($query);
        $send_info->bindParam(':id', $id);
        $send_info->execute();
        // LOG
        include "includes/add_log.php";
        $logAction = "Vymazal platbu pre clena s id " . $result['member_id'];
        createLog($connection, $logAction, "členovia");
        header('Location: members.php?source=show_member&member_id='.$result['member_id']);
    } catch (Exception $e) {
        echo $e;
    }
}
include 'includes/footer.php';


?>

