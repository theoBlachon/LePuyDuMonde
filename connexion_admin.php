<?php
$bdd = new 
PDO('mysql:host=localhost;port=3306;dbname=ki_monde','ki_monde', 'LePuyMonde');
$requete='SELECT * FROM admin';
$resultats = $bdd->query($requete) ;
$t=$resultats->fetch() ;
$resultats->closeCursor() ;
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<meta name="author" content="Etudiants" />
<meta name="description" content="Page d'administration pour la base de données" />
<meta name="keywords" content="Adminitration, base de données, modification, ajout" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
<link rel="manifest" href="favicon/site.webmanifest">
<link rel="mask-icon" href="favicon/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">
<Title>Connexion</Title>
<link rel="stylesheet" href="css/connexion.css" type="text/css" media="screen" title="" />
<script src="js/Affichecachertxt.js" type="text/javascript"></script>
</head>

<body>
<nav class="navbar">
        <!-- LOGO -->
        <div class="logo" ><a href="index.php"><img src="images/logo2.png" alt="logo du menu"></a></div>
          <!-- NAVIGATION MENUS -->
          <div class="navMenu">
          <a href="japon.php">Japon</a>
            <a href="mexique.php">Mexique</a>
            <a href="inde.php">Inde</a>
            <a href="egypte.php">Egypte</a>
            <a href="acces.php">accès</a>
            <a href="reserver.php" >réserver</a>
            <a href="connexion_admin.php" class="acc">administrateur</a>
            <div class="dot"></div>
        </div>
    </nav>
	<div class="conteneur">
		<div class="container">
      <!-- formulaire de connexion -->
	<form method="POST" action="">
		<label>
		<span class="label-text">pseudo</span>
		<input type="name" step="any" name="pseud"/>
		</label>
		<label class="password">
			<span class="label-text">Mot de passe</span>
			<div class="mdp">
			<img id="imgpass" src="images/invisible.png">
			<input type="password" id="password" step="any" name="mdp"/>
			</div>
			
		</label>
		
		
		<input class="submit" type="submit" id="connexion" value="connexion">
	</form>
	

	<section>
		<?php
		if(isset($_POST["pseud"]) && isset($_POST["mdp"])){ #verifie que des donnes soit envoyer 
			$pseudo=$bdd->quote($_POST["pseud"]); 
			$mdp=$bdd->quote($_POST["mdp"]); 
			$requete='SELECT * FROM admin WHERE admin.pseudo_admin='.$pseudo.'AND admin.mdp_admin='.$mdp; #verifie que les donnees du formulaire correspondent au mot de passe et pseudo de la table admin
			$resultats=$bdd->query($requete);
			$t=$resultats->fetchAll();
			$resultats->closeCursor();
			$nbmaj=count($t);
			if($nbmaj==1){ #si la connexion est valider affiche un message et propose un lien vers la page d'administration sinon message d'erreur
				echo("connexion réussie !");
				echo ("\n"."vous pouvez acceder à la page admin");
				echo ("<a href='ModifBaseD.php'> administration </a>");
			}
			else{
				echo("erreur de connexion, veuillez recommencez");
			}
		}	
		?>
	</section>
	</div>
	</div>
</body>
<footer class="footer">
 <div class="containerf">
  <div class="row">
    <div class="footer-col">
      <h4>Pays</h4>
      <ul>
      <li><a href="japon.php">Japon</a></li>
         <li><a href="mexique.php">Mexique</a></li>
         <li><a href="inde.php">Inde</a></li>
         <li><a href="egypte.php">Egypte</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>Plan</h4>
        <ul>
          <li><a href="acces.php">Carte</a></li>
      </ul>
    </div>
    <div class="footer-col">
    <h4>Contact</h4>
    <ul class="caramail">
      <li>lepuydumonde@caramail.fr</li>
      <li>04.71.45.73.95</li>
    </ul>
  </div>
      <div class="footer-col">
        <img class="logofooter" src="images/logo2.png" alt="logo footer">
    </div>
  </div>
 </div>
</footer>
</html>