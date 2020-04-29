<?php
require_once 'boot.php';
$db = new Database($config["utilisateur"],$config["mdp"], $config["dsn"]);

$articleTable = new ArticlesTable($db);


if (isset($_POST['bouton'])){
    $nom_article = empty($_POST['nom_article']) ? null : $_POST['nom_article'];
    $date_de_parution = empty($_POST['date_de_parution']) ? null : $_POST['date_de_parution'];
    $text_card= empty($_POST['text_card']) ? null : $_POST['text_card'];
    
    if ($nom_article === null || $date_de_parution === null  || $text_card === null) {
        $erreur = 'Veuillez remplir tous les champs';
    }else {
        
        $article = new Article();
        $article->nom_article = $nom_article;
        $article->date_de_parution =  $date_de_parution;
        $article->text_card = $text_card;
        $article->id_utilisateur = $_SESSION['ID'];
        $articleTable->insertArticles($article);
        
        
        $ID = $db->lastInsertId();
                
        if (isset($_FILES['photo_card']) && $_FILES['photo_card']['error'] === UPLOAD_ERR_OK)
        {  
            if ($_FILES['photo_card']['size'] <= 250000)
            {  
                $chemin =  'photoarticles/' . $_FILES['photo_card']['name'];
                move_uploaded_file($_FILES['photo_card']['tmp_name'], 'photoarticles/' . $_FILES['photo_card']['name']);
                if($_FILES['photo_card']['type'] === 'image/jpeg'){
                    $image = @imagecreatefromjpeg($chemin);
                }elseif($_FILES['photo_card']['type'] === 'image/png'){
                    $image = @imagecreatefrompng($chemin);
                }else {
                    unlink($chemin);
                    $_SESSION['flash'] = " Pas le bon format d'image, format accepter jpeg,png";
                    header('location: insertion_articles.php');
                    die;
                }
                if($image === false){
                    unlink($chemin);
                    $_SESSION['flash'] = "Erreur de conversion d'image";
                    header('location: insertion_articles.php');
                    die;
                }
                $return_image = imagescale($image,350);
                if($_FILES['photo_card']['type'] === 'image/jpeg'){
                    imagejpeg($return_image,$chemin);
                }elseif($_FILES['photo_card']['type'] === 'image/png'){
                    imagepng($return_image,$chemin);
                }
               
             $articleTable->insertPhoto($ID,$_FILES['photo_card']['name']);
                   
            }else{  
                $erreur = "un problème de téléchargement est survenu !!";
            }
        }
        header('location: insertion_articles.php');
        die;
    }
}
require 'vue/insertion_articles.php';
