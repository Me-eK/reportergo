<!DOCTYPE html> 
<html lang="fr"> 
 
	<head>
		<meta charset="utf-8">
		<title>Administration</title>
		<meta name="description" content="test Google Map !">
		<meta name="keywords" content="Google Map !">

		<link rel="stylesheet" href="../css/html.css">
		<link rel="stylesheet" href="../css/style.css" />
	</head> 

	<body>
		<div id="header"></div>
		<div id="content">
			<h1>Administration de la plateforme</h1>
			<div id="add"><a href="add_article.php">Ajouter un nouvel événement sur la carte</a></div>

			<a href="SQLtoXML.php">Génération du fichier XML</a> - 
			<a href="../xml/point.xml"> Lecture du fichier XML</a> -
			<a href="../principal.php"> Voir la carte</a> <br />
			<br /><br />
			<?php
				require('../id_connexion.php');

				$req = $bdd->query('SELECT * FROM map ORDER BY evenement ASC');
				while($data = $req->fetch()){
					echo '<div class="comment">';
					echo '<a class="delete" href="delete.php?p='.$data['id'].'"><img src="../imagess/false.png" /></a>';
						echo '<h3>'.stripslashes($data['evenement']).'</h3>';
						echo '<p>Description : '.stripslashes($data['description']).'</p>';
						echo '<p>Longitude : '.stripslashes($data['longitude']).'</p>';
						echo '<p>Latitude : '.stripslashes($data['latitude']).'</p>';
						echo '<p class="edit"><a href="edit.php?p='.$data['id'].'">Editer cet article</a></p>';
					echo '</div>';
				}
				$req->closeCursor();
			?>

			<a href="deconnection.php">Déconnexion</a>
		</div>
	</body>
</html>
