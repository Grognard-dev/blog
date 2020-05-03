<?php
require "boot.php";
require "securite.php";

$db = new Database($config["utilisateur"],$config["mdp"], $config["dsn"]);

$UsersTable = new UserTable($db);

$Users = $UsersTable->recupTousUtilisateur();

if(isset($_POST['delete_user'])){
  $UsersTable->deleteUser($_POST['delete_user']);
    $_SESSION['flash'] = "Suppression effectuée";
        header('Location: liste_utilisateur.php?ID='.$_SESSION['ID']);
        die;
}

require "vue/liste_utilisateur.php";
