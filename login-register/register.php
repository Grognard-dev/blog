<?php

require_once "../boot.php";

$db = new Database($config["utilisateur"],$config["mdp"], $config["dsn"]);

$userTable = new UserTable($db);


if (isset($_POST['bouton'])){
    $pseudo = empty($_POST['pseudo']) ? null : $_POST['pseudo'];
    $nom = empty($_POST['nom']) ? null : $_POST['nom'];
    $prenom = empty($_POST['prenom']) ? null : $_POST['prenom'];
    $email= empty($_POST['email']) ? null : $_POST['email'];
    $mdp = empty($_POST['mdp']) ? null : $_POST['mdp'];
    
    if ($pseudo === null || $nom === null || $prenom === null || $email === null || $mdp === null) {
        $erreur = 'Veuillez remplir tous les champs';
    }else {
        $token = md5(microtime(TRUE)*100000);

        $user = new User();
        $user->nom = $nom;
        $user->prenom =  $prenom;
        $user->mdp =  $mdp;
        $user->pseudo = $pseudo;
        $user->email = $email;
        $user->token = $token;
        $userTable->insertUser($user);

        $destinataire = $user->email;
        $sujet = "Activer votre compte" ;
        $entete = "From: Contact@lefevre.simplon-charleville.fr" ;
        
        
        $message = 'Bienvenue sur Poo connexion,
        
        Pour activer votre compte, veuillez cliquer sur le lien ci-dessous
        ou copier/coller dans votre navigateur Internet.
      http://lefevre.simplon-charleville.fr/projet_blog/login-register/activation.php?pseudo='.urlencode($user->pseudo).'&token='.urlencode($token).'
        
        
        ---------------
        Ceci est un mail automatique, Merci de ne pas y répondre.';
        
        
        mail($destinataire, $sujet, $message, $entete) ;

        header('Location: login.php');
        die;   
    }
}
require 'vues/register.html';