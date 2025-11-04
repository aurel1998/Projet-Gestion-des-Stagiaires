 <?php 
 	require_once('inclu/connexion.php');
 	$idt=$_POST['login'];
 	$mdp=$_POST['password'];


 	if ($idt<>"" and $mdp<>"") 
 	{
 		$requete=$bdd->prepare('SELECT count(id_user) as nbr, login, mot_de_passe 
 								FROM user
 								WHERE login=:lg AND mot_de_passe=:mp'
 							);
 		$requete->execute(array('lg'=>$idt, 'mp'=>$mdp));

 		while ($control=$requete->fetch())
 		{
 			if($control['nbr']<1)
 				 echo "<p alert('indefini')>Indefini</p>";
 			else if($control['nbr']>1)
 				 echo "<p onclick=alert('duplication')>Duplication</p>";

 			elseif ($control['nbr']==1) 
 			{
 				 require_once('accueil_home.php');
			}
 		}
 	}


 ?>