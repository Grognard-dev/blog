<?php 
require_once "boot.php";

$db = new Database($config["utilisateur"],$config["mdp"], $config["dsn"]);

$articlesTable = new ArticlesTable($db);

$article = $articlesTable->recupTousArticles();

require 'vue/index.php';