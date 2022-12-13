<?php
include 'includes/header.php';
?>


<?php
// phoneNumbers must be an array
function contact($name, $function, $mail, $photo_url, $phoneNumbers = null)
{
	echo '<div class="contact">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <img src="' . $photo_url . '" class="img-responsive contactImg img-circle"  alt="' . $name . '">
                </div>

                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                   <h3><small>' . $function . ':</small><br>' . $name . '</h3>
                    <p style="font-size: 12px;">' . $mail . '</p>';

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

	echo '</div>
            </div>
            </div>';
}

?>


<body>
<div class="container">
	<?php
	include 'includes/navbar.php';
	?>
</div>
<!--CONTENT-->
<div class="container-fluid contactContainer">
    <div class="container">
        <div class="row top2">
            <!--Malvína-->
            <div class="col-lg-4 col-lg-offset-2 col-md-4 col-md-offset-1 col-sm-12 col-xs-12 text-right">
				<?php
				contact(
					"Malvína Zolňanová",
					"Predsedníčka",
					"malvina.zolnanova@kusjanakollara.org",
					"images/ludia/malvina.png",
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
            <div class="col-lg-4 col-lg-offset-2 col-md-4 col-md-offset-1 col-sm-12 col-xs-12 text-right">
				<?php
				contact(
					"Jaroslav Beredi",
					"Umelecký vedúci",
					"jaroslav.beredi@kusjanakollara.org",
					"images/ludia/jaro.png",
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
