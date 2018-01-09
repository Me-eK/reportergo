<?php
session_start();
if(empty($_SESSION['admin'])) {
	header("Location: index.php");
}
if(!empty($_POST)){
  extract($_POST);

require('../id_connexion.php');

$req = $bdd->prepare('INSERT INTO map (evenement, description, longitude, latitude) VALUES (:evenement, :description, :longitude, :latitude)');
$req->execute(array('evenement'=>UTF8_decode(addslashes($evenement)), 'description'=>addslashes($description), 'longitude'=>UTF8_decode(addslashes($longitude)), 'latitude'=>UTF8_decode(addslashes($latitude))));
$req->closeCursor();
header('Location: index.php');
}
?>

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
<h1>Ajouter un événement</h1>
<div class="articles">
	<div class="blog">
		<form name="ajout" action="add_article.php" method="post">
			<label for="evenement">Evénement :</label>
			<input type="text" name="evenement" value="<?php if(isset($evenement)) echo $evenement;?>" />

			<label for="longitude">Longitude :</label>
			<input type="text" name="longitude" value="<?php if(isset($longitude)) echo $longitude;?>" />

			<label for="latitude">Latitude :</label>
			<input type="text" name="latitude" value="<?php if(isset($latitude)) echo $latitude;?>" />

			<label for="description">Description : </label>
			<textarea name="description"></textarea>

			<input id="ok" type="submit" name="envoyer" value="Ajouter" />
		</form>
	</div>
</div>
	</body>
</html>
