<?php
$bdd = new 
PDO('mysql:host=localhost;port=3306;dbname=lepuydumonde','root', '');
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
<title>Inscription</title>
<link rel="icon" type="image/x-icon" href="" />
<link rel="stylesheet" href="" type="text/css" media="screen" title="" />
<script src="scriptjs/avertissement.js" type="text/javascript"></script>
</head>

<body>
	<form method="POST" action="commande.php">
		Nom: <input type="name" step="any" name="nom" id="nom" required/>
		<br>
		Prénom: <input type="name" step="any" name="prenom" id="prenom" required/>
		<br/>
		Email: <input type="text" step="any" name="email" id="email" required/>
		<br>
		Numero de telephone: <input type="number" step="any" name="numero" id="numero" required/>
		<br/>
		<input type="submit" value="valider" id="reserv">
	</form>		
	<section>
		<?php
		if(isset($_POST["nom"]) && isset($_POST["prenom"])){
			$nom=$bdd->quote($_POST["nom"]); 
			$prenom=$bdd->quote($_POST["prenom"]);
			$numero=$bdd->quote($_POST["email"]); 
			$email=$bdd->quote($_POST["numero"]); 


			$sql = 'INSERT INTO client (nom_client, prenom_client, telephone_client, mail_client) VALUES ('.$nom.','. $prenom.','.$numero.','. $email.')';
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