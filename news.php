<?php
// on se connecte à notre base
try{
$bdd = new PDO('mysql:host=localhost;dbname=reseausocial;charset=utf8', 'root', '');
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
	<div style="border : solid 1px">
	<p> auteur : <?php echo $donnees['Auteur'];?>, publié le <?php echo $donnees['DatePublication'] ?></p>
	<p>texte : <?php echo $donnees['TextePublication'];?></p>
	</div>
<?php
}

$sql->closeCursor(); // Termine le traitement de la requête
?>