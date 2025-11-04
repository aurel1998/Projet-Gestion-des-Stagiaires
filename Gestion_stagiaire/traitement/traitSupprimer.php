<?php 
	if (isset($_POST['mat_suppr']) AND !empty($_POST['mat_suppr'])) 
	{
		require_once("../inclu/connexion.php");

	$req_suppr_stag=$bdd->prepare('DELETE FROM stagiaire WHERE id_stagiaire =:code ');
	$req_suppr_stag->execute(array('code'=>$_POST['mat_suppr']));

	$req_suppr_stag->closeCursor();
	header('location: ../accueil_home.php');
	}

 ?>