<?php 
require_once "boot.php";

$db = new Database($config["utilisateur"],$config["mdp"], $config["dsn"]);

$articlesTable = new ArticlesTable($db);

$article = $articlesTable->recupTousArticles();

$utilisateurTable = new UserTable($db);
$utilisateur = $utilisateurTable->recupTousUtilisateur();
$commentaireTable = new CommentaireTable($db);


require 'vue/index.php';