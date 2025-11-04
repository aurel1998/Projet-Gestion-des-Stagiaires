<!DOCTYPE html>
<html>
<head>
  <style type="text/css">
    #filiere { 
      font-weight: 400;
      color: #212529;
      vertical-align: middle;
      background-color: transparent;
      border: 1px solid #dee2e6;
      padding: 0.375rem 0.75rem;
      font-size: 1rem;
      line-height: 1.5;
      border-radius: 0.25rem !important;
      transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }
  </style>
  <title></title>
</head>
<body>

  <?php 
  require('../inclu/connexion.php');
  $requete=$bdd->prepare('SELECT DISTINCT id_filiere FROM filiere');
  $requete->execute();
   ?>
  <form method="POST" action="liste_stagiaire.php">
    <select name="filiere" id="filiere">
      <option value="1">Toutes les filières</option>
      <?php while($donnee=$requete->fetch()) {
       ?>
       <option> <?php echo $donnee['id_filiere'] ; ?> </option>
       <?php }?> 
    </select>
    <input type="submit" value="envoyer">
  </form>

</body>
</html>


