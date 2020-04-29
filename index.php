<?php 
require_once "boot.php";

$dbh = new PDO($config["dsn"], $config["utilisateur"], $config["mdp"]);

$articlesTable = new ArticlesTable($db);

$liste = $dbh->prepare("SELECT * FROM blog_articles");
$liste->execute();
$article = $liste->fetchAll();

require 'vue/index.php';