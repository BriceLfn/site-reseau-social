<?php
// on teste si le formulaire a été validé
if (isset($_POST['go']) && $_POST['go']=='Poster la news') {
	// on se connecte à notre base
	$base = mysql_connect ('localhost', 'root', '');
	mysql_select_db('reseausocial', $base);

	// on teste la déclaration de nos variables
	if (!isset($_POST['Auteur']) || !!isset($_POST['Publication'])) {
	$erreur = 'Les variables nécessaires au script ne sont pas définies.';
	}
	else {
	if (empty($_POST['Auteur']) || empty($_POST['Publication'])) {
		$erreur = 'Au moins un des champs est vide.';
	}
	// si tout est bon, on peut commencer l'insertion dans la base
	else {
		// lancement de la requête d'insertion
		$sql = 'INSERT INTO Publication VALUES("'.mysql_escape_string($_POST['Auteur']).'", "'.mysql_escape_string($_POST['Publication']).'", "'.date("Y-m-d H:i:s").'")';

		// on lance la requête (mysql_query) et on impose un message d'erreur si la requête ne se passe pas bien (or die)
		mysql_query($sql) or die('Erreur SQL !'.$sql.'<br />'.mysql_error());

		// on ferme la connexion à la base de données
		mysql_close();

		// on redirige vers la page d'accueil du site (attention, cette redirection ne fonctionne qui si vous avez placé cette page dans un répertoire à partir de la racine du site). Si ce n'est pas le cas, veuillez entrer ici le bon chemin d'accès afin de retomber sur la page d'accueil du site.
		header('Location: ../index.php');
		// on termine le script courant
		exit();
	}
	}
}
?>
<html>
<head>
<title>Insertion d'une nouvelle news</title>
</head>

<body>

<!-- on fait pointer le formulaire vers la page traitant les données -->
<form action="publier.php" method="post">
<table>
<tr><td>
Auteur :
</td><td>
<input type="text" name="Auteur" maxlength="30" size="50" value="<?php if (isset($_POST['Auteur'])) echo htmlentities(trim($_POST['Auteur'])); ?>">
</td></tr><tr><td>
Texte :
</td><td>
<textarea name="Publication" cols="50" rows="10"><?php if (isset($_POST['Publication'])) echo htmlentities(trim($_POST['Publication'])); ?></textarea>
</td></tr><tr><td><td align="right">
<input type="submit" name="go" value="Poster la publication">
</td></tr></table>
</form>
<?php
// on affiche les erreurs éventuelles
if (isset($erreur)) echo '<br /><br />',$erreur;
?>
</body>
</html>