<?php

require_once "boot.php";

$db = new Database($config["utilisateur"],$config["mdp"], $config["dsn"]);

if (isset($_POST['login'])){
    $pseudo = empty($_POST['pseudo']) ? null : $_POST['pseudo'];
    $mdp = empty($_POST['mdp']) ? null : $_POST['mdp'];
    
    if ($pseudo === null || $mdp === null) {
        echo 'Veuillez remplir tous les champs';
    }else {
        
        
        // la fonction prépare et execute son dans la meme fonction, il suffit de la remplir de votre requete et de vos valeurs //
        
        $usertable = new UserTable($db);
        $utilisateur = $usertable->recupParPseudo($pseudo);
        if($utilisateur === null){
            $erreur =  "login et / ou mot de passe incorrect";
        }
        if(!password_verify($mdp, $utilisateur->mdp ?? '')) {
            $erreur =  "login et / ou mot de passe incorrect";
            
        }
        if( $erreur === null){
            if (session_status() === PHP_SESSION_NONE){
                session_start();
            }
            session_regenerate_id();
            $_SESSION["ID"] = $utilisateur->id_utilisateur;
            $_SESSION["Pseudo"] = $utilisateur->pseudo;
            if($utilisateur->admin === 1){
                $_SESSION['is_admin'] = true;
            }else{
                $_SESSION['is_admin'] = false;
            }
            header('Location: index.php');
            exit();
        }
    }
}
require 'vue/login.php';
