<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
  <style type="text/css">
   html, body {
      height: 100%;
    }
    body {
      display: -ms-flexbox;
      display: flex;
      -ms-flex-align: center;
      align-items: center;
      font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif;
      font-size: 1.1rem;
      font-weight: 400;
      color: #212529;
      background-color: #fff;
    }
    .container 
    {
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
    }

    .btn 
    {
      display: inline-block;
      font-weight: 400;
      color: #212529;
      text-align: center;
      vertical-align: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
      background-color: transparent;
      border: 1px solid transparent;
      padding: 0.375rem 0.75rem;
      font-size: 1.1rem;
      line-height: 1.5;
      border-radius: 0.25rem;
      transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }
    .btn-primary 
    {
      color: #fff;
      background-color: #007bff;
      border-color: #007bff;
    }

    .btn-primary:hover 
    {
      color: #fff;
      background-color: #0069d9;
      border-color: #0062cc;
    }
    label
    {
      width: 200px;
      display: inline-block;
    }
    input
    {
      width: 250px;
      box-sizing: border-box;
      min-height: 40px;
      max-height: 50px;
      border-radius: 5px;
      border:1px solid #d5d5d5;
    }
    table{
      position: relative;
      margin: auto;
    }
    td {
      padding: 8px 0px;
    }
    form {
      margin: auto;
      width: 50rem;

    }
    fieldset{
      border-radius: 5px;
      border:1px solid #9595e9;
    }
  </style>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<title>Inscription</title>
</head>
<body class="container">
    <form method="POST" action="traitement/traiInscrire.php">
      
      <fieldset> 
        <legend> <h1>Inscription</h1> </legend>
          <table>
            <tr>
               <td><label for="inputEmail">Nom</label> </td>
               <td><input type="text" id="inputEmail" name="nom" placeholder="Ex: KOKOU" required autofocus></td>
            </tr>

            <tr>
               <td><label for="login">Login</label> </td>
               <td><input type="text" id="login" name="login" placeholder="Ex: monLog25.za" required></td>

            </tr>

            <tr>
               <td><label>Email</label></td>
               <td><input type="email" name="mail" placeholder="jeanSta15g@yahoo.com"></td>
            </tr>

            <tr>
               <td><label for="inputPassword">Mot de passe</label></td>
               <td><input type="password" id="inputPassword" name="password" placeholder="***************" required></td>
            </tr>

            <tr>        
               <td><label for="confirm-password">Confirmez le mot de passe</label></td>
               <td><input type="password" id="confirm-password" name="password" placeholder="***************" required></td>
            </tr>

            <tr>
              <td></td>
               <td><button class="btn btn-lg btn-primary" type="submit">S'inscrire</button></td>
            </tr>
         </table>
      </fieldset>
      <p class="mt-5 mb-3 text-muted text-center">&copy; 2018-2019</p>
      
    </form>

</body>
</html>