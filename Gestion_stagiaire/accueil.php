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
 				 echo "<p alert('duplication')>Duplication</p>";

 			elseif ($control['nbr']==1) 
 			{
 				 //require_once('../accueil.php');
 			?>




	<!doctype html>
	<html lang=fr>
	<head>
	    <meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	    <link rel="stylesheet" href="styles/css/bootstrap.css">
	    <style type="text/css">
	    	#resultat .liste {
	    		max-height: 10px;
	    	}
	    	#resultat .liste a {
	    		text-decoration: none;
				background-color: white
	    		color: #f5f5f5;
	    	}
	    	
	    	#resultat  .liste a:hover {
				text-decoration: none;
				color: white;
			}
	    </style>
	    <title>Acccueil</title>
	</head>
	<body>
		<?php 

		include_once("menu.php"); ?>

		<div class="alert alert-success mt-2" role="alert">
		  <h4 class="alert-heading" align="center">Recherche de stagiaire</h4>
		  <hr>

			<nav class="navbar navbar-expand-lg navbar-expand-md navbar-light bg-light">
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>

			  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			  	  
			  	<?php 
				  require_once('inclu/connexion.php');
				  $requete=$bdd->prepare('SELECT DISTINCT id_filiere FROM filiere');
				  $requete->execute();
				   ?>
				  <form method="POST" action="traitement/liste_stagiaire.php">
				    <select name="filiere" id="filiere" style=" height: 36px; border-radius: 4px; position: relative; top:2px;">
				      <option value="1">Toutes les filières</option>
				      <?php while($donnee=$requete->fetch()) {
				       ?>
				       <option> <?php echo $donnee['id_filiere']; ?> </option>
				       <?php }?> 
				    </select>
				    <button type="submit" value="Envoyer" class="btn btn-outline-success">Consulter</button>
				  </form>



			      <ul class="navbar-nav mr-auto">
				     <li class="nav-item mx-4">
					     <!-- <form class="form-inline my-2 my-lg-0" method="POST" action="traitement/traiRechercher_stagiaire.php">
						     <input class="form-control mr-sm-2" type="search" name="mot_cle" placeholder="Tapez un mot clé" aria-label="Recherche_rapide">
						     <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
					      </form>-->

					    <form class="form-inline my-2 my-lg-0" method="POST" action="">
									<input class="form-control mr-sm-2" type="search" name="search" id="search" placeholder="Tapez un mot clé" aria-label="Recherche_rapide" autofocus="autofocus">
						</form> 

						<div id="resultat" style="position: absolute; top: 50px; color: white; background-color: black; border: 1px solid blue; min-width: 215px; border-radius: 5px;">
							<article class="liste">
								
							</article>						
						</div>

				  	 </li>
				     <li class="nav-item">
				        <a class="nav-link " href="nouveau_stagiaire.php">Nouveau stagiaire</a>
				     </li>
			      </ul>
			    
			  </div>
			</nav>
		</div>


		<script src="styles/js/jquery-3.4.1.js"></script>
		<script src="func.js"></script>
		<script src="styles/js/bootstrap.js"></script>
		<script src="styles/js/bootstrap.bundle.min.js"></script>
	</body>
	</html>








<?php 
	}
 		}
 	}


 ?>