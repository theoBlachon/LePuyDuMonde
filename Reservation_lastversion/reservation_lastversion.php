<?php
$bdd = new 
PDO('mysql:host=localhost;port=3306;dbname=ki_monde','ki_monde', 'LePuyMonde');
$requete1='SELECT * FROM billet, tarif';
$resultats1 = $bdd->query($requete1) ;
$listeobjet1=$resultats1->fetchAll() ;
$resultats1->closeCursor() ;
$requete2='SELECT * FROM tarif';
$resultats2 = $bdd->query($requete2) ;
$listeobjet2=$resultats2->fetchAll() ;
$resultats2->closeCursor() ;
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
<link rel="stylesheet" href="reserver.css" type="text/css" media="screen" title="" />
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
            <a href="#" class="acc">réserver</a>
            <a href="#">administrateur</a>
            <div class="dot"></div>
        </div>
    </nav>
	<div class="conteneur">
	<div class="container" >
	<h1 class="text-center">Reserver</h1>
	<form method="POST" class="registration-form" action="">
		<label class="col-one-half">
			<span class="label-text">Nom</span>
			<input type="name" step="any" name="nom" id="nom" required/>
		</label>
		<label class="col-one-half">
			<span class="label-text">Prénom</span>
			<input type="name" step="any" name="prenom" id="prenom" required/>
		</label>
		<label>
			<span class="label-text">Email</span>
			<input type="text" step="any" name="email" id="email" required/>
		</label>
		<label>
			<span class="label-text">Telephone</span>
			<input type="number_format" step="any" name="numero" id="numero" maxlength=10 required/>
		</label>
		<div class="tarif">
		Tarifs:
			<select name="id_billets">
					<?php
					$nbobjet=count($listeobjet2) ;
					for($i=0;$i<$nbobjet;$i++){
						echo ("<option value=".$listeobjet2[$i]["Id_tarif"].">".$listeobjet2[$i]["nom_tarif"]."</option>");
					} 
					?>
			</select><br/>
			</div>
		<div class="text-center">
			<input class="submit" type="submit" value="valider" id="reserv">
		</div>
	</form>		
	<section>
		<?php
		if(isset($_POST["nom"]) && isset($_POST["prenom"])){
			$nom=$bdd->quote($_POST["nom"]); 
			$prenom=$bdd->quote($_POST["prenom"]);
			$numero=$bdd->quote($_POST["numero"]); 
			$email=$bdd->quote($_POST["email"]); 
			$sql = 'INSERT INTO client (nom_client, prenom_client, telephone_client, mail_client) VALUES ('.$nom.','. $prenom.','.$numero.','. $email.')';
			$nbmaj=$bdd->exec($sql);
		}
		?>
	<section>
			<?php
			if(isset($_POST["id_billets"])){
				$client='SELECT MAX(id_client) AS "id_client" FROM client';
				$selection = $bdd->query($client) ;
				$idclient=$selection->fetchAll() ;
				$selection->closeCursor() ;
				$id_concert=2;
				$nbobjet=count($idclient) ;
				for($i=0;$i<$nbobjet;$i++){
					$id_client=$idclient[$i]["id_client"];
				} 
				$tarif=$bdd->quote($_POST["id_billets"]); 
				$sql2 = 'INSERT INTO billet (id_client, id_concert, id_tarif) VALUES ('.$id_client.','.$id_concert.','. $tarif.')';
				$nbmaj=$bdd->exec($sql2);
				if($nbmaj==1){
					echo ('Reservation effectuée');
					echo("<a href='index.html'> Retourner à la page d'accueil</a>");
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