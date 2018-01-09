<!DOCTYPE html> 
<html lang="fr"> 
 
	<head>	
		<meta charset="utf-8">
		<meta name="viewport" content="initial-scale=1.0, user-scalable=no">

		<title>Administration Google Maps</title>
		<meta name="description" content="test Google Map !">
		<meta name="keywords" content="Google Map !">
		<meta name="author" content="Guillaume RICHARD">
		<meta name="geo.placename" content="Aurillac-sur-Vendinelle">

		<link rel="stylesheet" href="css/html.css">
		<link rel="stylesheet" href="css/style.css" />
		<link href="css/default.css" rel="stylesheet">

		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
		<script src="js/util.js"></script>
	</head>

	<body>
		<div id="header"></div>
		<?php	require('id_connexion.php');	?>

		<section id="content">
			<h1>Bienvenue!</h1>
			<div>
				<div id="map-canvas"></div>

				<?php
					$sql='SELECT * FROM map;';
					$req=$bdd->query($sql);
					require('map.php');
				?>
			</div>
		</section>

	</body>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
</html>
