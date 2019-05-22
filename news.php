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
	<p> auteur : <?php echo $donnees['Auteur'];?></p>
</br>
	<p>texte : <?php echo $donnees['TextePublication'];?></p>
	
<?php
}

$sql->closeCursor(); // Termine le traitement de la requête
?>