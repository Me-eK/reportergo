<?php
session_start();
if(empty($_SESSION['admin'])){
	header('Location: index.php');
}
if(empty($_GET)){
	header('Location: index.php');
}

if(!empty($_GET)){
	extract($_GET);
	$p=strip_tags($p);
}

require('../id_connexion.php');
try{
  $bdd = new PDO('mysql:host='.$dbhost.';dbname='.$dbname,$dblogin,$dbpass) or die(print_r($bdd->errorInfo()));
  $bdd->exec('SET NAMES utf8');
}

catch(Exeption $e){
  die('Erreur:'.$e->getMessage());
}

$req = $bdd->prepare('SELECT id FROM map WHERE id=:id');
$req->execute(array('id'=>$p));
if($req->rowCount()==0){
	header('Location: index.php');
}
$req->closeCursor();

$req = $bdd->prepare('DELETE FROM map WHERE id=:id');
$req->execute(array('id'=>$p));
header('Location: admin.php');

?>
