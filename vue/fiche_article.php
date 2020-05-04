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
            <h2 class="shadow text-gray-900 border-gray-900 .bg-center focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded m-4 max-w-titre">Commentaire</h2>
         <?php foreach($commentaires as $commentaire):?>
<div class="bg-white">
   <?= e($utilisateur[$commentaire->id_utilisateur]->pseudo)?>
    <?= date('l j F Y,H:i',strtotime($commentaire->date))?>
    <br>
   <?= e($commentaire->texte)?>
   <?php if(isset($_SESSION["is_admin"]) && $_SESSION["is_admin"]):?>
     <form method="post">
                <button class=" flex shadow bg-red-400 hover:bg-red-600 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded m-4" type="submit" name="delete_commentaire" value="<?= e($commentaire->id_commentaire)?>">Delete commentaire </button>
            </form>
    <?php endif?>
      <?php if(isset($_SESSION["is_moderateur"]) && $_SESSION["is_moderateur"]):?>
     <form method="post">
                <button class=" flex shadow bg-red-400 hover:bg-red-600 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded m-4" type="submit" name="delete_commentaire" value="<?= e($commentaire->id_commentaire)?>">Delete commentaire </button>
            </form>
    <?php endif?>
    
</div>

<?php endforeach ?>
<?php if(isset($_SESSION['Pseudo'])): ?>
            <form  method="post">
                <textarea class="block appearance-none w-1/2 bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline m-4 " rows="6" cols="100" name="commentaire" required></textarea> 
                
                <button name="ajout_commentaire" type="submit" class="shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded m-4">ajout commentaire</button>
            </form>
            <?php endif?>
            
            <a class=" shadow bg-purple-300 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded m-4" href="index.php?ID=<?=$_SESSION['ID']?>">Retourner a l'accueil</a>
            
            
            
        </body>
        </html>