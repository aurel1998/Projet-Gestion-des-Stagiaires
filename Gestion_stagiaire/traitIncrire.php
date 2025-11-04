<?php
	
	//srand(time(0));
	//isset($_POST['nom']) AND !empty($_POST['nom']) AND 
	require_once("inclu/connexion.php");

	if (isset($_POST['login']) AND !empty($_POST['login']) AND isset($_POST['mail']) AND !empty($_POST['mail'])  AND isset($_POST['mdp']) AND !empty($_POST['mdp']) AND isset($_POST['c-mdp']) AND !empty($_POST['c-mdp']) ) 
	{
	
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
				{ ?>

					<script type="text/javascript">alert('Désolé! Impossible de créer votre compte\n Veuillez réessayer avec un  autre login ou un autre mot de passe'); </script>
		<?php }
				else if($resultat['nbr']>1)
				{ ?>
					<script type="text/javascript"> alert('Vous pouvez pas avoir accès à un tel compte! Contacter votre administrateur pour erreur de duplications'); </script>
		<?php	}
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
														'etat' => 1)); ?>

					<script type="text/javascript">alert('Votre compte a été bien crée!');</script>;
			<?php 	header("location: accueil_home.php");
				}
			}

		}
		else
		{ ?>
			<script type="text/javascript">alert('Vos mots de passe ne correspondent pas');</script>
		<?php }

	}


 ?>