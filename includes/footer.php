<?php


//FOOTER

function footer($whatKindOfPage)
{
	echo '    <!--FOOTER-->
<div class="container-fluid footer top">
    <div class="container" id="contact">
        <div class="row footerMargin">
            <div class="col-lg-3 col-lg-offset0 col-md-3 col-md-offset-0 col-sm-12 col-xs-12">
                <h3>Predsedníčka spolku:</h3>
                <p><span class="glyphicon glyphicon-user"></span> Malvína Zolňanová</p>
                <p style="font-size: 12px;"><span class="glyphicon glyphicon-envelope"></span> malvina.zolnanova@kusjanakollara.org</p>
                <p><span class="glyphicon glyphicon glyphicon-earphone"></span> +381 63 136 16 02</p>
            </div>
            <div class="col-lg-3 col-lg-offset2 col-md-3 col-md-offset-2 col-sm-12 col-xs-12 ">
                <h3>Umelecký vedúci:</h3>
                <p><span class="glyphicon glyphicon-user"></span> Jaroslav Berédi</p>
                <p style="font-size: 12px;"><span class="glyphicon glyphicon-envelope"></span> jaroslav.beredi@kusjanakollara.org</p>
            </div>
            <div class="col-lg-3 col-lg-offset1 col-md-3 col-md-offset-1 col-sm-12 col-xs-12 topFooter">
                <p class="text-left">KUS Jána Kollára<br>M. Tita 124<br>21425 Selenča, Srbsko</p>
                <p class="text-left">PIB: 101450672<br>Matični broj: 08055769</p>

                <p><span class="glyphicon glyphicon-envelope"></span> info@kusjanakollara.org</p>

                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                        <a href="https://www.facebook.com/kusjanakollara/" target="_blank"><img class="img-responsive linkO" alt="fb link" src="images/facebook.png" title="Facebook Link"></a>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                        <a href="https://www.instagram.com/kus_jana_kollara/" target="_blank"><img class="img-responsive linkO" alt="instagram link" src="images/instagram.png" title="Instagram Link"></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="container-fluid footerBott">
    <div class="row">
        <div class="col-lg-12 col-md-12 hidden-sm hidden-xs">
            <p class="text-center top">&copy;KUS JÁNA KOLLÁRA SELENČA 2017 - ' . date('Y') . ' | DESIGN BY Jaroslav Beredi</p>
        </div>
        <div class="hidden-lg hidden-md col-sm-12 col-xs-12">
            <p class="text-center top smallText">&copy;KUS JÁNA KOLLÁRA SELENČA 2017 - ' . date('Y') . ' | DESIGN BY Jaroslav Beredi</p>
        </div>
        <div class="hidden-lg hidden-md col-sm-12 col-xs-12" id="fixed">
            <p class="text-center top smallText">&copy;KUS JÁNA KOLLÁRA SELENČA 2017 - ' . date('Y') . ' | DESIGN BY Jaroslav Beredi</p>
        </div>
    </div>
</div>';

}


?>
