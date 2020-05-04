<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <h1 class="shadow bg-center focus:shadow-outline focus:outline-none text-black font-bold py-2 px-4 rounded m-4 text-5xl">Liste du contenue</h1>
    <br>
<ul class="flex ">
    <li  class="flex-initial" ><a class=" shadow bg-red-300 hover:bg-red-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded m-4" href="liste_article.php?ID=<?=$_SESSION['ID']?>">Liste des articles</a></li>
     <li  class="flex-initial" ><a class=" shadow bg-red-300 hover:bg-red-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded m-4" href="archive.php?ID=<?=$_SESSION['ID']?>">Liste des archives</a></li>
</ul>
<H2 class="shadow bg-center focus:shadow-outline focus:outline-none text-black font-bold py-2 px-4 rounded m-4 text-64 w-32">Liste user</H2>
<br>
<ul class="flex ">
    <li><a class=" shadow bg-blue-300 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded m-4" href="liste_utilisateur.php?ID=<?=$_SESSION['ID']?>">liste des users</a></li>
<li>
<a class=" shadow bg-purple-300 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded m-4" href="index.php?ID=<?=$_SESSION['ID']?>">Retourner a l'accueil</a>
</li>
</ul>
</body>
</html>





