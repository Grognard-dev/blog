<?php
require_once "boot.php";

$db = new Database($config["utilisateur"],$config["mdp"], $config["dsn"]);

$userTable = new UserTable($db);

$user = $userTable->recupParId($_SESSION['ID']);

require 'vue/user_compte.php';