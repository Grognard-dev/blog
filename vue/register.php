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
    <form class="register-form" method="POST" action="">
      <input type="text" name="nom" placeholder="nom"/>
        <input type="text" name="prenom" placeholder="prenom"/>
          <input type="text" name="pseudo" placeholder="pseudo"/>
      <input type="password" name="mdp" placeholder="mot de passe"/>
      <input type="text" name="email" placeholder="Email"/>
      <button name="bouton">inscription</button>
      <p class="message">Already registered? <a href="login.php">Sign In</a></p>
      <a class="message" href="index.php">Retour a l'accueil</a>
    </form>
  </div>
</div>
</body>
</html>