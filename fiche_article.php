<?php
require_once "boot.php";

$db = new Database($config["utilisateur"],$config["mdp"], $config["dsn"]);

$articleTable = new ArticlesTable($db);
$Article = $articleTable->recupParId($_GET['ID']);
$utilisateurTable = new UserTable($db);
$commentaireTable = new CommentaireTable($db);
$utilisateur = $utilisateurTable->recupTousUtilisateur();


 
if(isset($_POST['ajout_commentaire'])){
   
    $texte_commentaire = empty($_POST['commentaire']) ? null : $_POST['commentaire'];
    
    if ($texte_commentaire === null) {
        $erreur = 'Veuillez remplir tous les champs';
    }else {
        $commentaire = new Commentaire();
        $commentaire->texte = $texte_commentaire;
        $commentaire->id_article = $_GET['ID'];
        $commentaire->id_utilisateur = $_SESSION['ID'];
        $commentaire->moderer = 0;
        $commentaireTable->ajoutCommentaire($commentaire);
        header('location: fiche_article.php?ID='.$_GET['ID']);
        die;
    }
}
$commentaires = $commentaireTable->recupCommentairesArticle($_GET['ID']);

if(isset($_POST['delete_commentaire'])){
  $commentaireTable->deleteCommentaire($_POST['delete_commentaire']);
    $_SESSION['flash'] = "Suppression effectuée";
        header('Location: fiche_article.php?ID='.$_GET['ID']);
        die;
}

require "vue/fiche_article.php";