<?php
require "boot.php";
require "securite.php";

$db = new Database($config["utilisateur"],$config["mdp"], $config["dsn"]);

$ArticleTable = new ArticlesTable($db);
$Archives = $ArticleTable->articleArchiver();


if(isset($_POST['delete_article'])){
  $ArticleTable->deleteArticle($_POST['delete_article']);
    $_SESSION['flash'] = "Suppression effectuée";
        header('Location: archive.php?ID='.$_SESSION['ID']);
        die;
}
if(isset($_POST['archiver'])){
  $ArticleTable->desarchiverArticle($_POST['archiver']);
    $_SESSION['flash'] = "Suppression effectuée";
        header('Location: archive.php?ID='.$_SESSION['ID']);
        die;
}

require "vue/archive.php";
