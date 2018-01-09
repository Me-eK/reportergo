<?php
session_start();
if(!empty($_SESSION['admin'])){
 header('Location: admin.php');
}
if(!empty($_POST)){
 extract($_POST);
 $valid=true;
 
 if(empty($login)){
	$valid=false;
	$erreurlogin = 'Vous devez indiquer votre login';
 }
 
 if(empty($pass)){
	$valid=false;
	$erreurpass = 'Vous devez indiquer un mot de passe';
 }
 
 require('../id_connexion.php');

try{
  $bdd = new PDO('mysql:host='.$dbhost.';dbname='.$dbname,$dblogin,$dbpass) or die(print_r($bdd->errorInfo()));
  $bdd->exec('SET NAMES utf8');
}

catch(Exeption $e){
  die('Erreur:'.$e->getMessage());
}

$req = $bdd->prepare('SELECT id FROM admin WHERE login=:login AND pass=:pass');
$req->execute(array('login'=>$login, 'pass'=>sha1($pass)));
if(!empty($login) && !empty($pass)){
if($req->rowCount()==0){
 $valid=false;
 $erreur = 'Mauvais identifiants';
 }
}
 
 if($valid){
	$_SESSION['admin'] = $login;
	header('Location: admin.php');
 }
 
}
?>

<!DOCTYPE html> 
<html lang="fr"> 
 
	<head>	
		<meta charset="utf-8">

		
		<meta name="description" content="test Google Map !">
		<meta name="keywords" content="Google Map !">
		<meta name="geo.placename" content="Aurillac-sur-Vendinelle">

		<link rel="stylesheet" href="../css/html.css">
		<link rel="stylesheet" href="../css/style.css" />
	</head>

	<body>
		<div id="header"></div>
		<div id="content">
			<form name="identif" method="POST" action="index.php">
				<table>
					<tr><td class="login">Login : </td><td><input type="text" name="login"></td></tr>
					<tr><td>Mot de passe : </td><td><input type="password" name="pass"></td></tr>
				</table>
				<div>
					<input id="ok" type="submit" name="action" value="OK"><br />
				</div>
			</form>
		</div>
		
	</body>
</html>
