<?php ob_start(); ?>



<?php
include "includes/header.php"; //INCLUDE HEADER
?>
<!--MOBILE NAVBAR-->
<?php
include "includes/mobile-navigation.php"; //INCLUDE NAVIGATION FOR MOBILE
?>


<?php
?>
<?php
if (isset($_SESSION['user_role'])){
	if (isUser('lektor') || isUser('user')){
		header('Location: index.php');
	}
}
?>
<!--LG SCREEN NAVBAR-->
<div class="col-md-10 col-sm-12 d-none d-md-inline">


	<a class="float-left text-light mt-2" href="../index.php" target="_blank"><i class="fas fa-external-link-alt"></i> Zobraziť stránku</a>
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
				<h1 class="h2 text-muted">Tajné správy</h1>
			</div>
			<?php

			try{
				include 'includes/db.php';

				$query = "SELECT * FROM secretmsgs ORDER BY id DESC";
				$send_info = $connection->prepare($query);

				$send_info->execute();

				while ($row = $send_info->fetch(PDO::FETCH_ASSOC)){
					$id = $row['id'];
					$msg = $row['msg'];
					$date = $row['date'];
					?>

					<div class="row secret-msg-row">
						<div class="col-sm-12" style="border-bottom: 1px solid #eeeeee; padding: 0 0 1px 15px; margin: 0px;">
							<p style="font-size: 10px; margin: 0px; padding: 0px;">
								<strong><?=$date?></strong>
							</p>
						</div>
						<a href="secret-posts.php?delete=<?=$id?>" class="btn btn-danger btn-sm delete-button" style="position:absolute; right: 50px; display: block; z-index: 100">X</a>
						<div class="col-sm-12">
							<p style="padding-top: 5px;">
								<?=$msg?>
							</p>
						</div>
					</div>
			<?php

				}
			}
			catch (Exception $e){
				echo $e;
			}
			?>


		</main>
	</div>
</div>
<script>
    function showMe (box) {

        var chboxs = document.getElementsByName("last3");
        var vis = "none";
        for(var i=0;i<chboxs.length;i++) {
            if(!chboxs[i].checked){
                vis = "block";
                break;
            }
        }
        document.getElementById(box).style.display = vis;


    }
</script>

<?php

include 'includes/footer.php';

if (isset($_GET['delete'])){
	$id = $_GET['delete'];

	if (isset($_SESSION['user_role'])){
		if (isUser('admin') || isUser('moderator')){

			try{
				include 'includes/db.php';

				$query = "DELETE FROM secretmsgs WHERE id=:id";


				$send_info = $connection->prepare($query);
				$send_info->bindParam(':id', $id);
				$send_info->execute();

				header('Location: secret-posts.php');
			}
			catch (Exception $e){
				echo $e;
			}
		}
	}
}

?>

