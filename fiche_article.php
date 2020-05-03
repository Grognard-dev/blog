<?php
require_once "boot.php";
$db = new Database($config["utilisateur"],$config["mdp"], $config["dsn"]);

$articleTable = new ArticlesTable($db);
$Article = $articleTable->recupParId($_GET['ID']);
require "vue/fiche_article.php";