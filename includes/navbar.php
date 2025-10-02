<nav class="navbar navbar-background">
    <div class="container">
        <div class="navbar-header">
            <a href="/"><img width="65px" height="65px" src="images/kus-jana-kollara-selenca.png" alt="Kultúrno-umelecký spolok Jána Kollára zo Selenče"></a>
            <button type="button" class="navbar-toggle collapsed btn btn-lg " data-toggle="collapse" data-target="#navbar-collapse">
                <img src="images/bars-solid.svg" alt="Menu" width="24" height="24">
            </button>
        </div>
        <div class="collapse navbar-collapse navbar-right" id="navbar-collapse">
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
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"> PROMO <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="videogallery"> Videogaléria</a></li>
                        <li><a href="download"> Na stiahnutie</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"> PODUJATIA <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="nadchadzajuce-podujatia"> Nadchádzajúce podujatia </a></li>
                        <li><a href="predchadzajuce-podujatia"> Predchádzajúce podujatia </a></li>
                    </ul>
                </li>
                <li><a href="contact">KONTAKT</a></li>
                <li><a href="https://youtube.com/playlist?list=PL5TOFzYQgXD803XLd-g8Pmsx1QXmPz6wN&si=vH6o6DeTUlBlDhUW" target="_blank"><i class="fab fa-youtube"></i> RÁDIO BAČKA</a></li>
                <li><a href="https://vianocne-trhy.kusjanakollara.org/" target="_blank"><i class="fa fa-tree"></i> VIANOČNÉ TRHY</a></li>
            </ul>
        </div>
    </div>
</nav>