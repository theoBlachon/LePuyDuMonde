<?php
include("lang.php");

 ?>

 <!DOCTYPE html>
 <html lang="<?php echo $lang;?>">

  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta name="author" content="Etudiants" />
    <meta name="description" content="Page pour savoir comment accéder au festival Le Puy du Monde avec divers informations comme l'itinéraire, le temps de trajet ou encore les parkings." />
    <meta name="keywords" content="accès, parking, train, trajet, temps, itinéraire, carte, Le Puy du Monde, plan" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/site.webmanifest">
    <link rel="mask-icon" href="favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <title>Accès</title>
    <link rel = "stylesheet" type = "text/css" href = "css/acces.css"> 
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.2/dist/leaflet.css"integrity="sha256-sA+zWATbFveLLNqWO2gtiw3HL/lh1giY/Inf1BJ0z14="crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.2/dist/leaflet.js"integrity="sha256-o9N1jGDZrf5tS+Ft4gbIK7mYMipq9lqpVJ91xHSyKhg="crossorigin=""></script>
  </head>
  <body>
    <nav class="navbar">
      <!-- LOGO -->
      <div class="logo" ><a href="index.php"><img src="images/logo2.png" alt="logo"></a></div>
      <!-- NAVIGATION MENUS -->
      <div class="navMenu">
        <a href="japon.php"><?php echo footerj; ?></a>
        <a href="mexique.php"><?php echo footerm; ?></a>
        <a href="inde.php"><?php echo footeri; ?></a>
        <a href="egypte.php"><?php echo footere; ?></a>
        <a href="acces.php" class="acc"><?php echo acces; ?></a>
        <a href="reserver.php"><?php echo reserver; ?></a>
        <a href="connexion_admin.php"><?php echo admin; ?></a>
        <a href="?lang=en">EN</a> | <a href="?lang=fr">FR</a>
        <div class="dot"></div>
      </div>
    </nav>
    <!--titre + différents temps-->
    <div class="container">
        <h1><?php echo comment; ?></h1>
    </div>
        <div class="temps">
          <div>70min <br> <div class="btm"><?php echo ST; ?></div></div>
          <div>110min <br> <div class="btm"><?php echo CF; ?></div></div>
          <div>120min <br> <div class="btm"><?php echo L; ?></div></div>
        </div>
        <a href="https://www.google.com/maps/dir//43000+Le+Puy-en-Velay/@45.0427466,3.8128961,12z/data=!4m8!4m7!1m0!1m5!1m1!1s0x47f5fa4041a0c829:0x4093cafcbe7fa70!2m2!1d3.882936!2d45.042768" class="bouton" target="_blank">
          <button class="btn btn-01"><?php echo itinéraire; ?></button>
        </a>  
    <!--carte-->
    <div class="map">
      <div class="titre">
        <h1><?php echo carteeven; ?></h1>
      </div>
      <div id="map"></div>
    </div>
    <script src="js/carte.js" type="text/javascript"></script>
  </body>
    <!--footer-->
  <footer class="footer">
    <div class="containerf">
      <div class="row">
        <div class="footer-col">
          <h4><?php echo pays; ?></h4>
          <ul>
            <li><a href="japon.php"><?php echo footerj; ?></a></li>
            <li><a href="mexique.php"><?php echo footerm; ?></a></li>
            <li><a href="inde.php"><?php echo footeri; ?></a></li>
            <li><a href="egypte.php"><?php echo footere; ?></a></li>
          </ul>
        </div>
        <div class="footer-col">
          <h4><?php echo plan; ?></h4>
          <ul>
            <li><a href="acces.php"><?php echo carte; ?></a></li>
        </ul>
        </div>
        <div class="footer-col">
          <h4><?php echo contact; ?></h4>
            <ul class="caramail">
              <li>lepuydumonde@caramail.fr</li>
              <li>04.71.45.73.95</li>
            </ul>
        </div>
        <div class="footer-col">
          <a href="index.php"><img class="logofooter" src="images/logo2.png" alt="logo f"></a>
        </div>
      </div>
    </div>
  </footer>
</html>