<?php


//FOOTER

function footer($whatKindOfPage)
{
	echo '    <!--FOOTER-->
<div class="container-fluid footer top">
    <div class="container" id="contact">
        <div class="row footerMargin">
            <div class="col-lg-3 col-lg-offset0 col-md-3 col-md-offset-0 col-sm-12 col-xs-12">
                <p class="headerText">Predsedníčka spolku:</p>
                <p><span class="glyphicon glyphicon-user"></span> Malvína Zolňanová</p>
                <p style="font-size: 12px;"><span class="glyphicon glyphicon-envelope"></span> malvina.zolnanova@kusjanakollara.org</p>
                <p><span class="glyphicon glyphicon glyphicon-earphone"></span> +381 63 136 16 02</p>
                <hr style="opacity: 0.5; margin: 5px 0">
                <p class="headerText">Umelecký vedúci:</p>
                <p><span class="glyphicon glyphicon-user"></span> Jaroslav Berédi</p>
                <p style="font-size: 12px;"><span class="glyphicon glyphicon-envelope"></span> jaroslav.beredi@kusjanakollara.org</p>
            </div>
            <div class="col-lg-3 col-lg-offset2 col-md-3 col-md-offset-2 col-sm-12 col-xs-12 padding-footer-text">
                <p class="headerText">KUS Jána Kollára</p>
                <div>
                    <p>M. Tita 124</p>
                    <p>21425 Selenča, Srbsko</p>
                </div>
                <div>
                    <p class="text-left">PIB: 101450672</p>
                    <p>Matični broj: 08055769</p>
                </div>
                <p><span class="glyphicon glyphicon-envelope"></span> info@kusjanakollara.org</p>
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
                        <a href="https://www.facebook.com/kusjanakollara/" target="_blank"><img class="img-responsive linkO" width="100%" height="100%" alt="fb link" src="images/facebook.png" title="Facebook Link"></a>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
                        <a href="https://www.instagram.com/kus_jana_kollara/" target="_blank"><img class="img-responsive linkO" width="100%" height="100%" alt="instagram link" src="images/instagram.png" title="Instagram Link"></a>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-4">
                        <a href="https://www.youtube.com/@kusjanakollaraselenca1752" target="_blank"><img class="img-responsive linkO" width="100%" height="100%" alt="youtube link" src="images/youtube.png" title="YouTube link"></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-lg-offset1 col-md-3 col-md-offset-1 col-sm-12 col-xs-12">
                <ul class="footer-menu">
                    <li><a href="index" class="footer-anchor-tag">Úvod</a></li>
                    <li><a href="about?pagepseu=about" class="footer-anchor-tag">O nás</a></li>
                    <li><a href="videogallery" class="footer-anchor-tag">Videogaléria</a></li>
                    <li><a href="download" class="footer-anchor-tag">Na stiahnutie</a></li>
                    <li><a href="nadchadzajuce-podujatia" class="footer-anchor-tag">Nadchádzajúce podujatia</a></li>
                    <li><a href="predchadzajuce-podujatia" class="footer-anchor-tag">Predchádzajúce podujatia</a></li>
                    <li><a href="contact" class="footer-anchor-tag">Kontakt</a></li>
                    <li><a href="login" class="footer-anchor-tag">Prihlásiť sa</a></li>
                </ul>
                
            </div>

        </div>
    </div>
</div>

<div class="container-fluid footerBott">
    <div class="row">
        <div class="col-lg-12 col-md-12 hidden-sm hidden-xs">
            <p class="text-center top">&copy;KUS JÁNA KOLLÁRA SELENČA 2017 - ' . date('Y') . ' | DESIGN BY <a class="footer-anchor-tag" href="http://beredi.dev/" target="_blank">Jaroslav Beredi</a></p>
        </div>
        <div class="hidden-lg hidden-md col-sm-12 col-xs-12">
            <p class="text-center top smallText">&copy;KUS JÁNA KOLLÁRA SELENČA 2017 - ' . date('Y') . ' | DESIGN BY <a class="footer-anchor-tag" href="http://beredi.dev/" target="_blank">Jaroslav Beredi</a></p>
        </div>
        <div class="hidden-lg hidden-md col-sm-12 col-xs-12" id="fixed">
            <p class="text-center top smallText">&copy;KUS JÁNA KOLLÁRA SELENČA 2017 - ' . date('Y') . ' | DESIGN BY <a class="footer-anchor-tag" href="http://beredi.dev/" target="_blank">Jaroslav Beredi</a></p>
        </div>
    </div>
</div>';

}


?>
