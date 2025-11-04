<?php 
	
	require_once('inclu/connexion.php');

	if(isset($_POST['search']) && !empty($_POST['search']))
	{
		//$search=mysql_real_escape_string(htmlentities($_POST['search']));
		$search=$_POST['search'];
		$recherche=$bdd->query('SELECT * FROM stagiaire WHERE nom LIKE \'%'.$_POST['search'].'%\' ');
		while ($re=$recherche->fetch())
		{
			echo '<p class="liste"><a href="">'.$re['nom'].'&nbsp;&nbsp;&nbsp;'.$re['prenom'].'</a></p>';
		}
	}

 ?>