<?php 
	
	//srand(time(0));
	
	require_once("inclu/connexion.php");

	$nom=$_POST['nom'];
	$login=$_POST['login'];
	$mail=$_POST['mail'];
	$mdp=$_POST['mdp'];
	$c_mdp=$_POST['c-mdp'];
	
	if($mdp==$c_mdp)
	{
		$requete_verification=$bdd->prepare(" SELECT count(*) AS nbr, id_user, login, email, mot_de_passe, role 
										FROM user 
										WHERE login=:log AND mot_de_passe=:mdp AND role <>:ad ");
		$requete_verification->execute(array('log' => $login, 'mdp' => $mdp, 'ad'  => "admin"));

		while ($resultat=$requete_verification->fetch()) 
		{
			if($resultat['nbr']==1)
			{
				echo "<h4>Désolé! Impossible de créer votre compte<br></h4> Veuillez réessayer avec un  autre login ou un autre mot de passe<br>";
			}
			else if($resultat['nbr']>1)
			{
				echo "Vous pouvez pas avoir accès à un tel compte! Contacter votre administrateur pour erreur de duplications";
			}
			else
			{
				$yy=rand();
				//echo "$yy";
				$requete_insertion=$bdd->prepare("INSERT INTO user (login, email, mot_de_passe, role, etat) 
													VALUES (:login, :mail, :mdp, :ad, :etat)");
				$requete_insertion->execute(array('login' => $login,
													'mail' => $mail,
													'mdp' => $mdp,
													'ad' => "visit",
													'etat' => 1));

				echo "Votre compte a été bien crée!";
				include_once("accueil_home.php");
			}
		}

	}
	else
	{
		echo "<h4>Vos mots de passe ne correspondent pas</h4>";
	}


 ?>