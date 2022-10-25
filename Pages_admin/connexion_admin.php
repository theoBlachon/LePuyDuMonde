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
<link rel="stylesheet" href="css/falloutornement.css" type="text/css" media="screen" title="" />
<script src="scriptjs/Affichecachertxt.js" type="text/javascript"></script>
</head>

<body>
	<header>
	</header>
	<form method="POST" action="">
		pseudo: <input type="name" step="any" name="pseud"/>
		<br>
		mot de passe: <input type="password" id="password" step="any" name="mdp"/>
		<img  id="imgpass" src="imagefallout/handypassword.png">
		<br/>
		<input type="submit" id="connexion" value="connexion">
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

	<footer>
	</footer>
</body>
</html>