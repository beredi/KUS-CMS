
<?php
include 'includes/header.php';
?>
<body>
<div class="container">
    <?php
    include 'includes/navbar.php';
    ?>
    <div class="row">
        <div class="col-lg-12">
            <h1>Nadchádzajúce podujatia<br>
                <small>Pozrite si, čo všetko plánujeme v blízkej budúcnosti.</small></h1>
        </div>
    </div>
    <?php
    try{
        include 'dashboard/includes/db.php';

        $query = "SELECT * FROM events ORDER BY event_date ASC";

        $send_info = $connection->prepare($query);
        $send_info->execute();

        $count = $send_info->rowCount();
        if($count==0){
            echo "<h3>Žiadne informácie o nadchádzajúcich podujatiach.</h3>";
        }
        while($row = $send_info->fetch(PDO::FETCH_ASSOC)){
            $event_name = $row['event_name'];

            $event_date1 = strtotime($row['event_date']);
            $event_date = date( 'd. M. Y', $event_date1 );
            $event_time = $row['event_time'];
            $event_place = $row['event_place'];
            $event_photo = $row['event_photo'];
            $event_content = $row['event_content'];

            echo "
      
        <div class=\"col-lg-4 col-md-4 col-sm-12 col-xs-12 nextEvent\">
            <div class=\"media\">
                <div class=\"media-left media-top\">
                    <img src=\"images/events/$event_photo\" style=\"width: 150px;\" alt=\"$event_name\">
                </div>
                <div class=\"media-body\">
                    <h3 class=\"media-heading\">$event_name</h3>
                    <p><span class=\"glyphicon glyphicon glyphicon-calendar\"></span> $event_date<br>
                        <span class=\"glyphicon glyphicon glyphicon-time\"></span> $event_time<br>
                        <span class=\"glyphicon glyphicon glyphicon-map-marker\"></span> $event_place</p>
                    <p class=\"text-primary\"><span class=\"glyphicon glyphicon glyphicon-comment\"></span> $event_content</p>
                </div>
            </div>
        </div>
              
            ";


        }

    }catch (Exception $e){
        echo $e;
    }
    ?>
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
