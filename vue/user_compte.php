<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($user->nom)?></title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <div class="text-center">
    <h1 class="shadow .bg-center focus:shadow-outline focus:outline-none text-black font-bold py-2 px-4 rounded m-4 text-5xl "><?= $user->nom. ' '. $user->prenom?></h1>
    </div>
    <label class="shadow bg-blue-300  focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded m-4"><b>Nom<b></label>
    <div>
        <p class="shadow text-gray-900 border-gray-900 .bg-center focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded m-4 max-w-titre"><?=e($user->nom)?></p>
    </div>
     <label class="shadow bg-blue-300  focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded m-4"><b>Prenom<b></label>
    <div>
        <p class="shadow text-gray-900 border-gray-900 .bg-center focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded m-4 max-w-titre"><?=e($user->prenom)?></p>
    </div>
    <label class="shadow bg-blue-300  focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded m-4"><b>Email<b></label>
    <div>
        <p class="shadow text-gray-900 border-gray-900 .bg-center focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded m-4 max-w-titre"><?=e($user->email)?></p>
    </div>
     <label class="shadow bg-blue-300  focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded m-4"><b>Pseudo<b></label>
    <div>
        <p class="shadow text-gray-900 border-gray-900 .bg-center focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded m-4 max-w-titre"><?=e($user->pseudo)?></p>
    </div>
    <ul>
   <li><a class="shadow bg-green-300  focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded m-4 hover:bg-green-500"  href="editer_utilisateur.php?ID=<?=$_SESSION["ID"]?>">modifier compte</a>
   </li>
    <br>
    <li>
    <a class="shadow bg-red-300  focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded m-4 hover:bg-red-500" href="index.php">Retour a l'accueil</a>
    </li>
    </ul>
</body>
</html>