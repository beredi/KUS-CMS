<?php
include 'includes/header.php';
?>


<?php
    function contact($name, $function, $mail, $photo_url){
      echo '<div class="contact">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <img src="'.$photo_url.'" class="img-responsive contactImg"  alt="'.$name.'">
                </div>

                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                   <h3><small>'.$function.':</small><br>'.$name.'</h3>
                    <p style="font-size: 12px;">'.$mail.'</p>';

      if ($mail=="malvina.zolnanova@kusjanakollara.org"){
          echo '<p><span class="glyphicon glyphicon glyphicon-earphone"></span> +381 63 136 16 02</p>';

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
            contact("Malvína Zolňanová","Predsedníčka", "malvina.zolnanova@kusjanakollara.org", "images/ludia/person.jpg");
            ?>
        </div>

        <!--Tereza-->
        <div class="col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-1 col-sm-12 col-xs-12 text-right">
            <?php
                contact("Tereza Žjaková","Zástupkyňa predsedníčky,
vedúca mladšej divadelnej skupiny", "tereza.zjakova@kusjanakollara.org", "images/ludia/person.jpg");
            ?>
        </div>

    </div>
    <div class="row">

        <!--Svetlana
        <div class="col-lg-4 col-lg-offset-2 col-md-4 col-md-offset-1 col-sm-12 col-xs-12 text-right">
            <?php
                contact("PaedDr. Svetlana Zolňanová", "Tajomníčka", "-", "images/ludia/person.jpg");
            ?>
        </div>-->
		
		<!--Jaro-->
		<div class="col-lg-4 col-lg-offset-2 col-md-4 col-md-offset-1 col-sm-12 col-xs-12 text-right">
			<?php
			contact("Jaroslav Beredi", "Vedúci tanečnej a speváckej skupiny", "jaroslav.beredi@kusjanakollara.org", "images/ludia/person.jpg");
			?>
		</div>

        <!--ANDREA-->
        <div class="col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-1 col-sm-12 col-xs-12 text-right">
            <?php
            contact("Andrea Šoškićová", "Pokladníčka, vedúca detskej skupiny", "andrea.soskicova@kusjanakollara.org", "images/ludia/person.jpg");
            ?>
        </div>

    </div>
	<div class="row">



		<!--Juraj-->
		<div class="col-lg-4 col-lg-offset-2 col-md-4 col-md-offset-1 col-sm-12 col-xs-12 text-right">
			<?php
			contact("Juraj Súdi ml.", "Vedúci orchestra a speváckej skupiny", "juraj.sudi@kusjanakollara.org", "images/ludia/person.jpg");
			?>
		</div>

		<!--Rasto
		<div class="col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-1 col-sm-12 col-xs-12 text-right">
			<?php
			contact("Rastislav Rybársky", "Vedúci staršej divadelnej skupiny", "rastislav.rybarsky@kusjanakollara.org", "images/ludia/person.jpg");
			?>
		</div>
		-->
	</div>
        <div class="row">


            <!--Anna
            <div class="col-lg-4 col-lg-offset-2 col-md-4 col-md-offset-1 col-sm-12 col-xs-12 text-right">
                <?php
                contact("Anna Berédiová", "Vedúca speváckej skupiny", "anna.berediova@kusjanakollara.org", "images/ludia/person.jpg");
                ?>
            </div>-->


        </div>

        <div class="row">

            <!--Bernard
            <div class="col-lg-4 col-lg-offset-2 col-md-4 col-md-offset-1 col-sm-12 col-xs-12 text-right">
                <?php
                contact("Bernard Govda", "Vedúci knižnice", "bernard.govda@kusjanakollara.org", "images/ludia/person.jpg");
                ?>
            </div>-->
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