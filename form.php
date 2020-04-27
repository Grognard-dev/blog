<?php

require_once "boot.php";

$db = new Database($config["utilisateur"],$config["mdp"], $config["dsn"]);

$userTable = new UserTable($db);


if (isset($_POST['bouton'])){
    $pseudo_user = empty($_POST['pseudo_user']) ? null : $_POST['pseudo_user'];
    $nom_user = empty($_POST['nom_user']) ? null : $_POST['nom_user'];
    $prenom_user = empty($_POST['prenom_user']) ? null : $_POST['prenom_user'];
    $email_user= empty($_POST['email_user']) ? null : $_POST['email_user'];
    $password_user = empty($_POST['password_user']) ? null : $_POST['password_user'];
    
    if ($pseudo_user === null || $nom_user === null || $prenom_user === null || $email_user === null || $password_user === null) {
        $erreur = 'Veuillez remplir tous les champs';
    }else {
        $token_utilisateur = md5(microtime(TRUE)*100000);

        $user = new User();
        $user->nom = $nom_user;
        $user->prenom =  $prenom_user;
        $user->mot_de_passe =  $password_user;
        $user->pseudo = $pseudo_user;
        $user->email = $email_user;
        $user->token_utilisateur = $token_utilisateur;
        $userTable->insertUser($user);

        $destinataire = $user->email;
        $sujet = "Activer votre compte" ;
        $entete = "From: Contact@lefevre.simplon-charleville.fr" ;
        
        
        $message = 'Bienvenue sur blog,
        
        Pour activer votre compte, veuillez cliquer sur le lien ci-dessous
        ou copier/coller dans votre navigateur Internet.
      http://lefevre.simplon-charleville.fr/projet_blog/activation.php?Pseudo='.urlencode($user->pseudo).'&token_utilisateur='.urlencode($token_utilisateur).'
        
        
        ---------------
        Ceci est un mail automatique, Merci de ne pas y répondre.';
        
        
        mail($destinataire, $sujet, $message, $entete) ;

        header('Location: /projet_blog/login.php');
        die;   
    }
}
?> 
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Au Register Forms by Colorlib</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Inscription</h2>
                    <form method="POST">
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Nom" name="nom_user">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Prenom" name="prenom_user">
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Pseudo" name="pseudo_user">
                        </div>
                         <div class="input-group">
                            <input class="input--style-1" type="password" placeholder="mot de passe" name="password_user">
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1 js-datepicker" type="text" placeholder="Date de naissance" name="birthday">
                                    <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                                </div>
                            </div>
                        </div>
                         <div class="input-group">
                            <input class="input--style-1" type="email" placeholder="Email" name="email_user">
                        </div>
                        </div>
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit" name="bouton" >envoyer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
