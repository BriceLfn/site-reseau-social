<?php
session_start();
?>
<html>
<head>
<title>Insertion d'une nouvelle news</title>
</head>

<body>

<!-- on fait pointer le formulaire vers la page traitant les données -->
<form action="publier1.php" method="post">


Auteur :

<input type="text" name="Auteur" maxlength="30" size="50">

Texte :

<textarea name="Publication" cols="50" rows="10"></textarea>

<input type="submit" name="go" value="Poster la publication">

</form>
<?php
// on affiche les erreurs éventuelles
if (isset($erreur)) echo '<br /><br />',$erreur;
?>
</body>
</html>