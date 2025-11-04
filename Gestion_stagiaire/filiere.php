<!doctype html>
<html lang=fr>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="styles/css/bootstrap.css">
    <link rel="stylesheet" href="styles/css/stylepro.css">
    <title>Liste de toutes les filieres</title>
</head>
<body>
	<?php 
		include_once('menu.php');
	 ?>
	 <div class="alert alert-success mt-2  p-1" role="alert">
		  <h4 class="alert-heading" align="center">Filières d'enseignement professionnel</h4>
		  <hr>
	 </div>
	 


	 <div>
	 	<table class="table table-hover table-striped">
	 		<tr>
	 			<th>Numero</th>
	 			<th>Filiere</th>
	 			<th></th>
	 			<th>Niveau</th>
	 			<th>Actions</th>
	 		</tr>
		 	<?php 
		 		$i=1;
		 		require_once('inclu/connexion.php');
		 		$requete=$bdd->query("SELECT libelle_filiere, id_filiere, libelle_niveau FROM filiere AS a , niveau AS b WHERE b.id_niveau = a.id_niveau ORDER BY libelle_niveau");
		 		while($resultat=$requete->fetch())
		 		{ 
		 		  ?>
		 			<tr>
		 				<td><?php echo $i; ?></td>
		 				<td><?php echo $resultat['libelle_filiere'];  ?>
		 				<td><?php echo '<b> '.$resultat['id_filiere'].' </b>'; ?></td>
		 				<td><?php echo $resultat['libelle_niveau']; ?></td>
		 				<td>
		 					<form class="d-inline">
		 						<a href="#"><input type="submit" name="modifier" value="Modifier" class="btn-form-action"></a>
		 					</form>
		 					<form class="d-inline">
		 						<input type="submit" name="supprimer" value="Supprimer" class="btn-suppr btn-form-action">
		 					</form>
		 				</td>
		 			</tr>

		 		<?php
		 			 $i++;
		 			 } ?>

	  	</table>
	  	<hr>
	 </div>



	<script src="styles/js/jquery-3.4.1.js"></script>
	<script src="styles/js/bootstrap.js"></script>
</body>
</html>