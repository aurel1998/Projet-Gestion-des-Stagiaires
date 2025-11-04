<?php 

try {
	$bdd= new PDO('mysql:host=localhost; dbname=gestion_stagiaire; charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
 }

 catch (EXCEPTION $e) {
 	die('Erreur de connexion à la base de données: '. $e->getMessage());
 }

 ?>