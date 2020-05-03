<?php
require "boot.php";
require "securite.php";

$db = new Database($config["utilisateur"],$config["mdp"], $config["dsn"]);

$ArticleTable = new ArticlesTable($db);

$Articles = $ArticleTable->recupTousArticles();

if(isset($_POST['delete_article'])){
  $ArticleTable->deleteArticle($_POST['delete_article']);
    $_SESSION['flash'] = "Suppression effectuée";
        header('Location: liste_article.php?ID='.$_SESSION['ID']);
        die;
}

require "vue/liste_article.php";
