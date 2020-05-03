<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <title><?= $Article->nom_article?></title>
</head>
<body>
    <div class="text-center">
    <h1 class="shadow .bg-center focus:shadow-outline focus:outline-none text-black font-bold py-2 px-4 rounded m-4 text-5xl "><?= $Article->nom_article?></h1>
    </div>
    <div class="flex justify-center">
        <img class="m-4" src="photoarticles/<?=urlencode($Article->photo_card)?>" alt="">
    </div>
    <div class="text-center">
    <label class="shadow .bg-center focus:shadow-outline focus:outline-none text-black font-bold py-2 px-4 rounded m-6 "><b>Date de parution<b></label>
    </div>
    <div class="text-center">
        <p class="m-4"><?=$Article->date_de_parution?></p>
    </div>
    <div class="text-center">
     <label class="shadow text-gray-900 border-gray-900 .bg-center focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded m-4"><b>text de l'article<b></label>
     </div>
    <div class="text-center">
        <p class="m-4"><?=$Article->text_card?></p>
    </div>
    <a class=" shadow bg-purple-300 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded m-4" href="index.php?ID=<?=$_SESSION['ID']?>">Retourner a l'accueil</a>

</body>
</html>