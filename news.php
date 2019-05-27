<?php
// on se connecte à notre base
try{
$bdd = new PDO('mysql:host=localhost;dbname=reseausocial;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}

// lancement de la requête
$sql = $bdd->query('SELECT * FROM Publication ORDER BY DatePublication DESC');



while($donnees = $sql->fetch()){
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="publier.css">
		<title></title>
	</head>
	<body>
		<div class="publication">
		<p> auteur : <?php echo $donnees['Auteur'];?>, publié le <?php echo $donnees['DatePublication'] ?></p>
		<p>texte : <?php echo $donnees['TextePublication'];?></p>
		</div>
		<div id="particles-js"></div>
		<script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
		<script  src="particles.js"></script>
	</body>
	</html>
<?php
}

$sql->closeCursor(); // Termine le traitement de la requête
?>