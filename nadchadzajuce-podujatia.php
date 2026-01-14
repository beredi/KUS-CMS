<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="sk">
<!--HTML5 Document by Jaroslav Beredi-->
<head>
      <meta charset="UTF-8">
      <title>Nadchádzajúce podujatia - KUS Jána Kollára Selenča</title>
      <meta name="description"
            content="Pozrite si naše nachádzajúce podujatia, či ide o naše programy, akcie, podujatia, alebo vystúpenia na nejakom festivale alebo programe iného spolku.">
      <meta name="author" content="Jaroslav Beredi">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel='canonical' href="https://kusjanakollara.org/nadchadzajuce-podujatia" />

      <meta property="og:title" content="Nadchádzajúce podujatia - KUS Jána Kollára Selenča">
      <meta property="og:description" content="Pozrite si naše nachádzajúce podujatia, či ide o naše programy, akcie, podujatia, alebo vystúpenia na nejakom festivale alebo programe iného spolku.">
      <meta property="og:image" content="https://kusjanakollara.org/images/kus-jana-kollara.jpg">
      <meta property="og:url" content="https://www.kusjanakollara.org/nadchadzajuce-podujatia">
      <meta property="og:type" content="website">

      <meta name="twitter:card" content="summary_large_image">
      <meta name="twitter:title" content="Nadchádzajúce podujatia - KUS Jána Kollára Selenča">
      <meta name="twitter:description" content="Pozrite si naše nachádzajúce podujatia, či ide o naše programy, akcie, podujatia, alebo vystúpenia na nejakom festivale alebo programe iného spolku.">
      <meta name="twitter:image" content="https://kusjanakollara.org/images/kus-jana-kollara.jpg">
      <meta name="twitter:url" content="https://www.kusjanakollara.org/nadchadzajuce-podujatia">

      <?php include 'includes/headerInclude.php'; ?>
    
</head>
<body>
	
<?php include 'includes/navbar.php'; ?>

<style>
.event-card {
    background: #fff;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    margin-bottom: 30px;
    height: 100%;
    display: flex;
    flex-direction: column;
}
.event-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 15px rgba(0,0,0,0.15);
}
.event-image {
    width: 100%;
    height: 220px;
    object-fit: cover;
    border-bottom: 3px solid #007bff;
}
.event-body {
    padding: 25px;
    flex: 1;
    display: flex;
    flex-direction: column;
}
.event-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: #1a1a1a;
    margin-bottom: 15px;
    line-height: 1.3;
}
.event-info {
    display: flex;
    flex-direction: column;
    gap: 10px;
    margin-bottom: 15px;
}
.event-info-item {
    display: flex;
    align-items: center;
    gap: 10px;
    color: #555;
    font-size: 1rem;
}
.event-info-item i {
    color: #007bff;
    font-size: 1.1rem;
    width: 20px;
    text-align: center;
}
.event-description {
    color: #666;
    font-size: 1.05rem;
    line-height: 1.6;
    margin-top: auto;
    padding-top: 15px;
    border-top: 1px solid #e0e0e0;
}
.no-events {
    text-align: center;
    padding: 60px 20px;
    background: #f8f9fa;
    border-radius: 12px;
    margin: 30px 0;
}
.no-events h3 {
    color: #6c757d;
    font-size: 1.5rem;
}
</style>

<div class="container content">
    <div class="row">
        <div class="col-lg-12">
            <h1>Nadchádzajúce podujatia</h1>
			<p class="text-muted">Pozrite si, čo všetko plánujeme v blízkej budúcnosti.</p>
        </div>
    </div>
    <div class="row">
	<?php
	try {
		include 'dashboard/includes/db.php';

		$query = "SELECT * FROM events WHERE DATE(event_date) >= curdate() ORDER BY event_date ASC";

		$send_info = $connection->prepare($query);
		$send_info->execute();

		$count = $send_info->rowCount();
		if ($count == 0) {
			echo '<div class="col-lg-12"><div class="no-events"><h3>Žiadne informácie o nadchádzajúcich podujatiach.</h3></div></div>';
		}
		while ($row = $send_info->fetch(PDO::FETCH_ASSOC)) {
			$event_name = $row['event_name'];

			$event_date1 = strtotime($row['event_date']);
			$event_date = date('d. M. Y', $event_date1);
			$event_time = $row['event_time'];
			$event_place = $row['event_place'];
			$event_photo = $row['event_photo'];
			$event_content = $row['event_content'];

			echo '
        <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="event-card">
                <img src="images/events/'.$event_photo.'" alt="'.htmlspecialchars($event_name).'" class="event-image">
                <div class="event-body">
                    <h3 class="event-title">'.$event_name.'</h3>
                    <div class="event-info">
                        <div class="event-info-item">
                            <i class="far fa-calendar-alt"></i>
                            <span>'.$event_date.'</span>
                        </div>
                        <div class="event-info-item">
                            <i class="far fa-clock"></i>
                            <span>'.$event_time.'</span>
                        </div>
                        <div class="event-info-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>'.$event_place.'</span>
                        </div>
                    </div>
                    <div class="event-description">
                        '.$event_content.'
                    </div>
                </div>
            </div>
        </div>';
		}

	} catch (Exception $e) {
		echo $e;
	}
	?>
    </div>
</div>

<!--FOOTER-->
<?php include 'includes/footer.php'; ?>
<?php
footer("other");
?>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/bootstrap.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script src="links/link.js"></script>
</body>
<!--   font-family: 'Istok Web', sans-serif;   -->
</html>
