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
<table>
<tr><td>
Auteur :
</td><td>
<input type="text" name="Auteur" maxlength="30" size="50">
</td></tr><tr><td>
Texte :
</td><td>
<textarea name="Publication" cols="50" rows="10"></textarea>
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