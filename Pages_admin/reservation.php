<?php
$bdd = new 
PDO('mysql:host=localhost;port=3306;dbname=ki_monde','ki_monde', 'LePuyDuMonde');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<meta name="author" content="ETTER chris" />
<meta name="description" content="Bienvenue sur le site de fallout construction !" />
<meta name="keywords" content="fallout, constructions, ressources, calulateur" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Inscription</title>
<link rel="icon" type="image/x-icon" href="imagefallout/handypasswordG.ico" />
<link rel="stylesheet" href="" type="text/css" media="screen" title="ornement" />
<script src="scriptjs/avertissement.js" type="text/javascript"></script>
</head>

<body>
	<header>
	</header>
	<form method="POST" action="">
		Nom: <input type="name" step="any" name="nom" id="nom"/>
		<br>
		Prénom: <input type="name" step="any" name="prenom" id="prenom"/>
		<br/>
		Email: <input type="text" step="any" name="email" id="email"/>
		<br>
		Numero de telephone: <input type="number" step="any" name="numero" id="numero"/>
		<br/>
		Tarifs: <select>
			<option value="tarif réduit">tarif enfant</option>
			<option value="tarif plein">tarif adulte</option>
		</select>
		<br>
		<input type="submit" value="reserver" id="reserv">
	</form>		
	<section>
		<?php
		if(isset($_POST["pseud"]) && isset($_POST["mdp"])){
			$pseudo=$bdd->quote($_POST["pseud"]); 
			$mdp=$bdd->quote($_POST["mdp"]); 


			$sql = 'INSERT INTO utilisateur (nom_utilisateur, mdp_utilisateur) VALUES ('.$pseudo.','. $mdp.')';
			$nbmaj=$bdd->exec($sql);
			if($nbmaj==1){
				echo ('Enregistrement effectuer, bienvenue !');
			}
		}
		?>
	</section>

	<footer>	
	</footer>
</body>
</html>