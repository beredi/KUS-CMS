<div class="container-fluid navbar-background">
    <div class="container">
        <div class="row top navbar">
            <div class="col-lg-1 col-lg-offset-0 col-md-1 col-md-offset-0 col-sm-6 col-sm-offset-3 col-xs-6 col-xs-offset-3">
                <a href="index"><img width="65px" height="65px" src="images/kus-jana-kollara-selenca.png" alt="Kultúrno-umelecký spolok Jána Kollára zo Selenče"></a>
            </div>

            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed btn btn-lg " data-toggle="collapse" data-target="#navbar-collapse">
                    <i class="fas fa-bars"></i>        
                </button>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <div class="col-lg-10 col-lg-offset-1 col-md-11 col-sm-12 col-xs-12 navbar-center">
                    <ul class="nav navbar-nav">
                        <li><a href="index"><span class="glyphicon glyphicon glyphicon-home"></span> ÚVOD</a></li>
                        <li><a href="about?pagepseu=about"> O NÁS </a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown" data-toggle="dropdown"> SEKCIE <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <?php
                                include 'dashboard/includes/db.php';

                                $query = "SELECT * from pages";

                                $send_info = $connection->prepare($query);

                                $send_info->execute();
                                while ($row = $send_info->fetch(PDO::FETCH_ASSOC)) {
                                    if ($row['page_pseu'] == 'about') {
                                        continue;
                                    }
                                    ?>
                                    <li><a href="about?pagepseu=<?= $row['page_pseu'] ?>"> <?= $row['page_title'] ?></a></li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </li>
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"> PROMO <span
                                        class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="videogallery"> Videogaléria</a></li>
                                <li><a href="download"> Na stiahnutie</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"> PODUJATIA <span
                                        class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="nadchadzajuce-podujatia"> Nadchádzajúce podujatia </a></li>
                                <li><a href="predchadzajuce-podujatia"> Predchádzajúce podujatia </a></li>
                            </ul>
                        </li>
                        <li><a href="contact">KONTAKT</a></li>
                        <li><a href="https://youtube.com/playlist?list=PL5TOFzYQgXD803XLd-g8Pmsx1QXmPz6wN&si=vH6o6DeTUlBlDhUW" target="_blank"><i class="fab fa-youtube"></i> RÁDIO BAČKA</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>