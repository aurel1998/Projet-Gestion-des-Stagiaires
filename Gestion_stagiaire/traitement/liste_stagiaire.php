<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		.table-hoverr tbody tr:hover 
		{
		  color: #212529;
		  background-color: rgba(0, 0, 255, 0.2);
		}
	</style>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../styles/css/bootstrap.css">
	<title></title>
</head>
<body>
	


	<header>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		  <a class="navbar-brand" href="../accueil.php"">Menu</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
		    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
		      <li class="nav-item active">
		        <a class="nav-link" href="../gestion_stagiaire.php">Gestion des stagiaires <span class="sr-only"></span></a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="../stagiaire.php">Stagiaires</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="../filiere.php">Filières</a>
		      </li>
		    </ul>
		    <div class="form-inline my-2 my-lg-0">
		      <button class="btn btn-outline-success my-2 my-sm-0"><a href="../connexion_compte.php">Se connecter</a></button>
		    </div>
		  </div>
		</nav>
	</header>


	
	<div class="alert alert-success mt-2" role="alert">
	  	<h4 class="alert-heading" align="center">Liste des stagiaires</h4>
	  	<hr>
	</div>

	<?php 
		include '../inclu/connexion.php';
		$con=$_POST['filiere'];

		 if ($con==1) 
		 {
		 	$req_stagiaire=$bdd->prepare('SELECT id_stagiaire, a.id_filiere, libelle_filiere , UPPER(nom) as nom, prenom 
		 								FROM stagiaire as a, filiere as b 
		 								WHERE a.id_filiere=b.id_filiere 
		 								ORDER BY id_filiere');
		 	$req_stagiaire->execute(); 
	?>
		 

			<table class="table table-striped table-hoverr">
			 	<legend align="center">Stagiaires de toutes les filières</legend>
			 	<tr>
			 		<th>Matricule </th>
			 		<th>Nom</th>
			 		<th>Prénom</th>
			 		<th>Filière</th>
			 		<th>Libellé filière</th>
			 		
			 	</tr>
			 	
			 	<?php 
			 	while ($ans=$req_stagiaire->fetch()) 
			 		{ 
			 	?>
			 		<tr>
			 			<td><?php echo $ans['id_stagiaire'] ; ?></td>
			 			<td><?php echo $ans['nom'] ; ?></td>
			 			<td><?php echo $ans['prenom'] ; ?></td>
			 			<td><?php echo $ans['id_filiere'] ; ?></td>
			 			<td><?php echo $ans['libelle_filiere'] ; ?></td>
			 			
			 		</tr>
			 	<?php }  ?>
	 		</table>
	 <?php }  ?>

	
	 	
	 
	 	
	
	 <?php 
		if($con!=1)
		{
		 	$req=$bdd->prepare("SELECT id_stagiaire, id_filiere, UPPER(nom) as nom, prenom FROM stagiaire WHERE id_filiere=:fil ");
		 	$req->execute(array('fil'=>$_POST['filiere']));
		 	$req->execute(); 
	?>
		 	<table class="table table-striped table-hoverr">
			 	<legend align="center">Stagiaires en <?php echo $_POST['filiere']; ?></legend>
			 	<tr>
			 		<th>Matricule </th>
			 		<th>Nom</th>
			 		<th>Prénom</th>
			 		<th>Filière</th>
			 		
			 	</tr>
			 	
			 	<?php 
			 	while ($ans=$req->fetch()) 
			 		{ 
			 	?>
			 		<tr>
			 			<td><?php echo $ans['id_stagiaire'] ; ?></td>
			 			<td><?php echo $ans['nom'] ; ?></td>
			 			<td><?php echo $ans['prenom'] ; ?></td>
			 			<td><?php echo $ans['id_filiere'] ; ?></td>
			 			
			 		</tr>
			 	<?php }  ?>
	 		</table>
	 <?php }  ?>


	<script src="../styles/js/jquery-3.4.1.js"></script>
	<script src="../styles/js/bootstrap.js"></script>
	<script src="../styles/js/bootstrap.bundle.min.js"></script>
</body>
</html>


