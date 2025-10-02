<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="sk">
<!--HTML5 Document by Jaroslav Beredi-->

<head>
      <meta charset="UTF-8">
      <title>Kultúrno-umelecký spolok Jána Kollára zo Selenče</title>
      <meta name="description" content="Prezentujeme kultúru a umenie Slovákov z Vojvodiny zo Srbska. Zachovávame ľudovú tradíciu, folkór a ochotnícke divadlo našej osady Selenče.">
      <meta name="author" content="Jaroslav Beredi">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel='canonical' href="https://kusjanakollara.org/" />

      <meta property="og:title" content="Kultúrno-umelecký spolok Jána Kollára zo Selenče">
      <meta property="og:description" content="Prezentujeme kultúru a umenie Slovákov z Vojvodiny zo Srbska. Zachovávame ľudovú tradíciu, folkór a ochotnícke divadlo našej osady Selenče.">
      <meta property="og:image" content="https://kusjanakollara.org/images/kus-jana-kollara.jpg">
      <meta property="og:url" content="https://www.kusjanakollara.org/">
      <meta property="og:type" content="website">

      <meta name="twitter:card" content="summary_large_image">
      <meta name="twitter:title" content="Kultúrno-umelecký spolok Jána Kollára zo Selenče">
      <meta name="twitter:description" content="Prezentujeme kultúru a umenie Slovákov z Vojvodiny zo Srbska. Zachovávame ľudovú tradíciu, folkór a ochotnícke divadlo našej osady Selenče.">
      <meta name="twitter:image" content="https://kusjanakollara.org/images/kus-jana-kollara.jpg">
      <meta name="twitter:url" content="https://www.kusjanakollara.org/">

      <?php include 'includes/headerInclude.php'; ?>

</head>

<body>

      <!-- HEADER -->
      <?php include 'includes/pageHeader.php'; ?>

      <?php include 'includes/lastArticles.php'; ?>

      <!-- VIANOČNÉ TRHY CTA SECTION START -->
      <section class="vianocne-trhy-section">
        <div class="vianocne-trhy-overlay">
          <div class="vianocne-trhy-content">
            <h2>Vianočné trhy v Selenči</h2>
            <p>Zažite čaro Vianoc na našich tradičných vianočných trhoch! Príďte si vychutnať atmosféru, remeslá, dobroty a program pre celú rodinu.</p>
            <a href="https://vianocne-trhy.kusjanakollara.org/" class="vianocne-trhy-btn" target="_blank" rel="noopener">Navštíviť stránku trhov</a>
          </div>
        </div>
      </section>
      <!-- VIANOČNÉ TRHY CTA SECTION END -->

      <?php include 'includes/radio.php'; ?>

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