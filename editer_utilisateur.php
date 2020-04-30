<?php 
require_once "boot.php";
$db = new Database($config["utilisateur"],$config["mdp"], $config["dsn"]);

$usertable = new UserTable($db);
$utilisateur = $usertable->recupParId($_SESSION['ID']);


if (isset($_POST['bouton'])){
        $nom = empty($_POST['nom']) ? null : $_POST['nom'];
        $prenom = empty($_POST['prenom']) ? null : $_POST['prenom'];
        $pseudo= empty($_POST['pseudo']) ? null : $_POST['pseudo'];
        $email = empty($_POST['email']) ? null : $_POST['email'];
        $mdp = empty($_POST['mdp']) ? null : $_POST['mdp'];

        $utilisateur->id_utilisateur = $_SESSION['ID'];
        $utilisateur->nom = $nom;
        $utilisateur->prenom =  $prenom;
        $utilisateur->mdp =  $mdp;
        $utilisateur->pseudo = $pseudo;
        $utilisateur->email = $email;
        $usertable->updateUser($utilisateur);
        $_SESSION['flash'] = "Modification effectuer";
            header('Location: editer_utilisateur.php?ID='.$_GET['ID']);
            die;
}
require 'vue/editer_utilisateur.php';