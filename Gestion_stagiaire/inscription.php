<?php 
session_start();  
if (isset($_POST['login']) AND !empty($_POST['login'])) 
{
 $_SESSION['pseudo']=$_POST['login'];
 $_SESSION['password']=$_POST['mdp'];
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="styles/css/bootstrap.css">
	<title>Inscription</title>
	<style type="text/css">
		html, body{
			height: 100%;
		}
		form {
			margin: auto;
			width: 100%;
			max-width: 400px;
		}

		body {
		  display: flex;
		  -ms-flex-align: center;
		  align-items: center;
		  padding-top: 30px;
		  padding-bottom: 30px;
		}

		@media (min-width: 100px) and (max-width: 800px)
		{
			form {
				max-width: 300px;
				margin: auto;
			}
		}
	</style>
</head>
<body class="container">

  	<form class="form" method="POST" action="">
  		<h3 class="border-0 text-center">Créer un compte</h3>

  		<label for="nom">Nom et prénom</label>
  		<div class="input-group">
  		    <div class="input-group-prepend">
  		      <div class="input-group-text" id="btnGroupAddon2"><img src="icon/contact.png" width="18px"></div>
  		    </div>
  		    <input type="text" name="nom" class="form-control" id="nom" placeholder="Ex: DUKE Jean" aria-label="Input group example" aria-describedby="btnGroupAddon2">
  		</div>

  		<label for="login">Login</label>
  		<div class="input-group">
  		    <div class="input-group-prepend">
  		      <div class="input-group-text" id="btnGroupAddon2">. +</div>
  		    </div>
  		    <input type="text" name="login" class="form-control" id="login" placeholder="Ex: " aria-label="Input group example" aria-describedby="btnGroupAddon2" required="required">
  		</div>

  		<label for="mail">Email</label>
  		<div class="input-group">
  		    <div class="input-group-prepend">
  		      <div class="input-group-text" id="btnGroupAddon2"><span style="height: 5px; font-size: 20px; padding: 5px; width: 20px; position: relative; bottom: 15px; right: 5px;"><b> @ </b></span></div>
  		    </div>
  		    <input type="email" name="mail" class="form-control" id="mail" placeholder="Ex: " aria-label="Input group example" aria-describedby="btnGroupAddon2">
  		</div>


  		<label for="mdp">Mot de passe</label>
  		<div class="input-group">
  		    <div class="input-group-prepend">
  		      <div class="input-group-text" id="btnGroupAddon2"><img src="icon/cle.png" width="20px"></div>
  		    </div>
  		    <input type="password" name="mdp" class="form-control" id="mdp" placeholder="********** " aria-label="Input group example" aria-describedby="btnGroupAddon2" required="required">
  		</div>


  		<label for="c-mdp">Confirmez le mot de passe</label>
  		<div class="input-group">
  		    <div class="input-group-prepend">
  		      <div class="input-group-text" id="btnGroupAddon2"><img src="icon/cle.png" width="20px"></div>
  		    </div>
  		    <input type="password" name="c-mdp" class="form-control" id="c-mdp" placeholder=" **********" aria-label="Input group example" aria-describedby="btnGroupAddon2" required="required">
  		</div>

  		<div class="mt-4">
  			<button type="submit" class="btn bg-info form-control" style="background-color: steelblue;">
  				S'incrire
  			</button>
  		</div>

  		<div class="my-2">
  			<div class="row">
  				<div class="col d-inline">
  					<hr>
  				</div>
  				    ou
  				<div class="col d-inline">
  					<hr>
  				</div>
  			</div>
  		</div>
  		
          <div class="text-center text-info">
        <div class="mb-1">
          <i><b>Déja un compte?</b></i>
        </div>
        <a href="index.php"><button type="button" class="btn btn-primary form-control" style="background-color: steelblue;">
          Se connecter
        </button> </a>
      </div>

  	</form>

	<script href="styles/js/bootstrap.js"></script>
	<script href="styles/js/bootstrap.bundle.js"></script>
	<script href="styles/js/jquery-3.4.1.js"></script>
</body>
</html>


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
    <?php }
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
      <?php   header("location: accueil_home.php");
        }
      }

    }
    else
    { ?>
      <script type="text/javascript">alert('Vos mots de passe ne correspondent pas');</script>
    <?php }

  }


 ?>
