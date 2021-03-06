<?php
require('connexion.php');
session_start();
if (/*$_SESSION['username']!='etudp13' and $_SESSION['password']!='etud2016'*/false)
{
    echo '<meta http-equiv="refresh" content="0; URL=connexion.php">';
}
	$_SESSION['numglc1'] = 1;
	$_SESSION['numglc2'] = 1;
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="Sergey Pozhilov (GetTemplate.com)">
	
	<title>Inscription - Forum</title>

	<link rel="shortcut icon" href="assets/images/gt_favicon.png">
	
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="indes_files/bootstrap.min.css">
	<link rel="stylesheet" href="indes_filesfont-awesome.min.css">

	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="indes_files/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="assets/css/main.css">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
<?php 
if(isset($_POST['nom'])&&isset($_POST['prenom'])&&isset($_POST['pseudo'])&&isset($_POST['email'])&&isset($_POST['pass'])&&isset($_POST['pass2'])){
$req = $db->prepare('select membre_pseudo from forum_membres where membre_pseudo= :id');
	$req->bindValue(':id',htmlspecialchars($_POST['pseudo']));
	$req->execute();
	$id = $req->fetch(PDO::FETCH_NUM);
$req = $db->prepare('insert into forum_membres (membre_pseudo,membre_mdp,membre_email,prenom,nom,membre_post,role) values (:pseudo,:mdp,:email,:prenom,:nom,0,0)');
if($_POST['pass2']!=$_POST['pass']){
echo '<script>alert("vous avez mit 2 mots de passe différents ");</script>';
}
else if($id!=false){
echo '<script>alert("le pseudo existe déja");</script>';
}
else{

	$req->bindvalue(':pseudo',htmlspecialchars($_POST['pseudo']));
	$req->bindvalue(':mdp',sha1($_POST['pass']));
	$req->bindvalue(':email',htmlspecialchars($_POST['email']));
	$req->bindvalue(':prenom',htmlspecialchars($_POST['prenom']));
	$req->bindvalue(':nom',htmlspecialchars($_POST['nom']));
	$req->execute();
	
	 echo '<meta http-equiv="refresh" content="0; URL=index.php">';
}
}
?>
</head>

<body>
	<!-- Fixed navbar -->
	<div class="navbar navbar-inverse navbar-fixed-top headroom" >
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
				<a class="navbar-brand" href="index.php"><img src="./plume.png" style="width:30px;" alt="Progressus HTML5 template"></a>
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
			</div>
		</div>
	</div> 
	<!-- /.navbar -->

	<header id="head" class="secondary"></header>

	<!-- container -->
	<div class="container" style="    width: 1170px;">

		
		<div class="row">
			
			<!-- Article main content -->
			<article class="col-xs-12 maincontent">
				<header class="page-header">
					
				</header>
				
				<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<div class="panel panel-default">
						<div class="panel-body">
							<h3 class="thin text-center">Enregistrer un nouveau compte</h3>
							<p class="text-center text-muted">Si vous possedez déjà un compte, cliquez sur <a href="signin.php">Connexion</a> </p>
							<hr>

							<form method="post" action="./signup.php">
							<div class="top-margin">
									<label>Pseudo <span class="text-danger">*</span></label>
									<input type="text" id="pseudo" name="pseudo" class="form-control" required>
								</div>
								<div class="top-margin">
									<label>Prénom <span class="text-danger">*</span></label>
									<input type="text" id="prenom" name="prenom" class="form-control" required>
								</div>
								<div class="top-margin">
									<label>Nom <span class="text-danger">*</span></label>
									<input type="text" id="nom" name="nom" class="form-control" required>
								</div>
								<div class="top-margin">
									<label>Email <span class="text-danger">*</span></label>
									<input type="email" id="email" name="email"class="form-control" required>
								</div>

								<div class="row top-margin">
									<div class="col-sm-6">
										<label>Mot de passe <span class="text-danger">*</span></label>
										<input type="password" id="pass" name="pass" class="form-control" required>
									</div>
									<div class="col-sm-6">
										<label>Confirmez votre mot de passe <span class="text-danger">*</span></label>
										<input type="password" id="pass2" name="pass2" class="form-control" required>
									</div>
								</div>

								<hr>

								<div class="row">
									<!-- <div class="col-lg-8">
									<label class="checkbox">
											
										</label>                        
									</div> -->
									<div class="col-lg-4 text-right">
										<button class="btn btn-info" type="submit">S'enregistrer</button> 
										
									</div>
								</div>
							</form>
						</div>
					</div>

				</div>
				
			</article>
			<!-- /Article -->

		</div>
	</div>	<!-- /container -->
	


	




	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="indes_files/headroom.min.js"></script>
	<script src="indes_files/jQuery.headroom.min.js"></script>
	<script src="indes_files/template.js"></script>
</body>
</html>
