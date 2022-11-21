<?php
include("lang.php");

 ?>

 <!DOCTYPE html>
 <html lang="<?php echo $lang;?>">

  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta name="author" content="Etudiants" />
    <meta name="description" content="Page concernant le programme et les différentes activités sur le thème du Japon" />
    <meta name="keywords" content="Japon, Cuisine, Tenues traditionnelles, Bar, Exposants, Activités" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/site.webmanifest">
    <link rel="mask-icon" href="favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <title>Japon</title>
    <link rel = "stylesheet" type = "text/css" href = "css/japon.css"> 
  </head>
  <body>
    <nav class="navbar">
      <!-- LOGO -->
      <div class="logo" ><a href="index.php"><img src="images/logo2.png" alt="logo"></a></div>
      <!-- NAVIGATION MENUS -->
      <div class="navMenu">
        <a href="japon.php"class="jap"><?php echo footerj; ?></a>
          <a href="mexique.php"><?php echo footerm; ?></a>
          <a href="inde.php"><?php echo footeri; ?></a>
          <a href="egypte.php"><?php echo footere; ?></a>
          <a href="acces.php"><?php echo acces; ?></a>
          <a href="reserver.php"><?php echo reserver; ?></a>
          <a href="connexion_admin.php"><?php echo admin; ?></a>
          <a href="?lang=en">EN</a> | <a href="?lang=fr">FR</a>
          <div class="dot"></div>
      </div>
    </nav>
    <!--image + info japon-->
    <div class="container">
      <div class="item1"><img src="<?php echo imagejen; ?>"></div>
      <div class="item2"><?php echo pagejapon; ?></div>
    </div>
    <!--activités et animations japon-->
    <div class="container container2">
      <div class="item3"><img src="images/CuisineJapon.png" alt="Cuisine Japon"></div>
      <div class="item4"><h1><?php echo cuisinejapon2; ?></h1> <br><?php echo cuisinejapon; ?>  </div>
    </div>
    <div class="container container3">
      <div class="item5"><img src="images/CostumeJapon.png" alt="Costume Japon"></div>
      <div class="item6"><h1><?php echo tenuejapon; ?></h1> <br> <?php echo tenuejapon2; ?></div>
    </div>
    <div class="container container2">
      <div class="item3"><img src="images/BarJapon.png" alt="Bar Japon"></div>
      <div class="item4"><h1><?php echo barjapon; ?></h1> <br><?php echo barjapon2; ?> </div>
    </div>
    <div class="container container3">
      <div class="item5"><img src="images/ShopJapon.png" alt="Shop Japon"></div>
      <div class="item6"><h1><?php echo expojapon; ?></h1> <br><?php echo expojapon2; ?> </div>
    </div>
    <div class="container container2">
      <div class="item3"><img src="images/ActivitéJapon.png" alt="Activité Japon"></div>
      <div class="item4"><h1><?php echo actjapon; ?></h1> <br><?php echo actjapon2; ?> </div>
    </div>
    <!--lieu + carte-->
    <div class="container container4">
      <h1><?php echo oujapon; ?></h1>
        <div class="carte">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8326.774573691866!2d3.8779980610108185!3d45.04227601215912!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47f5fa53b6a01f5f%3A0xb600ad79cfe8a40e!2sJardin%20Henri%20Vinay!5e0!3m2!1sfr!2sfr!4v1666613163300!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
    <!--partenaires-->
    <div class="container container5">
      <h1><?php echo partenaires; ?></h1>
        <div class="part">
          <img src="images/agglo.jpg" alt="partenaires">
          <img src="images/AURA.png" alt="partenaires">
          <img src="images/bp.png" alt="partenaires">
          <img src="images/oep.png" alt="partenaires">
          <img src="images/assojap.png" alt="partenaires">
        </div>
    </div>
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