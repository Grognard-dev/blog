<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="img/fav.png">
	<!-- Author Meta -->
	<meta name="author" content="colorlib">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>Magazine</title>
	<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
	<!--
	CSS
	============================================= -->
	<link rel="stylesheet" href="css/linearicons.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/magnific-popup.css">
	<link rel="stylesheet" href="css/nice-select.css">
	<link rel="stylesheet" href="css/animate.min.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/jquery-ui.css">
	<link rel="stylesheet" href="css/main.css">
	
</head>
<body>
	<header>
		
		<div class="header-top">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6 col-6 header-top-left no-padding">
						<ul>
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
							<li><a href="#"><i class="fa fa-behance"></i></a></li>
						</ul>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-6 header-top-right no-padding">
						<ul>
							<li><a href="tel:+440 012 3654 896"><span class="lnr lnr-phone-handset"></span><span>+440 012 3654 896</span></a></li>
							<li><a href="mailto:support@colorlib.com"><span class="lnr lnr-envelope"></span><span>support@colorlib.com</span></a></li>
							<?php if(isset($_SESSION["is_admin"]) && $_SESSION["is_admin"]):?>
							<li>
								<a class="lnr lnr-envelope" href="insertion_articles.php">insérer article
									
								</a>
							</li>
							<li>
								<a href="admin.php">panneaux admin
									
								</a>
							</li>
							<?php endif?>
							<?php if(isset($_SESSION['Pseudo'])): ?>
							<form method="POST" action="logout.php" >
								<li><button>Deconnexion</button></li>
							</form>
							<li><a  href="compte_user.php?ID=<?=$_SESSION["ID"]?>">votre compte</a></li>
							<li><a  href="editer_utilisateur.php?ID=<?=$_SESSION["ID"]?>">modifier compte</a></li>
							<?php else:?>
							
							<li><a href="login.php"><span class="lnr lnr-envelope"></span><span>login</span></a></li>
							<li><a href="register.php"><span class="lnr lnr-envelope"></span><span>register</span></a></li>
							<?php endif ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="logo-wrap">
			<div class="container">
				<div class="row justify-content-between align-items-center">
					<div class="col-lg-4 col-md-4 col-sm-12 logo-left no-padding">
						<a href="index.html">
							<img class="img-fluid" src="img/logo.png" alt="">
						</a>
					</div>
					<div class="col-lg-8 col-md-8 col-sm-12 logo-right no-padding ads-banner">
						<img class="img-fluid" src="img/banner-ad.jpg" alt="">
					</div>
				</div>
			</div>
		</div>
		<div class="container main-menu" id="main-menu">
			<div class="row align-items-center justify-content-between">
				<nav id="nav-menu-container">
					<ul class="nav-menu">
						<li class="menu-active"><a href="index.html">Home</a></li>
						<li><a href="archive.html">Archive</a></li>
						<li><a href="category.html">Category</a></li>
						<li class="menu-has-children"><a href="">Post Types</a>
							<ul>
								<li><a href="standard-post.html">Standard Post</a></li>
								<li><a href="image-post.html">Image Post</a></li>
								<li><a href="gallery-post.html">Gallery Post</a></li>
								<li><a href="video-post.html">Video Post</a></li>
								<li><a href="audio-post.html">Audio Post</a></li>
							</ul>
						</li>
						<li><a href="about.html">About</a></li>
						<li><a href="contact.html">Contact</a></li>
					</ul>
				</nav><!-- #nav-menu-container -->
				<div class="navbar-right">
					<form class="Search">
						<input type="text" class="form-control Search-box" name="Search-box" id="Search-box" placeholder="Search">
						<label for="Search-box" class="Search-box-label">
							<span class="lnr lnr-magnifier"></span>
						</label>
						<span class="Search-close">
							<span class="lnr lnr-cross"></span>
						</span>
					</form>
				</div>
			</div>
		</div>
	</header>
	
	<div class="site-main-container">
		
		<!-- Start latest-post Area -->
		<section class="latest-post-area pb-120">
			<div class="container no-padding">
				<div class="row">
					<div class="col-lg-8 post-list">
						<!-- Start latest-post Area -->
						<div class="latest-post-wrap">
							<h4 class="cat-title">Latest News</h4>
							<?php foreach($article as $articles):?>
							<div class="single-latest-post row align-items-center">
								<div class="col-lg-5 post-left">
									<div class="feature-img relative">
										<div class="overlay overlay-bg"></div>
										<img class="img-fluid" src="photoarticles/.<?= $articles->photo_card?>" alt="">
									</div>
								</div>
								
								<div class="col-lg-7 post-right">
									<a href="fiche_article.php?ID=<?=$articles->id_article?>">
										<h4><?= $articles->nom_article?></h4>
									</a>
									<ul class="meta">
										<li><a href="#"><span class="lnr lnr-user"></span><?= e($utilisateur[$articles->id_utilisateur]->pseudo)?></a></li>
										<li><a href="#"><span class="lnr lnr-calendar-full"></span><?= date('l j F Y,H:i',strtotime($articles->date_de_parution))?></a></li>
										<li><a href="#"><span class="lnr lnr-bubble"></span>06 Comments</a></li>
									</ul>
									<p class="excert">
										<?= $articles->text_card?>
									</p>
									<?php if(isset($_SESSION["is_admin"]) && $_SESSION["is_admin"]):?>
									<a href="editer_articles.php?ID=<?=$articles->id_article?>">
										<span>modifier</span>
									</a>
									<?php endif ?>
									
								</div>
							</div>
							<?php endforeach ?>
					<!-- End latest-post Area -->
						</div>
					</div>
				</div>
					
			</div>
		</section>
	</div>
					
						
<!-- start footer Area -->
<footer class="footer-area section-gap">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-6 single-footer-widget">
				<h4>Top Products</h4>
				<ul>
					<li><a href="#">Managed Website</a></li>
					<li><a href="#">Manage Reputation</a></li>
					<li><a href="#">Power Tools</a></li>
					<li><a href="#">Marketing Service</a></li>
				</ul>
			</div>
			<div class="col-lg-2 col-md-6 single-footer-widget">
				<h4>Quick Links</h4>
				<ul>
					<li><a href="#">Jobs</a></li>
					<li><a href="#">Brand Assets</a></li>
					<li><a href="#">Investor Relations</a></li>
					<li><a href="#">Terms of Service</a></li>
				</ul>
			</div>
			<div class="col-lg-2 col-md-6 single-footer-widget">
				<h4>Features</h4>
				<ul>
					<li><a href="#">Jobs</a></li>
					<li><a href="#">Brand Assets</a></li>
					<li><a href="#">Investor Relations</a></li>
					<li><a href="#">Terms of Service</a></li>
				</ul>
			</div>
			<div class="col-lg-2 col-md-6 single-footer-widget">
				<h4>Resources</h4>
				<ul>
					<li><a href="#">Guides</a></li>
					<li><a href="#">Research</a></li>
					<li><a href="#">Experts</a></li>
					<li><a href="#">Agencies</a></li>
				</ul>
			</div>
			<div class="col-lg-3 col-md-6 single-footer-widget">
				<h4>Instragram Feed</h4>
				<ul class="instafeed d-flex flex-wrap">
					<li><img src="img/i1.jpg" alt=""></li>
					<li><img src="img/i2.jpg" alt=""></li>
					<li><img src="img/i3.jpg" alt=""></li>
					<li><img src="img/i4.jpg" alt=""></li>
					<li><img src="img/i5.jpg" alt=""></li>
					<li><img src="img/i6.jpg" alt=""></li>
					<li><img src="img/i7.jpg" alt=""></li>
					<li><img src="img/i8.jpg" alt=""></li>
				</ul>
			</div>
		</div>
		<div class="footer-bottom row align-items-center">
			<p class="footer-text m-0 col-lg-8 col-md-12"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
				Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
				<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
			<div class="col-lg-4 col-md-12 footer-social">
				<a href="#"><i class="fa fa-facebook"></i></a>
				<a href="#"><i class="fa fa-twitter"></i></a>
				<a href="#"><i class="fa fa-dribbble"></i></a>
				<a href="#"><i class="fa fa-behance"></i></a>
			</div>
		</div>
	</footer>
	<!-- End footer Area -->
	<script src="js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
	<script src="js/easing.min.js"></script>
	<script src="js/hoverIntent.js"></script>
	<script src="js/superfish.min.js"></script>
	<script src="js/jquery.ajaxchimp.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/mn-accordion.js"></script>
	<script src="js/jquery-ui.js"></script>
	<script src="js/jquery.nice-select.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/mail-script.js"></script>
	<script src="js/main.js"></script>
</body>
</html>