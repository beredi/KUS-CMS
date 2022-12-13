<?php

if (isset($_SESSION['user_role'])) {

	if (strpos($_SESSION['user_role'], 'admin') || strpos($_SESSION['user_role'], 'moderator')) {


		if (isset($_POST['add_user'])) {


			if ($_POST['user_password'] == $_POST['user_password_confirm']) {
				$user_password = $_POST['user_password'];


				$user_email = $_POST['user_email'];
				try {
					include "includes/db.php";

					$query = "SELECT * FROM users WHERE user_email = :user_email";

					$send_info = $connection->prepare($query);
					$send_info->bindParam(':user_email', $user_email);
					$send_info->execute();

					$count = $send_info->rowCount();
					if ($count > 0) {

						echo "<h4 class='text-danger'>Emailová adresa je už použitá.</h4>";

					} else {


						$user_name = $_POST['user_name'];
						$user_lastname = $_POST['user_lastname'];
						$user_titul = $_POST['user_titul'];

						$user_role_array = $_POST['user_role'];

						$user_role = '';
						foreach ($user_role_array as $array => $value) {
							$user_role .= " $value,";
						}
						$user_role = substr($user_role, 0, -1);

						if (strpos($_SESSION['user_role'], 'moderator') && strpos($user_role, 'admin')) {
							echo "<h4  class='text-danger'>Nemáte oprávnenie pridať administrátora!</h4>";
						} else {


							$user_function = $_POST['user_function'];
							$user_image = $_FILES['user_image']['name'];
							$user_image_temp = $_FILES['user_image']['tmp_name'];
							if (isset($user_image)) {
								if (!empty($user_image)) {
									move_uploaded_file($user_image_temp, "../images/ludia/$user_image");

								} else {
									$user_image = 'person.jpg';
								}

							} else {
								$user_image = 'person.jpg';
							}


							try {
								include "includes/db.php";


								$query = "INSERT INTO users(user_email, user_name, user_password, user_role, user_function, user_image, user_titul, user_lastname) VALUES (:user_email, :user_name, AES_ENCRYPT(:password, :key), :user_role, :user_function, :user_image, :user_titul, :user_lastname) ";

								$send_info = $connection->prepare($query);

								$send_info->bindParam(':user_email', $user_email);
								$send_info->bindParam(':user_name', $user_name);
								$send_info->bindParam(':password', $user_password);
								$send_info->bindParam(':key', $key);
								$send_info->bindParam(':user_role', $user_role);
								$send_info->bindParam(':user_function', $user_function);
								$send_info->bindParam(':user_image', $user_image);
								$send_info->bindParam(':user_titul', $user_titul);
								$send_info->bindParam(':user_lastname', $user_lastname);

								$send_info->execute();
								echo "<h3 class='text-success'>Užívateľ $user_name bol úspešne pridaný</h3>";


								// LOG
								include "includes/add_log.php";
								$logAction = "Pridal používateľa " . $user_name;
								createLog($connection, $logAction, "používatelia");

								include "includes/send_email_to_new_user.php";
								sendEmailToNewUser($connection, $user_email, $user_titul, $user_name, $user_lastname, $user_password);
							} catch (Exception $e) {
								echo $e;
							}


						}

					}

				} catch (Exception $e) {
					echo $e;
				}

			} else {
				echo "<h3 class='text-danger'>Heslá sa nezhodujú</h3>";
			}


		}


	} else {
		header('Location: index.php');
	}
}

?>

<h2>Pridať užívateľa</h2>
<div class="col-md-6 col-sm-12">
    <form action="" method="post" enctype="multipart/form-data" class="my-2">
        <div class="form-group">
            <label for="user_titul">Titul: </label>
            <input type="text" class="form-control text-right" id="user_titul" placeholder="Zadajte titul"
                   name="user_titul" style="width:20%;" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="user_name" class="required">Meno:</label>
            <input type="text" class="form-control" id="user_name" placeholder="Zadajte meno užívateľa" name="user_name"
                   required autocomplete="off">
        </div>
        <div class="form-group">
            <label for="user_lastname" class="required">Priezvisko:</label>
            <input type="text" class="form-control" id="user_lastname" placeholder="Zadajte priezvisko užívateľa"
                   name="user_lastname" required autocomplete="off">
        </div>
        <div class="form-group">
            <label for="user_email" class="required">Email:</label>
            <input type="email" class="form-control" id="user_email" placeholder="Zadajte email užívateľa"
                   name="user_email" required autocomplete="off">
        </div>
        <div class="form-group">
            <label for="user_password" class="required">Heslo: <span class="text-danger">min. 5 znakov</span></label>
            <input type="password" class="form-control" id="user_password" placeholder="Zadajte heslo užívateľa"
                   name="user_password" required minlength="5">
        </div>
        <div class="form-group">
            <label for="user_password_confirm" class="required">Zopakovať heslo:</label>
            <input type="password" class="form-control" id="user_password_confirm"
                   placeholder="Zopakujte heslo užívateľa" name="user_password_confirm" required>
        </div>
        <div class="form-group mt-3">
            <label for="user_image">Obrázok: <span class="text-danger">(do 10MB!)</span></label>
            <input type="file" class="form-control-file" id="user_image" name="user_image">
        </div>
        <div class="form-group mt-3">
            <label for="user_function">Funkcia:</label>
            <input type="text" class="form-control" id="user_function" placeholder="Zadajte funkciu užívateľa"
                   name="user_function" aria-describedby="user_function" autocomplete="off">
            <small id="user_function" class="form-text text-muted">Napríklad: <span class="text-info">Predsedníčka spolku, Tajomník, Umelecký vedúci a pod.</span></small>
        </div>

        <span class="required">Rola</span>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" name="user_role[]" value="admin" id="admin" tabIndex="1"
                   onClick="ckChange(this)" disabled>
            <label class="form-check-label" for="admin">Admin
				<?php
				if (strpos($_SESSION['user_role'], 'moderator')) {
					echo "<small class='text-danger'>Nemáte oprávnenie pridávať administrátora!</small>";
				}
				?>
            </label>

        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" name="user_role[]" value="moderator" id="moderator"
                   tabIndex="1" onClick="ckChange(this)" disabled>
            <label class="form-check-label" for="moderator">Moderátor</label>

        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" name="user_role[]" value="lektor" id="lektor" tabIndex="1"
                   onClick="ckChange(this)" disabled>
            <label class="form-check-label" for="lektor">Lektor</label>

        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" name="user_role[]" value="uzivatel" id="uzivatel"
                   tabIndex="1" onClick="ckChange(this)" checked>
            <label class="form-check-label" for="uzivatel">Užívateľ</label>


        </div>

        <input type="submit" class="btn btn-primary my-1 float-right" style="width: 50%;" name="add_user"
               value="Pridať">


    </form>
</div>

<script>
    function ckChange(ckType) {
        var ckName = document.getElementsByName(ckType.name);
        var checked = document.getElementById(ckType.id);


        if (document.getElementById("admin").checked) {
            for (var i = 0; i < ckName.length; i++) {

                if (!ckName[i].checked) {
                    ckName[i].disabled = true;
                } else {
                    ckName[i].disabled = false;
                }
            }
        } else if (document.getElementById("moderator").checked) {
            document.getElementById("admin").disabled = true
            document.getElementById("uzivatel").disabled = true
        } else if (document.getElementById("lektor").checked) {
            document.getElementById("admin").disabled = true
            document.getElementById("uzivatel").disabled = true
        } else if (document.getElementById("uzivatel").checked) {
            for (var i = 0; i < ckName.length; i++) {

                if (!ckName[i].checked) {
                    ckName[i].disabled = true;
                } else {
                    ckName[i].disabled = false;
                }
            }
        } else {
            for (var i = 0; i < ckName.length; i++) {
                ckName[i].disabled = false;
            }
        }


    }
</script>
