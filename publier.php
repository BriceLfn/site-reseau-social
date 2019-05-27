<?php
session_start();
?>
<!DOCTYPE html>	
<html>
<head>
<meta charset="utf-8">
<title>Insertion d'une nouvelle news</title>
<link rel="stylesheet" type="text/css" href="publier.css">
</head>

<body>
	<div class="formulaire">
		<!-- on fait pointer le formulaire vers la page traitant les données -->
		<form action="publier1.php" method="post">
		<p>Auteur :</p>
		<input type="text" name="Auteur" maxlength="30" size="50">
		<p>Texte :</p>
		<textarea name="Publication" cols="50" rows="10"></textarea>
	</br>
		<input type="submit" name="go" value="Poster la publication">
		</form>
</div>
<?php
// on affiche les erreurs éventuelles
if (isset($erreur)) echo '<br /><br />',$erreur;
?>
<div id="particles-js"></div>
<script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
<script  src="particles.js"></script>
</body>
</html>