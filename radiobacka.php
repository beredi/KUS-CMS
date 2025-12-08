<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="sk">
<!--HTML5 Document by Jaroslav Beredi-->
<head>
    <meta charset="UTF-8">
    <title>Rádio Bačka - KUS Jána Kollára Selenča</title>
    <meta name="description" content="Poslouchajte Rádio Bačka zo štúdia v Selenči. Archívne materiály a piesne z Radia Bača, prezentujúce kultúru dolnozemských Slovákov.">
    <meta name="author" content="Jaroslav Beredi">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='canonical' href="https://kusjanakollara.org/radiobacka" />

    <meta property="og:title" content="Rádio Bačka - KUS Jána Kollára Selenča">
    <meta property="og:description" content="Vypočujte si archívne nahrávky Rádia Bačka zo štúdia v Selenči — piesne, rozhovory a kultúrne relácie zdigitalizované a sprístupnené online">
    <meta property="og:image" content="https://kusjanakollara.org/images/kus-jana-kollara.jpg">
    <meta property="og:url" content="https://www.kusjanakollara.org/radiobacka">
    <meta property="og:type" content="website">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Rádio Bačka - KUS Jána Kollára Selenča">
    <meta name="twitter:description" content="Poslouchajte Rádio Bačka zo štúdia v Selenči. Archívne materiály a piesne z Radia Bača.">
    <meta name="twitter:image" content="https://kusjanakollara.org/images/kus-jana-kollara.jpg">
    <meta name="twitter:url" content="https://www.kusjanakollara.org/radiobacka">

    <?php include 'includes/headerInclude.php'; ?>
    <style>
        .radio-intro {
            text-align: center;
            margin-bottom: 40px;
            padding: 30px 20px;
            background: #f8f9fa;
            border-radius: 8px;
        }
        .radio-intro h2 {
            color: #2c327f;
            margin-bottom: 20px;
            font-size: 2em;
        }
        .logo-row {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 30px;
            margin-bottom: 30px;
            flex-wrap: wrap;
        }
        .logo-row img {
            height: 100px;
            max-width: 100%;
        }
        .youtube-section {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(44, 50, 127, 0.1);
            margin-bottom: 40px;
            padding: 30px;
            border-left: 4px solid #c4302b;
        }
        .youtube-section h3 {
            font-size: 1.6em;
            font-weight: 600;
            color: #2c327f;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid #f0f0f0;
        }
        .youtube-embed {
            position: relative;
            padding-bottom: 56.25%; /* 16:9 aspect ratio */
            height: 0;
            overflow: hidden;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        .youtube-embed iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: 0;
        }
        .youtube-btn {
            display: inline-block;
            background: #c4302b;
            color: #fff;
            padding: 12px 30px;
            border-radius: 5px;
            font-size: 1em;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 2px 6px rgba(196, 48, 43, 0.3);
        }
        .youtube-btn:hover {
            background: #a02823;
            color: #fff;
            box-shadow: 0 4px 12px rgba(196, 48, 43, 0.4);
            transform: translateY(-2px);
            text-decoration: none;
        }
        .youtube-btn:focus {
            color: #fff;
            text-decoration: none;
        }
        .youtube-btn i {
            margin-right: 8px;
        }
        @media (max-width: 768px) {
            .logo-row img {
                height: 70px;
            }
            .youtube-section {
                padding: 20px;
            }
            .youtube-section h3 {
                font-size: 1.3em;
            }
            .radio-intro h2 {
                font-size: 1.5em;
            }
        }
    </style>
</head>
<body>
<?php include 'includes/navbar.php'; ?>
<div class="container content">
    <div class="row">
        <div class="col-lg-12">
            <h1>Archívne materiály Rádia Bačka zo štúdia v Selenči</h1>
            <p class="text-muted">Vypočujte si archívne nahrávky Rádia Bačka zo štúdia v Selenči — piesne, rozhovory a kultúrne relácie zdigitalizované a sprístupnené online </p>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="radio-intro">
                <h2>Rádio Bačka - štúdio Selenča</h2>
                <img src="images/logos/radio-backa-selenca.png" alt="Radio Backa Logo" width="200px" height="auto" ">
                <p>Štúdio Rádia Báčka v Selenči začalo svoje vysielanie 1. mája 1967 ako dôležitý kultúrny a jazykový pilier miestnej slovenskej komunity. Jeho hlavnou úlohou bolo zachovávať slovenský jazyk, tradície a ľudové piesne Selenčanov, čím prispievalo k udržiavaniu identity Slovákov žijúcich vo Vojvodine. Po desaťročiach neúnavnej práce a vysielania sa poslednýkrát ozvalo zo štúdia v Selenči v roku 2021.</p>
                <p>Vďaka iniciatíve <strong>Združenia pre zachovanie kultúry, tradícií a umenia Selenča</strong> a finančnej podpore <strong>Úradu pre Slovákov žijúcich v zahraničí</strong> sa podarilo zachovať a zdigitalizovať bohatý archívny materiál z rádiového štúdia v Selenči — Rádio Bačka. Tieto záznamy teraz zachovávajú hudobné a kultúrne dedičstvo našej komunity pre budúce generácie.</p>
                <p>Materiály pochádzajú z pôvodných magnetických pások; záznamy boli starostlivo zdigitalizované, aby sa zachovala historická kvalita a sprístupnili pre verejnosť online.</p>
            </div>
            <div class="logo-row">
                <img src="images/logos/selenca.jpg" alt="Združenie pre zachovanie kultúry Selenča">
                <img src="images/logos/uszz.jpg" alt="Úrad pre Slovákov žijúcich v zahraničí">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 col-sm-12">
            <div class="youtube-section">
                <h3>Archívne materiály Rádia Bačka - štúdio Selenča</h3>
                <div class="youtube-embed">
                    <iframe src="https://www.youtube.com/embed/videoseries?list=PL5TOFzYQgXD9hiRZFVQSLAyfvyXllrzVY" allowfullscreen></iframe>
                </div>
                <a class="youtube-btn" href="https://www.youtube.com/watch?v=W6UIBE_1bis&list=PL5TOFzYQgXD9hiRZFVQSLAyfvyXllrzVY" target="_blank">
                    <i class="fab fa-youtube"></i> Pozrieť celý playlist na YouTube
                </a>
            </div>
        </div>
        <div class="col-lg-6 col-sm-12">
            <div class="youtube-section">
                <h3>Piesne z Rádia Bačka zo študia v Selenči</h3>
                <div class="youtube-embed">
                    <iframe src="https://www.youtube.com/embed/videoseries?list=PL5TOFzYQgXD803XLd-g8Pmsx1QXmPz6wN" allowfullscreen></iframe>
                </div>
                <a class="youtube-btn" href="https://youtube.com/playlist?list=PL5TOFzYQgXD803XLd-g8Pmsx1QXmPz6wN" target="_blank">
                    <i class="fab fa-youtube"></i> Pozrieť celý playlist na YouTube
                </a>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>

<?php
footer("other");
?>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/bootstrap.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="lightbox/js/lightbox.js"></script>
<script src="links/link.js"></script>
</body>
</html>
