<?php 
include '../inclu/connexion.php'; ?>

<?php 

$req=$bdd->prepare("SELECT DISTINCT id_filiere FROM filiere");
$req->execute();
 ?>
 <form method="POST" action="liste_stagiaire.php">
   <select style="
    font-weight: 400;
    color: #212529;
    text-align: center;
    vertical-align: middle;
    background-color: transparent;
    border: 1px solid #dee2e6;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    line-height: 1.5;
    border-radius: 0.25rem !important;
    transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
  " name="filiere" id="filiere">
   	<option>Toutes les filières</option>
   	<option value="1"></option>
   	<?php 
   	while ($donnee=$req->fetch()) {
   		?>
   		<option value="<?php $donnee ?>"><?php echo $donnee['id_filiere'] ?></option>
   		
   	<?php }
   	?>
   	 
   </select>
 </form>