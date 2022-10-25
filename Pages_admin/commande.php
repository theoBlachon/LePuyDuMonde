<?php
$bdd = new 
PDO('mysql:host=localhost;port=3306;dbname=lepuydumonde','root', '');
$requete='SELECT * FROM billet, tarif';
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
<title>Inscription</title>
<link rel="icon" type="image/x-icon" href="" />
<link rel="stylesheet" href="" type="text/css" media="screen" title="" />
<script src="" type="text/javascript"></script>
</head>

<body>
<form method="POST" action="">
Tarifs:<br/>
		<select name="id_billets">
				<?php
				for($i=0;$i<$nbobjet;$i++){
					echo "<option value=".$listeobjet[$i]["id_tarif"].">"."</option>";
				} 
				?>
		</select><br/>
        <input type="submit"  value="commander">
	</form>		
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
			$date_billet="2023-04-21";
			$sql = 'INSERT INTO billet (id_client, id_concert, id_tarif,date_billet) VALUES ('.$id_client.','.$id_concert.','. $tarif.','.$date_billet.')';
			$nbmaj=$bdd->exec($sql);
			if($nbmaj==1){
				echo ('Reservation effectuée');
			}
		}
		?>
</body>