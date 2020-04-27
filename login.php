<?php

require_once "boot.php";

$db = new Database($config["utilisateur"],$config["mdp"], $config["dsn"]);

if (isset($_POST['bouton'])){
    $pseudo_user = empty($_POST['pseudo_user']) ? null : $_POST['pseudo_user'];
    $password_user = empty($_POST['password_user']) ? null : $_POST['password_user'];
    
    if ($pseudo_user === null || $password_user === null) {
        echo 'Veuillez remplir tous les champs';
    }else {
        
       
// la fonction prépare et execute son dans la meme fonction, il suffit de la remplir de votre requete et de vos valeurs //
       
        $usertable = new UserTable($db);
        $utilisateur = $usertable->recupParPseudo($pseudo_user);
        $actif = $utilisateur->actif;
        if($utilisateur === null){
            $erreur =  "login et / ou mot de passe incorrect";
        }
        
        if(!password_verify($password_user, $utilisateur->mot_de_passe ?? '')) {
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
            $_SESSION["ID"] = $utilisateur->ID_utilisateur;
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


?>
<!DOCTYPE html>
<html>
<head>
<title>Creative Colorlib SignUp Form</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="css/login.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- web font -->
<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
<!-- //web font -->
</head>
<body>
	<!-- main -->
	<div class="main-w3layouts wrapper">
		<h1>Creative SignUp Form</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form action="" method="POST" >
					<input class="text" type="text" name="pseudo_user" placeholder="Username" required="">
					<input class="text" type="password" name="password_user" placeholder="Password" required="">
					<div class="wthree-text">
						<label class="anim">
							<input type="checkbox" class="checkbox" required="">
							<span>I Agree To The Terms & Conditions</span>
						</label>
						<div class="clear"> </div>
					</div>
					<input type="submit" value="SIGNUP" name="bouton">
				</form>
				<p>Don't have an Account? <a href="form.php"> Login Now!</a></p>
			</div>
		</div>
		<!-- copyright -->
		<div class="colorlibcopy-agile">
			<p>© 2018 Colorlib Signup Form. All rights reserved | Design by <a href="https://colorlib.com/" target="_blank">Colorlib</a></p>
		</div>
		<!-- //copyright -->
		<ul class="colorlib-bubbles">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>
	<!-- //main -->
</body>
</html>