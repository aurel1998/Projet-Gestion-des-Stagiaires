<!doctype html>
	<html lang=fr>
	<head>
	    <meta charset="UTF-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	    <link rel="stylesheet" href="styles/css/bootstrap.css">
	    <link rel="stylesheet" href="styles/css/stylepro.css">
	    <title>Acccueil</title>
	</head>
	<body>
		<?php 
		require_once('inclu/connexion.php');
		include_once("menu.php"); ?>

		<div class="alert alert-success mt-2  p-1" role="alert">
		  <h4 class="alert-heading" align="center">
		  	Liste des stagiaires
		  	<?php $req=$bdd->query("SELECT COUNT(id_stagiaire) AS nbr_stag, id_stagiaire FROM stagiaire");
				while ($res=$req->fetch()) 
				{
					echo '('.$res['nbr_stag'].' stagiaires)';
				} ?>
		  </h4>
		  <hr>

			<nav class="navbar navbar-expand-lg navbar-expand-md navbar-light bg-light">
			  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  </button>

			  <div class="collapse navbar-collapse" id="navbarSupportedContent">
			  	  
			  	<?php 
			  	//on se charge d'afficher les filières enregistrées dans la base de données
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
					    <form class="form-inline my-2 my-lg-0" method="POST" action="">
									<input class="form-control mr-sm-2" type="search" name="search" id="search" placeholder="Tapez un mot clé" aria-label="Recherche_rapide" autofocus="autofocus">
						</form> 

						<div id="resultat" style="position: absolute; top: 50px; color: white; border: 0; min-width: 215px; border-radius: 5px;">
							<article class="liste collapse">
								
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



<!-- Puisque la recherche doit se faire en tenant compte de certains crietères, on liste dans ce div les stagiaires avec les détails nécéssaires-->
		<div class="m-2">
		 	<table class="table table-hover table-striped">
		 		<tr>
		 			<th>Numéro</th>
		 			<th>Matricule</th>
		 			<th>Nom</th>
		 			<th>Prénom</th>
		 			<th>Filière</th>
		 			<th>Actions</th>		
		 		</tr>

		 		<?php 
		 			$requete=$bdd->query("SELECT id_stagiaire, nom, prenom, id_filiere FROM stagiaire");
		 			$i=0;
		 			while ($resultat=$requete->fetch()) 
		 			{ $i++;

		 		?>

		 		<tr>
		 			<td><?php echo $i; ?></td>
		 			<td><?php echo $resultat['id_stagiaire']; ?></td>
		 			<td><?php echo $resultat['nom']; ?></td>
		 			<td><?php echo $resultat['prenom']; ?></td>
		 			<td><?php echo $resultat['id_filiere']; ?></td>
		 			<td>
	 					<form class="d-inline" method="POST" action="">
	 						<a href="#"><input type="submit" name="modifier" value="Modifier" class="btn-form-action"></a>
	 					</form>
	 					<form class="d-inline" method="POST"  action="traitement/traitSupprimer.php">
	 						&nbsp;&nbsp;&nbsp;
	 						<input type="number" name="mat_suppr" id="mat_suppr" class="form-suppr-input-mat"  value="<?php echo $resultat['id_stagiaire'] ; ?>">
	 						<input type="submit" name="supprimer"  class="btn-suppr btn-form-action" value="Supprimer" data-toggle="tooltip" data-placement="top" title="Attention! L'action est irréversible. Voulez vous vraiment supprimer l'etudiant au matricule <?php echo $resultat['id_stagiaire'] ; ?>">
					</button>
	 					</form>
		 			</td>
		 		</tr>

		 		<?php }?>
		 	</table>
		</div>
<!--Fin liste des stagiaires-->

		<div class="text-right fixed-bottom"><a href="#top">Haut de la page</a></div>


		<script src="styles/js/jquery-3.4.1.js"></script>
		<script src="func.js"></script>
		<script src="styles/js/bootstrap.js"></script>
		<script src="styles/js/bootstrap.bundle.min.js"></script>
	</body>
	</html>

	<?php //J'ai esayé de créer des fonctions pour le comptage du nombre de stagiaire mais ça marche pas!
	 /*
		require_once('inclu/connexion.php');
		function nombre_stagiaire()
		{

			if ($bdd) 
			{
				$req=$bdd->query("SELECT COUNT(id_stagiaire) AS nbr_stag, id_stagiaire FROM stagiaire");
				while ($res=$req->fetch()) 
				{
					echo '<h4>'.$res['nbr_stag'].' stagiaires<h4>';
				}
			 }
		}

		nombre_stagiaire();*/
		require_once('traitement/traitSupprimer.php');

	?>