<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editer Utilisateur</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <form method="POST" enctype="multipart/form-data">
<h1  class="shadow .bg-center focus:shadow-outline focus:outline-none text-black font-bold py-2 px-4 rounded m-4 text-5xl">Modification de l'user</h1>

<label class="shadow text-gray-900 border-gray-900 .bg-center focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded m-4"><b>Nom </b></label>
<input class="block appearance-none w-48 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline m-4 " type="text" value="<?= e($utilisateur->nom) ?>" name="nom" required> <br>

<label class="shadow text-gray-900 border-gray-900 .bg-center focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded m-4"><b>Prenom</b></label>
<input class="block appearance-none w-48 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline m-4 " type="text" value="<?= e($utilisateur->prenom) ?>" name="prenom" required> <br>

<label class="shadow text-gray-900 border-gray-900 .bg-center focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded m-4"><b>Email<b></label>
<input class="block appearance-none w-48 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline m-4 " type="text" value="<?= e($utilisateur->email) ?>" name="email" required> <br>

<label class="shadow text-gray-900 border-gray-900 .bg-center focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded m-4"><b>Pseudo</b></label>
<br>
<input class="block appearance-none w-48 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline m-4 " type="text" value="<?= e($utilisateur->pseudo) ?>" name="pseudo" required> <br>

<label class="shadow text-gray-900 border-gray-900 .bg-center focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded m-4"><b>Mot de passe</b></label>
<br>
<input class="block appearance-none w-48 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline m-4 " type="password"  name="mdp" required> <br>

<div class="bouton">
<button type="submit" name="bouton" class="shadow bg-purple-300 hover:bg-purple-500 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded m-4" type="submit" name="bouton" class="btn btn-primary mb-2">modifier</button>
</div>
<?php if($erreur != null):?>
  <p><?=e($erreur)?></p>
<?php endif?>

<a  class="shadow bg-purple-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded m-4" href="compte_user.php?ID=<?=$_SESSION["ID"]?>">Retour a votre compte</a>
</form>
  
            <a class="shadow bg-purple-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded m-4" class="message" href="index.php">Retour a l'accueil</a>
            <?php if(isset($_SESSION["is_admin"]) && $_SESSION["is_admin"]):?>
            <a class="message" href="liste_utilisateur.php">Retour liste Utilisateur</a>
            <?php endif?>
</body>
</html>