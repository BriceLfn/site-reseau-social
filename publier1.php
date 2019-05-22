<?php
$datemtn = date("Y-m-d");
try{
	$bdd = new PDO('mysql:host=localhost;dbname=reseausocial;charset=utf8', 'root', '');
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
	}
	catch(PDOException $e)
	{
		// En cas d'erreur, on affiche un message et on arrête tout
	        die('Erreur : '.$e->getMessage());
	}



	// on teste la déclaration de nos variables
	if (!isset($_POST['Auteur']) || !isset($_POST['Publication'])) {
	$erreur = 'Les variables nécessaires au script ne sont pas définies.';
	}
	else {
	if (empty($_POST['Auteur']) || empty($_POST['Publication'])) {
		$erreur = 'Au moins un des champs est vide.';
	}
	// si tout est bon, on peut commencer l'insertion dans la base
	else {

		/*$tab = array(
			':auteur' => $_POST['Auteur'],
			':texte' => $_POST['Publication'],
			':date' => date("Y-m-d"),);
			*/
		// lancement de la requête d'insertion
		// lancement de la requête
		//$sql = $bdd->query('INSERT INTO Publication VALUES("'.mysql_escape_string($_POST['Auteur']).'", "'.mysql_escape_string($_POST['Publication']).'", "'.date("Y-m-d H:i:s").'")');
		$auteur = $_POST['Auteur'];
  		$texte = $_POST['Publication'];
  		$DatePublication = date("Y-m-d");
  		

		$sql = $bdd->prepare("INSERT INTO publication (Auteur, TextePublication, DatePublication) VALUES (?, ?, ?)");
		$sql->bindParam(1, $auteur);
		$sql->bindParam(2, $texte);
		$sql->bindParam(3, $DatePublication);
  		$sql->execute();

  		

  // Redirect to index.php
  header ('Location: index.php');
 exit;

		//$sql = 'INSERT INTO Publication VALUES("'.mysql_escape_string($_POST['Auteur']).'", "'.mysql_escape_string($_POST['Publication']).'", "'.date("Y-m-d H:i:s").'")';

		// on lance la requête (mysql_query) et on impose un message d'erreur si la requête ne se passe pas bien (or die)
		//mysql_query($sql) or die('Erreur SQL !'.$sql.'<br />'.mysql_error());

		// on ferme la connexion à la base de données
		//mysql_close();

		// on redirige vers la page d'accueil du site (attention, cette redirection ne fonctionne qui si vous avez placé cette page dans un répertoire à partir de la racine du site). Si ce n'est pas le cas, veuillez entrer ici le bon chemin d'accès afin de retomber sur la page d'accueil du site.
		//header('Location: ../index.php');
		// on termine le script courant
		//exit();
	}
	}

?>
