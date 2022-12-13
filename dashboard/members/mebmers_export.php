<?php
if (isset($_POST['export-to-excel'])) {
	try {
		include '../includes/db.php';

		$query = "SELECT degree, name, lastname, dateofbirth, adress, JMBG, number, email, 	passnumber,  year FROM members";
		$send_info = $connection->prepare($query);
		$send_info->execute();
		$columnHeader = "Titul" . "\t" . "Meno" . "\t" . "Priezvisko" . "\t" . "Dátum narodenia" . "\t" . "Adresa" . "\t" . "JMBG" . "\t" . "Telefónne číslo" . "\t" . "Email" . "\t" . "Číslo pasu" . "\t" . "Rok zapojenia sa";
		$setData = '';

		while ($row = $send_info->fetch(PDO::FETCH_ASSOC)) {
			$rowData = '';
			foreach ($row as $value) {
				$value = '' . $value . '' . "\t";
				$rowData .= $value;
			}
			$setData .= ($rowData) . "\n";
		}

		$filename = 'zoznam-clenov-' . date('d-m-Y') . '.csv';
		$data = ($columnHeader) . "\n" . $setData . "\n";
		$data = explode("\n", $data);
		header('Content-Encoding: UTF-8');
		header('Content-type: text/csv; charset=UTF-8');
		header('Content-Disposition: attachment; filename="' . $filename . '"');
		$fp = fopen('php://output', 'wb');
		foreach ($data as $line) {
			$val = explode("\t", $line);
			fputcsv($fp, $val);
		}
		fclose($fp);
	} catch (Exception $e) {
		echo $e;
	}
}
?>
