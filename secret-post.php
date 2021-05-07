<?php
include 'includes/header.php';
if (isset($_POST['secret-msg'])){
	$msg = $_POST['msg'];
	$date = date('d-m-Y', strtotime('now'));
	try {
		include 'dashboard/includes/db.php';
		include 'dashboard/includes/send_email_admin_lector.php';
		$query = "INSERT INTO secretmsgs (msg, `date`) VALUES (:msg, :date)";
		$send_info = $connection->prepare($query);

		$send_info->bindParam(':msg', $msg);
		$send_info->bindParam(':date', $date);
		$send_info->execute();
        sendSecretMsgNotification($connection, $msg);
	} catch (Exception $e) {
		echo $e;
	}
	?>

	<div class="container">
		<p class="bg-success success-message">Ďakujeme za úprimnosť :)</p>
	</div>
<?php
}
else{

?>
	<div class="container">
			<form action="" class="from" method="post" style="width: 100%">
				<div class="row">
					<div class="col-sm-12">
						<div class="from-group">
							<label for="msg">Vaša správa</label>
							<textarea type="submit" name="msg" class=form-control" style="width: 100%" placeholder="Napíšte nám..." rows="10"></textarea>
						</div>
					</div>
				</div>
				<div class="col-sm-12">
					<div class="from-group">
						<input type="submit" name="secret-msg" class="btn btn-lg btn-primary" value="Odoslať">
					</div>
				</div>
			</form>
<?php
}

?>
