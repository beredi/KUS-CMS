<?php


if (isset($_POST['sex'])) {

	try {
		include '../includes/db.php';

		$sex = $_POST['sex'];
		$query = "SELECT name, lastname FROM members";
		if ($sex != 'all') $query .= " WHERE  sex = '" . $sex . "'";
		$query .= " ORDER BY RAND() LIMIT 1";


		$send_info = $connection->prepare($query);

		$send_info->execute();

		$result = $send_info->fetch(PDO::FETCH_ASSOC);

		$name = $result['name'];
		$lastname = $result['lastname'];

		$result = array(
			'member' => $name . ' ' . $lastname
		);

		echo json_encode($result);
	} catch (Exception $e) {
		echo $e;
	}

}
