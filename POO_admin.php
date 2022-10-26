<?php


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
    <form method="POST" action="">
        Nom: <input type="text" step="any" name="nom" id="nom" required/>
		<br>
		Prenom: <input type="text" step="any" name="prenom" id="prenom" required/>
		<br/>
		Pseudo: <input type="text" step="any" name="pseud" id="pseud" required/>
		<br>
		Mot de passe <input type="password" steps="any" name="mdp" id="mdp" required/>
		<br/>
        <input type="submit"  value="enregistrer">

    <?php
        class admin {
            public $nom = "";
            public $prenom = "";
            public $pseudo;
            public $mdp;
            private $identifiant=0;
            public function setIdentifiant($i) {
                $this->identifiant= $i;
            }
            public function getIdentifiant() {
                return $this->identifiant;
            }
            public function __construct() {
                $this->nom= $_POST["nom"];
                $this->prenom= $_POST["prenom"];
                $this->pseudo = $_POST["pseud"];
                $this->mdp = $_POST["mdp"];
            }
            public function affichage(){
                echo ("nom : ".$this->nom." prenom :  ".$this->prenom." pseudo : ".$this->pseudo." mot de passe : ".$this->mdp);
            }
        }
        if(isset($_POST["pseud"]) && isset($_POST["mdp"])){
            $admin= new admin();
            $admin->affichage();
        }

    ?>

    </form>

</body>