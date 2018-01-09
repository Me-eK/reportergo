<?php
	$dbhost='localhost';
	$dbname='google_maps';
	$dblogin='root';
	$dbpass='';

	try{
		$bdd = new PDO('mysql:host='.$dbhost.';dbname='.$dbname,$dblogin,$dbpass) or die(print_r($bdd->errorInfo()));
		$bdd->exec('SET NAMES utf8');
	}
	catch(Exeption $e){
		die('Erreur:'.$e->getMessage());
	}

?>
