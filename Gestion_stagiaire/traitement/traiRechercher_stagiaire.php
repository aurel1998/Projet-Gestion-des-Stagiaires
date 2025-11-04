<!doctype html>
<html lang=fr>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../styles/css/bootstrap.css">
    <title>Stagiaire recherché selon  un critère</title>
</head>
<body>



	<header>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
		  <a class="navbar-brand" href="../accueil.php">Menu</a>
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





	<?php 
		require_once("../inclu/connexion.php");
		$mot=$_POST['mot_cle'];
		if ($mot !==null) {
			$requete=$bdd->prepare('SELECT * FROM stagiaire WHERE id_stagiaire=:id OR nom=:no OR prenom=:pr');
			$requete->execute(array('id'=> $mot, 'no'=> $mot, 'pr'=> $mot));

			while ($donnee=$requete->fetch()) {
				echo $donnee['nom']. '   '.$donnee['prenom'].'<br>';
			}
		}
	 ?>

	<script src="../styles/js/jquery-3.4.1.js"></script>
	<script src="../styles/js/bootstrap.js"></script>
</body>
</html>