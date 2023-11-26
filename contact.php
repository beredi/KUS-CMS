<?php
include 'includes/header.php';
?>


<?php
// phoneNumbers must be an array
function contact($name, $function, $mail, $photo_url, $phoneNumbers = null)
{
	echo '<div class="contact">
				<img src="' . $photo_url . '" class="contactImg img-circle" width="50%" height="auto"  alt="' . $name . '">
				<div class="contact-info">
					<p>' . $function . ':</p>
					<p><strong>' . $name . '</strong></p>
					<p>' . $mail . '</p>';

	if ($phoneNumbers != null) {
		$echo = '';
		foreach ($phoneNumbers as $phoneNumber) {
			$echo .= '<p><span class="glyphicon glyphicon glyphicon-earphone"></span> ';
			$echo .= $phoneNumber['number'];
			if ($phoneNumber['viber']) $echo .= ' <i class="fab fa-viber" style="color: #794F99; font-weight: bold;" title="Viber"></i> ';
			if ($phoneNumber['whatsapp']) $echo .= ' <i class="fab fa-whatsapp" style="color: #25CA45; font-weight: bold;" title="Whatsapp"></i> ';
			$echo .= '</p>';
		}

		echo $echo;

	}

	echo '
            </div>
            </div>';
}

?>


<body>
<?php include 'includes/navbar.php'; ?>
<!--CONTENT-->
<div class="container-fluid content">
    <div class="container">
		<h1>Kontaktné informácie vedúcich</h1>
        <div class="row">
            <!--Malvína-->
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<?php
				contact(
					"Malvína Zolňanová",
					"Predsedníčka spolku",
					"malvina.zolnanova@kusjanakollara.org",
					"images/ludia/malvina.jpg",
					array(
						array(
							'number' => '+381 63 136 16 02',
							'viber' => true,
							'whatsapp' => true
						)
					)
				);
				?>
            </div>

            <!--Jaro-->
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<?php
				contact(
					"Jaroslav Beredi",
					"Umelecký vedúci",
					"jaroslav.beredi@kusjanakollara.org",
					"images/ludia/jaro.jpg",
					array(
						array(
							'number' => '(SRB) +381 62 967 84 69',
							'viber' => false,
							'whatsapp' => false
						),
						array(
							'number' => '(SK) +421 949 632 867',
							'viber' => true,
							'whatsapp' => true
						)
					)
				)
				?>
            </div>

        </div>
    </div>
</div>
<!--FOOTER-->

<?php include 'includes/footer.php'; ?>

<?php
footer("contact");
?>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/bootstrap.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script src="links/link.js"></script>
</body>
<!--   font-family: 'Istok Web', sans-serif;   -->
</html>
