
<?php

session_start();
?>

<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">

  <title>Accueil</title>

    <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />

</head>

<body>

  <div class="login-card">
    <h1>Connexion</h1><br>
  <form method="POST" action="connexion.php">
    <input type="text" name="mail" placeholder="Email">
    <input type="password" name="pwd" placeholder="Mot de passe">
    <input type="submit" name="valid" class="login login-submit" value="envoyer">
    <input type="reset" name="reset" value="Reset" />
  </form>

        <div class="login-help">
      <h2>• <a href="enregistrement.html">S'enregistrer</a></h2>
    </div>
  </div>


  </body>
</html>


<?php

if (!isset($_SESSION['compteur']))
	$_SESSION['compteur']=0;
else
	$_SESSION['compteur']++;
echo "La page de connexion a été visitée ".$_SESSION['compteur']." fois <br/>\n";


?>