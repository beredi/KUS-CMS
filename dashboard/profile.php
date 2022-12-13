<?php ob_start(); ?>
<?php
include "includes/header.php"; //INCLUDE HEADER
?>
<!--    <!--MOBILE NAVBAR-->
<?php
include "includes/mobile-navigation.php"; //INCLUDE NAVIGATION FOR MOBILE
?>


<?php
if (isset($_SESSION['user_id'])) {
	$user_id = $_SESSION['user_id'];


	include 'includes/db.php';

	$query = "SELECT * FROM users WHERE user_id = $user_id ";

	$send_info = $connection->prepare($query);
	$send_info->execute();


	while ($row = $send_info->fetch(PDO::FETCH_ASSOC)) {
		$user_id = $row['user_id'];
		$user_titul = $row['user_titul'];
		$user_name = $row['user_name'];
		$user_lastname = $row['user_lastname'];
		$user_email = $row['user_email'];
		$user_role = $row['user_role'];
		$user_function = $row['user_function'];
		$user_image = $row['user_image'];
	}
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
                <h1 class="h2 text-muted">Profil</h1>
            </div>


            <div class="col-md-3 col-sm-12">
                <img src="../images/ludia/<?php echo $user_image; ?>" style="width: 100%;">

                <h5 class="my-2 text-right"><?php echo $user_titul; ?><?php echo "$user_name $user_lastname" ?></h5>
                <ul class="list-group">
                    <li class="list-group-item">
                        <small class="text-muted">Email:</small>
                        <span class="float-right"><?php echo $user_email; ?></span>
                    </li>
                    <li class="list-group-item">
                        <small class="text-muted">Funkcia:</small>
                        <span class="float-right"><?php echo $user_function; ?></span>
                    </li>
                    <li class="list-group-item">
                        <small class="text-muted">Rola:</small>
                        <span class="float-right"><?php echo $user_role; ?></span>
                    </li>
                </ul>

                <a href="users.php?source=edit_user&edit=<?php echo $_SESSION['user_id']; ?>" name="edit_user"
                   type="submit" class="btn btn-lg btn-info my-3 w-100">Upraviť údaje</a>

            </div>


        </main>
    </div>
</div>

<?php

include 'includes/footer.php';


?>

