<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/login.css">
</head>
<body>
  
  <div class="login-page">
    <div class="form">
      <?php if(isset($_SESSION['Pseudo'])): ?>
      <form method="POST" action="logout.php" >
        <button>Deconnexion</button>
      </form>
      <?php else:?>
      <form class="login-form" method="POST" action="">
        <?= $erreur ?>
        <input type="text" name="pseudo" placeholder="pseudo"/>
        <input type="password" name="mdp" placeholder="mot de passe"/>
        
        
        <button name="login">login</button>
        <?php endif ?>
        <p class="message">Not registered? <a href="register.php">Create an account</a></p>
        <a class="message" href="index.php">Retour a l'accueil</a>
      </form>
    </div>
  </div>
</body>
</html>