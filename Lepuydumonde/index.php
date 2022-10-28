<?php
include("lang.php");

 ?>

 <!DOCTYPE html>
 <html lang="<?php echo $lang;?>">

<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<meta name="author" content="Etudiants" />
<meta name="description" content="Site web de l'évenement Le puy du monde au Puy en velay" />
<meta name="keywords" content="festival, le puy en velay, culture, monde, pays" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
<link rel="manifest" href="favicon/site.webmanifest">
<link rel="mask-icon" href="favicon/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">
<title>Le Puy Du Monde</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
<div class="test5">
  <nav class="navbar">
    <!-- LOGO -->
    <div class="logo" ><a href="index.html"><img src="images/logo2.png" alt=""></a></div>
    <!-- NAVIGATION MENUS -->
    <div class="navMenu">
      <a href="japon.html"><?php echo footerj; ?></a>
            <a href="mexique.html"><?php echo footerm; ?></a>
            <a href="inde.html"><?php echo footeri; ?></a>
            <a href="egypte.html"><?php echo footerm; ?></a>
            <a href="acces.html"><?php echo acces; ?></a>
            <a href="reserver.php"><?php echo reserver; ?></a>
            <a href="connexion_admin.php"><?php echo admin; ?></a>
            <a href="?lang=en">EN</a> | <a href="?lang=fr">FR</a>
      <div class="dot"></div>
    </div>
  </nav>
  <!--caroussel-->
  <div class="conteneur">
<div class="caroussel">
     <div class="wrapper">
        <img src="<?php echo imagej; ?>">
        <img src="<?php echo imagem; ?>">
        <img src="<?php echo imagei; ?>">
        <img src="<?php echo imagee; ?>">
     </div>
  
  </div>
  </div>
  <div class="container">
    <div class="item1"><img src="images/logo3.png" alt=""></div>
    <div class="item2"> <?php echo info_1; ?>
    </div>
  </div>
  <div class="programme2">
    <h1><?php echo programme; ?></h1>
  </div>
  <div class="flex-programme">
    <div class="programme1">
      <h1><?php echo vendredi; ?> </h1> <br>
      <?php echo vendredi2; ?>
    </div>
    <div class="programme3">
      <h1><?php echo samedi; ?> </h1><br>
      <?php echo samedi2; ?>
    </div>
    <div class="programme4">
      <h1><?php echo dimanche; ?> </h1> <br>
      <?php echo dimanche2; ?><br>
      
    </div>
  </div>

  <div class="concert2">
    <h1><?php echo concert; ?></h1>
  </div>
  <div class="concert">
  <?php echo concert2; ?>
  </div>

  <div class="flex-reserver">
    <a href="reservation.php"><input class="reserver" type="button" value="<?php echo reserver; ?>"></a>
  </div>


  <div class="container container2">
    <div class="item3"><img src="images/CostumeJapon.png" alt=""></div>
    <div class="item4">
      <h1><?php echo japon; ?></h1> <br>
      <?php echo japon2; ?> 
      <a href="japon.html"><input class="more" type="button" value="<?php echo more; ?>"></a>
    </div>
  </div>
  <div class="container container3">
    <div class="item5"><img src="images/CostumeMexique.png" alt=""></div>
    <div class="item6">
      <h1><?php echo mexique; ?></h1> <br> 
      <?php echo mexique2; ?>
      <a href="mexique.html"><input class="more" type="button" value="<?php echo more; ?>"></a>
    </div>

  </div>
  <div class="container container2">
    <div class="item3"><img src="images/CostumeInde.png" alt=""></div>
    <div class="item4">
      <h1> <?php echo inde; ?></h1> <br> <?php echo inde2; ?>
      <a href="inde.html"><input class="more" type="button" value="<?php echo more; ?>"></a>
    </div>

  </div>
  <div class="container container3">
    <div class="item5"><img src="images/CostumeEgypte.png" alt=""></div>
    <div class="item6">
      <h1><?php echo egypte; ?></h1> <br> <?php echo egypte2; ?>
      <a href="egypte.html"><input class="more" type="button" value="<?php echo more; ?>"></a>
    </div>

  </div>
  <div class="testlieu">
  <div class="lieu2">
    <h1><?php echo lieu; ?></h1>
  </div>
  <div class="container container4">
  <?php echo lieu2; ?>
    <div class="carte">
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d45117.32252898949!2d3.86229824806055!3d45.02832241122113!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47f5fa4041a0c829%3A0x4093cafcbe7fa70!2s43000%20Le%20Puy-en-Velay!5e0!3m2!1sfr!2sfr!4v1666793109543!5m2!1sfr!2sfr" 
        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"> </iframe>
    </div>
  </div>
  <div class="button">
  <a href="acces.html"><input class="more" type="button" value="<?php echo venir; ?> "></a>
</div>
</div>
<div class="container container5">
  <h1><?php echo partenaires; ?></h1>
  <div class="part">
  <img src="images/agglo.jpg" alt="">
  <img src="images/AURA.png" alt="">
  <img src="images/bp.png" alt="">
  <img src="images/oep.png" alt="">
  <img src="images/assojap.png" alt="">
</div>
</div>


</body>
<footer class="footer">
  <div class="containerf">
    <div class="row">
      <div class="footer-col">
        <h4><?php echo pays; ?></h4>
        <ul>
          <li><a href="japon.html"><?php echo footerj; ?></a></li>
         <li><a href="mexique.html"><?php echo footerm; ?></a></li>
         <li><a href="inde.html"><?php echo footeri; ?></a></li>
         <li><a href="egypte.html"><?php echo footere; ?></a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4><?php echo plan; ?></h4>
        <ul>
          <li><a href="acces.html"><?php echo carte; ?></a></li>
      </ul>
    </div>
    <div class="footer-col">
        <h4><?php echo association; ?></h4>
        <ul>
          <li><a href="connexion_admin.php"><?php echo admin; ?></a></li>
        </ul>
      </div>
      <div class="footer-col">
        <img class="logofooter" src="images/logo2.png" alt="">
      </div>
    </div>
  </div>
</div>
</footer>

</html>