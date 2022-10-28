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
<title>Reservation</title>
<link rel="stylesheet" href="css/reserver.css" type="text/css" media="screen" title="" />
</head>

<body>
<nav class="navbar">
        <!-- LOGO -->
        <div class="logo" ><a href="index.html"><img src="images/logo2.png" alt=""></a></div>
          <!-- NAVIGATION MENUS -->
          <div class="navMenu">
		  <a href="japon.html">Japon</a>
            <a href="mexique.html">Mexique</a>
            <a href="inde.html">Inde</a>
            <a href="egypte.html">Egypte</a>
            <a href="acces.html">accès</a>
            <a href="reserver.php" class="acc">réserver</a>
            <a href="connexion_admin.php">administrateur</a>
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
	  <li><a href="japon.html">Japon</a></li>
         <li><a href="mexique.html">Mexique</a></li>
         <li><a href="inde.html">Inde</a></li>
         <li><a href="egypte.html">Egypte</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>Plan</h4>
        <ul>
          <li><a href="acces.html">Carte</a></li>
      </ul>
    </div>
    <div class="footer-col">
        <h4>Association</h4>
        <ul>
          <li><a href="connexion_admin.php">Compte administrateur</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <img class="logofooter" src="images/logo2.png" alt="">
    </div>
  </div>
 </div>
</footer>
</html>