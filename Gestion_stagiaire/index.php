<?php 
session_start();  
if (isset($_POST['login']) AND !empty($_POST['login'])) 
{
 $_SESSION['pseudo']=$_POST['login'];
 $_SESSION['password']=$_POST['password'];
}
?>

<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		html,body {
		  height: 100%;
		}

		body {
		  display: -ms-flexbox;
		  display: flex;
		  -ms-flex-align: center;
		  align-items: center;
		  padding-top: 40px;
		  padding-bottom: 40px;
		  background-color: #f5f5f5;
		}

		.form-signin {
		  width: 100%;
		  max-width: 330px;
		  padding: 15px;
		  margin: auto;
		}
		.form-signin .checkbox {
		  font-weight: 400;
		}
		.form-signin .form-control {
		  position: relative;
		  box-sizing: border-box;
		  height: auto;
		  padding: 10px;
		  font-size: 16px;
		}
		.form-signin .form-control:focus {
		  z-index: 2;
		}
		.form-signin input[type="email"] {
		  margin-bottom: -1px;
		  border-bottom-right-radius: 0;
		  border-bottom-left-radius: 0;
		}
		.form-signin input[type="password"] {
		  margin-bottom: 10px;
		  border-top-left-radius: 0;
		  border-top-right-radius: 0;
		}
		.text-decoration-none {
		  text-decoration: none !important;
		}
	</style>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="styles/css/bootstrap.css">
	<title>Connexion au site</title>
</head>
<body class="">
    <form class="form-signin" method="POST" action="">
     
      <h1 class="text-center h3 mb-3 font-weight-normal">Connectez-vous</h1>
      <label for="inputEmail" class="text-left mt-2 pl-2">Login</label>
      <input type="text" id="inputEmail" name="login" class="form-control" placeholder="Login" required autofocus>
      <label for="inputPassword" class="text-left mt-2 pl-2">Mot de passe</label>
      <input type="password" id="inputPassword" name="password" class=" form-control" placeholder="Mot de passe" required>
      <div class="checkbox mb-3 text-center">
        
          <input type="checkbox" value="remember-me"> Se souvenir de moi
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Connexion</button>

      <p class="mt-4 text-justify">Pas de compte? <i> <a href="inscription.php"  class="text-decoration-none">Inscrivez-vous ici </a></i></p>
      <p class="mt-5 mb-3 text-muted text-center">&copy; 2018-2019</p>
    </form>

	<script src="styles/js/jquery-3.4.1.js"></script>
	<script src="styles/js/bootstrap.js"></script>
	<script src="styles/js/bootstrap.bundle.min.js"></script>
</body>
</html>

 <?php 
 	require_once('inclu/connexion.php');

 	if (isset($_POST['login']) AND !empty($_POST['login']) AND isset($_POST['password']) AND !empty($_POST['password']) ) 
 	{
 		$requete=$bdd->prepare('SELECT count(id_user) as nbr, login, mot_de_passe 
 								FROM user
 								WHERE login=:lg AND mot_de_passe=:mp'
 							);
 		$requete->execute(array('lg'=>$_POST['login'], 'mp'=>$_POST['password']));

 		while ($control=$requete->fetch())
 		{ 
 			if($control['nbr']<1 )
 				 //echo "<script type=\"text/javascript\">alert('Erreur, vous n'avez pas de compte!  Veuillez-vous incrire svp!'); </script>";
 				//echo "Erreur, vous n'avez pas de compte! <br> Veuillez-vous incrire svp! ";
 				{?>
 					<script type="text/javascript">alert('Erreur, vous n\'avez pas de compte!  Veuillez-vous incrire svp!'); </script>
 			<?php }

 			elseif($control['nbr']>1)
 				{?>
 				 <script type="text/javascript">alert('Erreur! Duplication de compte. Veuillez contacter l\'administrateur'); </script>;
 				 <?php }
 			elseif ($control['nbr']==1) 
 			{
 				//<script type="text/javascript">alert('Erreur! Votre mot de passe ou votre login est incorrecte.'); </script>;
 				 header('location: accueil_home.php');
			}
			
 		}
 	}


 ?>