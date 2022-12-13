<?php
if (isset($_POST['export-to-excel'])) {
	try {
		include '../includes/db.php';

		$query = "SELECT name, count, actual_count FROM inventory";
		$send_info = $connection->prepare($query);
		$send_info->execute();
		$columnHeader = "Názov" . "\t" . "Počet" . "\t" . "Počet na sklade";
		$setData = '';

		while ($row = $send_info->fetch(PDO::FETCH_ASSOC)) {
			$rowData = '';
			foreach ($row as $value) {
				$value = '' . $value . '' . "\t";
				$rowData .= $value;
			}
			$setData .= trim($rowData) . "\n";
		}

		$filename = 'inventar-' . date('d-m-Y') . '.csv';
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
