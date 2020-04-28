<?php require 'vue/insertion_articles.php'; ?>

<?php



$db = new Database($config["utilisateur"],$config["mdp"], $config["dsn"]);

$articleTable = new ArticlesTable($db);


if (isset($_POST['bouton'])){
    $nom = empty($_POST['nom']) ? null : $_POST['nom'];
    $date_de_parution = empty($_POST['date_de_parution']) ? null : $_POST['date_de_parution'];
    $text_card= empty($_POST['text_card']) ? null : $_POST['text_card'];
    
    if ($nom === null || $date_de_parution === null  || $text_card === null) {
        $erreur = 'Veuillez remplir tous les champs';
    }else {

        $article = new Articles();
        $article->nom = $nom;
        $article->date_de_parution =  $date_de_parution;
        $article->text_card = $text_card;
        $articleTable->insertArticles($article);

$ID = $db->lastInsertId();

        if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK)
{  
    if ($_FILES['photo']['size'] <= 250000)
    {  
        $chemin =  'photoarticles/' . $_FILES['photo']['name'];
        move_uploaded_file($_FILES['photo']['tmp_name'], 'photoarticles/' . $_FILES['photo']['name']);
         if($_FILES['photo']['type'] === 'image/jpeg'){
                        $image = @imagecreatefromjpeg($chemin);
                    }elseif($_FILES['photo']['type'] === 'image/png'){
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
                    if($_FILES['photo']['type'] === 'image/jpeg'){
                        imagejpeg($return_image,$chemin);
                    }elseif($_FILES['photo']['type'] === 'image/png'){
                        imagepng($return_image,$chemin);
                    }
        $requete = $db->prepareAndExecute("UPDATE blog_articles SET photo_card = :photo_card WHERE id_utilisateur = :ID ",[':ID' => $ID, ':photo_card' => $_FILES['photo']['name']]);

    }else{  
        $erreur = "un problème de téléchargement est survenu !!";
    }
}
        header('location: login.php');
        die;
    }
}

