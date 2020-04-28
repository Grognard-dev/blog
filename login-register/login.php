<?php

require_once "../boot.php";

$db = new Database($config["utilisateur"],$config["mdp"], $config["dsn"]);

if (isset($_POST['bouton'])){
    $pseudo = empty($_POST['pseudo']) ? null : $_POST['pseudo'];
    $mdp = empty($_POST['mdp']) ? null : $_POST['mdp'];
    
    if ($pseudo === null || $mdp === null) {
        echo 'Veuillez remplir tous les champs';
    }else {
       
        $usertable = new UserTable($db);
        $utilisateur = $usertable->recupParPseudo($pseudo);
        $actif = $utilisateur->actif;
        if($utilisateur === null){
            $erreur =  "login et / ou mot de passe incorrect";
        }
        
        if(!password_verify($mdp, $utilisateur->mdp ?? '')) {
            $erreur =  "login et / ou mot de passe incorrect";
        }
        if($actif == '0')
        {
            $erreur = "compte non actif";
        }
        if( $erreur === null ){
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
            header('Location: https://lefevre.simplon-charleville.fr/projet_blog/login-register/register.php');
            exit();
        }
    }
}
require 'vues/login.html';
