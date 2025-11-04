<?php 
	//Destiné au traitement de la recherche dynamique d'un stagiaire
	require_once('../inclu/connexion.php');

	if(isset($_POST['search']) && !empty($_POST['search']))
	{
		//$search=mysql_real_escape_string(htmlentities($_POST['search']));
		$search=$_POST['search'];
		$recherche=$bdd->query('SELECT * FROM stagiaire WHERE nom LIKE \'%'.$_POST['search'].'%\' ');
		while ($re=$recherche->fetch())
		{
			echo '<li>'.$re['nom'].'</li>';
		}
	}

 ?>