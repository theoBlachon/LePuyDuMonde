<?php
$bdd = new 
PDO('mysql:host=localhost;port=3306;dbname=lepuydumonde','root', '');

$requete='SELECT * FROM billet';
$resultats = $bdd->query($requete) ;
$listeobjet=$resultats->fetchAll() ;
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
<link rel="icon" type="image/x-icon" href="" />
<link rel="stylesheet" href="" type="text/css" media="screen" title="" />
</head>

<body>
	<header>
	</header>
	<form method="POST" action="">
		Les billets:<br/>
		<select name="id_billets">
		<?php
			$billet='SELECT * FROM client NATURAL JOIN billet';
			$selection = $bdd->query($billet) ;
			$recup=$selection->fetchAll() ;
			$selection->closeCursor() ;
			$nbobjet=count($recup) ;
			for($i=0;$i<$nbobjet;$i++){
				echo "<option value=".$listeobjet[$i]["id_billets"].">"."id du billets: ".$recup[$i]["id_billets"]." id du concert: ".$recup[$i]["id_concert"]." client: ".$recup[$i]["nom_client"]." ".$recup[$i]["prenom_client"]."</option>";
		} 
		?>
		</select><br/>
		<input type="submit"  value="Supprimer">
	</form>
	<section>
		<?php
		if(isset($_POST["id_billets"])){
			$id_billet=$_POST["id_billets"]; 
			$requete='DELETE FROM billet WHERE id_billets='.$id_billet;
			$resultats = $bdd->query($requete);
			$resultats->closeCursor();
			echo('Le billet numéro'.$id_billet.' a bien été supprimer');
		}
		?>
	</section>
	<br/>
	<form method="POST" action="">
		Modifier le nom d'un client:<br/>
		<select name="id_nom">
		<?php
			$billet='SELECT * FROM client';
			$selection = $bdd->query($billet) ;
			$recup=$selection->fetchAll() ;
			$selection->closeCursor() ;
			$nbobjet=count($recup) ;
			for($i=0;$i<$nbobjet;$i++){
				echo "<option value=".$recup[$i]["id_client"].">"." client: ".$recup[$i]["nom_client"]."</option>";
		} 
		?>
		<input type="name" step="any" name="nom_client"/><br/>
		</select>
		<input type="submit"  value="modifier">
	</form>
	<?php
		if(isset($_POST["id_nom"])){
			$nom_client=$_POST["nom_client"]; 
			$nom_actu=$_POST["id_nom"];
			$requete='UPDATE client SET nom_client="'.$nom_client.'" WHERE id_client='.$nom_actu;
			$resultats = $bdd->query($requete);
			$resultats->closeCursor();
			echo('Le nom a bien été modifier');
		}
	?>
	<form method="POST" action=""><br/>
		Ajouter un stand et ça description:<br/>
		<?php
			$billet='SELECT * FROM stands';
			$selection = $bdd->query($billet) ;
			$recup=$selection->fetchAll() ;
			$selection->closeCursor() ;
			$nbobjet=count($recup) ;
		?>
		<textarea type="textarea" step="any" name="Description"></textarea><br/>
		</select>
		<input type="submit"  value="Ajouter +">
	</form>
	<?php
		if(isset($_POST["Description"])){
			$descript=$_POST["Description"]; 
			$requete='INSERT INTO stands (Description_stands) VALUES ("'.$descript.'")';
			$resultats = $bdd->query($requete);
			$resultats->closeCursor();
			echo('Le stand a bien été ajouter');
		}
	?>
	<footer>
	</footer>
</body>

</html>
