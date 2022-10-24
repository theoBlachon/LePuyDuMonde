<?php
$bdd = new 
PDO('mysql:host=localhost;port=3306;dbname=ki_monde','ki_monde', 'LePuyDuMonde');

$requete='SELECT * FROM objets';
$resultats = $bdd->query($requete) ;
$listeobjet=$resultats->fetchAll() ;
$resultats->closeCursor() ;
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
<link rel="icon" type="image/x-icon" href="imagefallout/handypasswordG.ico" />
<link rel="stylesheet" href="" type="text/css" media="screen" title="ornement" />
</head>

<body>
	<header>
	</header>
	<form method="POST" action="">
		Les objets:<br/>
		<select name="id_objets">
		<?php
			$nbobjet=count($listeobjet) ;
			for($i=0;$i<$nbobjet;$i++){
				echo "<option value=".$listeobjet[$i]["id_objets"].">".$listeobjet[$i]["nom_objets"]."</option>";
		} 
		?>
		</select><br/>
		 nouveau nom: <input type="name" step="any" name="nom_objet"/><br/>
		<input type="submit" class="boutonform" value="Modifier le nom">
	</form>
	<section>
		<?php
		if(isset($_POST["nom_objet"]) && isset($_POST["id_objets"])){
			$id_objets=$_POST["id_objets"]; 
			$nom_objet=$_POST["nom_objet"]; 
			$requete='UPDATE objets SET nom_objets="'.$nom_objet.'" WHERE id_objets="'.$id_objets.'"';
			$resultats = $bdd->query($requete);
			$resultats->closeCursor();
			echo('La base de données a bien été mise à jour');
		}
		?>
	</section>
	<footer>
	</footer>
</body>

</html>
