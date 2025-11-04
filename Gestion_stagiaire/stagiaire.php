<!doctype html>
<html lang=fr>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="styles/css/bootstrap.css">
    <title>Liste de tous les stagiaires et absolument tout</title>
    <style type="text/css">
    	.table-hoverr tbody tr:hover {
		  color: #212529;
		  background-color: rgba(0, 0, 0, 0.121);
		  transition: 1s ease;
		}
    </style>
</head>
<body>
	<?php include_once('menu.php'); ?>
	 <div class="alert alert-success mt-2 p-1"  role="alert">
	 	<h4 class="alert-heading" align="center">Stagiaires rigoureusement inscrits </h4>
	 	<hr>
	 </div>
<!--Liste des stagiaires et absolument tous les stagiaires avec tous les détails possibles-->
	 <div>
	 	<table class="table table-hoverr table-striped">
	 		<tr>
	 			<th>Numéro</th>
	 			<th>Matricule</th>
	 			<th>Nom</th>
	 			<th>Prénom</th>
	 			<th>Date de naissance</th>
	 			<th>Filière</th> 
	 			<th>Photo</th>			
	 		</tr>

	 		<?php 
	 			require_once('inclu/connexion.php');
	 			$requete=$bdd->query("SELECT id_stagiaire, UPPER(nom) AS nom, prenom, id_filiere, date_nais, photo FROM stagiaire");
	 			$i=0;
	 			while ($resultat=$requete->fetch()) 
	 			{ $i++;

	 		?>

	 		<tr>
	 			<td><?php echo $i; ?></td>
	 			<td><?php echo $resultat['id_stagiaire']; ?></td>
	 			<td><?php echo $resultat['nom']; ?></td>
	 			<td><?php echo $resultat['prenom']; ?></td>
	 			<td><?php echo $resultat['date_nais']; ?></td>
	 			<td><?php echo $resultat['id_filiere']; ?></td>
	 			<td><?php echo '<img src='.$resultat['photo'].' width=150px class="rounded-circle" alt="Photo etudiant">';?></td>
	 		</tr>

	 		<?php }?>
	 	</table>
	 </div>
<!--Fin liste des stagiaires-->


	<div class="text-right fixed-bottom"><a href="#top">Haut de la page</a></div>
	
	<script src="styles/js/jquery-3.4.1.js"></script>
	<script src="styles/js/bootstrap.js"></script>
</body>
</html>
