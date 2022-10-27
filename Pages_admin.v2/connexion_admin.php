<?php
$bdd = new 
PDO('mysql:host=localhost;port=3306;dbname=lepuydumonde','root', '');
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
<meta name="author" content="" />
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Changement nom d'objets</title>
<link rel="icon" type="image/x-icon" href="" />
<link rel="stylesheet" href="connexion.css" type="text/css" media="screen" title="" />
<script src="Affichecachertxt.js" type="text/javascript"></script>
</head>

<body>
<nav class="navbar">
        <!-- LOGO -->
        <div class="logo"><img src="img/logo2.png" alt=""></div>
          <!-- NAVIGATION MENUS -->
          <div class="navMenu">
            <a href="#">Japon</a>
            <a href="#">Mexique</a>
            <a href="#" >Inde</a>
            <a href="#">Egypte</a>
            <a href="#" >accès</a>
            <a href="#" >réserver</a>
            <a href="#"class="acc">administrateur</a>
            <div class="dot"></div>
        </div>
    </nav>
	<div class="conteneur">
		<div class="container">
	<form method="POST" action="">
		<label>
		<span class="label-text">pseudo</span>
		<input type="name" step="any" name="pseud"/>
		</label>
		<label class="password">
			<span class="label-text">Mot de passe</span>
			<div class="mdp">
			<img id="imgpass" src="img/invisible.png">
			<input type="password" id="password" step="any" name="mdp"/>
			</div>
			
		</label>
		
		
		<input class="submit" type="submit" id="connexion" value="connexion">
	</form>
	

	<section>
		<?php
		if(isset($_POST["pseud"]) && isset($_POST["mdp"])){
			$pseudo=$bdd->quote($_POST["pseud"]); 
			$mdp=$bdd->quote($_POST["mdp"]); 
			$requete='SELECT * FROM admin WHERE admin.pseudo_admin='.$pseudo.'AND admin.mdp_admin='.$mdp;
			$resultats=$bdd->query($requete);
			$t=$resultats->fetchAll();
			$resultats->closeCursor();
			$nbmaj=count($t);
			if($nbmaj==1){
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
        <li><a href="#">Japon</a></li>
        <li><a href="#">Mexique</a></li>
        <li><a href="#">Inde</a></li>
        <li><a href="#">Egypte</a></li>
      </ul>
    </div>
    <div class="footer-col">
      <h4>Plan</h4>
      <ul>
        <li><a href="#">Carte</a></li>
        <li><a href="#">Parkings</a></li>
        <li><a href="#">Accès handicapé</a></li>
      </ul>
    </div>
    <div class="footer-col">
        <h4>Association</h4>
        <ul>
          <li><a href="#">Compte administrateur</a></li>
        </ul>
      </div>
    <div class="footer-col">
      <img class="logofooter" src="img/logo300px.png" alt="">
    </div>
  </div>
 </div>
</footer>
</html>