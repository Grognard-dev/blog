<?php require_once "boot.php"; ?>
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
        <input type="date" name="date_de_parution" placeholder="date_de_parution"/>
          <input type="text" name="text_card" placeholder="text_card"/>
           <input  type="hidden" name="size" value="250000" />
        <input  type="file" name="photo" size=20000000 />
      <button name="bouton">inscription</button>
      <p class="message">Already registered? <a href="login.php">Sign In</a></p>
    </form>
  </div>
</div>
</body>
</html>