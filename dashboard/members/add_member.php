<?php

if (isset($_SESSION['user_role'])){

	if(isUser('admin') || isUser('moderator')){
		if (isset($_POST['add_member'])){
				$name = $_POST['name'];
				$lastname = $_POST['lastname'];
				$dateofbirth = $_POST['dateofbirth'];
				$adress = $_POST['adress'];
				$JMBG = $_POST['JMBG'];
				$number = $_POST['number'];
				$email = $_POST['email'];
				$passnumber = $_POST['passnumber'];
				$year = $_POST['year'];

				$passscan = $_FILES['passscan']['name'];
				if (isset($passscan)) {
					$passscan_temp = $_FILES['passscan']['tmp_name'];
					$temp = explode(".", $_FILES['passscan']['name']);
					$extension = end($temp);
					$newfilename = round(microtime(true)) . '.' . $extension;
					if (!empty($passscan)) {
						$passscan = $newfilename;
						move_uploaded_file($passscan_temp, "../images/pass-scan/$newfilename");
					}
				}

				try{
					include "includes/db.php";


					$query = "INSERT INTO members(name, lastname, dateofbirth, adress, JMBG, number, email, passnumber, passscan, year) VALUES (:name, :lastname, :dateofbirth, :adress, :JMBG, :number, :email, :passnumber, :passscan, :year) ";

					$send_info = $connection->prepare($query);

					$send_info->bindParam(':name', $name);
					$send_info->bindParam(':lastname', $lastname);
					$send_info->bindParam(':dateofbirth', $dateofbirth);
					$send_info->bindParam(':adress', $adress);
					$send_info->bindParam(':JMBG', $JMBG);
					$send_info->bindParam(':number', $number);
					$send_info->bindParam(':email', $email);
					$send_info->bindParam(':passnumber', $passnumber);
					$send_info->bindParam(':passscan', $passscan);
					$send_info->bindParam(':year', $year);

					$send_info->execute();
					echo "<h3 class='text-success'>Člen $name $lastname bol úspešne pridaný</h3>";


					// LOG
					include "includes/add_log.php";
					$logAction = "Pridal používateľa " . $name . " " . $lastname;
					createLog($connection, $logAction, "členovia");

				}
				catch (Exception $e){
					echo $e;
				}





		}


	}
	else{
		header('Location: index.php');
	}
}

?>

<h2>Pridať člena</h2>
<div class="col-md-6 col-sm-12">
	<form action="" method="post" enctype="multipart/form-data" class="my-2">
		<div class="form-group">
			<label for="name">Meno: <span class="text-danger">(required)</span> </label>
			<input type="text" class="form-control" id="name" placeholder="Zadajte meno" name="name" required autocomplete="off">
		</div>
		<div class="form-group">
			<label for="lastname">Priezvisko: <span class="text-danger">(required)</span></label>
			<input type="text" class="form-control" id="lastname" placeholder="Zadajte priezvisko" name="lastname" required autocomplete="off">
		</div>
		<div class="form-group">
			<label for="dateofbirth">Dátum narodenia:</label>
			<input type="date" class="form-control" id="dateofbirth" placeholder="Zadajte dátum narodenia" name="dateofbirth" autocomplete="off">
			<small id="user_function" class="form-text text-muted"><span class="text-info">MESIAC / DEN / ROK</span></small>
		</div>
		<div class="form-group">
			<label for="adress">Adresa:</label>
			<input type="text" class="form-control" id="adress" placeholder="Zadajte adresu" name="adress" autocomplete="off">
			<small id="user_function" class="form-text text-muted">Ulica číslo, PSČ Mesto <span class="text-info">M. Tita 2222, 21425 Selenča</span></small>
		</div>
		<div class="form-group">
			<label for="JMBG">JMBG:</label>
			<input type="number" class="form-control" id="JMBG" placeholder="Zadajte JMBG" name="JMBG" autocomplete="off">
		</div>
		<div class="form-group">
			<label for="number">Telefónne číslo:</label>
			<input type="text" class="form-control" id="number" placeholder="Zadajte tel. číslo" name="number" autocomplete="off">
			<small id="user_function" class="form-text text-muted">V medzinárodnom tvare: <span class="text-info">+381XXXXXXX</span></small>
		</div>
		<div class="form-group">
			<label for="email">Email:</label>
			<input type="email" class="form-control" id="email" placeholder="Zadajte email" name="email" autocomplete="off">
		</div>
		<div class="form-group">
			<label for="passnumber">Číslo cestovného pasu:</label>
			<input type="text" class="form-control" id="passnumber" placeholder="Zadajte číslo pasu" name="passnumber" autocomplete="off">
		</div>
		<div class="form-group mt-3">
			<label for="passscan">Obrázok skenovaného pasu:</label>
			<input type="file" class="form-control-file" id="passscan" name="passscan">
		</div>
		<div class="form-group">
			<label for="year">Od ktorého roku je členom:</label>
			<input type="number" class="form-control" id="year" placeholder="Zadajte rok" name="year" autocomplete="off">
		</div>
		<input type="submit" class="btn btn-primary my-1 float-right" style="width: 50%;" name="add_member" value="Pridať">



	</form>
</div>
