<?php
session_start();


if (isset($_SESSION['user_name']) && !empty($_SESSION['user_name'])) {
	header('Location: dashboard/index.php');
}


if (isset($_POST['login'])) {
	$user_email = $_POST['user_email'];
	$user_password = $_POST['user_password'];


	try {
		include 'dashboard/includes/db.php';


		$query = "SELECT * FROM users WHERE user_email = :user_email AND user_password = AES_ENCRYPT(:password, :key)";


		$send_info = $connection->prepare($query);

		$send_info->bindParam(':user_email', $user_email);
		$send_info->bindParam(':password', $user_password);
		$send_info->bindParam(':key', $key);

		$send_info->execute();


		$send_info->setFetchMode(PDO::FETCH_OBJ);
		$result = $send_info->fetchAll();

		if (count($result) == 0) {
			$message = "<h6 class='text-danger mt-2'>Chybný email alebo heslo</h6>";
		} else {

			foreach ($result as $item) {
				$_SESSION['user_id'] = $item->user_id;
				$_SESSION['user_email'] = $item->user_email;
				$_SESSION['user_name'] = $item->user_name;
				$_SESSION['user_lastname'] = $item->user_lastname;
				$_SESSION['user_role'] = $item->user_role;
				$_SESSION['user_function'] = $item->user_function;
				$_SESSION['user_image'] = $item->user_image;

				header('Location: dashboard/index.php');
				exit;
			}

		}

	} catch (Exception $e) {
		echo $e;
	}

}
?>

<!doctype html>
<html lang="sk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Jaroslav Beredi">
    <!--FONT ISTOK WEB-->
    <link href="https://fonts.googleapis.com/css?family=Istok+Web" rel="stylesheet">

    <!--FONT RALEWAY-->

    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">


    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
          integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <!--FAVICON-->
    <link rel="apple-touch-icon" sizes="57x57" href="favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="../faviconapple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
            integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
            crossorigin="anonymous"></script>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="links/login.css" rel="stylesheet">

</head>


<body class="text-center">

<form class="form-signin" method="post" action="">
    <img class="mb-4" src="images/znak-copy.png" alt="" width="120" height="120">
    <h1 class="h3 mb-3 font-weight-normal">Prihláste sa</h1>
    <label for="inputEmail">Email</label>
    <input autocomplete="off" type="email" name="user_email" id="inputEmail" class="form-control"
           placeholder="Zadajte email" required autofocus>
    <label for="inputPassword">Heslo</label>
    <input autocomplete="off" type="password" id="inputPassword" class="form-control" placeholder="Zadajte heslo"
           name="user_password" required>
    <input class="btn btn-lg btn-primary btn-block" type="submit" name="login" value="Prihlásiť sa">
	<?php
	if (isset($message)) {
		echo $message;
	}
	?>
    <p class="mt-5 mb-3 text-muted">&copy; <a href="index">KUS Jána Kollára</a> 2017-<?php echo date('Y'); ?></p>
</form>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>

<!-- Icons -->
<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
<script>
    feather.replace()
</script>
</body>
</html>
<?php
?>
