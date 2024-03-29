<?php

function articleHeader($title, $imagePath, $content, $keywords, $id)
{
      
    $temp_post_content = strip_tags($content);
    $final_post_content = (substr($temp_post_content, 0, 160) . "...");
	?>

    <!DOCTYPE html>
    <html lang="sk">
<!--HTML5 Document by Jaroslav Beredi-->
<head>
      <meta charset="UTF-8">
      <title><?= $title ?></title>
      <meta name="description" content="<?= $final_post_content ?>">
      <meta name="author" content="Jaroslav Beredi">
      <meta name="keywords" content="<?= $keywords ?>">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <meta property="og:image" content="images/articles/<?= $imagePath ?>"/>
      <meta property="og:title" content="<?= $title ?>">
      <meta property="og:description" content="<?= $final_post_content ?>">
      <meta property="og:url" content="https://www.kusjanakollara.org/clanok.php?p_id=<?= $id ?>">
      <meta property="og:type" content="article">


    <link rel="canonical" href="https://kusjanakollara.org/" />
    <link rel="image_src"
          type="image/jpeg"
          href="images/articles/<?= $imagePath ?>"/>


    <script src="https://kit.fontawesome.com/7782f26b25.js" crossorigin="anonymous"></script>

    <!--FONT ISTOK WEB-->
    <link href="https://fonts.googleapis.com/css?family=Istok+Web" rel="stylesheet">

    <!--FONT RALEWAY-->

    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">


    <!--BOOTSTRAP-->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- MY CSS STYLES -->
    <link rel="stylesheet" type="text/css" href="links/styles.css">

    <!---Lightbox-->
    <link rel="stylesheet" href="lightbox/css/lightbox.css">
    <!--FAVICON-->
    <link rel="apple-touch-icon" sizes="57x57" href="favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="faviconapple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

</head>
	<?php
}


?>
