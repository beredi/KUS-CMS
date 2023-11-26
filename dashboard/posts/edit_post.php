<?php

if (isset($_GET['edit'])) {
	$post_id = $_GET['edit'];

	try {

		include "includes/db.php";

		$query = "SELECT * FROM posts WHERE post_id = $post_id ";

		$send_info = $connection->prepare($query);

		$send_info->execute();

		while ($row = $send_info->fetch(PDO::FETCH_ASSOC)) {
			$post_title = $row['post_title'];


			$post_image = $row['post_image'];


			$post_content = $row['post_content'];
			$post_date = $row['post_date'];
			$post_author = $row['post_author'];
			$post_status = $row['post_status'];
			$post_last_edited = $row['post_last_edited'];


		}
	} catch (Exception $e) {
		echo $e;
	}
}


$userId = $_SESSION['user_id'];

if (isUser('lektor') || isUser('moderator') || isUser('admin') || $userId == $post_author) {


	if (isset($_POST['edit_post'])) {
		$post_title = $_POST['post_title'];


		$post_image = $_FILES['post_image']['name'];
		$post_image_temp = $_FILES['post_image']['tmp_name'];
		$temp = explode(".", $_FILES['post_image']['name']);
		$newfilename = round(microtime(true)) . '.' . end($temp);

		move_uploaded_file($post_image_temp, "../images/articles/" . $newfilename);


		if (empty($post_image)) {

			try {
				include 'includes/db.php';
				$query = "SELECT * FROM posts WHERE post_id = $post_id ";


				$send_info = $connection->prepare($query);

				$send_info->execute();

				while ($row = $send_info->fetch(PDO::FETCH_ASSOC)) {
					$newfilename = $row['post_image'];
				}

			} catch (Exception $e) {
				echo $e;
			}


		}


		try {
			include 'includes/db.php';

			$query = "SELECT * FROM posts WHERE post_id = $post_id ";


			$send_info = $connection->prepare($query);

			$send_info->execute();

			while ($row = $send_info->fetch(PDO::FETCH_ASSOC)) {
				$post_date = $row['post_date'];
			}

		} catch (Exception $e) {
			echo $e;
		}


		$post_content = $_POST['post_content'];
		$post_author = $_POST['post_author'];
		$post_status = 'draft';
		if (isset($_SESSION['user_name']) && isset($_SESSION['user_lastname'])) {
			$post_last_edited = $_SESSION['user_id'];
		}

		try {
			include "includes/db.php";


			$query = "UPDATE posts SET ";

			$query .= "post_title = :post_title, ";
			$query .= "post_author = :post_author, ";
			$query .= "post_date = :post_date, ";
			$query .= "post_image = :post_image, ";
			$query .= "post_content = :post_content, ";
			$query .= "post_status = :post_status, ";
			$query .= "post_last_edited = :post_last_edited ";
			$query .= "WHERE post_id=$post_id ";

			$send_info = $connection->prepare($query);

			$send_info->bindParam(':post_title', $post_title);
			$send_info->bindParam(':post_author', $post_author);
			$send_info->bindParam(':post_image', $newfilename);
			$send_info->bindParam(':post_content', $post_content);
			$send_info->bindParam(':post_status', $post_status);
			$send_info->bindParam(':post_date', $post_date);
			$send_info->bindParam(':post_last_edited', $post_last_edited);

			$send_info->execute();
			echo "<h3 class='text-success'>Článok $post_title bol upravený a čaká na schválenie! <small><a href=\"../clanok.php?p_id=$post_id\" class='text-muted' target='_blank'>Zobraziť</a></small></h3>";
			// LOG
			include "includes/add_log.php";
			$logAction = "Upravil článok " . $post_title;
			createLog($connection, $logAction, "články");
			include 'includes/send_email_admin_lector.php';
			sendEmailToAdminOrLector($connection, true);
		} catch (Exception $e) {
			echo $e;
		}
	}


	if (isset($_POST['publish_post'])) {
		$post_title = $_POST['post_title'];


		$post_image = $_FILES['post_image']['name'];
		$post_image_temp = $_FILES['post_image']['tmp_name'];
		$temp = explode(".", $_FILES['post_image']['name']);
		$newfilename = round(microtime(true)) . '.' . end($temp);

		move_uploaded_file($post_image_temp, "../images/articles/" . $newfilename);


		if (empty($post_image)) {

			try {
				include 'includes/db.php';
				$query = "SELECT * FROM posts WHERE post_id = $post_id ";


				$send_info = $connection->prepare($query);

				$send_info->execute();

				while ($row = $send_info->fetch(PDO::FETCH_ASSOC)) {
					$newfilename = $row['post_image'];
				}

			} catch (Exception $e) {
				echo $e;
			}


		}


		try {
			include 'includes/db.php';

			$query = "SELECT * FROM posts WHERE post_id = $post_id ";


			$send_info = $connection->prepare($query);

			$send_info->execute();

			while ($row = $send_info->fetch(PDO::FETCH_ASSOC)) {
				$post_date = $row['post_date'];
			}

		} catch (Exception $e) {
			echo $e;
		}


		$post_content = $_POST['post_content'];
		$post_author = $_POST['post_author'];
		$post_status = 'published';
		if (isset($_SESSION['user_name']) && isset($_SESSION['user_lastname'])) {
			$post_last_edited = $_SESSION['user_id'];
		}


		try {
			include "includes/db.php";


			$query = "UPDATE posts SET ";

			$query .= "post_title = :post_title, ";
			$query .= "post_author = :post_author, ";
			$query .= "post_date = :post_date, ";
			$query .= "post_image = :post_image, ";
			$query .= "post_content = :post_content, ";
			$query .= "post_status = :post_status, ";
			$query .= "post_last_edited = :post_last_edited ";
			$query .= "WHERE post_id=$post_id ";

			$send_info = $connection->prepare($query);

			$send_info->bindParam(':post_title', $post_title);
			$send_info->bindParam(':post_author', $post_author);
			$send_info->bindParam(':post_image', $newfilename);
			$send_info->bindParam(':post_content', $post_content);
			$send_info->bindParam(':post_status', $post_status);
			$send_info->bindParam(':post_date', $post_date);
			$send_info->bindParam(':post_last_edited', $post_last_edited);

			$send_info->execute();
			echo "<h3 class='text-success'>Článok $post_title bol publikovaný! <small><a href=\"../clanok.php?p_id=$post_id\" class='text-muted' target='_blank'>Zobraziť</a></small></h3>";
			// LOG
			include "includes/add_log.php";
			$logAction = "Publikoval článok " . $post_title;
			createLog($connection, $logAction, "články");

		} catch (Exception $e) {
			echo $e;
		}
	}


} else {
	header('Location: index.php');
}
?>


<h2>Upraviť článok</h2>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="post_title" class="required">
			Názov:
			<span class="text-danger">Minimálne 20 - maximálne 70 znakov</span>
		</label>
        <input
			type="text"
			class="form-control"
			id="post_title"
			value='<?php echo $post_title; ?>'
			name="post_title"
			required
			autocomplete="off"
			maxlength="70"
			minlength="20"
		>
        <input type="text" name="post_author" value="<?php echo $post_author; ?>" hidden>
    </div>
    <div class="form-group mt-3">
        <label for="post_image">Obrázok: <span class="text-danger">(do 10MB!)</span></label>
        <input type="file" class="form-control-file" id="post_image" name="post_image" value='$post_image'>
        <img src='../images/articles/<?php echo $post_image; ?>' alt='image' width="100px">
    </div>
    <div class="form-group">
        <label for="post_content" class="required">Obsah:</label>
        <textarea class="form-control" rows="10" id="post_content" name="post_content"
                  required><?php echo $post_content; ?></textarea>
    </div>
    <input type="submit" class="btn btn-primary" name="edit_post" value="Upraviť">
	<?php
	if (strpos($_SESSION['user_role'], 'admin') || strpos($_SESSION['user_role'], 'lektor')) {
		echo "
        
    <input type=\"submit\" class=\"btn btn-success\" name=\"publish_post\" value=\"Publikovať\">
        ";
	}
	?>


</form>


<script>
    CKEDITOR.replace('post_content');
</script>
<!--
<div class="form-group">
    <label for="post_title">Názov:</label>
    <input type="email" class="form-control" id="post_title" aria-describedby="emailHelp" placeholder="Zadajte názov článku" name="post_title">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
</div>-->
