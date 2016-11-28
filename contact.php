<?php
session_start();
if (/*$_SESSION['username']!='etudp13' and $_SESSION['password']!='etud2016'*/false)
{
    echo '<meta http-equiv="refresh" content="0; URL=connexion.php">';
}
	$_SESSION['numglc1'] = 1;
	$_SESSION['numglc2'] = 1;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="Sergey Pozhilov (GetTemplate.com)">
	
	<title>Contactez-nous</title>

	<link rel="shortcut icon" href="assets/images/gt_favicon.png">
	
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="indes_files//bootstrap.min.css">
	<link rel="stylesheet" href="indes_files/font-awesome.min.css">

	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="indes_files/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="indes_files/main.css">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="indes_files/html5shiv.js"></script>
	<script src="indes_files/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	<!-- Fixed navbar -->
		<div class="navbar navbar-inverse navbar-fixed-top headroom" >
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
				<a class="navbar-brand" href="index.php"><img src="assets/images/logo.jpg" alt="Progressus HTML5 template"></a>
			</div>
			
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right">
					<li class="active"><a href="index.php">Accueil</a></li>
					
			<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Matières <span class="caret"></span></a>
              <ul class="dropdown-menu">
			  <li role="separator" class="divider"></li>
                <li class="dropdown-header">UE1</li>
                <li><a href="#">Base de donnée</a></li>
                <li><a href="#">Introduction aux systèmes informatique</a></li>
                <li><a href="#">Réseaux</a></li>
				<li><a href="#">JAVA</a></li>
				<li><a href="#">UML</a></li>
				<li><a href="#">Interfaces Homme Machine</a></li>				
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">UE2</li>
                <li><a href="#">Algébre linéaire</a></li>
                <li><a href="graph.php">Graphes et langages</a></li>
              </ul>
            </li>
					<li><a href="signin.php">Forum</a></li>
					<li><a href="contact.php">Contact</a></li>
					
					<li><a class="btn" href="deconnection.php">Déconnexion</a> </li>
					
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div> 
	<!-- /.navbar -->

	<header id="head" class="secondary"></header>

	<!-- container -->
	<div style= "padding-top:60px;"><div class="container">

	
		<div class="row">
			
			<!-- Article main content -->
			<article class="col-sm-9 maincontent">
				<header class="page-header">
					<h1 class="page-title">Contactez-nous</h1>
				</header>
				
				<p>
					Remplissez le formulaire ci-dessous en indiquant les motifs de votre envoie et nous vous répondrons dès que possible. Merci de nous accorder quelques temps pour répondre.
				</p>
				<br>
					<form action= "envoyercontact.php" method ="POST">
						<div class="row">
							<div class="col-sm-4">
								<input class="form-control" type="text" placeholder="Nom" name ="Nom">
							</div>
							<div class="col-sm-4">
								<input class="form-control" type="email" placeholder="Email" name = "Mail">
							</div>
							<div class="col-sm-4">
								<input class="form-control" type="text" placeholder="Teléphone" name = "Tel">
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-12">
								<textarea name = "Mess" placeholder="Tapez votre message ici..." class="form-control" rows="9"></textarea>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-sm-6">
								
							</div>
							<div class="col-sm-6 text-right">
								<input class="btn btn-info" type="submit" value="Envoyer">
							</div>
						</div>
					</form>

			</article>
			<!-- /Article -->
			
			<!-- Sidebar -->
			<aside class="col-sm-3 sidebar sidebar-right">

				<div class="widget">
					<h4>Adresse</h4>
					<address>
						99 Avenue Jean Baptiste Clément, 93430 Villetaneuse
					</address>
					<h4>Tel de l'administrateur:</h4>
					<address>
						06 27 51 29 96
					</address>
				</div>

			</aside>
			<!-- /Sidebar -->

		</div>
	</div></div>	<!-- /container -->
	
	<section class="container-full top-space">
		<div id="map"></div>
	</section>
<footer id="footer" class="top-space">

		<div class="footer1">
			<div class="container">
				<div class="row">
					
					<div class="col-md-3 widget">
						<h3 class="widget-title">Contact</h3>
						<div class="widget-body">
							<p>06 21 89 15 97<br>
								<a href="mailto:#">anthony.bourasseaumartin.fr</a><br>
								<br>
								
							</p>	
						</div>
					</div>

					<div class="col-md-3 widget">
						<h3 class="widget-title">Ajoute-moi</h3>
						<div class="widget-body">
							<p class="follow-me-icons">
								<a href=""><i class="fa fa-twitter fa-2"></i></a>
								
								<a href=""><i class="fa fa-facebook fa-2"></i></a>
							</p>	
						</div>
					</div>

					<div class="col-md-6 widget">
						<h3 class="widget-title">Copyright</h3>
						<div class="widget-body">
							<p>Ce site a été créé dans l'optique d'aider les étudiants de S2, et ensuite de l'ensemble de l'IUT informatique de l'unniversité Paris XII Villetaneuse.</p>
							<p>C'est ainsi que dans le cadre de notre projet de semestre 3, nous avons le plaisir de vous présenter le résultat de notre travail.</p>
						</div>
					</div>

				</div> <!-- /row of widgets -->
			</div>
		</div>

		<div class="footer2">
			<div class="container">
				<div class="row">
					
					<div class="col-md-6 widget">
						<div class="widget-body">
							<p class="simplenav">
								<a href="index.php">Accueil</a> | 
								<a href="contact.php">Contact</a> |
								<b><a href="deconnection.php">Déconnexion</a>   <i class="fa fa-sign-out"></i></b>
							</p>
						</div>
					</div>

					<div class="col-md-6 widget">
						<div class="widget-body">
							<p class="text-right">
								Copyright &copy; 2015, HAMMADI Nassim, NIAUX Ricardo, BOURASSEAU Anthony, Amine.
							</p>
						</div>
					</div>

				</div> <!-- /row of widgets -->
			</div>
		</div>

	</footer>	
		




	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="indes_files/headroom.min.js"></script>
	<script src="indes_files/jQuery.headroom.min.js"></script>
	<script src="indes_files/template.js"></script>
	
	<!-- Google Maps -->
	<script src="https://maps.googleapis.com/maps/api/js?key=&amp;sensor=false&amp;extension=.js"></script> 
	<script src="indes_files/google-map.js"></script>
	

</body>
</html>
