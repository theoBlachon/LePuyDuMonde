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
<link rel="stylesheet" href="modif.css" type="text/css" media="screen" title="" />
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
				public function adbdd(){
					$bdd = new PDO('mysql:host=localhost;port=3306;dbname=lepuydumonde','root', '');
					$reqpreparee=$bdd->prepare('INSERT INTO admin (nom_admin,prenom_admin,mailadmin,mdp_admin,pseudo_admin) VALUES (:nom_admin:,prenom_admin,:mailadmin,:mdp_admin,:pseudo_admin)');
					$reqpreparee->bindParam(':nom_admin', $this->nom); 
					$reqpreparee->bindParam(':prenom_admin', $this->prenom);
					$reqpreparee->bindParam(':mailadmin', $this->mail); 
					$reqpreparee->bindParam(':mdp_admin', $this->mdp);
					$reqpreparee->bindParam(':pseudo_admin', $this->pseudo);
					#$succes=$reqpreparee->execute();
				}
			}
			if(isset($_POST["pseud"]) && isset($_POST["mdp"])){
				for($i=0;$i<$nbobjet;$i++)
				{
					$newobjet=new admin($attributs[$i][$i], $attributs[$i][$i], $attributs[$i][$i],$attributs[$i][$i],$attributs[$i][$i]);
				}
				#$newobjet->affichage();
				#$newobjet-> adbdd();
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
