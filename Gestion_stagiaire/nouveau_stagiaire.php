<!doctype html>
<html lang=fr>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="styles/css/bootstrap.css">
    <title>Ajout d'un nouveau stagiaire dans la base de données</title>
    <style type="text/css">
    	section 
    	{
    		display: flex;
		    -ms-flex-align: center;
		    align-items: center;
		    padding-top: 30px;
		    padding-bottom: 30px;
		    height: 100%;
    	}
    	form
    	{	
		    margin: auto;
			width: 100%;
			width: 450px;
    	}

    	label {
    		margin-left: 0.5rem;
    		display: block;
    		width: 100%;
    		font-size: 1.1rem;
    		font-weight: 450; 
    	}

    	.form-controll {
    	  margin: 7px 0;
		  width: 450px;
		  height: calc(1.5em + 0.75rem + 2px);
		  padding: 0.375rem 0.75rem;
		  font-size: 1rem;
		  font-weight: 400;
		  line-height: 1.5;
		  color: #495057;
		  background-color: #fff;
		  background-clip: padding-box;
		  border: 1px solid #ced4da;
		  border-radius: 0.25rem;
		  transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
		}
		#nom{
			text-transform: uppercase;
		}
		#prenom{
			text-transform: capitalize;
		}
    </style>
</head>
<body>
	<div>
		<?php include_once("menu.php"); ?>
		<div class="alert alert-success mt-2  p-1" role="alert">
		  <h4 class="alert-heading" align="center">
		  	Enregistrer un nouveau stagiaire
		  </h4>
		  <hr>
		<h1 class="h3 text-center mt-2"></h1>

		<form method="POST" class="mt-5 form  mb-5" enctype="multipart/form-data" action="">
			<label for="matricule">Matricule</label>
			<input type="number" name="matricule" id="matricule" class="form-controll" required="required">

			<label for="nom">Nom</label>
			<input type="text" name="nom" id="nom" class="form-controll mr-5" required="required">
			<label for="prenom">Prénom</label>
			<input type="text" name="prenom" id="prenom" class="form-controll" required="required">
			<label for="sexe">Sexe</label>
			<input type="radio" name="sexe" id="sexe" value="M">M
			<input type="radio" name="sexe" id="sexe" value="F">F<br>
			<label for="date_nais" id="date_nais">Date de naissance</label>
			<input type="date" name="date_nais" class="form-controll">
			<label for="filiere" class="mt-4">Filière</label>
			<select name="filiere" id="filiere" class="form-controll" required="required">
				<option></option>
				<?php 

					require_once("inclu/connexion.php");
					$req_list_filiere=$bdd->query('SELECT DISTINCT id_filiere, libelle_filiere, libelle_niveau, a.id_niveau, b.id_niveau
										FROM niveau AS a INNER JOIN filiere AS b 
										ON a.id_niveau=b.id_niveau');

					while($res=$req_list_filiere->fetch())	
					{	//<?php echo $res['libelle_filiere'].'&nbsp;&nbsp;&nbsp;('.$res['libelle_niveau'].')'; >?

					 ?>	

					 <option><?php echo $res['id_filiere']; ?></option>

			  <?php }	
			  $req_list_filiere->closeCursor(); ?>

			</select>
			<label for="photo">Photo</label>
			<input type="file" name="avatar" id="photo" >
			 <div class="mt-4">
				<input type="submit" name="valider" class="btn btn-success px-3">
				<input type="reset" name="annuler" value="Annuler" class="btn btn-danger float-right px-3">
			</div>
		</form>
	</div>
	<div class="text-right fixed-bottom"><a href="#top">Haut de la page</a></div>
	<script src="styles/js/jquery-3.4.1.js"></script>
	<script src="styles/js/bootstrap.js"></script>
</body>
</html>

<?php 



//Enregistrement de l'étudiant dans la base de données 
	/*
	*Pour 
	*
	*/
	if (isset($_POST['matricule']) AND !empty($_POST['matricule']) AND isset($_POST['nom']) AND !empty($_POST['nom']) AND isset($_POST['prenom']) AND !empty($_POST['prenom']) AND isset($_POST['filiere']) AND !empty($_POST['filiere']) ) 
	{
		//Je réfère utiliser des variables pour recueillir les valeurs des données entrées par l'utilisateur
		$mat=$_POST['matricule'];
		$nom=$_POST['nom'];
		$prenom=$_POST['prenom'];
		$filiere=$_POST['filiere'];
		$sexe=$_POST['sexe'];
		$date_nais=$_POST['date_nais'];

		$verif_mat=$bdd->query( 'SELECT COUNT(id_stagiaire) AS nbr, id_stagiaire, nom, prenom, libelle_filiere
								 FROM stagiaire AS a
								 INNER JOIN filiere AS b
								 ON (a.id_filiere=b.id_filiere)
								 WHERE id_stagiaire=\''.$_POST['matricule'].'\'  ');

		while($res=$verif_mat->fetch())
		{
			if($res['nbr']<1)
			{
				if($sexe=="M")
				{
					$req_ins_stag=$bdd->prepare('INSERT INTO stagiaire (id_stagiaire, id_filiere, nom, prenom, civilite, date_nais, photo)
												 VALUES (:mat, :fil, :nom, :pre, :civ, :dat , :pho)');
					$req_ins_stag->execute(array('mat' =>$mat , 
												 'fil' => $filiere, 
												 'nom' => $nom, 
												 'pre' =>$prenom , 
												 'civ' =>$sexe , 
												 'dat' =>$date_nais,
												 'pho' =>'img/garcon.png' ));
				}
				elseif ($sexe=="F") 
				{
					$req_ins_stag=$bdd->prepare('INSERT INTO stagiaire (id_stagiaire, id_filiere, nom, prenom, civilite, date_nais, photo)
												 VALUES (:mat, :fil, :nom, :pre, :civ, :dat, :pho)');
					$req_ins_stag->execute(array('mat' =>$mat , 
												 'fil' => $filiere, 
												 'nom' => $nom, 
												 'pre' =>$prenom , 
												 'civ' =>$sexe , 
												 'dat' =>$date_nais, 
												 'pho' =>'img/fille.jpg'));
				}

				//Peu importe le sexe, on l'ajoute  dans la table inscrire (id_inscription, id_stagiaire, id_filiere, date_inscription)


				$req_ins_inscrire=$bdd->prepare('INSERT INTO inscrire (id_stagiaire, id_filiere, date_inscription) 
												 VALUES (:mat, :fil, CURRENT_TIMESTAMP() ) ');
				$req_ins_inscrire->execute(array('mat' =>$mat , 
												 'fil' => $filiere));


				$req_ins_stag->closeCursor();
				$req_ins_inscrire->closeCursor();


				//Si la photo est renseignée, on met à jour le profil du stagiaire
//******************** ********* ************Concernant le chargement ou la mise à jour de la photo du stagiaire ********** ******* ********* ************ *********
				if (isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])) 
				{
					$tailleMaximale=7500000;
					$extensionValide=array('jpg', 'png', 'jpeg', 'gif');

					if($_FILES['avatar']['size'] <= $tailleMaximale)
					{
						$extensionCharge=strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));

						if (in_array($extensionCharge, $extensionValide)) 
						{
							//$chemin = "img/".$_FILES['avatar']['name'].'.'.$extensionCharge;
							$chemin = "img/".$_FILES['avatar']['name'];
							$resultat=move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);

							if ($resultat) 
							{   
								$req_upd_photo=$bdd->prepare('UPDATE stagiaire SET photo=:pho WHERE id_stagiaire=\''.$_POST['matricule'].'\'   ');
								$req_upd_photo->execute(array('pho'=>'img/'.$_FILES['avatar']['name']));
								echo '<div class="m-5 p-1 text-info">Photo importée avec succès</div>';
								//header('Location: accueil_home.php');
								$req_upd_photo->closeCursor();
							}
							else
							{
								echo '<div class="m-5 p-1 text-secondary">Un problème est survenu lors de l\'importation. Veuillez réessayer svp!</div>';
							}
						}
						else
						{
							echo '<div class="m-5 p-1 text-danger">Les formats autorisés pour les photos de profil sont: JPG, JPEG, GIF et PNG. Merci de réessayer! </div>';
						}
					}
					else
					{
						echo '<div class="m-5 p-1 text-info">Désolé! Vous pouvez pas importer une image de plus de 10Mo</div>';
					}
				}
//Fin chargement de la photo de profil du stagiaire
			}
			else
				echo 'matricule deja occupé'. $_POST['matricule'];
		}

	}

 ?>
