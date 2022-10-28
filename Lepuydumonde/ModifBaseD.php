<?php
$bdd = new 
PDO('mysql:host=localhost;port=3306;dbname=ki_monde','ki_monde', 'LePuyMonde');

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
<meta name="author" content="Etudiants" />
<meta name="description" content="Site web de l'évenement Le puy du monde au Puy en velay" />
<meta name="keywords" content="festival, le puy en velay, administration, culture, monde, pays" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
<link rel="manifest" href="favicon/site.webmanifest">
<link rel="mask-icon" href="favicon/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">
<title>Modification bdd</title>
<link rel="stylesheet" href="css/modif.css" type="text/css" media="screen" title="" />
</head>

<body>
<nav class="navbar">
        <!-- LOGO -->
        <div class="logo"><img src="images/logo2.png" alt=""></div>
          <!-- NAVIGATION MENUS -->
          <div class="navMenu">
		  <a href="japon.html">Japon</a>
            <a href="mexique.html" >Mexique</a>
            <a href="inde.html">Inde</a>
            <a href="egypte.html">Egypte</a>
            <a href="acces.html">accès</a>
            <a href="reserver.php">réserver</a>
            <a href="connexion_admin.php"class="accs">administrateur</a>
            <div class="dot"></div>
        </div>
    </nav>
	<div class="liste">
	<form method="POST" action="">
		<h1> Les billets:</h1><br/>
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
		<input class="submit" type="submit"  value="Supprimer">
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
		<h1>Modifier le nom d'un client:</h1>
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
		<input class="submit" type="name" step="any" name="nom_client"/><br/>
		</select>
		<input class="submit" type="submit"  value="modifier">
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
		<h1> Ajouter un stand et ça description:</h1><br/>
		<?php
			$billet='SELECT * FROM stands';
			$selection = $bdd->query($billet) ;
			$recup=$selection->fetchAll() ;
			$selection->closeCursor() ;
			$nbobjet=count($recup) ;
		?>
		<textarea type="textarea" step="any" name="Description"></textarea><br/>
		</select>
		<input class="submit" type="submit"  value="Ajouter +">
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
	<br/>
	<h1>Ajouter un administrateur:</h1><br/>
	<form method="POST" action="">
			Nom: <input type="text" step="any" name="nom" id="nom" required/>
			<br>
			Prenom: <input type="text" step="any" name="prenom" id="prenom" required/>
			<br/>
			Pseudo: <input type="text" step="any" name="pseud" id="pseud" required/>
			<br>
			Adresse mail <input type="text" steps="any" name="mail" id="mail" required/>
			<br/>
			Mot de passe <input type="password" steps="any" name="mdp" id="mdp" required/>
			<br/>
			<input class="submit" type="submit"  value="enregistrer"><br/>

		<?php
			$requete='SELECT nom_admin, prenom_admin, mailadmin, mdp_admin, pseudo_admin FROM admin';
			$resultats = $bdd->query($requete) ;
			$attributs=$resultats->fetchAll() ;
			$resultats->closeCursor() ;
			$nbobjet=count($attributs) ;
			class admin {
				public $nom = "";
				public $prenom = "";
				public $pseudo;
				public $mail;
				public $mdp;
				public function __construct($nom,$prenom,$mail,$mdp,$pseudo) {
						$this->nom= $_POST["nom"];
						$this->prenom= $_POST["prenom"];
						$this->pseudo = $_POST["pseud"];
						$this->mail = $_POST["mail"];
						$this->mdp = $_POST["mdp"];
				}
				public function affichage(){
					echo ("nom : ".$this->nom." prenom :  ".$this->prenom." pseudo : ".$this->pseudo." mail : ".$this->mail." mot de passe : ".$this->mdp);
				}
				public function adbdd($nom,$prenom,$mail,$mdp,$pseudo){
					$bdd = new PDO('mysql:host=localhost;port=3306;dbname=lepuydumonde','root', '');
					$dbpreparee=$bdd->prepare('INSERT INTO admin (nom_admin,prenom_admin,mailadmin,mdp_admin,pseudo_admin) VALUES (:nom_admin,:prenom_admin,:mailadmin,:mdp_admin,:pseudo_admin)');
						$dbpreparee ->bindParam(':nom_admin', $nom,PDO::PARAM_STR);
						$dbpreparee ->bindParam(':prenom_admin', $prenom,PDO::PARAM_STR);
						$dbpreparee ->bindParam(':mailadmin', $mail,PDO::PARAM_STR); 
						$dbpreparee ->bindParam(':mdp_admin', $mdp,PDO::PARAM_STR);
						$dbpreparee ->bindParam(':pseudo_admin', $pseudo,PDO::PARAM_STR);
						$dbpreparee->execute();
				}
			}
			if(isset($_POST["pseud"]) && isset($_POST["mdp"])){
					$nom= $_POST["nom"];
					$prenom= $_POST["prenom"];
					$pseudo = $_POST["pseud"];
					$mail = $_POST["mail"];
					$mdp = $_POST["mdp"];
					$newobjet=new admin();
					$newobjet->affichage();
					$newobjet->adbdd($nom,$prenom,$mail,$mdp,$pseudo);
			}
			?>
			<h1> Liste des administrateurs</h1>
			
			<?php
			class affadmin{
				public $nom_admin = "";
				public $prenom_admin = "";
				public $pseudo_admin= "";
				public $mailadmin= "";
				public $mdp_admin= "";
				public function __construct($nom_admin,$prenom_admin,$mailadmin,$mdp_admin,$pseudo_admin) {
					$this->nom_admin=$nom_admin;
					$this->prenom_admin=$prenom_admin;
					$this->mailadmin=$mailadmin;
					$this->mdp_admin=$mdp_admin;
					$this->pseudo_admin=$pseudo_admin;
				}
				public function affichageadmin(){
					echo ("nom : ".$this->nom_admin." prenom :  ".$this->prenom_admin." pseudo : ".$this->pseudo_admin." mail : ".$this->mailadmin." mot de passe : ".$this->mdp_admin."<br/>");
				}
			}
			$objets=array();
			for($i=0;$i<$nbobjet;$i++){
				$objets[$i]=new affadmin($attributs[$i][0], $attributs[$i][1], $attributs[$i][2],$attributs[$i][3],$attributs[$i][4]);
				$objets[$i]->affichageadmin();
			}

		?>
		</div>

    </form>
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
